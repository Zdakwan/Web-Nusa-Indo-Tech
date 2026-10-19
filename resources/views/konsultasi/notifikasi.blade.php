@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-[#f1f5f9] px-4 md:px-10 py-8">

    {{-- HEADER HALAMAN --}}
    <div class="flex flex-col md:flex-row md:items-start md:justify-between gap-4 mb-4">
        <div>
            <h1 class="text-4xl font-bold text-black">
                Notifikasi
            </h1>

            <p class="text-gray-500 text-xl mt-1">
                Informasi terbaru seputar akun dan konsultasi Anda
            </p>
        </div>

        {{-- TANDAI SEMUA SUDAH DIBACA --}}
        <form
            action="{{ route('notifikasi.baca-semua') }}"
            method="POST"
        >
            @csrf

            <button
                type="submit"
                @disabled($notifikasi->isEmpty() || $notifikasi->every(fn ($item) => !$item['baru']))
                class="mt-1 h-12 px-6 bg-[#d9e7fb] hover:bg-[#cbdcf4] disabled:opacity-50 disabled:cursor-not-allowed text-[#19375c] text-base md:text-lg rounded-xl shadow flex items-center gap-2 transition"
            >
                <i class="far fa-check-circle"></i>
                Tandai semua sudah dibaca
            </button>
        </form>
    </div>

    {{-- PESAN SUKSES --}}
    @if (session('success'))
        <div class="mb-4 rounded-lg border border-green-200 bg-green-50 px-5 py-3 text-green-800">
            <i class="fas fa-check-circle mr-2"></i>
            {{ session('success') }}
        </div>
    @endif

    {{-- DAFTAR NOTIFIKASI --}}
    <div class="bg-white border border-gray-300 rounded-xl overflow-hidden">

        @if ($notifikasi->isEmpty())

            {{-- KONDISI KOSONG --}}
            <div class="px-6 py-16 text-center">
                <div class="mx-auto mb-4 w-16 h-16 rounded-full bg-[#d9e7fb] flex items-center justify-center">
                    <i class="far fa-bell-slash text-[#2874d0] text-3xl"></i>
                </div>

                <h2 class="text-xl font-bold text-[#19375c]">
                    Belum Ada Notifikasi
                </h2>

                <p class="mt-2 text-gray-500 text-base">
                    Informasi terbaru seputar akun dan konsultasi Anda akan muncul di sini.
                </p>
            </div>

        @else

            @foreach ($notifikasi as $item)

                @php
                    $warnaIcon = match ($item['warna']) {
                        'green' => 'bg-[#00d639]',
                        'blue' => 'bg-[#2874d0]',
                        'yellow' => 'bg-[#ffc04d]',
                        default => 'bg-[#2874d0]',
                    };
                @endphp

                {{-- KARTU NOTIFIKASI YANG BISA DIKLIK --}}
                <a
                    href="{{ route('notifikasi.detail', $item['id']) }}"
                    class="min-h-[135px] px-4 md:px-6 py-6 border-b border-gray-300 last:border-b-0 flex items-center gap-4 md:gap-6 transition
                    {{ $item['baru'] ? 'bg-blue-50/50 hover:bg-blue-50' : 'bg-white hover:bg-gray-50' }}"
                >
                    {{-- IKON --}}
                    <div class="w-12 h-12 md:w-14 md:h-14 rounded-full {{ $warnaIcon }} flex items-center justify-center flex-shrink-0">
                        <i class="{{ $item['icon'] }} text-white text-xl"></i>
                    </div>

                    {{-- ISI NOTIFIKASI --}}
                    <div class="flex-1 min-w-0">
                        <h2 class="text-lg md:text-2xl font-bold text-black">
                            {{ $item['judul'] }}
                        </h2>

                        <p class="text-base md:text-xl text-gray-500 mt-1">
                            {{ $item['pesan'] }}
                        </p>

                        <p class="text-sm md:text-lg text-gray-500 mt-1">
                            {{ $item['waktu'] }}
                        </p>
                    </div>

                    {{-- STATUS BACA --}}
                    <div class="flex-shrink-0">
                        @if ($item['baru'])
                            <span class="px-3 py-1 bg-[#2874d0] text-white text-xs md:text-sm font-semibold rounded-full">
                                Baru
                            </span>
                        @else
                            <span class="px-3 py-1 bg-gray-100 text-gray-500 text-xs md:text-sm font-semibold rounded-full">
                                Sudah dibaca
                            </span>
                        @endif
                    </div>
                </a>

            @endforeach

        @endif

    </div>
</div>

@endsection