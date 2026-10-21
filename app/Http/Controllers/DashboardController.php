<?php

namespace App\Http\Controllers;

use App\Models\Konsultasi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    // Menampilkan dashboard dengan data konsultasi client
    public function index()
    {
        $client = Auth::guard('client')->user();

        // Menghitung seluruh permintaan konsultasi milik client
        $jumlahPermintaan = DB::table('konsultasi')
            ->where('client_id', $client->id)
            ->count();

        // Menghitung jadwal yang sudah disetujui dan belum lewat
        $jumlahJadwalMendatang = DB::table('konsultasi')
            ->where('client_id', $client->id)
            ->where('status', 'approved')
            ->whereRaw(
                'TIMESTAMP(tanggal_konsultasi, waktu_konsultasi) >= ?',
                [now()]
            )
            ->count();

        // Menghitung konsultasi yang sudah selesai
        $jumlahRiwayat = DB::table('konsultasi')
            ->where('client_id', $client->id)
            ->where('status', 'completed')
            ->count();

        // Mengambil jadwal konsultasi terdekat yang sudah disetujui
        $jadwalTerdekat = Konsultasi::where('client_id', $client->id)
            ->where('status', 'approved')
            ->whereRaw(
                'TIMESTAMP(tanggal_konsultasi, waktu_konsultasi) >= ?',
                [now()]
            )
            ->orderBy('tanggal_konsultasi')
            ->orderBy('waktu_konsultasi')
            ->first();

        // Mengambil satu pendaftaran konsultasi terbaru milik client
        $pendaftaranTerbaru = Konsultasi::where('client_id', $client->id)
            ->latest()
            ->first();

        // Mengambil lima notifikasi terbaru milik client
        $notifikasiTerbaru = DB::table('notifikasi')
            ->where('client_id', $client->id)
            ->orderByDesc('created_at')
            ->limit(5)
            ->get();

        // Mengirim seluruh data ke halaman dashboard
        return view('dashboard', compact(
            'jumlahPermintaan',
            'jumlahJadwalMendatang',
            'jumlahRiwayat',
            'jadwalTerdekat',
            'pendaftaranTerbaru',
            'notifikasiTerbaru'
        ));
    }
}