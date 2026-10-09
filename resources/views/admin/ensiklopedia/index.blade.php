@extends('layouts.admin')
@section('title', 'Ensiklopedia IT')
@section('content')
<div class="mb-6 flex justify-between items-center">
    <div>
        <h1 class="text-2xl font-bold text-gray-800">Ensiklopedia IT</h1>
        <p class="text-sm text-gray-500">Kelola artikel & wawasan IT.</p>
    </div>
    <button onclick="openModal('tambahModal')" class="px-4 py-2 bg-[#254261] text-white rounded-lg"><i class="fas fa-plus"></i> Tambah Artikel</button>
</div>

@if(session('success'))
    <div class="mb-4 p-3 bg-green-50 text-green-700 rounded">{{ session('success') }}</div>
@endif

<div class="bg-white rounded-xl shadow-sm border overflow-hidden">
    <table class="w-full text-left border-collapse">
        <thead class="bg-gray-50 border-b">
            <tr>
                <th class="px-6 py-4 text-sm w-24 text-center">Gambar</th>
                <th class="px-6 py-4 text-sm">Judul</th>
                <th class="px-6 py-4 text-sm">Kategori</th>
                <th class="px-6 py-4 text-sm text-center">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
            @forelse($ensiklopedia as $item)
            <tr class="hover:bg-gray-50">
                <td class="px-6 py-4 text-center">
                    @if($item->gambar) <img src="{{ asset('storage/'.$item->gambar) }}" class="w-16 h-12 object-cover rounded mx-auto"> @else - @endif
                </td>
                <td class="px-6 py-4 text-sm font-medium">{{ $item->judul }}</td>
                <td class="px-6 py-4 text-sm">{{ $item->kategori }}</td>
                <td class="px-6 py-4 text-center">
                    <form action="{{ route('admin.ensiklopedia.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Hapus artikel?')">
                        @csrf @method('DELETE')
                        <button class="text-red-500 hover:text-red-700"><i class="fas fa-trash-alt text-lg"></i></button>
                    </form>
                </td>
            </tr>
            @empty
            <tr><td colspan="4" class="px-6 py-8 text-center text-gray-500">Belum ada artikel.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>

<!-- Modal Tambah -->
<div id="tambahModal" class="fixed inset-0 z-50 hidden bg-gray-900/50 flex items-center justify-center p-4">
    <div class="bg-white rounded-xl shadow-lg w-full max-w-2xl">
        <div class="flex justify-between p-4 border-b">
            <h3 class="text-lg font-bold">Tambah Artikel</h3>
            <button onclick="closeModal('tambahModal')"><i class="fas fa-times"></i></button>
        </div>
        <form action="{{ route('admin.ensiklopedia.store') }}" method="POST" enctype="multipart/form-data" class="p-4">
            @csrf
            <div class="mb-3"><label class="block text-sm mb-1">Judul</label><input type="text" name="judul" class="w-full border p-2 rounded" required></div>
            <div class="mb-3"><label class="block text-sm mb-1">Kategori</label><input type="text" name="kategori" class="w-full border p-2 rounded" required></div>
            <div class="mb-3"><label class="block text-sm mb-1">Gambar</label><input type="file" name="gambar" class="w-full border p-1 rounded"></div>
            <div class="mb-3"><label class="block text-sm mb-1">Konten</label><textarea name="konten" rows="5" class="w-full border p-2 rounded" required></textarea></div>
            <div class="flex justify-end gap-2 mt-4">
                <button type="button" onclick="closeModal('tambahModal')" class="px-4 py-2 border rounded">Batal</button>
                <button type="submit" class="px-4 py-2 bg-[#254261] text-white rounded">Simpan</button>
            </div>
        </form>
    </div>
</div>
<script> function openModal(id) { document.getElementById(id).classList.remove('hidden'); } function closeModal(id) { document.getElementById(id).classList.add('hidden'); } </script>
@endsection
