<header>
    <div class="logo">
        <!-- Ganti dengan tag <img> logo Anda -->
        <strong>NUSAINDO TECHNOLOGY</strong>
    </div>
    <nav>
        <ul>
            <!-- Gunakan fungsi url() milik Laravel untuk mengarah ke route -->
            <li><a href="{{ url('/') }}">Beranda</a></li>
            <li><a href="{{ url('/layanan') }}">Layanan</a></li>
            <li><a href="{{ url('/portofolio') }}">Portofolio</a></li>
            <li><a href="{{ url('/pelatihan') }}">Pelatihan</a></li>
            <li><a href="{{ url('/ensiklopedia') }}">Ensiklopedia</a></li>
            <li><a href="{{ url('/tentang-kami') }}">Tentang Kami</a></li>
            <li><a href="{{ url('/daftar') }}">Daftar</a></li>
            
        </ul>
    </nav>
   <!-- Ubah baris ini -->
<a href="{{ url('/login') }}" class="btn-login">Login</a>
</header>