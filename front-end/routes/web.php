<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::controller(AuthController::class)
    ->prefix('auth')
    ->middleware('auth.guest')
    ->group(function () {
        Route::get('login', 'login')->name('login');
        Route::post('login', 'postLogin')->name('auth.login');
        Route::get('register', 'register')->name('register');
        Route::post('register', 'postRegister')->name('auth.register');
    });
Route::get('auth/logout', [AuthController::class, 'logout'])->middleware('auth.api')->name('logout');
Route::controller(NoteController::class)
    ->middleware('auth.api')
    ->prefix('notes')
    ->group(function () {
        Route::get('/', 'index')->name('home');
        Route::get('/add', 'addNote')->name('add-note');
        Route::post('/add', 'storeNote')->name('post-note');
        Route::get('/show/{id}', 'noteById')->name('show-note');
        Route::post('update/{id}', 'updateNote')->name('update-note');
        Route::get('delete/{id}', 'deleteNote')->name('delete-note');
    });

Route::controller(UserController::class)
    ->middleware(['auth.api', 'auth.admin'])
    ->prefix('user')
    ->group(function () {
        Route::get('/', 'index')->name('user');
    });
