@extends('layouts.admin')
@section('title', 'Riwayat Log In')

@section('content')
<div class="mb-6">
    <h1 class="text-2xl font-extrabold text-gray-900">Riwayat Log In Sistem</h1>
    <p class="text-sm text-gray-500 mt-1">Mencatat semua aktivitas masuk akun SuperAdmin, Admin, dan Client.</p>
</div>

<div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-50 text-gray-900 text-xs font-bold border-b border-gray-200">
                    <th class="py-3 px-4 w-12 text-center">No</th>
                    <th class="py-3 px-4">Nama Pengguna</th>
                    <th class="py-3 px-4">Role / Hak Akses</th>
                    <th class="py-3 px-4">Alamat IP</th>
                    <th class="py-3 px-4 text-right">Waktu Login</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 text-xs text-gray-800">
                @forelse($logs as $index => $log)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="py-3 px-4 text-center text-gray-500 font-medium">{{ $index + 1 }}</td>
                        <td class="py-3 px-4">
                            <div class="font-bold text-gray-900">{{ $log->nama }}</div>
                            <div class="text-[10px] text-gray-500">{{ $log->email }}</div>
                        </td>
                        <td class="py-3 px-4">
                            <span class="px-2 py-1 rounded-md font-bold text-[10px] 
                                {{ $log->role === 'Client' ? 'bg-blue-100 text-blue-700' : 'bg-red-100 text-red-700' }}">
                                {{ strtoupper(str_replace('_', ' ', $log->role)) }}
                            </span>
                        </td>
                        <td class="py-3 px-4 font-mono text-gray-500">{{ $log->ip_address }}</td>
                        <td class="py-3 px-4 text-right font-medium">{{ $log->created_at->locale('id')->translatedFormat('d F Y, H:i') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="py-8 text-center text-gray-400">Belum ada riwayat login yang tercatat.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection