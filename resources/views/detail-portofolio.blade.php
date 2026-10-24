@extends('layouts.public')

<!-- Mengubah title browser menjadi dinamis sesuai nama proyek -->
@section('title', 'Detail Portofolio - ' . $portofolio->judul)

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
            <!-- Foto Utama Proyek (Dinamis dari Database) -->
            <div class="detail-banner-img">
                @if($portofolio->gambar)
                    <img src="{{ asset('storage/' . $portofolio->gambar) }}" alt="{{ $portofolio->judul }}" class="w-full h-full object-cover">
                @else
                    <div class="w-full h-full bg-gray-200 flex items-center justify-center text-gray-400">
                        <i class="fas fa-image text-5xl"></i>
                    </div>
                @endif
            </div>

            <!-- Keterangan & Metadata Proyek -->
            <div class="detail-hero-info">
                <span class="badge-tag-blue">{{ $portofolio->kategori ?? 'Umum' }}</span>
                <h1 class="detail-title">
                    {{ $portofolio->judul }}
                </h1>
                <p class="detail-short-desc">
                    {{ Str::limit($portofolio->deskripsi, 120) }}
                </p>

                <!-- Box Informasi (Klien, Link Project, Tahun) -->
                <div class="info-badges-grid">
                    <div class="info-badge-item">
                        <div class="badge-icon"><i class="fa-solid fa-user-tie"></i></div>
                        <div>
                            <span class="badge-title">Klien</span>
                            <p class="badge-val">{{ $portofolio->nama_klien ?? '-' }}</p>
                        </div>
                    </div>

                    <div class="info-badge-item">
                        <div class="badge-icon"><i class="fa-solid fa-link"></i></div>
                        <div>
                            <span class="badge-title">Link Project</span>
                            @if($portofolio->link_project)
                                <a href="{{ $portofolio->link_project }}" target="_blank" class="badge-val link-text" style="word-break: break-all;">
                                    Kunjungi Website <i class="fa-solid fa-arrow-up-right-from-square text-[10px]"></i>
                                </a>
                            @else
                                <p class="badge-val">-</p>
                            @endif
                        </div>
                    </div>

                    <div class="info-badge-item col-span-2">
                        <div class="badge-icon"><i class="fa-solid fa-calendar-days"></i></div>
                        <div>
                            <span class="badge-title">Tahun</span>
                            <p class="badge-val">{{ $portofolio->tahun ?? '-' }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- SECTION: DESKRIPSI PROYEK -->
        <div class="detail-section-block">
            <h3 class="section-subheading">Deskripsi Proyek</h3>
            <p class="detail-full-text">
                <!-- nl2br dan e() digunakan agar jika admin menekan 'enter' di deskripsi, format paragrafnya tetap rapi -->
                {!! nl2br(e($portofolio->deskripsi)) !!}
            </p>
        </div>

        <!-- SECTION: FITUR UTAMA, HIGHLIGHT, DAN TEKNOLOGI -->
        <div class="detail-meta-grid">

            <!-- 1. Fitur Utama (Dinamis) -->
            <div class="meta-col">
                <h4 class="meta-heading">Fitur Utama</h4>
                <ul class="feature-bullets">
                    @if($portofolio->fitur_utama)
                        @php
                            // Memecah teks berdasarkan baris baru (enter)
                            $fiturArray = explode("\n", str_replace("\r", "", $portofolio->fitur_utama));
                        @endphp

                        @foreach($fiturArray as $fitur)
                            @if(trim($fitur) != '')
                                <li><i class="fa-solid fa-circle-check"></i> {{ trim($fitur) }}</li>
                            @endif
                        @endforeach
                    @else
                        <!-- Jika kosong, tampilkan pesan default -->
                        <p class="text-gray-400 text-sm italic">Belum ada rincian fitur.</p>
                    @endif
                </ul>
            </div>

            <!-- 2. Link Proyek (Pengganti Highlight statis) -->
            <div class="meta-col">
                <h4 class="meta-heading">Live Preview</h4>
                @if($portofolio->link_project)
                    <div class="bg-[#254261]/5 border border-[#254261]/10 rounded-xl p-6 h-full flex flex-col items-center justify-center text-center">
                        <div class="w-14 h-14 bg-white shadow-sm rounded-full flex items-center justify-center text-[#254261] text-2xl mb-4">
                            <i class="fa-solid fa-globe"></i>
                        </div>
                        <p class="text-sm text-gray-600 mb-4">
                            Kunjungi website atau aplikasi dari proyek ini secara langsung.
                        </p>
                        <a href="{{ $portofolio->link_project }}" target="_blank" class="inline-block w-full py-3 px-4 bg-[#254261] hover:bg-[#1a2f45] text-white text-sm font-bold rounded-lg transition-colors shadow-md">
                            Buka Tautan Proyek <i class="fa-solid fa-arrow-up-right-from-square ml-1 text-xs"></i>
                        </a>
                    </div>
                @else
                    <div class="bg-gray-50 border border-gray-100 rounded-xl p-6 h-full flex flex-col items-center justify-center text-center">
                        <div class="w-14 h-14 bg-gray-200 rounded-full flex items-center justify-center text-gray-400 text-2xl mb-4">
                            <i class="fa-solid fa-link-slash"></i>
                        </div>
                        <p class="text-sm text-gray-500 italic">
                            Tautan proyek saat ini tidak tersedia atau bersifat privat.
                        </p>
                    </div>
                @endif
            </div>

            <!-- 3. Teknologi (Dinamis) -->
            <div class="meta-col">
                <h4 class="meta-heading">Teknologi</h4>
                <div class="tech-logos-row" style="flex-wrap: wrap; gap: 10px;">
                    @if($portofolio->teknologi)
                        @php
                            // Memecah teks berdasarkan koma
                            $techArray = explode(',', $portofolio->teknologi);
                        @endphp

                        @foreach($techArray as $tech)
                            @if(trim($tech) != '')
                                <div class="tech-badge-item text-xs font-bold px-3 py-1.5 rounded-md bg-[#254261]/10 text-[#254261] border border-[#254261]/20">
                                    {{ trim($tech) }}
                                </div>
                            @endif
                        @endforeach
                    @else
                        <p class="text-gray-400 text-sm italic">Belum ada informasi teknologi.</p>
                    @endif
                </div>
            </div>
        </div>

        <!-- SECTION: CEK PORTFOLIO LAIN (Otomatis Acak dari Database) -->
        <div class="related-portfolio-section">
            <h3 class="section-subheading mb-4">Cek Portfolio Lain</h3>
            <div class="related-grid">
                @php
                    // Mengambil 3 portofolio lain dari database secara acak selain portofolio yang sedang dibuka
                    $relatedPortofolios = \App\Models\Portofolio::where('id', '!=', $portofolio->id)->inRandomOrder()->take(3)->get();
                @endphp

                @forelse ($relatedPortofolios as $item)
                    <div class="portfolio-card">
                        <div class="card-img-wrap">
                            @if($item->gambar)
                                <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->judul }}" class="w-full h-full object-cover">
                            @else
                                <div class="w-full h-full bg-gray-200 flex items-center justify-center">
                                    <i class="fas fa-image text-gray-400 text-3xl"></i>
                                </div>
                            @endif
                        </div>
                        <div class="card-content-yellow">
                            <h3 class="card-project-title">{{ $item->judul }}</h3>
                            <p class="card-project-desc">
                                {{ Str::limit($item->deskripsi, 80) }}
                            </p>
                            <div class="card-footer-action">
                                <div class="tech-mini-icons">
                                    <i class="fa-brands fa-laravel text-red-500"></i>
                                    <span class="badge-php-mini">php</span>
                                </div>
                                <a href="{{ url('/portofolio/' . $item->id) }}" class="btn-detail-link">
                                    Lihat Selengkapnya <i class="fa-solid fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-gray-500 text-sm">Belum ada portofolio lain yang tersedia.</p>
                @endforelse
            </div>
        </div>

    </div>
</div>
@endsection
