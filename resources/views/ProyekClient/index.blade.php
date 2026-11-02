@extends('layouts.app')

@section('title', 'Proyek Saya')

@section('content')
<div class="max-w-6xl mx-auto space-y-6">

    {{-- HEADER --}}
    <div>
        <h1 class="text-2xl font-bold text-gray-800">Proyek Saya</h1>
        <p class="text-sm text-gray-500 mt-1">
            Pantau perkembangan proyek yang sedang dikerjakan untuk Anda.
        </p>
    </div>

    {{-- PESAN SUKSES --}}
    @if(session('success'))
        <div class="p-4 bg-green-50 border border-green-200 text-green-700 rounded-lg">
            <i class="fas fa-check-circle mr-2"></i>
            {{ session('success') }}
        </div>
    @endif

    {{-- DAFTAR PROYEK --}}
    @forelse($proyek as $item)

        <div class="bg-white rounded-xl border border-gray-200 shadow-sm p-6">

            {{-- INFORMASI UTAMA --}}
            <div class="flex flex-col sm:flex-row sm:items-start sm:justify-between gap-4">

                <div>
                    <h2 class="text-lg font-bold text-gray-800">
                        {{ $item->nama_proyek }}
                    </h2>

                    <p class="text-sm text-gray-500 mt-1">
                        {{ $item->konsultasi->jenis_konsultasi ?? 'Proyek' }}
                    </p>
                </div>

                {{-- STATUS PROYEK --}}
                <span class="inline-block w-fit px-3 py-1 rounded-full text-xs font-semibold
                    {{ $item->status === 'selesai'
                        ? 'bg-green-100 text-green-700'
                        : 'bg-blue-100 text-blue-700' }}">
                    {{ $item->status === 'selesai' ? 'Selesai' : 'Sedang Berjalan' }}
                </span>

            </div>

            {{-- DESKRIPSI --}}
            <div class="mt-4">
                <p class="text-sm text-gray-600 leading-relaxed">
                    {{ $item->deskripsi
                        ? \Illuminate\Support\Str::limit($item->deskripsi, 180)
                        : 'Belum ada deskripsi proyek.' }}
                </p>
            </div>

            {{-- PROGRES PROYEK --}}
            <div class="mt-5">

                <div class="flex justify-between items-center mb-2">
                    <span class="text-sm font-medium text-gray-600">
                        Progres Proyek
                    </span>

                    <span class="text-sm font-bold text-[#1e3352]">
                        {{ $item->progres }}%
                    </span>
                </div>

                <div class="w-full bg-gray-200 rounded-full h-3">
                    <div
                        class="bg-[#1e3352] h-3 rounded-full transition-all duration-500"
                        style="width: {{ $item->progres }}%">
                    </div>
                </div>

                <div class="flex justify-between text-xs text-gray-400 mt-2">
                    <span>Mulai</span>
                    <span>Selesai</span>
                </div>

            </div>

            {{-- FOOTER --}}
            <div class="mt-5 pt-4 border-t border-gray-100 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">

                <p class="text-xs text-gray-400">
                    <i class="far fa-clock mr-1"></i>
                    Terakhir diperbarui:
                    {{ $item->updated_at
                        ? $item->updated_at->timezone('Asia/Jakarta')->locale('id')->translatedFormat('d M Y, H:i') . ' WIB'
                        : '-' }}
                </p>

                <a
                    href="{{ route('proyek.show', $item->id) }}"
                    class="inline-flex items-center justify-center gap-2 px-4 py-2 bg-[#1e3352] text-white rounded-lg hover:bg-[#172943] transition text-sm font-semibold"
                >
                    Lihat Detail
                    <i class="fas fa-arrow-right"></i>
                </a>

            </div>

        </div>

    @empty

        {{-- KONDISI BELUM ADA PROYEK --}}
        <div class="bg-white rounded-xl border border-gray-200 p-10 text-center">

            <div class="w-16 h-16 mx-auto rounded-full bg-blue-50 text-[#1e3352] flex items-center justify-center">
                <i class="fas fa-folder-open text-2xl"></i>
            </div>

            <h2 class="text-lg font-bold text-gray-800 mt-4">
                Belum Ada Proyek
            </h2>

            <p class="text-sm text-gray-500 mt-2 max-w-md mx-auto">
                Proyek Anda akan ditampilkan di halaman ini setelah konsultasi
                disetujui dan Admin membuat proyek berdasarkan konsultasi tersebut.
            </p>

            <a
                href="{{ route('konsultasi.index') }}"
                class="inline-flex items-center gap-2 mt-5 px-4 py-2 bg-[#1e3352] text-white rounded-lg hover:bg-[#172943] transition text-sm font-semibold"
            >
                <i class="fas fa-comments"></i>
                Lihat Konsultasi Saya
            </a>

        </div>

    @endforelse

    {{-- PAGINATION --}}
    @if($proyek->hasPages())
        <div class="pt-2">
            {{ $proyek->links() }}
        </div>
    @endif

</div>
@endsection