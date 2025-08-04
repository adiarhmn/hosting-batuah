<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
    AUTHENTICATION ROUTES ============================================>
*/

Route::group(['middleware' => 'guest'], function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

// Logout Route
Route::get('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->middleware('auth')
    ->name('logout');

// Email Verification Notice Route
Route::get('/email/verify', function () {
    if (Auth::check() && Auth::user()->hasVerifiedEmail()) {
        return redirect(Auth::user()->role->name . '/dashboard');
    }
    return view('auth.verify-email');
})
    ->middleware(['auth', 'throttle:6,1'])
    ->name('verification.notice');

// Email Verification Route
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/');
})->middleware(['auth', 'signed'])->name('verification.verify');


Route::get('/', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'verified'])->name('home');
/*
    ADMIN ROUTES ============================================>
*/
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin', 'verified']], function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::prefix('customers')
        ->controller(
            UserController::class
        )->group(function () {
            Route::get('/', 'showCustomers');
        });
});
