@extends('layouts.app')

@section('content')

{{-- =========================================================
     HEADER HALAMAN PENGATURAN
     Menampilkan judul dan deskripsi halaman
     ========================================================= --}}
<div class="mb-6">
    <h1 class="text-3xl font-bold text-gray-900">
        Pengaturan
    </h1>

    <p class="mt-1 text-lg text-gray-500">
        Atur preferensi platform sesuai kebutuhan anda
    </p>
</div>


{{-- =========================================================
     PENGATURAN NOTIFIKASI
     Menampilkan pilihan notifikasi yang dapat diaktifkan
     ========================================================= --}}
<div class="space-y-4">

    {{-- Update Konsultasi --}}
    <div class="bg-white rounded-xl p-5 flex items-center justify-between">
        <div>
            <h2 class="text-xl font-semibold text-gray-900">
                Update Konsultasi
            </h2>

            <p class="text-gray-500">
                Notifikasi terkait status dan balasan konsultasi
            </p>
        </div>

        {{-- Toggle ON/OFF --}}
        <button
            type="button"
            onclick="toggleSetting(this)"
            data-enabled="true"
            aria-label="Aktifkan atau nonaktifkan notifikasi"
            aria-pressed="true"
            class="w-20 h-8 bg-[#1f3b5f] rounded-full relative transition-colors duration-300"
        >
            <span class="absolute right-1 top-1 w-6 h-6 bg-white rounded-full transition-all duration-300"></span>
        </button>
    </div>


    {{-- Perubahan Jadwal Konsultasi --}}
    <div class="bg-white rounded-xl p-5 flex items-center justify-between">
        <div>
            <h2 class="text-xl font-semibold text-gray-900">
                Perubahan Jadwal Konsultasi
            </h2>

            <p class="text-gray-500">
                Pengingat dan perubahan jadwal konsultasi
            </p>
        </div>

        {{-- Toggle ON/OFF --}}
        <button
            type="button"
            onclick="toggleSetting(this)"
            data-enabled="true"
            aria-label="Aktifkan atau nonaktifkan notifikasi"
            aria-pressed="true"
            class="w-20 h-8 bg-[#1f3b5f] rounded-full relative transition-colors duration-300"
        >
            <span class="absolute right-1 top-1 w-6 h-6 bg-white rounded-full transition-all duration-300"></span>
        </button>
    </div>


    {{-- Updated Proyek --}}
    <div class="bg-white rounded-xl p-5 flex items-center justify-between">
        <div>
            <h2 class="text-xl font-semibold text-gray-900">
                Updated Proyek
            </h2>

            <p class="text-gray-500">
                Informasi perkembangan proyek anda
            </p>
        </div>

        {{-- Toggle ON/OFF --}}
        <button
            type="button"
            onclick="toggleSetting(this)"
            data-enabled="true"
            aria-label="Aktifkan atau nonaktifkan notifikasi"
            aria-pressed="true"
            class="w-20 h-8 bg-[#1f3b5f] rounded-full relative transition-colors duration-300"
        >
            <span class="absolute right-1 top-1 w-6 h-6 bg-white rounded-full transition-all duration-300"></span>
        </button>
    </div>

    {{-- Artikel Ensiklopedia Baru --}}
    <div class="bg-white rounded-xl p-5 flex items-center justify-between">
        <div>
            <h2 class="text-xl font-semibold text-gray-900">
                Artikel Ensiklopedia Baru
            </h2>

            <p class="text-gray-500">
                Notifikasi konten terbaru di ensiklopedia IT
            </p>
        </div>

        {{-- Toggle ON/OFF --}}
        <button
            type="button"
            onclick="toggleSetting(this)"
            data-enabled="true"
            aria-label="Aktifkan atau nonaktifkan notifikasi"
            aria-pressed="true"
            class="w-20 h-8 bg-[#1f3b5f] rounded-full relative transition-colors duration-300"
        >
            <span class="absolute right-1 top-1 w-6 h-6 bg-white rounded-full transition-all duration-300"></span>
        </button>
    </div>

</div>


{{-- =========================================================
     MENU BANTUAN
     Menampilkan menu bantuan platform
     ========================================================= --}}
<div class="mt-4 space-y-4">

    {{-- =========================================================
        MENU FAQ
        Mengarahkan pengguna ke halaman FAQ
        ========================================================= --}}
    <a
        href="{{ route('pengaturan.faq') }}"
        class="bg-white rounded-xl p-5 flex items-center hover:bg-gray-50 transition-colors"
    >
        <div class="w-10 h-10 rounded-full bg-blue-600 text-white flex items-center justify-center">
            <i class="fas fa-question"></i>
        </div>

        <div class="ml-4">
            <h2 class="text-xl font-semibold text-gray-900">
                FAQ
            </h2>

            <p class="text-gray-500">
                Temukan jawaban untuk pertanyaan yang sering diajukan
            </p>
        </div>

        <i class="fas fa-arrow-right ml-auto text-2xl text-gray-900"></i>
    </a>


    {{-- =========================================================
        MENU PANDUAN
        Mengarahkan pengguna ke halaman Panduan Penggunaan Platform
        ========================================================= --}}
    <a
        href="{{ route('pengaturan.panduan') }}"
        class="bg-white rounded-xl p-5 flex items-center hover:bg-gray-50 transition-colors"
    >
        <div class="w-10 h-10 rounded-full bg-blue-600 text-white flex items-center justify-center">
            <i class="fas fa-book"></i>
        </div>

        <div class="ml-4">
            <h2 class="text-xl font-semibold text-gray-900">
                Panduan Penggunaan Platform
            </h2>

            <p class="text-gray-500">
                Pelajari menggunakan platform secara maksimal
            </p>
        </div>

        <i class="fas fa-arrow-right ml-auto text-2xl text-gray-900"></i>
    </a>


    {{-- =========================================================
        MENU CALL CENTER
        Mengarahkan pengguna ke halaman Hubungi Call Center
        ========================================================= --}}
    <a
        href="{{ route('pengaturan.call-center') }}"
        class="bg-white rounded-xl p-5 flex items-center hover:bg-gray-50 transition-colors"
    >
        <div class="w-10 h-10 rounded-full bg-blue-600 text-white flex items-center justify-center">
            <i class="fas fa-phone"></i>
        </div>

        <div class="ml-4">
            <h2 class="text-xl font-semibold text-gray-900">
                Hubungi Call Center
            </h2>

            <p class="text-gray-500">
                Butuh bantuan lebih lanjut? Tim kami siap membantu
            </p>
        </div>

        <i class="fas fa-arrow-right ml-auto text-2xl text-gray-900"></i>
    </a>

</div>

        {{-- =========================================================
            JAVASCRIPT TOGGLE PENGATURAN
            Mengubah status ON dan OFF pada tombol
            ========================================================= --}}
    <script>
        function toggleSetting(button) {
            const knob = button.querySelector('span');
            const isEnabled = button.dataset.enabled === 'true';

            if (isEnabled) {
                // Mengubah tombol menjadi OFF
                button.dataset.enabled = 'false';
                button.setAttribute('aria-pressed', 'false');

                button.classList.remove('bg-[#1f3b5f]');
                button.classList.add('bg-gray-300');

                knob.classList.remove('right-1');
                knob.classList.add('left-1');
            } else {
                // Mengubah tombol menjadi ON
                button.dataset.enabled = 'true';
                button.setAttribute('aria-pressed', 'true');

                button.classList.remove('bg-gray-300');
                button.classList.add('bg-[#1f3b5f]');

                knob.classList.remove('left-1');
                knob.classList.add('right-1');
            }
        }
    </script>

@endsection