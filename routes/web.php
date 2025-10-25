<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\SocialAuthController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\ForgotPasswordController;

Route::get('/', [ScheduleController::class, 'index'])
    ->name('dashboard')
    ->middleware('auth');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Socialite
Route::get('auth/google', [SocialAuthController::class, 'redirectToGoogle'])->name('google.login');
Route::get('auth/google/callback', [SocialAuthController::class, 'handleGoogleCallback']);

Route::get('auth/github', [SocialAuthController::class, 'redirectToGithub'])->name('github.login');
Route::get('auth/github/callback', [SocialAuthController::class, 'handleGithubCallback']);

// Password reset
Route::get('forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

Route::get('reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('reset-password', [ResetPasswordController::class, 'reset'])->name('password.update');

// Profile
Route::get('/profile', [ProfileController::class, 'index'])->name('profile');

// Notification
Route::get('/notification', function () {
    return view('notification.index');
})->name('notification.index');

// Lost and Found
Route::get('/lostfound', function () {
    return view('lostfound.index');
})->name('lostfound.index');

// Schedules
Route::resource('schedules', ScheduleController::class)->middleware('auth');
Route::get('/schedules/{schedule}/delete', [ScheduleController::class, 'delete'])
    ->name('schedules.delete')
    ->middleware('auth');

