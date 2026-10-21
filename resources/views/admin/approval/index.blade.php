@extends('layouts.admin')

@section('title', 'Approval Konsultasi - Nusa Indo Technology')

@section('content')
    <div class="mb-6">
        <h1 class="text-3xl font-extrabold text-[#254261]">Approval Konsultasi</h1>
        <p class="text-gray-500 mt-1">Kelola permintaan jadwal konsultasi dari klien dan berikan tanggapan.</p>
    </div>

    <!-- Alert Sukses -->
    @if(session('success'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded mb-6 shadow-sm">
            <p class="font-bold">Berhasil!</p>
            <p>{{ session('success') }}</p>
        </div>
    @endif

    <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left">
                <thead class="bg-gray-50 text-gray-600 font-bold border-b border-gray-200">
                    <tr>
                        <th class="py-4 px-6">Nama Klien / Perusahaan</th>
                        <th class="py-4 px-6">Topik / Permintaan</th>
                        <th class="py-4 px-6">Tanggal Pengajuan</th>
                        <th class="py-4 px-6 text-center">Status</th>
                        <th class="py-4 px-6 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($konsultasi ?? [] as $item)
                        <tr class="border-b border-gray-100 hover:bg-gray-50 transition-colors">
                            <td class="py-4 px-6 font-medium text-gray-800">{{ $item->client->name ?? 'Klien' }}</td>
                            <td class="py-4 px-6">{{ \Illuminate\Support\Str::limit($item->catatan_klien ?? 'Konsultasi Umum', 40) }}</td>
                            <td class="py-4 px-6">{{ $item->created_at ? $item->created_at->format('d M Y') : '-' }}</td>
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
                                <!-- Tombol Buka Modal -->
                                <button onclick="openModal('modal-{{ $item->id }}')" class="bg-[#f5b73e] hover:bg-[#e0a430] text-[#0f172a] font-bold px-4 py-2 rounded-lg transition-colors text-xs">
                                    Tanggapi
                                </button>
                            </td>
                        </tr>

                        <!-- Modal Tanggapan Khusus untuk Item Ini -->
                        <div id="modal-{{ $item->id }}" class="fixed inset-0 z-50 hidden bg-black/50 flex items-center justify-center backdrop-blur-sm transition-opacity">
                            <div class="bg-white rounded-2xl shadow-2xl w-full max-w-lg overflow-hidden transform scale-95 transition-transform">
                                <div class="bg-[#254261] px-6 py-4 flex justify-between items-center text-white">
                                    <h3 class="font-bold text-lg">Tanggapan Konsultasi</h3>
                                    <button onclick="closeModal('modal-{{ $item->id }}')" class="text-gray-300 hover:text-white"><i class="fas fa-xmark text-xl"></i></button>
                                </div>

                                <form action="{{ route('admin.approval.updateStatus', $item->id) }}" method="POST" class="p-6">
                                    @csrf
                                    @method('PUT')

                                    <div class="mb-5">
                                        <label class="block text-sm font-bold text-gray-700 mb-2">Ubah Status</label>
                                        <select name="status" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-[#f5b73e] focus:border-[#f5b73e]" required>
                                            <option value="approved" {{ $item->status == 'approved' ? 'selected' : '' }}>Setujui (Approved)</option>
                                            <option value="rejected" {{ $item->status == 'rejected' ? 'selected' : '' }}>Tolak (Rejected)</option>
                                            <option value="completed" {{ $item->status == 'completed' ? 'selected' : '' }}>Selesai (Completed)</option>
                                        </select>
                                    </div>

                                    <div class="mb-5">
                                        <label class="block text-sm font-bold text-gray-700 mb-2">Pesan Balasan / Notifikasi ke Klien</label>
                                        <textarea name="pesan_admin" rows="4" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-[#f5b73e] focus:border-[#f5b73e] p-3 text-sm" placeholder="Tuliskan link meeting Zoom, instruksi lanjutan, atau alasan penolakan di sini..."></textarea>
                                        <p class="text-xs text-gray-500 mt-2">*Pesan ini akan muncul di dashboard atau notifikasi klien.</p>
                                    </div>

                                    <div class="flex justify-end gap-3 mt-8">
                                        <button type="button" onclick="closeModal('modal-{{ $item->id }}')" class="px-5 py-2.5 bg-gray-100 text-gray-700 font-bold rounded-lg hover:bg-gray-200 transition-colors">Batal</button>
                                        <button type="submit" class="px-5 py-2.5 bg-[#254261] text-white font-bold rounded-lg hover:bg-[#1a2f45] transition-colors">Kirim & Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    @empty
                        <tr>
                            <td colspan="5" class="py-16 text-center text-gray-500">
                                <div class="flex flex-col items-center justify-center">
                                    <i class="fa-solid fa-inbox text-5xl text-gray-300 mb-4"></i>
                                    <p class="font-medium">Belum ada permintaan konsultasi saat ini.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Script Kontrol Modal -->
    <script>
        function openModal(id) {
            const modal = document.getElementById(id);
            modal.classList.remove('hidden');
            setTimeout(() => { modal.firstElementChild.classList.remove('scale-95'); }, 10);
        }
        function closeModal(id) {
            const modal = document.getElementById(id);
            modal.firstElementChild.classList.add('scale-95');
            setTimeout(() => { modal.classList.add('hidden'); }, 200);
        }
    </script>
@endsection
