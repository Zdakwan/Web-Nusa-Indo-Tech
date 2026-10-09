@php
    $segment = request()->segment(2);

    $dashboardAktif = ($segment == 'dashboard');
    $kontenAktif    = in_array($segment, ['layanan', 'portofolio', 'pelatihan', 'ensiklopedia']);
    $penggunaAktif  = in_array($segment, ['pengguna', 'client']);
    $approvalAktif  = ($segment == 'approval');
    $pengaturanAktif = ($segment == 'pengaturan');
@endphp

<aside id="sidebar" class="admin-sidebar w-64 shrink-0 bg-[#254261] text-white overflow-y-auto hidden md:block z-20">

    <!-- Logo -->
    <div class="bg-white h-[62px] flex items-center px-4">
        <img src="{{ asset('images/LogoNusa.png') }}" alt="Logo Nusa Indo Tech" class="h-8 w-auto object-contain">
    </div>

    <!-- Ukuran font dikecilkan menjadi text-[13px] -->
    <nav class="px-3 py-4 font-medium space-y-1 text-[13px]">

        <!-- Dashboard -->
        <a href="{{ route('admin.dashboard') }}"
           class="nav-link flex items-center gap-3 px-3 py-2.5 rounded-lg transition-colors {{ $dashboardAktif ? 'bg-white text-[#254261] font-bold shadow-sm' : 'text-gray-200 hover:bg-[#334f6c]' }}">
            <i class="fas fa-table-columns w-5 shrink-0 text-center {{ $dashboardAktif ? 'text-[#254261]' : 'text-gray-200' }}"></i>
            <span class="truncate">Dashboard</span>
        </a>

        <!-- Kelola Konten -->
        <button type="button" onclick="toggleSubMenu('menuKonten', this)"
                class="nav-link w-full flex items-center justify-between px-3 py-2.5 rounded-lg focus:outline-none transition-colors {{ $kontenAktif ? 'bg-white text-[#254261] font-bold shadow-sm' : 'text-gray-200 hover:bg-[#334f6c]' }}">
            <span class="flex items-center gap-3 overflow-hidden">
                <i class="fas fa-newspaper w-5 shrink-0 text-center {{ $kontenAktif ? 'text-[#254261]' : 'text-gray-200' }}"></i>
                <span class="truncate">Kelola Konten</span>
            </span>
            <i class="chevron fas fa-chevron-down shrink-0 text-[10px] transition-transform duration-300 {{ $kontenAktif ? 'rotate-180 text-[#254261]' : 'text-gray-200' }}"></i>
        </button>
        <div id="menuKonten" class="{{ $kontenAktif ? 'block' : 'hidden' }} pl-6 space-y-1 mt-1">
            <a href="{{ route('admin.layanan.index') }}" class="nav-sub-link flex items-center gap-3 px-3 py-2 rounded-lg transition-colors {{ $segment == 'layanan' ? 'text-white font-bold bg-[#334f6c]' : 'text-gray-300 hover:text-white' }}">
                <i class="fas fa-briefcase w-4 shrink-0 text-center"></i> <span class="truncate">Manajemen Layanan</span>
            </a>
            <a href="{{ route('admin.portofolio.index') }}" class="nav-sub-link flex items-center gap-3 px-3 py-2 rounded-lg transition-colors {{ $segment == 'portofolio' ? 'text-white font-bold bg-[#334f6c]' : 'text-gray-300 hover:text-white' }}">
                <i class="fas fa-folder-open w-4 shrink-0 text-center"></i> <span class="truncate">Portofolio Proyek</span>
            </a>
            <a href="{{ route('admin.pelatihan.index') }}" class="nav-sub-link flex items-center gap-3 px-3 py-2 rounded-lg transition-colors {{ $segment == 'pelatihan' ? 'text-white font-bold bg-[#334f6c]' : 'text-gray-300 hover:text-white' }}">
                <i class="fas fa-graduation-cap w-4 shrink-0 text-center"></i> <span class="truncate">Pelatihan IT (LMS)</span>
            </a>
            <a href="{{ route('admin.ensiklopedia.index') }}" class="nav-sub-link flex items-center gap-3 px-3 py-2 rounded-lg transition-colors {{ $segment == 'ensiklopedia' ? 'text-white font-bold bg-[#334f6c]' : 'text-gray-300 hover:text-white' }}">
                <i class="fas fa-book w-4 shrink-0 text-center"></i> <span class="truncate">Ensiklopedia IT (CMS)</span>
            </a>
        </div>

        <!-- Pengguna & Hak Akses -->
        <button type="button" onclick="toggleSubMenu('menuPengguna', this)"
                class="nav-link w-full flex items-center justify-between px-3 py-2.5 rounded-lg focus:outline-none transition-colors {{ $penggunaAktif ? 'bg-white text-[#254261] font-bold shadow-sm' : 'text-gray-200 hover:bg-[#334f6c]' }}">
            <span class="flex items-center gap-3 overflow-hidden">
                <i class="fas fa-circle-user w-5 shrink-0 text-center {{ $penggunaAktif ? 'text-[#254261]' : 'text-gray-200' }}"></i>
                <span class="truncate">Pengguna & Hak Akses</span>
            </span>
            <i class="chevron fas fa-chevron-down shrink-0 text-[10px] transition-transform duration-300 {{ $penggunaAktif ? 'rotate-180 text-[#254261]' : 'text-gray-200' }}"></i>
        </button>
        <div id="menuPengguna" class="{{ $penggunaAktif ? 'block' : 'hidden' }} pl-6 space-y-1 mt-1">
            <a href="{{ route('admin.pengguna.index') }}" class="nav-sub-link flex items-center gap-3 px-3 py-2 rounded-lg transition-colors {{ $segment == 'pengguna' ? 'text-white font-bold bg-[#334f6c]' : 'text-gray-300 hover:text-white' }}">
                <i class="fas fa-users-cog w-4 shrink-0 text-center"></i> <span class="truncate">Admin</span>
            </a>
            <a href="{{ route('admin.client.index') }}" class="nav-sub-link flex items-center gap-3 px-3 py-2 rounded-lg transition-colors {{ $segment == 'client' ? 'text-white font-bold bg-[#334f6c]' : 'text-gray-300 hover:text-white' }}">
                <i class="fas fa-users w-4 shrink-0 text-center"></i> <span class="truncate">Client</span>
            </a>
        </div>

       <!-- Pengaturan -->
        <a href="{{ route('admin.pengaturan.index') }}" class="nav-link flex items-center gap-3 px-3 py-2.5 rounded-lg transition-colors {{ $pengaturanAktif ? 'bg-white text-[#254261] font-bold shadow-sm' : 'text-gray-200 hover:bg-[#334f6c]' }}">
            <i class="fas fa-gear w-5 shrink-0 text-center {{ $pengaturanAktif ? 'text-[#254261]' : 'text-gray-200' }}"></i> <span class="truncate">Pengaturan</span>
        </a>

        <!-- Approval -->
        <a href="{{ route('admin.approval.index') }}" class="nav-link flex items-center gap-3 px-3 py-2.5 rounded-lg transition-colors {{ $approvalAktif ? 'bg-white text-[#254261] font-bold shadow-sm' : 'text-gray-200 hover:bg-[#334f6c]' }}">
            <i class="fas fa-file-circle-check w-5 shrink-0 text-center {{ $approvalAktif ? 'text-[#254261]' : 'text-gray-200' }}"></i> <span class="truncate">Approval</span>
        </a>

        <!-- Keluar -->
        <form action="{{ route('admin.logout') }}" method="POST" class="mt-4 border-t border-white/10 pt-2">
            @csrf
            <button type="submit" class="nav-link w-full flex items-center gap-3 px-3 py-2.5 rounded-lg text-left text-[#ff8a8a] hover:bg-red-500 hover:text-white transition-colors">
                <i class="fas fa-right-from-bracket w-5 shrink-0 text-center"></i> <span class="truncate">Keluar</span>
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
