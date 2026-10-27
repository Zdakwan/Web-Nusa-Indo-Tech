@extends('layouts.app')

@section('content')

{{-- =========================================================
     HEADER HALAMAN CALL CENTER
     ========================================================= --}}
<div class="mb-6">

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

    <p class="text-gray-500 mt-2">
        Sampaikan pertanyaan atau laporan Anda kepada tim NusaIndoTech.
    </p>

</div>


{{-- =========================================================
     NOTIFIKASI SUKSES
     ========================================================= --}}
@if (session('success'))
    <div
        role="alert"
        class="mb-5 rounded-xl bg-green-100 border border-green-200 p-4 text-green-800"
    >
        <div class="flex items-start gap-3">
            <i class="fas fa-check-circle mt-1"></i>
            <p>{{ session('success') }}</p>
        </div>
    </div>
@endif


{{-- =========================================================
     NOTIFIKASI VALIDASI
     ========================================================= --}}
@if ($errors->any())
    <div
        role="alert"
        class="mb-5 rounded-xl bg-red-100 border border-red-200 p-4 text-red-800"
    >
        <div class="flex items-start gap-3">
            <i class="fas fa-exclamation-circle mt-1"></i>

            <div>
                <p class="font-semibold mb-2">
                    Laporan belum dapat dikirim:
                </p>

                <ul class="list-disc pl-5 space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endif


{{-- =========================================================
     FORM HUBUNGI CALL CENTER
     ========================================================= --}}
<form
    action="{{ route('call-center.store') }}"
    method="POST"
    enctype="multipart/form-data"
>
    @csrf

    {{-- NAMA LENGKAP --}}
    <div class="mb-5">

        <label
            for="nama"
            class="block text-lg font-semibold text-gray-900 mb-2"
        >
            Nama lengkap<span class="text-red-500">*</span>
        </label>

        <input
            type="text"
            id="nama"
            name="nama"
            value="{{ old('nama') }}"
            placeholder="Nama Lengkap Anda"
            maxlength="255"
            autocomplete="name"
            required
            class="w-full bg-[#f1f4f9] rounded-xl px-4 py-4 text-gray-700 placeholder-gray-500 shadow-md focus:outline-none focus:ring-2 focus:ring-blue-400 @error('nama') border border-red-500 @enderror"
        >

        @error('nama')
            <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
        @enderror

    </div>


    {{-- EMAIL PERUSAHAAN --}}
    <div class="mb-5">

        <label
            for="email"
            class="block text-lg font-semibold text-gray-900 mb-2"
        >
            Email Perusahaan<span class="text-red-500">*</span>
        </label>

        <input
            type="email"
            id="email"
            name="email"
            value="{{ old('email') }}"
            placeholder="Email Perusahaan"
            maxlength="255"
            autocomplete="email"
            required
            class="w-full bg-[#f1f4f9] rounded-xl px-4 py-4 text-gray-700 placeholder-gray-500 shadow-md focus:outline-none focus:ring-2 focus:ring-blue-400 @error('email') border border-red-500 @enderror"
        >

        @error('email')
            <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
        @enderror

    </div>


    {{-- SUBJEK PESAN --}}
    <div class="mb-5">

        <label
            for="subjek"
            class="block text-lg font-semibold text-gray-900 mb-2"
        >
            Subjek Pesan<span class="text-red-500">*</span>
        </label>

        <input
            type="text"
            id="subjek"
            name="subjek"
            value="{{ old('subjek') }}"
            placeholder="Subjek"
            maxlength="255"
            required
            class="w-full bg-[#f1f4f9] rounded-xl px-4 py-4 text-gray-700 placeholder-gray-500 shadow-md focus:outline-none focus:ring-2 focus:ring-blue-400 @error('subjek') border border-red-500 @enderror"
        >

        @error('subjek')
            <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
        @enderror

    </div>


    {{-- PESAN --}}
    <div class="mb-5">

        <label
            for="pesan"
            class="block text-lg font-semibold text-gray-900 mb-2"
        >
            Pesan<span class="text-red-500">*</span>
        </label>

        <textarea
            id="pesan"
            name="pesan"
            rows="6"
            maxlength="10000"
            placeholder="Pesan Anda"
            required
            class="w-full bg-[#f1f4f9] rounded-xl px-4 py-4 text-gray-700 placeholder-gray-500 shadow-md resize-none focus:outline-none focus:ring-2 focus:ring-blue-400 @error('pesan') border border-red-500 @enderror"
        >{{ old('pesan') }}</textarea>

        @error('pesan')
            <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
        @enderror

    </div>


    {{-- FILE / GAMBAR --}}
    <div class="mb-8">

        <label
            for="file"
            class="block text-lg font-semibold text-gray-900 mb-2"
        >
            File/Gambar
            <span class="text-sm font-normal text-gray-500">
                (opsional, maksimal 5 MB)
            </span>
        </label>

        <label
            for="file"
            class="w-full bg-[#f1f4f9] rounded-xl px-4 py-4 shadow-md flex items-center justify-between cursor-pointer hover:bg-gray-100 transition-colors"
        >

            <span
                id="namaFile"
                class="text-gray-500 break-all mr-3"
            >
                Upload
            </span>

            <i class="fas fa-upload text-gray-900 text-lg"></i>

        </label>

        <input
            type="file"
            id="file"
            name="file"
            accept=".jpg,.jpeg,.png,.pdf,.doc,.docx"
            class="hidden"
            onchange="tampilkanNamaFile(this)"
        >

        <p class="text-sm text-gray-500 mt-2">
            Format yang didukung: JPG, JPEG, PNG, PDF, DOC, dan DOCX.
        </p>

        @error('file')
            <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
        @enderror

    </div>


    {{-- TOMBOL KIRIM LAPORAN --}}
    <div class="flex justify-end">

        <button
            type="submit"
            class="bg-[#2874d0] hover:bg-[#1f65bd] text-white font-semibold px-8 py-4 rounded-xl flex items-center gap-3 transition-colors focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-offset-2"
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

        if (input.files && input.files.length > 0) {
            namaFile.textContent = input.files[0].name;
            namaFile.classList.remove('text-gray-500');
            namaFile.classList.add('text-gray-900');
        } else {
            namaFile.textContent = 'Upload';
            namaFile.classList.remove('text-gray-900');
            namaFile.classList.add('text-gray-500');
        }
    }
</script>

@endsection