@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-[#f1f5f9] px-10 py-8">

    {{-- TOMBOL KEMBALI --}}
    <div class="mb-2">
        <a href="{{ route('konsultasi.index') }}" class="inline-flex items-center gap-1 text-gray-500 hover:text-gray-700 transition text-lg">
            <i class="fas fa-sign-in-alt rotate-180"></i> Kembali
        </a>
    </div>

    {{-- HEADER HALAMAN --}}
    <div class="mb-4">
        <h1 class="text-4xl font-bold text-black">
            Detail Pendaftaran Konsultasi
        </h1>
        <p class="text-gray-500 text-lg mt-1">
            Informasi lengkap mengenai pengajuan konsultasi Anda.
        </p>
    </div>

    {{-- GRID UTAMA --}}
    <div class="grid grid-cols-1 xl:grid-cols-[2fr_1fr] gap-3">

        {{-- KOLOM KIRI --}}
        <div class="space-y-3">

            {{-- HEADER KONSULTASI --}}
            <div class="bg-white border border-gray-300 rounded-xl px-4 py-3">
                <div class="flex items-center justify-between gap-4">
                    <div class="flex items-center gap-4">
                        <div class="w-16 h-16 rounded-full bg-[#2874d0] flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-chalkboard-teacher text-white text-3xl"></i>
                        </div>
                        <div>
                            <h2 class="text-3xl font-bold text-black">
                                {{ $konsultasi['judul'] }}
                            </h2>
                            <p class="text-gray-400 text-base mt-0.5">
                                Kode Pengajuan: {{ $konsultasi['kode_pengajuan'] }}
                            </p>
                        </div>
                    </div>

                    {{-- BADGE STATUS --}}
                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-sm font-semibold whitespace-nowrap
                        @if ($konsultasi['status_database'] === 'approved')
                            bg-[#dff8d8] text-[#258b35]
                        @elseif ($konsultasi['status_database'] === 'completed')
                            bg-[#dff8d8] text-[#258b35]
                        @elseif ($konsultasi['status_database'] === 'rejected')
                            bg-[#fee2e2] text-[#b91c1c]
                        @else
                            bg-[#fff7e8] text-[#e89b00]
                        @endif
                    ">
                        @if ($konsultasi['status_database'] === 'approved' || $konsultasi['status_database'] === 'completed')
                            <i class="fas fa-check-circle"></i>
                        @elseif ($konsultasi['status_database'] === 'rejected')
                            <i class="fas fa-times-circle"></i>
                        @else
                            <i class="fas fa-clock"></i>
                        @endif

                        {{ $konsultasi['status'] }}
                    </span>
                </div>
            </div>

            {{-- STATUS PENDAFTARAN --}}
            <div class="bg-white border border-gray-300 rounded-xl px-4 py-4">
                <h2 class="text-lg font-semibold text-black mb-6">
                    Status Pendaftaran Terbaru
                </h2>

                @php
                    $statusDatabase = $konsultasi['status_database'];
                    $tahapAktif = match ($statusDatabase) {
                        'pending' => 1,
                        'approved' => 3,
                        'rejected' => 2,
                        'completed' => 4,
                        default => 1,
                    };
                @endphp

                {{-- PROGRESS --}}
                <div class="relative px-5">
                    <div class="absolute left-[8%] right-[8%] top-3.5 h-0.5 bg-gray-300"></div>

                    <div class="relative grid grid-cols-4">

                        {{-- PENGAJUAN --}}
                        <div class="flex flex-col items-center text-center">
                            <div class="w-7 h-7 rounded-full bg-white border-[3px] border-[#5bdf70] flex items-center justify-center z-10">
                                <i class="fas fa-check text-[#42ca59] text-xs"></i>
                            </div>
                            <p class="text-xs font-semibold text-black mt-2">Pengajuan</p>
                            <span class="text-[9px] text-gray-500">
                                {{ $konsultasi['tanggal_pengajuan'] }}
                            </span>
                        </div>

                        {{-- DIVERIFIKASI --}}
                        <div class="flex flex-col items-center text-center">
                            <div class="w-7 h-7 rounded-full bg-white border-[3px]
                                {{ in_array($statusDatabase, ['approved', 'rejected', 'completed']) ? 'border-[#5bdf70]' : 'border-gray-300' }}
                                flex items-center justify-center z-10">
                                @if (in_array($statusDatabase, ['approved', 'rejected', 'completed']))
                                    <i class="fas fa-check text-[#42ca59] text-xs"></i>
                                @endif
                            </div>
                            <p class="text-xs font-semibold text-black mt-2">Diverifikasi</p>
                            <span class="text-[9px] text-gray-500">
                                @if ($statusDatabase === 'pending')
                                    Menunggu
                                @else
                                    {{ $konsultasi['status'] }}
                                @endif
                            </span>
                        </div>

                        {{-- DIJADWALKAN --}}
                        <div class="flex flex-col items-center text-center">
                            <div class="w-7 h-7 rounded-full bg-white border-[3px]
                                {{ in_array($statusDatabase, ['approved', 'completed']) ? 'border-[#19b5ff]' : 'border-gray-300' }}
                                flex items-center justify-center z-10">
                                @if (in_array($statusDatabase, ['approved', 'completed']))
                                    <div class="w-2.5 h-2.5 rounded-full bg-[#19b5ff]"></div>
                                @endif
                            </div>
                            <p class="text-xs font-semibold text-black mt-2">Dijadwalkan</p>
                            <span class="text-[9px] text-gray-500">
                                @if (in_array($statusDatabase, ['approved', 'completed']))
                                    Jadwal tersedia
                                @else
                                    Menunggu
                                @endif
                            </span>
                        </div>

                        {{-- SELESAI --}}
                        <div class="flex flex-col items-center text-center">
                            <div class="w-7 h-7 rounded-full bg-white border-[3px]
                                {{ $statusDatabase === 'completed' ? 'border-[#5bdf70]' : 'border-gray-300' }}
                                flex items-center justify-center z-10">
                                @if ($statusDatabase === 'completed')
                                    <i class="fas fa-check text-[#42ca59] text-xs"></i>
                                @endif
                            </div>
                            <p class="text-xs font-semibold text-black mt-2">Selesai</p>
                            <span class="text-[9px] text-gray-500">
                                {{ $statusDatabase === 'completed' ? 'Selesai' : '-' }}
                            </span>
                        </div>
                    </div>
                </div>

                {{-- PESAN STATUS UMUM --}}
                <div class="mt-6 rounded-xl px-4 py-3 flex items-center gap-3
                    {{ $statusDatabase === 'rejected' ? 'bg-[#fee2e2]' : 'bg-[#e3faf1]' }}">

                    <div class="w-7 h-7 rounded-full bg-white flex items-center justify-center flex-shrink-0">
                        @if ($statusDatabase === 'rejected')
                            <i class="fas fa-times-circle text-red-600 text-lg"></i>
                        @else
                            <i class="fas fa-info-circle text-[#2daf39] text-lg"></i>
                        @endif
                    </div>
                    <div>
                        <p class="text-sm font-semibold text-black">
                            {{ $konsultasi['catatan_admin'] }}
                        </p>
                        @if ($statusDatabase === 'approved' || $statusDatabase === 'completed')
                            <p class="text-xs text-gray-600 mt-0.5">Silakan periksa informasi jadwal konsultasi.</p>
                        @elseif ($statusDatabase === 'pending')
                            <p class="text-xs text-gray-600 mt-0.5">Status akan diperbarui setelah ada keputusan Admin.</p>
                        @endif
                    </div>
                </div>

                {{-- PESAN BALASAN DARI ADMIN (Fitur Anda) --}}
                @if(!empty($konsultasi['pesan_admin']))
                    <div class="bg-blue-50 border border-blue-200 p-4 rounded-xl mt-3 flex gap-3">
                        <div class="mt-0.5">
                            <i class="fas fa-info-circle text-blue-600 text-lg"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-blue-800 text-sm mb-1">Pesan dari Admin Layanan:</h4>
                            <p class="text-blue-900 text-sm leading-relaxed">{{ $konsultasi['pesan_admin'] }}</p>
                        </div>
                    </div>
                @endif

            </div>

            {{-- INFORMASI KONSULTASI --}}
            <div class="bg-white border border-gray-300 rounded-xl px-4 py-4">
                <h2 class="text-base font-semibold text-black flex items-center gap-3 mb-5">
                    <i class="far fa-calendar-alt text-[#19375c] text-lg"></i>
                    Informasi Konsultasi
                </h2>

                <div class="space-y-5 text-xs">
                    <div class="grid grid-cols-[145px_15px_1fr]">
                        <span>Jenis Konsultasi</span>
                        <span>:</span>
                        <span>{{ $konsultasi['jenis_konsultasi'] }}</span>
                    </div>

                    <div class="grid grid-cols-[145px_15px_1fr]">
                        <span>Deskripsi Kebutuhan</span>
                        <span>:</span>
                        <span class="whitespace-pre-line">{{ $konsultasi['deskripsi_kebutuhan'] }}</span>
                    </div>

                    <div class="grid grid-cols-[145px_15px_1fr]">
                        <span>Tanggal Pengajuan</span>
                        <span>:</span>
                        <span>{{ $konsultasi['tanggal_pengajuan'] }}</span>
                    </div>

                    <div class="grid grid-cols-[145px_15px_1fr] items-center">
                        <span>Status</span>
                        <span>:</span>
                        <span>
                            <span class="inline-flex px-4 py-1 rounded-md text-white {{ $statusDatabase === 'rejected' ? 'bg-red-600' : 'bg-[#4285eb]' }}">
                                {{ $konsultasi['status_konsultasi'] }}
                            </span>
                        </span>
                    </div>
                </div>
            </div>

            {{-- INFORMASI PERUSAHAAN --}}
            <div class="bg-white border border-gray-300 rounded-xl px-4 py-4">
                <h2 class="text-base font-semibold text-black flex items-center gap-3 mb-5">
                    <i class="far fa-building text-[#19375c] text-lg"></i>
                    Informasi Perusahaan
                </h2>

                <div class="space-y-4 text-xs">
                    <div class="grid grid-cols-[145px_15px_1fr]">
                        <span>Nama Perusahaan</span>
                        <span>:</span>
                        <span>{{ $konsultasi['nama_perusahaan'] }}</span>
                    </div>
                    <div class="grid grid-cols-[145px_15px_1fr]">
                        <span>Nama PIC</span>
                        <span>:</span>
                        <span>{{ $konsultasi['nama_pic'] }}</span>
                    </div>
                    <div class="grid grid-cols-[145px_15px_1fr]">
                        <span>Email PIC</span>
                        <span>:</span>
                        <span>{{ $konsultasi['email_pic'] }}</span>
                    </div>
                    <div class="grid grid-cols-[145px_15px_1fr]">
                        <span>No. Telp</span>
                        <span>:</span>
                        <span>{{ $konsultasi['no_telp'] }}</span>
                    </div>
                    <div class="grid grid-cols-[145px_15px_1fr]">
                        <span>Jabatan</span>
                        <span>:</span>
                        <span>{{ $konsultasi['jabatan'] }}</span>
                    </div>
                </div>
            </div>
        </div>

        {{-- KOLOM KANAN --}}
        <div class="space-y-3">

            {{-- INFORMASI KONSULTASI / VIDEO --}}
            <div class="bg-white border border-gray-300 rounded-xl h-[255px] px-4 py-4 flex flex-col">
                <h2 class="text-sm font-semibold text-black flex items-center gap-3">
                    <i class="far fa-calendar-alt text-[#19375c] text-lg"></i>
                    Informasi Konsultasi
                </h2>

                <div class="flex-1 flex items-end justify-center">
                    @if (in_array($statusDatabase, ['approved', 'completed']))
                        <a href="{{ route('konsultasi.jadwal', $konsultasi['id']) }}" title="Lihat Jadwal Konsultasi" class="w-24 h-5 bg-[#2874d0] hover:bg-[#2167bd] rounded-full text-white flex items-center justify-center transition">
                            <i class="fas fa-video text-[10px]"></i>
                        </a>
                    @else
                        <span class="text-xs text-gray-500 text-center">
                            Jadwal belum dikonfirmasi Admin.
                        </span>
                    @endif
                </div>
            </div>

            {{-- CATATAN STATUS --}}
            <div class="bg-white border border-gray-300 rounded-xl px-3 py-3">
                <h2 class="text-sm font-semibold text-black flex items-center gap-3 mb-3">
                    <i class="far fa-comment text-[#19375c] text-xl"></i>
                    Informasi Status
                </h2>
                <div class="bg-[#dce9fc] rounded-xl px-4 py-4 text-gray-600 text-sm">
                    <p>{{ $konsultasi['catatan_admin'] }}</p>
                </div>
            </div>

            {{-- RIWAYAT AKTIVITAS --}}
            <div class="bg-white border border-gray-300 rounded-xl overflow-hidden">
                <div class="px-4 py-3 border-b border-gray-200">
                    <h2 class="text-sm font-semibold text-black flex items-center gap-3">
                        <i class="fas fa-history text-[#19375c] text-lg"></i>
                        Riwayat Aktivitas
                    </h2>
                </div>

                <div class="px-8 py-5">
                    <div class="relative">
                        {{-- GARIS TIMELINE --}}
                        <div class="absolute left-[7px] top-2 bottom-2 w-0.5 bg-gray-300"></div>

                        <div class="space-y-5">
                            @forelse ($konsultasi['riwayat'] as $aktivitas)
                                <div class="relative flex items-start gap-4">
                                    <div class="relative z-10 w-4 h-4 rounded-full flex-shrink-0
                                        @if ($aktivitas['warna'] === 'green') bg-[#0ee978]
                                        @elseif ($aktivitas['warna'] === 'blue') bg-[#19aef5]
                                        @else bg-gray-300
                                        @endif
                                    "></div>
                                    <div>
                                        <p class="text-xs font-semibold text-black">{{ $aktivitas['judul'] }}</p>
                                        <p class="text-[9px] text-gray-500 mt-0.5">{{ $aktivitas['tanggal'] }}</p>
                                    </div>
                                </div>
                            @empty
                                <p class="text-xs text-gray-500">Belum ada riwayat aktivitas.</p>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>

            {{-- TOMBOL BATALKAN --}}
            <div class="bg-white border border-gray-300 rounded-xl px-3 py-2 flex flex-col items-end">
                <button type="button" disabled title="Fitur pembatalan belum tersedia" class="bg-gray-400 text-white text-sm font-medium px-3 py-2 rounded-md flex items-center gap-2 cursor-not-allowed">
                    <i class="fas fa-times-circle"></i>
                    Batalkan Pendaftaran
                </button>
                <p class="text-[9px] text-gray-400 mt-1">
                    *Fitur pembatalan belum tersedia.
                </p>
            </div>
        </div>
    </div>
</div>

@endsection
