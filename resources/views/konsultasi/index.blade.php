@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-[#f1f5f9] px-10 py-8">

    {{-- =====================================================
         HEADER HALAMAN
         ===================================================== --}}
    <div class="mb-8">

        <h1 class="text-4xl font-bold text-black">
            Konsultasi Saya
        </h1>

        <p class="text-gray-500 text-lg mt-1">
            Kelola semua konsultasi yang pernah anda ajukan ke tim Nusa Indo Technology
        </p>

    </div>


    {{-- =====================================================
         CARD DAFTAR KONSULTASI
         ===================================================== --}}
    <div class="bg-white border border-gray-300 rounded-xl px-6 py-6">

        {{-- Judul Card --}}
        <h2 class="text-3xl font-semibold text-black mb-4">
            Daftar Konsultasi
        </h2>


        {{-- =================================================
             TABEL KONSULTASI
             ================================================= --}}
        <div class="overflow-x-auto">

            <table class="w-full border-collapse">

                {{-- =================================================
                     HEADER TABEL
                     ================================================= --}}
                <thead>

                    <tr class="bg-[#fff4f4]">

                        <th
                            class="text-left px-6 py-3 text-base font-semibold text-black rounded-l-lg whitespace-nowrap"
                        >
                            Judul Konsultasi
                        </th>

                        <th
                            class="text-left px-6 py-3 text-base font-semibold text-black whitespace-nowrap"
                        >
                            Kategori
                        </th>

                        <th
                            class="text-left px-6 py-3 text-base font-semibold text-black whitespace-nowrap"
                        >
                            Tanggal Pengajuan
                        </th>

                        <th
                            class="text-left px-6 py-3 text-base font-semibold text-black whitespace-nowrap"
                        >
                            Jadwal
                        </th>

                        <th
                            class="text-left px-6 py-3 text-base font-semibold text-black whitespace-nowrap"
                        >
                            Status
                        </th>

                        <th
                            class="text-left px-6 py-3 text-base font-semibold text-black rounded-r-lg whitespace-nowrap"
                        >
                            Aksi
                        </th>

                    </tr>

                </thead>


                {{-- =================================================
                     DATA TABEL
                     ================================================= --}}
                <tbody>

                    @forelse ($konsultasis as $konsultasi)

                        <tr class="border-b border-gray-300 last:border-b-0">

                            {{-- Judul Konsultasi --}}
                            <td class="px-6 py-3 text-[15px] text-black whitespace-nowrap">
                                {{ $konsultasi['judul'] }}
                            </td>


                            {{-- Kategori --}}
                            <td class="px-6 py-3 whitespace-nowrap">

                                <span
                                    class="inline-flex items-center px-3 py-1.5 rounded-full bg-[#e8f0fc] text-[#2874d0] text-sm font-medium"
                                >
                                    {{ $konsultasi['kategori'] }}
                                </span>

                            </td>


                            {{-- Tanggal Pengajuan --}}
                            <td class="px-6 py-3 text-[15px] text-black whitespace-nowrap">
                                {{ $konsultasi['tanggal_pengajuan'] }}
                            </td>


                            {{-- Jadwal --}}
                            <td class="px-6 py-3 text-[15px] text-black whitespace-nowrap">
                                {{ $konsultasi['jadwal'] }}
                            </td>


                            {{-- Status --}}
                            <td class="px-6 py-3 whitespace-nowrap">

                                <span
                                    class="inline-flex items-center px-3 py-1.5 rounded-full bg-[#fff7e8] text-[#e89b00] text-sm font-medium"
                                >
                                    {{ $konsultasi['status'] }}
                                </span>

                            </td>


                            {{-- =================================================
                                 AKSI
                                 ================================================= --}}
                            <td class="px-6 py-3 whitespace-nowrap">

                                <div class="flex items-center gap-5">

                                    {{-- Tombol Detail --}}
                                    <a
                                        href="{{ route('konsultasi.detail', $loop->iteration) }}"
                                        title="Lihat Detail"
                                        class="text-[#2874d0] hover:text-[#185cae] transition"
                                    >
                                        <i class="fas fa-eye text-lg"></i>
                                    </a>


                                    {{-- Tombol Jadwal --}}
                                    <a
                                        href="{{ route('konsultasi.jadwal', $loop->iteration) }}"
                                        title="Lihat Jadwal"
                                        class="text-[#27a844] hover:text-[#1e8b38] transition"
                                    >
                                        <i class="far fa-calendar-alt text-lg"></i>
                                    </a>

                                </div>

                            </td>

                        </tr>

                    @empty

                        {{-- =================================================
                             KONDISI KOSONG
                             ================================================= --}}
                        <tr>

                            <td
                                colspan="6"
                                class="px-6 py-12 text-center text-gray-500"
                            >
                                Belum ada konsultasi yang diajukan.

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection