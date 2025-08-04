<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm(): \Illuminate\View\View
    {
        return view('auth.login');
    }

    public function login(Request $request): \Illuminate\Http\RedirectResponse
    {

        // Validate and authenticate the user
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:8',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials, $request->filled('remember_me'))) {
            if (Auth::user()->hasVerifiedEmail()) {
                // Authentication passed, redirect to the intended page
                return redirect()->intended('/dashboard');
            } else {
                // User exists but email is not verified
                return redirect('email/verify')->with('message', 'Please verify your email before proceeding.');
            }
        } else {
            // Authentication failed, redirect back with error
            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ]);
        }
    }

    public function showRegistrationForm(): \Illuminate\View\View
    {
        return view('auth.register');
    }

    public function register(Request $request): \Illuminate\Http\RedirectResponse
    {
        // Validate the registration data
        $request->validate([
            'name' => 'required|string|max:50',
            'email' => 'required|string|email|max:150|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        try {
            // Create the user
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'role_id' => 2, // Assuming '2' is the role ID for 'user'
                'phone' => $request->phone,
                'address' => $request->address,
            ]);

            return redirect('email/verify')->with('success', 'Registration successful! Please check your email for verification.');
        } catch (\Exception $e) {
            return back()->withErrors([
                'error' => 'Registration failed. Please try again later.',
            ]);
        }
    }


    public function sendEmailVerification(Request $request): \Illuminate\Http\JsonResponse
    {
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }elseif ($user->hasVerifiedEmail()) {
            return response()->json(['message' => 'Email already verified'], 200);
        }

        event(new Registered($user));

        return response()->json([
            'message' => 'Verification email sent successfully.',
            'status' => 'success',
        ]);
    }
}
