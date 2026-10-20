@extends('layouts.public')

@section('title', 'Beranda - Nusa Indo Technology')

@section('content')

    <!-- HERO SECTION (Banner Utama) -->
    <section class="relative bg-nusaNavy text-white py-20 lg:py-28 overflow-hidden">
        <div class="absolute inset-0 opacity-10 bg-[radial-gradient(#f5b73e_1px,transparent_1px)] [background-size:16px_16px]"></div>
        <div class="container mx-auto px-6 relative z-10 max-w-7xl">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div class="space-y-6 text-center lg:text-left">
                    <span class="inline-block px-4 py-1.5 rounded-full bg-nusaYellow/20 text-nusaYellow font-semibold text-sm tracking-wide">
                        IT MANAGEMENT CONSULTANT
                    </span>
                    <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold leading-tight tracking-tight">
                        Solusi IT Terintegrasi <br class="hidden sm:inline"><span class="text-nusaYellow">Untuk Masa Depan Bisnis Anda</span>
                    </h1>
                    <p class="text-gray-300 text-lg leading-relaxed max-w-xl mx-auto lg:mx-0">
                        Kami menyediakan layanan konsultasi, arsitektur sistem, tata kelola, dan pengembangan teknologi profesional untuk mempercepat transformasi digital perusahaan Anda.
                    </p>
                    <div class="flex flex-wrap justify-center lg:justify-start gap-4 pt-4">
                        <a href="{{ route('layanan') }}" class="px-8 py-3.5 rounded-xl bg-nusaYellow text-nusaNavyDark font-bold hover:bg-nusaYellowHover transition-all shadow-lg hover:-translate-y-0.5">
                            Jelajahi Layanan
                        </a>
                        <a href="{{ route('login') }}" class="px-8 py-3.5 rounded-xl bg-white/10 hover:bg-white/20 text-white font-bold transition-all border border-white/20">
                            Masuk Klien
                        </a>
                    </div>
                </div>

                <!-- Ilustrasi / Card Showcase Interaktif -->
                <div class="relative flex justify-center">
                    <div class="w-full max-w-md bg-white/5 backdrop-blur-xl border border-white/10 p-8 rounded-3xl shadow-2xl relative">
                        <div class="absolute -top-4 -right-4 w-20 h-20 bg-nusaYellow/30 rounded-full blur-2xl"></div>
                        <h3 class="text-xl font-bold text-nusaYellow mb-4 flex items-center gap-2">
                            <i class="fas fa-chart-line"></i> Performa Digital
                        </h3>
                        <p class="text-gray-300 text-sm mb-6">
                            Membantu bisnis scaling up melalui arsitektur software yang aman, terukur, dan efisien.
                        </p>
                        <div class="space-y-3">
                            <div class="bg-white/10 p-3.5 rounded-xl flex items-center justify-between">
                                <span class="text-sm font-medium">Layanan IT Profesional</span>
                                <i class="fas fa-check-circle text-nusaYellow"></i>
                            </div>
                            <div class="bg-white/10 p-3.5 rounded-xl flex items-center justify-between">
                                <span class="text-sm font-medium">Konsultasi Terjadwal</span>
                                <i class="fas fa-check-circle text-nusaYellow"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- SECTION LAYANAN UNGGULAN (Dinamis dari Database Super Admin) -->
    <section class="py-20 bg-white">
        <div class="container mx-auto px-6 max-w-7xl">
            <div class="text-center max-w-2xl mx-auto mb-16">
                <span class="text-nusaYellow font-bold tracking-wider uppercase text-sm">Ekspertis Kami</span>
                <h2 class="text-3xl lg:text-4xl font-extrabold text-nusaNavy mt-2">Layanan Unggulan</h2>
                <div class="w-16 h-1.5 bg-nusaYellow mx-auto mt-4 rounded-full"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($layanan ?? [] as $item)
                    <div class="bg-gray-50 border border-gray-100 rounded-2xl p-8 shadow-sm hover:shadow-xl transition-all duration-300 hover:-translate-y-1 flex flex-col justify-between group">
                        <div>
                            <div class="w-14 h-14 rounded-xl bg-nusaNavy text-nusaYellow flex items-center justify-center text-2xl mb-6 group-hover:bg-nusaYellow group-hover:text-nusaNavy transition-colors">
                                <i class="fas fa-laptop-code"></i>
                            </div>
                            <h3 class="text-xl font-bold text-nusaNavy mb-3">{{ $item->nama_layanan }}</h3>
                            <p class="text-gray-600 text-sm leading-relaxed mb-6">
                                {{ \Illuminate\Support\Str::limit($item->deskripsi, 120) }}
                            </p>
                        </div>
                        <a href="{{ route('layanan') }}" class="inline-flex items-center gap-2 text-nusaNavy font-bold text-sm group-hover:text-nusaYellow transition-colors">
                            Selengkapnya <i class="fas fa-arrow-right text-xs"></i>
                        </a>
                    </div>
                @empty
                    <div class="col-span-full text-center py-10 bg-gray-50 rounded-2xl border border-dashed border-gray-300">
                        <p class="text-gray-500">Belum ada data layanan yang diinput oleh Super Admin.</p>
                    </div>
                @endforelse
            </div>

            <div class="text-center mt-12">
                <a href="{{ route('layanan') }}" class="inline-block px-8 py-3 rounded-xl border-2 border-nusaNavy text-nusaNavy font-bold hover:bg-nusaNavy hover:text-white transition-all">
                    Lihat Semua Layanan
                </a>
            </div>
        </div>
    </section>


    <!-- SECTION PORTOFOLIO PROYEK (Dinamis dari Database Super Admin) -->
    <section class="py-20 bg-gray-50 border-t border-gray-200">
        <div class="container mx-auto px-6 max-w-7xl">
            <div class="text-center max-w-2xl mx-auto mb-16">
                <span class="text-nusaYellow font-bold tracking-wider uppercase text-sm">Portofolio</span>
                <h2 class="text-3xl lg:text-4xl font-extrabold text-nusaNavy mt-2">Proyek Terbaru</h2>
                <div class="w-16 h-1.5 bg-nusaYellow mx-auto mt-4 rounded-full"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($portofolio ?? [] as $porto)
                    <div class="bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 border border-gray-100 flex flex-col">
                        <div class="h-48 bg-nusaNavy relative flex items-center justify-center text-nusaYellow text-4xl">
                            <i class="fas fa-folder-open"></i>
                        </div>
                        <div class="p-6 flex flex-col flex-grow justify-between">
                            <div>
                                <h3 class="text-xl font-bold text-nusaNavy mb-2">{{ $porto->judul ?? $porto->nama_proyek ?? 'Proyek IT' }}</h3>
                                <p class="text-gray-600 text-sm mb-4">
                                    {{ \Illuminate\Support\Str::limit($porto->deskripsi ?? '', 90) }}
                                </p>
                            </div>
                            <a href="{{ route('portofolio.index') }}" class="text-nusaYellow font-bold text-sm inline-flex items-center gap-1 hover:underline">
                                Detail Proyek <i class="fas fa-chevron-right text-xs"></i>
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-10 bg-white rounded-2xl border border-dashed border-gray-300">
                        <p class="text-gray-500">Belum ada portofolio proyek yang diinput oleh Super Admin.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>


    <!-- BANNER CTA KUNING (Khas Nusa Indo Tech) -->
    <section class="py-16 bg-nusaYellow">
        <div class="container mx-auto px-6 max-w-7xl flex flex-col md:flex-row items-center justify-between gap-8 text-center md:text-left">
            <div>
                <h3 class="text-3xl font-extrabold text-nusaNavyDark mb-2">Punya Proyek IT yang Menantang?</h3>
                <p class="text-nusaNavyDark/90 font-medium text-lg">Mari Konsultasikan Gratis dengan Tim Ahli Kami.</p>
            </div>
            <div class="flex flex-wrap gap-4 justify-center">
                <a href="{{ route('register') }}" class="px-8 py-3.5 rounded-xl bg-nusaYellowHover text-nusaNavyDark font-extrabold shadow-md hover:bg-black hover:text-white transition-all">
                    Daftar Sekarang
                </a>
                <a href="{{ route('login') }}" class="px-8 py-3.5 rounded-xl bg-nusaNavy text-white font-extrabold shadow-md hover:bg-nusaNavyDark transition-all">
                    Login Klien
                </a>
            </div>
        </div>
    </section>

@endsection
