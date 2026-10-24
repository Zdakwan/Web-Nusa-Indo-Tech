@extends('layouts.admin')

@section('title', 'Pelatihan IT (LMS)')

@section('content')
<div class="mb-6 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
    <div>
        <h1 class="text-2xl font-bold text-gray-800">Kelola Pelatihan</h1>
        <p class="text-sm text-gray-500 mt-1">Manajemen data Pelatihan IT (LMS) Nusa Indo Tech.</p>
    </div>

    <!-- Tombol Tambah -->
    <button type="button" onclick="openModal('tambahModal')" class="inline-flex items-center gap-2 px-4 py-2 bg-[#254261] hover:bg-[#1a2f45] text-white text-sm font-medium rounded-lg transition-colors shadow-sm">
        <i class="fas fa-plus"></i> Tambah Pelatihan
    </button>
</div>

<!-- Notifikasi Alert -->
@if(session('success'))
    <div class="mb-6 px-4 py-3 bg-green-50 border-l-4 border-green-500 text-green-700 rounded shadow-sm flex items-center justify-between" role="alert">
        <div class="flex items-center gap-2">
            <i class="fas fa-check-circle"></i>
            <span class="block sm:inline font-medium">{{ session('success') }}</span>
        </div>
        <button type="button" class="text-green-700 hover:text-green-900" onclick="this.parentElement.style.display='none'">
            <i class="fas fa-times"></i>
        </button>
    </div>
@endif

<!-- Tabel Data -->
<div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-50 border-b border-gray-100">
                    <th class="px-6 py-4 text-sm font-semibold text-gray-600 w-16 text-center">No</th>
                    <th class="px-6 py-4 text-sm font-semibold text-gray-600 w-24 text-center">Gambar</th>
                    <th class="px-6 py-4 text-sm font-semibold text-gray-600">Judul</th>
                    <th class="px-6 py-4 text-sm font-semibold text-gray-600">Kategori</th>
                    <th class="px-6 py-4 text-sm font-semibold text-gray-600">Harga</th>
                    <th class="px-6 py-4 text-sm font-semibold text-gray-600 w-32 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">

                @forelse($pelatihan as $key => $item)
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="px-6 py-4 text-sm text-gray-600 text-center">{{ $pelatihan->firstItem() + $key }}</td>
                    <td class="px-6 py-4 text-center">
                        @if($item->gambar)
                            <img src="{{ asset('storage/' . $item->gambar) }}" alt="Gambar" class="w-12 h-12 object-cover rounded shadow-sm mx-auto">
                        @else
                            <div class="w-12 h-12 bg-gray-100 rounded flex items-center justify-center mx-auto text-gray-400">
                                <i class="fas fa-image"></i>
                            </div>
                        @endif
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-800 font-medium">{{ $item->judul }}</td>
                    <td class="px-6 py-4 text-sm text-gray-600">
                        <span class="px-2 py-1 bg-gray-100 rounded text-xs">{{ $item->kategori }}</span>
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-800 font-semibold">Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
                    <td class="px-6 py-4 text-center space-x-2 whitespace-nowrap">
                        <!-- Tombol Edit -->
                        <button type="button"
                            onclick="openEditModal(this)"
                            data-id="{{ $item->id }}"
                            data-judul="{{ $item->judul }}"
                            data-kategori="{{ $item->kategori }}"
                            data-harga="{{ $item->harga }}"
                            data-deskripsi="{{ $item->deskripsi }}"
                            class="text-blue-500 hover:text-blue-700 transition-colors" title="Edit">
                            <i class="fas fa-edit text-lg"></i>
                        </button>
                        <!-- Tombol Hapus -->
                        <form action="{{ route('admin.pelatihan.destroy', $item->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Hapus pelatihan ini?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-700 transition-colors" title="Hapus">
                                <i class="fas fa-trash-alt text-lg"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <!-- State Kosong -->
                <tr>
                    <td colspan="6" class="px-6 py-12 text-center text-gray-500">
                        <div class="flex flex-col items-center justify-center">
                            <i class="fas fa-graduation-cap text-5xl text-gray-300 mb-4"></i>
                            <p class="text-base font-medium text-gray-600">Belum ada data pelatihan.</p>
                            <p class="text-sm text-gray-400 mt-1">Silakan klik tombol "Tambah Pelatihan" untuk memasukkan data baru.</p>
                        </div>
                    </td>
                </tr>
                @endforelse

            </tbody>
        </table>
    </div>

    <div class="px-6 py-4 border-t border-gray-100 bg-gray-50/50 flex justify-between items-center">
        <p class="text-sm text-gray-500">Menampilkan data pelatihan.</p>
        {{ $pelatihan->links() }}
    </div>
</div>

<!-- Modal Tambah Pelatihan -->
<div id="tambahModal" tabindex="-1" aria-hidden="true" class="fixed inset-0 z-50 hidden bg-gray-900/50 backdrop-blur-sm overflow-y-auto w-full h-full flex items-center justify-center transition-opacity duration-300">
    <div class="relative p-4 w-full max-w-2xl">
        <div class="relative bg-white rounded-xl shadow-lg">
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                <h3 class="text-xl font-semibold text-gray-900">Tambah Pelatihan Baru</h3>
                <button type="button" onclick="closeModal('tambahModal')" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center">
                    <i class="fas fa-times text-lg"></i>
                </button>
            </div>

            <form action="{{ route('admin.pelatihan.store') }}" method="POST" enctype="multipart/form-data" class="p-4 md:p-5">
                @csrf
                <div class="grid gap-4 mb-4 grid-cols-1">
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">Judul Pelatihan</label>
                        <input type="text" name="judul" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#254261] focus:border-[#254261] block w-full p-2.5" required>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900">Kategori (Layanan Terkait)</label>
                            <select name="kategori" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#254261] focus:border-[#254261] block w-full p-2.5" required>
                                <option value="">-- Pilih Layanan --</option>
                                @foreach($layanan as $item)
                                    <option value="{{ $item->nama_layanan }}">{{ $item->nama_layanan }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900">Harga (Rp)</label>
                            <!-- DITAMBAHKAN min="0" dan placeholder -->
                            <input type="number" name="harga" min="0" placeholder="Contoh: 150000" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#254261] focus:border-[#254261] block w-full p-2.5" required>
                        </div>
                    </div>
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">Deskripsi</label>
                        <textarea name="deskripsi" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-[#254261] focus:border-[#254261]" required></textarea>
                    </div>
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">Gambar</label>
                        <input type="file" name="gambar" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 file:mr-4 file:py-2 file:px-4 file:rounded-l-lg file:border-0 file:bg-[#254261] file:text-white hover:file:bg-[#1a2f45]">
                    </div>
                </div>
                <div class="flex items-center justify-end gap-3 mt-6 border-t pt-4">
                    <button type="button" onclick="closeModal('tambahModal')" class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50">Batal</button>
                    <button type="submit" class="px-4 py-2 text-sm font-medium text-white bg-[#254261] rounded-lg hover:bg-[#1a2f45]">Simpan Pelatihan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Edit Pelatihan -->
<div id="editModal" tabindex="-1" aria-hidden="true" class="fixed inset-0 z-50 hidden bg-gray-900/50 backdrop-blur-sm overflow-y-auto w-full h-full flex items-center justify-center transition-opacity duration-300">
    <div class="relative p-4 w-full max-w-2xl">
        <div class="relative bg-white rounded-xl shadow-lg">
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                <h3 class="text-xl font-semibold text-gray-900">Edit Pelatihan</h3>
                <button type="button" onclick="closeModal('editModal')" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center">
                    <i class="fas fa-times text-lg"></i>
                </button>
            </div>

            <form id="editForm" method="POST" enctype="multipart/form-data" class="p-4 md:p-5">
                @csrf
                @method('PUT')
                <div class="grid gap-4 mb-4 grid-cols-1">
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">Judul Pelatihan</label>
                        <input type="text" id="edit_judul" name="judul" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#254261] focus:border-[#254261] block w-full p-2.5" required>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900">Kategori (Layanan Terkait)</label>
                            <select id="edit_kategori" name="kategori" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#254261] focus:border-[#254261] block w-full p-2.5" required>
                                <option value="">-- Pilih Layanan --</option>
                                @foreach($layanan as $item)
                                    <option value="{{ $item->nama_layanan }}">{{ $item->nama_layanan }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900">Harga (Rp)</label>
                            <!-- DITAMBAHKAN min="0" dan placeholder -->
                            <input type="number" id="edit_harga" name="harga" min="0" placeholder="Contoh: 150000" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#254261] focus:border-[#254261] block w-full p-2.5" required>
                        </div>
                    </div>
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">Deskripsi</label>
                        <textarea id="edit_deskripsi" name="deskripsi" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-[#254261] focus:border-[#254261]" required></textarea>
                    </div>
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">Gambar Baru (Opsional)</label>
                        <input type="file" name="gambar" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 file:mr-4 file:py-2 file:px-4 file:rounded-l-lg file:border-0 file:bg-[#254261] file:text-white">
                    </div>
                </div>
                <div class="flex items-center justify-end gap-3 mt-6 border-t pt-4">
                    <button type="button" onclick="closeModal('editModal')" class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50">Batal</button>
                    <button type="submit" class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700">Perbarui Data</button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('scripts')
<script>
    function openModal(modalId) {
        const modal = document.getElementById(modalId);
        modal.classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    }

    function closeModal(modalId) {
        const modal = document.getElementById(modalId);
        modal.classList.add('hidden');
        document.body.style.overflow = 'auto';
    }

    function openEditModal(btn) {
        document.getElementById('edit_judul').value = btn.getAttribute('data-judul') || '';
        document.getElementById('edit_kategori').value = btn.getAttribute('data-kategori') || '';
        document.getElementById('edit_harga').value = btn.getAttribute('data-harga') || '';
        document.getElementById('edit_deskripsi').value = btn.getAttribute('data-deskripsi') || '';

        document.getElementById('editForm').action = '/admin/pelatihan/' + btn.getAttribute('data-id');
        openModal('editModal');
    }

    window.onclick = function(event) {
        if (event.target == document.getElementById('tambahModal')) closeModal('tambahModal');
        if (event.target == document.getElementById('editModal')) closeModal('editModal');
    }
</script>
@endpush
@endsection
