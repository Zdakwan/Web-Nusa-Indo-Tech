<?php

namespace App\Http\Controllers;

use App\Models\Proyek;
use Illuminate\Support\Facades\Auth;

class ProyekClientController extends Controller
{
    /**
     * Menampilkan daftar proyek milik client yang sedang login.
     */
    public function index()
    {
        $clientId = Auth::guard('client')->id();

        $proyek = Proyek::with('konsultasi')
            ->where('client_id', $clientId)
            ->latest()
            ->paginate(10);

        return view('ProyekClient.index', compact('proyek'));
    }

    /**
     * Menampilkan detail proyek milik client yang sedang login.
     */
    public function show($id)
    {
        $clientId = Auth::guard('client')->id();

        // Client hanya dapat membuka proyek miliknya sendiri.
        $proyek = Proyek::with([
            'konsultasi',
            'riwayat.admin',
        ])
            ->where('client_id', $clientId)
            ->findOrFail($id);

        return view('ProyekClient.show', compact('proyek'));
    }
}