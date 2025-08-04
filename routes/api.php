<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DomainController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

Route::post('/send-verification-email', [AuthController::class, 'sendEmailVerification'])
    ->middleware('throttle:6,1');

// Contoh route API
Route::get('/users', [UserController::class, 'listUsers']);
Route::get('/users/{username}', [UserController::class, 'getUserDetail']);

Route::get('/packages', [PackageController::class, 'packageList']);
Route::get('/packages/{name}', [PackageController::class, 'packageDetail']);

Route::get('/domains', [DomainController::class, 'domainList']);
Route::get('/databases', [DomainController::class, 'databaseList']);
Route::get('/databases/{name}', [DomainController::class, 'databaseDetail']);
