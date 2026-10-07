@extends('layouts.app')

@section('content')

{{-- =========================================================
     HEADER HALAMAN CALL CENTER
     Menampilkan tombol kembali dan judul halaman
     ========================================================= --}}
<div class="mb-6">

    {{-- Tombol Kembali --}}
    <a
        href="{{ route('pengaturan.index') }}"
        class="inline-flex items-center text-gray-500 hover:text-gray-700 transition-colors"
    >
        <i class="fas fa-sign-in-alt mr-2 rotate-180"></i>
        Kembali
    </a>

    <h1 class="text-3xl font-bold text-gray-900 mt-4">
        Hubungi Call Center
    </h1>

</div>


{{-- =========================================================
     FORM HUBUNGI CALL CENTER
     Menampilkan formulir laporan atau pesan
     ========================================================= --}}
<form action="#" method="POST" enctype="multipart/form-data">

    @csrf

    {{-- =====================================================
         NAMA LENGKAP
         ===================================================== --}}
    <div class="mb-5">

        <label class="block text-lg font-semibold text-gray-900 mb-2">
            Nama lengkap<span class="text-red-500">*</span>
        </label>

        <input
            type="text"
            name="nama"
            placeholder="Nama Lengkap Anda"
            class="w-full bg-[#f1f4f9] rounded-xl px-4 py-4 text-gray-700 placeholder-gray-500 shadow-md focus:outline-none focus:ring-2 focus:ring-blue-400"
        >

    </div>


    {{-- =====================================================
         EMAIL PERUSAHAAN
         ===================================================== --}}
    <div class="mb-5">

        <label class="block text-lg font-semibold text-gray-900 mb-2">
            Email Perusahaan<span class="text-red-500">*</span>
        </label>

        <input
            type="email"
            name="email"
            placeholder="Email Perusahaan"
            class="w-full bg-[#f1f4f9] rounded-xl px-4 py-4 text-gray-700 placeholder-gray-500 shadow-md focus:outline-none focus:ring-2 focus:ring-blue-400"
        >

    </div>


    {{-- =====================================================
         SUBJEK PESAN
         ===================================================== --}}
    <div class="mb-5">

        <label class="block text-lg font-semibold text-gray-900 mb-2">
            Subjek Pesan<span class="text-red-500">*</span>
        </label>

        <input
            type="text"
            name="subjek"
            placeholder="Subjek"
            class="w-full bg-[#f1f4f9] rounded-xl px-4 py-4 text-gray-700 placeholder-gray-500 shadow-md focus:outline-none focus:ring-2 focus:ring-blue-400"
        >

    </div>


    {{-- =====================================================
         PESAN
         ===================================================== --}}
    <div class="mb-5">

        <label class="block text-lg font-semibold text-gray-900 mb-2">
            Pesan<span class="text-red-500">*</span>
        </label>

        <textarea
            name="pesan"
            rows="6"
            placeholder="Pesan Anda"
            class="w-full bg-[#f1f4f9] rounded-xl px-4 py-4 text-gray-700 placeholder-gray-500 shadow-md resize-none focus:outline-none focus:ring-2 focus:ring-blue-400"
        ></textarea>

    </div>


    {{-- =====================================================
         FILE / GAMBAR
         Menampilkan input upload file
         ===================================================== --}}
    <div class="mb-8">

        <label class="block text-lg font-semibold text-gray-900 mb-2">
            File/Gambar
        </label>

        <label
            class="w-full bg-[#f1f4f9] rounded-xl px-4 py-4 shadow-md flex items-center justify-between cursor-pointer hover:bg-gray-100 transition-colors"
        >

            <span
                id="namaFile"
                class="text-gray-500"
            >
                Upload
            </span>

            <i class="fas fa-upload text-gray-900 text-lg"></i>

            <input
                type="file"
                name="file"
                class="hidden"
                onchange="tampilkanNamaFile(this)"
            >

        </label>

    </div>


    {{-- =====================================================
         TOMBOL KIRIM LAPORAN
         ===================================================== --}}
    <div class="flex justify-end">

        <button
            type="submit"
            class="bg-[#2874d0] hover:bg-[#1f65bd] text-white font-semibold px-8 py-4 rounded-xl flex items-center gap-3 transition-colors"
        >
            <i class="fas fa-paper-plane"></i>
            Kirim Laporan
        </button>

    </div>

</form>


{{-- =========================================================
     JAVASCRIPT UPLOAD FILE
     Menampilkan nama file setelah dipilih
     ========================================================= --}}
<script>
    function tampilkanNamaFile(input) {

        const namaFile = document.getElementById('namaFile');

        if (input.files.length > 0) {
            namaFile.textContent = input.files[0].name;
        } else {
            namaFile.textContent = 'Upload';
        }
    }
</script>

@endsection