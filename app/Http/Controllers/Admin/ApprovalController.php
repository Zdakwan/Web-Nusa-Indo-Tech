<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Konsultasi; // Pastikan model Konsultasi di-import

class ApprovalController extends Controller
{
    public function index()
    {
        // Mengambil semua data konsultasi, diurutkan dari yang terbaru
        $konsultasi = Konsultasi::with('client')->orderBy('created_at', 'desc')->get();
        return view('admin.approval.index', compact('konsultasi'));
    }

    public function updateStatus(Request $request, $id)
    {
        // Validasi input dari modal
        $request->validate([
            'status' => 'required|in:approved,rejected,completed,pending',
            'pesan_admin' => 'nullable|string'
        ]);

        // Cari data konsultasi
        $konsultasi = Konsultasi::findOrFail($id);

        // Update status dan simpan pesan balasan
        $konsultasi->status = $request->status;
        if ($request->pesan_admin) {
            $konsultasi->pesan_admin = $request->pesan_admin;
        }
        $konsultasi->save();

        // (Opsional) Jika Anda menggunakan sistem notifikasi bawaan Laravel:
        // $konsultasi->client->notify(new \App\Notifications\KonsultasiDiupdate($konsultasi));

        return redirect()->back()->with('success', 'Status konsultasi berhasil diperbarui dan pesan balasan telah dikirim ke Klien.');
    }
}
