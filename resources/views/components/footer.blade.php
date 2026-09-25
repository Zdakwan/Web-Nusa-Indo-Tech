<footer>
    <div class="footer-container">
        <div class="footer-col about-col">
            <div class="footer-logo">Nusa Indo Technology</div>
            <p>Solusi IT Terintegrasi untuk masa depan bisnis Anda. Menyediakan layanan konsultasi, arsitektur sistem, tata kelola, dan pengembangan teknologi profesional.</p>
            <p>📞 +62 812-3456-7890</p>
            <p>✉️ hello@nusaindotech.com</p>
        </div>
        
        <div class="footer-col">
            <h4>NAVIGASI</h4>
            <ul>
                <li><a href="{{ url('/') }}">Beranda</a></li>
                <li><a href="{{ url('/portofolio') }}">Profil & Portofolio</a></li>
                <li><a href="{{ url('/layanan') }}">Layanan Utama</a></li>
                <li><a href="{{ url('/tentang-kami') }}">Tentang Kami</a></li>
                <!-- Navigasi Kontak sudah diganti menjadi Daftar sebelumnya -->
                <li><a href="{{ url('/daftar') }}">Daftar</a></li>
            </ul>
        </div>
        
        <div class="footer-col">
            <h4>LAYANAN & AKUN</h4>
            <ul>
                <!-- Diarahkan ke halaman /daftar -->
                <li><a href="{{ url('/daftar') }}">Pendaftaran Akun (Register)</a></li>
                
               
                
                <!-- Semua menu yang membutuhkan autentikasi diarahkan ke halaman /login -->
                <li><a href="{{ url('/login') }}">Dashboard Klien</a></li>
                <li><a href="{{ url('/login') }}">Login Admin Layanan</a></li>
                <li><a href="{{ url('/login') }}">Login Super Admin</a></li>
            </ul>
        </div>
    </div>
    
    <div class="footer-bottom">
        <p>&copy; 2024 Nusa Indo Technology. Hak Cipta Dilindungi.</p>
        <p>Nusa IT Management Consultant Project</p>
    </div>
</footer>