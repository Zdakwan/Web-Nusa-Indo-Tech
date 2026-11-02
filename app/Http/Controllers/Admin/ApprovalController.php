<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use App\Models\Konsultasi;
use App\Models\CallCenter;
use App\Models\Notifikasi;
use App\Models\PreferensiNotifikasi;

class ApprovalController extends Controller
{
    /**
     * Menampilkan daftar konsultasi dan laporan Call Center.
     */
    public function index()
    {
        $konsultasi = Konsultasi::with('client')
            ->orderByDesc('created_at')
            ->get();

        $laporanCallCenter = CallCenter::with('client')
            ->orderByDesc('created_at')
            ->get();

        return view('admin.approval.index', compact(
            'konsultasi',
            'laporanCallCenter'
        ));
    }

    /**
     * Memperbarui status, jadwal, dan pesan konsultasi secara langsung.
     */
    public function updateStatus(Request $request, $id)
    {
        // Validasi disesuaikan dengan nilai ENUM bahasa Indonesia di database
        $validated = $request->validate([
            'status' => 'required|in:Menunggu,Disetujui,Ditolak,Selesai',
            'pesan_admin' => 'nullable|string|max:10000',
            'tanggal_konsultasi' => 'nullable|date',
            'waktu_konsultasi' => 'nullable|date_format:H:i',
        ]);

        $konsultasi = Konsultasi::findOrFail($id);

        $jadwalBerubah = false;
        if (!empty($validated['tanggal_konsultasi']) && $validated['tanggal_konsultasi'] !== $konsultasi->tanggal_konsultasi) {
            $jadwalBerubah = true;
        }
        if (!empty($validated['waktu_konsultasi']) && substr($validated['waktu_konsultasi'], 0, 5) !== substr((string)$konsultasi->waktu_konsultasi, 0, 5)) {
            $jadwalBerubah = true;
        }

        // PAKSA UPDATE DATABASE SECARA LANGSUNG
        Konsultasi::where('id', $id)->update([
            'status' => $validated['status'],
            'pesan_admin' => $validated['pesan_admin'] ?? $konsultasi->pesan_admin,
            'tanggal_konsultasi' => $validated['tanggal_konsultasi'] ?? $konsultasi->tanggal_konsultasi,
            'waktu_konsultasi' => $validated['waktu_konsultasi'] ?? $konsultasi->waktu_konsultasi,
        ]);

        if ($jadwalBerubah && $konsultasi->client_id) {
            $preferensi = PreferensiNotifikasi::firstOrCreate(
                ['client_id' => $konsultasi->client_id],
                [
                    'update_konsultasi' => true,
                    'perubahan_jadwal' => true,
                    'updated_proyek' => true,
                    'artikel_ensiklopedia' => true,
                ]
            );

            if ($preferensi->perubahan_jadwal) {
                $tanggalTampil = Carbon::parse($validated['tanggal_konsultasi'] ?? $konsultasi->tanggal_konsultasi)
                    ->locale('id')
                    ->translatedFormat('d F Y');

                $waktuTampil = substr($validated['waktu_konsultasi'] ?? $konsultasi->waktu_konsultasi, 0, 5) . ' WIB';

                $pesan = 'Jadwal konsultasi ' . ($konsultasi->jenis_konsultasi ?? 'Umum') .
                         ' telah diperbarui. Jadwal terbaru: ' . $tanggalTampil . ', pukul ' . $waktuTampil . '.';

                if (!empty(trim($validated['pesan_admin'] ?? ''))) {
                    $pesan .= ' Pesan admin: ' . trim($validated['pesan_admin']);
                }

                Notifikasi::create([
                    'client_id' => $konsultasi->client_id,
                    'judul' => 'Perubahan Jadwal Konsultasi',
                    'pesan' => $pesan,
                    'is_read' => false,
                ]);
            }
        }

        return redirect()->back()->with(
            'success',
            $jadwalBerubah
                ? 'Jadwal dan status konsultasi berhasil diperbarui.'
                : 'Status dan pesan konsultasi berhasil diperbarui.'
        );
    }

    /**
     * Memperbarui status dan balasan laporan Call Center.
     */
    public function updateCallCenterStatus(Request $request, $id)
    {
        $validated = $request->validate([
            'status' => 'required|in:menunggu,diproses,selesai,ditolak',
            'pesan_admin' => 'nullable|string|max:10000',
        ]);

        $laporan = CallCenter::findOrFail($id);
        $laporan->status = $validated['status'];
        $laporan->pesan_admin = $validated['pesan_admin'] ?? null;

        if ($adminId = Auth::guard('admin')->id()) {
            $laporan->admin_id = $adminId;
        }

        $laporan->save();

        // Buat notifikasi saat admin mengirim balasan
        if (!empty(trim($validated['pesan_admin'] ?? '')) && !empty($laporan->client_id)) {
            Notifikasi::create([
                'client_id' => $laporan->client_id,
                'judul' => 'Balasan Call Center',
                'pesan' => 'Balasan untuk laporan "' . $laporan->subjek . '": ' . trim($validated['pesan_admin']),
                'is_read' => false,
            ]);
        }

        return redirect()->back()->with(
            'success',
            'Status laporan dan pesan balasan berhasil disimpan. Notifikasi klien telah dibuat jika pesan dikirim.'
        );
    }
}
