<aside id="sidebar" class="w-64 shrink-0 bg-[#1b3a63] text-white sticky top-0 h-screen overflow-y-auto transition-all duration-300 z-30">
    <!-- Logo -->
    <div class="bg-white h-[62px] flex items-center px-4">
        <span class="text-[#f7bd55] font-extrabold italic text-2xl tracking-tighter mr-2">///T</span>
        <div class="leading-none">
            <div class="text-[#1b3a63] font-extrabold text-[13px]">NUSAINDO<span class="font-medium">TECHNOLOGY</span></div>
            <div class="text-[8px] text-gray-500 mt-0.5">IT MANAGEMENT CONSULTANT</div>
        </div>
    </div>

    <nav class="px-2 py-3 text-sm font-semibold space-y-1">
        <!-- Dashboard -->
        <a href="{{ route('admin.dashboard') }}"
           class="flex items-center gap-3 px-3 py-2.5 rounded-lg {{ request()->routeIs('admin.dashboard') ? 'bg-[#eaf0fb] text-[#1b3a63]' : 'hover:bg-white/10' }}">
            <i class="fas fa-table-columns w-5 text-center"></i> Dashboard
        </a>

        <!-- Kelola Konten -->
        <button type="button" onclick="toggleMenu('menuKonten')"
                class="w-full flex items-center justify-between px-3 py-2.5 rounded-lg hover:bg-white/10">
            <span class="flex items-center gap-3"><i class="fas fa-newspaper w-5 text-center"></i> Kelola Konten</span>
            <i id="menuKonten-chevron" class="fas fa-chevron-down text-xs transition-transform rotate-180"></i>
        </button>
        <div id="menuKonten" class="pl-6 space-y-1">
            <a href="#" class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-white/10"><i class="fas fa-briefcase w-5 text-center"></i> Manajemen Layanan</a>
            <a href="#" class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-white/10"><i class="fas fa-folder-open w-5 text-center"></i> Portofolio Proyek</a>
            <a href="#" class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-white/10"><i class="fas fa-graduation-cap w-5 text-center"></i> Pelatihan IT (LMS)</a>
            <a href="#" class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-white/10"><i class="fas fa-book w-5 text-center"></i> Ensiklopedia IT (CMS)</a>
        </div>

        <!-- Pengguna & Hak Akses -->
        <button type="button" onclick="toggleMenu('menuPengguna')"
                class="w-full flex items-center justify-between px-3 py-2.5 rounded-lg hover:bg-white/10">
            <span class="flex items-center gap-3"><i class="fas fa-circle-user w-5 text-center"></i> Pengguna &amp; Hak Akses</span>
            <i id="menuPengguna-chevron" class="fas fa-chevron-down text-xs transition-transform rotate-180"></i>
        </button>
        <div id="menuPengguna" class="pl-6 space-y-1">
            <a href="#" class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-white/10"><i class="fas fa-circle-user w-5 text-center"></i> Admin</a>
            <a href="#" class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-white/10"><i class="fas fa-circle-user w-5 text-center"></i> Client</a>
        </div>

        <a href="#" class="flex items-center gap-3 px-3 py-2.5 rounded-lg hover:bg-white/10">
            <i class="fas fa-gear w-5 text-center"></i> Pengaturan
        </a>

        <a href="#" class="flex items-center gap-3 px-3 py-2.5 rounded-lg hover:bg-white/10">
            <i class="fas fa-file-circle-check w-5 text-center"></i> Approval
        </a>

        <!-- Keluar -->
        <form action="{{ route('admin.logout') }}" method="POST">
            @csrf
            <button type="submit" class="w-full flex items-center gap-3 px-3 py-2.5 rounded-lg hover:bg-white/10 text-left">
                <i class="fas fa-right-from-bracket w-5 text-center"></i> Keluar
            </button>
        </form>
    </nav>
</aside>
