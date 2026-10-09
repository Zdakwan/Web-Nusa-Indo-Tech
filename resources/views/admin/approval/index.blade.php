@extends('layouts.admin')

@section('title', 'Approval Konsultasi')

@section('content')
<div class="mb-6 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
    <div>
        <h1 class="text-2xl font-bold text-gray-800">Approval Konsultasi</h1>
        <p class="text-sm text-gray-500 mt-1">Kelola permintaan jadwal konsultasi dari klien.</p>
    </div>
</div>

@if(session('success'))
    <div class="mb-6 px-4 py-3 bg-green-50 border-l-4 border-green-500 text-green-700 rounded shadow-sm flex items-center justify-between">
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
                    <th class="px-6 py-4 text-sm font-semibold text-gray-600">Nama Klien / Perusahaan</th>
                    <th class="px-6 py-4 text-sm font-semibold text-gray-600">Tanggal Pengajuan</th>
                    <th class="px-6 py-4 text-sm font-semibold text-gray-600">Waktu</th>
                    <th class="px-6 py-4 text-sm font-semibold text-gray-600 text-center">Status</th>
                    <th class="px-6 py-4 text-sm font-semibold text-gray-600 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse ($approvals as $item)
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="px-6 py-4">
                        <p class="text-sm font-medium text-gray-800">{{ $item->client->name ?? 'Klien Terhapus' }}</p>
                        <p class="text-xs text-gray-500">{{ $item->client->company ?? '-' }}</p>
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-600">
                        {{ \Carbon\Carbon::parse($item->tanggal_konsultasi)->translatedFormat('d F Y') }}
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-600">
                        {{ \Carbon\Carbon::parse($item->waktu_konsultasi)->format('H:i') }} WIB
                    </td>
                    <td class="px-6 py-4 text-center">
                        @if ($item->status == 'pending')
                            <span class="px-3 py-1 text-xs font-medium text-yellow-700 bg-yellow-100 rounded-full">Menunggu</span>
                        @elseif ($item->status == 'approved')
                            <span class="px-3 py-1 text-xs font-medium text-blue-700 bg-blue-100 rounded-full">Diproses</span>
                        @elseif ($item->status == 'completed')
                            <span class="px-3 py-1 text-xs font-medium text-green-700 bg-green-100 rounded-full">Selesai</span>
                        @else
                            <span class="px-3 py-1 text-xs font-medium text-red-700 bg-red-100 rounded-full">Ditolak</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 text-center space-x-2">
                        @if ($item->status == 'pending')
                            <button onclick="openApprovalModal({{ $item->id }}, '{{ $item->client->name ?? '' }}')" class="text-blue-600 hover:text-blue-800 transition-colors" title="Setujui/Proses">
                                <i class="fas fa-check-circle text-lg"></i>
                            </button>
                            <form action="{{ route('admin.approval.updateStatus', $item->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Tolak permintaan konsultasi ini?')">
                                @csrf @method('PUT')
                                <input type="hidden" name="status" value="rejected">
                                <button type="submit" class="text-red-500 hover:text-red-700 transition-colors" title="Tolak">
                                    <i class="fas fa-times-circle text-lg"></i>
                                </button>
                            </form>
                        @else
                            <span class="text-gray-400 text-sm"><i class="fas fa-lock"></i> Tersimpan</span>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-6 py-12 text-center text-gray-500">
                        <div class="flex flex-col items-center justify-center">
                            <i class="fas fa-inbox text-5xl text-gray-300 mb-4"></i>
                            <p class="text-base font-medium text-gray-600">Belum ada permintaan konsultasi.</p>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="px-6 py-4 border-t border-gray-100 bg-gray-50/50">
        {{ $approvals->links() }}
    </div>
</div>

<!-- Modal Approval -->
<div id="approvalModal" class="fixed inset-0 z-50 hidden bg-gray-900/50 backdrop-blur-sm flex items-center justify-center">
    <div class="relative bg-white rounded-xl shadow-lg w-full max-w-lg p-6">
        <div class="flex justify-between items-center mb-4 border-b pb-3">
            <h3 class="text-xl font-bold text-gray-800">Setujui Konsultasi</h3>
            <button onclick="closeApprovalModal()" class="text-gray-400 hover:text-gray-900"><i class="fas fa-times text-lg"></i></button>
        </div>
        <form id="approvalForm" method="POST">
            @csrf
            @method('PUT')
            <input type="hidden" name="status" value="approved">

            <p class="text-sm text-gray-600 mb-4">Kirimkan link meeting (Google Meet/Zoom) untuk klien <strong id="clientNameModal"></strong>.</p>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-2">Link Meeting URL</label>
                <input type="url" name="link_meeting" class="w-full bg-gray-50 border border-gray-300 rounded-lg p-2.5 focus:ring-[#254261] focus:border-[#254261]" placeholder="https://meet.google.com/xxx-xxxx-xxx" required>
            </div>

            <div class="flex justify-end gap-3 mt-6">
                <button type="button" onclick="closeApprovalModal()" class="px-4 py-2 text-gray-700 bg-gray-100 rounded-lg hover:bg-gray-200">Batal</button>
                <button type="submit" class="px-4 py-2 text-white bg-[#254261] hover:bg-[#1a2f45] rounded-lg">Kirim & Setujui</button>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
    function openApprovalModal(id, clientName) {
        document.getElementById('approvalModal').classList.remove('hidden');
        document.getElementById('clientNameModal').innerText = clientName;
        // Set action URL form dinamis
        document.getElementById('approvalForm').action = `/admin/approval/${id}/status`;
    }

    function closeApprovalModal() {
        document.getElementById('approvalModal').classList.add('hidden');
    }
</script>
@endpush
@endsection
