<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\mulaijualanController;
use App\Http\Controllers\TentangKamiController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/mulaijualan', [mulaijualanController::class, 'mulaijualan'])
    ->name('mulaijualan');

Route::get('/login', [AuthController::class, 'login'])
    ->name('login');

Route::post('/login', [AuthController::class, 'loginPost'])
    ->name('login.post');

Route::get('/register', [AuthController::class, 'register'])
    ->name('register');

Route::post('/register', [AuthController::class, 'registerPost'])
    ->name('register.post');

Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');

Route::get('/tentangkami', [TentangKamiController::class, 'index'])
    ->name('tentangkami');


// TEST SESSION
Route::middleware('auth')->get('/test-session', function () {

    return "MASIH LOGIN";

});