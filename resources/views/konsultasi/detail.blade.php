@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-[#f1f5f9] px-10 py-8">

    {{-- =====================================================
         TOMBOL KEMBALI
         ===================================================== --}}
    <div class="mb-2">

        <a
            href="{{ route('konsultasi.index') }}"
            class="inline-flex items-center gap-1 text-gray-500 hover:text-gray-700 transition text-lg"
        >
            <i class="fas fa-sign-in-alt rotate-180"></i>
            Kembali
        </a>

    </div>


    {{-- =====================================================
         HEADER HALAMAN
         ===================================================== --}}
    <div class="mb-4">

        <h1 class="text-4xl font-bold text-black">
            Detail Pendaftaran Konsultasi
        </h1>

        <p class="text-gray-500 text-lg mt-1">
            Informasi lengkap mengenai pengajuan konsultasi Anda.
        </p>

    </div>


    {{-- =====================================================
         GRID UTAMA
         ===================================================== --}}
    <div class="grid grid-cols-1 xl:grid-cols-[2fr_1fr] gap-3">


        {{-- =================================================
             KOLOM KIRI
             ================================================= --}}
        <div class="space-y-3">


            {{-- =================================================
                 HEADER KONSULTASI
                 ================================================= --}}
            <div class="bg-white border border-gray-300 rounded-xl px-4 py-3">

                <div class="flex items-center justify-between gap-4">

                    <div class="flex items-center gap-4">

                        {{-- Icon Konsultasi --}}
                        <div class="w-16 h-16 rounded-full bg-[#2874d0] flex items-center justify-center flex-shrink-0">

                            <i class="fas fa-chalkboard-teacher text-white text-3xl"></i>

                        </div>


                        {{-- Judul --}}
                        <div>

                            <h2 class="text-3xl font-bold text-black">
                                {{ $konsultasi['judul'] }}
                            </h2>

                            <p class="text-gray-400 text-base mt-0.5">
                                Kode Pengajuan :
                                {{ $konsultasi['kode_pengajuan'] }}
                            </p>

                        </div>

                    </div>


                    {{-- Status --}}
                    <span
                        class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-[#dff8d8] text-[#39a83b] text-sm font-semibold whitespace-nowrap"
                    >
                        <i class="fas fa-check-circle"></i>
                        {{ $konsultasi['status'] }}
                    </span>

                </div>

            </div>


            {{-- =================================================
                 STATUS PENDAFTARAN
                 ================================================= --}}
            <div class="bg-white border border-gray-300 rounded-xl px-4 py-4">

                <h2 class="text-lg font-semibold text-black mb-6">
                    Status Pendaftaran Terbaru
                </h2>


                {{-- Progress --}}
                <div class="relative px-5">

                    {{-- Garis Progress --}}
                    <div class="absolute left-[8%] right-[8%] top-3.5 h-0.5 bg-[#27c967]"></div>


                    <div class="relative grid grid-cols-4">


                        {{-- Pengajuan --}}
                        <div class="flex flex-col items-center text-center">

                            <div class="w-7 h-7 rounded-full bg-white border-[3px] border-[#5bdf70] flex items-center justify-center z-10">
                                <i class="fas fa-check text-[#42ca59] text-xs"></i>
                            </div>

                            <p class="text-xs font-semibold text-black mt-2">
                                Pengajuan
                            </p>

                            <span class="text-[9px] text-gray-500">
                                26 Sept 2026
                            </span>

                            <span class="text-[9px] text-gray-500">
                                10.44
                            </span>

                        </div>


                        {{-- Diverifikasi --}}
                        <div class="flex flex-col items-center text-center">

                            <div class="w-7 h-7 rounded-full bg-white border-[3px] border-[#5bdf70] flex items-center justify-center z-10">
                                <i class="fas fa-check text-[#42ca59] text-xs"></i>
                            </div>

                            <p class="text-xs font-semibold text-black mt-2">
                                Diverifikasi
                            </p>

                            <span class="text-[9px] text-gray-500">
                                27 Sept 2026
                            </span>

                            <span class="text-[9px] text-gray-500">
                                10.44
                            </span>

                        </div>


                        {{-- Dijadwalkan --}}
                        <div class="flex flex-col items-center text-center">

                            <div class="w-7 h-7 rounded-full bg-white border-[3px] border-[#19b5ff] flex items-center justify-center z-10">
                                <div class="w-2.5 h-2.5 rounded-full bg-[#19b5ff]"></div>
                            </div>

                            <p class="text-xs font-semibold text-black mt-2">
                                Dijadwalkan
                            </p>

                            <span class="text-[9px] text-gray-500">
                                30 Sept 2026
                            </span>

                            <span class="text-[9px] text-gray-500">
                                10.44
                            </span>

                        </div>


                        {{-- Selesai --}}
                        <div class="flex flex-col items-center text-center">

                            <div class="w-7 h-7 rounded-full bg-white border-[3px] border-gray-300 flex items-center justify-center z-10">
                            </div>

                            <p class="text-xs font-semibold text-black mt-2">
                                Selesai
                            </p>

                        </div>

                    </div>

                </div>


                {{-- Pesan Status --}}
                <div class="mt-6 bg-[#e3faf1] rounded-xl px-4 py-3 flex items-center gap-3">

                    <div class="w-7 h-7 rounded-full bg-white flex items-center justify-center flex-shrink-0">

                        <i class="fas fa-check-circle text-[#2daf39] text-lg"></i>

                    </div>

                    <div>

                        <p class="text-sm font-semibold text-black">
                            Pendaftaran Anda telah disetujui dan dijadwalkan oleh Admin.
                        </p>

                        <p class="text-xs text-gray-600 mt-0.5">
                            Silahkan lihat detail jadwal dibawah ini.
                        </p>

                    </div>

                </div>

            </div>


            {{-- =================================================
                 INFORMASI KONSULTASI
                 ================================================= --}}
            <div class="bg-white border border-gray-300 rounded-xl px-4 py-4">

                <h2 class="text-base font-semibold text-black flex items-center gap-3 mb-5">

                    <i class="far fa-calendar-alt text-[#19375c] text-lg"></i>

                    Informasi Konsultasi

                </h2>


                <div class="space-y-5 text-xs">


                    <div class="grid grid-cols-[145px_15px_1fr]">

                        <span>
                            Jenis Konsultasi
                        </span>

                        <span>:</span>

                        <span>
                            {{ $konsultasi['jenis_konsultasi'] }}
                        </span>

                    </div>


                    <div class="grid grid-cols-[145px_15px_1fr]">

                        <span>
                            Deskripsi Kebutuhan
                        </span>

                        <span>:</span>

                        <span>
                            {{ $konsultasi['deskripsi_kebutuhan'] }}
                        </span>

                    </div>


                    <div class="grid grid-cols-[145px_15px_1fr]">

                        <span>
                            Tanggal Pengajuan
                        </span>

                        <span>:</span>

                        <span>
                            {{ $konsultasi['tanggal_pengajuan'] }}
                        </span>

                    </div>


                    <div class="grid grid-cols-[145px_15px_1fr] items-center">

                        <span>
                            Status
                        </span>

                        <span>:</span>

                        <span>
                            <span class="inline-flex px-4 py-1 bg-[#4285eb] text-white rounded-md">
                                {{ $konsultasi['status_konsultasi'] }}
                            </span>
                        </span>

                    </div>

                </div>

            </div>


            {{-- =================================================
                 INFORMASI PERUSAHAAN
                 ================================================= --}}
            <div class="bg-white border border-gray-300 rounded-xl px-4 py-4">

                <h2 class="text-base font-semibold text-black flex items-center gap-3 mb-5">

                    <i class="far fa-calendar-alt text-[#19375c] text-lg"></i>

                    Informasi Perusahaan

                </h2>


                <div class="space-y-4 text-xs">


                    <div class="grid grid-cols-[145px_15px_1fr]">

                        <span>
                            Nama Perusahaan
                        </span>

                        <span>:</span>

                        <span>
                            {{ $konsultasi['nama_perusahaan'] }}
                        </span>

                    </div>


                    <div class="grid grid-cols-[145px_15px_1fr]">

                        <span>
                            Nama PIC
                        </span>

                        <span>:</span>

                        <span>
                            {{ $konsultasi['nama_pic'] }}
                        </span>

                    </div>


                    <div class="grid grid-cols-[145px_15px_1fr]">

                        <span>
                            Email PIC
                        </span>

                        <span>:</span>

                        <span>
                            {{ $konsultasi['email_pic'] }}
                        </span>

                    </div>


                    <div class="grid grid-cols-[145px_15px_1fr]">

                        <span>
                            No. Telp
                        </span>

                        <span>:</span>

                        <span>
                            {{ $konsultasi['no_telp'] }}
                        </span>

                    </div>


                    <div class="grid grid-cols-[145px_15px_1fr]">

                        <span>
                            Jabatan
                        </span>

                        <span>:</span>

                        <span>
                            {{ $konsultasi['jabatan'] }}
                        </span>

                    </div>

                </div>

            </div>

        </div>


        {{-- =================================================
             KOLOM KANAN
             ================================================= --}}
        <div class="space-y-3">


            {{-- =================================================
                 INFORMASI KONSULTASI / VIDEO
                 ================================================= --}}
            <div class="bg-white border border-gray-300 rounded-xl h-[255px] px-4 py-4 flex flex-col">

                <h2 class="text-sm font-semibold text-black flex items-center gap-3">

                    <i class="far fa-calendar-alt text-[#19375c] text-lg"></i>

                    Informasi Konsultasi

                </h2>


                <div class="flex-1 flex items-end justify-center">

                    <button
                        type="button"
                        class="w-24 h-5 bg-[#2874d0] hover:bg-[#2167bd] rounded-full text-white flex items-center justify-center transition"
                        title="Buka Video Konsultasi"
                    >
                        <i class="fas fa-video text-[10px]"></i>
                    </button>

                </div>

            </div>


            {{-- =================================================
                 CATATAN ADMIN
                 ================================================= --}}
            <div class="bg-white border border-gray-300 rounded-xl px-3 py-3">

                <h2 class="text-sm font-semibold text-black flex items-center gap-3 mb-3">

                    <i class="far fa-comment text-[#19375c] text-xl"></i>

                    Catatan Admin

                </h2>


                <div class="bg-[#dce9fc] rounded-xl px-4 py-4 text-gray-500 text-sm">

                    <p>
                        “{{ $konsultasi['catatan_admin'] }}”
                    </p>

                    <p class="mt-4">
                        • Admin, 12 Sept 2026
                    </p>

                </div>

            </div>


            {{-- =================================================
                 RIWAYAT AKTIVITAS
                 ================================================= --}}
            <div class="bg-white border border-gray-300 rounded-xl overflow-hidden">

                <div class="px-4 py-3 border-b border-gray-200">

                    <h2 class="text-sm font-semibold text-black flex items-center gap-3">

                        <i class="fas fa-history text-[#19375c] text-lg"></i>

                        Riwayat Aktivitas

                    </h2>

                </div>


                <div class="px-8 py-5">

                    <div class="relative">


                        {{-- Garis Timeline --}}
                        <div class="absolute left-[7px] top-2 bottom-2 w-0.5 bg-gray-300"></div>


                        <div class="space-y-5">

                            @foreach ($konsultasi['riwayat'] as $aktivitas)

                                <div class="relative flex items-start gap-4">

                                    {{-- Titik Timeline --}}
                                    <div
                                        class="relative z-10 w-4 h-4 rounded-full
                                        @if ($aktivitas['warna'] === 'green')
                                            bg-[#0ee978]
                                        @elseif ($aktivitas['warna'] === 'blue')
                                            bg-[#19aef5]
                                        @else
                                            bg-gray-300
                                        @endif
                                        flex-shrink-0"
                                    ></div>


                                    {{-- Isi Timeline --}}
                                    <div>

                                        <p class="text-xs font-semibold text-black">
                                            {{ $aktivitas['judul'] }}
                                        </p>

                                        <p class="text-[9px] text-gray-500 mt-0.5">
                                            {{ $aktivitas['tanggal'] }}
                                        </p>

                                    </div>

                                </div>

                            @endforeach

                        </div>

                    </div>

                </div>

            </div>


            {{-- =================================================
                 TOMBOL BATALKAN PENDAFTARAN
                 ================================================= --}}
            <div class="bg-white border border-gray-300 rounded-xl px-3 py-2 flex flex-col items-end">

                <button
                    type="button"
                    class="bg-[#4285eb] hover:bg-[#3475d7] text-white text-sm font-medium px-3 py-2 rounded-md flex items-center gap-2 transition"
                >
                    <i class="fas fa-times-circle"></i>
                    Batalkan Pendaftaran
                </button>

                <p class="text-[9px] text-gray-400 mt-1">
                    *Pembatalan hanya dapat dilakukan sebelum jadwal konsultasi.
                </p>

            </div>

        </div>

    </div>

</div>

@endsection