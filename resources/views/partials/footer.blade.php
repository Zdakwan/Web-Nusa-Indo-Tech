<footer class="bg-[#0f172a] text-gray-400 py-12 mt-auto">
    <div class="container mx-auto px-6 max-w-7xl">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-12 lg:gap-24">

            <!-- KOLOM 1: INFO PERUSAHAAN -->
            <div>
                <img src="{{ asset('images/LogoNusa.png') }}" alt="Nusa Indo Technology" class="h-10 mb-6">
                <p class="text-sm leading-relaxed mb-6">
                    Solusi IT terintegrasi untuk masa depan bisnis Anda. Menyediakan layanan konsultasi, arsitektur sistem, tata kelola, dan pengembangan teknologi profesional.
                </p>
                <div class="space-y-3 text-sm">
                    <p class="flex items-center gap-3 text-white">
                        <i class="fa-solid fa-phone text-[#f5b73e]"></i> +62 878-5246-1990
                    </p>
                    <p class="flex items-center gap-3 text-white">
                        <i class="fa-solid fa-envelope text-[#f5b73e]"></i> nusaindotech@gmail.com
                    </p>
                </div>
            </div>

            <!-- KOLOM 2: NAVIGASI PUBLIK -->
            <div>
                <h4 class="text-white font-bold tracking-wider mb-6 text-sm uppercase">Navigasi</h4>
                <ul class="space-y-4 text-sm">
                    <li><a href="{{ route('home') }}" class="hover:text-[#f5b73e] transition-colors">Beranda</a></li>
                    <li><a href="{{ route('layanan') }}" class="hover:text-[#f5b73e] transition-colors">Layanan IT</a></li>
                    <li><a href="{{ route('portofolio.index') }}" class="hover:text-[#f5b73e] transition-colors">Portofolio Proyek</a></li>
                    <li><a href="{{ route('pelatihan.index') }}" class="hover:text-[#f5b73e] transition-colors">Pelatihan (LMS)</a></li>
                    <li><a href="{{ route('ensiklopedia.index') }}" class="hover:text-[#f5b73e] transition-colors">Ensiklopedia IT</a></li>
                    <li><a href="{{ route('tentang-kami') }}" class="hover:text-[#f5b73e] transition-colors">Tentang Kami</a></li>
                </ul>
            </div>

            <!-- KOLOM 3: AKUN (PENGUNJUNG) -->
            <div>
                <h4 class="text-white font-bold tracking-wider mb-6 text-sm uppercase">Layanan & Akun</h4>
                <ul class="space-y-4 text-sm">
                    <li><a href="{{ route('login') }}" class="hover:text-[#f5b73e] transition-colors">Login Klien</a></li>
                    <li><a href="{{ route('register') }}" class="hover:text-[#f5b73e] transition-colors">Pendaftaran Akun (Registrasi)</a></li>
                    <li><a href="{{ route('login') }}" class="hover:text-[#f5b73e] transition-colors">Booking Konsultasi</a></li>
                </ul>
            </div>

        </div>

        <!-- FOOTER BAWAH -->
        <div class="mt-12 pt-8 border-t border-gray-800 flex flex-col md:flex-row justify-between items-center gap-4 text-xs">
            <p>&copy; 2026 Nusa Indo Technology. Hak cipta dilindungi.</p>
            <div class="flex items-center gap-4">
                <p>By Politeknik Negeri Jember PSDKU Sidoarjo</p>
                <span class="text-gray-700">|</span>
                <!-- Tautan login admin dibuat samar agar tidak mencolok bagi pengunjung biasa -->
                <a href="{{ route('admin.login') }}" class="text-gray-700 hover:text-gray-400 transition-colors" title="Login Portal Admin">
                    <i class="fa-solid fa-shield-halved"></i> Admin
                </a>
            </div>
        </div>
    </div>
</footer>
