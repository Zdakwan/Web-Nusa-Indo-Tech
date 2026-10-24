@extends('layouts.public')

@section('title', 'Detail Layanan - Nusa Indo Technology')

@section('content')
<section class="bg-gray-50 min-h-screen py-24">
    <div class="container mx-auto px-6 max-w-4xl">
        <!-- Tombol Kembali -->
        <a href="{{ route('layanan') }}" class="inline-flex items-center gap-2 text-nusaNavy hover:text-nusaYellow mb-8 font-semibold transition-colors">
            <i class="fas fa-arrow-left"></i> Kembali ke Daftar Layanan
        </a>

        <!-- Kartu Detail Utama -->
        <div class="bg-white rounded-[2rem] shadow-xl p-8 md:p-12 border border-gray-100">
            <!-- Label Kategori -->
            <span class="inline-block px-3 py-1 bg-nusaNavy/5 text-nusaNavy rounded text-xs font-bold uppercase tracking-wider mb-4">
                {{ $layanan->kategori ?? 'Layanan Profesional' }}
            </span>

            <!-- Judul Layanan -->
            <h1 class="text-3xl md:text-5xl font-extrabold text-nusaNavy mb-6 leading-tight">
                {{ $layanan->nama_layanan }}
            </h1>

            <!-- Deskripsi Layanan -->
            <div class="text-gray-600 leading-relaxed text-lg mb-12 whitespace-pre-line">
                {{ $layanan->deskripsi }}
            </div>

            <!-- Aksi -->
            <div class="border-t border-gray-100 pt-8">
                <p class="text-sm font-semibold text-gray-500 mb-4">Tertarik dengan layanan ini?</p>
                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="{{ route('login') }}" class="bg-nusaYellow hover:bg-[#e0a430] text-nusaNavyDark font-bold px-8 py-4 rounded-xl text-center transition-all shadow-md flex items-center justify-center gap-2">
                        <i class="far fa-calendar-check"></i> Konsultasikan Sekarang
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
