<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\AuthController;

// Dashboard (hanya bisa diakses setelah login)
Route::get('/', [ScheduleController::class, 'index'])
    ->name('dashboard')
    ->middleware('auth');

// Auth
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Halaman lain (boleh diakses semua)
Route::get('/lostfound', function () {
    return view('lostfound.index');
})->name('lostfound.index');

Route::get('/notification', function () {
    return view('notification.index');
})->name('notification.index');

// CRUD schedules (hanya untuk user login)
Route::resource('schedules', ScheduleController::class)->middleware('auth');
