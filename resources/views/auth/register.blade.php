@extends('layouts.auth')

@section('title', 'Register - Nusa Indo Tech')

@section('left_title')
    Mulai Perjalanan<br>Digital Anda
@endsection

@section('left_desc', 'Daftarkan diri Anda sekarang untuk mendapatkan akses ke solusi dan layanan IT terbaik dari kami.')

@section('left_extra')
    <!-- Poin 1 -->
    <div class="flex items-start">
        <div class="flex-shrink-0 mt-0.5">
            <i class="fas fa-rocket text-[#f7bd55] text-xl"></i>
        </div>
        <div class="ml-4">
            <h3 class="text-sm font-bold text-gray-800">Akses Penuh Layanan</h3>
            <p class="text-xs text-gray-500 mt-1 leading-relaxed">Nikmati kemudahan eksplorasi berbagai layanan IT, mulai dari portofolio pembuatan web hingga program pelatihan eksklusif.</p>
        </div>
    </div>
    <!-- Poin 2 -->
    <div class="flex items-start">
        <div class="flex-shrink-0 mt-0.5">
            <i class="fas fa-calendar-check text-[#f7bd55] text-xl"></i>
        </div>
        <div class="ml-4">
            <h3 class="text-sm font-bold text-gray-800">Jadwalkan Konsultasi</h3>
            <p class="text-xs text-gray-500 mt-1 leading-relaxed">Buat jadwal pertemuan langsung dengan tim ahli kami untuk mendiskusikan rencana dan kebutuhan sistem Anda dengan mudah.</p>
        </div>
    </div>
    <!-- Poin 3 -->
    <div class="flex items-start">
        <div class="flex-shrink-0 mt-0.5">
            <i class="fas fa-bell text-[#f7bd55] text-xl"></i>
        </div>
        <div class="ml-4">
            <h3 class="text-sm font-bold text-gray-800">Sistem Notifikasi Terpadu</h3>
            <p class="text-xs text-gray-500 mt-1 leading-relaxed">Dapatkan pembaruan status proyek, pengingat jadwal, dan pemberitahuan penting secara real-time langsung di akun Anda.</p>
        </div>
    </div>
@endsection

@section('content')
    <div class="max-w-md w-full mx-auto">
        <h2 class="text-4xl font-extrabold text-white mb-8">Register</h2>

        @if ($errors->any())
        <div class="bg-red-100 border border-red-300 rounded-lg p-3 mb-6">
            <ul class="list-disc pl-5 text-red-700 text-xs">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('register.process') }}" method="POST">
            @csrf

            <div class="input-box rounded-2xl px-5 py-3 mb-4 shadow-sm">
                <label class="block text-[11px] font-bold text-gray-400 tracking-wide uppercase mb-1">Username</label>
                <input type="text" name="name" value="{{ old('name') }}" required
                    class="w-full bg-transparent border-none outline-none text-white text-sm font-medium focus:ring-0 p-0"
                    placeholder="Nama Lengkap">
            </div>

            <div class="input-box rounded-2xl px-5 py-3 mb-4 shadow-sm">
                <label class="block text-[11px] font-bold text-gray-400 tracking-wide uppercase mb-1">No Telepon</label>
                <input type="text" name="phone" value="{{ old('phone') }}" required
                    class="w-full bg-transparent border-none outline-none text-white text-sm font-medium focus:ring-0 p-0"
                    placeholder="0812xxxxxx">
            </div>

            <div class="input-box rounded-2xl px-5 py-3 mb-4 shadow-sm">
                <label class="block text-[11px] font-bold text-gray-400 tracking-wide uppercase mb-1">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" required
                    class="w-full bg-transparent border-none outline-none text-white text-sm font-medium focus:ring-0 p-0"
                    placeholder="Email aktif Anda">
            </div>

            <div class="input-box rounded-2xl px-5 py-3 mb-8 shadow-sm relative">
                <label class="block text-[11px] font-bold text-gray-400 tracking-wide uppercase mb-1">Password</label>
                <input type="password" name="password" required id="password"
                    class="w-full bg-transparent border-none outline-none text-white text-sm font-medium focus:ring-0 p-0 pr-8"
                    placeholder="Minimal 6 karakter">
                <div class="absolute right-5 top-1/2 transform -translate-y-1/2 cursor-pointer mt-1" onclick="togglePassword()">
                    <i class="fas fa-eye-slash text-gray-400 hover:text-white transition-colors" id="eyeIcon"></i>
                </div>
            </div>

            <button type="submit" class="w-full btn-yellow hover:bg-yellow-500 font-extrabold py-4 rounded-full transition duration-300 text-sm shadow-lg">
                Daftar Sekarang
            </button>
        </form>

        <div class="mt-8 text-center text-sm text-gray-300 font-medium">
            Sudah punya akun? <a href="{{ route('login') }}" class="font-bold text-[#f7bd55] hover:underline">Masuk di sini</a>
        </div>
    </div>
@endsection

@push('scripts')
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
</script>
@endpush
