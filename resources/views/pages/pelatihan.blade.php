@extends('layouts.app')

@section('title', 'Pelatihan - Nusa Indo Technology')

@section('content')

    <!-- Section Pelatihan -->
    <section class="training-section dark-bg">
        <h1 class="page-title-white">PELATIHAN IT</h1>

        <!-- Fitur Pencarian -->
        <div class="search-container">
            <form action="">
                <input type="text" placeholder="Cari pelatihan..." class="search-input">
                <button type="submit" class="search-btn">🔍</button>
            </form>
        </div>

        <!-- Filter Kategori -->
        <div class="categories-container">
            <h3 class="category-title">Kategori</h3>
            <div class="portfolio-filters"> <!-- Menggunakan ulang class filter dari halaman portofolio -->
                <button class="filter-btn active">Semua Kategori</button>
                <button class="filter-btn">Web Developer</button>
                <button class="filter-btn">Mobile App</button>
                <button class="filter-btn">Cybersecurity</button>
                <button class="filter-btn">Jaringan Komputer</button>
                <button class="filter-btn">Data Analyst</button>
            </div>
        </div>

        <!-- Daftar Grid Pelatihan -->
        <div class="training-list-container">
            <h2 class="section-subtitle">Pelatihan</h2>
            
            <div class="training-grid">
                
                <!-- Card 1 -->
                <div class="training-card">
                    <div class="card-header-light">
                        <!-- Ganti ini dengan tag <img src="..."> logo Laravel Anda -->
                        <div class="course-logo">
                            <span class="logo-icon-red">📦</span> Laravel <span class="badge-red">12</span>
                        </div>
                        <p class="course-tagline">Faster, Smarter, and More Powerful than Ever!</p>
                    </div>
                    <div class="card-body-yellow">
                        <h3>Pengembangan Web Dengan Laravel 12</h3>
                        <p>Bangun aplikasi web modern dengan laravel 12</p>
                        <h4 class="price">Rp 500.000</h4>
                        <div class="card-actions">
                            <a href="#" class="btn-card">Lihat Selengkapnya</a>
                            <a href="#" class="btn-card">Daftar Sekarang</a>
                        </div>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="training-card">
                    <div class="card-header-light">
                        <div class="course-logo">
                            <span class="logo-icon-red">📦</span> Laravel <span class="badge-red">12</span>
                        </div>
                        <p class="course-tagline">Faster, Smarter, and More Powerful than Ever!</p>
                    </div>
                    <div class="card-body-yellow">
                        <h3>Pengembangan Web Dengan Laravel 12</h3>
                        <p>Bangun aplikasi web modern dengan laravel 12</p>
                        <h4 class="price">Rp 500.000</h4>
                        <div class="card-actions">
                            <a href="#" class="btn-card">Lihat Selengkapnya</a>
                            <a href="#" class="btn-card">Daftar Sekarang</a>
                        </div>
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="training-card">
                    <div class="card-header-light">
                        <div class="course-logo">
                            <span class="logo-icon-red">📦</span> Laravel <span class="badge-red">12</span>
                        </div>
                        <p class="course-tagline">Faster, Smarter, and More Powerful than Ever!</p>
                    </div>
                    <div class="card-body-yellow">
                        <h3>Pengembangan Web Dengan Laravel 12</h3>
                        <p>Bangun aplikasi web modern dengan laravel 12</p>
                        <h4 class="price">Rp 500.000</h4>
                        <div class="card-actions">
                            <a href="#" class="btn-card">Lihat Selengkapnya</a>
                            <a href="#" class="btn-card">Daftar Sekarang</a>
                        </div>
                    </div>
                </div>

                <!-- Card 4 -->
                <div class="training-card">
                    <div class="card-header-light">
                        <div class="course-logo">
                            <span class="logo-icon-red">📦</span> Laravel <span class="badge-red">12</span>
                        </div>
                        <p class="course-tagline">Faster, Smarter, and More Powerful than Ever!</p>
                    </div>
                    <div class="card-body-yellow">
                        <h3>Pengembangan Web Dengan Laravel 12</h3>
                        <p>Bangun aplikasi web modern dengan laravel 12</p>
                        <h4 class="price">Rp 500.000</h4>
                        <div class="card-actions">
                            <a href="#" class="btn-card">Lihat Selengkapnya</a>
                            <a href="#" class="btn-card">Daftar Sekarang</a>
                        </div>
                    </div>
                </div>

                <!-- Card 5 -->
                <div class="training-card">
                    <div class="card-header-light">
                        <div class="course-logo">
                            <span class="logo-icon-red">📦</span> Laravel <span class="badge-red">12</span>
                        </div>
                        <p class="course-tagline">Faster, Smarter, and More Powerful than Ever!</p>
                    </div>
                    <div class="card-body-yellow">
                        <h3>Pengembangan Web Dengan Laravel 12</h3>
                        <p>Bangun aplikasi web modern dengan laravel 12</p>
                        <h4 class="price">Rp 500.000</h4>
                        <div class="card-actions">
                            <a href="#" class="btn-card">Lihat Selengkapnya</a>
                            <a href="#" class="btn-card">Daftar Sekarang</a>
                        </div>
                    </div>
                </div>

                <!-- Card 6 -->
                <div class="training-card">
                    <div class="card-header-light">
                        <div class="course-logo">
                            <span class="logo-icon-red">📦</span> Laravel <span class="badge-red">12</span>
                        </div>
                        <p class="course-tagline">Faster, Smarter, and More Powerful than Ever!</p>
                    </div>
                    <div class="card-body-yellow">
                        <h3>Pengembangan Web Dengan Laravel 12</h3>
                        <p>Bangun aplikasi web modern dengan laravel 12</p>
                        <h4 class="price">Rp 500.000</h4>
                        <div class="card-actions">
                            <a href="#" class="btn-card">Lihat Selengkapnya</a>
                            <a href="#" class="btn-card">Daftar Sekarang</a>
                        </div>
                    </div>
                </div>

                <!-- Silakan copy-paste class "training-card" di atas jika butuh lebih dari 6 -->

            </div>
        </div>
    </section>

    <!-- Panggil Komponen CTA -->
    @include('components.cta')

@endsection