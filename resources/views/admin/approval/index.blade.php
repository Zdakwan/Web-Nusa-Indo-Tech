@extends('layouts.admin')

@section('title', 'Approval - Nusa Indo Technology')

@section('content')
<div class="mb-6">
    <h1 class="text-3xl font-extrabold text-[#254261]">Approval</h1>
    <p class="text-gray-500 mt-1">
        Kelola permintaan konsultasi dan laporan Call Center dari klien.
    </p>
</div>

@if(session('success'))
    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded mb-6 shadow-sm">
        <p class="font-bold">Berhasil!</p>
        <p>{{ session('success') }}</p>
    </div>
@endif

@if($errors->any())
    <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 rounded mb-6 shadow-sm">
        <p class="font-bold">Periksa kembali data yang dimasukkan:</p>
        <ul class="list-disc pl-5 mt-2">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

{{-- BAGIAN 1: APPROVAL KONSULTASI --}}
<div class="mb-8">
    <div class="mb-4">
        <h2 class="text-xl font-bold text-[#254261]">Approval Konsultasi</h2>
        <p class="text-sm text-gray-500 mt-1">
            Permintaan jadwal konsultasi dari klien.
        </p>
    </div>

    <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left">
                <thead class="bg-gray-50 text-gray-600 font-bold border-b border-gray-200">
                    <tr>
                        <th class="py-4 px-6">Nama Klien / Perusahaan</th>
                        <th class="py-4 px-6">Topik / Permintaan</th>
                        <th class="py-4 px-6">Jadwal Konsultasi</th>
                        <th class="py-4 px-6">Tanggal Pengajuan</th>
                        <th class="py-4 px-6 text-center">Status</th>
                        <th class="py-4 px-6 text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($konsultasi as $item)
                        <tr class="border-b border-gray-100 hover:bg-gray-50">
                            <td class="py-4 px-6 font-medium text-gray-800">
                                {{ $item->client->name ?? 'Klien' }}
                                @if($item->nama_perusahaan)
                                    <div class="text-xs text-gray-500 mt-1">
                                        {{ $item->nama_perusahaan }}
                                    </div>
                                @endif
                            </td>

                            <td class="py-4 px-6">
                                {{ \Illuminate\Support\Str::limit($item->catatan_klien ?? 'Konsultasi Umum', 40) }}
                            </td>

                            <td class="py-4 px-6">
                                @if($item->tanggal_konsultasi)
                                    {{ \Illuminate\Support\Carbon::parse($item->tanggal_konsultasi)->format('d M Y') }}
                                @else
                                    Belum ditentukan
                                @endif

                                @if($item->waktu_konsultasi)
                                    <div class="text-xs text-gray-500 mt-1">
                                        {{ substr($item->waktu_konsultasi, 0, 5) }} WIB
                                    </div>
                                @endif
                            </td>

                            <td class="py-4 px-6">
                                {{ $item->created_at ? $item->created_at->format('d M Y') : '-' }}
                            </td>

                            <td class="py-4 px-6 text-center">
                                @if($item->status == 'pending')
                                    <span class="bg-yellow-100 text-yellow-800 px-3 py-1 rounded-full text-xs font-bold">Menunggu</span>
                                @elseif($item->status == 'approved')
                                    <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-xs font-bold">Disetujui</span>
                                @elseif($item->status == 'rejected')
                                    <span class="bg-red-100 text-red-800 px-3 py-1 rounded-full text-xs font-bold">Ditolak</span>
                                @else
                                    <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-xs font-bold">Selesai</span>
                                @endif
                            </td>

                            <td class="py-4 px-6 text-center">
                                <button type="button"
                                    onclick="openModal('modal-konsultasi-{{ $item->id }}')"
                                    class="bg-[#f5b73e] hover:bg-[#e0a430] text-[#0f172a] font-bold px-4 py-2 rounded-lg text-xs">
                                    Tanggapi
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="py-8 text-center text-gray-500">
                                Belum ada permintaan konsultasi.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

{{-- BAGIAN 2: LAPORAN CALL CENTER --}}
<div class="mb-6">
    <div class="mb-4">
        <h2 class="text-xl font-bold text-[#254261]">Laporan Call Center</h2>
        <p class="text-sm text-gray-500 mt-1">
            Laporan dan pertanyaan yang dikirim klien melalui Call Center.
        </p>
    </div>

    <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left">
                <thead class="bg-gray-50 text-gray-600 font-bold border-b border-gray-200">
                    <tr>
                        <th class="py-4 px-6">Nama Klien</th>
                        <th class="py-4 px-6">Subjek Laporan</th>
                        <th class="py-4 px-6">Tanggal Pengajuan</th>
                        <th class="py-4 px-6 text-center">Status</th>
                        <th class="py-4 px-6 text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($laporanCallCenter as $laporan)
                        <tr class="border-b border-gray-100 hover:bg-gray-50">
                            <td class="py-4 px-6">
                                <div class="font-medium text-gray-800">
                                    {{ $laporan->nama }}
                                </div>
                                <div class="text-xs text-gray-500 mt-1">
                                    {{ $laporan->email }}
                                </div>
                            </td>

                            <td class="py-4 px-6">
                                <div class="font-medium">{{ $laporan->subjek }}</div>
                                <div class="text-xs text-gray-500 mt-1">
                                    {{ \Illuminate\Support\Str::limit($laporan->pesan, 70) }}
                                </div>

                                @if($laporan->file_path)
                                    <a href="{{ \Illuminate\Support\Facades\Storage::disk('public')->url($laporan->file_path) }}"
                                       target="_blank"
                                       rel="noopener noreferrer"
                                       class="inline-block mt-2 text-blue-600 hover:underline text-xs">
                                        <i class="fas fa-paperclip mr-1"></i>
                                        Lihat lampiran
                                    </a>
                                @endif
                            </td>

                            <td class="py-4 px-6">
                                {{ $laporan->created_at ? $laporan->created_at->format('d M Y') : '-' }}
                            </td>

                            <td class="py-4 px-6 text-center">
                                @if($laporan->status == 'menunggu')
                                    <span class="bg-yellow-100 text-yellow-800 px-3 py-1 rounded-full text-xs font-bold">Menunggu</span>
                                @elseif($laporan->status == 'diproses')
                                    <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-xs font-bold">Diproses</span>
                                @elseif($laporan->status == 'ditolak')
                                    <span class="bg-red-100 text-red-800 px-3 py-1 rounded-full text-xs font-bold">Ditolak</span>
                                @else
                                    <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-xs font-bold">Selesai</span>
                                @endif
                            </td>

                            <td class="py-4 px-6 text-center">
                                <button type="button"
                                    onclick="openModal('modal-call-center-{{ $laporan->id }}')"
                                    class="bg-[#f5b73e] hover:bg-[#e0a430] text-[#0f172a] font-bold px-4 py-2 rounded-lg text-xs">
                                    Tanggapi
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="py-8 text-center text-gray-500">
                                Belum ada laporan Call Center.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

{{-- MODAL KONSULTASI --}}
@foreach($konsultasi as $item)
    <div id="modal-konsultasi-{{ $item->id }}"
         class="fixed inset-0 z-50 hidden bg-black/50 items-center justify-center p-4">
        <div class="bg-white rounded-2xl shadow-2xl w-full max-w-lg max-h-[90vh] overflow-y-auto">
            <div class="bg-[#254261] px-6 py-4 flex justify-between items-center text-white sticky top-0">
                <h3 class="font-bold text-lg">Tanggapan Konsultasi</h3>
                <button type="button"
                    onclick="closeModal('modal-konsultasi-{{ $item->id }}')"
                    class="text-gray-300 hover:text-white">
                    <i class="fas fa-xmark text-xl"></i>
                </button>
            </div>

            <form action="{{ route('admin.approval.updateStatus', $item->id) }}"
                  method="POST" class="p-6">
                @csrf
                @method('PUT')

                <div class="mb-5">
                    <label for="status-{{ $item->id }}"
                        class="block text-sm font-bold text-gray-700 mb-2">
                        Ubah Status
                    </label>

                    <select id="status-{{ $item->id }}"
                        name="status"
                        class="w-full border-gray-300 rounded-lg"
                        required>
                        <option value="pending" {{ $item->status == 'pending' ? 'selected' : '' }}>Menunggu</option>
                        <option value="approved" {{ $item->status == 'approved' ? 'selected' : '' }}>Setujui</option>
                        <option value="rejected" {{ $item->status == 'rejected' ? 'selected' : '' }}>Tolak</option>
                        <option value="completed" {{ $item->status == 'completed' ? 'selected' : '' }}>Selesai</option>
                    </select>
                </div>

                {{-- INPUT JADWAL --}}
                <div class="mb-5">
                    <label for="tanggal-konsultasi-{{ $item->id }}"
                        class="block text-sm font-bold text-gray-700 mb-2">
                        Tanggal Konsultasi
                    </label>

                    <input type="date"
                        id="tanggal-konsultasi-{{ $item->id }}"
                        name="tanggal_konsultasi"
                        value="{{ $item->tanggal_konsultasi ? \Illuminate\Support\Carbon::parse($item->tanggal_konsultasi)->format('Y-m-d') : '' }}"
                        min="{{ now()->format('Y-m-d') }}"
                        class="w-full border-gray-300 rounded-lg p-3">
                </div>

                <div class="mb-5">
                    <label for="waktu-konsultasi-{{ $item->id }}"
                        class="block text-sm font-bold text-gray-700 mb-2">
                        Waktu Konsultasi
                    </label>

                    <input type="time"
                        id="waktu-konsultasi-{{ $item->id }}"
                        name="waktu_konsultasi"
                        value="{{ $item->waktu_konsultasi ? substr($item->waktu_konsultasi, 0, 5) : '' }}"
                        class="w-full border-gray-300 rounded-lg p-3">
                </div>

                <div class="mb-5">
                    <label for="pesan-admin-{{ $item->id }}"
                        class="block text-sm font-bold text-gray-700 mb-2">
                        Pesan Balasan
                    </label>

                    <textarea id="pesan-admin-{{ $item->id }}"
                        name="pesan_admin"
                        rows="4"
                        class="w-full border-gray-300 rounded-lg p-3 text-sm"
                        placeholder="Tuliskan balasan untuk klien...">{{ $item->pesan_admin ?? '' }}</textarea>
                </div>

                <div class="flex justify-end gap-3">
                    <button type="button"
                        onclick="closeModal('modal-konsultasi-{{ $item->id }}')"
                        class="px-5 py-2.5 bg-gray-100 text-gray-700 font-bold rounded-lg">
                        Batal
                    </button>

                    <button type="submit"
                        class="px-5 py-2.5 bg-[#254261] text-white font-bold rounded-lg">
                        Kirim & Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
@endforeach

{{-- MODAL BALASAN CALL CENTER --}}
@foreach($laporanCallCenter as $laporan)
    <div id="modal-call-center-{{ $laporan->id }}"
         class="fixed inset-0 z-50 hidden bg-black/50 items-center justify-center p-4">
        <div class="bg-white rounded-2xl shadow-2xl w-full max-w-lg max-h-[90vh] overflow-y-auto">
            <div class="bg-[#254261] px-6 py-4 flex justify-between items-center text-white sticky top-0">
                <h3 class="font-bold text-lg">Tanggapi Laporan Call Center</h3>
                <button type="button"
                    onclick="closeModal('modal-call-center-{{ $laporan->id }}')"
                    class="text-gray-300 hover:text-white">
                    <i class="fas fa-xmark text-xl"></i>
                </button>
            </div>

            <div class="p-6 border-b border-gray-100">
                <p class="text-sm text-gray-500">Nama pelapor</p>
                <p class="font-semibold text-gray-800">{{ $laporan->nama }}</p>

                <p class="text-sm text-gray-500 mt-3">Subjek</p>
                <p class="font-semibold text-gray-800">{{ $laporan->subjek }}</p>

                <p class="text-sm text-gray-500 mt-3">Isi laporan</p>
                <p class="text-gray-700 whitespace-pre-line break-words">{{ $laporan->pesan }}</p>

                @if($laporan->file_path)
                    <a href="{{ \Illuminate\Support\Facades\Storage::disk('public')->url($laporan->file_path) }}"
                       target="_blank"
                       rel="noopener noreferrer"
                       class="inline-block mt-3 text-blue-600 hover:underline text-sm">
                        <i class="fas fa-paperclip mr-1"></i>
                        Lihat lampiran
                    </a>
                @endif
            </div>

            <form action="{{ route('admin.approval.call-center.updateStatus', $laporan->id) }}"
                  method="POST" class="p-6">
                @csrf
                @method('PUT')

                <div class="mb-5">
                    <label for="status-call-center-{{ $laporan->id }}"
                        class="block text-sm font-bold text-gray-700 mb-2">
                        Status Laporan
                    </label>

                    <select id="status-call-center-{{ $laporan->id }}"
                        name="status"
                        class="w-full border-gray-300 rounded-lg"
                        required>
                        <option value="menunggu" {{ $laporan->status == 'menunggu' ? 'selected' : '' }}>Menunggu</option>
                        <option value="diproses" {{ $laporan->status == 'diproses' ? 'selected' : '' }}>Diproses</option>
                        <option value="selesai" {{ $laporan->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                        <option value="ditolak" {{ $laporan->status == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                    </select>
                </div>

                <div class="mb-5">
                    <label for="pesan-call-center-{{ $laporan->id }}"
                        class="block text-sm font-bold text-gray-700 mb-2">
                        Pesan Balasan ke Klien
                    </label>

                    <textarea id="pesan-call-center-{{ $laporan->id }}"
                        name="pesan_admin"
                        rows="4"
                        class="w-full border-gray-300 rounded-lg p-3 text-sm"
                        placeholder="Tuliskan tanggapan atau solusi untuk klien...">{{ $laporan->pesan_admin ?? '' }}</textarea>

                    <p class="text-xs text-gray-500 mt-2">
                        Balasan disimpan bersama laporan agar dapat ditampilkan kepada klien.
                    </p>
                </div>

                <div class="flex justify-end gap-3">
                    <button type="button"
                        onclick="closeModal('modal-call-center-{{ $laporan->id }}')"
                        class="px-5 py-2.5 bg-gray-100 text-gray-700 font-bold rounded-lg">
                        Batal
                    </button>

                    <button type="submit"
                        class="px-5 py-2.5 bg-[#254261] text-white font-bold rounded-lg">
                        Kirim & Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
@endforeach

<script>
    function openModal(id) {
        const modal = document.getElementById(id);
        if (!modal) return;

        modal.classList.remove('hidden');
        modal.classList.add('flex');
    }

    function closeModal(id) {
        const modal = document.getElementById(id);
        if (!modal) return;

        modal.classList.add('hidden');
        modal.classList.remove('flex');
    }

    // Tutup modal jika admin mengeklik area di luar kotak.
    document.querySelectorAll('[id^="modal-"]').forEach(function (modal) {
        modal.addEventListener('click', function (event) {
            if (event.target === modal) {
                closeModal(modal.id);
            }
        });
    });
</script>
@endsection