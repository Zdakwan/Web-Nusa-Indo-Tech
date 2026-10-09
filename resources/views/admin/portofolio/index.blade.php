@extends('layouts.admin')

@section('title', 'Portofolio Proyek - Admin Konten')
@section('page_title', 'Portofolio Proyek')

@section('content')
<div class="space-y-6">
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
        <div>
            <h2 class="text-2xl font-bold text-gray-800">Portofolio Proyek</h2>
            <p class="text-sm text-gray-500">Kelola daftar portofolio proyek yang telah dikerjakan.</p>
        </div>
        <a href="#" class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2.5 rounded-lg text-sm font-medium transition-colors flex items-center shadow-sm">
            <i class="fas fa-plus mr-2"></i> Tambah Portofolio
        </a>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="p-4 border-b border-gray-100 flex justify-between items-center bg-gray-50/50">
            <div class="relative w-full max-w-md">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <i class="fas fa-search text-gray-400"></i>
                </div>
                <input type="text" class="block w-full pl-10 pr-3 py-2 border border-gray-200 rounded-lg focus:ring-blue-500 focus:border-blue-500 text-sm bg-white" placeholder="Cari judul proyek atau klien...">
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-white text-gray-600 text-sm border-b border-gray-200">
                        <th class="p-4 font-semibold w-16 text-center">No</th>
                        <th class="p-4 font-semibold w-32">Gambar</th>
                        <th class="p-4 font-semibold w-1/3">Judul Proyek</th>
                        <th class="p-4 font-semibold">Klien</th>
                        <th class="p-4 font-semibold text-center">Tahun</th>
                        <th class="p-4 font-semibold">Kategori</th>
                        <th class="p-4 font-semibold w-36 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-sm divide-y divide-gray-100">
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="p-4 text-center text-gray-500">1</td>
                        <td class="p-4">
                            <div class="w-20 h-14 bg-gray-200 rounded-md overflow-hidden">
                                <img src="https://via.placeholder.com/150" alt="Thumbnail" class="w-full h-full object-cover">
                            </div>
                        </td>
                        <td class="p-4 font-medium text-gray-800">Aplikasi E-Kinerja Pemkab Sidoarjo</td>
                        <td class="p-4 text-gray-600">Pemkab Sidoarjo</td>
                        <td class="p-4 text-center text-gray-600">2026</td>
                        <td class="p-4">
                            <span class="px-2.5 py-1 bg-blue-100 text-blue-700 rounded-md text-xs font-medium">Web App</span>
                        </td>
                        <td class="p-4 text-center">
                            <div class="flex justify-center space-x-2">
                                <button class="w-8 h-8 rounded bg-gray-50 border border-gray-200 text-gray-600 hover:bg-gray-100 hover:text-gray-900 transition-colors"><i class="fas fa-eye"></i></button>
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
