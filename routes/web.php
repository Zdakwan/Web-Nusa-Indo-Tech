<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\KonsultasiController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;

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

            // --- ROUTE BARU UNTUK PENGGUNA & CLIENT ---
            Route::get('/pengguna', function () {
                return view('admin.pengguna.index');
            })->name('pengguna.index');

            Route::get('/client', function () {
                return view('admin.client.index');
            })->name('client.index');
        });

            Route::get('/layanan', function () {
                return view('admin.layanan.index');
            })->name('layanan.index'); // <-- Pastikan namanya begini agar sesuai sidebar

            Route::get('/portofolio', function () {
                return view('admin.portofolio.index');
            })->name('portofolio.index');

            Route::get('/pelatihan', function () {
                return view('admin.pelatihan.index');
            })->name('pelatihan.index');

            Route::get('/ensiklopedia', function () {
                return view('admin.ensiklopedia.index');
            })->name('ensiklopedia.index');
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
