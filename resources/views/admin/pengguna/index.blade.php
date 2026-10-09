@extends('layouts.admin')

@section('title', 'Pengguna & Hak Akses - Super Admin')
@section('page_title', 'Pengguna & Hak Akses')

@section('content')
<div class="space-y-6">
    <!-- Header & Action Button -->
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
        <div>
            <h2 class="text-2xl font-bold text-gray-800">Pengguna & Hak Akses</h2>
            <p class="text-sm text-gray-500">Kelola data admin, tambahkan pengguna baru, dan atur hak akses sistem.</p>
        </div>
        <a href="#" class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2.5 rounded-lg text-sm font-medium transition-colors flex items-center shadow-sm">
            <i class="fas fa-user-plus mr-2"></i> Tambah Pengguna
        </a>
    </div>

    <!-- Table Container -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <!-- Search & Filter Bar -->
        <div class="p-4 border-b border-gray-100 flex flex-col md:flex-row justify-between items-center gap-4 bg-gray-50/50">
            <div class="relative w-full max-w-md">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <i class="fas fa-search text-gray-400"></i>
                </div>
                <input type="text" class="block w-full pl-10 pr-3 py-2 border border-gray-200 rounded-lg focus:ring-blue-500 focus:border-blue-500 text-sm bg-white" placeholder="Cari nama atau email admin...">
            </div>

            <div class="flex items-center space-x-2 w-full md:w-auto">
                <label for="filter-role" class="text-sm text-gray-600 font-medium">Filter:</label>
                <select id="filter-role" class="border border-gray-200 text-gray-700 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2 bg-white w-full md:w-auto">
                    <option value="">Semua Hak Akses</option>
                    <option value="super_admin">Super Admin</option>
                    <option value="admin_layanan">Admin Layanan</option>
                    <option value="admin_konten">Admin Konten</option>
                </select>
            </div>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-white text-gray-600 text-sm border-b border-gray-200">
                        <th class="p-4 font-semibold w-16 text-center">No</th>
                        <th class="p-4 font-semibold">Nama Pengguna</th>
                        <th class="p-4 font-semibold">Email</th>
                        <th class="p-4 font-semibold">No. Telepon</th>
                        <th class="p-4 font-semibold">Hak Akses</th>
                        <th class="p-4 font-semibold w-36 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-sm divide-y divide-gray-100">
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="p-4 text-center text-gray-500">1</td>
                        <td class="p-4 font-medium text-gray-800 flex items-center space-x-3">
                            <img src="https://ui-avatars.com/api/?name=Super+Admin&background=0D8ABC&color=fff" class="w-8 h-8 rounded-full">
                            <span>Super Admin</span>
                        </td>
                        <td class="p-4 text-gray-600">admin@nusaindotech.com</td>
                        <td class="p-4 text-gray-600">081234567890</td>
                        <td class="p-4">
                            <span class="px-3 py-1 bg-purple-100 text-purple-700 rounded-full text-xs font-medium border border-purple-200">Super Admin</span>
                        </td>
                        <td class="p-4 text-center">
                            <div class="flex justify-center space-x-2">
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
            <span>Menampilkan 1 hingga 1 dari 1 data</span>
            <div class="flex space-x-1">
                <button class="px-3 py-1.5 border border-gray-200 rounded-md hover:bg-gray-50 disabled:opacity-50" disabled>Prev</button>
                <button class="px-3 py-1.5 bg-blue-600 text-white rounded-md font-medium shadow-sm">1</button>
                <button class="px-3 py-1.5 border border-gray-200 rounded-md hover:bg-gray-50 disabled:opacity-50" disabled>Next</button>
            </div>
        </div>
    </div>
</div>
@endsection
