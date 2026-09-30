@extends('layouts.app')

@section('title', 'Profil - Nusa Indo Tech')

@section('content')
    @if(session('success'))
    <div class="bg-green-100 border border-green-300 rounded-lg p-4 mb-6 flex justify-between items-center">
        <div class="flex items-center">
            <i class="fas fa-check-circle text-green-600 mr-3 text-lg"></i>
            <span class="text-green-800 font-bold text-sm">{{ session('success') }}</span>
        </div>
        <button onclick="this.parentElement.style.display='none'" class="text-green-600 hover:text-green-800"><i class="fas fa-times"></i></button>
    </div>
    @endif

    <div class="mb-6">
        <h2 class="text-2xl font-bold text-gray-900">Profil</h2>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 mb-6 flex items-center">
        <div class="w-32 h-32 rounded-full overflow-hidden bg-gray-100 border-4 border-gray-50 flex items-center justify-center flex-shrink-0">
            @if($client->avatar)
                <img src="{{ asset('storage/' . $client->avatar) }}" alt="Foto Profil" class="w-full h-full object-cover">
            @else
                <i class="fas fa-user text-6xl text-gray-300 mt-4"></i>
            @endif
        </div>
        <div class="ml-8">
            <h1 class="text-3xl font-bold text-gray-900">{{ $client->name }}</h1>
            <p class="text-gray-500 font-medium text-lg mt-1">Klien</p>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-8 mb-6">
        <h3 class="text-lg font-bold text-gray-900 mb-6">Informasi Pribadi</h3>

        <div class="space-y-4">
            <div class="flex flex-col sm:flex-row sm:items-center">
                <div class="w-full sm:w-1/4 text-gray-600 font-medium font-semibold text-sm">Nama Lengkap</div>
                <div class="w-full sm:w-3/4 text-gray-900 font-semibold text-sm">: {{ $client->name }}</div>
            </div>
            <div class="flex flex-col sm:flex-row sm:items-center">
                <div class="w-full sm:w-1/4 text-gray-600 font-medium font-semibold text-sm">Email</div>
                <div class="w-full sm:w-3/4 text-gray-900 font-semibold text-sm">: {{ $client->email }}</div>
            </div>
            <div class="flex flex-col sm:flex-row sm:items-center">
                <div class="w-full sm:w-1/4 text-gray-600 font-medium font-semibold text-sm">Perusahaan</div>
                <div class="w-full sm:w-3/4 text-gray-900 font-semibold text-sm">: {{ $client->company ?? '-' }}</div>
            </div>
            <div class="flex flex-col sm:flex-row sm:items-center">
                <div class="w-full sm:w-1/4 text-gray-600 font-medium font-semibold text-sm">Jabatan</div>
                <div class="w-full sm:w-3/4 text-gray-900 font-semibold text-sm">: {{ $client->position ?? '-' }}</div>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-8">
        <h3 class="text-lg font-bold text-gray-900 mb-6">Informasi Akun</h3>

        <div class="space-y-4 mb-8">
            <div class="flex flex-col sm:flex-row sm:items-center">
                <div class="w-full sm:w-1/4 text-gray-600 font-medium font-semibold text-sm">Username</div>
                <div class="w-full sm:w-3/4 text-gray-900 font-semibold text-sm">: {{ explode('@', $client->email)[0] }}</div>
            </div>
            <div class="flex flex-col sm:flex-row sm:items-center">
                <div class="w-full sm:w-1/4 text-gray-600 font-medium font-semibold text-sm">Status</div>
                <div class="w-full sm:w-3/4 text-gray-900 font-semibold text-sm">: Aktif</div>
            </div>
            <div class="flex flex-col sm:flex-row sm:items-center">
                <div class="w-full sm:w-1/4 text-gray-600 font-medium font-semibold text-sm">Role</div>
                <div class="w-full sm:w-3/4 text-gray-900 font-semibold text-sm">: Client</div>
            </div>
        </div>

        <div class="flex justify-end">
            <a href="{{ route('profile.edit') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg font-semibold text-sm transition shadow-sm flex items-center">
                <i class="fas fa-edit mr-2"></i> Edit Data Ini
            </a>
        </div>
    </div>
@endsection
