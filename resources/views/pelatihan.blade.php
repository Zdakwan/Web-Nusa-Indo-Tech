@extends('layouts.app')

@section('title', 'Pelatihan IT - Nusa Indo Technology')

@section('content')
<div class="pelatihan-page-wrapper">
    <div class="container">
        
        <!-- Header & Pencarian -->
        <div class="pelatihan-header-section">
            <h1 class="pelatihan-main-title">PELATIHAN IT</h1>
            
            <div class="pelatihan-search-box">
                <form action="#" method="GET" class="search-form-flex">
                    <input type="text" name="q" placeholder="Cari pelatihan" class="search-input-field">
                    <button type="submit" class="search-submit-btn">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                </form>
            </div>
        </div>

        <!-- Kategori Filter -->
        <div class="kategori-section">
            <h3 class="kategori-title">Kategori</h3>
            <div class="kategori-pills-container">
                <button class="kategori-pill active">Semua Kategori</button>
                <button class="kategori-pill">Web Developer</button>
                <button class="kategori-pill">Mobile App</button>
                <button class="kategori-pill">Cybersecurity</button>
                <button class="kategori-pill">Jaringan Komputer</button>
                <button class="kategori-pill">Data Analyst</button>
            </div>
        </div>

        <!-- Daftar Pelatihan Grid -->
        <div class="pelatihan-list-section">
            <h2 class="pelatihan-section-heading">Pelatihan</h2>

            <div class="pelatihan-grid">
                @for ($i = 1; $i <= 9; $i++)
                    <div class="pelatihan-card">
                        <!-- Bagian Atas: Banner Putih/Light (Mockup Laravel 12) -->
                        <div class="card-top-banner">
                            <div class="laravel-brand-box">
                                <i class="fa-brands fa-laravel laravel-logo-icon"></i>
                                <span class="laravel-text">Laravel <span class="laravel-version">12</span></span>
                            </div>
                            <p class="laravel-tagline">Faster, Smarter, and More Powerful than Ever!</p>
                        </div>
                        
                        <!-- Bagian Bawah: Konten Kuning -->
                        <div class="card-bottom-content">
                            <h3 class="pelatihan-card-title">Pengembangan Web Dengan Laravel 12</h3>
                            <p class="pelatihan-card-desc">
                                Bangun aplikasi web modern dengan laravel 12
                            </p>
                            <p class="pelatihan-price">Rp 500.000</p>
                            
                            <!-- Tombol Aksi -->
                            <div class="pelatihan-card-actions">
                                <a href="{{ url('/pelatihan/detail') }}" class="btn-pelatihan btn-outline-dark">Lihat Selengkapnya</a>
                           <a href="{{ route('register') }}" class="btn-pelatihan btn-solid-dark">Daftar Sekarang</a>
                            </div>
                        </div>
                    </div>
                @endfor
            </div>
        </div>

    </div>
</div>
@endsection