@extends('layouts.admin')

@section('title', 'Detail Proyek')

@section('content')
<div class="max-w-6xl mx-auto space-y-6">

    {{-- HEADER DENGAN TOMBOL PDF --}}
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Detail Proyek</h1>
            <p class="text-sm text-gray-500 mt-1">
                Informasi lengkap dan riwayat perkembangan proyek client.
            </p>
        </div>

        <div class="flex flex-wrap items-center gap-2">
            <a href="{{ route('admin.proyek.index') }}"
               class="inline-flex items-center gap-2 px-4 py-2.5 rounded-lg border border-gray-300 text-gray-600 text-sm font-semibold hover:bg-gray-50 transition">
                <i class="fas fa-arrow-left"></i>
                Kembali
            </a>

            <!-- TOMBOL CETAK PDF  -->
            <a href="{{ route('admin.proyek.single.pdf', $proyek->id) }}" target="_blank"
               class="inline-flex items-center gap-2 px-4 py-2.5 bg-red-500 hover:bg-red-600 text-white text-sm font-semibold rounded-lg shadow-sm transition">
                <i class="fas fa-file-pdf"></i> Cetak Laporan PDF
            </a>

            <a href="{{ route('admin.proyek.edit', $proyek->id) }}"
               class="inline-flex items-center gap-2 px-4 py-2.5 rounded-lg bg-[#1e3352] text-white text-sm font-semibold hover:bg-[#2a4165] transition shadow-sm">
                <i class="fas fa-edit"></i>
                Edit Proyek
            </a>
        </div>
    </div>

    {{-- NOTIFIKASI SUKSES --}}
    @if(session('success'))
        <div class="p-4 rounded-lg bg-green-50 border border-green-200 text-green-700 text-sm">
            <i class="fas fa-check-circle mr-2"></i>
            {{ session('success') }}
        </div>
    @endif

    {{-- INFORMASI UTAMA --}}
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
        <div class="flex flex-col md:flex-row md:items-start md:justify-between gap-4">
            <div>
                <p class="text-xs font-semibold uppercase tracking-wider text-gray-400">Nama Proyek</p>
                <h2 class="text-xl font-bold text-gray-800 mt-2">{{ $proyek->nama_proyek }}</h2>
                <p class="text-sm text-gray-500 mt-2">
                    <i class="fas fa-user-circle mr-1"></i> Client:
                    <span class="font-semibold text-gray-700">{{ $proyek->client->name ?? 'Client tidak ditemukan' }}</span>
                </p>
            </div>
            @if($proyek->status === 'selesai')
                <span class="px-4 py-2 rounded-full bg-green-100 text-green-700 text-xs font-semibold">
                    <i class="fas fa-check-circle mr-1"></i> Proyek Selesai
                </span>
            @else
                <span class="px-4 py-2 rounded-full bg-blue-100 text-blue-700 text-xs font-semibold">
                    <i class="fas fa-spinner mr-1"></i> Proyek Berjalan
                </span>
            @endif
        </div>

        <div class="mt-6 pt-5 border-t border-gray-100">
            <p class="text-xs font-semibold uppercase tracking-wider text-gray-400 mb-2">Deskripsi Proyek</p>
            <p class="text-sm text-gray-600 leading-relaxed whitespace-pre-line">{{ $proyek->deskripsi ?: 'Belum ada deskripsi proyek.' }}</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mt-6 pt-5 border-t border-gray-100">
            <div>
                <p class="text-xs text-gray-400 mb-1">Admin Penanggung Jawab</p>
                <p class="text-sm font-semibold text-gray-700">{{ $proyek->admin->name ?? 'Tidak tersedia' }}</p>
            </div>
            <div>
                <p class="text-xs text-gray-400 mb-1">Tanggal Dibuat</p>
                <p class="text-sm font-semibold text-gray-700">{{ $proyek->created_at->format('d M Y, H:i') }}</p>
            </div>
        </div>
    </div>

    {{-- INFORMASI KONSULTASI ASAL --}}
    @if($proyek->konsultasi)
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <div class="flex items-center gap-3 mb-5">
                <div class="w-10 h-10 rounded-lg bg-blue-50 text-blue-600 flex items-center justify-center">
                    <i class="fas fa-comments"></i>
                </div>
                <div>
                    <h2 class="text-lg font-bold text-gray-800">Informasi Konsultasi Asal</h2>
                    <p class="text-sm text-gray-500">Konsultasi yang menjadi dasar pembuatan proyek ini.</p>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div><p class="text-xs text-gray-400 mb-1">Nama Perusahaan</p><p class="text-sm font-semibold text-gray-700">{{ $proyek->konsultasi->nama_perusahaan ?: '-' }}</p></div>
                <div><p class="text-xs text-gray-400 mb-1">Nama PIC</p><p class="text-sm font-semibold text-gray-700">{{ $proyek->konsultasi->nama_pic ?: '-' }}</p></div>
                <div><p class="text-xs text-gray-400 mb-1">Jabatan PIC</p><p class="text-sm font-semibold text-gray-700">{{ $proyek->konsultasi->jabatan_pic ?: '-' }}</p></div>
                <div><p class="text-xs text-gray-400 mb-1">Email PIC</p><p class="text-sm font-semibold text-gray-700">{{ $proyek->konsultasi->email_pic ?: '-' }}</p></div>
                <div><p class="text-xs text-gray-400 mb-1">Telepon PIC</p><p class="text-sm font-semibold text-gray-700">{{ $proyek->konsultasi->telepon_pic ?: '-' }}</p></div>
                <div><p class="text-xs text-gray-400 mb-1">Jenis Konsultasi</p><p class="text-sm font-semibold text-gray-700">{{ $proyek->konsultasi->jenis_konsultasi ?: '-' }}</p></div>
                <div><p class="text-xs text-gray-400 mb-1">Tanggal Konsultasi</p><p class="text-sm font-semibold text-gray-700">{{ $proyek->konsultasi->tanggal_konsultasi ? \Carbon\Carbon::parse($proyek->konsultasi->tanggal_konsultasi)->format('d M Y') : 'Belum ditentukan' }}</p></div>
                <div><p class="text-xs text-gray-400 mb-1">Waktu Konsultasi</p><p class="text-sm font-semibold text-gray-700">{{ $proyek->konsultasi->waktu_konsultasi ? substr((string) $proyek->konsultasi->waktu_konsultasi, 0, 5) . ' WIB' : 'Belum ditentukan' }}</p></div>
                <div class="md:col-span-2">
                    <p class="text-xs text-gray-400 mb-1">Catatan dari Client</p>
                    <div class="p-4 bg-gray-50 rounded-lg text-sm text-gray-600 whitespace-pre-line">{{ $proyek->konsultasi->catatan_klien ?: 'Tidak ada catatan dari client.' }}</div>
                </div>
                @if($proyek->konsultasi->pesan_admin)
                    <div class="md:col-span-2">
                        <p class="text-xs text-gray-400 mb-1">Pesan Admin</p>
                        <div class="p-4 bg-blue-50 rounded-lg text-sm text-blue-800 whitespace-pre-line">{{ $proyek->konsultasi->pesan_admin }}</div>
                    </div>
                @endif
            </div>
        </div>
    @else
        <div class="bg-yellow-50 border border-yellow-200 rounded-xl p-4">
            <p class="text-sm text-yellow-800"><i class="fas fa-info-circle mr-2"></i>Proyek ini belum terhubung dengan data konsultasi.</p>
        </div>
    @endif

    {{-- PROGRES PROYEK --}}
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
        <div class="flex items-center justify-between mb-5">
            <div>
                <h2 class="text-lg font-bold text-gray-800">Perkembangan Proyek</h2>
                <p class="text-sm text-gray-500 mt-1">Persentase progres terakhir.</p>
            </div>
            <span class="text-3xl font-bold text-[#1e3352]">{{ $proyek->progres }}%</span>
        </div>
        <div class="w-full bg-gray-200 rounded-full h-4 overflow-hidden">
            <div class="bg-[#f7bd55] h-4 rounded-full transition-all" style="width: {{ $proyek->progres }}%"></div>
        </div>
        <div class="flex justify-between text-xs text-gray-400 mt-2">
            <span>0% - Belum dimulai</span>
            <span>100% - Selesai</span>
        </div>
    </div>

    {{-- RIWAYAT PROGRES --}}
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
        <div class="mb-6">
            <h2 class="text-lg font-bold text-gray-800">Riwayat Perkembangan Proyek</h2>
            <p class="text-sm text-gray-500 mt-1">Catatan seluruh pembaruan progres proyek.</p>
        </div>
        @forelse($proyek->riwayat as $riwayat)
            <div class="relative pl-8 pb-7 last:pb-0 border-l-2 border-gray-200 last:border-transparent">
                <div class="absolute -left-[9px] top-0 w-4 h-4 rounded-full bg-[#f7bd55] border-2 border-white"></div>
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2">
                    <span class="text-lg font-bold text-[#1e3352]">{{ $riwayat->progres }}%</span>
                    <span class="text-xs text-gray-400">{{ $riwayat->created_at->format('d M Y, H:i') }}</span>
                </div>
                <p class="text-sm text-gray-600 mt-2 leading-relaxed whitespace-pre-line">{{ $riwayat->catatan ?: 'Tidak ada catatan.' }}</p>
                <p class="text-xs text-gray-400 mt-2"><i class="fas fa-user-circle mr-1"></i>{{ $riwayat->admin->name ?? 'Admin tidak tersedia' }}</p>
            </div>
        @empty
            <div class="text-center py-10">
                <i class="fas fa-history text-3xl text-gray-300"></i>
                <p class="text-sm text-gray-500 mt-3">Belum ada riwayat perkembangan proyek.</p>
            </div>
        @endforelse
    </div>
</div>
@endsection
