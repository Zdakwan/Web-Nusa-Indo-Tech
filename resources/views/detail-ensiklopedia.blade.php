@extends('layouts.public')

@section('title', 'Detail Ensiklopedia - ' . $ensiklopedia->judul)

@section('content')
<div class="ensiklo-detail-wrapper">
    <div class="container">

        <!-- Tombol Kembali -->
        <div class="back-nav">
            <a href="{{ route('ensiklopedia.index') }}" class="back-link">
                <i class="fa-solid fa-arrow-left"></i> Detail Ensiklopedia
            </a>
        </div>

        <!-- HERO DETAIL ENSIKLOPEDIA -->
        <div class="ensiklo-hero-detail-grid">
            <!-- Teks Judul & Ringkasan -->
            <div class="hero-detail-text">
                <h1 class="ensiklo-article-title">
                    {{ $ensiklopedia->judul }}
                </h1>
                <p class="ensiklo-article-lead">
                    {{ \Illuminate\Support\Str::limit(strip_tags($ensiklopedia->konten), 150, '...') }}
                </p>

                <!-- Tags Pill -->
                <div class="article-tags-group">
                    <span class="badge-pill-cyan">#{{ \Illuminate\Support\Str::slug($ensiklopedia->kategori, '') }}</span>
                </div>
            </div>

            <!-- Gambar Header dengan Badge IT -->
            <div class="hero-detail-img-box">
                <div class="article-thumb-wrap">
                    @if($ensiklopedia->gambar)
                        <img src="{{ asset('storage/' . $ensiklopedia->gambar) }}" alt="{{ $ensiklopedia->judul }}">
                    @else
                        <!-- Fallback jika tidak ada gambar -->
                        <div style="width: 100%; height: 300px; background-color: #1a2f45; display: flex; align-items: center; justify-content: center; color: #a0aec0;">
                            <i class="fas fa-image" style="font-size: 4rem;"></i>
                        </div>
                    @endif
                    <div class="article-badge-it-wrap">
                        <div class="it-cube-badge">IT</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="article-divider-line"></div>

        <!-- ISI KONTEN ARTIKEL -->
        <article class="article-body-content">
            <section class="content-section-block">
                <!-- Kita asumsikan konten yang diinput dari admin sudah mencakup Tag Heading (H2, H3), Paragraf, dsb -->
                <!-- nl2br untuk mengatur spasi enter jika input dari textarea biasa -->
                <div class="content-paragraph text-gray-300">
                    {!! nl2br(e($ensiklopedia->konten)) !!}
                </div>
            </section>
        </article>

        <!-- SECTION: CEK ARTIKEL LAINNYA -->
        <section class="other-articles-section">
            <h2 class="content-heading mb-4">Cek Artikel Lainnya</h2>

            <div class="materials-grid">
                @forelse($artikel_lain ?? [] as $lain)
                    <div class="material-card">
                        <div class="material-img-wrap">
                            @if($lain->gambar)
                                <img src="{{ asset('storage/' . $lain->gambar) }}" alt="{{ $lain->judul }}">
                            @else
                                <div style="width: 100%; height: 200px; background-color: #254261; display: flex; align-items: center; justify-content: center;">
                                    <i class="fas fa-file-alt text-gray-400 text-4xl"></i>
                                </div>
                            @endif
                            <div class="material-overlay-badge">
                                <div class="it-cube-badge">IT</div>
                            </div>
                        </div>

                        <div class="material-card-body">
                            <h3 class="material-card-title">{{ $lain->judul }}</h3>
                            <p class="material-card-desc">
                                {{ \Illuminate\Support\Str::limit(strip_tags($lain->konten), 90, '...') }}
                            </p>

                            <div class="material-card-footer">
                                <div class="material-mini-tags">
                                    <span class="mini-tag">#{{ \Illuminate\Support\Str::slug($lain->kategori, '') }}</span>
                                </div>
                                <a href="{{ route('ensiklopedia.detail', $lain->id) }}" class="btn-read-material">
                                    Lihat Selengkapnya <i class="fa-solid fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-gray-400">Belum ada artikel lain yang tersedia.</p>
                @endforelse
            </div>
        </section>

    </div>
</div>
@endsection
