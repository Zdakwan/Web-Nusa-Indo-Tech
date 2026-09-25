@extends('layouts.app')

@section('title', 'Portofolio - Nusa Indo Technology')

@section('content')

    <!-- Section Portofolio -->
    <section class="portfolio-section dark-bg">
        <h1 class="page-title-white">PORTOFOLIO PROYEK UNGGULAN</h1>
        
        <!-- Filter Buttons -->
        <div class="portfolio-filters">
            <button class="filter-btn active">Semua</button>
            <button class="filter-btn">Is Management</button>
            <button class="filter-btn">Is Development</button>
            <button class="filter-btn">Multimedia</button>
        </div>

        <!-- Portfolio Grid -->
        <div class="portfolio-grid">
            
            <!-- Card 1 -->
            <div class="portfolio-card">
                <!-- Ganti dengan <img src="..."> untuk gambar asli -->
                <div class="portfolio-img-placeholder">[Foto Kegiatan / Proyek]</div>
                <div class="portfolio-card-content">
                    <h3>Dinas Kebudayaan Pariwisata JATIM</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    
                    <div class="portfolio-card-footer">
                        <div class="client-logos">
                            <!-- Placeholder untuk ikon klien kecil di pojok kiri bawah -->
                            <span class="logo-icon">🤝</span>
                            <span class="logo-icon">🌐</span>
                        </div>
                       <a href="{{ url('/portofolio/detail') }}" class="btn-small">Lihat Selengkapnya &rarr;</a>
                    </div>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="portfolio-card">
                <div class="portfolio-img-placeholder">[Foto Kegiatan / Proyek]</div>
                <div class="portfolio-card-content">
                    <h3>Dinas Kebudayaan Pariwisata JATIM</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    
                    <div class="portfolio-card-footer">
                        <div class="client-logos">
                            <span class="logo-icon">🤝</span>
                            <span class="logo-icon">🌐</span>
                        </div>
                       <a href="{{ url('/portofolio/detail') }}" class="btn-small">Lihat Selengkapnya &rarr;</a>
                    </div>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="portfolio-card">
                <div class="portfolio-img-placeholder">[Foto Kegiatan / Proyek]</div>
                <div class="portfolio-card-content">
                    <h3>Dinas Kebudayaan Pariwisata JATIM</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    
                    <div class="portfolio-card-footer">
                        <div class="client-logos">
                            <span class="logo-icon">🤝</span>
                            <span class="logo-icon">🌐</span>
                        </div>
                       <a href="{{ url('/portofolio/detail') }}" class="btn-small">Lihat Selengkapnya &rarr;</a>
                    </div>
                </div>
            </div>
            
            <!-- Card 4 -->
            <div class="portfolio-card">
                <div class="portfolio-img-placeholder">[Foto Kegiatan / Proyek]</div>
                <div class="portfolio-card-content">
                    <h3>Dinas Kebudayaan Pariwisata JATIM</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    
                    <div class="portfolio-card-footer">
                        <div class="client-logos">
                            <span class="logo-icon">🤝</span>
                            <span class="logo-icon">🌐</span>
                        </div>
                     <a href="{{ url('/portofolio/detail') }}" class="btn-small">Lihat Selengkapnya &rarr;</a>
                    </div>
                </div>
            </div>

            <!-- Card 5 -->
            <div class="portfolio-card">
                <div class="portfolio-img-placeholder">[Foto Kegiatan / Proyek]</div>
                <div class="portfolio-card-content">
                    <h3>Dinas Kebudayaan Pariwisata JATIM</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    
                    <div class="portfolio-card-footer">
                        <div class="client-logos">
                            <span class="logo-icon">🤝</span>
                            <span class="logo-icon">🌐</span>
                        </div>
                        <a href="{{ url('/portofolio/detail') }}" class="btn-small">Lihat Selengkapnya &rarr;</a>
                    </div>
                </div>
            </div>

            <!-- Card 6 -->
            <div class="portfolio-card">
                <div class="portfolio-img-placeholder">[Foto Kegiatan / Proyek]</div>
                <div class="portfolio-card-content">
                    <h3>Dinas Kebudayaan Pariwisata JATIM</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    
                    <div class="portfolio-card-footer">
                        <div class="client-logos">
                            <span class="logo-icon">🤝</span>
                            <span class="logo-icon">🌐</span>
                        </div>
                      <a href="{{ url('/portofolio/detail') }}" class="btn-small">Lihat Selengkapnya &rarr;</a>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- Panggil Komponen CTA -->
    @include('components.cta')

@endsection