<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserDetails;
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
                'role_id' => 2, // 2 Is the role ID for 'user' --- IGNORE
            ]);

            // Membuat nama tanpa spasi untuk username

            $username = str_replace(' ', '', strtolower($request->name)) . rand(1000, 9999);
            $code = strtoupper(substr($username, 0, 3)) . rand(1000, 9999);

            UserDetails::create([
                'user_id' => $user->id,
                'phone' => $request->phone,
                'address' => $request->address,
                'username' => $username,
                'code' => $code,
            ]);

            Auth::login($user);

            return redirect('email/verify')->with('success', 'Registration successful! Please check your email for verification.');
        } catch (\Exception $e) {
            return back()->withErrors([
                'error' => 'Registration failed. Please try again later.',
            ]);
        }
    }


    public function emailVerify(Request $request): \Illuminate\View\View | \Illuminate\Http\RedirectResponse
    {
        if (Auth::check() && Auth::user()->hasVerifiedEmail()) {
            return redirect(Auth::user()->role->name . '/dashboard');
        }
        return view('auth.verify-email');
    }


    public function sendEmailVerification(Request $request): \Illuminate\Http\JsonResponse
    {
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        } elseif ($user->hasVerifiedEmail()) {
            return response()->json(['message' => 'Email already verified'], 200);
        }

        event(new Registered($user));

        return response()->json([
            'message' => 'Verification email sent successfully.',
            'status' => 'success',
        ]);
    }

    public function verifyEmail(Request $request): \Illuminate\Http\RedirectResponse
    {
        $user = User::find($request->id);

        if (!$user || !hash_equals((string) $request->hash, sha1($user->getEmailForVerification()))) {
            return redirect('/login')->with('error', 'Invalid verification link.');
        }

        if ($user->hasVerifiedEmail()) {
            return redirect('/login')->with('message', 'Email already verified.');
        }

        $user->markEmailAsVerified();

        return redirect('/login')->with('success', 'Email verified successfully. You can now log in.');
    }

    public function logout(): \Illuminate\Http\RedirectResponse
    {
        Auth::logout();
        return redirect('/login')->with('success', 'You have been logged out successfully.');
    }
}
