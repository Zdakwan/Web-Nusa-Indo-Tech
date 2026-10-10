<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\KonsultasiController;

/*
|--------------------------------------------------------------------------
| Public Routes (Halaman Web Pengunjung)
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/tentang-kami', function () {
    return view('tentang-kami');
})->name('tentang-kami');

Route::get('/layanan', function () {
    return view('layanan');
})->name('layanan');

// Portofolio
// Portofolio
// 1. Tambahkan rute UTAMA portofolio ini
Route::get('/portofolio', function () {
    return view('portofolio'); // Sesuaikan dengan letak file blade Anda (misal: 'profile.portofolio' jika di dalam folder profile)
})->name('portofolio.index');

// 2. Ini rute detail yang sudah Anda buat sebelumnya
Route::get('/portofolio/detail', function () {
    return view('detail-portofolio'); 
})->name('portofolio.detail');
// Ensiklopedia
Route::view('/ensiklopedia', 'ensiklopedia')->name('ensiklopedia.index');
Route::view('/ensiklopedia/detail', 'detail-ensiklopedia')->name('ensiklopedia.detail');


/*
|--------------------------------------------------------------------------
| Authentication Routes (Guest Client)
|--------------------------------------------------------------------------
*/
Route::middleware('guest:client')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.process');
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.process');
});


/*
|--------------------------------------------------------------------------
| Authenticated Client Routes (Dashboard & Layanan Klien)
|--------------------------------------------------------------------------
*/
Route::middleware('auth:client')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Konsultasi
    Route::get('/konsultasi/booking', [KonsultasiController::class, 'booking'])->name('konsultasi.booking');
    Route::get('/konsultasi', [KonsultasiController::class, 'index'])->name('konsultasi.index');
    Route::get('/konsultasi/{id}', [KonsultasiController::class, 'detail'])->name('konsultasi.detail');
    Route::get('/konsultasi/{id}/jadwal', [KonsultasiController::class, 'jadwal'])->name('konsultasi.jadwal');

    // Notifikasi
    Route::get('/notifikasi', [KonsultasiController::class, 'notifikasi'])->name('notifikasi.index');

    // Profil Akun
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::view('/pelatihan', 'pelatihan')->name('pelatihan.index');
Route::view('/pelatihan/detail', 'detail-pelatihan')->name('pelatihan.detail');

