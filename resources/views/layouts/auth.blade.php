<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Nusa Indo Tech')</title>
    <!-- Tailwind & FontAwesome -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- CSS Terpisah -->
    <style>
        .input-box { background-color: #3b4e68; color: #ffffff; }
        .input-box::placeholder { color: #9ca3af; }
        .btn-yellow { background-color: #f7bd55; color: #1e3352; }
    </style>
</head>
<body class="flex min-h-screen font-sans">

    <!-- Kolom Kiri (Brand / Info) -->
    <div class="hidden lg:flex flex-col w-5/12 bg-white px-14 py-12 text-gray-800">

        <div class="flex-grow flex flex-col justify-center">
            <!-- Logo -->
            <div class="mb-10 inline-block">
                <img src="{{ asset('images/LogoNusa.png') }}" alt="Logo Nusa Indo Tech" class="h-8 w-auto object-contain">
            </div>

            <!-- Teks Utama -->
            <h1 class="text-4xl xl:text-5xl font-extrabold mb-5 leading-tight text-[#1e3352]">
                @yield('left_title')
            </h1>
            <p class="text-base text-gray-600 font-medium mb-10 leading-relaxed">
                @yield('left_desc')
            </p>

            <!-- Teks Tambahan / Poin Fitur -->
            <div class="space-y-6">
                @yield('left_extra')
            </div>
        </div>

        <!-- Copyright Bagian Kiri -->
        <div class="mt-auto pt-8 border-t border-gray-100">
            <p class="text-xs text-gray-400 font-medium">&copy; {{ date('Y') }} Nusa Indo Technology. All rights reserved.</p>
        </div>

    </div>

    <!-- Kolom Kanan (Konten Form) -->
    <div class="w-full lg:w-7/12 flex flex-col justify-between px-8 sm:px-16 md:px-24 py-12 relative bg-[#1e3352]">

        <!-- Wrapper Kosong untuk mendorong konten ke tengah -->
        <div></div>

        <!-- Konten Form Utama -->
        <div class="flex-grow flex flex-col justify-center">
            @yield('content')
        </div>

        <!-- Copyright Bagian Kanan (Politeknik Negeri Jember PSDKU Sidoarjo) -->
        <div class="mt-auto pt-8 text-right">
            <p class="text-xs text-gray-400 font-medium">By <span class="font-bold text-gray-300">Politeknik Negeri Jember PSDKU Sidoarjo</span></p>
        </div>

    </div>

    <!-- Script spesifik dari halaman -->
    @stack('scripts')

</body>
</html>
