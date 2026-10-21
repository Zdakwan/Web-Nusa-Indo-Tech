@extends('layouts.public')

@section('title', 'Pelatihan IT (LMS) - Nusa Indo Technology')

@section('content')

    <!-- HERO SECTION PELATIHAN -->
    <section class="relative bg-nusaNavy text-white py-16 lg:py-24 overflow-hidden">
        <div class="absolute inset-0 opacity-10 bg-[radial-gradient(#f5b73e_1px,transparent_1px)] [background-size:16px_16px]"></div>
        <div class="container mx-auto px-6 relative z-10 max-w-7xl text-center">
            <span class="inline-block px-4 py-1.5 rounded-full bg-nusaYellow/20 text-nusaYellow font-bold text-xs tracking-wider uppercase mb-4">
                LEARNING MANAGEMENT SYSTEM
            </span>
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold leading-tight tracking-tight mb-6">
                Tingkatkan <span class="text-nusaYellow">Skill Digital Anda</span>
            </h1>
            <p class="text-gray-300 text-lg leading-relaxed max-w-2xl mx-auto">
                Program pelatihan IT intensif yang dipandu langsung oleh praktisi industri. Siapkan diri Anda untuk menghadapi tantangan teknologi masa depan.
            </p>
        </div>
    </section>

    <!-- KONTEN PELATIHAN DINAMIS -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-6 max-w-7xl">

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($pelatihan ?? [] as $item)
                    <!-- Card Pelatihan -->
                    <div class="bg-white rounded-3xl shadow-sm hover:shadow-xl transition-all duration-300 border border-gray-100 flex flex-col overflow-hidden group">

                        <!-- Gambar Pelatihan -->
                        <div class="relative h-56 bg-gray-100 overflow-hidden">
                            @if($item->gambar)
                                <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->judul }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                            @else
                                <div class="w-full h-full flex items-center justify-center bg-nusaNavy/5 text-gray-400">
                                    <i class="fa-solid fa-chalkboard-user fa-5x"></i>
                                </div>
                            @endif

                            <!-- Harga Badge -->
                            <span class="absolute top-4 right-4 bg-nusaNavy text-white text-sm font-bold px-4 py-1.5 rounded-full shadow-lg">
                                {{ isset($item->harga) && $item->harga > 0 ? 'Rp ' . number_format($item->harga, 0, ',', '.') : 'Gratis' }}
                            </span>
                        </div>

                        <!-- Info Pelatihan -->
                        <div class="p-8 flex flex-col flex-grow relative">
                            <!-- Kategori -->
                            <span class="text-[10px] font-bold uppercase tracking-wider bg-nusaYellow/20 text-nusaYellow px-3 py-1.5 rounded-md mb-4 inline-block w-max">
                                {{ $item->kategori ?? 'Umum' }}
                            </span>

                            <h3 class="text-xl font-bold text-nusaNavy mb-3 leading-snug line-clamp-2">{{ $item->judul }}</h3>
                            <p class="text-gray-500 text-sm leading-relaxed mb-8 flex-grow line-clamp-3">
                                {{ \Illuminate\Support\Str::limit(strip_tags($item->deskripsi), 110) }}
                            </p>

                            <!-- Tombol Aksi -->
                            <div class="grid grid-cols-2 gap-3 mt-auto">
                                <a href="{{ route('pelatihan.detail', ['id' => $item->id]) }}" class="text-center py-3 px-4 rounded-xl border border-gray-200 text-gray-700 font-bold hover:bg-gray-50 transition-colors text-sm">
                                    Info Detail
                                </a>
                                <a href="{{ route('login') }}" class="text-center py-3 px-4 rounded-xl bg-nusaYellow text-nusaNavyDark font-extrabold hover:bg-nusaYellowHover transition-colors shadow-sm text-sm">
                                    Daftar Kelas
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <!-- Empty State -->
                    <div class="col-span-full flex justify-center py-10">
                        <div class="bg-white border-2 border-dashed border-gray-200 rounded-[2rem] p-12 text-center max-w-lg w-full shadow-sm">
                            <div class="w-24 h-24 bg-gray-50 rounded-full flex items-center justify-center mx-auto mb-6">
                                <i class="fa-solid fa-graduation-cap text-5xl text-gray-300"></i>
                            </div>
                            <h3 class="text-2xl font-bold text-nusaNavy mb-2">Belum Ada Pelatihan</h3>
                            <p class="text-gray-500">Super Admin belum membuka pendaftaran atau menambahkan data pelatihan IT baru.</p>
                        </div>
                    </div>
                @endforelse
            </div>

        </div>
    </section>

@endsection
