@extends('layouts.admin')
@section('title', 'Kelola Client')
@section('content')
<div class="mb-6">
    <h1 class="text-2xl font-bold text-gray-800">Daftar Klien / Pelanggan</h1>
    <p class="text-sm text-gray-500">Data akun klien yang terdaftar di sistem.</p>
</div>

@if(session('success')) <div class="mb-4 p-3 bg-green-50 text-green-700 rounded">{{ session('success') }}</div> @endif

<div class="bg-white rounded-xl shadow-sm border overflow-hidden">
    <table class="w-full text-left border-collapse">
        <thead class="bg-gray-50 border-b">
            <tr><th class="px-6 py-4">Nama / Perusahaan</th><th class="px-6 py-4">Kontak</th><th class="px-6 py-4 text-center">Aksi</th></tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
            @forelse($clients as $client)
            <tr class="hover:bg-gray-50">
                <td class="px-6 py-4">
                    <p class="text-sm font-medium">{{ $client->name }}</p>
                    <p class="text-xs text-gray-500">{{ $client->company ?? 'Personal' }}</p>
                </td>
                <td class="px-6 py-4">
                    <p class="text-sm"><i class="fas fa-envelope w-4"></i> {{ $client->email }}</p>
                    <p class="text-sm"><i class="fas fa-phone w-4"></i> {{ $client->phone ?? '-' }}</p>
                </td>
                <td class="px-6 py-4 text-center">
                    <form action="{{ route('admin.client.destroy', $client->id) }}" method="POST" onsubmit="return confirm('Hapus klien ini? Semua data konsultasinya mungkin ikut terhapus (tergantung cascade DB).')">
                        @csrf @method('DELETE')
                        <button class="text-red-500 hover:text-red-700"><i class="fas fa-trash-alt text-lg"></i></button>
                    </form>
                </td>
            </tr>
            @empty
            <tr><td colspan="3" class="px-6 py-8 text-center text-gray-500">Belum ada Klien yang terdaftar.</td></tr>
            @endforelse
        </tbody>
    </table>
    <div class="p-4 bg-gray-50">{{ $clients->links() }}</div>
</div>
@endsection
