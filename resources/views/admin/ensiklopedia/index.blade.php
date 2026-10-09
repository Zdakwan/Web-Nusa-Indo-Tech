@extends('layouts.admin')

@section('title', 'Ensiklopedia IT - Admin Konten')
@section('page_title', 'Ensiklopedia IT')

@section('content')
<div class="space-y-6">
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
        <div>
            <h2 class="text-2xl font-bold text-gray-800">Artikel Ensiklopedia</h2>
            <p class="text-sm text-gray-500">Kelola artikel, berita, dan wawasan seputar teknologi IT.</p>
        </div>
        <a href="#" class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2.5 rounded-lg text-sm font-medium transition-colors flex items-center shadow-sm">
            <i class="fas fa-pen mr-2"></i> Tulis Artikel
        </a>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="p-4 border-b border-gray-100 bg-gray-50/50">
            <div class="relative w-full md:w-1/3">
                <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                <input type="text" class="block w-full pl-10 pr-3 py-2 border border-gray-200 rounded-lg text-sm" placeholder="Cari judul artikel atau tags...">
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-white text-gray-600 text-sm border-b border-gray-200">
                        <th class="p-4 font-semibold w-16 text-center">No</th>
                        <th class="p-4 font-semibold">Judul Artikel</th>
                        <th class="p-4 font-semibold">Tags</th>
                        <th class="p-4 font-semibold">Tanggal Publish</th>
                        <th class="p-4 font-semibold w-36 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-sm divide-y divide-gray-100">
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="p-4 text-center text-gray-500">1</td>
                        <td class="p-4 font-medium text-gray-800">Mengenal Apa Itu Artificial Intelligence di 2026</td>
                        <td class="p-4">
                            <span class="px-2 py-1 bg-gray-100 text-gray-600 rounded text-xs">AI</span>
                            <span class="px-2 py-1 bg-gray-100 text-gray-600 rounded text-xs">Tech</span>
                        </td>
                        <td class="p-4 text-gray-600">09 Okt 2026</td>
                        <td class="p-4 text-center">
                            <div class="flex justify-center space-x-2">
                                <button class="w-8 h-8 rounded bg-gray-50 border border-gray-200 text-gray-600 hover:bg-gray-100"><i class="fas fa-eye"></i></button>
                                <button class="w-8 h-8 rounded bg-blue-50 border border-blue-100 text-blue-600 hover:bg-blue-100"><i class="fas fa-edit"></i></button>
                                <button class="w-8 h-8 rounded bg-red-50 border border-red-100 text-red-600 hover:bg-red-100"><i class="fas fa-trash"></i></button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
