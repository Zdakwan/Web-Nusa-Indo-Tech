@extends('layouts.admin')

@section('title', 'Tambah Proyek')

@section('content')
<div class="max-w-4xl mx-auto space-y-6">

    {{-- HEADER --}}
    <div>
        <h1 class="text-2xl font-bold text-gray-800">Tambah Proyek</h1>
        <p class="text-sm text-gray-500 mt-1">
            Buat proyek berdasarkan konsultasi client yang telah disetujui.
        </p>
    </div>

    {{-- PESAN VALIDASI --}}
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

    {{-- FORM TAMBAH PROYEK --}}
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">

        <form action="{{ route('admin.proyek.store') }}" method="POST">
            @csrf

            <div class="space-y-5">

                {{-- PILIH KONSULTASI --}}
                <div>
                    <label for="konsultasi_id"
                           class="block text-sm font-semibold text-gray-700 mb-2">
                        Konsultasi Client <span class="text-red-500">*</span>
                    </label>

                    <select
                        name="konsultasi_id"
                        id="konsultasi_id"
                        required
                        class="w-full border border-gray-300 rounded-lg px-4 py-3 text-sm focus:ring-2 focus:ring-[#1e3352] focus:border-[#1e3352] outline-none"
                    >
                        <option value="">-- Pilih Konsultasi --</option>

                        @foreach($konsultasis as $konsultasi)
                            <option
                                value="{{ $konsultasi->id }}"
                                {{ old('konsultasi_id') == $konsultasi->id ? 'selected' : '' }}
                            >
                                {{ $konsultasi->jenis_konsultasi ?? 'Konsultasi Umum' }}
                                - {{ $konsultasi->nama_perusahaan ?? $konsultasi->nama_pic ?? 'Tanpa Nama' }}
                                - {{ $konsultasi->client->name ?? 'Client tidak ditemukan' }}
                            </option>
                        @endforeach
                    </select>

                    @error('konsultasi_id')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror

                    <p class="text-xs text-gray-400 mt-2">
                        Hanya konsultasi yang telah disetujui dan belum memiliki proyek
                        yang dapat dipilih.
                    </p>
                </div>

                {{-- INFORMASI KONSULTASI --}}
                <div id="informasiKonsultasi"
                     class="hidden bg-blue-50 border border-blue-100 rounded-lg p-4">

                    <p class="text-sm font-semibold text-blue-800 mb-3">
                        <i class="fas fa-info-circle mr-2"></i>
                        Informasi Konsultasi
                    </p>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-3 text-sm">
                        <div>
                            <p class="text-blue-600 text-xs">Client</p>
                            <p id="infoClient" class="font-semibold text-blue-900">-</p>
                        </div>

                        <div>
                            <p class="text-blue-600 text-xs">Perusahaan</p>
                            <p id="infoPerusahaan" class="font-semibold text-blue-900">-</p>
                        </div>

                        <div>
                            <p class="text-blue-600 text-xs">Jenis Konsultasi</p>
                            <p id="infoJenis" class="font-semibold text-blue-900">-</p>
                        </div>

                        <div>
                            <p class="text-blue-600 text-xs">Tanggal Konsultasi</p>
                            <p id="infoTanggal" class="font-semibold text-blue-900">-</p>
                        </div>
                    </div>
                </div>

                {{-- NAMA PROYEK --}}
                <div>
                    <label for="nama_proyek"
                           class="block text-sm font-semibold text-gray-700 mb-2">
                        Nama Proyek <span class="text-red-500">*</span>
                    </label>

                    <input
                        type="text"
                        name="nama_proyek"
                        id="nama_proyek"
                        value="{{ old('nama_proyek') }}"
                        required
                        maxlength="255"
                        placeholder="Contoh: Pengembangan Website Perusahaan"
                        class="w-full border border-gray-300 rounded-lg px-4 py-3 text-sm focus:ring-2 focus:ring-[#1e3352] focus:border-[#1e3352] outline-none"
                    >

                    @error('nama_proyek')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                {{-- DESKRIPSI --}}
                <div>
                    <label for="deskripsi"
                           class="block text-sm font-semibold text-gray-700 mb-2">
                        Deskripsi Proyek
                    </label>

                    <textarea
                        name="deskripsi"
                        id="deskripsi"
                        rows="5"
                        maxlength="5000"
                        placeholder="Jelaskan pekerjaan yang akan dilakukan berdasarkan hasil konsultasi..."
                        class="w-full border border-gray-300 rounded-lg px-4 py-3 text-sm focus:ring-2 focus:ring-[#1e3352] focus:border-[#1e3352] outline-none resize-y"
                    >{{ old('deskripsi') }}</textarea>

                    @error('deskripsi')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                {{-- INFORMASI PROGRES AWAL --}}
                <div class="bg-blue-50 border border-blue-100 rounded-lg p-4">
                    <div class="flex items-start gap-3">
                        <i class="fas fa-info-circle text-blue-500 mt-1"></i>

                        <div>
                            <p class="text-sm font-semibold text-blue-800">
                                Progres Awal Proyek: 0%
                            </p>

                            <p class="text-xs text-blue-700 mt-1">
                                Setelah proyek dibuat, Admin dapat memperbarui
                                progres dan menambahkan catatan perkembangan.
                            </p>
                        </div>
                    </div>
                </div>

            </div>

            {{-- TOMBOL --}}
            <div class="flex justify-end gap-3 mt-8 pt-5 border-t border-gray-200">

                <a
                    href="{{ route('admin.proyek.index') }}"
                    class="px-5 py-2.5 rounded-lg border border-gray-300 text-gray-600 text-sm font-semibold hover:bg-gray-50 transition"
                >
                    Batal
                </a>

                <button
                    type="submit"
                    class="px-5 py-2.5 rounded-lg bg-[#1e3352] text-white text-sm font-semibold hover:bg-[#2a4165] transition"
                >
                    <i class="fas fa-save mr-2"></i>
                    Simpan Proyek
                </button>

            </div>

        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
    const daftarKonsultasi = @json($daftarKonsultasi);

    const selectKonsultasi = document.getElementById('konsultasi_id');
    const informasiKonsultasi = document.getElementById('informasiKonsultasi');

    selectKonsultasi.addEventListener('change', function () {
        const data = daftarKonsultasi.find(
            item => item.id == this.value
        );

        if (data) {
            document.getElementById('infoClient').textContent = data.client;
            document.getElementById('infoPerusahaan').textContent = data.perusahaan;
            document.getElementById('infoJenis').textContent = data.jenis;
            document.getElementById('infoTanggal').textContent = data.tanggal;

            informasiKonsultasi.classList.remove('hidden');
        } else {
            informasiKonsultasi.classList.add('hidden');
        }
    });

    // Tampilkan kembali informasi jika validasi sebelumnya gagal.
    if (selectKonsultasi.value) {
        selectKonsultasi.dispatchEvent(new Event('change'));
    }
</script>
@endpush