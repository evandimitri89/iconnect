<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\LostFoundController;
use App\Http\Controllers\ExtracurricularController;
use App\Http\Controllers\RoomReservationController;

// Auth
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Dashboard
Route::get('/', [ScheduleController::class, 'index'])
    ->name('dashboard')
    ->middleware('auth');

// Profile
Route::middleware('auth')->group(function () {
    Route::get('/profile', [UserController::class, 'profile'])->name('profile');
    Route::put('/profile', [UserController::class, 'updateProfile'])->name('profile.update');
});

// Extracurriculars
Route::middleware('auth')->group(function () {
    Route::get('/extracurriculars', [ExtracurricularController::class, 'index'])
        ->name('extracurriculars');
});

// Room Reservations
Route::middleware('auth')->group(function () {
    Route::get('/room-reservations', [RoomReservationController::class, 'index'])
        ->name('room-reservations');

    Route::get('/room-reservations/create', [RoomReservationController::class, 'create'])
        ->name('room-reservations.create');

    Route::post('/room-reservations', [RoomReservationController::class, 'store'])
        ->name('room-reservations.store');

    Route::delete('/room-reservations/{id}', [RoomReservationController::class, 'destroy'])
        ->name('room-reservations.destroy');
});

// Notification
Route::middleware('auth')->group(function () {
    Route::get('/notification', function () {
        return view('notification.index');
    })->name('notification.index');
});

// Lost & Found
Route::middleware('auth')->group(function () {
    Route::get('/lost-found', [LostFoundController::class, 'index'])
        ->name('lost-found');

    Route::get('/lost-found/create', [LostFoundController::class, 'create'])
        ->name('lost-found.create');

    Route::post('/lost-found', [LostFoundController::class, 'store'])
        ->name('lost-found.store');

    Route::get('/lost-found/{id}/claim', [LostFoundController::class, 'claim'])
        ->name('lost-found.claim');

    Route::delete('/lost-found/{id}', [LostFoundController::class, 'destroy'])
        ->name('lost-found.destroy');
});

// Schedules
Route::middleware('auth')->group(function () {
    Route::get('/schedules', [ScheduleController::class, 'index'])->name('schedules.index');
    Route::get('/schedules/create', [ScheduleController::class, 'create'])->name('schedules.create');
    Route::post('/schedules', [ScheduleController::class, 'store'])->name('schedules.store');
    Route::get('/schedules/{id}/edit', [ScheduleController::class, 'edit'])->name('schedules.edit');
    Route::put('/schedules/{id}', [ScheduleController::class, 'update'])->name('schedules.update');
    Route::delete('/schedules/{id}', [ScheduleController::class, 'destroy'])->name('schedules.destroy');
    Route::get('/schedules/{id}/delete', [ScheduleController::class, 'delete'])->name('schedules.delete');
});
