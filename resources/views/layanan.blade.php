@extends('layouts.public')

@section('title', 'Layanan Profesional - Nusa Indo Technology')

@section('content')

    <!-- HERO SECTION (Banner Utama) -->
    <section class="relative bg-nusaNavy text-white py-16 lg:py-24 overflow-hidden">
        <!-- Subtly Textured Background Overlay -->
        <div class="absolute inset-0 opacity-10 bg-[radial-gradient(#f5b73e_1px,transparent_1px)] [background-size:16px_16px]"></div>

        <div class="container mx-auto px-6 relative z-10 max-w-7xl">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <!-- Sisi Kiri: Teks Heading dan Deskripsi -->
                <div class="space-y-6 text-center lg:text-left">
                    <span class="inline-block px-4 py-1.5 rounded-full bg-nusaYellow/20 text-nusaYellow font-bold text-xs tracking-wider uppercase">
                        LAYANAN PROFESIONAL KAMI
                    </span>
                    <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold leading-tight tracking-tight">
                        Solusi IT <span class="text-nusaYellow">Terintegrasi</span>
                    </h1>
                    <p class="text-gray-300 text-lg leading-relaxed max-w-xl mx-auto lg:mx-0">
                        Kami menyediakan layanan IT profesional yang disesuaikan dengan kebutuhan bisnis Anda. Temukan layanan unggulan kami di bawah ini untuk memulai transformasi digital.
                    </p>
                    <p class="text-gray-400 text-sm italic max-w-xl mx-auto lg:mx-0">
                        Konsultasikan kebutuhan spesifik perusahaan Anda, dan biarkan tim ahli kami memberikan cetak biru (blueprint) IT yang paling efektif.
                    </p>

                    <!-- Form Pencarian Interaktif -->
                    <div class="pt-4 max-w-md mx-auto lg:mx-0">
                        <form action="" method="GET" class="relative flex items-center">
                            <input type="text" name="search" placeholder="Cari layanan..." class="w-full pl-5 pr-12 py-3.5 bg-white/10 backdrop-blur-md text-white border border-white/20 rounded-2xl focus:outline-none focus:ring-2 focus:ring-nusaYellow focus:border-transparent placeholder-gray-400 text-sm">
                            <button type="submit" class="absolute right-3.5 p-2 bg-nusaYellow text-nusaNavyDark rounded-xl hover:bg-nusaYellowHover transition-colors">
                                <i class="fas fa-search text-xs"></i>
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Sisi Kanan: Ilustrasi Clipboard 3D -->
                <div class="relative flex justify-center">
                    <div class="relative w-72 md:w-80 lg:w-96 transform hover:rotate-1 transition-transform duration-500">
                        <div class="absolute -inset-4 bg-nusaYellow/20 rounded-3xl blur-3xl opacity-30"></div>

                        <div class="bg-white rounded-[2.5rem] shadow-2xl p-8 border border-gray-100 flex flex-col items-center">
                            <div class="w-24 h-6 bg-blue-500 rounded-full -mt-10 mb-8 flex items-center justify-center">
                                <div class="w-12 h-2 bg-blue-600 rounded-full"></div>
                            </div>

                            <div class="w-full space-y-6">
                                <div class="flex items-center gap-4">
                                    <div class="w-8 h-8 rounded-lg bg-blue-500 text-white flex items-center justify-center shadow-md">
                                        <i class="fa-solid fa-check text-xs"></i>
                                    </div>
                                    <div class="h-4 bg-gray-100 rounded-full flex-1"></div>
                                </div>
                                <div class="flex items-center gap-4">
                                    <div class="w-8 h-8 rounded-lg bg-nusaYellow text-nusaNavyDark flex items-center justify-center shadow-md">
                                        <i class="fa-solid fa-check text-xs"></i>
                                    </div>
                                    <div class="h-4 bg-gray-100 rounded-full flex-1 w-2/3"></div>
                                </div>
                                <div class="flex items-center gap-4">
                                    <div class="w-8 h-8 rounded-lg bg-blue-500 text-white flex items-center justify-center shadow-md">
                                        <i class="fa-solid fa-check text-xs"></i>
                                    </div>
                                    <div class="h-4 bg-gray-100 rounded-full flex-1 w-3/4"></div>
                                </div>
                            </div>
                        </div>

                        <div class="absolute -bottom-6 -left-6 w-16 h-16 bg-blue-500 rounded-2xl shadow-xl flex items-center justify-center text-white text-2xl transform -rotate-12">
                            <i class="fa-solid fa-gear spin-slow"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION KELOLA & FILTER DATA LAYANAN -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-6 max-w-7xl">
            <!-- Header section dan filter kategori -->
            <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-12">
                <div>
                    <span class="text-nusaYellow font-bold text-sm uppercase tracking-wider">Ekspertis & Layanan</span>
                    <h2 class="text-3xl font-extrabold text-nusaNavy mt-1">Daftar Layanan</h2>
                </div>
                <!-- TOMBOL FILTER DIMODIFIKASI -->
                <div class="flex flex-wrap gap-2 text-sm font-semibold" id="filter-container">
                    <button onclick="filterLayanan('Semua', this)" class="filter-btn px-5 py-2 rounded-xl bg-nusaYellow text-nusaNavyDark shadow-md transition-all">Semua</button>
                    <button onclick="filterLayanan('Tata Kelola', this)" class="filter-btn px-5 py-2 rounded-xl bg-white hover:bg-gray-100 text-gray-600 transition-all">Tata Kelola</button>
                    <button onclick="filterLayanan('Development', this)" class="filter-btn px-5 py-2 rounded-xl bg-white hover:bg-gray-100 text-gray-600 transition-all">Development</button>
                    <button onclick="filterLayanan('Infrastruktur', this)" class="filter-btn px-5 py-2 rounded-xl bg-white hover:bg-gray-100 text-gray-600 transition-all">Infrastruktur</button>
                </div>
            </div>

            <!-- GRID DATA LAYANAN DINAMIS -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
                @php
                    $ikonDefault = [
                        'IT Governance & Training IT' => 'fa-shield-halved',
                        'Enterprise Architecture' => 'fa-building-columns',
                        'IT Portfolio Management' => 'fa-folder-open',
                        'Hardware Development' => 'fa-microchip',
                        'Software Development' => 'fa-code',
                        'Multimedia' => 'fa-circle-play',
                    ];
                @endphp

                @forelse($layanan ?? [] as $item)
                    @php
                        $currentIcon = $ikonDefault[$item->nama_layanan] ?? 'fa-laptop-code';
                    @endphp

                    <!-- CARD LAYANAN DINAMIS (DIMODIFIKASI DENGAN DATA-KATEGORI) -->
                    <div class="layanan-card bg-white border border-gray-100 rounded-3xl p-6 shadow-sm hover:shadow-xl transition-all duration-300 hover:-translate-y-1.5 flex flex-col justify-between group" data-kategori="{{ $item->kategori ?? 'Umum' }}">
                        <div>
                            <div class="w-14 h-14 rounded-2xl bg-nusaNavy/5 text-nusaNavy flex items-center justify-center text-2xl mb-6 group-hover:bg-nusaYellow group-hover:text-nusaNavy transition-colors duration-300">
                                <i class="fa-solid {{ $currentIcon }}"></i>
                            </div>

                            <h3 class="text-xl font-bold text-nusaNavy mb-2 leading-snug">{{ $item->nama_layanan }}</h3>

                            <!-- BLOK RATING DINAMIS -->
                            @php
                                $ratingAvg = $item->portofolios_avg_rating ?? 0;
                                $ratingFormat = number_format($ratingAvg, 1);
                                $jumlahPortofolio = $item->portofolios_count ?? 0;
                            @endphp

                            <div class="flex items-center gap-1.5 mb-3">
                                <div class="text-nusaYellow text-[11px] flex gap-0.5">
                                    @for($i = 1; $i <= 5; $i++)
                                        @if($i <= floor($ratingAvg))
                                            <i class="fas fa-star"></i>
                                        @elseif($i == ceil($ratingAvg) && $ratingAvg - floor($ratingAvg) > 0)
                                            <i class="fas fa-star-half-alt"></i>
                                        @else
                                            <i class="far fa-star text-gray-300"></i>
                                        @endif
                                    @endfor
                                </div>
                                <span class="text-xs font-bold text-nusaNavy ml-1">{{ $ratingFormat }}</span>
                                <span class="text-[10px] text-gray-400">({{ $jumlahPortofolio }} Bukti Portofolio)</span>
                            </div>
                            <!-- AKHIR BLOK RATING DINAMIS -->

                            <span class="inline-block px-2.5 py-1 text-[11px] font-bold tracking-wider uppercase bg-nusaNavy/5 text-nusaNavy rounded mb-4">
                                {{ $item->kategori ?? 'Umum' }}
                            </span>

                            <p class="text-gray-500 text-sm leading-relaxed mb-6">
                                {{ \Illuminate\Support\Str::limit($item->deskripsi, 120) }}
                            </p>
                        </div>

                        <!-- Tombol CTA -->
                        <div class="space-y-2 mt-auto">
                            <a href="{{ route('layanan.detail', $item->id) }}" class="block text-center w-full py-3 px-4 rounded-xl border-2 border-nusaNavy text-nusaNavy text-xs font-bold hover:bg-nusaNavy hover:text-white transition-all">
                                Detail Layanan
                            </a>
                            <a href="{{ route('login') }}" class="block text-center w-full py-3 px-4 rounded-xl bg-nusaYellow text-nusaNavyDark text-xs font-extrabold hover:bg-nusaYellowHover transition-all shadow-sm">
                                Konsultasikan
                            </a>
                        </div>
                    </div>
                @empty
                    <!-- Jika database Kosong -->
                    <div class="col-span-full flex justify-center py-12">
                        <div class="bg-white border-2 border-dashed border-gray-200 rounded-[2rem] p-12 text-center max-w-lg w-full shadow-sm">
                            <div class="w-20 h-20 bg-gray-50 rounded-full flex items-center justify-center mx-auto mb-6">
                                <i class="fa-solid fa-list-check text-4xl text-gray-400"></i>
                            </div>
                            <h3 class="text-xl font-bold text-nusaNavy mb-2">Belum Ada Layanan</h3>
                            <p class="text-gray-500">Super Admin belum menambahkan atau mengelola data layanan pada sistem backend.</p>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- SCRIPT FILTER LAYANAN (DIPERBARUI) -->
    <script>
        function filterLayanan(kategoriPilihan, tombolYangDiklik) {
            // 1. Reset warna semua tombol
            const semuaTombol = document.querySelectorAll('.filter-btn');
            semuaTombol.forEach(tombol => {
                tombol.className = 'filter-btn px-5 py-2 rounded-xl bg-white hover:bg-gray-100 text-gray-600 transition-all';
            });

            // 2. Ubah warna tombol aktif
            tombolYangDiklik.className = 'filter-btn px-5 py-2 rounded-xl bg-nusaYellow text-nusaNavyDark shadow-md transition-all';

            // 3. Filter kartu layanan berdasarkan Kategori ATAU Nama Layanan
            const semuaKartu = document.querySelectorAll('.layanan-card');
            semuaKartu.forEach(kartu => {
                const kategoriKartu = kartu.getAttribute('data-kategori').toLowerCase();
                const namaLayanan = kartu.querySelector('h3').innerText.toLowerCase(); // Mengambil judul layanan
                const kataKunci = kategoriPilihan.toLowerCase();

                // Logika: Jika tombol 'Semua' diklik ATAU Kategori cocok ATAU Judul cocok
                if (kataKunci === 'semua' || kategoriKartu.includes(kataKunci) || namaLayanan.includes(kataKunci)) {
                    kartu.style.display = 'flex';
                } else {
                    kartu.style.display = 'none';
                }
            });
        }
    </script>

@endsection
