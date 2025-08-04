<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showLoginForm(): \Illuminate\View\View
    {
        return view('auth.login');
    }

    public function login(Request $request): \Illuminate\Http\RedirectResponse
    {
        // Validate and authenticate the user
        $credentials = $request->only('email', 'password');



        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

}
