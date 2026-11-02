@extends('layouts.auth')

@section('title', 'Login Admin - Nusa Indo Tech')

@section('left_title')
    Panel Admin<br>Nusa Indo Tech
@endsection

@section('left_desc', 'Area khusus administrator untuk mengelola layanan, portofolio, pelatihan, dan jadwal konsultasi klien.')

@section('left_extra')
    <div class="flex items-start">
        <div class="flex-shrink-0 mt-0.5">
            <i class="fas fa-user-shield text-[#f7bd55] text-xl"></i>
        </div>
        <div class="ml-4">
            <h3 class="text-sm font-bold text-gray-800">Akses Terbatas</h3>
            <p class="text-xs text-gray-500 mt-1 leading-relaxed">Halaman ini hanya untuk administrator yang berwenang.</p>
        </div>
    </div>
    <div class="flex items-start">
        <div class="flex-shrink-0 mt-0.5">
            <i class="fas fa-calendar-check text-[#f7bd55] text-xl"></i>
        </div>
        <div class="ml-4">
            <h3 class="text-sm font-bold text-gray-800">Kelola Konsultasi</h3>
            <p class="text-xs text-gray-500 mt-1 leading-relaxed">Setujui, tolak, dan atur jadwal konsultasi dari klien.</p>
        </div>
    </div>
    <div class="flex items-start">
        <div class="flex-shrink-0 mt-0.5">
            <i class="fas fa-database text-[#f7bd55] text-xl"></i>
        </div>
        <div class="ml-4">
            <h3 class="text-sm font-bold text-gray-800">Kelola Konten</h3>
            <p class="text-xs text-gray-500 mt-1 leading-relaxed">Perbarui layanan, portofolio, pelatihan, dan ensiklopedia.</p>
        </div>
    </div>
@endsection

@section('content')
    <div class="max-w-md w-full mx-auto">
        <h2 class="text-4xl font-extrabold text-white mb-2">Login Admin</h2>
        <p class="text-sm text-gray-300 mb-8">Masuk untuk mengakses panel administrator.</p>

        {{-- Pesan Gagal Login --}}
        @if(session('error'))
        <div id="alert-error-box" class="bg-red-100 border border-red-300 rounded-lg p-3 mb-6 relative">
            <div class="flex items-start">
                <i id="alert-error-icon" class="fas fa-times-circle text-red-600 mt-1 mr-2"></i>
                <div>
                    <h3 id="alert-error-title" class="text-red-800 font-bold text-sm">Login Gagal!</h3>
                    <p id="alert-error-msg" class="text-red-700 text-xs mt-1">{{ session('error') }}</p>
                </div>
                <button type="button" class="absolute top-2 right-2 text-red-500 hover:text-red-700" onclick="this.parentElement.parentElement.style.display='none'">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
        @endif

        {{-- Pesan Sukses (Misal setelah Logout) --}}
        @if(session('success'))
        <div class="bg-green-100 border border-green-300 rounded-lg p-3 mb-6 relative">
            <div class="flex items-start">
                <i class="fas fa-check-circle text-green-600 mt-1 mr-2"></i>
                <div>
                    <h3 class="text-green-800 font-bold text-sm">Berhasil!</h3>
                    <p class="text-green-700 text-xs mt-1">{{ session('success') }}</p>
                </div>
                <button type="button" class="absolute top-2 right-2 text-green-500 hover:text-green-700" onclick="this.parentElement.parentElement.style.display='none'">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
        @endif

        @if ($errors->any())
        <div class="bg-red-100 border border-red-300 rounded-lg p-3 mb-6">
            <ul class="list-disc pl-5 text-red-700 text-xs">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('admin.login.process') }}" method="POST" autocomplete="off">
            @csrf

            <div class="input-box rounded-2xl px-5 py-3 mb-5 shadow-sm">
                <label class="block text-[11px] font-bold text-gray-400 tracking-wide uppercase mb-1">Email Admin</label>
                <input type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="off"
                    class="w-full bg-transparent border-none outline-none text-white text-sm font-medium focus:ring-0 p-0"
                    placeholder="admin@nusaindotech.com">
            </div>

            <div class="input-box rounded-2xl px-5 py-3 mb-6 shadow-sm relative">
                <label class="block text-[11px] font-bold text-gray-400 tracking-wide uppercase mb-1">Password</label>
                <input type="password" name="password" required id="password" autocomplete="new-password"
                    class="w-full bg-transparent border-none outline-none text-white text-sm font-medium focus:ring-0 p-0 pr-8"
                    placeholder="••••••••">
                <div class="absolute right-5 top-1/2 transform -translate-y-1/2 cursor-pointer mt-1" onclick="togglePassword()">
                    <i class="fas fa-eye-slash text-gray-400 hover:text-white transition-colors" id="eyeIcon"></i>
                </div>
            </div>

            <div class="flex items-center mb-8">
                <label class="flex items-center cursor-pointer">
                    <input type="checkbox" name="remember" class="w-4 h-4 accent-[#f7bd55] cursor-pointer">
                    <span class="ml-2 text-sm text-gray-300 font-semibold">Ingat saya</span>
                </label>
            </div>

            <button type="submit" id="btn-submit-login" class="w-full btn-yellow hover:bg-yellow-500 font-extrabold py-4 rounded-full transition duration-300 text-sm shadow-lg">
                Login Admin
            </button>
        </form>

        <div class="mt-8 text-center text-sm text-gray-300 font-medium">
            Bukan admin? <a href="{{ route('login') }}" class="font-bold text-[#f7bd55] hover:underline">Login sebagai klien</a>
        </div>
    </div>

    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const eyeIcon = document.getElementById('eyeIcon');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.classList.remove('fa-eye-slash');
                eyeIcon.classList.add('fa-eye');
            } else {
                passwordInput.type = 'password';
                eyeIcon.classList.remove('fa-eye');
                eyeIcon.classList.add('fa-eye-slash');
            }
        }

        (function () {
            const errorMsgEl = document.getElementById('alert-error-msg');
            if (!errorMsgEl) return;

            const text = errorMsgEl.textContent;
            const match = text.match(/(\d+)\s+detik/i);

            if (match) {
                let seconds = parseInt(match[1], 10);

                errorMsgEl.innerHTML = text.replace(
                    /(\d+)\s+detik/i,
                    '<strong id="countdown-timer" class="underline font-extrabold text-sm">' + seconds + '</strong> detik'
                );

                const timerSpan = document.getElementById('countdown-timer');
                const submitBtn = document.getElementById('btn-submit-login');
                const errorBox = document.getElementById('alert-error-box');
                const errorTitle = document.getElementById('alert-error-title');
                const errorIcon = document.getElementById('alert-error-icon');

                // 1. Ambil elemen input email dan password
                const emailInput = document.querySelector('input[name="email"]');
                const passwordInput = document.getElementById('password');

                // 2. Kunci tombol dan input saat hitung mundur dimulai
                if (submitBtn) {
                    submitBtn.disabled = true;
                    submitBtn.classList.add('opacity-50', 'cursor-not-allowed');
                }
                if (emailInput) {
                    emailInput.disabled = true;
                    emailInput.classList.add('opacity-50', 'cursor-not-allowed');
                }
                if (passwordInput) {
                    passwordInput.disabled = true;
                    passwordInput.classList.add('opacity-50', 'cursor-not-allowed');
                }

                const interval = setInterval(function () {
                    seconds--;

                    if (seconds > 0) {
                        if (timerSpan) timerSpan.textContent = seconds;
                    } else {
                        clearInterval(interval);

                        if (errorBox) {
                            errorBox.classList.remove('bg-red-100', 'border-red-300');
                            errorBox.classList.add('bg-green-100', 'border-green-300');
                        }
                        if (errorIcon) {
                            errorIcon.classList.remove('fa-times-circle', 'text-red-600');
                            errorIcon.classList.add('fa-check-circle', 'text-green-600');
                        }
                        if (errorTitle) {
                            errorTitle.classList.remove('text-red-800');
                            errorTitle.classList.add('text-green-800');
                            errorTitle.textContent = 'Waktu Tunggu Selesai!';
                        }
                        errorMsgEl.classList.remove('text-red-700');
                        errorMsgEl.classList.add('text-green-700', 'font-semibold');
                        errorMsgEl.textContent = 'Silakan isi email dan password Anda untuk login kembali.';

                        // 3. Buka kembali kuncian tombol dan input saat hitung mundur selesai
                        if (submitBtn) {
                            submitBtn.disabled = false;
                            submitBtn.classList.remove('opacity-50', 'cursor-not-allowed');
                        }
                        if (emailInput) {
                            emailInput.disabled = false;
                            emailInput.classList.remove('opacity-50', 'cursor-not-allowed');
                            emailInput.value = ''; // Opsional: mengosongkan email sebelumnya
                        }
                        if (passwordInput) {
                            passwordInput.disabled = false;
                            passwordInput.classList.remove('opacity-50', 'cursor-not-allowed');
                            passwordInput.value = ''; // Opsional: mengosongkan password sebelumnya
                        }
                    }
                }, 1000);
            }
        })();
    </script>
@endsection
