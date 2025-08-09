<?php

namespace App\Http\Controllers;

use App\Models\Domain;
use App\Models\Package;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class UserController extends Controller
{

    // Function to list all user with role 'user'
    public function showUsers(Request $request)
    {
        $users = User::when($request->search, function ($query, $search) {
            return $query->where(function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')
                    ->orWhere('email', 'like', '%' . $search . '%');
            });
        })
            ->withCount('domains')
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        return view('admin.users', compact('users'));
    }

    public function showUserDetail($id)
    {
        $user = User::with('domains')->findOrFail($id);
        $domains = $user->domains()->paginate(10);
        $packages = Package::select('id', 'name_package', 'disk_space')
            ->where('status', 'active')
            ->orderBy('name_package', 'asc')
            ->get();
        $periods = $this->getListPeriods();
        return view('admin.user-detail', compact('user', 'domains', 'packages', 'periods'));
    }

    public function createDomain(Request $request)
    {
        try {
            $request->validate([
                'user_id' => 'required|exists:users,id',
                'name' => 'required|string|max:100|alpha_dash|unique:domain,name|lowercase',
                'username' => 'required|string|max:50|unique:domain,username|lowercase',
                'package_id' => 'required|exists:package,id',
                'period' => 'required|integer|in:' . implode(',', $this->getListPeriods()),
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->withErrors($e->validator)->withInput()->with('modal-show', true);
        }

        DB::beginTransaction();
        try {
            $code = $this->getCode($request->username);
            $url = "https://" . config('app.hosting.host') . ":" . config('app.hosting.port') . "/CMD_API_ACCOUNT_USER";
            $user = User::findOrFail($request->user_id);
            $package = Package::findOrFail($request->package_id);
            Domain::create([
                'user_id' => $request->user_id,
                'name' => $request->name . "." . config('app.hosting.host', '.batuah.tech'),
                'url' => "https://" . $request->name . "." . config('app.hosting.host', '.batuah.tech') . ":" . config('app.hosting.port'),
                'username' => $request->username,
                'package_id' => $request->package_id,
                'expires_at' => now()->addDays((int)$request->period),
                'status' => 'active',
                'code' => $code,
            ]);

            // Hit API
            $dataPost = [
                'action' => 'create',
                'add' => 'Submit',
                'username' => $request->username,
                'email' => $user->email,
                'passwd' => $code . config('app.hosting.client_code'),
                'passwd2' => $code . config('app.hosting.client_code'),
                'domain' => $request->name . "." . config('app.hosting.host', '.batuah.tech'),
                'package' => $package->name_package,
                'ip' => config('app.hosting.ip'),
                'notify' => 'yes'
            ];
            $response = Http::withOptions([])->withBasicAuth(
                config('app.hosting.username'),
                config('app.hosting.password')
            )->post($url, $dataPost);
            $responseBody = $response->body();

            // Parse the response body to check for errors
            parse_str($responseBody, $parsedResponse);

            // Check if there's an error in the response
            if (isset($parsedResponse['error']) && $parsedResponse['error'] == '1') {
                DB::rollBack();
                return redirect()->back()->with('error', $parsedResponse['text'] . ". " . $parsedResponse['details'])->withInput();
            }

            // Show success message
            DB::commit();
            return redirect()->back()->with('message', 'Domain created successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with(['error' => 'Failed to create domain: ' . $e->getMessage()])->withInput();
        }
    }

    // Function to show the form for creating a new user
    public function showCreateUserForm()
    {
        return view('admin.user-form', [
            'action' => 'create',
            'url' => url('admin/users/create'),
        ]);
    }

    public function createUser(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:50',
            'email' => 'required|string|email|max:150|unique:users',
            'password' => 'required|string|min:8',
            'phone' => 'required|string|max_digits:20|unique:user_details,phone|numeric',
            'address' => 'required|string|max:155',
            'role_id' => 'required|exists:roles,id',
        ]);

        DB::beginTransaction();
        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'role_id' => $request->role_id, // 1 for admin, 2 for user
            ]);

            // Create user details
            $user->userDetails()->create([
                'phone' => $request->phone,
                'address' => $request->address,
                'status' => 'active', // Default status
            ]);

            DB::commit();
            return redirect('admin/users')->with('success', 'User created successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors(['error' => 'Failed to create user: ' . $e->getMessage()])->withInput();
        }
    }

    // Function to show the form for editing a user
    public function showEditUserForm($id)
    {
        $user = User::findOrFail($id);
        return view('admin.user-form', [
            'action' => 'edit',
            'url' => url('admin/users/edit/' . $id),
            'user' => $user,
        ]);
    }

    public function updateUser(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user_details_id = $user->userDetails->id ?? null;

        $request->validate([
            'name' => 'required|string|max:50',
            'email' => 'required|string|email|max:150|unique:users,email,' . $user->id,
            'phone' => 'required|string|max_digits:20|unique:user_details,phone,' . $user_details_id . '|numeric',
            'address' => 'required|string|max:155',
            'role_id' => 'required|exists:roles,id',
            'password' => 'nullable|string|min:8',
        ]);

        DB::beginTransaction();
        try {
            // Filled Password
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'role_id' => $request->role_id,
                'password' => $request->filled('password') ? bcrypt($request->password) : $user->password,
            ]);

            // Update user details
            $user->userDetails()->updateOrCreate(
                ['user_id' => $user->id],
                [
                    'phone' => $request->phone,
                    'address' => $request->address,

                ]
            );

            DB::commit();
            return redirect('admin/users')->with('success', 'User updated successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors(['error' => 'Failed to update user: ' . $e->getMessage()])->withInput();
        }
    }

    // Function to show user profile
    public function syncUsers()
    {
        DB::beginTransaction();
        try {
            set_time_limit(300); // Tambah waktu eksekusi

            // Call the API to get the list of users
            $users = $this->API_listUsers();
            if ($users) {
                // Process each user and update or create in the database
                foreach ($users as $name) {
                    if (User::where('name', $name)->exists()) {
                        // User already exists, skip to next
                        continue;
                    }
                    $user = User::firstOrCreate(
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

                    // Fetch user details from the API including their owned domains
                    $userDetail_with_Domain = $this->API_getUserDetail($name);
                    $packageID = Package::where('name_package', $userDetail_with_Domain['package'])->value('id');
                    $code = strtoupper(substr($name, 0, 3)) . rand(1000, 9999);
                    if ($userDetail_with_Domain) {
                        Domain::firstOrCreate([
                            'user_id' => $user->id,
                        ], [
                            'name' => $userDetail_with_Domain['domain'],
                            'url' => "https://" . $userDetail_with_Domain['domain'] . ":" . config('app.hosting.port'),
                            'package_id' => $packageID,
                            'status' => 'inactive',
                            'code' => $code,
                            'username' => $userDetail_with_Domain['username'],
                            'expires_at' => now()->addDays(30), // Set default expiration date
                        ]);
                    }
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


    public function activateUser($id)
    {
        DB::beginTransaction();
        try {
            $user = User::findOrFail($id);

            // Update user status to active
            $user->userDetails()->updateOrCreate(
                ['user_id' => $user->id],
                ['status' => 'active']
            );

            DB::commit();
            return redirect()->back()->with('success', 'User activated successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors(['error' => 'Failed to activate user: ' . $e->getMessage()]);
        }
    }

    public function deactivateUser($id)
    {
        DB::beginTransaction();
        try {
            $user = User::findOrFail($id);

            // Update user status to inactive
            $user->userDetails()->updateOrCreate(
                ['user_id' => $user->id],
                ['status' => 'inactive']
            );

            DB::commit();
            return redirect()->back()->with('success', 'User deactivated successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors(['error' => 'Failed to deactivate user: ' . $e->getMessage()]);
        }
    }
}
