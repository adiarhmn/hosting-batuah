<?php

use App\Http\Controllers\DomainController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Contoh route API
Route::get('/users', [UserController::class, 'listUsers']);
Route::get('/users/{username}', [UserController::class, 'getUserDetail']);

Route::get('/packages', [PackageController::class, 'packageList']);
Route::get('/packages/{name}', [PackageController::class, 'packageDetail']);

Route::get('/domains', [DomainController::class, 'domainList']);
Route::get('/databases', [DomainController::class, 'databaseList']);
Route::get('/databases/{name}', [DomainController::class, 'databaseDetail']);
// Route::post('/users', [UserController::class, 'store']);
// Route::get('/users/{id}', [UserController::class, 'show']);
// Route::put('/users/{id}', [UserController::class, 'update']);
// Route::delete('/users/{id}', [UserController::class, 'destroy']);
