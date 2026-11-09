@extends('layouts.admin')

@section('title', 'Edit Proyek')

@section('content')
<div class="max-w-5xl mx-auto space-y-6">

    {{-- HEADER --}}
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Edit Proyek</h1>
            <p class="text-sm text-gray-500 mt-1">
                Lihat informasi proyek dan perbarui perkembangannya.
            </p>
        </div>

        <a href="{{ route('admin.proyek.show', $proyek->id) }}"
           class="inline-flex items-center gap-2 px-4 py-2 bg-white border border-gray-200 text-gray-700 rounded-lg hover:bg-gray-100 transition">
            <i class="fas fa-arrow-left"></i> Kembali ke Detail
        </a>
    </div>

    {{-- PESAN SUKSES --}}
    @if(session('success'))
        <div class="p-4 bg-green-50 border border-green-200 text-green-700 rounded-lg">
            <i class="fas fa-check-circle mr-2"></i>
            {{ session('success') }}
        </div>
    @endif

    {{-- VALIDASI ERROR --}}
    @if($errors->any())
        <div class="p-4 bg-red-50 border border-red-200 text-red-700 rounded-lg">
            <p class="font-semibold mb-2">Terjadi kesalahan:</p>
            <ul class="list-disc list-inside text-sm">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- INFORMASI PROYEK (READ ONLY) --}}
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
        <div class="flex items-center gap-3 mb-5">
            <div class="w-10 h-10 rounded-lg bg-blue-50 text-blue-600 flex items-center justify-center">
                <i class="fas fa-folder-open"></i>
            </div>
            <div>
                <h2 class="text-lg font-bold text-gray-800">Informasi Proyek</h2>
                <p class="text-sm text-gray-500">Informasi ini hanya dapat dilihat.</p>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

            <div>
                <p class="text-sm text-gray-500 mb-1">Nama Proyek</p>
                <p class="font-semibold text-gray-800">
                    {{ $proyek->nama_proyek }}
                </p>
            </div>

            <div>
                <p class="text-sm text-gray-500 mb-1">Client</p>
                <p class="font-semibold text-gray-800">
                    {{ $proyek->client->name ?? '-' }}
                </p>
            </div>

            <div>
                <p class="text-sm text-gray-500 mb-1">Status Proyek</p>
                <span class="inline-block px-3 py-1 rounded-full text-xs font-semibold
                    {{ $proyek->status === 'selesai'
                        ? 'bg-green-100 text-green-700'
                        : 'bg-blue-100 text-blue-700' }}">
                    {{ ucfirst($proyek->status) }}
                </span>
            </div>

            <div>
                <p class="text-sm text-gray-500 mb-1">Progres Saat Ini</p>
                <p class="font-semibold text-gray-800">
                    {{ $proyek->progres }}%
                </p>
            </div>

            <div class="md:col-span-2">
                <p class="text-sm text-gray-500 mb-1">Deskripsi Proyek</p>
                <div class="p-4 bg-gray-50 rounded-lg text-sm text-gray-700 whitespace-pre-line">
                    {{ $proyek->deskripsi ?: 'Tidak ada deskripsi proyek.' }}
                </div>
            </div>

        </div>
    </div>

    {{-- INFORMASI KONSULTASI ASAL (READ ONLY) --}}
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">

        <div class="flex items-center gap-3 mb-5">
            <div class="w-10 h-10 rounded-lg bg-amber-50 text-amber-600 flex items-center justify-center">
                <i class="fas fa-comments"></i>
            </div>
            <div>
                <h2 class="text-lg font-bold text-gray-800">Informasi Konsultasi Asal</h2>
                <p class="text-sm text-gray-500">
                    Informasi konsultasi yang menjadi dasar pembuatan proyek.
                </p>
            </div>
        </div>

        @if($proyek->konsultasi)
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
                        {{ $proyek->konsultasi->waktu_konsultasi ?: '-' }}
                    </p>
                </div>

                <div class="md:col-span-2">
                    <p class="text-sm text-gray-500 mb-1">Catatan dari Client</p>
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
        @else
            <div class="p-4 bg-amber-50 border border-amber-200 text-amber-700 rounded-lg text-sm">
                <i class="fas fa-info-circle mr-2"></i>
                Proyek ini belum memiliki informasi konsultasi yang terhubung.
            </div>
        @endif

    </div>

    {{-- FORM UPDATE PROGRES --}}
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">

        <div class="flex items-center gap-3 mb-6">
            <div class="w-10 h-10 rounded-lg bg-blue-50 text-blue-600 flex items-center justify-center">
                <i class="fas fa-chart-line"></i>
            </div>
            <div>
                <h2 class="text-lg font-bold text-gray-800">Perbarui Progres Proyek</h2>
                <p class="text-sm text-gray-500">
                    Ubah persentase progres dan tambahkan catatan perkembangan.
                </p>
            </div>
        </div>

        {{-- PROGRES TERSIMPAN --}}
        <div class="mb-6">
            <div class="flex justify-between items-center mb-2">
                <span class="text-sm font-medium text-gray-600">Progres Tersimpan</span>
                <span class="text-sm font-bold text-blue-600">
                    {{ $proyek->progres }}%
                </span>
            </div>

            <div class="w-full bg-gray-200 rounded-full h-3">
                <div class="bg-blue-600 h-3 rounded-full transition-all"
                     style="width: {{ $proyek->progres }}%">
                </div>
            </div>
        </div>

        <form action="{{ route('admin.proyek.updateProgress', $proyek->id) }}"
              method="POST">
            @csrf

            {{-- SLIDER PROGRES --}}
            <div class="mb-6">
                <div class="flex justify-between items-center mb-3">
                    <label for="progres" class="text-sm font-semibold text-gray-700">
                        Progres Baru
                    </label>

                    <span id="nilaiProgres"
                          class="text-lg font-bold text-blue-600">
                        {{ old('progres', $proyek->progres) }}%
                    </span>
                </div>

                <input type="range"
                       name="progres"
                       id="progres"
                       min="0"
                       max="100"
                       step="1"
                       value="{{ old('progres', $proyek->progres) }}"
                       class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer accent-[#1e3352]">

                <div class="flex justify-between text-xs text-gray-400 mt-2">
                    <span>0%</span>
                    <span>25%</span>
                    <span>50%</span>
                    <span>75%</span>
                    <span>100%</span>
                </div>
            </div>

            {{-- CATATAN PERKEMBANGAN --}}
            <div class="mb-6">
                <label for="catatan"
                       class="block text-sm font-semibold text-gray-700 mb-2">
                    Catatan Perkembangan
                </label>

                <textarea name="catatan"
                          id="catatan"
                          rows="5"
                          required
                          maxlength="5000"
                          placeholder="Tuliskan perkembangan pekerjaan proyek saat ini..."
                          class="w-full border border-gray-300 rounded-lg px-4 py-3 text-sm focus:ring-2 focus:ring-[#1e3352] focus:border-[#1e3352] outline-none">{{ old('catatan') }}</textarea>

                <p class="text-xs text-gray-400 mt-2">
                    Catatan ini akan disimpan ke riwayat proyek dan dikirimkan kepada client
                    apabila notifikasi Updated Proyek diaktifkan.
                </p>
            </div>

            {{-- TOMBOL SIMPAN --}}
            <div class="flex justify-end">
                <button type="submit"
                        class="inline-flex items-center gap-2 px-5 py-3 bg-[#1e3352] text-white rounded-lg hover:bg-[#172943] transition font-semibold">
                    <i class="fas fa-save"></i>
                    Simpan Perkembangan
                </button>
            </div>

        </form>
    </div>

</div>
@endsection

@push('scripts')
<script>
    const sliderProgres = document.getElementById('progres');
    const nilaiProgres = document.getElementById('nilaiProgres');

    sliderProgres.addEventListener('input', function () {
        nilaiProgres.textContent = this.value + '%';
    });
</script>
@endpush
