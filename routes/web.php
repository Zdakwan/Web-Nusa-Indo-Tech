<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Http\Request;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Support\Facades\DB;

// --- Controller Client ---
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\KonsultasiController;
use App\Http\Controllers\PengaturanController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\PanduanController;
use App\Http\Controllers\CallCenterController;
use App\Http\Controllers\DashboardController;

// --- Controller Admin ---
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\PelatihanController;
use App\Http\Controllers\Admin\ApprovalController;
use App\Http\Controllers\Admin\LayananController;
use App\Http\Controllers\Admin\PortofolioController;
use App\Http\Controllers\Admin\PengaturanController as AdminPengaturanController;
use App\Http\Controllers\Admin\EnsiklopediaController;
use App\Http\Controllers\Admin\PenggunaController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\Admin\TentangKamiController;

/*
|--------------------------------------------------------------------------
| KONFIGURASI PEMBATASAN LOGIN & REGISTER (THROTTLE)
|--------------------------------------------------------------------------
*/
// Throttle Admin Dinamis
RateLimiter::for('admin-login', function (Request $request) {
    $email = $request->input('email');
    $admin = DB::table('admins')->where('email', $email)->first();
    $limit = ($admin && $admin->role === 'super_admin') ? 3 : 5;
    return Limit::perMinute($limit)->by($email ?: $request->ip());
});

RateLimiter::for('client-auth', function (Request $request) {
    return Limit::perMinute(7)->by($request->input('login') ?: $request->ip());
});

/*
|--------------------------------------------------------------------------
| Rute Admin (guard: admin)
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->name('admin.')->group(function () {
    Route::middleware('guest:admin')->group(function () {
        Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('login');
        Route::post('/login', [AdminAuthController::class, 'login'])
            ->middleware('throttle:admin-login')
            ->name('login.process');
    });

    Route::middleware('auth:admin')->group(function () {
        Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');

        Route::middleware('admin.role:super_admin,admin_konten,admin_layanan')->group(function () {
            Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
        });

        Route::middleware('admin.role:super_admin,admin_layanan')->group(function () {
            Route::get('/approval', [ApprovalController::class, 'index'])->name('approval.index');
            Route::put('/approval/{id}/status', [ApprovalController::class, 'updateStatus'])->name('approval.updateStatus');

            Route::resource('layanan', LayananController::class);
            Route::resource('client', ClientController::class);
        });

        Route::middleware('admin.role:super_admin,admin_konten')->group(function () {
            Route::resource('ensiklopedia', EnsiklopediaController::class);
            Route::resource('portofolio', PortofolioController::class);
            Route::resource('pelatihan', PelatihanController::class);

        });

        Route::middleware('admin.role:super_admin')->group(function () {
            Route::get('/pengaturan', [AdminPengaturanController::class, 'index'])->name('pengaturan.index');
            Route::put('/pengaturan', [AdminPengaturanController::class, 'update'])->name('pengaturan.update');
            Route::resource('pengguna', PenggunaController::class);
            Route::get('/tentang-kami', [TentangKamiController::class, 'index'])->name('tentang-kami.index');
            Route::put('/tentang-kami/profil', [TentangKamiController::class, 'updateProfil'])->name('tentang-kami.profil.update');
            Route::post('/tentang-kami/tim', [TentangKamiController::class, 'storeTim'])->name('tentang-kami.tim.store');
            Route::put('/tentang-kami/tim/{id}', [TentangKamiController::class, 'updateTim'])->name('tentang-kami.tim.update');
            Route::delete('/tentang-kami/tim/{id}', [TentangKamiController::class, 'destroyTim'])->name('tentang-kami.tim.destroy');
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

// Rute Layanan
Route::get('/layanan', [PublicController::class, 'layanan'])->name('layanan');
Route::get('/layanan/{id}', [PublicController::class, 'detailLayanan'])->name('layanan.detail');

// Rute Portofolio
Route::get('/portofolio', [PublicController::class, 'portofolio'])->name('portofolio.index');
Route::get('/portofolio/{id}', [PublicController::class, 'detailPortofolio'])->name('portofolio.detail');

// Rute Ensiklopedia
Route::get('/ensiklopedia', [PublicController::class, 'ensiklopedia'])->name('ensiklopedia.index');
Route::get('/ensiklopedia/{id}', [PublicController::class, 'detailEnsiklopedia'])->name('ensiklopedia.detail');

// Rute Pelatihan
Route::get('/pelatihan', [PublicController::class, 'pelatihan'])->name('pelatihan.index');
Route::get('/pelatihan/{id}', [PublicController::class, 'detailPelatihan'])->name('pelatihan.detail');

/*
|--------------------------------------------------------------------------
| Rute Client (guard: client)
|--------------------------------------------------------------------------
*/
Route::middleware('guest:client')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');

    // Login Client dibatasi 7 kali percobaan
    Route::post('/login', [AuthController::class, 'login'])
        ->middleware('throttle:client-auth')
        ->name('login.process');

    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');

    // Register Client dibatasi 7 kali percobaan
    Route::post('/register', [AuthController::class, 'register'])
        ->middleware('throttle:client-auth')
        ->name('register.process');
});

Route::middleware('auth:client')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/konsultasi/booking', [KonsultasiController::class, 'booking'])->name('konsultasi.booking');
    Route::post('/konsultasi/booking', [KonsultasiController::class, 'store'])->name('konsultasi.store');
    Route::get('/konsultasi', [KonsultasiController::class, 'index'])->name('konsultasi.index');
    Route::get('/konsultasi/{id}', [KonsultasiController::class, 'detail'])->name('konsultasi.detail');
    Route::get('/konsultasi/{id}/jadwal', [KonsultasiController::class, 'jadwal'])->name('konsultasi.jadwal');

    Route::get('/notifikasi', [KonsultasiController::class, 'notifikasi'])->name('notifikasi.index');
    Route::get('/notifikasi/{id}', [KonsultasiController::class, 'detailNotifikasi'])->name('notifikasi.detail');
    Route::post('/notifikasi/baca-semua', [KonsultasiController::class, 'tandaiSemuaDibaca'])->name('notifikasi.baca-semua');

    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile/avatar', [ProfileController::class, 'deleteAvatar'])->name('profile.avatar.delete');

    Route::get('/pengaturan', [PengaturanController::class, 'index'])->name('pengaturan.index');
    Route::put('/pengaturan/notifikasi', [PengaturanController::class, 'updateNotifikasi'])->name('pengaturan.notifikasi.update');
    Route::get('/pengaturan/faq', [FaqController::class, 'index'])->name('pengaturan.faq');
    Route::get('/pengaturan/panduan', [PanduanController::class, 'index'])->name('pengaturan.panduan');
    Route::get('/pengaturan/call-center', [CallCenterController::class, 'index']);
    Route::post('/pengaturan/call-center', [CallCenterController::class, 'store'])->name('call-center.store');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
