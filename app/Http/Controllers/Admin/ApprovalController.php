<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Konsultasi;
use Illuminate\Http\Request;

class ApprovalController extends Controller
{
    public function index()
    {
        // Mengambil data konsultasi beserta relasi client, urut terbaru
        $approvals = Konsultasi::with('client')->latest()->paginate(10);
        return view('admin.approval.index', compact('approvals'));
    }

    public function updateStatus(Request $request, $id)
    {
        $konsultasi = Konsultasi::findOrFail($id);

        $request->validate([
            'status' => 'required|in:pending,approved,rejected,completed',
            'link_meeting' => 'nullable|url' // Validasi link meeting jika diisi
        ]);

        $konsultasi->update([
            'status' => $request->status,
            'link_meeting' => $request->link_meeting ?? $konsultasi->link_meeting
        ]);

        $pesan = $request->status == 'approved' ? 'Konsultasi berhasil disetujui.' : 'Status konsultasi berhasil diperbarui.';

        return redirect()->back()->with('success', $pesan);
    }
}
