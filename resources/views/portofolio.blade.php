@extends('layouts.public')

@section('title', 'Portofolio - Nusa Indo Technology')

@section('content')

    <!-- HERO SECTION PORTOFOLIO -->
    <section class="relative bg-nusaNavy text-white py-16 lg:py-24 overflow-hidden">
        <div class="absolute inset-0 opacity-10 bg-[radial-gradient(#f5b73e_1px,transparent_1px)] [background-size:16px_16px]"></div>
        <div class="container mx-auto px-6 relative z-10 max-w-7xl text-center">
            <span class="inline-block px-4 py-1.5 rounded-full bg-nusaYellow/20 text-nusaYellow font-bold text-xs tracking-wider uppercase mb-4">
                OUR WORKS & PORTFOLIOS
            </span>
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold leading-tight tracking-tight mb-6">
                Mahakarya <span class="text-nusaYellow">Digital Kami</span>
            </h1>
            <p class="text-gray-300 text-lg leading-relaxed max-w-2xl mx-auto">
                Berbagai proyek solusi IT yang telah kami kerjakan untuk membantu berbagai perusahaan mencapai target digital dan efisiensi operasional mereka.
            </p>
        </div>
    </section>

    <!-- KONTEN PORTOFOLIO DINAMIS -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-6 max-w-7xl">

            <!-- Filter Kategori (Visual) -->
            <div class="flex flex-wrap justify-center gap-2 text-sm font-semibold mb-12">
                <button class="px-6 py-2.5 rounded-full bg-nusaNavy text-white shadow-md">Semua Proyek</button>
                <button class="px-6 py-2.5 rounded-full bg-white border border-gray-200 text-gray-600 hover:bg-gray-100 transition-colors">Web App</button>
                <button class="px-6 py-2.5 rounded-full bg-white border border-gray-200 text-gray-600 hover:bg-gray-100 transition-colors">Mobile App</button>
                <button class="px-6 py-2.5 rounded-full bg-white border border-gray-200 text-gray-600 hover:bg-gray-100 transition-colors">Infrastruktur</button>
            </div>

            <!-- GRID PORTOFOLIO -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($portofolio ?? [] as $item)
                    <!-- Card Portofolio -->
                    <div class="bg-white rounded-[2rem] shadow-sm hover:shadow-2xl transition-all duration-500 border border-gray-100 overflow-hidden flex flex-col group">

                        <!-- Header Gambar -->
                        <div class="relative h-64 bg-nusaNavy overflow-hidden">
                            @if($item->gambar)
                                <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->judul ?? $item->nama_proyek }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                            @else
                                <div class="w-full h-full flex items-center justify-center text-nusaYellow text-5xl opacity-80 group-hover:scale-110 transition-transform duration-700">
                                    <i class="fa-solid fa-code"></i>
                                </div>
                            @endif

                            <!-- Overlay Gradient & Kategori -->
                            <div class="absolute inset-0 bg-gradient-to-t from-nusaNavyDark/90 via-transparent to-transparent"></div>
                            <span class="absolute top-4 right-4 bg-white/90 backdrop-blur-sm text-nusaNavyDark text-xs font-bold px-4 py-1.5 rounded-full shadow-lg">
                                {{ $item->kategori ?? 'Layanan IT' }}
                            </span>
                        </div>

                        <!-- Info Portofolio -->
                        <div class="p-8 flex flex-col flex-grow relative">
                            <!-- Floating Icon Button -->
                            <div class="absolute -top-6 right-8 w-12 h-12 bg-nusaYellow rounded-full flex items-center justify-center text-nusaNavyDark shadow-lg transform group-hover:-translate-y-2 transition-transform duration-300">
                                <i class="fa-solid fa-arrow-right -rotate-45 group-hover:rotate-0 transition-transform"></i>
                            </div>

                            <h3 class="text-2xl font-bold text-nusaNavy mb-3">{{ $item->judul ?? $item->nama_proyek }}</h3>
                            <p class="text-gray-500 text-sm leading-relaxed mb-8 flex-grow line-clamp-3">
                                {{ \Illuminate\Support\Str::limit(strip_tags($item->deskripsi), 120) }}
                            </p>

                            <a href="{{ route('portofolio.detail', ['id' => $item->id]) }}" class="block text-center w-full py-3.5 px-4 rounded-xl bg-nusaNavy/5 border border-nusaNavy/10 text-nusaNavy font-bold hover:bg-nusaNavy hover:text-white transition-colors">
                                Lihat Detail Proyek
                            </a>
                        </div>
                    </div>
                @empty
                    <!-- Empty State -->
                    <div class="col-span-full flex justify-center py-10">
                        <div class="bg-white border-2 border-dashed border-gray-200 rounded-[2rem] p-12 text-center max-w-lg w-full shadow-sm">
                            <div class="w-24 h-24 bg-gray-50 rounded-full flex items-center justify-center mx-auto mb-6">
                                <i class="fa-solid fa-folder-open text-5xl text-gray-300"></i>
                            </div>
                            <h3 class="text-2xl font-bold text-nusaNavy mb-2">Belum Ada Portofolio</h3>
                            <p class="text-gray-500">Super Admin belum menambahkan data proyek ke dalam sistem.</p>
                        </div>
                    </div>
                @endforelse
            </div>

        </div>
    </section>

@endsection
