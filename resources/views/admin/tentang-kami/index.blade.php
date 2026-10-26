@extends('layouts.admin')

@section('title', 'Kelola Tentang Kami')

@section('content')
<div class="mb-6 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
    <div>
        <h1 class="text-2xl font-bold text-gray-800">Kelola Tentang Kami</h1>
        <p class="text-sm text-gray-500 mt-1">Atur penjelasan, visi misi, kontak, dan struktur tim di satu tempat.</p>
    </div>
</div>

@if(session('success'))
    <div class="mb-6 px-4 py-3 bg-green-50 border-l-4 border-green-500 text-green-700 rounded shadow-sm flex items-center justify-between">
        <div class="flex items-center gap-2">
            <i class="fas fa-check-circle"></i> <span class="font-medium">{{ session('success') }}</span>
        </div>
        <button type="button" class="hover:text-green-900" onclick="this.parentElement.style.display='none'"><i class="fas fa-times"></i></button>
    </div>
@endif

<!-- BAGIAN 1: PROFIL, VISI MISI & KONTAK -->
<div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 mb-8">
    <div class="flex items-center justify-between mb-6 border-b pb-3">
        <h2 class="text-lg font-bold text-[#254261]"><i class="fas fa-building mr-2"></i> Informasi & Profil Perusahaan</h2>
    </div>

    <form action="{{ route('admin.tentang-kami.profil.update') }}" method="POST">
        @csrf @method('PUT')

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-6">
            <!-- Kolom Kiri -->
            <div class="space-y-5">
                <div class="bg-gray-50 p-4 rounded-lg border border-gray-100">
                    <h3 class="font-semibold text-gray-700 mb-4 border-b pb-2">Teks Pendahuluan (Hero)</h3>
                    <div class="mb-4">
                        <label class="block text-sm font-medium mb-1">Judul Utama</label>
                        <input type="text" name="judul" value="{{ old('judul', $tentang->judul ?? '') }}" class="w-full border rounded-lg p-2.5 bg-white" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">Deskripsi Singkat</label>
                        <textarea name="deskripsi" rows="4" class="w-full border rounded-lg p-2.5 bg-white" required>{{ old('deskripsi', $tentang->deskripsi ?? '') }}</textarea>
                    </div>
                </div>

                <div class="bg-gray-50 p-4 rounded-lg border border-gray-100">
                    <h3 class="font-semibold text-gray-700 mb-4 border-b pb-2">Visi & Misi</h3>
                    <div class="mb-4">
                        <label class="block text-sm font-medium mb-1">Visi Perusahaan</label>
                        <textarea name="visi" rows="3" class="w-full border rounded-lg p-2.5 bg-white">{{ old('visi', $tentang->visi ?? '') }}</textarea>
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">Misi Perusahaan</label>
                        <textarea name="misi" rows="4" class="w-full border rounded-lg p-2.5 bg-white">{{ old('misi', $tentang->misi ?? '') }}</textarea>
                    </div>
                </div>
            </div>

            <!-- Kolom Kanan -->
            <div class="space-y-5">
                <div class="bg-gray-50 p-4 rounded-lg border border-gray-100">
                    <h3 class="font-semibold text-gray-700 mb-4 border-b pb-2">Informasi Kontak & Lokasi</h3>
                    <div class="mb-4">
                        <label class="block text-sm font-medium mb-1">Alamat Lengkap</label>
                        <textarea name="alamat" rows="2" class="w-full border rounded-lg p-2.5 bg-white">{{ old('alamat', $tentang->alamat ?? '') }}</textarea>
                    </div>
                    <div class="grid grid-cols-2 gap-4 mb-4">
                        <div>
                            <label class="block text-sm font-medium mb-1">Nomor Telepon</label>
                            <input type="text" name="telepon" value="{{ old('telepon', $tentang->telepon ?? '') }}" class="w-full border rounded-lg p-2.5 bg-white">
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-1">Email</label>
                            <input type="email" name="email" value="{{ old('email', $tentang->email ?? '') }}" class="w-full border rounded-lg p-2.5 bg-white">
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">Link Embed Google Maps (src)</label>
                        <textarea name="gmaps_embed" rows="4" class="w-full border rounded-lg p-2.5 bg-white font-mono text-sm" placeholder="https://www.google.com/maps/embed?...">{{ old('gmaps_embed', $tentang->gmaps_embed ?? '') }}</textarea>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex justify-end">
            <button type="submit" class="px-6 py-2.5 bg-[#254261] hover:bg-[#1a2f45] text-white font-bold rounded-lg shadow-sm">
                <i class="fas fa-save mr-2"></i> Simpan Informasi Perusahaan
            </button>
        </div>
    </form>
</div>

<!-- BAGIAN 2: MANAJEMEN TIM -->
<div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
    <div class="p-6 border-b flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <h2 class="text-lg font-bold text-[#254261]"><i class="fas fa-users mr-2"></i> Struktur Tim Kami</h2>
        <button type="button" onclick="openModal('tambahModal')" class="inline-flex items-center gap-2 px-4 py-2 bg-[#f59e0b] hover:bg-amber-600 text-white text-sm font-bold rounded-lg">
            <i class="fas fa-plus"></i> Tambah Anggota
        </button>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-50 border-b border-gray-100">
                    <th class="px-6 py-4 text-sm font-semibold text-gray-600 w-16 text-center">No</th>
                    <th class="px-6 py-4 text-sm font-semibold text-gray-600">Nama Lengkap</th>
                    <th class="px-6 py-4 text-sm font-semibold text-gray-600">Jabatan</th>
                    <th class="px-6 py-4 text-sm font-semibold text-gray-600 w-32 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($tim as $key => $item)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 text-sm text-gray-600 text-center">{{ $loop->iteration }}</td>
                    <td class="px-6 py-4 text-sm text-gray-800 font-bold">{{ $item->nama }}</td>
                    <td class="px-6 py-4 text-sm text-gray-600">{{ $item->jabatan }}</td>
                    <td class="px-6 py-4 text-center space-x-2">
                        <button type="button" onclick="openEditModal(this)" data-id="{{ $item->id }}" data-nama="{{ $item->nama }}" data-jabatan="{{ $item->jabatan }}" class="text-blue-500 hover:text-blue-700">
                            <i class="fas fa-edit"></i>
                        </button>
                        <form action="{{ route('admin.tentang-kami.tim.destroy', $item->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Hapus data ini?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-700">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="4" class="px-6 py-8 text-center text-gray-500">Belum ada anggota tim.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- MODAL TAMBAH TIM -->
<div id="tambahModal" class="fixed inset-0 z-50 hidden bg-gray-900/50 flex items-center justify-center">
    <div class="bg-white rounded-xl shadow-lg w-full max-w-lg mx-4">
        <form action="{{ route('admin.tentang-kami.tim.store') }}" method="POST" enctype="multipart/form-data" class="p-6">
            @csrf
            <h3 class="text-lg font-bold mb-4">Tambah Anggota Tim</h3>
            <div class="mb-4">
                <label class="block text-sm font-medium mb-1">Nama Lengkap</label>
                <input type="text" name="nama" class="w-full border rounded-lg p-2.5 bg-gray-50" required>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium mb-1">Jabatan</label>
                <input type="text" name="jabatan" class="w-full border rounded-lg p-2.5 bg-gray-50" required>
            </div>
            <div class="mb-6">
                <label class="block text-sm font-medium mb-1">Foto (Opsional)</label>
                <input type="file" name="foto" class="w-full border rounded-lg bg-gray-50">
            </div>
            <div class="flex justify-end gap-2 pt-2 border-t">
                <button type="button" onclick="closeModal('tambahModal')" class="px-4 py-2 border rounded-lg">Batal</button>
                <button type="submit" class="px-4 py-2 bg-[#f59e0b] text-white rounded-lg font-bold">Simpan</button>
            </div>
        </form>
    </div>
</div>

<!-- MODAL EDIT TIM -->
<div id="editModal" class="fixed inset-0 z-50 hidden bg-gray-900/50 flex items-center justify-center">
    <div class="bg-white rounded-xl shadow-lg w-full max-w-lg mx-4">
        <form id="editForm" method="POST" enctype="multipart/form-data" class="p-6">
            @csrf @method('PUT')
            <h3 class="text-lg font-bold mb-4">Edit Anggota Tim</h3>
            <div class="mb-4">
                <label class="block text-sm font-medium mb-1">Nama Lengkap</label>
                <input type="text" id="edit_nama" name="nama" class="w-full border rounded-lg p-2.5 bg-gray-50" required>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium mb-1">Jabatan</label>
                <input type="text" id="edit_jabatan" name="jabatan" class="w-full border rounded-lg p-2.5 bg-gray-50" required>
            </div>
            <div class="mb-6">
                <label class="block text-sm font-medium mb-1">Update Foto</label>
                <input type="file" name="foto" class="w-full border rounded-lg bg-gray-50">
            </div>
            <div class="flex justify-end gap-2 pt-2 border-t">
                <button type="button" onclick="closeModal('editModal')" class="px-4 py-2 border rounded-lg">Batal</button>
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg font-bold">Perbarui</button>
            </div>
        </form>
    </div>
</div>

<script>
    function openModal(id) { document.getElementById(id).classList.remove('hidden'); }
    function closeModal(id) { document.getElementById(id).classList.add('hidden'); }
    function openEditModal(btn) {
        document.getElementById('edit_nama').value = btn.getAttribute('data-nama');
        document.getElementById('edit_jabatan').value = btn.getAttribute('data-jabatan');
        document.getElementById('editForm').action = "{{ url('admin/tentang-kami/tim') }}/" + btn.getAttribute('data-id');
        openModal('editModal');
    }
</script>
@endsection
