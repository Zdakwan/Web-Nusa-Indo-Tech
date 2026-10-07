@extends('layouts.admin')

@section('title', 'Dashboard Super Admin')

@section('content')
    <h1 class="text-3xl font-extrabold mb-6">Ringkasan</h1>

    <!-- Kartu statistik -->
    <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-4 mb-6">
        @php
            $cards = [
                ['label' => 'Total Permintaan Konsultasi', 'value' => $stats['total'],    'icon' => 'fa-comment-dots'],
                ['label' => 'Menunggu',                    'value' => $stats['menunggu'], 'icon' => 'fa-clock'],
                ['label' => 'Diproses',                    'value' => $stats['diproses'], 'icon' => 'fa-gear'],
                ['label' => 'Selesai',                     'value' => $stats['selesai'],  'icon' => 'fa-circle-check'],
            ];
        @endphp

        @foreach($cards as $card)
            <div class="bg-white border border-gray-300 rounded-xl p-4 h-[170px] flex flex-col">
                <div class="flex items-start justify-between">
                    <h3 class="font-semibold text-[15px] leading-tight max-w-[170px]">{{ $card['label'] }}</h3>
                    <div class="w-9 h-9 rounded-lg bg-[#e6efff] flex items-center justify-center">
                        <i class="fas {{ $card['icon'] }} text-[#2563eb]"></i>
                    </div>
                </div>
                <div class="flex-1 flex items-center justify-center">
                    <span class="text-6xl font-extrabold">{{ $card['value'] }}</span>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Tombol tambah aktivitas -->
    <div class="flex justify-end mb-5">
        <a href="#" class="bg-[#14305a] hover:bg-[#1b3a63] text-white font-semibold px-5 py-2.5 rounded-lg inline-flex items-center gap-3 text-sm">
            Tambah Aktivitas <i class="fas fa-plus"></i>
        </a>
    </div>

    <!-- Tabel aktivitas -->
    <div class="bg-white border border-gray-300 rounded-xl p-6 overflow-x-auto">
        <h2 class="text-xl font-extrabold mb-4 ml-2">Daftar Aktivitas Klien Terbaru &amp; Permintaan Konsultasi</h2>

        <table class="w-full text-sm min-w-[800px]">
            <thead>
                <tr class="bg-[#fdf1ef] text-left">
                    <th class="py-3 pl-4 w-10"></th>
                    <th class="py-3 font-bold">Nama Klien/Perusahaan</th>
                    <th class="py-3 font-bold">Permintaan/Proyek</th>
                    <th class="py-3 font-bold">Tanggal Pengajuan</th>
                    <th class="py-3 font-bold text-center">Status</th>
                    <th class="py-3 font-bold text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($aktivitas as $k)
                    @php
                        $status = match ($k->status) {
                            'pending'   => ['label' => 'Menunggu', 'class' => 'bg-gray-300 text-gray-800'],
                            'approved'  => ['label' => 'Diproses', 'class' => 'bg-[#fde9b0] text-gray-800'],
                            'completed' => ['label' => 'Selesai',  'class' => 'bg-[#00f07a] text-gray-900'],
                            'rejected'  => ['label' => 'Ditolak',  'class' => 'bg-red-200 text-red-800'],
                            default     => ['label' => ucfirst($k->status), 'class' => 'bg-gray-200'],
                        };
                        $tanggal = $k->created_at ?? $k->tanggal_konsultasi;
                    @endphp
                    <tr class="border-b border-gray-300 last:border-0">
                        <td class="py-3 pl-4"><input type="checkbox" class="w-5 h-5 rounded border-gray-300"></td>
                        <td class="py-3 font-medium">{{ $k->client->company ?: $k->client->name }}</td>
                        <td class="py-3">{{ \Illuminate\Support\Str::limit($k->catatan_klien ?: 'Konsultasi IT', 40) }}</td>
                        <td class="py-3">{{ $tanggal ? $tanggal->locale('id')->translatedFormat('d F Y') : '-' }}</td>
                        <td class="py-3 text-center">
                            <span class="inline-block min-w-[90px] px-3 py-1 rounded-lg text-[13px] font-medium {{ $status['class'] }}">
                                {{ $status['label'] }}
                            </span>
                        </td>
                        <td class="py-3">
                            <div class="flex items-center justify-center gap-4 text-lg">
                                <a href="#" title="Lihat"><i class="fas fa-eye text-blue-600"></i></a>
                                <a href="#" title="Edit"><i class="fas fa-pen-to-square text-gray-900"></i></a>
                                <button type="button" title="Hapus"><i class="fas fa-trash text-red-600"></i></button>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="py-10 text-center text-gray-500">Belum ada permintaan konsultasi.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
