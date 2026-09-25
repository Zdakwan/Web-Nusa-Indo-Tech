@extends('layouts.app')

@section('title', 'Detail Portfolio - Nusa Indo Technology')

@section('content')

    <div class="dark-bg detail-page-wrapper">
        
        <!-- Tombol Kembali -->
        <div class="back-navigation">
            <a href="{{ url('/portofolio') }}">&larr; Detail Portfolio</a>
        </div>

        <!-- Section Info Utama (Hero Detail) -->
        <section class="detail-hero">
            <div class="detail-image-main">
                <div class="image-placeholder-large">[Foto Tim/Proyek JATIM]</div>
            </div>
            
            <div class="detail-hero-text">
                <span class="badge-blue">Development</span>
                <h1>Dinas Kebudayaan Pariwisata JATIM</h1>
                <p class="detail-subtitle">Pengembangan website profil Dinas Kebudayaan Provinsi Jawa Timur yang berisi informasi program, kegiatan, dan layanan publik.</p>
                
                <div class="info-boxes-grid">
                    <div class="info-box">
                        <span class="info-icon">🏢</span>
                        <div>
                            <strong>Klien</strong>
                            <p>Dinas Kebudayaan Provinsi Jatim</p>
                        </div>
                    </div>
                    <div class="info-box">
                        <span class="info-icon">🔗</span>
                        <div>
                            <strong>Link Project</strong>
                            <p><a href="#">https://disbudpar.jatimprov.go.id &nearr;</a></p>
                        </div>
                    </div>
                    <div class="info-box">
                        <span class="info-icon">📅</span>
                        <div>
                            <strong>Tahun</strong>
                            <p>2024</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Section Deskripsi Proyek -->
        <section class="detail-description">
            <h2>Deskripsi Proyek</h2>
            <p>Website profil Dinas Kebudayaan dan Pariwisata Jawa Timur yang berisi informasi program, kegiatan, dan layanan publik. Website ini dirancang untuk memudahkan masyarakat mengakses informasi terkait kebudayaan, pariwisata, dan event yang diselenggarakan oleh pemerintah provinsi.</p>
            
            <div class="specs-grid">
                <!-- Kolom Fitur Utama -->
                <div class="spec-col">
                    <h3>Fitur Utama</h3>
                    <ul class="feature-list">
                        <li><span class="bullet-icon">🔷</span> Informasi profil dinas</li>
                        <li><span class="bullet-icon">🔷</span> Program dan kegiatan</li>
                        <li><span class="bullet-icon">🔷</span> Berita dan pengumuman</li>
                        <li><span class="bullet-icon">🔷</span> Layanan publik</li>
                        <li><span class="bullet-icon">🔷</span> Responsif untuk semua perangkat</li>
                    </ul>
                </div>
                
                <!-- Kolom Highlight -->
                <div class="spec-col">
                    <h3>Highlight</h3>
                    <div class="highlight-image">
                        <div class="image-placeholder-small">[Gambar UI Dashboard]</div>
                    </div>
                </div>
                
                <!-- Kolom Teknologi -->
                <div class="spec-col">
                    <h3>Teknologi</h3>
                    <div class="tech-logos">
                        <!-- Gunakan gambar logo asli nantinya -->
                        <span class="tech-icon" style="color: #FF2D20;">Laravel</span>
                        <span class="tech-icon" style="color: #777BB4;">PHP</span>
                        <span class="tech-icon" style="color: #00758F;">MySQL</span>
                    </div>
                </div>
            </div>
        </section>

        <!-- Section Cek Portfolio Lain (Re-use komponen grid) -->
        <section class="related-portfolio">
            <h2>Cek Portfolio Lain</h2>
            <div class="portfolio-grid">
                
                <!-- Card 1 -->
                <div class="portfolio-card">
                    <div class="portfolio-img-placeholder">[Foto Kegiatan]</div>
                    <div class="portfolio-card-content">
                        <h3>Dinas Kebudayaan Pariwisata JATIM</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        <div class="portfolio-card-footer">
                            <div class="client-logos">
                                <span class="logo-icon">🤝</span>
                            </div>
                            <a href="{{ url('/portofolio/detail') }}" class="btn-small">Lihat Selengkapnya &rarr;</a>
                        </div>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="portfolio-card">
                    <div class="portfolio-img-placeholder">[Foto Kegiatan]</div>
                    <div class="portfolio-card-content">
                        <h3>Dinas Kebudayaan Pariwisata JATIM</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        <div class="portfolio-card-footer">
                            <div class="client-logos">
                                <span class="logo-icon">🤝</span>
                            </div>
                            <a href="{{ url('/portofolio/detail') }}" class="btn-small">Lihat Selengkapnya &rarr;</a>
                        </div>
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="portfolio-card">
                    <div class="portfolio-img-placeholder">[Foto Kegiatan]</div>
                    <div class="portfolio-card-content">
                        <h3>Dinas Kebudayaan Pariwisata JATIM</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        <div class="portfolio-card-footer">
                            <div class="client-logos">
                                <span class="logo-icon">🤝</span>
                            </div>
                            <a href="{{ url('/portofolio/detail') }}" class="btn-small">Lihat Selengkapnya &rarr;</a>
                        </div>
                    </div>
                </div>

            </div>
        </section>

    </div> <!-- End of dark-bg detail-page-wrapper -->

    <!-- Panggil Komponen CTA -->
    @include('components.cta')

@endsection