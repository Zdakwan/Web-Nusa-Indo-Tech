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

    public function exportPdf($id)
    {
        // 1. Ambil data proyek HANYA JIKA milik client yang sedang login
        $proyek = \App\Models\Proyek::with('client')
                    ->where('client_id', \Illuminate\Support\Facades\Auth::guard('client')->id())
                    ->findOrFail($id);

        // 2. Load template PDF
        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('admin.proyek.single_pdf', compact('proyek'))
                ->setPaper('a4', 'portrait')
                ->setOption('isRemoteEnabled', true);

        // 3. Tampilkan PDF di tab baru (Preview / Stream)
        return $pdf->stream('Laporan-Rincian-' . str_replace(' ', '-', $proyek->nama_proyek) . '.pdf', ['Attachment' => false]);
    }
}
