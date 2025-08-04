<?php
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

require __DIR__.'/auth.php';


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
