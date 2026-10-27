@extends('layouts.admin')
@section('title', 'Ensiklopedia IT')

@section('content')
<div class="mb-6 flex justify-between items-center">
    <div>
        <h1 class="text-2xl font-bold text-gray-800">Ensiklopedia IT</h1>
        <p class="text-sm text-gray-500">Kelola artikel & wawasan IT.</p>
    </div>
    <button onclick="openModal('tambahModal')" class="px-4 py-2 bg-[#254261] text-white rounded-lg hover:bg-[#1a2f45] transition-colors"><i class="fas fa-plus mr-1"></i> Tambah Artikel</button>
</div>

@if(session('success'))
    <div class="mb-4 p-3 bg-green-50 text-green-700 rounded border border-green-200">{{ session('success') }}</div>
@endif

<div class="bg-white rounded-xl shadow-sm border overflow-hidden">
    <table class="w-full text-left border-collapse">
        <thead class="bg-gray-50 border-b">
            <tr>
                <th class="px-6 py-4 text-sm w-24 text-center">Gambar</th>
                <th class="px-6 py-4 text-sm">Judul</th>
                <th class="px-6 py-4 text-sm">Kategori (Layanan)</th>
                <th class="px-6 py-4 text-sm text-center w-32">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
            @forelse($ensiklopedia as $item)
            <tr class="hover:bg-gray-50">
                <td class="px-6 py-4 text-center">
                    @if($item->gambar)
                        <img src="{{ asset('storage/'.$item->gambar) }}" class="w-16 h-12 object-cover rounded mx-auto border shadow-sm">
                    @else
                        <div class="w-16 h-12 bg-gray-100 text-gray-400 flex items-center justify-center rounded mx-auto border text-xs">No Img</div>
                    @endif
                </td>
                <td class="px-6 py-4 text-sm font-medium">{{ $item->judul }}</td>
                <td class="px-6 py-4 text-sm"><span class="px-2.5 py-1 bg-blue-50 text-blue-700 text-xs font-medium rounded-full">{{ $item->kategori }}</span></td>
                <td class="px-6 py-4 text-center space-x-1 flex justify-center">
                    <!-- Tombol Edit -->
                    <button type="button"
                            data-id="{{ $item->id }}"
                            data-judul="{{ $item->judul }}"
                            data-kategori="{{ $item->kategori }}"
                            data-konten="{{ $item->konten }}"
                            onclick="openEditModal(this)"
                            class="text-blue-500 hover:text-blue-700 p-1.5 bg-blue-50 rounded hover:bg-blue-100 transition-colors">
                        <i class="fas fa-edit"></i>
                    </button>

                    <!-- Tombol Hapus -->
                    <form action="{{ route('admin.ensiklopedia.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus artikel ini?')">
                        @csrf @method('DELETE')
                        <button type="submit" class="text-red-500 hover:text-red-700 p-1.5 bg-red-50 rounded hover:bg-red-100 transition-colors"><i class="fas fa-trash-alt"></i></button>
                    </form>
                </td>
            </tr>
            @empty
            <tr><td colspan="4" class="px-6 py-8 text-center text-gray-500 bg-gray-50">Belum ada artikel ensiklopedia yang ditambahkan.</td></tr>
            @endforelse
        </tbody>
    </table>

    @if($ensiklopedia->hasPages())
        <div class="px-6 py-4 border-t border-gray-100">
            {{ $ensiklopedia->links() }}
        </div>
    @endif
</div>

<!-- Modal Tambah -->
<div id="tambahModal" class="fixed inset-0 z-50 hidden bg-gray-900/50 flex items-center justify-center p-4">
    <div class="bg-white rounded-xl shadow-xl w-full max-w-2xl transform transition-all">
        <div class="flex justify-between p-5 border-b border-gray-100">
            <h3 class="text-lg font-bold text-gray-800"><i class="fas fa-book-open text-blue-600 mr-2"></i> Tambah Artikel</h3>
            <button onclick="closeModal('tambahModal')" class="text-gray-400 hover:text-gray-600 focus:outline-none"><i class="fas fa-times text-xl"></i></button>
        </div>
        <form action="{{ route('admin.ensiklopedia.store') }}" method="POST" enctype="multipart/form-data" class="p-5">
            @csrf

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Judul Artikel <span class="text-red-500">*</span></label>
                <input type="text" name="judul" class="w-full border border-gray-300 p-2.5 rounded-lg focus:ring-2 focus:ring-blue-100 focus:border-blue-400 outline-none" placeholder="Masukkan judul artikel" required>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Kategori Layanan <span class="text-red-500">*</span></label>
                    <select name="kategori" class="w-full border border-gray-300 p-2.5 rounded-lg focus:ring-2 focus:ring-blue-100 focus:border-blue-400 outline-none bg-white" required>
                        <option value="" disabled selected>-- Pilih Layanan Terkait --</option>
                        @forelse($layanan as $item)
                            <option value="{{ $item->nama_layanan }}">{{ $item->nama_layanan }}</option>
                        @empty
                            <option value="" disabled>Belum ada data layanan di database</option>
                        @endforelse
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Gambar Thumbnail</label>
                    <input type="file" name="gambar" class="w-full border border-gray-300 p-1.5 rounded-lg bg-gray-50 file:mr-4 file:py-1 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 cursor-pointer">
                </div>
            </div>

            <div class="mb-5">
                <label class="block text-sm font-medium text-gray-700 mb-1">Konten Artikel <span class="text-red-500">*</span></label>
                <textarea name="konten" rows="6" class="w-full border border-gray-300 p-3 rounded-lg focus:ring-2 focus:ring-blue-100 focus:border-blue-400 outline-none" placeholder="Tulis isi artikel di sini..." required></textarea>
            </div>

            <div class="flex justify-end gap-3 pt-4 border-t border-gray-100">
                <button type="button" onclick="closeModal('tambahModal')" class="px-5 py-2.5 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 font-medium">Batal</button>
                <button type="submit" class="px-5 py-2.5 bg-[#254261] text-white rounded-lg hover:bg-[#1a2f45] font-medium shadow-sm"><i class="fas fa-save mr-1"></i> Simpan Artikel</button>
            </div>
        </form>
    </div>
</div>

<!-- Modal Edit -->
<div id="editModal" class="fixed inset-0 z-50 hidden bg-gray-900/50 flex items-center justify-center p-4">
    <div class="bg-white rounded-xl shadow-xl w-full max-w-2xl transform transition-all">
        <div class="flex justify-between p-5 border-b border-gray-100">
            <h3 class="text-lg font-bold text-gray-800"><i class="fas fa-edit text-blue-600 mr-2"></i> Edit Artikel</h3>
            <button onclick="closeModal('editModal')" class="text-gray-400 hover:text-gray-600 focus:outline-none"><i class="fas fa-times text-xl"></i></button>
        </div>
        <form id="editForm" method="POST" enctype="multipart/form-data" class="p-5">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Judul Artikel <span class="text-red-500">*</span></label>
                <input type="text" id="edit_judul" name="judul" class="w-full border border-gray-300 p-2.5 rounded-lg focus:ring-2 focus:ring-blue-100 focus:border-blue-400 outline-none" required>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Kategori Layanan <span class="text-red-500">*</span></label>
                    <select id="edit_kategori" name="kategori" class="w-full border border-gray-300 p-2.5 rounded-lg focus:ring-2 focus:ring-blue-100 focus:border-blue-400 outline-none bg-white" required>
                        <option value="" disabled>-- Pilih Layanan Terkait --</option>
                        @forelse($layanan as $item)
                            <option value="{{ $item->nama_layanan }}">{{ $item->nama_layanan }}</option>
                        @empty
                            <option value="" disabled>Belum ada data layanan</option>
                        @endforelse
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Update Gambar (Opsional)</label>
                    <input type="file" name="gambar" class="w-full border border-gray-300 p-1.5 rounded-lg bg-gray-50 file:mr-4 file:py-1 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 cursor-pointer">
                </div>
            </div>

            <div class="mb-5">
                <label class="block text-sm font-medium text-gray-700 mb-1">Konten Artikel <span class="text-red-500">*</span></label>
                <textarea id="edit_konten" name="konten" rows="6" class="w-full border border-gray-300 p-3 rounded-lg focus:ring-2 focus:ring-blue-100 focus:border-blue-400 outline-none" required></textarea>
            </div>

            <div class="flex justify-end gap-3 pt-4 border-t border-gray-100">
                <button type="button" onclick="closeModal('editModal')" class="px-5 py-2.5 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 font-medium">Batal</button>
                <button type="submit" class="px-5 py-2.5 bg-blue-600 text-white rounded-lg hover:bg-blue-700 font-medium shadow-sm"><i class="fas fa-save mr-1"></i> Perbarui Artikel</button>
            </div>
        </form>
    </div>
</div>

<script>
    function openModal(id) {
        document.getElementById(id).classList.remove('hidden');
    }
    function closeModal(id) {
        document.getElementById(id).classList.add('hidden');
    }
    function openEditModal(button) {
        // Ambil data dari atribut HTML tombol edit
        document.getElementById('edit_judul').value = button.getAttribute('data-judul');
        document.getElementById('edit_kategori').value = button.getAttribute('data-kategori');
        document.getElementById('edit_konten').value = button.getAttribute('data-konten');

        // Ubah action URL pada form secara dinamis
        let id = button.getAttribute('data-id');
        let baseUrl = "{{ url('admin/ensiklopedia') }}";
        document.getElementById('editForm').action = baseUrl + '/' + id;

        openModal('editModal');
    }
</script>
@endsection
