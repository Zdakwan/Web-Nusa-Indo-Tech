@extends('layouts.public')

@section('title', 'Ensiklopedia IT - Nusa Indo Technology')

@section('content')

    <!-- HERO SECTION ENSIKLOPEDIA -->
    <section class="encyclopedia-hero bg-nusaNavy py-16 lg:py-24 relative overflow-hidden">
        <div class="absolute inset-0 opacity-10 bg-[radial-gradient(#f5b73e_1px,transparent_1px)] [background-size:16px_16px]"></div>
        <div class="container mx-auto px-6 text-center relative z-10">
            <h1 class="text-4xl md:text-5xl font-extrabold text-white mb-4">Ensiklopedia IT</h1>
            <p class="text-gray-300 max-w-2xl mx-auto text-lg">
                Jelajahi kumpulan artikel, dokumentasi teknis, dan panduan komprehensif seputar dunia Teknologi Informasi dari para ahli kami.
            </p>
        </div>
    </section>

    <!-- KONTEN ENSIKLOPEDIA -->
    <section class="encyclopedia-content py-16 lg:py-24 bg-gray-50">
        <div class="container mx-auto px-6 max-w-7xl">

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($ensiklopedia ?? [] as $item)
                    <!-- Card Ensiklopedia -->
                    <div class="bg-white rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 border border-gray-100 flex flex-col group">

                        <div class="p-8 flex flex-col flex-grow">
                            <!-- Ikon -->
                            <div class="w-14 h-14 rounded-xl bg-nusaYellow/10 text-nusaYellow flex items-center justify-center text-2xl mb-6 group-hover:bg-nusaYellow group-hover:text-nusaNavy transition-colors">
                                <i class="fa-solid fa-book-open"></i>
                            </div>

                            <!-- Judul -->
                            <h3 class="text-xl font-bold text-nusaNavy mb-4 line-clamp-2">
                                {{ $item->judul ?? $item->nama_artikel ?? 'Judul Artikel' }}
                            </h3>

                            <!-- Deskripsi Singkat -->
                            <p class="text-gray-600 text-sm leading-relaxed mb-6 flex-grow line-clamp-3">
                                {{ \Illuminate\Support\Str::limit(strip_tags($item->deskripsi ?? $item->konten), 120) }}
                            </p>

                            <!-- Tombol -->
                            <a href="{{ route('ensiklopedia.detail', ['id' => $item->id]) }}" class="inline-flex items-center text-nusaNavy font-bold text-sm hover:text-nusaYellow transition-colors mt-auto">
                                Baca Selengkapnya <i class="fas fa-arrow-right ml-2 text-xs"></i>
                            </a>
                        </div>

                        <!-- Footer Card (Tanggal) -->
                        <div class="px-8 py-4 border-t border-gray-50 bg-gray-50/50 text-xs text-gray-500 font-medium flex items-center gap-2">
                            <i class="fa-regular fa-calendar-alt text-gray-400"></i>
                            {{ $item->created_at ? $item->created_at->format('d M Y') : 'Baru saja' }}
                        </div>
                    </div>
                @empty
                    <!-- Empty State -->
                    <div class="col-span-full flex justify-center">
                        <div class="bg-white border-2 border-dashed border-gray-300 rounded-3xl p-12 text-center max-w-lg w-full shadow-sm">
                            <div class="w-20 h-20 bg-gray-50 rounded-full flex items-center justify-center mx-auto mb-6">
                                <i class="fa-solid fa-book text-4xl text-gray-400"></i>
                            </div>
                            <h3 class="text-xl font-bold text-nusaNavy mb-2">Belum Ada Artikel</h3>
                            <p class="text-gray-500">Super Admin belum menambahkan artikel atau panduan teknis ke Ensiklopedia.</p>
                        </div>
                    </div>
                @endforelse
            </div>

        </div>
    </section>

@endsection
