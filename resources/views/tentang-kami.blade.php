@extends('layouts.public')

@section('title', 'Tentang Kami - Nusa Indo Tech')

@section('content')
    <!-- HERO SECTION -->
    <section class="bg-[#254261] text-white py-20 relative overflow-hidden">
        <!-- Efek Background Opsional -->
        <div class="absolute top-0 right-0 -mt-20 -mr-20 w-96 h-96 bg-white opacity-5 rounded-full blur-3xl"></div>

        <div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-7xl relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div>
                    <span class="inline-block px-4 py-1.5 bg-[#f59e0b]/20 text-[#f59e0b] font-bold text-xs tracking-wider uppercase rounded-full mb-6 border border-[#f59e0b]/30">
                        Tentang Perusahaan
                    </span>
                    <h1 class="text-4xl md:text-5xl font-extrabold mb-6 leading-tight">
                        {!! nl2br(e($tentang->judul ?? 'Transformasi Digital Bersama Kami')) !!}
                    </h1>
                    <p class="text-gray-300 text-lg md:text-xl leading-relaxed mb-8">
                        {{ $tentang->deskripsi ?? 'Nusa Indo Tech hadir memberikan solusi teknologi inovatif, terstruktur, dan andal untuk membantu bisnis Anda berkembang secara eksponensial di era digital modern.' }}
                    </p>
                    <a href="#kontak" class="inline-block px-8 py-3.5 bg-[#f59e0b] hover:bg-amber-600 text-[#254261] font-bold rounded-lg transition-colors">
                        Kenali Kami Lebih Dekat
                    </a>
                </div>
                <!-- Ilustrasi Kanan -->
                <div class="relative hidden lg:block">
                    <img src="{{ asset('images/tentang-kami-hero.jpg') }}" alt="Tim Kami" class="rounded-2xl shadow-2xl relative z-10 w-full object-cover">
                </div>
            </div>
        </div>
    </section>

    <!-- VISI & MISI SECTION -->
    <section class="py-16 bg-gray-50 border-b border-gray-100">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-5xl">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Box Visi -->
                <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
                    <div class="w-12 h-12 bg-blue-50 text-blue-600 rounded-xl flex items-center justify-center mb-6 text-xl">
                        <i class="fas fa-eye"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-[#254261] mb-4">Visi Kami</h3>
                    <p class="text-gray-600 leading-relaxed">
                        {{ $tentang->visi ?? 'Belum ada data visi perusahaan yang ditambahkan. Silakan isi melalui dashboard admin.' }}
                    </p>
                </div>

                <!-- Box Misi -->
                <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
                    <div class="w-12 h-12 bg-amber-50 text-amber-600 rounded-xl flex items-center justify-center mb-6 text-xl">
                        <i class="fas fa-bullseye"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-[#254261] mb-4">Misi Kami</h3>
                    <p class="text-gray-600 leading-relaxed">
                        {!! nl2br(e($tentang->misi ?? 'Belum ada data misi perusahaan yang ditambahkan. Silakan isi melalui dashboard admin.')) !!}
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- STRUKTUR TIM KAMI -->
    <section class="py-20 bg-white">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-7xl">
            <div class="text-center mb-16">
                <span class="text-[#f59e0b] font-bold text-sm tracking-wider uppercase">Di Balik Layar</span>
                <h2 class="text-3xl md:text-4xl font-bold text-[#254261] mt-2">Struktur Tim Kami</h2>
                <p class="text-gray-500 mt-4 max-w-2xl mx-auto">Digerakkan oleh para talenta terbaik di bidang rekayasa perangkat lunak, manajemen IT, dan desain kreatif.</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
                @forelse($tim as $anggota)
                    <div class="text-center group">
                        <div class="w-48 h-48 mx-auto mb-6 rounded-full overflow-hidden border-4 border-gray-50 shadow-lg relative bg-blue-50">
                            @if($anggota->foto)
                                <img src="{{ asset('storage/' . $anggota->foto) }}" alt="{{ $anggota->nama }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                            @else
                                <div class="w-full h-full flex items-center justify-center text-gray-400 text-5xl">
                                    <i class="fas fa-user"></i>
                                </div>
                            @endif
                        </div>
                        <h3 class="text-xl font-bold text-[#254261] mb-1">{{ $anggota->nama }}</h3>
                        <p class="text-[#f59e0b] font-medium text-sm">
                            <i class="fas fa-briefcase mr-1"></i> {{ $anggota->jabatan }}
                        </p>
                    </div>
                @empty
                    <div class="col-span-full text-center text-gray-500 py-10 bg-gray-50 rounded-xl border border-dashed border-gray-200">
                        Belum ada data anggota tim yang ditambahkan.
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- LOKASI KAMI & GOOGLE MAPS SECTION -->
    <section id="kontak" class="py-16 bg-gray-50 border-t border-gray-100">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-7xl">
            <div class="text-center mb-12">
                <span class="text-[#f59e0b] font-bold text-sm tracking-wider uppercase">Kunjungi Kami</span>
                <h2 class="text-3xl font-bold text-[#254261] mt-2">Lokasi Kantor Kami</h2>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 items-stretch">
                <!-- Info Kontak -->
                <div class="bg-[#254261] text-white p-8 rounded-2xl shadow-lg flex flex-col justify-center relative overflow-hidden">
                    <h3 class="text-xl font-bold mb-6 text-white relative z-10">Nusa Indo Technology</h3>

                    <div class="flex items-start mb-6 relative z-10">
                        <div class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center shrink-0 mr-4">
                            <i class="fa-solid fa-location-dot text-[#f59e0b]"></i>
                        </div>
                        <div>
                            <h4 class="font-semibold text-[#f59e0b] mb-1">Alamat</h4>
                            <p class="text-gray-300 text-sm leading-relaxed">{{ $tentang->alamat ?? 'Alamat belum diatur.' }}</p>
                        </div>
                    </div>

                    <div class="flex items-start mb-6 relative z-10">
                        <div class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center shrink-0 mr-4">
                            <i class="fa-solid fa-phone text-[#f59e0b]"></i>
                        </div>
                        <div>
                            <h4 class="font-semibold text-[#f59e0b] mb-1">Telepon</h4>
                            <p class="text-gray-300 text-sm">{{ $tentang->telepon ?? '-' }}</p>
                        </div>
                    </div>

                    <div class="flex items-start relative z-10">
                        <div class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center shrink-0 mr-4">
                            <i class="fa-solid fa-envelope text-[#f59e0b]"></i>
                        </div>
                        <div>
                            <h4 class="font-semibold text-[#f59e0b] mb-1">Email</h4>
                            <p class="text-gray-300 text-sm">{{ $tentang->email ?? '-' }}</p>
                        </div>
                    </div>
                </div>

                <!-- Google Maps -->
                <div class="lg:col-span-2 rounded-2xl overflow-hidden shadow-lg h-96 lg:h-auto min-h-[400px] relative bg-white flex items-center justify-center border border-gray-100">
                    @if($tentang->gmaps_embed)
                        <iframe
                            src="{{ $tentang->gmaps_embed }}"
                            class="absolute top-0 left-0 w-full h-full border-0"
                            allowfullscreen=""
                            loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    @else
                        <p class="text-gray-400 flex flex-col items-center gap-2">
                            <i class="fas fa-map-marked-alt text-4xl"></i>
                            Peta belum diatur di Profil Perusahaan.
                        </p>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
