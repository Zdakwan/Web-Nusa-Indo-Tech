@extends('layouts.app')

@section('title', 'Detail Pelatihan - Pengembangan Web dengan Laravel 12')

@section('content')

    <!-- HERO SECTION DETAIL PELATIHAN -->
    <section class="detail-pelatihan-hero">
        <div class="hero-yellow-shape"></div> <!-- Bentuk kuning di kanan atas -->
        
        <div class="container relative z-10">
            <!-- Navigasi Back -->
            <div class="back-nav-pelatihan">
                <a href="{{ url('/pelatihan') }}" class="back-link">
                    <i class="fa-solid fa-arrow-left"></i> Detail Pelatihan
                </a>
            </div>

            <div class="pelatihan-hero-grid">
                <!-- Teks & Tag -->
                <div class="pelatihan-hero-text">
                    <h1 class="hero-title-large">
                        Pengembangan Web<br>
                        dengan <span class="text-amber">Laravel 12</span>
                    </h1>
                    <p class="hero-subtitle-light">
                        Bangun aplikasi web modern, aman, dan scalable dengan framework laravel terbaru.
                    </p>
                    
                    <div class="hero-tags-group">
                        <span class="badge-pill-light-blue">#laravel</span>
                        <span class="badge-pill-light-blue">#webdevelopment</span>
                        <span class="badge-pill-light-blue">#php</span>
                        <span class="badge-pill-light-blue">#backend</span>
                    </div>
                </div>

                <!-- Ilustrasi 3D Laravel (CSS/Mockup) -->
                <div class="pelatihan-hero-illustration">
                    <div class="laravel-3d-board">
                        <div class="board-top-dots">
                            <span></span><span></span><span></span>
                        </div>
                        <i class="fa-brands fa-laravel logo-center"></i>
                        
                        <!-- Floating Badges -->
                        <div class="floating-badge-code">
                            <i class="fa-solid fa-code"></i>
                        </div>
                        <div class="floating-badge-version">12</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- KONTEN UTAMA PELATIHAN -->
    <div class="pelatihan-content-wrapper">
        <div class="container">
            
            <!-- DESKRIPSI & KOTAK HARGA -->
            <div class="pelatihan-desc-price-grid">
                <div class="desc-column">
                    <h2 class="content-heading">Deskripsi Pelatihan</h2>
                    <p class="content-paragraph">
                        Pelatihan ini dirancang untuk membantu peserta memahami dan menguasai pengembangan aplikasi web menggunakan Laravel 12. Peserta akan mempelajari konsep dasar hingga implementasi fitur real world dengan pendekatan praktis dan studi kasus yang relevan dengan kebutuhan industri.
                    </p>
                </div>
                
                <div class="price-column">
                    <div class="price-box">
                        <h3 class="price-amount">Rp 500.000</h3>
                        <p class="price-note">per peserta</p>
                        <!-- Tombol Daftar Sekarang Utama (Sudah diperbaiki) -->
                        <a href="{{ route('register') }}" class="btn-daftar-pelatihan">Daftar Sekarang</a>
                    </div>
                </div>
            </div>

            <!-- APA YANG AKAN DIPELAJARI? -->
            <div class="materi-section">
                <h2 class="content-heading">Apa yang akan Dipelajari?</h2>
                <div class="materi-check-grid">
                    <div class="check-item">
                        <i class="fa-solid fa-circle-check text-amber"></i> Pengenalan Laravel 12 dan ekosistemnya
                    </div>
                    <div class="check-item">
                        <i class="fa-solid fa-circle-check text-amber"></i> Routing, controlling
                    </div>
                    <div class="check-item">
                        <i class="fa-solid fa-circle-check text-amber"></i> Authentication & Authorization
                    </div>
                    <div class="check-item">
                        <i class="fa-solid fa-circle-check text-amber"></i> Testing & Debugging
                    </div>
                    <div class="check-item">
                        <i class="fa-solid fa-circle-check text-amber"></i> Instalasi dan konfigurasi project
                    </div>
                    <div class="check-item">
                        <i class="fa-solid fa-circle-check text-amber"></i> Database ORM
                    </div>
                    <div class="check-item">
                        <i class="fa-solid fa-circle-check text-amber"></i> API Development dengan Laravel
                    </div>
                    <div class="check-item">
                        <i class="fa-solid fa-circle-check text-amber"></i> Deployment ke server
                    </div>
                </div>
            </div>

            <!-- SIAPA YANG COCOK MENGIKUTI? -->
            <div class="target-audience-section">
                <h2 class="content-heading">Siapa yang Cocok Mengikuti?</h2>
                <div class="audience-grid">
                    <div class="audience-card">
                        <h4 class="audience-title">Web Developer</h4>
                        <p class="audience-desc">Pemula - menengah</p>
                    </div>
                    <div class="audience-card">
                        <h4 class="audience-title">IT Professional</h4>
                        <p class="audience-desc">yang ingin memperdalam Laravel</p>
                    </div>
                    <div class="audience-card">
                        <h4 class="audience-title">Mahasiswa</h4>
                        <p class="audience-desc">yang tertarik di bidang web development</p>
                    </div>
                    <div class="audience-card">
                        <h4 class="audience-title">Tim Developer</h4>
                        <p class="audience-desc">di perusahaan masing-masing</p>
                    </div>
                </div>
            </div>

            <!-- TRAINER -->
            <div class="trainer-section">
                <h2 class="content-heading">Trainer</h2>
                <div class="trainer-box">
                    <img src="https://images.unsplash.com/photo-1568602471122-7832951cc4c5?auto=format&fit=crop&w=300&q=80" alt="Ahmad Rizki" class="trainer-img">
                    <div class="trainer-info">
                        <h3 class="trainer-name">Ahmad Rizki</h3>
                        <p class="trainer-role">Senior Web Developer</p>
                        <p class="trainer-desc">
                            Berpengalaman lebih dari 7 tahun dalam pengembangan aplikasi web dengan Laravel. Telah menangani berbagai proyek untuk pemerintahan dan perusahaan swasta.
                        </p>
                    </div>
                </div>
            </div>

            <!-- CEK PELATIHAN LAINNYA -->
            <div class="related-pelatihan-section">
                <h2 class="content-heading mb-4">Cek Pelatihan Lainnya</h2>
                <div class="pelatihan-grid">
                    @for ($i = 1; $i <= 3; $i++)
                        <div class="pelatihan-card">
                            <div class="card-top-banner">
                                <div class="laravel-brand-box">
                                    <i class="fa-brands fa-laravel laravel-logo-icon"></i>
                                    <span class="laravel-text">Laravel <span class="laravel-version">12</span></span>
                                </div>
                                <p class="laravel-tagline">Faster, Smarter, and More Powerful than Ever!</p>
                            </div>
                            
                            <div class="card-bottom-content">
                                <h3 class="pelatihan-card-title">Pengembangan Web Dengan Laravel 12</h3>
                                <p class="pelatihan-card-desc">Bangun aplikasi web modern dengan laravel 12</p>
                                <p class="pelatihan-price">Rp 500.000</p>
                                <div class="pelatihan-card-actions">
                                    <a href="{{ url('/pelatihan/detail') }}" class="btn-pelatihan btn-outline-dark">Lihat Selengkapnya</a>
                                    <!-- Tombol Daftar Sekarang di Bagian Rekomendasi (Sudah diperbaiki) -->
                                    <a href="{{ route('register') }}" class="btn-daftar-pelatihan">Daftar Sekarang</a>
                                </div>
                            </div>
                        </div>
                    @endfor
                </div>
            </div>

        </div>
    </div>
@endsection