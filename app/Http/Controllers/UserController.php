<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class UserController extends Controller
{

    // Function to list all user with role 'user'[customer]
    public function showCustomers()
    {
        $customers = User::where('role_id', 2)->paginate(10);
        return view('admin.customers', compact('customers'));
    }

    // Function to show user profile
    public function syncCustomers()
    {

        DB::beginTransaction();
        try {
            // Call the API to get the list of users
            $users = $this->API_listUsers();
            if ($users) {
                // Process each user and update or create in the database
                foreach ($users as $name) {
                    // Create user only if not exists
                    User::firstOrCreate(
                        ['name' => $name],
                        [
                            'name' => $name,
                            'email' => $name . rand(1000, 9999) . '@email.com', // Set default email
                            'role_id' => 2, // Assuming role_id 2 is for 'user'
                            'password' => bcrypt(config('app.df.user_password')), // Set default password
                            'email_verified_at' => now(), // Set email as verified
                            'created_at' => now(),
                            'updated_at' => now(),
                        ]
                    );
                }
            }

            DB::commit();
            return redirect()->back()->with('message', 'Users synced successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            dd('Error syncing users: ' . $e->getMessage());
            return back()->withErrors(['error' => 'Failed to sync users: ' . $e->getMessage()]);
        }
    }

    /*
        NOTE:
        Function listUsers() retrieves a list of users from the hosting service.
    */
    private function API_listUsers()
    {
        $response = Http::withBasicAuth(
            config('app.hosting.username'),
            config('app.hosting.password')
        )->get(config('app.hosting.url') . '/CMD_API_SHOW_USERS');
        if ($response->successful()) {
            $users = [];
            parse_str($response->body(), $users);
            // Extract usernames from the list array
            return isset($users['list']) ? $users['list'] : [];
        }
        return null;
    }

    /*
        NOTE:
        Function getUserDetail($username) retrieves details of a specific user by username.
    */
    private function API_getUserDetail($username)
    {
        $response = Http::withBasicAuth(
            config('app.hosting.username'),
            config('app.hosting.password')
        )->get(config('app.hosting.url') . '/CMD_API_SHOW_USER_CONFIG', [
            'user' => $username
        ]);
        return $response->successful() ?
            tap([], fn(&$userDetail) => parse_str($response->body(), $userDetail)) :
            null;
    }
}
