@extends('layouts.public')

@section('title', 'Tentang Kami - Nusa Indo Technology')

@section('content')

    <!-- HERO SECTION TENTANG KAMI -->
    <section class="relative bg-nusaNavy text-white py-16 lg:py-24 overflow-hidden">
        <!-- Subtly Textured Background Overlay -->
        <div class="absolute inset-0 opacity-10 bg-[radial-gradient(#f5b73e_1px,transparent_1px)] [background-size:16px_16px]"></div>

        <div class="container mx-auto px-6 relative z-10 max-w-7xl">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <!-- Sisi Kiri: Teks -->
                <div class="space-y-6 text-center lg:text-left">
                    <span class="inline-block px-4 py-1.5 rounded-full bg-nusaYellow/20 text-nusaYellow font-bold text-xs tracking-wider uppercase">
                        TENTANG PERUSAHAAN
                    </span>
                    <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold leading-tight tracking-tight">
                        Transformasi Digital <br><span class="text-nusaYellow">Bersama Kami</span>
                    </h1>
                    <p class="text-gray-300 text-lg leading-relaxed max-w-xl mx-auto lg:mx-0">
                        Nusa Indo Tech hadir memberikan solusi teknologi inovatif, terstruktur, dan andal untuk membantu bisnis Anda berkembang secara eksponensial di era digital modern.
                    </p>
                    <div class="pt-2 flex justify-center lg:justify-start gap-4">
                        <a href="#visi-misi" class="px-8 py-3.5 rounded-xl bg-nusaYellow text-nusaNavyDark font-extrabold hover:bg-nusaYellowHover transition-colors shadow-lg">
                            Kenali Kami Lebih Dekat
                        </a>
                    </div>
                </div>

                <!-- Sisi Kanan: Ilustrasi / Gambar Mewah -->
                <div class="relative flex justify-center">
                    <div class="relative w-full max-w-md transform hover:scale-[1.02] transition-transform duration-500">
                        <div class="absolute -inset-4 bg-nusaYellow/20 rounded-[2.5rem] blur-2xl opacity-50"></div>
                        <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?auto=format&fit=crop&w=800&q=80" alt="Tim Nusa Indo Tech" class="relative rounded-[2rem] shadow-2xl border-4 border-white/10 object-cover h-80 w-full">

                        <!-- Floating Badge -->
                        <div class="absolute -bottom-6 -left-6 bg-white rounded-2xl p-4 shadow-xl flex items-center gap-4">
                            <div class="w-12 h-12 rounded-full bg-nusaYellow/20 flex items-center justify-center text-nusaYellow text-xl">
                                <i class="fa-solid fa-users-gear"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-nusaNavyDark leading-tight">Tim Ahli</h4>
                                <p class="text-xs text-gray-500">Profesional & Berpengalaman</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION: VISI & MISI -->
    <section id="visi-misi" class="py-20 bg-gray-50">
        <div class="container mx-auto px-6 max-w-7xl">
            <div class="text-center max-w-2xl mx-auto mb-16">
                <span class="text-nusaYellow font-bold tracking-wider uppercase text-sm">Tujuan Kami</span>
                <h2 class="text-3xl lg:text-4xl font-extrabold text-nusaNavy mt-2">Visi & Misi Perusahaan</h2>
                <div class="w-16 h-1.5 bg-nusaYellow mx-auto mt-4 rounded-full"></div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-12">
                <!-- Visi Card -->
                <div class="bg-white rounded-3xl p-10 shadow-sm hover:shadow-xl transition-all border border-gray-100 relative overflow-hidden group">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-nusaNavy/5 rounded-bl-[100px] -z-0 transition-colors group-hover:bg-nusaYellow/10"></div>
                    <div class="relative z-10">
                        <div class="w-16 h-16 rounded-2xl bg-nusaNavy text-nusaYellow flex items-center justify-center text-3xl mb-8">
                            <i class="fa-solid fa-eye"></i>
                        </div>
                        <h3 class="text-2xl font-extrabold text-nusaNavy mb-4">Visi</h3>
                        <p class="text-gray-600 text-lg leading-relaxed">
                            Menjadi Konsultan terkemuka dan terpercaya dalam bidang Teknologi Informasi yang berfokus pada inovasi dan kepuasan klien.
                        </p>
                    </div>
                </div>

                <!-- Misi Card -->
                <div class="bg-white rounded-3xl p-10 shadow-sm hover:shadow-xl transition-all border border-gray-100 relative overflow-hidden group">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-nusaYellow/10 rounded-bl-[100px] -z-0 transition-colors group-hover:bg-nusaNavy/5"></div>
                    <div class="relative z-10">
                        <div class="w-16 h-16 rounded-2xl bg-nusaYellow text-nusaNavy flex items-center justify-center text-3xl mb-8">
                            <i class="fa-solid fa-bullseye"></i>
                        </div>
                        <h3 class="text-2xl font-extrabold text-nusaNavy mb-4">Misi</h3>
                        <p class="text-gray-600 text-lg leading-relaxed">
                            Memberikan layanan yang tepat, cepat, dan sesuai dengan kebutuhan pelanggan. Memberikan kualitas layanan terbaik dengan menjaga profesionalisme, integritas, dan komitmen profesi.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION: TIM KAMI -->
    <section class="py-20 bg-white border-t border-gray-100">
        <div class="container mx-auto px-6 max-w-7xl">
            <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-12 text-center md:text-left">
                <div>
                    <span class="text-nusaYellow font-bold tracking-wider uppercase text-sm">Di Balik Layar</span>
                    <h2 class="text-3xl lg:text-4xl font-extrabold text-nusaNavy mt-2">Struktur Tim Kami</h2>
                </div>
                <p class="text-gray-500 max-w-md">Digerakkan oleh para talenta terbaik di bidang rekayasa perangkat lunak, manajemen IT, dan desain kreatif.</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                @php
                    $members = [
                        ['name' => 'Alexander', 'role' => 'Project Manager', 'icon' => 'fa-user-tie'],
                        ['name' => 'Alexander', 'role' => 'System Analyst', 'icon' => 'fa-magnifying-glass-chart'],
                        ['name' => 'Alexander', 'role' => 'Lead Developer', 'icon' => 'fa-laptop-code'],
                        ['name' => 'Alexander', 'role' => 'UI/UX Designer', 'icon' => 'fa-pen-nib'],
                    ];
                @endphp

                @foreach($members as $member)
                    <div class="group text-center">
                        <div class="relative mb-6 mx-auto w-48 h-48 rounded-full overflow-hidden border-4 border-gray-100 shadow-md group-hover:border-nusaYellow group-hover:shadow-xl transition-all duration-300">
                            <!-- Overlay Gradient Hover -->
                            <div class="absolute inset-0 bg-nusaNavy/60 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300 z-10">
                                <a href="#" class="w-10 h-10 rounded-full bg-white text-nusaNavy flex items-center justify-center hover:bg-nusaYellow transition-colors">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                            </div>
                            <!-- Foto Placeholder -->
                            <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=400&q=80" alt="{{ $member['name'] }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        </div>
                        <h4 class="text-xl font-bold text-nusaNavy mb-1">{{ $member['name'] }}</h4>
                        <p class="text-nusaYellow font-semibold text-sm flex items-center justify-center gap-2">
                            <i class="fa-solid {{ $member['icon'] }} opacity-70"></i> {{ $member['role'] }}
                        </p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection
