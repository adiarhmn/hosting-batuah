<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;


/*
    AUTHENTICATION ROUTES ============================================>
*/

Route::controller(AuthController::class)->group(function () {

    // Authentication Routes
    Route::group(['middleware' => 'guest'], function () {
        Route::get('/login', 'showLoginForm')->name('login');
        Route::post('/login', 'login')->name('login.post');
        Route::get('/register', 'showRegistrationForm')->name('register');
        Route::post('/register', 'register')->name('register.post');
    });

    // Logout Route
    Route::get('/logout', 'logout')->middleware(['auth'])->name('logout');

    // Email Verification Routes
    Route::get('/email/verify', 'emailVerify')->middleware(['auth', 'throttle:6,1'])->name('verification.notice');
    Route::get('/email/verify/{id}/{hash}', 'verifyEmail')->middleware(['auth', 'signed'])->name('verification.verify');
});
