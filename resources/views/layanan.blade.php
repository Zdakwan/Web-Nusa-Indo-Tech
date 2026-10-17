@extends('layouts.public')

@section('title', 'Layanan Profesional Kami - Nusa Indo Technology')

@section('content')
    <!-- HERO HEADER: LAYANAN PROFESIONAL KAMI (KUNING) -->
    <section class="services-hero-header">
        <div class="container services-hero-grid">
            <div class="services-hero-text">
                <span class="sub-badge-title">LAYANAN PROFESIONAL KAMI</span>
                <h1 class="service-item-title">Solusi IT Terintegrasi</h1>
                <p class="service-lead-desc">
                    Kami menyediakan layanan IT profesional yang disesuaikan dengan kebutuhan bisnis Anda. Temukan layanan unggulan kami di bawah ini untuk memulai transformasi digital.
                </p>
                <div class="service-points-block mt-3">
                    <p class="case-text">
                        Konsultasikan kebutuhan spesifik perusahaan Anda, dan biarkan tim ahli kami memberikan cetak biru (blueprint) IT yang paling efektif.
                    </p>
                </div>
            </div>

            <!-- ILUSTRASI 3D: CHECKLIST / CLIPBOARD -->
            <div class="illustration-box flex-center">
                <div class="isometric-board board-white">
                    <div class="board-clip"></div>
                    <div class="checklist-items">
                        <div class="check-row">
                            <span class="check-box checked-blue"><i class="fa-solid fa-check"></i></span>
                            <span class="check-line"></span>
                        </div>
                        <div class="check-row">
                            <span class="check-box checked-yellow"><i class="fa-solid fa-check"></i></span>
                            <span class="check-line"></span>
                        </div>
                        <div class="check-row">
                            <span class="check-box checked-blue"><i class="fa-solid fa-check"></i></span>
                            <span class="check-line"></span>
                        </div>
                    </div>
                    <div class="floating-hand left-hand"></div>
                    <div class="floating-hand right-hand">
                        <div class="floating-pencil"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CONTAINER DAFTAR LAYANAN (BACKGROUND NAVY GELAP) LOOPING DARI DATABASE -->
    <div class="services-dark-wrapper py-5">
        <div class="container">

            @forelse($layanan as $index => $item)
                <!-- Zigzag pattern berdasarkan indeks ganjil/genap -->
                <section class="service-zigzag-row {{ $index % 2 == 0 ? 'reverse-row' : '' }} mb-5 border-bottom border-secondary pb-4">

                    @if($index % 2 == 0)
                        <!-- Tampilan Gambar/Ikon (Kiri jika reverse) -->
                        <div class="illustration-box flex-center">
                            @if($item->gambar)
                                <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->nama_layanan }}" class="img-fluid rounded" style="max-height: 250px; object-fit: cover;">
                            @else
                                <div class="monitor-3d">
                                    <div class="monitor-screen bg-light flex-center text-primary" style="font-size: 4rem;">
                                        <i class="fa-solid fa-desktop"></i>
                                    </div>
                                </div>
                            @endif
                        </div>
                    @endif

                    <!-- Teks Detail Layanan -->
                    <div class="service-zigzag-text text-light">
                        <h2 class="service-item-title text-white">{{ $item->nama_layanan }}</h2>
                        <p class="service-lead-desc text-muted mt-3">
                            {{ $item->deskripsi }}
                        </p>
                    </div>

                    @if($index % 2 != 0)
                        <!-- Tampilan Gambar/Ikon (Kanan) -->
                        <div class="illustration-box flex-center">
                            @if($item->gambar)
                                <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->nama_layanan }}" class="img-fluid rounded" style="max-height: 250px; object-fit: cover;">
                            @else
                                <div class="bubbles-3d-group">
                                    <div class="bubble-3d bubble-purple text-center py-4 text-white font-weight-bold">
                                        <i class="fa-solid fa-code fa-2x"></i>
                                    </div>
                                </div>
                            @endif
                        </div>
                    @endif

                </section>
            @empty
                <div class="text-center text-muted py-5">
                    <h3>Belum ada layanan yang ditambahkan.</h3>
                </div>
            @endforelse

            <!-- CARDS BAWAH: PELATIHAN IT & ENSIKLOPEDIA IT -->
            <section class="bottom-features-grid mt-5">
                <div class="feature-box-yellow p-4 rounded bg-warning text-dark">
                    <h3 class="box-title">Pelatihan IT</h3>
                    <p class="box-desc">Temukan berbagai pelatihan teknologi informasi berbasis LMS yang diselenggarakan oleh para praktisi ahli kami.</p>
                    <a href="{{ route('pelatihan.index') }}" class="btn btn-dark fw-bold mt-2">Buka Pelatihan</a>
                </div>

                <div class="feature-box-yellow p-4 rounded bg-warning text-dark">
                    <h3 class="box-title">Ensiklopedia IT</h3>
                    <p class="box-desc">Baca panduan, artikel teknis, dan dokumentasi penyelesaian masalah IT di direktori ensiklopedia kami.</p>
                    <a href="{{ route('ensiklopedia.index') }}" class="btn btn-dark fw-bold mt-2">Buka Ensiklopedia</a>
                </div>
            </section>

        </div>
    </div>
@endsection
