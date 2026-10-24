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
                <th class="px-6 py-4 text-sm text-gray-600 text-center">Rating</th>
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
                <td class="px-6 py-4">
                    <p class="text-sm text-gray-800 font-medium">{{ $item->judul }}</p>
                    <p class="text-xs text-gray-500">{{ $item->tahun }} • {{ $item->kategori }}</p>
                </td>
                <td class="px-6 py-4 text-sm text-gray-600">{{ $item->nama_klien ?? '-' }}</td>
                <td class="px-6 py-4 text-center text-sm font-bold text-[#f5b73e]">
                    <i class="fas fa-star text-xs"></i> {{ number_format($item->rating ?? 0, 1) }}
                </td>
                <td class="px-6 py-4 text-center space-x-2 whitespace-nowrap">
                    <!-- Tombol Edit menggunakan data attributes -->
                    <button type="button"
                        onclick="openEditModal(this)"
                        data-id="{{ $item->id }}"
                        data-judul="{{ $item->judul }}"
                        data-klien="{{ $item->nama_klien }}"
                        data-tahun="{{ $item->tahun }}"
                        data-kategori="{{ $item->kategori }}"
                        data-link="{{ $item->link_project }}"
                        data-deskripsi="{{ $item->deskripsi }}"
                        data-layanan="{{ $item->layanan_id }}"
                        data-rating="{{ $item->rating }}"
                        data-fitur="{{ $item->fitur_utama }}"
                        data-teknologi="{{ $item->teknologi }}"
                        class="text-blue-500 hover:text-blue-700" title="Edit">
                        <i class="fas fa-edit text-lg"></i>
                    </button>
                    <!-- Tombol Hapus -->
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
            <button type="button" onclick="closeModal('tambahModal')"><i class="fas fa-times"></i></button>
        </div>
        <form action="{{ route('admin.portofolio.store') }}" method="POST" enctype="multipart/form-data" class="p-4">
            @csrf
            <div class="grid grid-cols-2 gap-4 mb-4">
                <div class="col-span-2"><label class="block text-sm mb-1">Judul Proyek</label><input type="text" name="judul" class="w-full border rounded-lg p-2" required></div>

                <div>
                    <label class="block text-sm mb-1">Layanan Terkait</label>
                    <select name="layanan_id" class="w-full border rounded-lg p-2" required>
                        <option value="">-- Pilih Layanan --</option>
                        @foreach($layanan as $item)
                            <option value="{{ $item->id }}">{{ $item->nama_layanan }}</option>
                        @endforeach
                    </select>
                </div>
                <div><label class="block text-sm mb-1">Rating (1-5)</label><input type="number" name="rating" step="0.1" min="1" max="5" class="w-full border rounded-lg p-2" placeholder="Contoh: 4.5" required></div>

                <div><label class="block text-sm mb-1">Nama Klien</label><input type="text" name="nama_klien" class="w-full border rounded-lg p-2"></div>
                <div><label class="block text-sm mb-1">Tahun</label><input type="text" name="tahun" class="w-full border rounded-lg p-2" placeholder="2026"></div>
                <div><label class="block text-sm mb-1">Kategori (Label Card)</label><input type="text" name="kategori" class="w-full border rounded-lg p-2" placeholder="Web App"></div>
                <div><label class="block text-sm mb-1">Link Proyek</label><input type="url" name="link_project" class="w-full border rounded-lg p-2"></div>

                <div>
                    <label class="block text-sm mb-1">Teknologi (Koma)</label>
                    <input type="text" name="teknologi" class="w-full border rounded-lg p-2" placeholder="Contoh: Laravel, PHP, MySQL">
                </div>
                <div class="col-span-2">
                    <label class="block text-sm mb-1">Fitur Utama (Pisahkan dg enter per baris)</label>
                    <textarea name="fitur_utama" rows="3" class="w-full border rounded-lg p-2" placeholder="Desain UI/UX Modern&#10;Responsif untuk semua perangkat"></textarea>
                </div>

                <div class="col-span-2"><label class="block text-sm mb-1">Deskripsi Proyek</label><textarea name="deskripsi" rows="3" class="w-full border rounded-lg p-2" required></textarea></div>
                <div class="col-span-2"><label class="block text-sm mb-1">Gambar</label><input type="file" name="gambar" class="w-full border rounded-lg p-1"></div>
            </div>
            <div class="flex justify-end gap-2 border-t pt-4">
                <button type="button" onclick="closeModal('tambahModal')" class="px-4 py-2 border rounded-lg hover:bg-gray-50">Batal</button>
                <button type="submit" class="px-4 py-2 bg-[#254261] hover:bg-[#1a2f45] text-white rounded-lg">Simpan Data</button>
            </div>
        </form>
    </div>
</div>

<!-- Modal Edit Portofolio -->
<div id="editModal" class="fixed inset-0 z-50 hidden bg-gray-900/50 backdrop-blur-sm flex items-center justify-center p-4">
    <div class="bg-white rounded-xl shadow-lg w-full max-w-2xl max-h-[90vh] overflow-y-auto">
        <div class="flex justify-between p-4 border-b">
            <h3 class="text-xl font-semibold">Edit Portofolio</h3>
            <button type="button" onclick="closeModal('editModal')"><i class="fas fa-times"></i></button>
        </div>
        <form id="editForm" method="POST" enctype="multipart/form-data" class="p-4">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-2 gap-4 mb-4">
                <div class="col-span-2"><label class="block text-sm mb-1">Judul Proyek</label><input type="text" id="edit_judul" name="judul" class="w-full border rounded-lg p-2" required></div>

                <div>
                    <label class="block text-sm mb-1">Layanan Terkait</label>
                    <select id="edit_layanan_id" name="layanan_id" class="w-full border rounded-lg p-2" required>
                        <option value="">-- Pilih Layanan --</option>
                        @foreach($layanan as $item)
                            <option value="{{ $item->id }}">{{ $item->nama_layanan }}</option>
                        @endforeach
                    </select>
                </div>
                <div><label class="block text-sm mb-1">Rating (1-5)</label><input type="number" id="edit_rating" name="rating" step="0.1" min="1" max="5" class="w-full border rounded-lg p-2" required></div>

                <div><label class="block text-sm mb-1">Nama Klien</label><input type="text" id="edit_nama_klien" name="nama_klien" class="w-full border rounded-lg p-2"></div>
                <div><label class="block text-sm mb-1">Tahun</label><input type="text" id="edit_tahun" name="tahun" class="w-full border rounded-lg p-2"></div>
                <div><label class="block text-sm mb-1">Kategori (Label Card)</label><input type="text" id="edit_kategori" name="kategori" class="w-full border rounded-lg p-2"></div>
                <div><label class="block text-sm mb-1">Link Proyek</label><input type="url" id="edit_link_project" name="link_project" class="w-full border rounded-lg p-2"></div>

                <div>
                    <label class="block text-sm mb-1">Teknologi (Koma)</label>
                    <input type="text" id="edit_teknologi" name="teknologi" class="w-full border rounded-lg p-2">
                </div>
                <div class="col-span-2">
                    <label class="block text-sm mb-1">Fitur Utama (Pisahkan dg enter per baris)</label>
                    <textarea id="edit_fitur_utama" name="fitur_utama" rows="3" class="w-full border rounded-lg p-2"></textarea>
                </div>

                <div class="col-span-2"><label class="block text-sm mb-1">Deskripsi Proyek</label><textarea id="edit_deskripsi" name="deskripsi" rows="3" class="w-full border rounded-lg p-2" required></textarea></div>
                <div class="col-span-2">
                    <label class="block text-sm mb-1">Gambar Baru (Opsional)</label>
                    <input type="file" name="gambar" class="w-full border rounded-lg p-1 text-sm text-gray-500">
                    <p class="text-xs text-gray-400 mt-1">Kosongkan jika tidak ingin mengubah gambar.</p>
                </div>
            </div>
            <div class="flex justify-end gap-2 border-t pt-4">
                <button type="button" onclick="closeModal('editModal')" class="px-4 py-2 border rounded-lg hover:bg-gray-50">Batal</button>
                <button type="submit" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg">Perbarui Data</button>
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

    function openEditModal(btn) {
        // Ambil data dari atribut tombol dan masukkan ke input form
        document.getElementById('edit_judul').value = btn.getAttribute('data-judul') || '';
        document.getElementById('edit_nama_klien').value = btn.getAttribute('data-klien') || '';
        document.getElementById('edit_tahun').value = btn.getAttribute('data-tahun') || '';
        document.getElementById('edit_kategori').value = btn.getAttribute('data-kategori') || '';
        document.getElementById('edit_link_project').value = btn.getAttribute('data-link') || '';
        document.getElementById('edit_deskripsi').value = btn.getAttribute('data-deskripsi') || '';
        document.getElementById('edit_layanan_id').value = btn.getAttribute('data-layanan') || '';
        document.getElementById('edit_rating').value = btn.getAttribute('data-rating') || '';

        // Form fitur & teknologi
        document.getElementById('edit_fitur_utama').value = btn.getAttribute('data-fitur') || '';
        document.getElementById('edit_teknologi').value = btn.getAttribute('data-teknologi') || '';

        // Set action URL form update
        document.getElementById('editForm').action = '/admin/portofolio/' + btn.getAttribute('data-id');

        // Tampilkan modal
        openModal('editModal');
    }
</script>
@endsection
