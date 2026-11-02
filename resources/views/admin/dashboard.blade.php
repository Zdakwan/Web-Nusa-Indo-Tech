@extends('layouts.admin')

@section('title', 'Dashboard Admin - Nusa Indo Tech')

@section('content')
<div class="mb-6">
    <h1 class="text-2xl font-extrabold text-gray-900">Ringkasan</h1>
</div>

{{-- Alert Notifikasi Sukses --}}
@if(session('success'))
    <div class="mb-6 px-4 py-3 bg-green-50 border-l-4 border-green-500 text-green-800 rounded-lg shadow-sm flex items-center justify-between">
        <div class="flex items-center gap-2">
            <i class="fas fa-check-circle text-green-600"></i>
            <span class="text-sm font-semibold">{{ session('success') }}</span>
        </div>
        <button type="button" onclick="this.parentElement.style.display='none'" class="text-green-700 hover:text-green-900">&times;</button>
    </div>
@endif

{{-- Alert Notifikasi Error --}}
@if($errors->any())
    <div class="mb-6 px-4 py-3 bg-red-50 border-l-4 border-red-500 text-red-800 rounded-lg shadow-sm">
        <ul class="list-disc list-inside text-xs font-medium">
            @foreach($errors->all() as $err)
                <li>{{ $err }}</li>
            @endforeach
        </ul>
    </div>
@endif

{{-- 4 Kartu Ringkasan (Angka otomatis dari database) --}}
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 mb-6">
    <div class="bg-white rounded-2xl p-5 border border-gray-100 shadow-sm flex flex-col justify-between h-36">
        <div class="flex justify-between items-start">
            <span class="text-xs font-semibold text-gray-700 leading-snug">Total Permintaan<br>Konsultasi</span>
            <div class="w-9 h-9 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center">
                <i class="fas fa-comment-dots"></i>
            </div>
        </div>
        <div class="text-center text-4xl font-extrabold text-gray-900 pb-2">{{ $totalPermintaan ?? 0 }}</div>
    </div>

    <div class="bg-white rounded-2xl p-5 border border-gray-100 shadow-sm flex flex-col justify-between h-36">
        <div class="flex justify-between items-start">
            <span class="text-xs font-semibold text-gray-700">Menunggu</span>
            <div class="w-9 h-9 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center">
                <i class="fas fa-clock"></i>
            </div>
        </div>
        <div class="text-center text-4xl font-extrabold text-gray-900 pb-2">{{ $menunggu ?? 0 }}</div>
    </div>

    <div class="bg-white rounded-2xl p-5 border border-gray-100 shadow-sm flex flex-col justify-between h-36">
        <div class="flex justify-between items-start">
            <span class="text-xs font-semibold text-gray-700">Diproses</span>
            <div class="w-9 h-9 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center">
                <i class="fas fa-cog"></i>
            </div>
        </div>
        <div class="text-center text-4xl font-extrabold text-gray-900 pb-2">{{ $diproses ?? 0 }}</div>
    </div>

    <div class="bg-white rounded-2xl p-5 border border-gray-100 shadow-sm flex flex-col justify-between h-36">
        <div class="flex justify-between items-start">
            <span class="text-xs font-semibold text-gray-700">Selesai</span>
            <div class="w-9 h-9 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center">
                <i class="fas fa-check-circle"></i>
            </div>
        </div>
        <div class="text-center text-4xl font-extrabold text-gray-900 pb-2">{{ $selesai ?? 0 }}</div>
    </div>
</div>

{{-- Tombol Tambah Aktivitas (Memanggil JS openModalTambah) --}}
<div class="flex justify-end mb-4">
    <button type="button" onclick="openModalTambah()" class="bg-[#1b314c] hover:bg-[#122236] text-white text-xs font-bold px-5 py-2.5 rounded-lg shadow-sm transition inline-flex items-center gap-2">
        <span>Tambah Aktivitas</span>
        <i class="fas fa-plus"></i>
    </button>
</div>

{{-- Tabel Daftar Aktivitas Klien --}}
<div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6">
    <h2 class="text-base font-extrabold text-gray-900 mb-4">Daftar Aktivitas Klien Terbaru & Permintaan Konsultasi</h2>

    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-[#fdf2f0] text-gray-900 text-xs font-bold">
                    <th class="py-3 pl-4 rounded-l-lg w-10"></th>
                    <th class="py-3 px-4">Nama Klien/Perusahaan</th>
                    <th class="py-3 px-4">Permintaan/Proyek</th>
                    <th class="py-3 px-4">Tanggal Pengajuan</th>
                    <th class="py-3 px-4 text-center">Status</th>
                    <th class="py-3 px-4 text-center rounded-r-lg">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 text-xs text-gray-800">
                @forelse($aktivitas as $k)
                    @php
                        // Menyesuaikan dengan struktur data di database
                        $namaKlien = $k->client?->company ?: ($k->client?->name ?: ($k->nama_perusahaan ?: 'Klien #' . $k->id));
                        $proyek    = $k->catatan_klien ?: ($k->permintaan ?: 'Konsultasi IT');
                        $tanggal   = $k->tanggal_konsultasi ?? $k->created_at;
                        $tglFormat = $tanggal ? \Carbon\Carbon::parse($tanggal)->locale('id')->translatedFormat('d F Y') : '-';
                        $tglInput  = $tanggal ? \Carbon\Carbon::parse($tanggal)->format('Y-m-d') : date('Y-m-d');

                        $status = match($k->status) {
                            'approved', 'Diproses' => ['label' => 'Diproses', 'class' => 'bg-blue-100 text-blue-700'],
                            'completed', 'Selesai' => ['label' => 'Selesai', 'class' => 'bg-green-100 text-green-700'],
                            'rejected', 'Ditolak'  => ['label' => 'Ditolak', 'class' => 'bg-red-100 text-red-700'],
                            default                => ['label' => 'Menunggu', 'class' => 'bg-gray-200 text-gray-700'],
                        };
                    @endphp
                    <tr class="hover:bg-gray-50 transition">
                        <td class="py-3.5 pl-4">
                            <input type="checkbox" class="w-4 h-4 rounded border-gray-300">
                        </td>
                        <td class="py-3.5 px-4 font-medium">{{ $namaKlien }}</td>
                        <td class="py-3.5 px-4">{{ \Illuminate\Support\Str::limit($proyek, 40) }}</td>
                        <td class="py-3.5 px-4">{{ $tglFormat }}</td>
                        <td class="py-3.5 px-4 text-center">
                            <span class="inline-block min-w-[90px] px-3 py-1 rounded-lg text-xs font-semibold {{ $status['class'] }}">
                                {{ $status['label'] }}
                            </span>
                        </td>
                        <td class="py-3.5 px-4">
                            <div class="flex items-center justify-center gap-4 text-base">
                                {{-- Tombol Lihat (Mata) --}}
                                <button type="button" 
                                    onclick="openModalDetail({{ json_encode($namaKlien) }}, {{ json_encode($proyek) }}, {{ json_encode($tglFormat) }}, {{ json_encode($status['label']) }})" 
                                    title="Lihat" class="text-blue-600 hover:text-blue-800 cursor-pointer">
                                    <i class="fas fa-eye"></i>
                                </button>

                                {{-- Tombol Edit (Pensil) --}}
                                <button type="button" 
                                    onclick="openModalEdit({{ $k->id }}, {{ json_encode($namaKlien) }}, {{ json_encode($proyek) }}, {{ json_encode($tglInput) }}, {{ json_encode($k->status) }})" 
                                    title="Edit" class="text-gray-900 hover:text-gray-600 cursor-pointer">
                                    <i class="fas fa-pen-to-square"></i>
                                </button>

                                {{-- Tombol Hapus (Tempat Sampah) --}}
                                <form action="{{ route('admin.dashboard.aktivitas.destroy', $k->id) }}" method="POST" class="inline" onsubmit="return confirm('Yakin ingin menghapus aktivitas ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" title="Hapus" class="text-red-600 hover:text-red-800 cursor-pointer">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="py-8 text-center text-gray-400">Belum ada aktivitas klien.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

{{-- MODAL TAMBAH AKTIVITAS (Disembunyikan default dengan class 'hidden') --}}
<div id="modalTambah" class="fixed inset-0 z-50 hidden bg-black/50 flex items-center justify-center p-4">
    <div class="bg-white rounded-2xl max-w-md w-full p-6 shadow-xl">
        <div class="flex justify-between items-center border-b pb-3 mb-4">
            <h3 class="text-base font-bold text-gray-900">Tambah Aktivitas Klien</h3>
            <button type="button" onclick="closeModal('modalTambah')" class="text-gray-400 hover:text-gray-700 text-lg">&times;</button>
        </div>
        <form action="{{ route('admin.dashboard.aktivitas.store') }}" method="POST">
            @csrf
            <div class="space-y-4 text-xs">
                <div>
                    <label class="block font-semibold text-gray-700 mb-1">Nama Klien / Perusahaan</label>
                    <input type="text" name="nama_klien" required class="w-full border border-gray-300 rounded-lg p-2.5" placeholder="Contoh: PT. EPEP">
                </div>
                <div>
                    <label class="block font-semibold text-gray-700 mb-1">Permintaan / Proyek</label>
                    <input type="text" name="permintaan" required class="w-full border border-gray-300 rounded-lg p-2.5" placeholder="Contoh: Konsultasi Sistem ERP">
                </div>
                <div>
                    <label class="block font-semibold text-gray-700 mb-1">Tanggal Pengajuan</label>
                    <input type="date" name="tanggal_pengajuan" value="{{ date('Y-m-d') }}" required class="w-full border border-gray-300 rounded-lg p-2.5">
                </div>
                <div>
                    <label class="block font-semibold text-gray-700 mb-1">Status</label>
                    <select name="status" class="w-full border border-gray-300 rounded-lg p-2.5">
                        <option value="pending">Menunggu</option>
                        <option value="approved">Diproses</option>
                        <option value="completed">Selesai</option>
                    </select>
                </div>
            </div>
            <div class="flex justify-end gap-2 mt-6">
                <button type="button" onclick="closeModal('modalTambah')" class="px-4 py-2 rounded-lg border text-xs font-semibold text-gray-600 hover:bg-gray-100">Batal</button>
                <button type="submit" class="px-4 py-2 rounded-lg bg-[#1b314c] text-white text-xs font-bold hover:bg-[#122236]">Simpan Aktivitas</button>
            </div>
        </form>
    </div>
</div>

{{-- MODAL EDIT AKTIVITAS --}}
<div id="modalEdit" class="fixed inset-0 z-50 hidden bg-black/50 flex items-center justify-center p-4">
    <div class="bg-white rounded-2xl max-w-md w-full p-6 shadow-xl">
        <div class="flex justify-between items-center border-b pb-3 mb-4">
            <h3 class="text-base font-bold text-gray-900">Edit Aktivitas Klien</h3>
            <button type="button" onclick="closeModal('modalEdit')" class="text-gray-400 hover:text-gray-700 text-lg">&times;</button>
        </div>
        <form id="formEditAktivitas" method="POST">
            @csrf
            @method('PUT')
            <div class="space-y-4 text-xs">
                <div>
                    <label class="block font-semibold text-gray-700 mb-1">Nama Klien / Perusahaan</label>
                    <input type="text" name="nama_klien" id="edit_nama_klien" required class="w-full border border-gray-300 rounded-lg p-2.5">
                </div>
                <div>
                    <label class="block font-semibold text-gray-700 mb-1">Permintaan / Proyek</label>
                    <input type="text" name="permintaan" id="edit_permintaan" required class="w-full border border-gray-300 rounded-lg p-2.5">
                </div>
                <div>
                    <label class="block font-semibold text-gray-700 mb-1">Tanggal Pengajuan</label>
                    <input type="date" name="tanggal_pengajuan" id="edit_tanggal" required class="w-full border border-gray-300 rounded-lg p-2.5">
                </div>
                <div>
                    <label class="block font-semibold text-gray-700 mb-1">Status</label>
                    <select name="status" id="edit_status" class="w-full border border-gray-300 rounded-lg p-2.5">
                        <option value="pending">Menunggu</option>
                        <option value="approved">Diproses</option>
                        <option value="completed">Selesai</option>
                        <option value="rejected">Ditolak</option>
                    </select>
                </div>
            </div>
            <div class="flex justify-end gap-2 mt-6">
                <button type="button" onclick="closeModal('modalEdit')" class="px-4 py-2 rounded-lg border text-xs font-semibold text-gray-600 hover:bg-gray-100">Batal</button>
                <button type="submit" class="px-4 py-2 rounded-lg bg-[#1b314c] text-white text-xs font-bold hover:bg-[#122236]">Simpan Perubahan</button>
            </div>
        </form>
    </div>
</div>

{{-- MODAL DETAIL AKTIVITAS --}}
<div id="modalDetail" class="fixed inset-0 z-50 hidden bg-black/50 flex items-center justify-center p-4">
    <div class="bg-white rounded-2xl max-w-md w-full p-6 shadow-xl">
        <div class="flex justify-between items-center border-b pb-3 mb-4">
            <h3 class="text-base font-bold text-gray-900">Detail Aktivitas Klien</h3>
            <button type="button" onclick="closeModal('modalDetail')" class="text-gray-400 hover:text-gray-700 text-lg">&times;</button>
        </div>
        <div class="space-y-3 text-xs text-gray-700">
            <div><span class="font-bold block text-gray-500">Nama Klien/Perusahaan:</span> <p id="detail_nama" class="mt-0.5 font-semibold text-gray-900 text-sm"></p></div>
            <div><span class="font-bold block text-gray-500">Permintaan/Proyek:</span> <p id="detail_proyek" class="mt-0.5 font-semibold text-gray-900 text-sm"></p></div>
            <div><span class="font-bold block text-gray-500">Tanggal Pengajuan:</span> <p id="detail_tgl" class="mt-0.5 font-semibold text-gray-900"></p></div>
            <div><span class="font-bold block text-gray-500">Status Saat Ini:</span> <p id="detail_status" class="mt-0.5 font-bold text-blue-600"></p></div>
        </div>
        <div class="flex justify-end mt-6">
            <button type="button" onclick="closeModal('modalDetail')" class="px-4 py-2 rounded-lg bg-gray-800 text-white text-xs font-bold">Tutup</button>
        </div>
    </div>
</div>

{{-- SCRIPT UNTUK MENJALANKAN SEMUA TOMBOL --}}
<script>
    function openModalTambah() {
        document.getElementById('modalTambah').classList.remove('hidden');
    }

    function openModalEdit(id, nama, proyek, tgl, status) {
        // Mengubah action form agar mengarah ke route update yang benar
        document.getElementById('formEditAktivitas').action = '/admin/dashboard/aktivitas/' + id;
        
        // Mengisi nilai input dengan data yang diklik
        document.getElementById('edit_nama_klien').value = nama;
        document.getElementById('edit_permintaan').value = proyek;
        document.getElementById('edit_tanggal').value = tgl;
        document.getElementById('edit_status').value = status;
        
        // Menampilkan modal
        document.getElementById('modalEdit').classList.remove('hidden');
    }

    function openModalDetail(nama, proyek, tgl, status) {
        // Mengisi teks detail
        document.getElementById('detail_nama').textContent = nama;
        document.getElementById('detail_proyek').textContent = proyek;
        document.getElementById('detail_tgl').textContent = tgl;
        document.getElementById('detail_status').textContent = status;
        
        // Menampilkan modal
        document.getElementById('modalDetail').classList.remove('hidden');
    }

    function closeModal(modalId) {
        // Menyembunyikan modal
        document.getElementById(modalId).classList.add('hidden');
    }
</script>
@endsection