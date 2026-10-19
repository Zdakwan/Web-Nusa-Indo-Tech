<?php

namespace App\Http\Controllers;

use App\Models\PreferensiNotifikasi;
use Illuminate\Http\Request;

class PengaturanController extends Controller
{
    /**
     * Menampilkan halaman Pengaturan.
     */
    public function index()
    {
        $client = auth('client')->user();

        $preferensi = PreferensiNotifikasi::firstOrCreate(
            ['client_id' => $client->id],
            [
                'update_konsultasi' => true,
                'perubahan_jadwal' => true,
                'updated_proyek' => true,
                'artikel_ensiklopedia' => true,
            ]
        );

        return view('pengaturan.index', compact('preferensi'));
    }

    /**
     * Menyimpan perubahan pengaturan notifikasi.
     */
    public function updateNotifikasi(Request $request)
    {
        $client = auth('client')->user();

        $data = $request->validate([
            'update_konsultasi' => ['required', 'boolean'],
            'perubahan_jadwal' => ['required', 'boolean'],
            'updated_proyek' => ['required', 'boolean'],
            'artikel_ensiklopedia' => ['required', 'boolean'],
        ]);

        PreferensiNotifikasi::updateOrCreate(
            ['client_id' => $client->id],
            $data
        );

        return response()->json([
            'success' => true,
            'message' => 'Pengaturan notifikasi berhasil disimpan.',
        ]);
    }
}