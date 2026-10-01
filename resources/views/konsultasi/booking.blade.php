@extends('layouts.app')

@section('content')

{{-- =========================================================
     HALAMAN BOOKING KONSULTASI
     Menampilkan formulir pendaftaran konsultasi client
     ========================================================= --}}

<div class="min-h-screen bg-[#f1f5f9] px-10 py-8">

    {{-- =====================================================
         HEADER HALAMAN
         ===================================================== --}}
    <div class="mb-5">
        <h1 class="text-4xl font-bold text-black">
            Pendaftaran Konsultasi
        </h1>

        <p class="text-gray-500 text-lg mt-1">
            Isi formulir berikut untuk mendaftar konsultasi
        </p>
    </div>


    {{-- =====================================================
         FORM PENDAFTARAN
         Saat ini masih frontend, belum diproses ke database
         ===================================================== --}}
    <form action="#" method="POST">
        @csrf

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">

            {{-- =================================================
                 DATA PERUSAHAAN
                 ================================================= --}}
            <div class="bg-white border border-gray-300 rounded-xl px-10 py-7">

                <h2 class="text-3xl font-semibold text-black mb-5">
                    Data Perusahaan
                </h2>

                {{-- Nama Perusahaan --}}
                <div class="mb-3">
                    <label
                        for="nama_perusahaan"
                        class="block text-base font-semibold text-black mb-1.5"
                    >
                        Nama Perusahaan<span class="text-red-500">*</span>
                    </label>

                    <input
                        type="text"
                        id="nama_perusahaan"
                        name="nama_perusahaan"
                        value="{{ old('nama_perusahaan') }}"
                        placeholder="Nama Perusahaan"
                        class="w-full h-14 px-4 rounded-xl bg-[#f1f4f8] text-gray-700 placeholder-gray-500 shadow-[0_5px_5px_rgba(0,0,0,0.18)] border-0 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    >
                </div>

                {{-- Nama PIC --}}
                <div class="mb-3">
                    <label
                        for="nama_pic"
                        class="block text-base font-semibold text-black mb-1.5"
                    >
                        Nama PIC<span class="text-red-500">*</span>
                    </label>

                    <input
                        type="text"
                        id="nama_pic"
                        name="nama_pic"
                        value="{{ old('nama_pic') }}"
                        placeholder="Nama PIC"
                        class="w-full h-14 px-4 rounded-xl bg-[#f1f4f8] text-gray-700 placeholder-gray-500 shadow-[0_5px_5px_rgba(0,0,0,0.18)] border-0 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    >
                </div>

                {{-- Email PIC --}}
                <div class="mb-3">
                    <label
                        for="email_pic"
                        class="block text-base font-semibold text-black mb-1.5"
                    >
                        Email PIC<span class="text-red-500">*</span>
                    </label>

                    <input
                        type="email"
                        id="email_pic"
                        name="email_pic"
                        value="{{ old('email_pic') }}"
                        placeholder="Email@.com"
                        class="w-full h-14 px-4 rounded-xl bg-[#f1f4f8] text-gray-700 placeholder-gray-500 shadow-[0_5px_5px_rgba(0,0,0,0.18)] border-0 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    >
                </div>

                {{-- No Telepon PIC --}}
                <div>
                    <label
                        for="telepon_pic"
                        class="block text-base font-semibold text-black mb-1.5"
                    >
                        No. Telepon PIC<span class="text-red-500">*</span>
                    </label>

                    <input
                        type="tel"
                        id="telepon_pic"
                        name="telepon_pic"
                        value="{{ old('telepon_pic') }}"
                        placeholder="+62"
                        class="w-full h-14 px-4 rounded-xl bg-[#f1f4f8] text-gray-700 placeholder-gray-500 shadow-[0_5px_5px_rgba(0,0,0,0.18)] border-0 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    >
                </div>

            </div>


            {{-- =================================================
                 DATA KONSULTASI
                 ================================================= --}}
            <div class="bg-white border border-gray-300 rounded-xl px-10 py-7">

                <h2 class="text-3xl font-semibold text-black mb-5">
                    Data Konsultasi
                </h2>

                {{-- Jenis Konsultasi --}}
                <div class="mb-3">
                    <label
                        for="jenis_konsultasi"
                        class="block text-base font-semibold text-black mb-1.5"
                    >
                        Jenis Konsultasi<span class="text-red-500">*</span>
                    </label>

                    <div class="relative">

                        <select
                            id="jenis_konsultasi"
                            name="jenis_konsultasi"
                            class="w-full h-14 px-4 pr-12 rounded-xl bg-[#f1f4f8] text-gray-500 shadow-[0_5px_5px_rgba(0,0,0,0.18)] border-0 appearance-none focus:outline-none focus:ring-2 focus:ring-blue-500"
                        >
                            <option value="" selected disabled>
                                Pilih Jenis Konsultasi
                            </option>

                            <option value="IT Training">
                                IT Training
                            </option>

                            <option value="IT Consulting">
                                IT Consulting
                            </option>

                            <option value="Software Development">
                                Software Development
                            </option>
                        </select>

                        <i class="fas fa-chevron-down absolute right-4 top-1/2 -translate-y-1/2 text-gray-500 pointer-events-none"></i>

                    </div>
                </div>


                {{-- Deskripsi Kebutuhan --}}
                <div class="mb-3">
                    <label
                        for="deskripsi_kebutuhan"
                        class="block text-base font-semibold text-black mb-1.5"
                    >
                        Deskripsi Kebutuhan<span class="text-red-500">*</span>
                    </label>

                    <textarea
                        id="deskripsi_kebutuhan"
                        name="deskripsi_kebutuhan"
                        placeholder="Deskripsi Kebutuhan"
                        class="w-full h-60 px-4 py-4 rounded-xl bg-[#f1f4f8] text-gray-700 placeholder-gray-500 shadow-[0_5px_5px_rgba(0,0,0,0.18)] border-0 resize-none focus:outline-none focus:ring-2 focus:ring-blue-500"
                    >{{ old('deskripsi_kebutuhan') }}</textarea>
                </div>


                {{-- Tanggal Konsultasi --}}
                <div class="mb-3">
                    <label
                        for="tanggal_konsultasi"
                        class="block text-base font-semibold text-black mb-1.5"
                    >
                        Tanggal Yang Diinginkan<span class="text-red-500">*</span>
                    </label>

                    <input
                        type="date"
                        id="tanggal_konsultasi"
                        name="tanggal_konsultasi"
                        value="{{ old('tanggal_konsultasi') }}"
                        class="w-full h-14 px-4 rounded-xl bg-[#f1f4f8] text-gray-700 shadow-[0_5px_5px_rgba(0,0,0,0.18)] border-0 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    >
                </div>


                {{-- Waktu Konsultasi --}}
                <div>
                    <label
                        for="waktu_konsultasi"
                        class="block text-base font-semibold text-black mb-1.5"
                    >
                        Waktu Yang Diinginkan<span class="text-red-500">*</span>
                    </label>

                    <input
                        type="time"
                        id="waktu_konsultasi"
                        name="waktu_konsultasi"
                        value="{{ old('waktu_konsultasi') }}"
                        class="w-full h-14 px-4 rounded-xl bg-[#f1f4f8] text-gray-700 shadow-[0_5px_5px_rgba(0,0,0,0.18)] border-0 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    >
                </div>


                {{-- =================================================
                     TOMBOL AKSI
                     ================================================= --}}
                <div class="flex justify-end items-center gap-3 mt-10">

                    <button
                        type="submit"
                        class="h-12 px-5 bg-[#2874d0] hover:bg-[#2167bd] text-white font-semibold rounded-xl flex items-center gap-3 transition"
                    >
                        <i class="fas fa-paper-plane text-lg"></i>
                        Kirim Pendaftaran
                    </button>

                    <a
                        href="{{ route('dashboard') }}"
                        class="h-12 px-5 bg-[#f1f4f8] hover:bg-gray-200 text-[#1f3b5f] font-semibold border border-gray-300 rounded-xl flex items-center justify-center transition"
                    >
                        Batal
                    </a>

                </div>

            </div>

        </div>

    </form>

</div>

@endsection