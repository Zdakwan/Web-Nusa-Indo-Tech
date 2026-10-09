@extends('layouts.admin')

@section('title', 'Pelatihan IT - Admin Konten')
@section('page_title', 'Pelatihan IT')

@section('content')
<div class="space-y-6">
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
        <div>
            <h2 class="text-2xl font-bold text-gray-800">Daftar Pelatihan IT</h2>
            <p class="text-sm text-gray-500">Kelola modul kursus dan pelatihan IT (LMS).</p>
        </div>
        <a href="#" class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2.5 rounded-lg text-sm font-medium transition-colors flex items-center shadow-sm">
            <i class="fas fa-plus mr-2"></i> Tambah Pelatihan
        </a>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="p-4 border-b border-gray-100 flex justify-between items-center bg-gray-50/50">
            <div class="relative w-full max-w-md">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <i class="fas fa-search text-gray-400"></i>
                </div>
                <input type="text" class="block w-full pl-10 pr-3 py-2 border border-gray-200 rounded-lg focus:ring-blue-500 text-sm" placeholder="Cari judul pelatihan...">
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-white text-gray-600 text-sm border-b border-gray-200">
                        <th class="p-4 font-semibold w-16 text-center">No</th>
                        <th class="p-4 font-semibold w-24">Banner</th>
                        <th class="p-4 font-semibold">Judul Pelatihan</th>
                        <th class="p-4 font-semibold">Kategori</th>
                        <th class="p-4 font-semibold">Harga</th>
                        <th class="p-4 font-semibold w-36 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-sm divide-y divide-gray-100">
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="p-4 text-center text-gray-500">1</td>
                        <td class="p-4">
                            <div class="w-16 h-12 bg-gray-200 rounded overflow-hidden">
                                <img src="https://via.placeholder.com/150" class="w-full h-full object-cover">
                            </div>
                        </td>
                        <td class="p-4 font-medium text-gray-800">Mastering Laravel 12 & Tailwind CSS</td>
                        <td class="p-4"><span class="px-2.5 py-1 bg-indigo-100 text-indigo-700 rounded-md text-xs font-medium">Web Development</span></td>
                        <td class="p-4 text-gray-800 font-semibold">Rp 450.000</td>
                        <td class="p-4 text-center">
                            <div class="flex justify-center space-x-2">
                                <button class="w-8 h-8 rounded bg-blue-50 border border-blue-100 text-blue-600 hover:bg-blue-100 hover:text-blue-800 transition-colors"><i class="fas fa-edit"></i></button>
                                <button class="w-8 h-8 rounded bg-red-50 border border-red-100 text-red-600 hover:bg-red-100 hover:text-red-800 transition-colors"><i class="fas fa-trash"></i></button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
