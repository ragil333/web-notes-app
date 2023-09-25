<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\UserController;
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

Route::controller(AuthController::class)
    ->prefix('auth')
    ->group(function () {
        Route::post("login", 'login');
        Route::post("register", 'register');
    });

Route::controller(AuthController::class)
    ->prefix('auth')
    ->middleware('auth:sanctum')
    ->group(function () {
        Route::get("me", 'me');
        Route::post("logout", 'logout');
    });

Route::apiResource('/notes', NoteController::class)
    ->middleware('auth:sanctum');
Route::apiResource('/user', UserController::class)
    ->middleware('auth:sanctum');
