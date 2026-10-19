<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard - Nusa Indo Tech')</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');

        body {
            font-family: 'Inter', sans-serif;
            background-color: #f3f4f6;
        }

        .sidebar-bg {
            background-color: #1e3352;
        }

        .nav-item-active {
            background-color: #f3f4f6;
            color: #1e3352;
            font-weight: 600;
        }

        .nav-item-active i {
            color: #1e3352;
        }
    </style>
</head>

<body class="flex h-screen overflow-hidden">

    {{-- SIDEBAR --}}
    <aside class="w-64 sidebar-bg text-gray-300 flex flex-col transition-all duration-300 hidden md:flex z-20">

        {{-- LOGO --}}
        <div class="h-16 flex items-center px-6 bg-white border-b border-gray-200 shadow-sm">
            <img
                src="{{ asset('images/LogoNusa.png') }}"
                alt="Logo Nusa Indo Tech"
                class="h-6 w-auto object-contain"
            >
        </div>

        <nav class="flex-1 overflow-y-auto py-6 px-3 space-y-1">

            {{-- MENU DASHBOARD --}}
            <a
                href="{{ route('dashboard') }}"
                class="{{ request()->routeIs('dashboard') ? 'nav-item-active' : 'hover:bg-[#2a4165] text-white' }} flex items-center px-4 py-3 rounded-lg mb-2 transition-colors"
            >
                <i class="fas fa-th-large w-6 text-lg"></i>
                <span class="ml-2 font-medium">Dashboard</span>
            </a>

            {{-- DROPDOWN PUSAT PENGGUNA --}}
            <div class="mb-2">
                <button
                    type="button"
                    onclick="toggleDropdown('menuPusatPengguna', 'iconPusatPengguna', this)"
                    class="w-full flex items-center justify-between px-4 py-3 rounded-lg transition-colors focus:outline-none {{ request()->is('profile*') ? 'nav-item-active' : 'hover:bg-[#2a4165] text-white' }}"
                >
                    <div class="flex items-center font-medium">
                        <i class="fas fa-user-circle w-6 text-lg"></i>
                        <span class="ml-2">Pusat Pengguna</span>
                    </div>

                    <i
                        id="iconPusatPengguna"
                        class="fas fa-chevron-down text-sm transition-transform duration-300 {{ request()->is('profile*') ? '' : '-rotate-90' }}"
                    ></i>
                </button>

                <div
                    id="menuPusatPengguna"
                    class="pl-12 pr-4 py-2 space-y-3 {{ request()->is('profile*') ? '' : 'hidden' }}"
                >
                    <a
                        href="{{ route('profile.index') }}"
                        class="block text-sm {{ request()->routeIs('profile.index') ? 'text-[#f7bd55] font-bold' : 'hover:text-white transition-colors' }}"
                    >
                        <i class="fas fa-id-card w-5"></i>
                        Data Diri
                    </a>

                    <a
                        href="{{ route('profile.edit') }}"
                        class="block text-sm {{ request()->routeIs('profile.edit') ? 'text-[#f7bd55] font-bold' : 'hover:text-white transition-colors' }}"
                    >
                        <i class="fas fa-user-edit w-5"></i>
                        Edit Data Diri
                    </a>
                </div>
            </div>

            {{-- DROPDOWN KONSULTASI --}}
            @php
                // Menentukan kapan dropdown Konsultasi terbuka
                $menuKonsultasiAktif =
                    request()->is('konsultasi*')
                    || request()->routeIs('notifikasi.index');
            @endphp

            <div class="mb-2 mt-4">

                <button
                    type="button"
                    onclick="toggleDropdown('menuKonsultasi', 'iconKonsultasi', this)"
                    class="w-full flex items-center justify-between px-4 py-3 rounded-lg transition-colors focus:outline-none {{ $menuKonsultasiAktif ? 'nav-item-active' : 'hover:bg-[#2a4165] text-white' }}"
                >
                    <div class="flex items-center font-medium">
                        <i class="fas fa-book w-6 text-lg"></i>
                        <span class="ml-2">Konsultasi</span>
                    </div>

                    <i
                        id="iconKonsultasi"
                        class="fas fa-chevron-down text-sm transition-transform duration-300 {{ $menuKonsultasiAktif ? '' : '-rotate-90' }}"
                    ></i>
                </button>

                <div
                    id="menuKonsultasi"
                    class="pl-12 pr-4 py-2 space-y-4 mt-1 {{ $menuKonsultasiAktif ? '' : 'hidden' }}"
                >

                    {{-- MENU BOOKING --}}
                    <a
                        href="{{ route('konsultasi.booking') }}"
                        class="block text-sm {{ request()->routeIs('konsultasi.booking') ? 'text-[#f7bd55] font-bold' : 'hover:text-white transition-colors' }}"
                    >
                        <i class="fas fa-headset w-5"></i>
                        Booking
                    </a>

                    {{-- MENU KONSULTASI SAYA --}}
                    <a
                        href="{{ route('konsultasi.index') }}"
                        class="block text-sm {{ request()->routeIs('konsultasi.index', 'konsultasi.detail', 'konsultasi.jadwal') ? 'text-[#f7bd55] font-bold' : 'hover:text-white transition-colors' }}"
                    >
                        <i class="fas fa-folder w-5"></i>
                        Konsultasi Saya
                    </a>

                    {{-- MENU NOTIFIKASI --}}
                    <a
                        href="{{ route('notifikasi.index') }}"
                        class="block text-sm {{ request()->routeIs('notifikasi.index') ? 'text-[#f7bd55] font-bold' : 'hover:text-white transition-colors' }}"
                    >
                        <i class="far fa-bell w-5"></i>
                        Notifikasi
                    </a>

                </div>
            </div>

            {{-- MENU PENGATURAN --}}
            <a
                href="{{ route('pengaturan.index') }}"
                class="{{ request()->is('pengaturan*') ? 'nav-item-active' : 'hover:bg-[#2a4165] text-white' }} flex items-center px-4 py-3 rounded-lg mt-2 transition-colors"
            >
                <i class="fas fa-cog w-6 text-lg"></i>
                <span class="ml-2">Pengaturan</span>
            </a>

            {{-- MENU KELUAR --}}
            <form action="{{ route('logout') }}" method="POST" class="w-full mt-2">
                @csrf

                <button
                    type="submit"
                    class="w-full flex items-center px-4 py-3 rounded-lg hover:bg-red-500/20 hover:text-red-400 transition-colors text-white font-medium text-left"
                >
                    <i class="fas fa-sign-out-alt w-6 text-lg"></i>
                    <span class="ml-2">Keluar</span>
                </button>
            </form>

        </nav>
    </aside>

    {{-- KONTEN UTAMA --}}
    <div class="flex-1 flex flex-col overflow-hidden">

        {{-- HEADER --}}
        <header class="h-16 bg-white border-b border-gray-200 flex items-center justify-between px-6 shadow-sm z-10">

            <div class="flex items-center">

                <button
                    type="button"
                    class="text-gray-500 hover:text-gray-700 md:hidden mr-4"
                >
                    <i class="fas fa-bars text-xl"></i>
                </button>

                <div class="relative hidden sm:block w-96">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fas fa-search text-gray-400"></i>
                    </div>

                    <input
                        type="text"
                        class="w-full bg-gray-50 border border-gray-200 text-gray-700 text-sm rounded-lg focus:ring-[#f7bd55] focus:border-[#f7bd55] block pl-10 p-2"
                        placeholder="Penelusuran"
                    >
                </div>

            </div>

            {{-- INFORMASI CLIENT --}}
            <div class="flex items-center space-x-3">

                <div class="text-right hidden sm:block">
                    <div class="text-sm font-bold text-gray-900 leading-none">
                        {{ Auth::guard('client')->user()->name ?? 'Pengguna' }}
                    </div>

                    <div class="text-xs text-gray-500 mt-1">
                        Klien
                    </div>
                </div>

                <div class="w-10 h-10 rounded-full bg-gray-200 flex items-center justify-center overflow-hidden border border-gray-300">
                    @if (Auth::guard('client')->user() && Auth::guard('client')->user()->avatar)
                        <img
                            src="{{ asset('storage/' . Auth::guard('client')->user()->avatar) }}"
                            alt="Avatar"
                            class="w-full h-full object-cover"
                        >
                    @else
                        <i class="fas fa-user text-gray-400 text-xl mt-2"></i>
                    @endif
                </div>

            </div>
        </header>

        {{-- AREA KONTEN HALAMAN --}}
        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-[#f4f7fa] p-6">
            @yield('content')
        </main>

    </div>

    {{-- SCRIPT DROPDOWN SIDEBAR --}}
    <script>
        function toggleDropdown(menuId, iconId, btn) {
            const menu = document.getElementById(menuId);
            const icon = document.getElementById(iconId);
            const isHidden = menu.classList.contains('hidden');

            // Tutup dropdown lain yang sedang terbuka
            document.querySelectorAll('nav > div > div[id^="menu"]').forEach(item => {
                if (item.id !== menuId) {
                    item.classList.add('hidden');
                }
            });

            // Atur tampilan dropdown yang diklik
            if (isHidden) {
                menu.classList.remove('hidden');
                icon.classList.remove('-rotate-90');
            } else {
                menu.classList.add('hidden');
                icon.classList.add('-rotate-90');
            }
        }
    </script>

    @stack('scripts')

</body>
</html>