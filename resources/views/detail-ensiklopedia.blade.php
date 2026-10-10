@extends('layouts.app')

@section('title', 'Detail Ensiklopedia - Mengenal IT Untuk Pemula')

@section('content')
<div class="ensiklo-detail-wrapper">
    <div class="container">

        <!-- Tombol Kembali -->
        <div class="back-nav">
            <a href="{{ url('/ensiklopedia') }}" class="back-link">
                <i class="fa-solid fa-arrow-left"></i> Detail Ensiklopedia
            </a>
        </div>

        <!-- HERO DETAIL ENSIKLOPEDIA -->
        <div class="ensiklo-hero-detail-grid">
            <!-- Teks Judul & Ringkasan -->
            <div class="hero-detail-text">
                <h1 class="ensiklo-article-title">
                    Mengenal IT <span class="text-amber">Untuk Pemula</span>
                </h1>
                <p class="ensiklo-article-lead">
                    Pelajari dasar-dasar teknologi informasi, mulai dari pengertian, komponen utama, hingga peran pentingnyadalam kehidupan sehari-hari
                </p>

                <!-- Tags Pill -->
                <div class="article-tags-group">
                    <span class="badge-pill-cyan">#pemula</span>
                    <span class="badge-pill-cyan">#teknologi</span>
                    <span class="badge-pill-cyan">#digitalisasi</span>
                </div>
            </div>

            <!-- Gambar Header dengan Badge IT -->
            <div class="hero-detail-img-box">
                <div class="article-thumb-wrap">
                    <img src="https://images.unsplash.com/photo-1519389950473-47ba0277781c?auto=format&fit=crop&w=800&q=80" alt="Mengenal IT">
                    <div class="article-badge-it-wrap">
                        <div class="it-cube-badge">IT</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="article-divider-line"></div>

        <!-- ISI KONTEN ARTIKEL -->
        <article class="article-body-content">
            <!-- 1. Pengertian IT -->
            <section class="content-section-block">
                <h2 class="content-heading">Pengertian IT</h2>
                <p class="content-paragraph">
                    Teknologi Informasi (Information Technology / IT) adalah segala bentuk teknologi yang digunakan untuk mengelola, memproses, menyimpan, dan mendistribusikan informasi dalam bentuk digital. IT mencakup perangkat keras, opoerangkat lunak, jaringan, data serta manusia yang mengoperasikannya.
                </p>
            </section>

            <!-- 2. Komponen Utama IT -->
            <section class="content-section-block">
                <h2 class="content-heading">Komponen Utama IT</h2>
                <p class="content-paragraph mb-4">
                    Secara umum, teknologi informasi terdiri dari beberapa komponen utama
                </p>

                <!-- Grid 4 Card Komponen -->
                <div class="komponen-cards-grid">
                    @for($i = 1; $i <= 4; $i++)
                        <div class="komponen-card-outline">
                            <div class="komponen-icon-box">
                                <i class="fa-solid fa-desktop"></i>
                            </div>
                            <h3 class="komponen-card-title">Perangkat Keras<br>(Hardware)</h3>
                            <p class="komponen-card-desc">
                                Komponen fisik seperti komputer, server, jaringan, dan perangkat lainnya
                            </p>
                        </div>
                    @endfor
                </div>
            </section>

            <!-- 3. Manfaat Utama IT (Box Banner Kuning) -->
            <section class="content-section-block">
                <h2 class="content-heading">Manfaat Utama IT</h2>
                <p class="content-paragraph mb-4">
                    Teknologi informasi memberikan banyak manfaat diantaranya
                </p>

                <div class="manfaat-yellow-banner">
                    <div class="manfaat-item">
                        <i class="fa-solid fa-circle-check"></i>
                        <span>Memudahkan akses informasi kapan saja dan di mana saja</span>
                    </div>
                    <div class="manfaat-item">
                        <i class="fa-solid fa-circle-check"></i>
                        <span>Meningkatkan efesiensi dan produktivitas kerja</span>
                    </div>
                    <div class="manfaat-item">
                        <i class="fa-solid fa-circle-check"></i>
                        <span>Mendukung komunikasi yang lebih cepat dan efektif</span>
                    </div>
                    <div class="manfaat-item">
                        <i class="fa-solid fa-circle-check"></i>
                        <span>Membuka peluang inovasi dan bisnis baru</span>
                    </div>
                </div>
            </section>

            <!-- 4. Kesimpulan -->
            <section class="content-section-block">
                <h2 class="content-heading">Kesimpulan</h2>
                <p class="content-paragraph">
                    IT sudah menjadi bagian penting dalam kehidupan Modern. Dengan memahami dasar-ddasarnya anda dapat lebih siap menghadapi perkembangan teknologi dan memanfaatkannya untuk mendukung pendidikan, pekerjaan, maupun bisnis di masa depan.
                </p>
            </section>
        </article>

        <!-- SECTION: CEK ARTIKEL LAINNYA -->
        <section class="other-articles-section">
            <h2 class="content-heading mb-4">Cek Artikel Lainnya</h2>

            <div class="materials-grid">
                @for($k = 1; $k <= 3; $k++)
                    <div class="material-card">
                        <div class="material-img-wrap">
                            <img src="https://images.unsplash.com/photo-1519389950473-47ba0277781c?auto=format&fit=crop&w=700&q=80" alt="Mengenal IT Untuk Pemula">
                            <div class="material-overlay-badge">
                                <div class="it-cube-badge">IT</div>
                            </div>
                        </div>

                        <div class="material-card-body">
                            <h3 class="material-card-title">Mengenal IT Untuk Pemula</h3>
                            <p class="material-card-desc">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                            </p>

                            <div class="material-card-footer">
                                <div class="material-mini-tags">
                                    <span class="mini-tag">#IT</span>
                                    <span class="mini-tag">#Belajar</span>
                                </div>
                                <a href="{{ url('/ensiklopedia/detail') }}" class="btn-read-material">
                                    Lihat Selengkapnya <i class="fa-solid fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endfor
            </div>
        </section>

    </div>
</div>
@endsection