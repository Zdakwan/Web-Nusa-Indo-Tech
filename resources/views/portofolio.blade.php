@extends('layouts.public')

@section('title', 'Portofolio - Nusa Indo Technology')

@section('content')

    <!-- HERO SECTION PORTOFOLIO -->
    <!-- Menambahkan bg-nusaNavy agar teks putih terbaca jelas -->
    <section class="portfolio-hero bg-nusaNavy py-16 lg:py-24 relative overflow-hidden">
        <div class="absolute inset-0 opacity-10 bg-[radial-gradient(#f5b73e_1px,transparent_1px)] [background-size:16px_16px]"></div>
        <div class="container mx-auto px-6 text-center relative z-10">
            <h1 class="text-4xl md:text-5xl font-extrabold text-white mb-4">Our Works & Portfolios</h1>
            <p class="text-gray-300 max-w-2xl mx-auto text-lg">
                Berbagai proyek solusi IT yang telah kami kerjakan untuk membantu berbagai perusahaan mencapai target digital mereka.
            </p>
        </div>
    </section>

    <!-- KONTEN PORTOFOLIO -->
    <section class="portfolio-content py-16 lg:py-24 bg-gray-50">
        <div class="container mx-auto px-6 max-w-7xl">

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($portofolio ?? [] as $item)
                    <!-- Card Portofolio -->
                    <div class="bg-white rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 border border-gray-100 overflow-hidden flex flex-col group">

                        <!-- Gambar Proyek -->
                        <div class="relative h-56 bg-nusaNavy overflow-hidden">
                            @if($item->gambar)
                                <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->judul ?? $item->nama_proyek }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                            @else
                                <div class="w-full h-full flex items-center justify-center text-nusaYellow text-5xl">
                                    <i class="fa-solid fa-laptop-code"></i>
                                </div>
                            @endif

                            <!-- Kategori Badge -->
                            <span class="absolute top-4 right-4 bg-nusaYellow text-nusaNavyDark text-xs font-bold px-3 py-1.5 rounded-full shadow-md">
                                {{ $item->kategori ?? 'Layanan IT' }}
                            </span>
                        </div>

                        <!-- Info Proyek -->
                        <div class="p-6 flex flex-col flex-grow">
                            <h3 class="text-xl font-bold text-nusaNavy mb-3">{{ $item->judul ?? $item->nama_proyek }}</h3>
                            <p class="text-gray-600 text-sm leading-relaxed mb-6 flex-grow">
                                {{ \Illuminate\Support\Str::limit($item->deskripsi, 100) }}
                            </p>

                            <a href="{{ route('portofolio.detail', ['id' => $item->id]) }}" class="block text-center w-full py-3 px-4 rounded-xl border-2 border-nusaNavy text-nusaNavy font-bold hover:bg-nusaNavy hover:text-white transition-colors">
                                Lihat Detail Proyek
                            </a>
                        </div>
                    </div>
                @empty
                    <!-- Empty State -->
                    <div class="col-span-full flex justify-center">
                        <div class="bg-white border-2 border-dashed border-gray-300 rounded-3xl p-12 text-center max-w-lg w-full shadow-sm">
                            <div class="w-20 h-20 bg-gray-50 rounded-full flex items-center justify-center mx-auto mb-6">
                                <i class="fa-solid fa-folder-open text-4xl text-gray-400"></i>
                            </div>
                            <h3 class="text-xl font-bold text-nusaNavy mb-2">Belum Ada Portofolio</h3>
                            <p class="text-gray-500">Super Admin belum menambahkan data portofolio proyek ke sistem.</p>
                        </div>
                    </div>
                @endforelse
            </div>

        </div>
    </section>

@endsection
