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
                <p class="text-4xl font-extrabold text-gray-900 mt-1">
                    {{ $jumlahPermintaan }}
                </p>
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
                    <p class="text-4xl font-extrabold text-gray-900 mt-2">
                        {{ $jumlahJadwalMendatang }}
                    </p>
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
                <p class="text-4xl font-extrabold text-gray-900 mt-2">
                    {{ $jumlahRiwayat }}
                </p>
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
        @if ($jadwalTerdekat)
            <div class="bg-white rounded-xl p-5 shadow-sm border border-gray-100">

                <!-- Judul Jadwal Konsultasi Terdekat -->
                <div class="flex items-center mb-6">
                    <i class="fas fa-calendar-alt text-[#1e3352] text-xl mr-3"></i>
                    <h3 class="font-bold text-gray-900 text-lg">Jadwal Konsultasi Terdekat</h3>
                </div>

                <div class="flex items-center justify-between mb-4">
                    <div class="flex items-center">
                        <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center text-blue-500 mr-4">
                            <i class="fas fa-desktop"></i>
                        </div>
                        <h4 class="font-bold text-gray-900 text-lg">
                            Konsultasi #{{ $jadwalTerdekat->id }}
                        </h4>
                    </div>

                    <span class="bg-green-100 text-green-700 text-xs font-bold px-3 py-1 rounded-full">
                        Disetujui
                    </span>
                </div>

                <div class="space-y-3 pl-14">
                    <div class="flex items-center text-sm text-gray-600 font-medium">
                        <i class="fas fa-calendar-alt w-5 text-gray-400 -ml-5"></i>
                        <span class="text-gray-900">
                            {{ \Carbon\Carbon::parse($jadwalTerdekat->tanggal_konsultasi)->format('d-m-Y') }}
                        </span>
                    </div>

                    <div class="flex items-center text-sm text-gray-600 font-medium">
                        <i class="fas fa-clock w-5 text-gray-400 -ml-5"></i>
                        <span class="text-gray-900">
                            {{ substr($jadwalTerdekat->waktu_konsultasi, 0, 5) }}
                        </span>
                    </div>

                    <div class="flex items-center text-sm text-gray-600 font-medium">
                        <i class="fas fa-video w-5 text-gray-400 -ml-5"></i>
                        <span class="text-gray-900">
                            {{ $jadwalTerdekat->link_meeting ? 'Online' : 'Metode belum tersedia' }}
                        </span>
                    </div>
                </div>

                <div class="flex flex-wrap mt-6 pl-14 gap-3">
                    <a href="{{ route('konsultasi.detail', $jadwalTerdekat->id) }}"
                       class="px-5 py-2 border border-blue-500 text-blue-500 font-bold text-sm rounded-full hover:bg-blue-50 transition">
                        <i class="fas fa-eye mr-2"></i> Lihat Detail
                    </a>

                    @if ($jadwalTerdekat->link_meeting)
                        <a href="{{ $jadwalTerdekat->link_meeting }}"
                           target="_blank"
                           rel="noopener noreferrer"
                           class="px-5 py-2 bg-blue-600 text-white font-bold text-sm rounded-full hover:bg-blue-700 transition shadow-md">
                            <i class="fas fa-video mr-2"></i> Gabung Meeting
                        </a>
                    @endif
                </div>
            </div>
        @else
            {{-- Tampilan ketika belum ada jadwal konsultasi --}}
            <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100 min-h-[280px] flex flex-col">

                <!-- Judul Jadwal Konsultasi Terdekat -->
                <div class="flex items-center mb-6 self-start">
                    <i class="fas fa-calendar-alt text-[#1e3352] text-xl mr-3"></i>
                    <h3 class="font-bold text-gray-900 text-lg">Jadwal Konsultasi Terdekat</h3>
                </div>

                <!-- Pesan kosong tetap berada di tengah -->
                <div class="flex-grow flex flex-col items-center justify-center text-center">
                    <i class="fas fa-calendar-alt text-gray-400 text-3xl mb-4"></i>

                    <p class="font-bold text-gray-700">
                        Belum Ada Jadwal Konsultasi
                    </p>

                    <p class="text-sm text-gray-500 mt-2">
                        Jadwal konsultasi yang telah disetujui akan ditampilkan di sini.
                    </p>

                    <a href="{{ route('konsultasi.index') }}"
                       class="inline-block mt-4 text-sm font-bold text-blue-600 hover:underline">
                        Lihat Konsultasi Saya
                    </a>
                </div>
            </div>
        @endif

        <!-- Status Pendaftaran Terbaru -->
        <div class="bg-white rounded-2xl p-6 border border-gray-200 shadow-sm flex flex-col">
            <div class="flex items-center mb-6">
                <i class="fas fa-file-alt text-[#1e3352] text-xl mr-3"></i>
                <h3 class="font-bold text-gray-900 text-lg">Status Pendaftaran Terbaru</h3>
            </div>

            @if ($pendaftaranTerbaru)
                <div class="flex-grow">
                    <h4 class="font-bold text-gray-900 text-lg">
                        Konsultasi #{{ $pendaftaranTerbaru->id }}
                    </h4>

                    <p class="text-xs text-gray-500 font-medium mt-1 mb-8">
                        Diajukan pada
                        {{ $pendaftaranTerbaru->created_at
                            ? \Carbon\Carbon::parse($pendaftaranTerbaru->created_at)->format('d M Y')
                            : '-' }}
                    </p>

                    @php
                        // Menentukan tahap progress berdasarkan status konsultasi
                        $status = $pendaftaranTerbaru->status;

                        $tahapAktif = match ($status) {
                            'pending' => 1,
                            'approved' => 3,
                            'rejected' => 2,
                            'completed' => 4,
                            default => 1,
                        };
                    @endphp

                    <!-- Stepper Progress -->
                    <div class="relative flex justify-between items-center w-full px-2">
                        <div class="absolute left-0 top-3 w-full h-0.5 bg-gray-200 z-0"></div>

                        <div class="absolute left-0 top-3 h-0.5 bg-blue-400 z-0"
                             style="width: {{ (($tahapAktif - 1) / 3) * 100 }}%"></div>

                        @foreach ([
                            1 => 'Pengajuan',
                            2 => 'Verifikasi',
                            3 => 'Dijadwalkan',
                            4 => 'Selesai',
                        ] as $nomor => $namaTahap)
                            <div class="relative z-10 flex flex-col items-center">
                                <div class="w-6 h-6 rounded-full bg-white border-2
                                    {{ $nomor < $tahapAktif ? 'border-green-500 text-green-500' : ($nomor == $tahapAktif ? 'border-blue-500 text-blue-500' : 'border-gray-300 text-gray-300') }}
                                    flex items-center justify-center">
                                    @if ($nomor < $tahapAktif)
                                        <i class="fas fa-check text-xs"></i>
                                    @elseif ($nomor == $tahapAktif)
                                        <div class="w-2 h-2 rounded-full bg-blue-500"></div>
                                    @endif
                                </div>

                                <p class="text-[10px] font-bold mt-2
                                    {{ $nomor <= $tahapAktif ? 'text-gray-800' : 'text-gray-500' }}">
                                    {{ $namaTahap }}
                                </p>

                                <p class="text-[10px] text-gray-500">
                                    @if ($nomor == 1)
                                        {{ \Carbon\Carbon::parse($pendaftaranTerbaru->created_at)->format('d M') }}
                                    @elseif ($nomor == 3 && $pendaftaranTerbaru->tanggal_konsultasi)
                                        {{ \Carbon\Carbon::parse($pendaftaranTerbaru->tanggal_konsultasi)->format('d M') }}
                                    @else
                                        &nbsp;
                                    @endif
                                </p>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="flex items-center justify-between mt-8 border-t border-gray-100 pt-5">
                    @if ($status === 'pending')
                        <span class="bg-yellow-100 text-yellow-700 text-xs font-bold px-3 py-1.5 rounded-md">
                            Menunggu Persetujuan
                        </span>
                    @elseif ($status === 'approved')
                        <span class="bg-green-100 text-green-700 text-xs font-bold px-3 py-1.5 rounded-md">
                            <i class="fas fa-check-circle mr-1.5"></i> Disetujui Admin
                        </span>
                    @elseif ($status === 'rejected')
                        <span class="bg-red-100 text-red-700 text-xs font-bold px-3 py-1.5 rounded-md">
                            <i class="fas fa-times-circle mr-1.5"></i> Ditolak
                        </span>
                    @elseif ($status === 'completed')
                        <span class="bg-blue-100 text-blue-700 text-xs font-bold px-3 py-1.5 rounded-md">
                            <i class="fas fa-check-circle mr-1.5"></i> Selesai
                        </span>
                    @endif

                    <a href="{{ route('konsultasi.detail', $pendaftaranTerbaru->id) }}"
                       class="px-4 py-1.5 border border-blue-400 text-blue-500 font-bold text-xs rounded-full hover:bg-blue-50 transition">
                        <i class="fas fa-eye mr-1"></i> Lihat Detail
                    </a>
                </div>
            @else
                <!-- Tampilan ketika belum ada pendaftaran -->
                <div class="flex-grow min-h-[220px] flex flex-col items-center justify-center text-center">
                    <i class="fas fa-file-alt text-gray-400 text-3xl mb-3"></i>

                    <p class="font-bold text-gray-700">
                        Belum Ada Pendaftaran
                    </p>

                    <p class="text-sm text-gray-500 mt-2">
                        Pendaftaran konsultasi yang kamu kirim akan ditampilkan di sini.
                    </p>

                    <a href="{{ route('konsultasi.booking') }}"
                       class="inline-block mt-4 text-sm font-bold text-blue-600 hover:underline">
                        Daftar Konsultasi
                    </a>
                </div>
            @endif
        </div>
    </div>

    <!-- Notifikasi Terbaru -->
    <div class="bg-white rounded-2xl border border-gray-200 shadow-sm">
        <div class="flex justify-between items-center p-5 border-b border-gray-100">
            <!-- Judul notifikasi menggunakan gaya yang sama dengan Status Pendaftaran -->
            <div class="flex items-center">
                <i class="fas fa-bell text-[#1e3352] text-xl mr-3"></i>
                <h3 class="font-bold text-gray-900 text-lg">Notifikasi Terbaru</h3>
            </div>

            <a href="{{ route('notifikasi.index') }}"
               class="text-sm font-bold text-blue-600 hover:underline">
                Lihat Semua
            </a>
        </div>

        <div class="divide-y divide-gray-100">
            @forelse ($notifikasiTerbaru as $notifikasi)
                <!-- Item Notifikasi dari Database -->
                <div class="p-5 flex items-start hover:bg-gray-50 transition
                    {{ $notifikasi->is_read ? '' : 'bg-blue-50/30' }}">

                    <div class="flex-shrink-0 w-8 h-8 rounded-full
                        {{ $notifikasi->is_read ? 'bg-gray-100 text-gray-500' : 'bg-blue-100 text-blue-500' }}
                        flex items-center justify-center mt-1">
                        <i class="fas fa-bell"></i>
                    </div>

                    <div class="ml-4 flex-1 min-w-0">
                        <div class="flex flex-wrap justify-between items-start gap-2">
                            <h4 class="text-sm font-bold text-gray-900">
                                {{ $notifikasi->judul }}
                            </h4>

                            <span class="text-xs text-gray-400 font-medium">
                                {{ $notifikasi->created_at
                                    ? \Carbon\Carbon::parse($notifikasi->created_at)->format('d M Y, H:i')
                                    : '-' }}
                            </span>
                        </div>

                        <p class="text-xs text-gray-500 font-medium mt-1">
                            {{ $notifikasi->pesan }}
                        </p>

                        @if (!$notifikasi->is_read)
                            <span class="inline-block mt-2 text-[10px] font-bold text-blue-600">
                                Belum dibaca
                            </span>
                        @endif
                    </div>
                </div>
            @empty
                <!-- Tampilan ketika belum ada notifikasi -->
                <div class="min-h-[180px] p-6 flex flex-col items-center justify-center text-center">
                    <i class="fas fa-bell-slash text-gray-400 text-3xl mb-3"></i>

                    <p class="font-bold text-gray-700">
                        Belum Ada Notifikasi
                    </p>

                    <p class="text-sm text-gray-500 mt-2">
                        Notifikasi terbaru akan muncul di sini.
                    </p>
                </div>
            @endforelse
        </div>
    </div>
@endsection