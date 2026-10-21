@extends('layouts.app')

@section('content')

{{-- =========================================================
     HALAMAN BOOKING KONSULTASI
     Menampilkan formulir pendaftaran konsultasi client
     ========================================================= --}}

<div class="min-h-screen bg-[#f1f5f9] px-10 py-8">

    {{-- HEADER HALAMAN --}}
    <div class="mb-5">
        <h1 class="text-4xl font-bold text-black">
            Pendaftaran Konsultasi
        </h1>

        <p class="text-gray-500 text-lg mt-1">
            Isi formulir berikut untuk mendaftar konsultasi
        </p>
    </div>

    {{-- FORM PENDAFTARAN --}}
    <form action="{{ route('konsultasi.store') }}" method="POST">
        @csrf

        {{-- Menampilkan pesan validasi --}}
        @if ($errors->any())
            <div class="mb-4 rounded-xl border border-red-300 bg-red-50 p-4 text-red-700">
                <p class="font-semibold mb-2">
                    Periksa kembali formulir:
                </p>

                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

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
                        required
                        class="w-full h-14 px-4 rounded-xl bg-[#f1f4f8] text-gray-700 placeholder-gray-500 shadow-[0_5px_5px_rgba(0,0,0,0.18)] border-0 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    >

                    @error('nama_perusahaan')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
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
                        required
                        class="w-full h-14 px-4 rounded-xl bg-[#f1f4f8] text-gray-700 placeholder-gray-500 shadow-[0_5px_5px_rgba(0,0,0,0.18)] border-0 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    >

                    @error('nama_pic')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Jabatan PIC --}}
                <div class="mb-3">
                    <label
                        for="jabatan_pic"
                        class="block text-base font-semibold text-black mb-1.5"
                    >
                        Jabatan PIC
                    </label>

                    <input
                        type="text"
                        id="jabatan_pic"
                        name="jabatan_pic"
                        value="{{ old('jabatan_pic') }}"
                        placeholder="Contoh: Project Manager"
                        class="w-full h-14 px-4 rounded-xl bg-[#f1f4f8] text-gray-700 placeholder-gray-500 shadow-[0_5px_5px_rgba(0,0,0,0.18)] border-0 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    >

                    @error('jabatan_pic')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
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
                        placeholder="Email perusahaan"
                        required
                        class="w-full h-14 px-4 rounded-xl bg-[#f1f4f8] text-gray-700 placeholder-gray-500 shadow-[0_5px_5px_rgba(0,0,0,0.18)] border-0 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    >

                    @error('email_pic')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Nomor Telepon PIC --}}
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
                        required
                        class="w-full h-14 px-4 rounded-xl bg-[#f1f4f8] text-gray-700 placeholder-gray-500 shadow-[0_5px_5px_rgba(0,0,0,0.18)] border-0 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    >

                    @error('telepon_pic')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
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
                            required
                            class="w-full h-14 px-4 pr-12 rounded-xl bg-[#f1f4f8] text-gray-700 shadow-[0_5px_5px_rgba(0,0,0,0.18)] border-0 appearance-none focus:outline-none focus:ring-2 focus:ring-blue-500"
                        >
                            <option
                                value=""
                                disabled
                                {{ old('jenis_konsultasi') ? '' : 'selected' }}
                            >
                                Pilih Jenis Konsultasi
                            </option>

                            <option
                                value="IT Portfolio Management"
                                {{ old('jenis_konsultasi') == 'IT Portfolio Management' ? 'selected' : '' }}
                            >
                                IT Portfolio Management
                            </option>

                            <option
                                value="Enterprise Architecture"
                                {{ old('jenis_konsultasi') == 'Enterprise Architecture' ? 'selected' : '' }}
                            >
                                Enterprise Architecture
                            </option>

                            <option
                                value="IT Governance"
                                {{ old('jenis_konsultasi') == 'IT Governance' ? 'selected' : '' }}
                            >
                                IT Governance
                            </option>

                            <option
                                value="Multimedia"
                                {{ old('jenis_konsultasi') == 'Multimedia' ? 'selected' : '' }}
                            >
                                Multimedia
                            </option>

                            <option
                                value="Software Development"
                                {{ old('jenis_konsultasi') == 'Software Development' ? 'selected' : '' }}
                            >
                                Software Development
                            </option>

                            <option
                                value="Hardware Development"
                                {{ old('jenis_konsultasi') == 'Hardware Development' ? 'selected' : '' }}
                            >
                                Hardware Development
                            </option>

                            <option
                                value="Training IT"
                                {{ old('jenis_konsultasi') == 'Training IT' ? 'selected' : '' }}
                            >
                                Training IT
                            </option>
                        </select>

                        <i class="fas fa-chevron-down absolute right-4 top-1/2 -translate-y-1/2 text-gray-500 pointer-events-none"></i>
                    </div>

                    @error('jenis_konsultasi')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
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
                        placeholder="Jelaskan kebutuhan konsultasi Anda"
                        required
                        maxlength="5000"
                        class="w-full h-60 px-4 py-4 rounded-xl bg-[#f1f4f8] text-gray-700 placeholder-gray-500 shadow-[0_5px_5px_rgba(0,0,0,0.18)] border-0 resize-none focus:outline-none focus:ring-2 focus:ring-blue-500"
                    >{{ old('deskripsi_kebutuhan') }}</textarea>

                    @error('deskripsi_kebutuhan')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
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
                        min="{{ date('Y-m-d') }}"
                        required
                        class="w-full h-14 px-4 rounded-xl bg-[#f1f4f8] text-gray-700 shadow-[0_5px_5px_rgba(0,0,0,0.18)] border-0 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    >

                    @error('tanggal_konsultasi')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
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
                        required
                        class="w-full h-14 px-4 rounded-xl bg-[#f1f4f8] text-gray-700 shadow-[0_5px_5px_rgba(0,0,0,0.18)] border-0 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    >

                    @error('waktu_konsultasi')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- TOMBOL AKSI --}}
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