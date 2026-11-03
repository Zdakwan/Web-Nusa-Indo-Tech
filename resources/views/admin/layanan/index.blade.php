@extends('layouts.admin')

@section('title', 'Manajemen Layanan')

@section('content')
<div class="mb-6 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
    <div>
        <h1 class="text-2xl font-bold text-gray-800">Manajemen Layanan</h1>
        <p class="text-sm text-gray-500 mt-1">Kelola data layanan IT Nusa Indo Tech.</p>
    </div>
    <button type="button" onclick="openModal('tambahModal')" class="inline-flex items-center gap-2 px-4 py-2 bg-[#254261] hover:bg-[#1a2f45] text-white text-sm font-medium rounded-lg shadow-sm">
        <i class="fa-solid fa-plus"></i> Tambah Layanan
    </button>
</div>

@if(session('success'))
    <div class="mb-6 px-4 py-3 bg-green-50 border-l-4 border-green-500 text-green-700 rounded shadow-sm flex items-center justify-between">
        <div class="flex items-center gap-2">
            <i class="fa-solid fa-check-circle"></i> <span class="font-medium">{{ session('success') }}</span>
        </div>
        <button type="button" class="hover:text-green-900" onclick="this.parentElement.style.display='none'"><i class="fa-solid fa-times"></i></button>
    </div>
@endif

@if ($errors->any())
    <div class="mb-6 px-4 py-3 bg-red-50 border-l-4 border-red-500 text-red-700 rounded shadow-sm" role="alert">
        <div class="flex items-center gap-2 mb-2">
            <i class="fa-solid fa-exclamation-circle"></i><span class="font-bold">Gagal menyimpan data!</span>
        </div>
        <ul class="list-disc list-inside text-sm">
            @foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach
        </ul>
    </div>
@endif

<!-- Tabel Data -->
<div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-50 border-b border-gray-100">
                    <th class="px-6 py-4 text-sm font-semibold text-gray-600 w-16 text-center">No</th>
                    <th class="px-6 py-4 text-sm font-semibold text-gray-600 w-24 text-center">Icon</th>
                    <th class="px-6 py-4 text-sm font-semibold text-gray-600">Nama Layanan</th>
                    <th class="px-6 py-4 text-sm font-semibold text-gray-600">Kategori</th>
                    <th class="px-6 py-4 text-sm font-semibold text-gray-600">Deskripsi</th>
                    <th class="px-6 py-4 text-sm font-semibold text-gray-600 w-32 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($layanan as $key => $item)
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="px-6 py-4 text-sm text-gray-600 text-center">{{ $loop->iteration }}</td>
                    <td class="px-6 py-4 text-center">
                        <div class="w-10 h-10 rounded-lg bg-blue-50 text-blue-600 flex items-center justify-center mx-auto text-lg">
                            <i class="{{ $item->icon ?? 'fa-solid fa-gears' }}"></i>
                        </div>
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-800 font-bold">{{ $item->nama_layanan }}</td>
                    <td class="px-6 py-4 text-sm text-gray-600">
                        <span class="px-2 py-1 bg-gray-100 rounded text-xs font-semibold tracking-wide uppercase">{{ $item->kategori }}</span>
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-600 truncate max-w-xs">{{ Str::limit($item->deskripsi, 50) }}</td>
                    <td class="px-6 py-4 text-center space-x-2 whitespace-nowrap">
                        <button type="button"
                            onclick="openEditModal(this)"
                            data-id="{{ $item->id }}"
                            data-nama="{{ $item->nama_layanan }}"
                            data-kategori="{{ $item->kategori }}"
                            data-icon="{{ $item->icon }}"
                            data-deskripsi="{{ $item->deskripsi }}"
                            class="text-blue-500 hover:text-blue-700 transition-colors" title="Edit">
                            <i class="fa-solid fa-edit text-lg"></i>
                        </button>
                        <form action="{{ route('admin.layanan.destroy', $item->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Hapus layanan ini?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-700 transition-colors" title="Hapus"><i class="fa-solid fa-trash-alt text-lg"></i></button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="6" class="px-6 py-12 text-center text-gray-500">Belum ada data layanan.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@php
    // Kumpulan Icon Solid FA6 yang matching dengan halaman Client
    $iconList = [
        'fa-solid fa-laptop-code', 'fa-solid fa-folder-open', 'fa-solid fa-building-columns',
        'fa-solid fa-circle-play', 'fa-solid fa-microchip', 'fa-solid fa-code',
        'fa-solid fa-shield-halved', 'fa-solid fa-network-wired', 'fa-solid fa-server',
        'fa-solid fa-cloud', 'fa-solid fa-chart-pie', 'fa-solid fa-gears',
        'fa-solid fa-video', 'fa-solid fa-camera', 'fa-solid fa-headset',
        'fa-solid fa-database', 'fa-solid fa-wifi', 'fa-solid fa-fingerprint',
        'fa-solid fa-chalkboard-user', 'fa-solid fa-mobile-screen'
    ];
@endphp

<!-- Modal Tambah -->
<div id="tambahModal" class="fixed inset-0 z-50 hidden bg-gray-900/50 backdrop-blur-sm flex items-center justify-center p-4">
    <div class="bg-white rounded-xl shadow-lg w-full max-w-lg">
        <div class="flex justify-between p-4 border-b">
            <h3 class="text-xl font-semibold">Tambah Layanan</h3>
            <button type="button" onclick="closeModal('tambahModal')"><i class="fa-solid fa-times text-gray-500 hover:text-gray-800"></i></button>
        </div>
        <form action="{{ route('admin.layanan.store') }}" method="POST" class="p-4">
            @csrf
            <div class="mb-4 grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium mb-1">Nama Layanan</label>
                    <input type="text" name="nama_layanan" value="{{ old('nama_layanan') }}" class="w-full border rounded-lg p-2 focus:ring-[#254261] focus:border-[#254261]" required>
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">Kategori</label>
                    <select name="kategori" class="w-full border rounded-lg p-2 focus:ring-[#254261] focus:border-[#254261]" required>
                        <option value="DEVELOPMENT" {{ old('kategori') == 'DEVELOPMENT' ? 'selected' : '' }}>DEVELOPMENT</option>
                        <option value="TATA KELOLA" {{ old('kategori') == 'TATA KELOLA' ? 'selected' : '' }}>TATA KELOLA</option>
                        <option value="UMUM" {{ old('kategori') == 'UMUM' ? 'selected' : '' }}>UMUM</option>
                    </select>
                </div>
            </div>

            <!-- Visual Icon Picker (Tambah) -->
            <div class="mb-4">
                <label class="block text-sm font-medium mb-2">Pilih Icon Layanan</label>
                <input type="hidden" name="icon" id="tambah_icon_input" value="fa-solid fa-laptop-code" required>

                <div class="flex items-center gap-3 mb-3">
                    <div id="tambah_icon_preview" class="w-10 h-10 rounded-lg bg-blue-50 text-blue-600 flex items-center justify-center text-xl border border-blue-100">
                        <i class="fa-solid fa-laptop-code"></i>
                    </div>
                    <span class="text-sm text-gray-500">Icon terpilih</span>
                </div>

                <div class="grid grid-cols-5 gap-2 max-h-32 overflow-y-auto p-2 border rounded-lg bg-gray-50">
                    @foreach($iconList as $icon)
                        <button type="button" onclick="selectIcon('tambah', '{{ $icon }}')" class="p-2 rounded-lg hover:bg-blue-100 text-gray-600 hover:text-blue-600 transition flex justify-center items-center text-lg focus:outline-none">
                            <i class="{{ $icon }}"></i>
                        </button>
                    @endforeach
                </div>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium mb-1">Deskripsi</label>
                <textarea name="deskripsi" rows="3" class="w-full border rounded-lg p-2 focus:ring-[#254261] focus:border-[#254261]" required>{{ old('deskripsi') }}</textarea>
            </div>
            <div class="flex justify-end gap-2 border-t pt-4">
                <button type="button" onclick="closeModal('tambahModal')" class="px-4 py-2 border rounded-lg hover:bg-gray-50">Batal</button>
                <button type="submit" class="px-4 py-2 bg-[#254261] text-white rounded-lg hover:bg-[#1a2f45]">Simpan</button>
            </div>
        </form>
    </div>
</div>

<!-- Modal Edit -->
<div id="editModal" class="fixed inset-0 z-50 hidden bg-gray-900/50 backdrop-blur-sm flex items-center justify-center p-4">
    <div class="bg-white rounded-xl shadow-lg w-full max-w-lg">
        <div class="flex justify-between p-4 border-b">
            <h3 class="text-xl font-semibold">Edit Layanan</h3>
            <button type="button" onclick="closeModal('editModal')"><i class="fa-solid fa-times text-gray-500 hover:text-gray-800"></i></button>
        </div>
        <form id="editForm" method="POST" class="p-4">
            @csrf @method('PUT')
            <div class="mb-4 grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium mb-1">Nama Layanan</label>
                    <input type="text" id="edit_nama" name="nama_layanan" class="w-full border rounded-lg p-2 focus:ring-[#254261] focus:border-[#254261]" required>
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">Kategori</label>
                    <select id="edit_kategori" name="kategori" class="w-full border rounded-lg p-2 focus:ring-[#254261] focus:border-[#254261]" required>
                        <option value="DEVELOPMENT">DEVELOPMENT</option>
                        <option value="TATA KELOLA">TATA KELOLA</option>
                        <option value="UMUM">UMUM</option>
                    </select>
                </div>
            </div>

            <!-- Visual Icon Picker (Edit) -->
            <div class="mb-4">
                <label class="block text-sm font-medium mb-2">Pilih Icon Layanan</label>
                <input type="hidden" name="icon" id="edit_icon_input" required>

                <div class="flex items-center gap-3 mb-3">
                    <div id="edit_icon_preview" class="w-10 h-10 rounded-lg bg-blue-50 text-blue-600 flex items-center justify-center text-xl border border-blue-100">
                        <i class="fa-solid fa-gears"></i>
                    </div>
                    <span class="text-sm text-gray-500">Icon terpilih</span>
                </div>

                <div class="grid grid-cols-5 gap-2 max-h-32 overflow-y-auto p-2 border rounded-lg bg-gray-50">
                    @foreach($iconList as $icon)
                        <button type="button" onclick="selectIcon('edit', '{{ $icon }}')" class="p-2 rounded-lg hover:bg-blue-100 text-gray-600 hover:text-blue-600 transition flex justify-center items-center text-lg focus:outline-none">
                            <i class="{{ $icon }}"></i>
                        </button>
                    @endforeach
                </div>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium mb-1">Deskripsi</label>
                <textarea id="edit_deskripsi" name="deskripsi" rows="3" class="w-full border rounded-lg p-2 focus:ring-[#254261] focus:border-[#254261]" required></textarea>
            </div>
            <div class="flex justify-end gap-2 border-t pt-4">
                <button type="button" onclick="closeModal('editModal')" class="px-4 py-2 border rounded-lg hover:bg-gray-50">Batal</button>
                <button type="submit" class="px-4 py-2 bg-[#254261] text-white rounded-lg hover:bg-[#1a2f45]">Update</button>
            </div>
        </form>
    </div>
</div>

<script>
    // Fungsi Manajemen Modal
    function openModal(id) { document.getElementById(id).classList.remove('hidden'); }
    function closeModal(id) { document.getElementById(id).classList.add('hidden'); }

    // Fungsi Manipulasi Visual Icon Picker
    function selectIcon(modalPrefix, iconClass) {
        // Set value ke hidden input
        document.getElementById(modalPrefix + '_icon_input').value = iconClass;
        // Ubah tampilan preview icon
        document.getElementById(modalPrefix + '_icon_preview').innerHTML = '<i class="' + iconClass + '"></i>';
    }

    // Load Data ke Modal Edit
    function openEditModal(btn) {
        document.getElementById('edit_nama').value = btn.getAttribute('data-nama');
        document.getElementById('edit_kategori').value = btn.getAttribute('data-kategori');
        document.getElementById('edit_deskripsi').value = btn.getAttribute('data-deskripsi');

        // Ambil data icon dan perbarui preview
        let iconClass = btn.getAttribute('data-icon') || 'fa-solid fa-gears';
        selectIcon('edit', iconClass);

        document.getElementById('editForm').action = '/admin/layanan/' + btn.getAttribute('data-id');
        openModal('editModal');
    }

    // Auto-open modal jika ada error validasi
    @if ($errors->any() && !old('_method'))
        openModal('tambahModal');
    @endif
</script>
@endsection
