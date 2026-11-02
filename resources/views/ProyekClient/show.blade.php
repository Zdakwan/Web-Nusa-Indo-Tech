@extends('layouts.app')

@section('title', 'Detail Proyek')

@section('content')
<div class="max-w-6xl mx-auto space-y-6">

    {{-- HEADER --}}
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">

        <div>
            <h1 class="text-2xl font-bold text-gray-800">
                Detail Proyek
            </h1>

            <p class="text-sm text-gray-500 mt-1">
                Informasi dan perkembangan proyek Anda.
            </p>
        </div>

        <a
            href="{{ route('proyek.index') }}"
            class="inline-flex items-center gap-2 px-4 py-2 bg-white border border-gray-200 text-gray-700 rounded-lg hover:bg-gray-100 transition"
        >
            <i class="fas fa-arrow-left"></i>
            Kembali ke Proyek Saya
        </a>

    </div>

    {{-- INFORMASI PROYEK --}}
    <div class="bg-white rounded-xl border border-gray-200 shadow-sm p-6">

        <div class="flex flex-col sm:flex-row sm:items-start sm:justify-between gap-4 mb-6">

            <div>
                <h2 class="text-xl font-bold text-gray-800">
                    {{ $proyek->nama_proyek }}
                </h2>

                <p class="text-sm text-gray-500 mt-1">
                    Proyek Nusa Indo Tech
                </p>
            </div>

            <span class="inline-block w-fit px-3 py-1 rounded-full text-xs font-semibold
                {{ $proyek->status === 'selesai'
                    ? 'bg-green-100 text-green-700'
                    : 'bg-blue-100 text-blue-700' }}">
                {{ $proyek->status === 'selesai' ? 'Selesai' : 'Sedang Berjalan' }}
            </span>

        </div>

        {{-- DETAIL INFORMASI --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

            <div>
                <p class="text-sm text-gray-500 mb-1">Nama Client</p>
                <p class="font-semibold text-gray-800">
                    {{ $proyek->client->name ?? '-' }}
                </p>
            </div>

            <div>
                <p class="text-sm text-gray-500 mb-1">Admin Penanggung Jawab</p>
                <p class="font-semibold text-gray-800">
                    {{ $proyek->admin->name ?? '-' }}
                </p>
            </div>

            <div>
                <p class="text-sm text-gray-500 mb-1">Tanggal Proyek Dibuat</p>
                <p class="font-semibold text-gray-800">
                    {{ $proyek->created_at
                        ? $proyek->created_at->timezone('Asia/Jakarta')->locale('id')->translatedFormat('d F Y')
                        : '-' }}
                </p>
            </div>

            <div>
                <p class="text-sm text-gray-500 mb-1">Terakhir Diperbarui</p>
                <p class="font-semibold text-gray-800">
                    {{ $proyek->updated_at
                        ? $proyek->updated_at->timezone('Asia/Jakarta')->locale('id')->translatedFormat('d F Y, H:i') . ' WIB'
                        : '-' }}
                </p>
            </div>

            <div class="md:col-span-2">
                <p class="text-sm text-gray-500 mb-1">Deskripsi Proyek</p>

                <div class="p-4 bg-gray-50 rounded-lg text-sm text-gray-700 whitespace-pre-line">
                    {{ $proyek->deskripsi ?: 'Tidak ada deskripsi proyek.' }}
                </div>
            </div>

        </div>

        {{-- PROGRES PROYEK --}}
        <div class="mt-7 pt-6 border-t border-gray-100">

            <div class="flex justify-between items-center mb-3">
                <h3 class="font-semibold text-gray-700">
                    Perkembangan Proyek
                </h3>

                <span class="text-xl font-bold text-[#1e3352]">
                    {{ $proyek->progres }}%
                </span>
            </div>

            <div class="w-full bg-gray-200 rounded-full h-4">
                <div
                    class="bg-[#1e3352] h-4 rounded-full transition-all duration-500"
                    style="width: {{ $proyek->progres }}%">
                </div>
            </div>

            <div class="flex justify-between text-xs text-gray-400 mt-2">
                <span>0%</span>
                <span>25%</span>
                <span>50%</span>
                <span>75%</span>
                <span>100%</span>
            </div>

        </div>

    </div>

    {{-- INFORMASI KONSULTASI ASAL --}}
    @if($proyek->konsultasi)

        <div class="bg-white rounded-xl border border-gray-200 shadow-sm p-6">

            <div class="flex items-center gap-3 mb-5">

                <div class="w-10 h-10 rounded-lg bg-amber-50 text-amber-600 flex items-center justify-center">
                    <i class="fas fa-comments"></i>
                </div>

                <div>
                    <h2 class="text-lg font-bold text-gray-800">
                        Informasi Konsultasi Asal
                    </h2>

                    <p class="text-sm text-gray-500">
                        Informasi konsultasi yang menjadi dasar pembuatan proyek.
                    </p>
                </div>

            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                <div>
                    <p class="text-sm text-gray-500 mb-1">Nama Perusahaan</p>
                    <p class="font-semibold text-gray-800">
                        {{ $proyek->konsultasi->nama_perusahaan ?: '-' }}
                    </p>
                </div>

                <div>
                    <p class="text-sm text-gray-500 mb-1">Jenis Konsultasi</p>
                    <p class="font-semibold text-gray-800">
                        {{ $proyek->konsultasi->jenis_konsultasi ?: '-' }}
                    </p>
                </div>

                <div>
                    <p class="text-sm text-gray-500 mb-1">Nama PIC</p>
                    <p class="font-semibold text-gray-800">
                        {{ $proyek->konsultasi->nama_pic ?: '-' }}
                    </p>
                </div>

                <div>
                    <p class="text-sm text-gray-500 mb-1">Jabatan PIC</p>
                    <p class="font-semibold text-gray-800">
                        {{ $proyek->konsultasi->jabatan_pic ?: '-' }}
                    </p>
                </div>

                <div>
                    <p class="text-sm text-gray-500 mb-1">Email PIC</p>
                    <p class="font-semibold text-gray-800">
                        {{ $proyek->konsultasi->email_pic ?: '-' }}
                    </p>
                </div>

                <div>
                    <p class="text-sm text-gray-500 mb-1">Telepon PIC</p>
                    <p class="font-semibold text-gray-800">
                        {{ $proyek->konsultasi->telepon_pic ?: '-' }}
                    </p>
                </div>

                <div>
                    <p class="text-sm text-gray-500 mb-1">Tanggal Konsultasi</p>
                    <p class="font-semibold text-gray-800">
                        {{ $proyek->konsultasi->tanggal_konsultasi
                            ? \Carbon\Carbon::parse($proyek->konsultasi->tanggal_konsultasi)->locale('id')->translatedFormat('d F Y')
                            : '-' }}
                    </p>
                </div>

                <div>
                    <p class="text-sm text-gray-500 mb-1">Waktu Konsultasi</p>
                    <p class="font-semibold text-gray-800">
                        {{ $proyek->konsultasi->waktu_konsultasi
                            ? substr($proyek->konsultasi->waktu_konsultasi, 0, 5) . ' WIB'
                            : '-' }}
                    </p>
                </div>

                <div class="md:col-span-2">
                    <p class="text-sm text-gray-500 mb-1">Catatan Kebutuhan Client</p>

                    <div class="p-4 bg-gray-50 rounded-lg text-sm text-gray-700 whitespace-pre-line">
                        {{ $proyek->konsultasi->catatan_klien ?: 'Tidak ada catatan dari client.' }}
                    </div>
                </div>

                @if($proyek->konsultasi->pesan_admin)
                    <div class="md:col-span-2">
                        <p class="text-sm text-gray-500 mb-1">Pesan Admin</p>

                        <div class="p-4 bg-gray-50 rounded-lg text-sm text-gray-700 whitespace-pre-line">
                            {{ $proyek->konsultasi->pesan_admin }}
                        </div>
                    </div>
                @endif

            </div>

        </div>

    @endif

    {{-- RIWAYAT PERKEMBANGAN PROYEK --}}
    <div class="bg-white rounded-xl border border-gray-200 shadow-sm p-6">

        <div class="flex items-center gap-3 mb-6">

            <div class="w-10 h-10 rounded-lg bg-blue-50 text-[#1e3352] flex items-center justify-center">
                <i class="fas fa-history"></i>
            </div>

            <div>
                <h2 class="text-lg font-bold text-gray-800">
                    Riwayat Perkembangan Proyek
                </h2>

                <p class="text-sm text-gray-500">
                    Catatan pembaruan progres dari Admin.
                </p>
            </div>

        </div>

        @forelse($proyek->riwayat as $riwayat)

            <div class="relative pl-8 pb-6 last:pb-0">

                {{-- TITIK TIMELINE --}}
                <div class="absolute left-0 top-1 w-4 h-4 rounded-full bg-[#1e3352] border-4 border-blue-100"></div>

                {{-- GARIS TIMELINE --}}
                @if(!$loop->last)
                    <div class="absolute left-[7px] top-5 bottom-0 w-0.5 bg-gray-200"></div>
                @endif

                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2">

                    <p class="font-bold text-gray-800">
                        Progres mencapai {{ $riwayat->progres }}%
                    </p>

                    <p class="text-xs text-gray-400">
                        {{ $riwayat->created_at
                            ? $riwayat->created_at->timezone('Asia/Jakarta')->locale('id')->translatedFormat('d M Y, H:i') . ' WIB'
                            : '-' }}
                    </p>

                </div>

                <p class="text-sm text-gray-500 mt-1">
                    Diperbarui oleh {{ $riwayat->admin->name ?? 'Admin' }}
                </p>

                <div class="mt-3 p-4 bg-gray-50 rounded-lg text-sm text-gray-700 whitespace-pre-line">
                    {{ $riwayat->catatan ?: 'Tidak ada catatan perkembangan.' }}
                </div>

            </div>

        @empty

            <div class="text-center py-8">
                <i class="fas fa-history text-3xl text-gray-300"></i>

                <p class="text-sm text-gray-500 mt-3">
                    Belum ada riwayat perkembangan proyek.
                </p>
            </div>

        @endforelse

    </div>

</div>
@endsection