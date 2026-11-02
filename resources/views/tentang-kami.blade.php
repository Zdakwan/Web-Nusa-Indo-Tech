@extends('layouts.public')

@section('title', 'Tentang Kami - Nusa Indo Tech')

@section('content')
    <!-- ==============================================
         1. HERO SECTION
    =============================================== -->
    <section class="bg-nusaNavy text-white py-16 md:py-24 relative overflow-hidden">
        <div class="absolute inset-0 opacity-10 bg-[radial-gradient(#f5b73e_1px,transparent_1px)] [background-size:16px_16px]"></div>

        <div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-7xl relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16 items-center">
                <div class="text-center lg:text-left">
                    <span class="inline-block px-4 py-1.5 bg-nusaYellow/20 text-nusaYellow font-bold text-xs tracking-wider uppercase rounded-full mb-6">
                        Tentang Perusahaan
                    </span>
                    <h1 class="text-3xl sm:text-4xl md:text-5xl font-extrabold mb-6 leading-tight tracking-tight">
                        {!! nl2br(e($tentang->judul ?? 'Transformasi Digital Bersama Kami')) !!}
                    </h1>
                    <p class="text-gray-300 text-base md:text-lg leading-relaxed mb-8 max-w-2xl mx-auto lg:mx-0">
                        {{ $tentang->deskripsi ?? 'Nusa Indo Tech hadir memberikan solusi teknologi inovatif, terstruktur, dan andal untuk membantu bisnis Anda berkembang secara eksponensial di era digital modern.' }}
                    </p>
                    <a href="#kolaborasi" class="inline-flex items-center justify-center px-8 py-3.5 bg-nusaYellow hover:bg-nusaYellowHover text-nusaNavyDark font-bold rounded-xl transition-all shadow-lg hover:-translate-y-0.5">
                        Kenali Kami Lebih Dekat
                        <i class="fas fa-arrow-down ml-2"></i>
                    </a>
                </div>

                <div class="relative mt-10 lg:mt-0 px-4 sm:px-0">
                    <img src="{{ asset('images/tim-diskusi.jpg') }}"
                         alt="Tim Nusa Indo Tech Berdiskusi"
                         class="rounded-3xl shadow-2xl relative z-10 w-full h-[300px] md:h-[400px] object-cover border border-white/10">

                    <div class="absolute -bottom-6 -left-6 w-24 h-24 bg-nusaYellow/50 rounded-xl blur-xl -z-10 hidden sm:block"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- ==============================================
         2. VISI & MISI SECTION
    =============================================== -->
    <section class="py-16 md:py-20 bg-gray-50 border-b border-gray-100">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-5xl">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="bg-white p-8 md:p-10 rounded-3xl shadow-sm border border-gray-100 hover:shadow-xl transition-all duration-300 group relative overflow-hidden">
                    <div class="absolute -right-10 -top-10 w-32 h-32 bg-nusaNavy/5 rounded-full blur-2xl group-hover:bg-nusaNavy/10 transition-colors"></div>
                    <div class="w-14 h-14 bg-nusaNavy text-nusaYellow rounded-xl flex items-center justify-center mb-6 text-2xl group-hover:scale-110 transition-transform">
                        <i class="fas fa-eye"></i>
                    </div>
                    <h3 class="text-2xl font-extrabold text-nusaNavy mb-4">Visi Kami</h3>
                    <p class="text-gray-600 leading-relaxed text-sm md:text-base relative z-10">
                        {{ $tentang->visi ?? 'Menjadi perusahaan konsultan IT terkemuka yang mendorong transformasi digital.' }}
                    </p>
                </div>

                <div class="bg-white p-8 md:p-10 rounded-3xl shadow-sm border border-gray-100 hover:shadow-xl transition-all duration-300 group relative overflow-hidden">
                    <div class="absolute -left-10 -top-10 w-32 h-32 bg-nusaYellow/5 rounded-full blur-2xl group-hover:bg-nusaYellow/10 transition-colors"></div>
                    <div class="w-14 h-14 bg-nusaYellow text-nusaNavy rounded-xl flex items-center justify-center mb-6 text-2xl group-hover:scale-110 transition-transform">
                        <i class="fas fa-bullseye"></i>
                    </div>
                    <h3 class="text-2xl font-extrabold text-nusaNavy mb-4">Misi Kami</h3>
                    <p class="text-gray-600 leading-relaxed text-sm md:text-base relative z-10">
                        {!! nl2br(e($tentang->misi ?? 'Memberikan solusi perangkat lunak terbaik.')) !!}
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- ==============================================
         3. STRUKTUR TIM KAMI
    =============================================== -->
    <section class="py-16 md:py-24 bg-white">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-7xl">
            <div class="text-center mb-12 md:mb-16">
                <span class="text-nusaYellow font-bold text-sm tracking-wider uppercase">Di Balik Layar</span>
                <h2 class="text-3xl md:text-4xl font-extrabold text-nusaNavy mt-3">Struktur Tim Kami</h2>
                <div class="w-16 h-1.5 bg-nusaYellow mx-auto mt-4 rounded-full"></div>
                <p class="text-gray-500 mt-6 max-w-2xl mx-auto text-sm md:text-base">Digerakkan oleh para talenta terbaik di bidang rekayasa perangkat lunak, manajemen IT, dan desain kreatif.</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 md:gap-10">
                @forelse($tim as $anggota)
                    <div class="text-center group">
                        <div class="w-40 h-40 md:w-48 md:h-48 mx-auto mb-6 rounded-full overflow-hidden border-4 border-gray-50 shadow-lg relative bg-nusaNavy/5">
                            @if($anggota->foto)
                                <img src="{{ asset('storage/' . $anggota->foto) }}" alt="{{ $anggota->nama }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                            @else
                                <div class="w-full h-full flex items-center justify-center text-gray-300 text-5xl">
                                    <i class="fas fa-user-tie"></i>
                                </div>
                            @endif
                        </div>
                        <h3 class="text-xl font-extrabold text-nusaNavy mb-1">{{ $anggota->nama }}</h3>
                        <p class="text-nusaYellow font-semibold text-sm">
                            <i class="fas fa-briefcase mr-1"></i> {{ $anggota->jabatan }}
                        </p>
                    </div>
                @empty
                    <div class="col-span-full text-center text-gray-400 py-12 bg-gray-50 rounded-2xl border border-dashed border-gray-200">
                        <i class="fas fa-users-slash text-4xl mb-3"></i>
                        <p>Belum ada data anggota tim yang ditambahkan di Dashboard Admin.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- ==============================================
         4. KOLABORASI PENGEMBANGAN (Slider)
    =============================================== -->
    <section id="kolaborasi" class="py-16 md:py-20 bg-gray-50 border-t border-gray-100">
        <div class="px-4">
            <div class="text-center mb-10">
                <span class="text-nusaYellow font-bold text-sm tracking-wider uppercase">Sinergi Akademis & Industri</span>
                <h2 class="text-3xl font-extrabold text-[#254261] mt-3">Kolaborasi Pengembangan Sistem</h2>
                <div class="w-16 h-1.5 bg-nusaYellow mx-auto mt-4 rounded-full"></div>
                <p class="text-gray-500 mt-6 max-w-2xl mx-auto">Platform ini merupakan hasil dedikasi dan kerja sama strategis antara Nusa Indo Technology dengan insan akademis.</p>
            </div>

            <div class="relative max-w-5xl mx-auto bg-white rounded-3xl shadow-xl overflow-hidden" id="collab-carousel">
                <div class="flex transition-transform duration-700 ease-in-out" id="carousel-inner">

                    <!-- SLIDE 1: Tim Kolaborasi -->
                    <div class="w-full flex-shrink-0 flex flex-col md:flex-row">
                        <div class="md:w-1/2 h-72 md:h-auto bg-gray-200 relative group">
                            <img src="{{ $tentang->foto_kolaborasi_tim ? asset('storage/' . $tentang->foto_kolaborasi_tim) : asset('images/default-kolaborasi.jpg') }}" alt="Tim Mahasiswa Polije PSDKU Sidoarjo" class="absolute inset-0 w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                        </div>
                        <div class="md:w-1/2 p-8 md:p-12 flex flex-col justify-center bg-[#254261] text-white">
                            <div class="text-[#f7bd55] mb-2 font-bold uppercase tracking-wider text-xs flex items-center gap-2">
                                <i class="fas fa-code"></i> Tim Pengembang
                            </div>
                            <h3 class="text-3xl font-bold mb-4 leading-tight">Politeknik Negeri Jember PSDKU Sidoarjo</h3>
                            <p class="text-gray-300 leading-relaxed text-sm">
                                {!! nl2br(e($tentang->teks_kolaborasi_tim ?? 'Sistem Informasi web dan aplikasi mobile native Nusa Indo Technology ini dirancang dan dikembangkan secara khusus melalui kerja sama dengan tim mahasiswa Teknik Informatika dari Politeknik Negeri Jember (Polije) PSDKU Kampus 4 Sidoarjo. Kolaborasi ini merupakan bentuk nyata penerapan ilmu rekayasa perangkat lunak untuk menghadirkan solusi teknologi industri yang terintegrasi.')) !!}
                            </p>
                        </div>
                    </div>

                    <!-- SLIDE 2: Serah Terima -->
                    <div class="w-full flex-shrink-0 flex flex-col md:flex-row">
                        <div class="md:w-1/2 h-72 md:h-auto bg-gray-200 relative group">
                            <img src="{{ $tentang->foto_kolaborasi_serah_terima ? asset('storage/' . $tentang->foto_kolaborasi_serah_terima) : asset('images/default-serah-terima.jpg') }}" alt="Serah Terima Sistem" class="absolute inset-0 w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                        </div>
                        <div class="md:w-1/2 p-8 md:p-12 flex flex-col justify-center bg-[#254261] text-white">
                            <div class="text-[#f7bd55] mb-2 font-bold uppercase tracking-wider text-xs flex items-center gap-2">
                                <i class="fas fa-handshake"></i> Implementasi & Serah Terima
                            </div>
                            <h3 class="text-3xl font-bold mb-4 leading-tight">Membangun Ekosistem Digital</h3>
                            <p class="text-gray-300 leading-relaxed text-sm">
                                {!! nl2br(e($tentang->teks_kolaborasi_serah_terima ?? 'Sistem ini dibuat bertujuan untuk mengoptimalkan proses bisnis dan manajemen layanan klien melalui digitalisasi terpusat. Momen serah terima ini menjadi tonggak sejarah kerja sama yang sukses, menghasilkan ekosistem digital yang modern, aman, dan siap beroperasi penuh untuk melayani klien Nusa Indo Technology.')) !!}
                            </p>
                        </div>
                    </div>

                </div>

                <!-- Navigasi -->
                <button id="prev-btn" class="absolute left-0 top-1/2 -translate-y-1/2 bg-black/40 hover:bg-[#f7bd55] text-white w-12 h-12 flex items-center justify-center rounded-r-xl transition-all duration-300 shadow-lg">
                    <i class="fas fa-chevron-left"></i>
                </button>
                <button id="next-btn" class="absolute right-0 top-1/2 -translate-y-1/2 bg-black/40 hover:bg-[#f7bd55] text-white w-12 h-12 flex items-center justify-center rounded-l-xl transition-all duration-300 shadow-lg">
                    <i class="fas fa-chevron-right"></i>
                </button>

                <div class="absolute bottom-6 left-1/2 -translate-x-1/2 flex space-x-3">
                    <button class="dot w-3 h-3 rounded-full bg-[#f7bd55] transition-all duration-300 scale-125" data-index="0"></button>
                    <button class="dot w-3 h-3 rounded-full bg-white/50 hover:bg-white transition-all duration-300" data-index="1"></button>
                </div>
            </div>
        </div>
    </section>

    <!-- ==============================================
         5. LOKASI & GOOGLE MAPS
    =============================================== -->
    <section id="kontak" class="py-16 md:py-20 bg-white border-t border-gray-100">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-7xl">
            <div class="text-center mb-12">
                <span class="text-nusaYellow font-bold text-sm tracking-wider uppercase">Kunjungi Kami</span>
                <h2 class="text-3xl md:text-4xl font-extrabold text-nusaNavy mt-3">Lokasi Kantor Kami</h2>
                <div class="w-16 h-1.5 bg-nusaYellow mx-auto mt-4 rounded-full"></div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 items-stretch">
                <!-- Info Kontak Kotak Kiri -->
                <div class="bg-nusaNavy text-white p-8 md:p-10 rounded-3xl shadow-lg flex flex-col justify-center relative overflow-hidden">
                    <div class="absolute -right-10 -bottom-10 w-40 h-40 border-4 border-white/5 rounded-full"></div>
                    <div class="absolute inset-0 opacity-10 bg-[radial-gradient(#f5b73e_1px,transparent_1px)] [background-size:16px_16px]"></div>

                    <h3 class="text-2xl font-extrabold mb-8 text-white relative z-10 border-b border-white/10 pb-4">Hubungi Kami</h3>

                    <div class="flex items-start mb-6 relative z-10">
                        <div class="w-12 h-12 rounded-xl bg-white/10 flex items-center justify-center shrink-0 mr-4">
                            <i class="fa-solid fa-location-dot text-nusaYellow text-lg"></i>
                        </div>
                        <div class="pt-1">
                            <h4 class="font-bold text-nusaYellow mb-1">Alamat</h4>
                            <p class="text-gray-300 text-sm leading-relaxed">{{ $tentang->alamat ?? 'Alamat belum diatur.' }}</p>
                        </div>
                    </div>

                    <div class="flex items-start mb-6 relative z-10">
                        <div class="w-12 h-12 rounded-xl bg-white/10 flex items-center justify-center shrink-0 mr-4">
                            <i class="fa-solid fa-phone text-nusaYellow text-lg"></i>
                        </div>
                        <div class="pt-1">
                            <h4 class="font-bold text-nusaYellow mb-1">Telepon</h4>
                            <p class="text-gray-300 text-sm">{{ $tentang->telepon ?? '-' }}</p>
                        </div>
                    </div>

                    <div class="flex items-start relative z-10">
                        <div class="w-12 h-12 rounded-xl bg-white/10 flex items-center justify-center shrink-0 mr-4">
                            <i class="fa-solid fa-envelope text-nusaYellow text-lg"></i>
                        </div>
                        <div class="pt-1">
                            <h4 class="font-bold text-nusaYellow mb-1">Email</h4>
                            <p class="text-gray-300 text-sm">{{ $tentang->email ?? '-' }}</p>
                        </div>
                    </div>
                </div>

                <!-- Google Maps -->
                <div class="lg:col-span-2 rounded-3xl overflow-hidden shadow-lg h-[400px] lg:h-auto relative bg-gray-50 flex items-center justify-center border border-gray-200">
                    @if($tentang->gmaps_embed)
                        <iframe
                            src="{{ $tentang->gmaps_embed }}"
                            class="absolute top-0 left-0 w-full h-full border-0 grayscale hover:grayscale-0 transition-all duration-700"
                            allowfullscreen=""
                            loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    @else
                        <div class="text-gray-400 flex flex-col items-center gap-3">
                            <i class="fas fa-map-marked-alt text-5xl"></i>
                            <p>Peta belum diatur di Profil Perusahaan.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <!-- Script Slider -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const inner = document.getElementById('carousel-inner');
            const prevBtn = document.getElementById('prev-btn');
            const nextBtn = document.getElementById('next-btn');
            const dots = document.querySelectorAll('.dot');
            let currentIndex = 0;
            const totalSlides = 2;

            function updateCarousel() {
                if(!inner) return; // Mencegah error jika elemen tidak ditemukan
                inner.style.transform = `translateX(-${currentIndex * 100}%)`;
                dots.forEach((dot, index) => {
                    if (index === currentIndex) {
                        dot.classList.remove('bg-white/50');
                        dot.classList.add('bg-[#f7bd55]', 'scale-125');
                    } else {
                        dot.classList.remove('bg-[#f7bd55]', 'scale-125');
                        dot.classList.add('bg-white/50');
                    }
                });
            }

            if(nextBtn && prevBtn) {
                nextBtn.addEventListener('click', () => {
                    currentIndex = (currentIndex + 1) % totalSlides;
                    updateCarousel();
                });

                prevBtn.addEventListener('click', () => {
                    currentIndex = (currentIndex - 1 + totalSlides) % totalSlides;
                    updateCarousel();
                });
            }

            dots.forEach(dot => {
                dot.addEventListener('click', (e) => {
                    currentIndex = parseInt(e.target.getAttribute('data-index'));
                    updateCarousel();
                });
            });

            // Auto slide
            if(inner) {
                setInterval(() => {
                    currentIndex = (currentIndex + 1) % totalSlides;
                    updateCarousel();
                }, 6000);
            }
        });
    </script>
@endsection
