<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Nusa Indo Technology</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        nusaNavy: '#254261',
                        nusaNavyDark: '#1e3249', /* Warna background form login */
                        nusaYellow: '#f5b73e',
                    },
                    fontFamily: { sans: ['"Plus Jakarta Sans"', 'sans-serif'], }
                }
            }
        }
    </script>
    <style>
        input:focus { outline: none !important; box-shadow: none !important; }
        /* Perbaikan paksa warna autofill Chrome agar tetap gelap dan font putih */
        input:-webkit-autofill,
        input:-webkit-autofill:hover,
        input:-webkit-autofill:focus,
        input:-webkit-autofill:active {
            -webkit-box-shadow: 0 0 0 30px #2a4460 inset !important;
            -webkit-text-fill-color: white !important;
            transition: background-color 5000s ease-in-out 0s;
        }
    </style>
</head>
<body class="font-sans antialiased text-gray-800 bg-white">

    <div class="min-h-screen flex flex-col lg:flex-row">

        <!-- KOLOM KIRI (Informasi) -->
        <div class="w-full lg:w-1/2 flex flex-col px-8 py-10 lg:px-16 xl:px-24 min-h-[50vh] lg:min-h-screen">
            <a href="{{ route('home') }}" class="mb-10 inline-block">
                <img src="{{ asset('images/LogoNusa.png') }}" alt="Logo Nusa Indo Tech" class="h-9 w-auto">
            </a>

            <div class="flex-grow flex flex-col justify-center">
                <h1 class="text-4xl lg:text-5xl font-extrabold text-[#1a2b40] leading-tight mb-4">
                    Mulai Perjalanan <br>
                    <span class="text-[#2a4e76]">Digital Anda</span>
                </h1>

                <p class="text-gray-500 text-[15px] leading-relaxed mb-10 max-w-md">
                    Daftarkan diri Anda sekarang untuk mendapatkan akses ke solusi dan layanan IT terbaik dari kami.
                </p>

                <div class="space-y-6">
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 rounded-full bg-orange-100 flex items-center justify-center flex-shrink-0 mt-0.5">
                            <i class="fa-solid fa-rocket text-orange-500 text-sm"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-[#1a2b40] text-sm">Akses Penuh Layanan</h3>
                            <p class="text-gray-500 text-[13px] mt-1 leading-relaxed">Nikmati kemudahan eksplorasi berbagai layanan IT, mulai dari portofolio pembuatan web hingga program pelatihan eksklusif.</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center flex-shrink-0 mt-0.5">
                            <i class="fa-regular fa-calendar-check text-blue-600 text-sm"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-[#1a2b40] text-sm">Jadwalkan Konsultasi</h3>
                            <p class="text-gray-500 text-[13px] mt-1 leading-relaxed">Buat jadwal pertemuan langsung dengan tim ahli kami untuk mendiskusikan rencana dan kebutuhan sistem Anda dengan mudah.</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 rounded-full bg-yellow-100 flex items-center justify-center flex-shrink-0 mt-0.5">
                            <i class="fa-regular fa-bell text-yellow-600 text-sm"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-[#1a2b40] text-sm">Sistem Notifikasi Terpadu</h3>
                            <p class="text-gray-500 text-[13px] mt-1 leading-relaxed">Dapatkan pembaruan status proyek, pengingat jadwal, dan pemberitahuan penting secara real-time langsung di akun Anda.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-12 text-[11px] lg:text-xs text-gray-400 font-medium">
                © 2026 Nusa Indo Technology. All rights reserved.
            </div>
        </div>

        <!-- KOLOM KANAN (Formulir Pendaftaran) -->
        <div class="w-full lg:w-1/2 bg-[#1e3249] text-white flex flex-col px-8 py-10 lg:px-16 xl:px-24 min-h-[50vh] lg:min-h-screen">

            <div class="flex-grow flex flex-col justify-center max-w-[450px] w-full mx-auto">
                <h2 class="text-3xl font-extrabold mb-8 text-center lg:text-left">Register</h2>

                @if ($errors->any())
                    <div class="bg-red-500/10 border border-red-500/50 text-red-200 text-sm p-4 rounded-xl mb-6">
                        <ul class="list-disc pl-5 space-y-1">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('register.process') }}" method="POST" class="space-y-4">
                    @csrf

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <!-- Background kotak input disamakan dengan gaya Login (#2a4460) -->
                        <div class="bg-[#2a4460] rounded-xl px-4 py-2 border border-transparent focus-within:border-nusaYellow transition-all">
                            <label class="block text-[10px] font-bold text-gray-300 uppercase tracking-wider mb-0.5">Nama Lengkap</label>
                            <input type="text" name="name" value="{{ old('name') }}" class="w-full bg-transparent border-none p-0 text-[13px] text-white placeholder-gray-400" placeholder="Masukkan nama" required>
                        </div>

                        <div class="bg-[#2a4460] rounded-xl px-4 py-2 border border-transparent focus-within:border-nusaYellow transition-all">
                            <label class="block text-[10px] font-bold text-gray-300 uppercase tracking-wider mb-0.5">Username</label>
                            <input type="text" name="username" value="{{ old('username') }}" class="w-full bg-transparent border-none p-0 text-[13px] text-white placeholder-gray-400" placeholder="Buat username" required>
                        </div>
                    </div>

                    <div class="bg-[#2a4460] rounded-xl px-4 py-2 border border-transparent focus-within:border-nusaYellow transition-all">
                        <label class="block text-[10px] font-bold text-gray-300 uppercase tracking-wider mb-0.5">No Telepon</label>
                        <input type="text" name="no_telp" value="{{ old('no_telp') }}" class="w-full bg-transparent border-none p-0 text-[13px] text-white placeholder-gray-400" placeholder="0812xxxxxxx" required>
                    </div>

                    <div class="bg-[#2a4460] rounded-xl px-4 py-2 border border-transparent focus-within:border-nusaYellow transition-all">
                        <label class="block text-[10px] font-bold text-gray-300 uppercase tracking-wider mb-0.5">Email</label>
                        <input type="email" name="email" value="{{ old('email') }}" class="w-full bg-transparent border-none p-0 text-[13px] text-white placeholder-gray-400" placeholder="Email aktif Anda" required>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div class="bg-[#2a4460] rounded-xl px-4 py-2 border border-transparent focus-within:border-nusaYellow transition-all relative">
                            <label class="block text-[10px] font-bold text-gray-300 uppercase tracking-wider mb-0.5">Password</label>
                            <input type="password" name="password" id="password" class="w-full bg-transparent border-none p-0 text-[13px] text-white placeholder-gray-400 pr-8" placeholder="Min. 6 karakter" required>
                            <button type="button" onclick="togglePassword('password', this)" class="absolute right-3 top-[22px] text-gray-400 hover:text-white transition-colors">
                                <i class="fa-solid fa-eye-slash text-xs"></i>
                            </button>
                        </div>

                        <div class="bg-[#2a4460] rounded-xl px-4 py-2 border border-transparent focus-within:border-nusaYellow transition-all relative">
                            <label class="block text-[10px] font-bold text-gray-300 uppercase tracking-wider mb-0.5">Konfirmasi</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" class="w-full bg-transparent border-none p-0 text-[13px] text-white placeholder-gray-400 pr-8" placeholder="Ulangi password" required>
                            <button type="button" onclick="togglePassword('password_confirmation', this)" class="absolute right-3 top-[22px] text-gray-400 hover:text-white transition-colors">
                                <i class="fa-solid fa-eye-slash text-xs"></i>
                            </button>
                        </div>
                    </div>

                    <div class="pt-2">
                        <button type="submit" class="w-full bg-nusaYellow hover:bg-[#e0a430] text-[#0f172a] font-bold py-3.5 rounded-xl transition-colors shadow-lg text-[15px]">
                            Daftar Sekarang
                        </button>
                    </div>
                </form>

                <p class="text-center text-[13px] text-gray-300 mt-8">
                    Sudah punya akun? <a href="{{ route('login') }}" class="text-nusaYellow hover:text-white font-bold transition-colors">Login di sini</a>
                </p>
            </div>

            <div class="mt-12 text-[11px] lg:text-xs text-gray-300/70 font-medium text-center lg:text-right">
                By <span class="text-white font-semibold">Politeknik Negeri Jember PSDKU Sidoarjo</span>
            </div>
        </div>
    </div>

    <script>
        function togglePassword(inputId, btn) {
            const input = document.getElementById(inputId);
            const icon = btn.querySelector('i');
            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.replace('fa-eye-slash', 'fa-eye');
            } else {
                input.type = 'password';
                icon.classList.replace('fa-eye', 'fa-eye-slash');
            }
        }
    </script>
</body>
</html>
