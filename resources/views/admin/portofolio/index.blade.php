@extends('layouts.admin')

@section('title', 'Portofolio Proyek')

@section('content')
<div class="mb-6 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
    <div>
        <h1 class="text-2xl font-bold text-gray-800">Portofolio Proyek</h1>
        <p class="text-sm text-gray-500 mt-1">Kelola data riwayat proyek IT Nusa Indo Tech.</p>
    </div>
    <button type="button" onclick="openModal('tambahModal')" class="inline-flex items-center gap-2 px-4 py-2 bg-[#254261] hover:bg-[#1a2f45] text-white text-sm font-medium rounded-lg shadow-sm">
        <i class="fas fa-plus"></i> Tambah Portofolio
    </button>
</div>

@if(session('success'))
    <div class="mb-6 px-4 py-3 bg-green-50 border-l-4 border-green-500 text-green-700 rounded shadow-sm flex justify-between">
        <span><i class="fas fa-check-circle mr-2"></i>{{ session('success') }}</span>
        <button onclick="this.parentElement.style.display='none'"><i class="fas fa-times"></i></button>
    </div>
@endif

<div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
    <table class="w-full text-left border-collapse">
        <thead>
            <tr class="bg-gray-50 border-b border-gray-100">
                <th class="px-6 py-4 text-sm text-gray-600 w-24 text-center">Gambar</th>
                <th class="px-6 py-4 text-sm text-gray-600">Judul Proyek</th>
                <th class="px-6 py-4 text-sm text-gray-600">Klien</th>
                <th class="px-6 py-4 text-sm text-gray-600">Tahun & Kategori</th>
                <th class="px-6 py-4 text-sm text-gray-600 text-center">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
            @forelse($portofolio as $item)
            <tr class="hover:bg-gray-50">
                <td class="px-6 py-4 text-center">
                    @if($item->gambar)
                        <img src="{{ asset('storage/' . $item->gambar) }}" class="w-16 h-12 object-cover rounded shadow-sm mx-auto">
                    @else
                        <div class="w-16 h-12 bg-gray-100 rounded flex items-center justify-center mx-auto text-gray-400"><i class="fas fa-image"></i></div>
                    @endif
                </td>
                <td class="px-6 py-4 text-sm text-gray-800 font-medium">{{ $item->judul }}</td>
                <td class="px-6 py-4 text-sm text-gray-600">{{ $item->nama_klien ?? '-' }}</td>
                <td class="px-6 py-4">
                    <p class="text-sm text-gray-800">{{ $item->tahun }}</p>
                    <p class="text-xs text-gray-500">{{ $item->kategori }}</p>
                </td>
                <td class="px-6 py-4 text-center space-x-2">
                    <form action="{{ route('admin.portofolio.destroy', $item->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Hapus portofolio ini?')">
                        @csrf @method('DELETE')
                        <button type="submit" class="text-red-500 hover:text-red-700" title="Hapus"><i class="fas fa-trash-alt text-lg"></i></button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="px-6 py-12 text-center text-gray-500">Belum ada portofolio.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
    <div class="px-6 py-4 bg-gray-50/50 border-t">{{ $portofolio->links() }}</div>
</div>

<!-- Modal Tambah Portofolio -->
<div id="tambahModal" class="fixed inset-0 z-50 hidden bg-gray-900/50 backdrop-blur-sm flex items-center justify-center p-4">
    <div class="bg-white rounded-xl shadow-lg w-full max-w-2xl max-h-[90vh] overflow-y-auto">
        <div class="flex justify-between p-4 border-b">
            <h3 class="text-xl font-semibold">Tambah Portofolio</h3>
            <button onclick="closeModal('tambahModal')"><i class="fas fa-times"></i></button>
        </div>
        <form action="{{ route('admin.portofolio.store') }}" method="POST" enctype="multipart/form-data" class="p-4">
            @csrf
            <div class="grid grid-cols-2 gap-4 mb-4">
                <div class="col-span-2"><label class="block text-sm mb-1">Judul Proyek</label><input type="text" name="judul" class="w-full border rounded-lg p-2" required></div>
                <div><label class="block text-sm mb-1">Nama Klien</label><input type="text" name="nama_klien" class="w-full border rounded-lg p-2"></div>
                <div><label class="block text-sm mb-1">Tahun</label><input type="text" name="tahun" class="w-full border rounded-lg p-2" placeholder="2026"></div>
                <div><label class="block text-sm mb-1">Kategori</label><input type="text" name="kategori" class="w-full border rounded-lg p-2"></div>
                <div><label class="block text-sm mb-1">Link Proyek</label><input type="url" name="link_project" class="w-full border rounded-lg p-2"></div>
                <div class="col-span-2"><label class="block text-sm mb-1">Deskripsi</label><textarea name="deskripsi" rows="3" class="w-full border rounded-lg p-2" required></textarea></div>
                <div class="col-span-2"><label class="block text-sm mb-1">Gambar</label><input type="file" name="gambar" class="w-full border rounded-lg p-1"></div>
            </div>
            <div class="flex justify-end gap-2 border-t pt-4">
                <button type="button" onclick="closeModal('tambahModal')" class="px-4 py-2 border rounded-lg">Batal</button>
                <button type="submit" class="px-4 py-2 bg-[#254261] text-white rounded-lg">Simpan</button>
            </div>
        </form>
    </div>
</div>

<script>
    function openModal(id) { document.getElementById(id).classList.remove('hidden'); }
    function closeModal(id) { document.getElementById(id).classList.add('hidden'); }
</script>
@endsection
