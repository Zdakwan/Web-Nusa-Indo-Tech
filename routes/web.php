<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController; // Pastikan ini ada di atas

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// ==========================================
// ROUTE HALAMAN UTAMA (GET)
// ==========================================
Route::get('/', function () {
    return view('pages.beranda');
});

Route::get('/layanan', function () {
    return view('pages.layanan');
});

Route::get('/portofolio', function () {
    return view('pages.portofolio');
});

Route::get('/portofolio/detail', function () {
    return view('pages.portofolio-detail');

});

Route::get('/pelatihan', function () {
    return view('pages.pelatihan');
});
Route::get('/pelatihan/detail-pelatihan-it', function () {
    return view('pages.detail-pelatihan');
});

Route::get('/ensiklopedia', function () {
    return view('pages.ensiklopedia');
});
Route::get('/ensiklopedia/judul-artikel-lain', function () {
    // Sementara kita arahkan ke file desain yang baru saja Anda buat
    return view('pages.detail-ensiklopedia'); 
});

Route::get('/tentang-kami', function () {
    return view('pages.tentang');
});


// ==========================================
// ROUTE AUTENTIKASI / LOGIN & DAFTAR
// ==========================================

// Menampilkan Halaman Form (GET)
Route::get('/daftar', function () {
    return view('pages.daftar');
});

Route::get('/login', function () {
    return view('pages.login');
});
Route::post('/login', [AuthController::class, 'loginProcess']);

// Rute untuk menampilkan dashboard client (yang sudah kita buat)
Route::get('/dashboard-client', function () {
    return view('pages.dashboard-client');
})->middleware('auth:client');

// Memproses Form ke Database (POST)
Route::post('/daftar', [AuthController::class, 'registerProcess']);
Route::post('/login', [AuthController::class, 'loginProcess']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');



// ==========================================
// ROUTE DASHBOARD (Hanya bisa diakses jika sudah login)
// ==========================================
Route::get('/dashboard', function () {
    return view('pages.dashboard');
})->middleware('auth');
// Ubah bagian ini di routes/web.php
Route::get('/dashboard-admin', function () {
    return view('pages.dashboard-admin');
})->middleware('auth:admin'); // <-- Tambahkan :admin

Route::get('/dashboard-client', function () {
    return view('pages.dashboard-client');
})->middleware('auth:client'); // <-- Tambahkan :client