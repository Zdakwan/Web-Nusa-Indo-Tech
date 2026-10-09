<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\KonsultasiController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\PelatihanController;
use App\Http\Controllers\Admin\ApprovalController;
use App\Http\Controllers\Admin\LayananController;
use App\Http\Controllers\Admin\PortofolioController;
use App\Http\Controllers\Admin\PengaturanController;
use App\Http\Controllers\Admin\EnsiklopediaController;
use App\Http\Controllers\Admin\PenggunaController;
use App\Http\Controllers\Admin\ClientController;

/*
|--------------------------------------------------------------------------
| Rute Admin (guard: admin)
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->name('admin.')->group(function () {

    // Belum login sebagai admin
    Route::middleware('guest:admin')->group(function () {
        Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('login');
        Route::post('/login', [AdminAuthController::class, 'login'])->name('login.process');
    });

    // Sudah login sebagai admin
    Route::middleware('auth:admin')->group(function () {
        Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');

        // Khusus Super Admin
        Route::middleware('admin.role:super_admin')->group(function () {

            Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

            // --- ROUTE APPROVAL KONSULTASI ---
            Route::get('/approval', [ApprovalController::class, 'index'])->name('approval.index');
            Route::put('/approval/{id}/status', [ApprovalController::class, 'updateStatus'])->name('approval.updateStatus');

            // --- ROUTE PENGATURAN ---
            Route::get('/pengaturan', [PengaturanController::class, 'index'])->name('pengaturan.index');
            Route::put('/pengaturan', [PengaturanController::class, 'update'])->name('pengaturan.update');

            // --- ROUTE RESOURCE (PENGGUNA & KELOLA KONTEN) ---
            Route::resource('ensiklopedia', EnsiklopediaController::class);
            Route::resource('pengguna', PenggunaController::class);
            Route::resource('client', ClientController::class);
            Route::resource('layanan', LayananController::class);
            Route::resource('portofolio', PortofolioController::class);
            Route::resource('pelatihan', PelatihanController::class);

        });
    });
});

/*
|--------------------------------------------------------------------------
| Rute Client (guard: client)
|--------------------------------------------------------------------------
*/
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
