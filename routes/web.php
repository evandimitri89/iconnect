<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\SocialAuthController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\ExtracurricularController;
use App\Http\Controllers\RoomReservationController;

Route::get('/', [ScheduleController::class, 'index'])
    ->name('dashboard')
    ->middleware('auth');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Profile
Route::middleware('auth')->group(function () {
    Route::get('/profile', [UserController::class, 'profile'])->name('profile');
    Route::put('/profile', [UserController::class, 'updateProfile'])->name('profile.update');
});

// Extracurricular
Route::middleware('auth')->group(function () {
    Route::get('/extracurriculars', [ExtracurricularController::class, 'index'])
        ->name('extracurriculars');
});

// Room Reservation
Route::middleware('auth')->group(function () {

    Route::get('/room-reservations', [RoomReservationController::class, 'index'])
        ->name('room-reservations');

    Route::get('/room-reservations/create', [RoomReservationController::class, 'create'])
        ->name('room-reservations.create');

    Route::post('/room-reservations', [RoomReservationController::class, 'store'])
        ->name('room-reservations.store');

    Route::get('/room-reservations/{reservation}', [RoomReservationController::class, 'show'])
        ->name('room-reservations.show');

    Route::delete('/room-reservations/{id}', [RoomReservationController::class, 'destroy'])
        ->name('room-reservations.destroy');

});


// Notification
Route::get('/notification', function () {
    return view('notification.index');
})->name('notification.index');

// Lost and Found
Route::get('/lostfound', function () {
    return view('lostfound.index');
})->name('lostfound.index');

// Schedule
Route::middleware('auth')->group(function () {
    Route::resource('schedules', ScheduleController::class);
    Route::get('/schedules/{schedule}/delete', [ScheduleController::class, 'delete'])
        ->name('schedules.delete');
});
