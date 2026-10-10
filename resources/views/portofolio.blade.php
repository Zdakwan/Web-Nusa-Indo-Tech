@extends('layouts.app')

@section('title', 'Portofolio Proyek Unggulan - Nusa Indo Technology')

@section('content')
<div class="portfolio-page-wrapper">
    <div class="container">
        
        <!-- Header Judul -->
        <div class="portfolio-header">
            <h1 class="portfolio-main-title">PORTOFOLIO PROYEK UNGGULAN</h1>
        </div>

        <!-- Filter Tab Kategori -->
        <div class="portfolio-filters">
            <button class="filter-pill active" onclick="filterPortfolio('semua')">Semua</button>
            <button class="filter-pill" onclick="filterPortfolio('is-management')">Is Management</button>
            <button class="filter-pill" onclick="filterPortfolio('is-development')">Is Development</button>
            <button class="filter-pill" onclick="filterPortfolio('multimedia')">Multimedia</button>
        </div>

        <!-- Grid 12 Kartu Portofolio (3 Kolom x 4 Baris) Sesuai Desain Mockup -->
        <div class="portfolio-grid">
            @for ($i = 1; $i <= 12; $i++)
                <div class="portfolio-card" data-category="is-development">
                    <!-- Foto Proyek -->
                    <div class="card-img-wrap">
                        <img src="https://images.unsplash.com/photo-1511578314322-379afb476865?auto=format&fit=crop&w=700&q=80" alt="Dinas Kebudayaan Pariwisata JATIM">
                    </div>
                    
                    <!-- Kotak Konten Warna Kuning -->
                    <div class="card-content-yellow">
                        <h3 class="card-project-title">Dinas Kebudayaan Pariwisata JATIM</h3>
                        <p class="card-project-desc">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                        </p>

                        <!-- Logo Mini Teknologi & Tombol Detail -->
                        <div class="card-footer-action">
                            <div class="tech-mini-icons">
                                <i class="fa-brands fa-laravel icon-laravel" title="Laravel"></i>
                                <span class="badge-php-mini">php</span>
                                <span class="badge-mysql-mini">My<span class="text-white">SQL</span></span>
                            </div>
                            
                          <!-- Tombol Menuju Halaman Detail -->
                           <!-- Tombol Menuju Halaman Detail -->
                            <a href="{{ route('portofolio.detail') }}" class="btn-selengkapnya">
                                Lihat Selengkapnya <i class="fa-solid fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @endfor
        </div>

    </div>
</div>
@endsection

@section('scripts')
<script>
    function filterPortfolio(category) {
        const buttons = document.querySelectorAll('.filter-pill');
        buttons.forEach(btn => btn.classList.remove('active'));
        event.target.classList.add('active');

        const cards = document.querySelectorAll('.portfolio-card');
        cards.forEach(card => {
            if (category === 'semua' || card.getAttribute('data-category') === category) {
                card.style.display = 'flex';
            } else {
                card.style.display = 'none';
            }
        });
    }
</script>
@endsection