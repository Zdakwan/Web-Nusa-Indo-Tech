@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-[#f1f5f9] px-10 py-8">


    {{-- =====================================================
         HEADER HALAMAN
         Menampilkan judul, deskripsi, dan tombol baca semua
         ===================================================== --}}
    <div class="flex items-start justify-between mb-4">

        <div>

            <h1 class="text-4xl font-bold text-black">
                Notifikasi
            </h1>

            <p class="text-gray-500 text-xl mt-1">
                Informasi terbaru seputar akun dan konsultasi anda
            </p>

        </div>


        {{-- Tombol Tandai Semua Sudah Dibaca --}}
        <button
            type="button"
            class="mt-1 h-12 px-6 bg-[#d9e7fb] hover:bg-[#cbdcf4] text-[#19375c] text-lg rounded-xl shadow-[0_4px_6px_rgba(0,0,0,0.18)] flex items-center gap-2 transition"
        >
            <i class="far fa-check-circle"></i>
            Tandai semua sudah dibaca
        </button>

    </div>


    {{-- =====================================================
         DAFTAR NOTIFIKASI
         ===================================================== --}}
    <div class="bg-white border border-gray-300 rounded-xl overflow-hidden">


        @foreach ($notifikasi as $item)

            {{-- =================================================
                 ITEM NOTIFIKASI
                 ================================================= --}}
            <div class="min-h-[135px] px-6 py-6 border-b border-gray-400 last:border-b-0 flex items-center gap-6">


                {{-- =================================================
                     ICON NOTIFIKASI
                     Warna icon mengikuti jenis notifikasi
                     ================================================= --}}
                @php
                    $warnaIcon = match ($item['warna']) {
                        'green' => 'bg-[#00d639]',
                        'blue' => 'bg-[#2874d0]',
                        'yellow' => 'bg-[#ffc04d]',
                        default => 'bg-[#2874d0]',
                    };
                @endphp

                <div
                    class="w-14 h-14 rounded-full {{ $warnaIcon }} flex items-center justify-center flex-shrink-0"
                >
                    <i class="{{ $item['icon'] }} text-white text-xl"></i>
                </div>


                {{-- =================================================
                     ISI NOTIFIKASI
                     ================================================= --}}
                <div class="flex-1 min-w-0">

                    <h2 class="text-2xl font-bold text-black">
                        {{ $item['judul'] }}
                    </h2>

                    <p class="text-xl text-gray-500 mt-1">
                        {{ $item['pesan'] }}
                    </p>

                    <p class="text-lg text-gray-500 mt-1">
                        {{ $item['waktu'] }}
                    </p>

                </div>


                {{-- =================================================
                     BADGE NOTIFIKASI BARU
                     Hanya muncul untuk notifikasi yang belum dibaca
                     ================================================= --}}
                @if ($item['baru'])

                    <span
                        class="px-3 py-1 bg-[#2874d0] text-white text-sm font-semibold rounded-full flex-shrink-0"
                    >
                        Baru
                    </span>

                @endif

            </div>

        @endforeach


        {{-- =====================================================
             TOMBOL LIHAT SEMUA NOTIFIKASI
             ===================================================== --}}
        <div class="px-4 py-2">

            <button
                type="button"
                class="h-9 px-3 bg-[#f1f4f8] hover:bg-gray-200 text-[#19375c] font-semibold border border-gray-300 rounded-lg flex items-center gap-3 transition"
            >
                Lihat semua notif
                <i class="fas fa-long-arrow-alt-right"></i>
            </button>

        </div>

    </div>

</div>

@endsection