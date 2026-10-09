@extends('layouts.admin')

@section('title', 'Client & Hak Akses - Super Admin')
@section('page_title', 'Client & Hak Akses')

@section('content')
<div class="space-y-6">
    <!-- Header & Action Button -->
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
        <div>
            <h2 class="text-2xl font-bold text-gray-800">Daftar Client</h2>
            <p class="text-sm text-gray-500">Manajemen akun klien yang terdaftar pada sistem Nusa Indo Tech.</p>
        </div>
        <a href="#" class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2.5 rounded-lg text-sm font-medium transition-colors flex items-center shadow-sm">
            <i class="fas fa-plus mr-2"></i> Tambah Client
        </a>
    </div>

    <!-- Table Container -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <!-- Search Bar -->
        <div class="p-4 border-b border-gray-100 bg-gray-50/50">
            <div class="relative w-full md:w-1/3">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <i class="fas fa-search text-gray-400"></i>
                </div>
                <input type="text" class="block w-full pl-10 pr-3 py-2 border border-gray-200 rounded-lg focus:ring-blue-500 focus:border-blue-500 text-sm bg-white" placeholder="Cari nama, email, atau instansi...">
            </div>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-white text-gray-600 text-sm border-b border-gray-200">
                        <th class="p-4 font-semibold w-16 text-center">No</th>
                        <th class="p-4 font-semibold">Nama Client</th>
                        <th class="p-4 font-semibold">Instansi/Perusahaan</th>
                        <th class="p-4 font-semibold">Kontak</th>
                        <th class="p-4 font-semibold">Tanggal Daftar</th>
                        <th class="p-4 font-semibold w-36 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-sm divide-y divide-gray-100">
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="p-4 text-center text-gray-500">1</td>
                        <td class="p-4 font-medium text-gray-800 flex items-center space-x-3">
                            <img src="https://ui-avatars.com/api/?name=Nauval" class="w-8 h-8 rounded-full">
                            <span>Nauval</span>
                        </td>
                        <td class="p-4 text-gray-600">-</td>
                        <td class="p-4">
                            <div class="flex flex-col">
                                <span class="text-gray-800">nauvalutomo788@gmail.com</span>
                                <span class="text-xs text-gray-500">085175316273</span>
                            </div>
                        </td>
                        <td class="p-4 text-gray-600">29 Sep 2026</td>
                        <td class="p-4 text-center">
                            <div class="flex justify-center space-x-2">
                                <button class="w-8 h-8 rounded bg-gray-50 border border-gray-200 text-gray-600 hover:bg-gray-100 hover:text-gray-900 transition-colors" title="Detail">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="w-8 h-8 rounded bg-blue-50 border border-blue-100 text-blue-600 hover:bg-blue-100 hover:text-blue-800 transition-colors" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="w-8 h-8 rounded bg-red-50 border border-red-100 text-red-600 hover:bg-red-100 hover:text-red-800 transition-colors" title="Hapus">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="p-4 text-center text-gray-500">2</td>
                        <td class="p-4 font-medium text-gray-800 flex items-center space-x-3">
                            <img src="https://ui-avatars.com/api/?name=Mey" class="w-8 h-8 rounded-full">
                            <span>Mey</span>
                        </td>
                        <td class="p-4 text-gray-600">-</td>
                        <td class="p-4">
                            <div class="flex flex-col">
                                <span class="text-gray-800">mey@gmail.com</span>
                                <span class="text-xs text-gray-500">08976543557</span>
                            </div>
                        </td>
                        <td class="p-4 text-gray-600">24 Sep 2026</td>
                        <td class="p-4 text-center">
                            <div class="flex justify-center space-x-2">
                                <button class="w-8 h-8 rounded bg-gray-50 border border-gray-200 text-gray-600 hover:bg-gray-100 hover:text-gray-900 transition-colors" title="Detail">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="w-8 h-8 rounded bg-blue-50 border border-blue-100 text-blue-600 hover:bg-blue-100 hover:text-blue-800 transition-colors" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="w-8 h-8 rounded bg-red-50 border border-red-100 text-red-600 hover:bg-red-100 hover:text-red-800 transition-colors" title="Hapus">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="p-4 border-t border-gray-100 flex justify-between items-center text-sm text-gray-500 bg-white">
            <span>Menampilkan 1 hingga 2 dari 2 data</span>
            <div class="flex space-x-1">
                <button class="px-3 py-1.5 border border-gray-200 rounded-md hover:bg-gray-50 disabled:opacity-50" disabled>Prev</button>
                <button class="px-3 py-1.5 bg-blue-600 text-white rounded-md font-medium shadow-sm">1</button>
                <button class="px-3 py-1.5 border border-gray-200 rounded-md hover:bg-gray-50 disabled:opacity-50" disabled>Next</button>
            </div>
        </div>
    </div>
</div>
@endsection
