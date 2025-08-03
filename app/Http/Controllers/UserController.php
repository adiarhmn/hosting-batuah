<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class UserController extends Controller
{
    /*
        NOTE:
        Function listUsers() retrieves a list of users from the hosting service.
    */
    public function listUsers()
    {
        $response = Http::withBasicAuth(
            config('app.hosting.username'),
            config('app.hosting.password')
        )->get(config('app.hosting.url') . '/CMD_API_SHOW_USERS');
        if ($response->successful()) {
            parse_str($response->body(), $packages);
            return response()->json([
                'success' => true,
                'packages' => $packages
            ]);
        }
        return response()->json([
            'success' => false,
            'message' => 'Failed to retrieve package list',
            'response' => $response
        ], $response->status());
    }

    /*
        NOTE:
        Function getUserDetail($username) retrieves details of a specific user by username.
    */
    public function getUserDetail($username)
    {
        $response = Http::withBasicAuth(
            config('app.hosting.username'),
            config('app.hosting.password')
        )->get(config('app.hosting.url') . '/CMD_API_SHOW_USER_CONFIG', [
            'user' => $username
        ]);

        if ($response->successful()) {
            parse_str($response->body(), $userDetails);
            return response()->json([
                'success' => true,
                'user_details' => $userDetails
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Failed to retrieve user details',
            'response' => $response
        ], $response->status());
    }
}
