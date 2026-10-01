<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\KonsultasiController;

Route::middleware('guest:client')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.process');
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.process');
});

Route::middleware('auth:client')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Route untuk menampilkan halaman Booking Konsultasi
    Route::get('/konsultasi/booking', [KonsultasiController::class, 'booking'])
        ->name('konsultasi.booking');

    // Route halaman Konsultasi Saya
    Route::get('/konsultasi', [KonsultasiController::class, 'index'])
        ->name('konsultasi.index');

    // Route detail pendaftaran konsultasi
    Route::get('/konsultasi/{id}', [KonsultasiController::class, 'detail'])
        ->name('konsultasi.detail');

    // Route detail jadwal konsultasi
    Route::get('/konsultasi/{id}/jadwal', [KonsultasiController::class, 'jadwal'])
        ->name('konsultasi.jadwal');

    // Route halaman Notifikasi
    Route::get('/notifikasi', [KonsultasiController::class, 'notifikasi'])
        ->name('notifikasi.index');

    // Rute Profile
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
