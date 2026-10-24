@extends('layouts.public')

@section('title', 'Detail Pelatihan - ' . $pelatihan->judul)

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
                        {{ $pelatihan->judul }}
                    </h1>
                    <p class="hero-subtitle-light">
                        {{ Str::limit($pelatihan->deskripsi, 120) }}
                    </p>

                    <div class="hero-tags-group">
                        <span class="badge-pill-light-blue">#{{ Str::slug($pelatihan->kategori ?? 'pelatihan') }}</span>
                    </div>
                </div>

                <!-- Gambar Pelatihan (Dinamis) -->
                <div class="pelatihan-hero-illustration">
                    @if($pelatihan->gambar)
                        <img src="{{ asset('storage/' . $pelatihan->gambar) }}" alt="{{ $pelatihan->judul }}" class="w-full h-auto object-cover rounded-2xl shadow-2xl" style="max-height: 350px;">
                    @else
                        <div class="w-full h-64 bg-gray-100 rounded-2xl shadow-xl flex flex-col items-center justify-center text-gray-400">
                            <i class="fa-solid fa-image text-5xl mb-2"></i>
                            <span>Tidak ada gambar</span>
                        </div>
                    @endif
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
                        {!! nl2br(e($pelatihan->deskripsi)) !!}
                    </p>
                </div>

                <div class="price-column">
                    <div class="price-box">
                        <h3 class="price-amount">Rp {{ number_format($pelatihan->harga, 0, ',', '.') }}</h3>
                        <p class="price-note">per peserta</p>
                        <!-- Tombol Daftar Sekarang -->
                        <a href="{{ route('register') }}" class="btn-daftar-pelatihan">Daftar Sekarang</a>
                    </div>
                </div>
            </div>

            <!-- APA YANG AKAN DIPELAJARI? (Statis - Belum ada di Database) -->
            <div class="materi-section">
                <h2 class="content-heading">Apa yang akan Dipelajari?</h2>
                <div class="materi-check-grid">
                    <div class="check-item"><i class="fa-solid fa-circle-check text-amber"></i> Pemahaman konsep dasar</div>
                    <div class="check-item"><i class="fa-solid fa-circle-check text-amber"></i> Praktek studi kasus</div>
                    <div class="check-item"><i class="fa-solid fa-circle-check text-amber"></i> Implementasi langsung</div>
                    <div class="check-item"><i class="fa-solid fa-circle-check text-amber"></i> Evaluasi hasil belajar</div>
                </div>
            </div>

            <!-- SIAPA YANG COCOK MENGIKUTI? (Statis - Belum ada di Database) -->
            <div class="target-audience-section">
                <h2 class="content-heading">Siapa yang Cocok Mengikuti?</h2>
                <div class="audience-grid">
                    <div class="audience-card">
                        <h4 class="audience-title">Pemula</h4>
                        <p class="audience-desc">Yang baru terjun ke bidang ini</p>
                    </div>
                    <div class="audience-card">
                        <h4 class="audience-title">Mahasiswa/Pelajar</h4>
                        <p class="audience-desc">Untuk menambah portofolio</p>
                    </div>
                    <div class="audience-card">
                        <h4 class="audience-title">Profesional</h4>
                        <p class="audience-desc">Untuk peningkatan karir</p>
                    </div>
                </div>
            </div>

            <!-- TRAINER (Statis - Belum ada di Database) -->
            <div class="trainer-section">
                <h2 class="content-heading">Trainer</h2>
                <div class="trainer-box">
                    <div class="w-24 h-24 bg-gray-200 rounded-full flex items-center justify-center text-gray-400 text-3xl">
                        <i class="fa-solid fa-user-tie"></i>
                    </div>
                    <div class="trainer-info ml-6">
                        <h3 class="trainer-name">Tim Ahli Nusa Indo Tech</h3>
                        <p class="trainer-role">Instruktur Profesional</p>
                        <p class="trainer-desc">
                            Pelatihan ini akan dibawakan secara langsung oleh tim ahli dan praktisi berpengalaman dari Nusa Indo Technology.
                        </p>
                    </div>
                </div>
            </div>

            <!-- CEK PELATIHAN LAINNYA (Dinamis dari Database) -->
            <div class="related-pelatihan-section">
                <h2 class="content-heading mb-4">Cek Pelatihan Lainnya</h2>
                <div class="pelatihan-grid">
                    @php
                        // Mengambil 3 pelatihan lain dari database secara acak
                        $relatedPelatihan = \App\Models\Pelatihan::where('id', '!=', $pelatihan->id)->inRandomOrder()->take(3)->get();
                    @endphp

                    @forelse ($relatedPelatihan as $item)
                        <div class="pelatihan-card flex flex-col bg-white border border-gray-100 rounded-2xl shadow-sm overflow-hidden">
                            <!-- Banner Atas -->
                            <div class="h-40 w-full bg-gray-100 flex-shrink-0">
                                @if($item->gambar)
                                    <img src="{{ asset('storage/' . $item->gambar) }}" class="w-full h-full object-cover" alt="{{ $item->judul }}">
                                @else
                                    <div class="w-full h-full flex items-center justify-center text-gray-300 text-4xl">
                                        <i class="fas fa-image"></i>
                                    </div>
                                @endif
                            </div>

                            <!-- Konten Card Bawah -->
                            <div class="p-6 flex flex-col flex-grow">
                                <span class="inline-block px-3 py-1 bg-amber-100 text-amber-600 text-[10px] font-bold uppercase rounded-md mb-3 self-start">
                                    {{ $item->kategori }}
                                </span>
                                <h3 class="text-lg font-bold text-nusaNavy mb-2">{{ $item->judul }}</h3>
                                <p class="text-sm text-gray-500 mb-4 flex-grow">{{ Str::limit($item->deskripsi, 60) }}</p>
                                <p class="text-lg font-extrabold text-nusaNavy mb-4">Rp {{ number_format($item->harga, 0, ',', '.') }}</p>

                                <div class="flex gap-2 mt-auto">
                                    <a href="{{ url('/pelatihan/' . $item->id) }}" class="flex-1 text-center py-2.5 border-2 border-gray-200 text-gray-600 font-bold text-xs rounded-xl hover:bg-gray-50">Info Detail</a>
                                    <a href="{{ route('register') }}" class="flex-1 text-center py-2.5 bg-nusaYellow text-nusaNavyDark font-bold text-xs rounded-xl hover:bg-nusaYellowHover">Daftar Kelas</a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p class="text-gray-500 text-sm">Belum ada pelatihan lain yang tersedia.</p>
                    @endforelse
                </div>
            </div>

        </div>
    </div>
@endsection
