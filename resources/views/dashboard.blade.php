@extends('layouts.app')

@section('title', 'Dashboard - Nusa Indo Tech')

@section('content')
    <h1 class="text-3xl font-bold text-gray-900 mb-6">Dashboard</h1>

    <!-- Tiga Kartu Atas -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">

        <!-- Card 1: Permintaan Konsultasi -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden relative h-36 flex flex-col justify-between">
            <div class="p-5 pb-0 z-10">
                <h3 class="text-sm font-bold text-gray-800">Permintaan<br>Konsultasi</h3>
                <p class="text-4xl font-extrabold text-gray-900 mt-1">3</p>
            </div>
            <!-- Gelombang Kuning Bawah -->
            <svg class="absolute bottom-0 w-full h-16 text-yellow-100/50" preserveAspectRatio="none" viewBox="0 0 1440 320" style="fill:url(#grad-yellow)">
                <defs><linearGradient id="grad-yellow" x1="0%" y1="0%" x2="0%" y2="100%"><stop offset="0%" style="stop-color:#fef08a;stop-opacity:1" /><stop offset="100%" style="stop-color:#f59e0b;stop-opacity:1" /></linearGradient></defs>
                <path d="M0,192L48,197.3C96,203,192,213,288,229.3C384,245,480,267,576,250.7C672,235,768,181,864,170.7C960,160,1056,192,1152,213.3C1248,235,1344,245,1392,250.7L1440,256L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
            </svg>
        </div>

        <!-- Card 2: Jadwal Mendatang -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden relative h-36 flex flex-col justify-between">
            <div class="p-5 pb-0 z-10 flex justify-between items-start">
                <div>
                    <h3 class="text-sm font-bold text-gray-800">Jadwal Mendatang</h3>
                    <p class="text-4xl font-extrabold text-gray-900 mt-2">2</p>
                </div>
                <div class="w-8 h-8 bg-green-100 rounded-lg flex items-center justify-center text-green-500">
                    <i class="fas fa-clipboard-list"></i>
                </div>
            </div>
            <!-- Gelombang Hijau Bawah -->
            <svg class="absolute bottom-0 w-full h-16" preserveAspectRatio="none" viewBox="0 0 1440 320" style="fill:url(#grad-green)">
                <defs><linearGradient id="grad-green" x1="0%" y1="0%" x2="0%" y2="100%"><stop offset="0%" style="stop-color:#86efac;stop-opacity:1" /><stop offset="100%" style="stop-color:#10b981;stop-opacity:1" /></linearGradient></defs>
                <path d="M0,256L60,250.7C120,245,240,235,360,245.3C480,256,600,288,720,277.3C840,267,960,213,1080,181.3C1200,149,1320,139,1380,133.3L1440,128L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z"></path>
            </svg>
        </div>

        <!-- Card 3: Riwayat Konsultasi -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden relative h-36 flex flex-col justify-between">
            <div class="p-5 pb-0 z-10">
                <h3 class="text-sm font-bold text-gray-800">Riwayat Konsultasi</h3>
                <p class="text-4xl font-extrabold text-gray-900 mt-2">5</p>
            </div>
            <!-- Gelombang Biru Bawah -->
            <svg class="absolute bottom-0 w-full h-16 text-blue-100/50" preserveAspectRatio="none" viewBox="0 0 1440 320" style="fill:url(#grad-blue)">
                <defs><linearGradient id="grad-blue" x1="0%" y1="0%" x2="0%" y2="100%"><stop offset="0%" style="stop-color:#93c5fd;stop-opacity:1" /><stop offset="100%" style="stop-color:#3b82f6;stop-opacity:1" /></linearGradient></defs>
                <path d="M0,160L48,149.3C96,139,192,117,288,133.3C384,149,480,203,576,218.7C672,235,768,213,864,176C960,139,1056,85,1152,74.7C1248,64,1344,96,1392,112L1440,128L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
            </svg>
        </div>
    </div>

    <!-- Bagian Tengah (Dua Kolom) -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">

        <!-- Jadwal Konsultasi Terdekat -->
        <div class="bg-[#f0f4f8] rounded-2xl p-6 border border-gray-200">
            <div class="flex justify-between items-center mb-6">
                <div class="flex items-center">
                    <i class="fas fa-calendar-alt text-[#1e3352] text-xl mr-3"></i>
                    <h3 class="font-bold text-gray-900 text-lg">Jadwal Konsultasi Terdekat</h3>
                </div>
                <a href="#" class="text-sm font-bold text-blue-600 hover:underline">Lihat Semua</a>
            </div>

            <div class="bg-white rounded-xl p-5 shadow-sm border border-gray-100">
                <div class="flex items-center justify-between mb-4">
                    <div class="flex items-center">
                        <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center text-blue-500 mr-4">
                            <i class="fas fa-desktop"></i>
                        </div>
                        <h4 class="font-bold text-gray-900 text-lg">IT Training</h4>
                    </div>
                    <span class="bg-green-100 text-green-700 text-xs font-bold px-3 py-1 rounded-full">Terjadwal</span>
                </div>

                <div class="space-y-3 pl-14">
                    <div class="flex items-center text-sm text-gray-600 font-medium">
                        <span class="w-24">Senin,</span>
                        <span class="text-gray-900">27 September 2026</span>
                    </div>
                    <div class="flex items-center text-sm text-gray-600 font-medium">
                        <i class="fas fa-clock w-5 text-gray-400 -ml-5"></i>
                        <span class="text-gray-900">09.00 - 12.00</span>
                    </div>
                    <div class="flex items-center text-sm text-gray-600 font-medium">
                        <i class="fas fa-user w-5 text-gray-400 -ml-5"></i>
                        <span class="text-gray-900">Konsultan : Mey Trisna</span>
                    </div>
                    <div class="flex items-center text-sm text-gray-600 font-medium">
                        <i class="fas fa-video w-5 text-gray-400 -ml-5"></i>
                        <span class="text-gray-900">Online / Zoom</span>
                    </div>
                </div>

                <div class="flex mt-6 pl-14 space-x-3">
                    <button class="px-5 py-2 border border-blue-500 text-blue-500 font-bold text-sm rounded-full hover:bg-blue-50 transition">
                        <i class="fas fa-eye mr-2"></i> Lihat Detail
                    </button>
                    <button class="px-5 py-2 bg-blue-600 text-white font-bold text-sm rounded-full hover:bg-blue-700 transition shadow-md">
                        <i class="fas fa-video mr-2"></i> Gabung Meeting
                    </button>
                </div>
            </div>
        </div>

        <!-- Status Pendaftaran Terbaru -->
        <div class="bg-white rounded-2xl p-6 border border-gray-200 shadow-sm flex flex-col">
            <div class="flex items-center mb-6">
                <i class="fas fa-file-alt text-[#1e3352] text-xl mr-3"></i>
                <h3 class="font-bold text-gray-900 text-lg">Status Pendaftaran Terbaru</h3>
            </div>

            <div class="flex-grow">
                <h4 class="font-bold text-gray-900 text-lg">Multimedia</h4>
                <p class="text-xs text-gray-500 font-medium mt-1 mb-8">Diajukan Pada 26 September 2026</p>

                <!-- Stepper Progress -->
                <div class="relative flex justify-between items-center w-full px-2">
                    <div class="absolute left-0 top-3 w-full h-0.5 bg-gray-200 z-0"></div>
                    <div class="absolute left-0 top-3 w-2/3 h-0.5 bg-blue-400 z-0"></div>

                    <!-- Step 1 -->
                    <div class="relative z-10 flex flex-col items-center">
                        <div class="w-6 h-6 rounded-full bg-white border-2 border-green-500 flex items-center justify-center text-green-500">
                            <i class="fas fa-check text-xs"></i>
                        </div>
                        <p class="text-[10px] font-bold text-gray-800 mt-2">Pengajuan</p>
                        <p class="text-[10px] text-gray-500">26 Sep</p>
                    </div>

                    <!-- Step 2 -->
                    <div class="relative z-10 flex flex-col items-center">
                        <div class="w-6 h-6 rounded-full bg-white border-2 border-green-500 flex items-center justify-center text-green-500">
                            <i class="fas fa-check text-xs"></i>
                        </div>
                        <p class="text-[10px] font-bold text-gray-800 mt-2">Diverifikasi</p>
                        <p class="text-[10px] text-gray-500">27 Sep</p>
                    </div>

                    <!-- Step 3 (Current) -->
                    <div class="relative z-10 flex flex-col items-center">
                        <div class="w-6 h-6 rounded-full bg-white border-2 border-blue-500 flex items-center justify-center">
                            <div class="w-2 h-2 rounded-full bg-blue-500"></div>
                        </div>
                        <p class="text-[10px] font-bold text-gray-800 mt-2">Dijadwalkan</p>
                        <p class="text-[10px] text-gray-500">30 Sep</p>
                    </div>

                    <!-- Step 4 -->
                    <div class="relative z-10 flex flex-col items-center">
                        <div class="w-6 h-6 rounded-full bg-white border-2 border-gray-300"></div>
                        <p class="text-[10px] font-bold text-gray-500 mt-2">Selesai</p>
                        <p class="text-[10px] text-gray-500">&nbsp;</p>
                    </div>
                </div>
            </div>

            <div class="flex items-center justify-between mt-8 border-t border-gray-100 pt-5">
                <span class="bg-green-100 text-green-700 text-xs font-bold px-3 py-1.5 rounded-md flex items-center">
                    <i class="fas fa-check-circle mr-1.5"></i> Disetujui Admin
                </span>
                <button class="px-4 py-1.5 border border-blue-400 text-blue-500 font-bold text-xs rounded-full hover:bg-blue-50 transition">
                    <i class="fas fa-eye mr-1"></i> Lihat Detail
                </button>
            </div>
        </div>
    </div>

    <!-- Notifikasi Terbaru -->
    <div class="bg-white rounded-2xl border border-gray-200 shadow-sm">
        <div class="flex justify-between items-center p-5 border-b border-gray-100">
            <div class="flex items-center">
                <i class="fas fa-bell text-gray-500 text-lg mr-3"></i>
                <h3 class="font-bold text-gray-900 text-sm">Notifikasi Terbaru</h3>
            </div>
            <a href="#" class="text-xs font-bold text-blue-600 hover:underline">Lihat Semua</a>
        </div>

        <div class="divide-y divide-gray-100">
            <!-- Item Notifikasi 1 -->
            <div class="p-5 flex items-start hover:bg-gray-50 transition cursor-pointer">
                <div class="flex-shrink-0 w-8 h-8 rounded-full bg-green-100 flex items-center justify-center text-green-500 mt-1">
                    <i class="fas fa-check-circle"></i>
                </div>
                <div class="ml-4 flex-1">
                    <div class="flex justify-between items-start">
                        <h4 class="text-sm font-bold text-gray-900">Pendaftaran Disetujui</h4>
                        <span class="text-xs text-gray-400 font-medium">5 Menit Yang Lalu</span>
                    </div>
                    <p class="text-xs text-gray-500 font-medium mt-1">Pendaftaran Konsultasi Anda Untuk Multimedia Telah Disetujui Oleh Admin</p>
                </div>
            </div>

            <!-- Item Notifikasi 2 -->
            <div class="p-5 flex items-start hover:bg-gray-50 transition cursor-pointer">
                <div class="flex-shrink-0 w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center text-blue-500 mt-1">
                    <i class="fas fa-calendar-check"></i>
                </div>
                <div class="ml-4 flex-1">
                    <div class="flex justify-between items-start">
                        <h4 class="text-sm font-bold text-gray-900">Jadwal Konsultasi Dikonfirmasi</h4>
                        <span class="text-xs text-gray-400 font-medium">10 Menit Yang Lalu</span>
                    </div>
                    <p class="text-xs text-gray-500 font-medium mt-1">Konsultasi Anda Dijadwalkan Pada 27 September 2026, 09.00 - 12.00.</p>
                </div>
            </div>

            <!-- Item Notifikasi 3 -->
            <div class="p-5 flex items-start hover:bg-gray-50 transition cursor-pointer">
                <div class="flex-shrink-0 w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center text-blue-500 mt-1">
                    <i class="fas fa-info-circle"></i>
                </div>
                <div class="ml-4 flex-1">
                    <div class="flex justify-between items-start">
                        <h4 class="text-sm font-bold text-gray-900">Pendaftaran Berhasil</h4>
                        <span class="text-xs text-gray-400 font-medium">30 Menit Yang Lalu</span>
                    </div>
                    <p class="text-xs text-gray-500 font-medium mt-1">Pendaftaran Konsultasi Anda Telah Berhasil Dikirim</p>
                </div>
            </div>

            <!-- Item Notifikasi 4 -->
            <div class="p-5 flex items-start hover:bg-gray-50 transition cursor-pointer">
                <div class="flex-shrink-0 w-8 h-8 rounded-full border border-yellow-300 bg-yellow-50 flex items-center justify-center text-yellow-500 mt-1">
                    <i class="far fa-bell"></i>
                </div>
                <div class="ml-4 flex-1">
                    <div class="flex justify-between items-start">
                        <h4 class="text-sm font-bold text-gray-900">Pengingat Jadwal</h4>
                        <span class="text-xs text-gray-400 font-medium">1 Jam Yang Lalu</span>
                    </div>
                    <p class="text-xs text-gray-500 font-medium mt-1">Konsultasi Akan Berlangsung Dalam 1 hari. Pastikan Anda Sudah Siap</p>
                </div>
            </div>
        </div>
    </div>
@endsection
