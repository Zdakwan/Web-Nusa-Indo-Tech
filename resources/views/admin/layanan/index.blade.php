@extends('layouts.admin')

@section('title', 'Manajemen Layanan')

@section('content')
<div class="mb-6 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
    <div>
        <h1 class="text-2xl font-bold text-gray-800">Manajemen Layanan</h1>
        <p class="text-sm text-gray-500 mt-1">Kelola data layanan IT Nusa Indo Tech.</p>
    </div>

    <button type="button" onclick="openModal('tambahModal')" class="inline-flex items-center gap-2 px-4 py-2 bg-[#254261] hover:bg-[#1a2f45] text-white text-sm font-medium rounded-lg transition-colors shadow-sm">
        <i class="fas fa-plus"></i> Tambah Layanan
    </button>
</div>

@if(session('success'))
    <div class="mb-6 px-4 py-3 bg-green-50 border-l-4 border-green-500 text-green-700 rounded shadow-sm flex items-center justify-between" role="alert">
        <div class="flex items-center gap-2">
            <i class="fas fa-check-circle"></i>
            <span class="font-medium">{{ session('success') }}</span>
        </div>
        <button type="button" class="text-green-700 hover:text-green-900" onclick="this.parentElement.style.display='none'">
            <i class="fas fa-times"></i>
        </button>
    </div>
@endif

<div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-50 border-b border-gray-100">
                    <th class="px-6 py-4 text-sm font-semibold text-gray-600 w-16 text-center">No</th>
                    <th class="px-6 py-4 text-sm font-semibold text-gray-600 w-32 text-center">Icon</th>
                    <th class="px-6 py-4 text-sm font-semibold text-gray-600">Nama Layanan</th>
                    <th class="px-6 py-4 text-sm font-semibold text-gray-600">Deskripsi</th>
                    <th class="px-6 py-4 text-sm font-semibold text-gray-600 w-32 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($layanan as $key => $item)
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="px-6 py-4 text-sm text-gray-600 text-center">{{ $layanan->firstItem() + $key }}</td>
                    <td class="px-6 py-4 text-center">
                        @if($item->icon)
                            <img src="{{ asset('storage/' . $item->icon) }}" alt="Icon" class="w-12 h-12 object-cover rounded mx-auto shadow-sm">
                        @else
                            <div class="w-12 h-12 bg-gray-100 rounded flex items-center justify-center mx-auto text-gray-400">
                                <i class="fas fa-image"></i>
                            </div>
                        @endif
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-800 font-medium">{{ $item->nama_layanan }}</td>
                    <td class="px-6 py-4 text-sm text-gray-600">{{ Str::limit($item->deskripsi, 80) }}</td>
                    <td class="px-6 py-4 text-center space-x-2">
                        <button onclick="openEditModal({{ $item->id }}, '{{ addslashes($item->nama_layanan) }}', '{{ addslashes($item->deskripsi) }}')" class="text-blue-500 hover:text-blue-700 transition-colors" title="Edit">
                            <i class="fas fa-edit text-lg"></i>
                        </button>
                        <form action="{{ route('admin.layanan.destroy', $item->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Hapus layanan ini?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-700 transition-colors" title="Hapus">
                                <i class="fas fa-trash-alt text-lg"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-6 py-12 text-center text-gray-500">
                        <div class="flex flex-col items-center justify-center">
                            <i class="fas fa-box-open text-5xl text-gray-300 mb-4"></i>
                            <p class="text-base font-medium text-gray-600">Belum ada data layanan</p>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="px-6 py-4 border-t border-gray-100 bg-gray-50/50">
        {{ $layanan->links() }}
    </div>
</div>

<!-- Modal Tambah -->
<div id="tambahModal" tabindex="-1" class="fixed inset-0 z-50 hidden bg-gray-900/50 backdrop-blur-sm overflow-y-auto w-full h-full flex items-center justify-center">
    <div class="relative p-4 w-full max-w-xl">
        <div class="relative bg-white rounded-xl shadow-lg">
            <div class="flex items-center justify-between p-4 border-b">
                <h3 class="text-xl font-semibold text-gray-900">Tambah Layanan</h3>
                <button type="button" onclick="closeModal('tambahModal')" class="text-gray-400 hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 flex justify-center items-center"><i class="fas fa-times"></i></button>
            </div>
            <form action="{{ route('admin.layanan.store') }}" method="POST" enctype="multipart/form-data" class="p-4">
                @csrf
                <div class="mb-4">
                    <label class="block mb-2 text-sm font-medium text-gray-900">Nama Layanan</label>
                    <input type="text" name="nama_layanan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#254261] focus:border-[#254261] block w-full p-2.5" required>
                </div>
                <div class="mb-4">
                    <label class="block mb-2 text-sm font-medium text-gray-900">Deskripsi</label>
                    <textarea name="deskripsi" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-[#254261] focus:border-[#254261]" required></textarea>
                </div>
                <div class="mb-4">
                    <label class="block mb-2 text-sm font-medium text-gray-900">Icon / Gambar</label>
                    <input type="file" name="icon" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 file:mr-4 file:py-2 file:px-4 file:border-0 file:bg-[#254261] file:text-white hover:file:bg-[#1a2f45]">
                </div>
                <div class="flex justify-end gap-3 mt-6 border-t pt-4">
                    <button type="button" onclick="closeModal('tambahModal')" class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-100 rounded-lg hover:bg-gray-200">Batal</button>
                    <button type="submit" class="px-4 py-2 text-sm font-medium text-white bg-[#254261] rounded-lg hover:bg-[#1a2f45]">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Edit -->
<div id="editModal" tabindex="-1" class="fixed inset-0 z-50 hidden bg-gray-900/50 backdrop-blur-sm overflow-y-auto w-full h-full flex items-center justify-center">
    <div class="relative p-4 w-full max-w-xl">
        <div class="relative bg-white rounded-xl shadow-lg">
            <div class="flex items-center justify-between p-4 border-b">
                <h3 class="text-xl font-semibold text-gray-900">Edit Layanan</h3>
                <button type="button" onclick="closeModal('editModal')" class="text-gray-400 hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 flex justify-center items-center"><i class="fas fa-times"></i></button>
            </div>
            <form id="editForm" method="POST" enctype="multipart/form-data" class="p-4">
                @csrf @method('PUT')
                <div class="mb-4">
                    <label class="block mb-2 text-sm font-medium text-gray-900">Nama Layanan</label>
                    <input type="text" name="nama_layanan" id="edit_nama" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" required>
                </div>
                <div class="mb-4">
                    <label class="block mb-2 text-sm font-medium text-gray-900">Deskripsi</label>
                    <textarea name="deskripsi" id="edit_deskripsi" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300" required></textarea>
                </div>
                <div class="mb-4">
                    <label class="block mb-2 text-sm font-medium text-gray-900">Icon / Gambar Baru (Opsional)</label>
                    <input type="file" name="icon" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 file:mr-4 file:py-2 file:px-4 file:border-0 file:bg-[#254261] file:text-white">
                </div>
                <div class="flex justify-end gap-3 mt-6 border-t pt-4">
                    <button type="button" onclick="closeModal('editModal')" class="px-4 py-2 text-sm text-gray-700 bg-gray-100 rounded-lg hover:bg-gray-200">Batal</button>
                    <button type="submit" class="px-4 py-2 text-sm text-white bg-[#254261] rounded-lg hover:bg-[#1a2f45]">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('scripts')
<script>
    function openModal(id) { document.getElementById(id).classList.remove('hidden'); }
    function closeModal(id) { document.getElementById(id).classList.add('hidden'); }

    function openEditModal(id, nama, deskripsi) {
        document.getElementById('edit_nama').value = nama;
        document.getElementById('edit_deskripsi').value = deskripsi;
        document.getElementById('editForm').action = '/admin/layanan/' + id;
        openModal('editModal');
    }
</script>
@endpush
@endsection
