<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CallCenterController extends Controller
{
    public function index()
    {
        return view('pengaturan.call-center.index');
    }

    // Tambahkan method store di sini
    public function store(Request $request)
    {
        // Validasi data input dari form
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subjek' => 'required|string|max:255',
            'pesan' => 'required|string',
        ]);

        // Simpan ke database atau lakukan aksi pengiriman pesan di sini
        // Contoh: CallCenter::create($validated);

        // Redirect kembali dengan pesan sukses
        return redirect()->back()->with('success', 'Pesan Anda berhasil dikirim ke Call Center!');
    }
}