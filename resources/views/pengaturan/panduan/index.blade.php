@extends('layouts.app')

@section('content')

{{-- =========================================================
     HEADER HALAMAN PANDUAN
     Menampilkan tombol kembali dan judul halaman
     ========================================================= --}}
<div class="mb-5">

    {{-- Tombol Kembali --}}
    <a
        href="{{ route('pengaturan.index') }}"
        class="inline-flex items-center text-gray-500 hover:text-gray-700 transition-colors"
    >
        <i class="fas fa-sign-in-alt mr-2 rotate-180"></i>
        Kembali
    </a>

    <h1 class="text-3xl font-bold text-gray-900 mt-4">
        Panduan Penggunaan Platform
    </h1>

</div>


{{-- =========================================================
     PENCARIAN PANDUAN
     Menampilkan kolom pencarian panduan
     ========================================================= --}}
<div class="mb-6">

    <div class="relative">
        <i class="fas fa-search absolute left-4 top-1/2 -translate-y-1/2 text-gray-400"></i>

        <input
            type="text"
            placeholder="Penelusuran"
            class="w-full border border-gray-300 rounded-lg pl-11 pr-4 py-3 bg-transparent focus:outline-none focus:ring-1 focus:ring-gray-400"
        >
    </div>

</div>


{{-- =========================================================
     PANDUAN AKUN & PROFIL
     Menampilkan panduan akun dan profil
     ========================================================= --}}
<div class="mb-4">

    {{-- Header kategori --}}
    <button
        type="button"
        onclick="togglePanduan(this)"
        class="panduan-header w-full flex items-center justify-between px-4 py-5 bg-[#eef2f6] border border-gray-300 rounded-xl shadow-sm text-left transition-colors duration-300"
    >

        <div class="flex items-center">

            <i class="far fa-user text-[#2874d0] text-4xl w-12"></i>

            <div>
                <h2 class="text-xl font-semibold text-gray-900">
                    Akun & Profil
                </h2>

                <p class="text-gray-600 mt-1">
                    Panduan terkait pendaftaran akun dan pengelolaan profil
                </p>
            </div>

        </div>

        <i class="fas fa-chevron-right text-[#2874d0] text-sm transition-transform duration-300"></i>

    </button>


    {{-- Isi kategori --}}
    <div class="panduan-content hidden px-4 py-3 bg-[#eef2f6] border border-gray-300 border-t-0 rounded-b-xl">

        <p class="text-gray-600 mb-5">
            Bagian ini membantu Anda mengelola akun dan informasi pribadi pada
            platform Nusa Indo Technology. Pastikan data yang digunakan sudah
            benar agar proses verifikasi dan komunikasi dapat berjalan dengan lancar.
        </p>

        {{-- Cara membuat akun --}}
        <div class="flex items-center justify-between py-2">
            <div class="flex items-center">
                <span class="w-4 h-4 bg-[#2874d0] rounded-full mr-6"></span>

                <span class="text-gray-900">
                    Cara membuat akun
                </span>
            </div>

            <i class="fas fa-chevron-right text-[#b8c7da]"></i>
        </div>

        {{-- Cara melengkapi profil --}}
        <div class="flex items-center justify-between py-2">
            <div class="flex items-center">
                <span class="w-4 h-4 bg-[#2874d0] rounded-full mr-6"></span>

                <span class="text-gray-900">
                    Cara melengkapi profil
                </span>
            </div>

            <i class="fas fa-chevron-right text-[#b8c7da]"></i>
        </div>

        {{-- Cara mengubah password --}}
        <div class="flex items-center justify-between py-2">
            <div class="flex items-center">
                <span class="w-4 h-4 bg-[#2874d0] rounded-full mr-6"></span>

                <span class="text-gray-900">
                    Cara mengubah password
                </span>
            </div>

            <i class="fas fa-chevron-right text-[#b8c7da]"></i>
        </div>

    </div>

</div>


{{-- =========================================================
     PANDUAN KONSULTASI
     Menampilkan kategori panduan konsultasi
     ========================================================= --}}
<div class="mb-4">

    <button
        type="button"
        onclick="togglePanduan(this)"
        class="panduan-header w-full flex items-center justify-between px-4 py-5 bg-[#eef2f6] border border-gray-300 rounded-xl shadow-sm text-left transition-colors duration-300"
    >

        <div class="flex items-center">

            <i class="far fa-comment-alt text-[#2874d0] text-4xl w-12"></i>

            <div>
                <h2 class="text-xl font-semibold text-gray-900">
                    Konsultasi
                </h2>

                <p class="text-gray-600 mt-1">
                    Panduan terkait pengajuan dan pemantauan konsultasi
                </p>
            </div>

        </div>

        <i class="fas fa-chevron-right text-[#2874d0] text-sm transition-transform duration-300"></i>

    </button>


    <div class="panduan-content hidden px-4 py-4 bg-[#eef2f6] border border-gray-300 border-t-0 rounded-b-xl">

        <p class="text-gray-600">
            Panduan mengenai proses pengajuan dan pemantauan konsultasi
            melalui platform Nusa Indo Technology.
        </p>

    </div>

</div>


{{-- =========================================================
     PANDUAN JADWAL KONSULTASI
     Menampilkan kategori panduan jadwal konsultasi
     ========================================================= --}}
<div class="mb-4">

    <button
        type="button"
        onclick="togglePanduan(this)"
        class="panduan-header w-full flex items-center justify-between px-4 py-5 bg-[#eef2f6] border border-gray-300 rounded-xl shadow-sm text-left transition-colors duration-300"
    >

        <div class="flex items-center">

            <i class="far fa-calendar-alt text-[#2874d0] text-4xl w-12"></i>

            <div>
                <h2 class="text-xl font-semibold text-gray-900">
                    Jadwal Konsultasi
                </h2>

                <p class="text-gray-600 mt-1">
                    Panduan terkait melihat jadwal dan pelaksanaan konsultasi
                </p>
            </div>

        </div>

        <i class="fas fa-chevron-right text-[#2874d0] text-sm transition-transform duration-300"></i>

    </button>


    <div class="panduan-content hidden px-4 py-4 bg-[#eef2f6] border border-gray-300 border-t-0 rounded-b-xl">

        <p class="text-gray-600">
            Panduan mengenai jadwal konsultasi yang telah disetujui dan
            pelaksanaan konsultasi.
        </p>

    </div>

</div>


{{-- =========================================================
     PANDUAN NOTIFIKASI
     Menampilkan kategori panduan notifikasi
     ========================================================= --}}
<div class="mb-4">

    <button
        type="button"
        onclick="togglePanduan(this)"
        class="panduan-header w-full flex items-center justify-between px-4 py-5 bg-[#eef2f6] border border-gray-300 rounded-xl shadow-sm text-left transition-colors duration-300"
    >

        <div class="flex items-center">

            <i class="far fa-bell text-[#2874d0] text-4xl w-12"></i>

            <div>
                <h2 class="text-xl font-semibold text-gray-900">
                    Notifikasi
                </h2>

                <p class="text-gray-600 mt-1">
                    Panduan terkait notifikasi yang diterima di platform
                </p>
            </div>

        </div>

        <i class="fas fa-chevron-right text-[#2874d0] text-sm transition-transform duration-300"></i>

    </button>


    <div class="panduan-content hidden px-4 py-4 bg-[#eef2f6] border border-gray-300 border-t-0 rounded-b-xl">

        <p class="text-gray-600">
            Panduan mengenai informasi dan pemberitahuan yang diterima
            melalui platform Nusa Indo Technology.
        </p>

    </div>

</div>


{{-- =========================================================
     JAVASCRIPT PANDUAN
     Membuka dan menutup kategori panduan
     ========================================================= --}}
<script>
    function togglePanduan(button) {

        const content = button.nextElementSibling;
        const icon = button.querySelector('.fa-chevron-right, .fa-chevron-down');

        const isHidden = content.classList.contains('hidden');

        if (isHidden) {

            // Membuka isi panduan
            content.classList.remove('hidden');

            icon.classList.remove('fa-chevron-right');
            icon.classList.add('fa-chevron-down');

        } else {

            // Menutup isi panduan
            content.classList.add('hidden');

            icon.classList.remove('fa-chevron-down');
            icon.classList.add('fa-chevron-right');

        }
    }
</script>

@endsection