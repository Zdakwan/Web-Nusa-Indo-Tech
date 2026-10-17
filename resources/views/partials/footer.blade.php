<footer class="footer">
    <div class="container">
        <div class="footer-grid">
            <!-- Kolom 1: Info Brand -->
            <div>
                <div class="brand-footer">
                    <img src="{{ asset('img/LogoNusa.png') }}" alt="Logo Nusa Indo Technology" class="brand-img-footer">
                </div>
                <p class="footer-desc">
                    Solusi IT terintegrasi untuk masa depan bisnis Anda. Menyediakan layanan konsultasi, arsitektur sistem, tata kelola, dan pengembangan teknologi profesional.
                </p>
                <div class="footer-contact">
                    <p><i class="fa-solid fa-phone"></i> +62 812-3456-7890</p>
                    <p><i class="fa-solid fa-envelope"></i> hello@nusatechindo.com</p>
                </div>
            </div>

            <!-- Kolom 2: Navigasi Halaman Publik -->
            <div>
                <h4 class="footer-heading">Navigasi</h4>
                <ul class="footer-links">
                    <li><a href="{{ route('home') }}">Beranda</a></li>
                    <li><a href="{{ route('portofolio.index') }}">Profil & Portofolio</a></li>
                    <li><a href="{{ route('layanan') }}">Layanan</a></li>
                    <li><a href="{{ route('tentang-kami') }}">Tentang Kami</a></li>
                </ul>
            </div>

            <!-- Kolom 3: Layanan & Akun (Otentikasi) -->
            <div>
                <h4 class="footer-heading">Layanan & Akun</h4>
                <ul class="footer-links">
                    <li><a href="{{ route('register') }}">Pendaftaran Akun (Registrasi)</a></li>
                    <li><a href="{{ url('/dashboard-client') }}">Dashboard Klien</a></li>
                    
                    <!-- Kedua login admin sementara diarahkan ke form login utama -->
                    <li><a href="{{ route('login') }}">Login Admin Layanan</a></li>
                    <li><a href="{{ route('login') }}">Login Super Admin</a></li>
                </ul>
            </div>
        </div>

        <div class="footer-bottom">
            <p>© 2026 Nusa Indo Technology. Hak cipta dilindungi.</p>
            <p>Web / IT Management Consultant Project</p>
        </div>
    </div>
</footer>