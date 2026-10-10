<header class="navbar">
    <div class="container nav-container">
        <div class="brand">
            <a href="{{ url('/') }}" class="flex-brand">
                <img src="{{ asset('img/LogoNusa.png') }}" alt="Logo Nusa Indo Technology" class="brand-img">
            </a>
        </div>

        <ul class="nav-menu">
            <li><a href="{{ route('home') }}" class="nav-link {{ request()->is('/') ? 'active' : '' }}">Beranda</a></li>
            <li><a href="{{ route('layanan') }}" class="nav-link {{ request()->is('layanan') ? 'active' : '' }}">Layanan</a></li>
            <li><a href="{{ route('portofolio.index') }}" class="nav-link {{ request()->is('portofolio*') ? 'active' : '' }}">Portofolio</a></li>
            <li><a href="{{ url('/pelatihan') }}" class="nav-link {{ request()->is('pelatihan*') ? 'active' : '' }}">Pelatihan</a></li>
            <li><a href="{{ route('ensiklopedia.index') }}" class="nav-link {{ request()->is('ensiklopedia*') ? 'active' : '' }}">Ensiklopedia</a></li>
            <li><a href="{{ route('tentang-kami') }}" class="nav-link {{ request()->is('tentang-kami') ? 'active' : '' }}">Tentang Kami</a></li>
            <li><a href="{{ route('register') }}" class="nav-link">Register</a></li>
        </ul>

        <div>
            <a href="{{ route('login') }}" class="btn-login">Login</a>
        </div>
    </div>
</header>