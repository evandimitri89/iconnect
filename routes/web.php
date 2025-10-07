<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ScheduleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

Route::get('/', [ScheduleController::class, 'index'])->name('dashboard');

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::get('/lostfound', function () {
    return view('lostfound.index');
})->name('lostfound.index');

Route::get('/notification', function () {
    return view('notification.index');
})->name('notification.index');

Route::post('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect()->route('login');
})->name('logout');

Route::resource('schedules', ScheduleController::class)->except(['index'])->middleware('auth');
