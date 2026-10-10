@extends('layouts.app')

@section('title', 'Ensiklopedia Teknologi Informasi - Nusa Indo Technology')

@section('content')
    <!-- HERO HEADER: ENSIKLOPEDIA TEKNOLOGI INFORMASI (KUNING) -->
    <section class="ensiklo-hero-header">
        <div class="container text-center">
            <h1 class="ensiklo-main-title">ENSIKLOPEDIA TEKNOLOGI INFORMASI</h1>
            <p class="ensiklo-sub-title">
                Temukan Berbagai Informasi Dan Pengetahuan Seputar Dunia Teknologi Informasi
            </p>

            <!-- Search Bar -->
            <div class="ensiklo-search-wrapper">
                <form action="#" method="GET" class="ensiklo-search-form">
                    <input 
                        type="text" 
                        name="q" 
                        class="ensiklo-search-input" 
                        placeholder="Cari judul atau kata kunci"
                    >
                    <button type="submit" class="ensiklo-search-btn" aria-label="Cari">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                </form>
            </div>
        </div>
    </section>

    <!-- WRAPPER KONTEN (NAVY GELAP) -->
    <div class="ensiklo-content-wrapper">
        <div class="container">

            <!-- SECTION: TAG POPULER -->
            <section class="popular-tags-section">
                <h2 class="ensiklo-section-heading">Tag Populer</h2>
                <div class="tags-pill-cloud">
                    @php
                        // Daftar tag pill sesuai tampilan pada desain
                        $tags = array_fill(0, 31, '#pemula');
                    @endphp

                    @foreach($tags as $tag)
                        <a href="#" class="tag-pill">{{ $tag }}</a>
                    @endforeach
                </div>
            </section>

            <!-- SECTION: MATERI POPULER (GRID 3x3) -->
            <section class="popular-materials-section">
                <h2 class="ensiklo-section-heading">Materi Populer</h2>

                <div class="materials-grid">
                    @for($i = 1; $i <= 9; $i++)
                        <div class="material-card">
                            <!-- Thumbnail Gambar dengan Badge IT -->
                            <div class="material-img-wrap">
                                <img src="https://images.unsplash.com/photo-1519389950473-47ba0277781c?auto=format&fit=crop&w=700&q=80" alt="Mengenal IT Untuk Pemula">
                                <div class="material-overlay-badge">
                                    <div class="it-cube-badge">IT</div>
                                </div>
                            </div>

                            <!-- Konten Kuning -->
                            <div class="material-card-body">
                                <h3 class="material-card-title">Mengenal IT Untuk Pemula</h3>
                                <p class="material-card-desc">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                </p>

                                <!-- Footer Kartu (Tag & Tombol Detail) -->
                                <div class="material-card-footer">
                                    <div class="material-mini-tags">
                                        <span class="mini-tag">#IT</span>
                                        <span class="mini-tag">#Belajar</span>
                                    </div>
                                   <a href="{{ route('ensiklopedia.detail') }}" class="btn-read-material">
                                        Lihat Selengkapnya <i class="fa-solid fa-arrow-right"></i>
                                    </a>
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