<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ScheduleController;

Route::get('/', [ScheduleController::class, 'index'])
    ->name('dashboard')
    ->middleware('auth');


Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/lostfound', function () {
    return view('lostfound.index');
})->name('lostfound.index');

Route::get('/notification', function () {
    return view('notification.index');
})->name('notification.index');



Route::resource('schedules', ScheduleController::class)->middleware('auth');
