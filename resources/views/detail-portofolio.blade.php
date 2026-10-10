@extends('layouts.app')

@section('title', 'Detail Portofolio - Dinas Kebudayaan Pariwisata JATIM')

@section('content')
<div class="detail-page-wrapper">
    <div class="container">

        <!-- Tombol Navigasi Kembali -->
        <div class="back-nav">
            <a href="{{ url('/portofolio') }}" class="back-link">
                <i class="fa-solid fa-arrow-left"></i> Detail Portfolio
            </a>
        </div>

        <!-- HERO SECTION: DETAIL PROYEK -->
        <div class="detail-hero-grid">
            <!-- Foto Utama Proyek -->
            <div class="detail-banner-img">
                <img src="https://images.unsplash.com/photo-1511578314322-379afb476865?auto=format&fit=crop&w=800&q=80" alt="Dinas Kebudayaan Pariwisata JATIM">
            </div>

            <!-- Keterangan & Metadata Proyek -->
            <div class="detail-hero-info">
                <span class="badge-tag-blue">Development</span>
                <h1 class="detail-title">
                    Dinas Kebudayaan<br>
                    Pariwisata <span class="text-amber">JATIM</span>
                </h1>
                <p class="detail-short-desc">
                    Pengembangan website profil Dinas Kebudayaan Provinsi Jawa Timur yang berisi informasi program, kegiatan, dan layanan publik.
                </p>

                <!-- Box Informasi (Klien, Link Project, Tahun) -->
                <div class="info-badges-grid">
                    <div class="info-badge-item">
                        <div class="badge-icon"><i class="fa-solid fa-user-tie"></i></div>
                        <div>
                            <span class="badge-title">Klien</span>
                            <p class="badge-val">Dinas Kebudayaan Provinsi Jatim</p>
                        </div>
                    </div>

                    <div class="info-badge-item">
                        <div class="badge-icon"><i class="fa-solid fa-link"></i></div>
                        <div>
                            <span class="badge-title">Link Project</span>
                            <a href="https://disbudpar.jatimprov.go.id" target="_blank" class="badge-val link-text">https://disbudpar.jatimprov.go.id <i class="fa-solid fa-arrow-up-right-from-square text-[10px]"></i></a>
                        </div>
                    </div>

                    <div class="info-badge-item col-span-2">
                        <div class="badge-icon"><i class="fa-solid fa-calendar-days"></i></div>
                        <div>
                            <span class="badge-title">Tahun</span>
                            <p class="badge-val">2024</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- SECTION: DESKRIPSI PROYEK -->
        <div class="detail-section-block">
            <h3 class="section-subheading">Deskripsi Proyek</h3>
            <p class="detail-full-text">
                Website profil Dinas Kebudayaan dan Pariwisata Jawa Timur yang berisi informasi program, kegiatan, dan layanan publik. Website ini dirancang untuk memudahkan masyarakat mengakses informasi terkait kebudayaan, pariwisata, dan event yang diselenggarakan oleh pemerintah provinsi.
            </p>
        </div>

        <!-- SECTION: FITUR UTAMA, HIGHLIGHT, DAN TEKNOLOGI -->
        <div class="detail-meta-grid">
            <!-- 1. Fitur Utama -->
            <div class="meta-col">
                <h4 class="meta-heading">Fitur Utama</h4>
                <ul class="feature-bullets">
                    <li><i class="fa-solid fa-circle-check"></i> Informasi profil dinas</li>
                    <li><i class="fa-solid fa-circle-check"></i> Program dan kegiatan</li>
                    <li><i class="fa-solid fa-circle-check"></i> Berita dan pengumuman</li>
                    <li><i class="fa-solid fa-circle-check"></i> Layanan publik</li>
                    <li><i class="fa-solid fa-circle-check"></i> Responsif untuk semua perangkat</li>
                </ul>
            </div>

            <!-- 2. Highlight (Mockup Layar Admin) -->
            <div class="meta-col">
                <h4 class="meta-heading">Highlight</h4>
                <div class="highlight-browser-mockup">
                    <div class="browser-header">
                        <span class="dot d-red"></span>
                        <span class="dot d-yellow"></span>
                        <span class="dot d-green"></span>
                    </div>
                    <div class="browser-content">
                        <div class="mockup-sidebar"></div>
                        <div class="mockup-table">
                            <div class="mockup-line w-80"></div>
                            <div class="mockup-line w-100"></div>
                            <div class="mockup-line w-60"></div>
                            <div class="mockup-line w-90"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 3. Teknologi -->
            <div class="meta-col">
                <h4 class="meta-heading">Teknologi</h4>
                <div class="tech-logos-row">
                    <!-- Icon Laravel -->
                    <div class="tech-badge-item" title="Laravel">
                        <i class="fa-brands fa-laravel tech-icon-laravel"></i>
                    </div>
                    <!-- Icon PHP -->
                    <div class="tech-badge-item" title="PHP">
                        <span class="php-pill-logo">php</span>
                    </div>
                    <!-- Icon MySQL -->
                    <div class="tech-badge-item" title="MySQL">
                        <span class="mysql-text-logo">MySQL</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- SECTION: CEK PORTFOLIO LAIN -->
        <div class="related-portfolio-section">
            <h3 class="section-subheading mb-4">Cek Portfolio Lain</h3>
            <div class="related-grid">
                @for ($k = 1; $k <= 3; $k++)
                    <div class="portfolio-card">
                        <div class="card-img-wrap">
                            <img src="https://images.unsplash.com/photo-1511578314322-379afb476865?auto=format&fit=crop&w=700&q=80" alt="Dinas Kebudayaan Pariwisata JATIM">
                        </div>
                        <div class="card-content-yellow">
                            <h3 class="card-project-title">Dinas Kebudayaan Pariwisata JATIM</h3>
                            <p class="card-project-desc">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                            </p>
                            <div class="card-footer-action">
                                <div class="tech-mini-icons">
                                    <i class="fa-brands fa-laravel text-red-500"></i>
                                    <span class="badge-php-mini">php</span>
                                    <span class="badge-mysql-mini">MySQL</span>
                                </div>
                                <a href="{{ url('/portofolio/detail') }}" class="btn-detail-link">
                                    Lihat Selengkapnya <i class="fa-solid fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endfor
            </div>
        </div>

    </div>
</div>
@endsection