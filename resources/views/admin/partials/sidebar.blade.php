@php
    $dashboardAktif = request()->routeIs('admin.dashboard');
    $kontenAktif    = request()->is('admin/layanan*', 'admin/portofolio*', 'admin/pelatihan*', 'admin/ensiklopedia*');
    $penggunaAktif  = request()->routeIs('admin.pengguna.*', 'admin.client.*');
@endphp

<aside id="sidebar" class="admin-sidebar w-64 shrink-0 bg-[#254261] text-white overflow-y-auto hidden md:block z-20">

    <!-- Logo -->
    <div class="bg-white h-[62px] flex items-center px-4">
        <img src="{{ asset('images/LogoNusa.png') }}" alt="Logo Nusa Indo Tech" class="h-8 w-auto object-contain">
    </div>

    <nav class="px-3 py-4 text-sm font-medium space-y-1">

        <!-- Dashboard -->
        <a href="{{ route('admin.dashboard') }}"
           class="nav-link flex items-center gap-3 px-3 py-2.5 rounded-lg transition-colors {{ $dashboardAktif ? 'bg-white/20 text-white font-semibold' : 'text-gray-200 hover:bg-white/10' }}">
            <i class="fas fa-table-columns w-5 text-center"></i> Dashboard
        </a>

        <!-- Kelola Konten -->
        <button type="button" onclick="toggleSubMenu('menuKonten', this)"
                class="nav-link w-full flex items-center justify-between px-3 py-2.5 rounded-lg focus:outline-none transition-colors {{ $kontenAktif ? 'bg-white/10 text-white font-semibold' : 'text-gray-200 hover:bg-white/10' }}">
            <span class="flex items-center gap-3 whitespace-nowrap">
                <i class="fas fa-newspaper w-5 text-center"></i> Kelola Konten
            </span>
            <i class="chevron fas fa-chevron-down text-xs transition-transform duration-300 {{ $kontenAktif ? 'rotate-180' : '' }}"></i>
        </button>
        <div id="menuKonten" class="{{ $kontenAktif ? 'block' : 'hidden' }} pl-6 space-y-1 mt-1">
            <a href="{{ route('admin.layanan.index') }}" class="nav-sub-link flex items-center gap-3 px-3 py-2 rounded-lg whitespace-nowrap transition-colors {{ request()->routeIs('admin.layanan.index') ? 'bg-white/20 text-white' : 'text-gray-300 hover:bg-white/10' }}">
                <i class="fas fa-briefcase w-5 text-center"></i> Manajemen Layanan
            </a>
            <a href="{{ route('admin.portofolio.index') }}" class="nav-sub-link flex items-center gap-3 px-3 py-2 rounded-lg whitespace-nowrap transition-colors {{ request()->routeIs('admin.portofolio.index') ? 'bg-white/20 text-white' : 'text-gray-300 hover:bg-white/10' }}">
                <i class="fas fa-folder-open w-5 text-center"></i> Portofolio Proyek
            </a>
            <a href="{{ route('admin.pelatihan.index') }}" class="nav-sub-link flex items-center gap-3 px-3 py-2 rounded-lg whitespace-nowrap transition-colors {{ request()->routeIs('admin.pelatihan.index') ? 'bg-white/20 text-white' : 'text-gray-300 hover:bg-white/10' }}">
                <i class="fas fa-graduation-cap w-5 text-center"></i> Pelatihan IT (LMS)
            </a>
            <a href="{{ route('admin.ensiklopedia.index') }}" class="nav-sub-link flex items-center gap-3 px-3 py-2 rounded-lg whitespace-nowrap transition-colors {{ request()->routeIs('admin.ensiklopedia.index') ? 'bg-white/20 text-white' : 'text-gray-300 hover:bg-white/10' }}">
                <i class="fas fa-book w-5 text-center"></i> Ensiklopedia IT (CMS)
            </a>
        </div>

        <!-- Pengguna & Hak Akses -->
        <button type="button" onclick="toggleSubMenu('menuPengguna', this)"
                class="nav-link w-full flex items-center justify-between px-3 py-2.5 rounded-lg focus:outline-none transition-colors {{ $penggunaAktif ? 'bg-white/10 text-white font-semibold' : 'text-gray-200 hover:bg-white/10' }}">
            <span class="flex items-center gap-3 whitespace-nowrap">
                <i class="fas fa-circle-user w-5 text-center"></i> Pengguna &amp; Hak Akses
            </span>
            <i class="chevron fas fa-chevron-down text-xs transition-transform duration-300 {{ $penggunaAktif ? 'rotate-180' : '' }}"></i>
        </button>
        <div id="menuPengguna" class="{{ $penggunaAktif ? 'block' : 'hidden' }} pl-6 space-y-1 mt-1">
            <a href="{{ route('admin.pengguna.index') }}" class="nav-sub-link flex items-center gap-3 px-3 py-2 rounded-lg whitespace-nowrap transition-colors {{ request()->routeIs('admin.pengguna.index') ? 'bg-white/20 text-white' : 'text-gray-300 hover:bg-white/10' }}">
                <i class="fas fa-users-cog w-5 text-center"></i> Admin
            </a>
            <a href="{{ route('admin.client.index') }}" class="nav-sub-link flex items-center gap-3 px-3 py-2 rounded-lg whitespace-nowrap transition-colors {{ request()->routeIs('admin.client.index') ? 'bg-white/20 text-white' : 'text-gray-300 hover:bg-white/10' }}">
                <i class="fas fa-users w-5 text-center"></i> Client
            </a>
        </div>

        <!-- Pengaturan -->
        <a href="#" class="nav-link flex items-center gap-3 px-3 py-2.5 rounded-lg text-gray-200 hover:bg-white/10 transition-colors">
            <i class="fas fa-gear w-5 text-center"></i> Pengaturan
        </a>

        <!-- Approval -->
        <a href="#" class="nav-link flex items-center gap-3 px-3 py-2.5 rounded-lg text-gray-200 hover:bg-white/10 transition-colors">
            <i class="fas fa-file-circle-check w-5 text-center"></i> Approval
        </a>

        <!-- Keluar -->
        <form action="{{ route('admin.logout') }}" method="POST" class="mt-4 border-t border-white/10 pt-2">
            @csrf
            <button type="submit" class="nav-link w-full flex items-center gap-3 px-3 py-2.5 rounded-lg text-left text-red-300 hover:bg-red-500 hover:text-white transition-colors">
                <i class="fas fa-right-from-bracket w-5 text-center"></i> Keluar
            </button>
        </form>
    </nav>
</aside>

<script>
    function toggleSubMenu(targetId, buttonElement) {
        const target = document.getElementById(targetId);
        const chevron = buttonElement.querySelector('.chevron');

        if (target.classList.contains('hidden')) {
            target.classList.remove('hidden');
            target.classList.add('block');
            chevron.classList.add('rotate-180');
        } else {
            target.classList.remove('block');
            target.classList.add('hidden');
            chevron.classList.remove('rotate-180');
        }
    }
</script>
