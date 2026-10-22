<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\KonsultasiController;

// --- Controller Admin (Milik Anda) ---
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\PelatihanController;
use App\Http\Controllers\Admin\ApprovalController;
use App\Http\Controllers\Admin\LayananController;
use App\Http\Controllers\Admin\PortofolioController;
use App\Http\Controllers\Admin\PengaturanController as AdminPengaturanController; // Alias agar tidak bentrok
use App\Http\Controllers\Admin\EnsiklopediaController;
use App\Http\Controllers\Admin\PenggunaController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\PublicController;

// --- Controller Client (Tambahan Syahrul) ---
use App\Http\Controllers\PengaturanController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\PanduanController;
use App\Http\Controllers\CallCenterController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Rute Admin (guard: admin)
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->name('admin.')->group(function () {
    Route::middleware('guest:admin')->group(function () {
        Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('login');
        Route::post('/login', [AdminAuthController::class, 'login'])->name('login.process');
    });

    Route::middleware('auth:admin')->group(function () {
        Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');

        // 1. DASHBOARD UMUM
        Route::middleware('admin.role:super_admin,admin_konten,admin_layanan')->group(function () {
            Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
        });

        // 2. KHUSUS SUPER ADMIN & ADMIN LAYANAN
        Route::middleware('admin.role:super_admin,admin_layanan')->group(function () {
            Route::get('/approval', [ApprovalController::class, 'index'])->name('approval.index');
            Route::put('/approval/{id}/status', [ApprovalController::class, 'updateStatus'])->name('approval.updateStatus');

            Route::resource('layanan', LayananController::class);
            Route::resource('client', ClientController::class);
        });

        // 3. KHUSUS SUPER ADMIN & ADMIN KONTEN
        Route::middleware('admin.role:super_admin,admin_konten')->group(function () {
            Route::resource('ensiklopedia', EnsiklopediaController::class);
            Route::resource('portofolio', PortofolioController::class);
            Route::resource('pelatihan', PelatihanController::class);
        });

        // 4. KHUSUS SUPER ADMIN SAJA
        Route::middleware('admin.role:super_admin')->group(function () {
            Route::get('/pengaturan', [AdminPengaturanController::class, 'index'])->name('pengaturan.index');
            Route::put('/pengaturan', [AdminPengaturanController::class, 'update'])->name('pengaturan.update');
            Route::resource('pengguna', PenggunaController::class);
        });
    });
});

/*
|--------------------------------------------------------------------------
| Public Routes (Halaman Publik / Pengunjung)
|--------------------------------------------------------------------------
*/
Route::get('/', [PublicController::class, 'home'])->name('home');
Route::get('/tentang-kami', [PublicController::class, 'tentangKami'])->name('tentang-kami');
Route::get('/layanan', [PublicController::class, 'layanan'])->name('layanan');

Route::get('/portofolio', [PublicController::class, 'portofolio'])->name('portofolio.index');
Route::get('/portofolio/{id}', [PublicController::class, 'detailPortofolio'])->name('portofolio.detail');

Route::get('/ensiklopedia', [PublicController::class, 'ensiklopedia'])->name('ensiklopedia.index');
Route::get('/ensiklopedia/{id}', [PublicController::class, 'detailEnsiklopedia'])->name('ensiklopedia.detail');

Route::get('/pelatihan', [PublicController::class, 'pelatihan'])->name('pelatihan.index');
Route::get('/pelatihan/{id}', [PublicController::class, 'detailPelatihan'])->name('pelatihan.detail');

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
    // --- Dashboard Client ---
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // --- Konsultasi ---
    Route::get('/konsultasi/booking', [KonsultasiController::class, 'booking'])->name('konsultasi.booking');
    Route::post('/konsultasi/booking', [KonsultasiController::class, 'store'])->name('konsultasi.store');
    Route::get('/konsultasi', [KonsultasiController::class, 'index'])->name('konsultasi.index');
    Route::get('/konsultasi/{id}', [KonsultasiController::class, 'detail'])->name('konsultasi.detail');
    Route::get('/konsultasi/{id}/jadwal', [KonsultasiController::class, 'jadwal'])->name('konsultasi.jadwal');

    // --- Notifikasi ---
    Route::get('/notifikasi', [KonsultasiController::class, 'notifikasi'])->name('notifikasi.index');
    Route::get('/notifikasi/{id}', [KonsultasiController::class, 'detailNotifikasi'])->name('notifikasi.detail');
    Route::post('/notifikasi/baca-semua', [KonsultasiController::class, 'tandaiSemuaDibaca'])->name('notifikasi.baca-semua');

    // --- Profile ---
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile/avatar', [ProfileController::class, 'deleteAvatar'])->name('profile.avatar.delete');

    // --- Pengaturan Client ---
    Route::get('/pengaturan', [PengaturanController::class, 'index'])->name('pengaturan.index');
    Route::put('/pengaturan/notifikasi', [PengaturanController::class, 'updateNotifikasi'])->name('pengaturan.notifikasi.update');
    Route::get('/pengaturan/faq', [FaqController::class, 'index'])->name('pengaturan.faq');
    Route::get('/pengaturan/panduan', [PanduanController::class, 'index'])->name('pengaturan.panduan');
    Route::get('/pengaturan/call-center', [CallCenterController::class, 'index']);
    Route::post('/pengaturan/call-center', [CallCenterController::class, 'store'])->name('call-center.store');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
