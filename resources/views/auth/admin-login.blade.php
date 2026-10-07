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

        @if(session('error'))
        <div class="bg-red-100 border border-red-300 rounded-lg p-3 mb-6 relative">
            <div class="flex items-start">
                <i class="fas fa-times-circle text-red-600 mt-1 mr-2"></i>
                <div>
                    <h3 class="text-red-800 font-bold text-sm">Login Gagal!</h3>
                    <p class="text-red-700 text-xs mt-1">{{ session('error') }}</p>
                </div>
                <button type="button" class="absolute top-2 right-2 text-red-500 hover:text-red-700" onclick="this.parentElement.parentElement.style.display='none'">
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

        <form action="{{ route('admin.login.process') }}" method="POST">
            @csrf

            <div class="input-box rounded-2xl px-5 py-3 mb-5 shadow-sm">
                <label class="block text-[11px] font-bold text-gray-400 tracking-wide uppercase mb-1">Email Admin</label>
                <input type="email" name="email" value="{{ old('email') }}" required autofocus
                    class="w-full bg-transparent border-none outline-none text-white text-sm font-medium focus:ring-0 p-0"
                    placeholder="admin@nusaindotech.com">
            </div>

            <div class="input-box rounded-2xl px-5 py-3 mb-6 shadow-sm relative">
                <label class="block text-[11px] font-bold text-gray-400 tracking-wide uppercase mb-1">Password</label>
                <input type="password" name="password" required id="password"
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

            <button type="submit" class="w-full btn-yellow hover:bg-yellow-500 font-extrabold py-4 rounded-full transition duration-300 text-sm shadow-lg">
                Login Admin
            </button>
        </form>

        <div class="mt-8 text-center text-sm text-gray-300 font-medium">
            Bukan admin? <a href="{{ route('login') }}" class="font-bold text-[#f7bd55] hover:underline">Login sebagai klien</a>
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
