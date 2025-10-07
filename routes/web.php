<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
<<<<<<< HEAD
use App\Http\Controllers\ScheduleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

Route::get('/', [ScheduleController::class, 'index'])->name('dashboard');
=======
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ScheduleController;

Route::get('/', [ScheduleController::class, 'index'])
    ->name('dashboard')
    ->middleware('auth');
>>>>>>> feature/auth-system


<<<<<<< HEAD
Route::get('/register', function () {
    return view('auth.register');
})->name('register');
=======
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
>>>>>>> feature/auth-system

Route::get('/lostfound', function () {
    return view('lostfound.index');
})->name('lostfound.index');

Route::get('/notification', function () {
    return view('notification.index');
})->name('notification.index');

<<<<<<< HEAD
Route::post('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect()->route('login');
})->name('logout');

Route::resource('schedules', ScheduleController::class)->except(['index'])->middleware('auth');
=======


Route::resource('schedules', ScheduleController::class)->middleware('auth');
>>>>>>> feature/auth-system
