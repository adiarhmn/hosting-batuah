<?php

use App\Http\Controllers\PackageController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

require __DIR__ . '/auth.php';

/*
    ADMIN ROUTES ============================================>
*/
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'access:admin', 'verified']], function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');


    // Admin Package Management
    Route::prefix('packages')
        ->controller(
            PackageController::class
        )->group(function () {
            Route::get('/', 'showPackages');
            Route::get('/sync', 'syncPackages');
            Route::get('/{name}', 'showPackageDetail');
        });

    Route::prefix('customers')
        ->controller(
            UserController::class
        )->group(function () {
            Route::get('/', 'showCustomers');
        });
});


/*
    USER ROUTES ============================================>
*/
Route::group(['prefix' => 'user', 'middleware' => ['auth', 'access:user', 'verified']], function () {
    Route::get('/dashboard', function () {
        return view('user.dashboard');
    })->name('user.dashboard');

    Route::get('/profile', [UserController::class, 'showProfile'])->name('user.profile');
    Route::post('/profile/update', [UserController::class, 'updateProfile'])->name('user.profile.update');
});
