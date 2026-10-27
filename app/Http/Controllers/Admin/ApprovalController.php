<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
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
     * Memperbarui status, jadwal, dan pesan konsultasi.
     * Notifikasi dibuat hanya jika jadwal berubah dan preferensinya aktif.
     */
    public function updateStatus(Request $request, $id)
    {
        $validated = $request->validate([
            'status' => 'required|in:approved,rejected,completed,pending',
            'pesan_admin' => 'nullable|string|max:10000',
            'tanggal_konsultasi' => 'nullable|date|after_or_equal:today',
            'waktu_konsultasi' => [
                'nullable',
                'date_format:H:i',
                'required_with:tanggal_konsultasi',
            ],
        ]);

        $konsultasi = Konsultasi::with('client')->findOrFail($id);

        $tanggalLama = $konsultasi->tanggal_konsultasi
            ? Carbon::parse($konsultasi->tanggal_konsultasi)->format('Y-m-d')
            : null;

        $waktuLama = $konsultasi->waktu_konsultasi
            ? substr((string) $konsultasi->waktu_konsultasi, 0, 5)
            : null;

        // Jika input tidak dikirim, pertahankan jadwal sebelumnya.
        $tanggalBaru = array_key_exists('tanggal_konsultasi', $validated)
            ? $validated['tanggal_konsultasi']
            : $tanggalLama;

        $waktuBaru = array_key_exists('waktu_konsultasi', $validated)
            ? $validated['waktu_konsultasi']
            : $waktuLama;

        $jadwalBerubah =
            $tanggalBaru !== $tanggalLama ||
            $waktuBaru !== $waktuLama;

        DB::transaction(function () use (
            $konsultasi,
            $validated,
            $tanggalBaru,
            $waktuBaru,
            $jadwalBerubah
        ) {
            $konsultasi->status = $validated['status'];

            if (array_key_exists('tanggal_konsultasi', $validated)) {
                $konsultasi->tanggal_konsultasi = $tanggalBaru;
            }

            if (array_key_exists('waktu_konsultasi', $validated)) {
                $konsultasi->waktu_konsultasi = $waktuBaru;
            }

            if (array_key_exists('pesan_admin', $validated)) {
                $konsultasi->pesan_admin = $validated['pesan_admin'];
            }

            $konsultasi->save();

            if (!$jadwalBerubah || !$konsultasi->client_id) {
                return;
            }

            $preferensi = PreferensiNotifikasi::firstOrCreate(
                ['client_id' => $konsultasi->client_id],
                [
                    'update_konsultasi' => true,
                    'perubahan_jadwal' => true,
                    'updated_proyek' => true,
                    'artikel_ensiklopedia' => true,
                ]
            );

            if (!$preferensi->perubahan_jadwal) {
                return;
            }

            $tanggalTampil = $tanggalBaru
                ? Carbon::parse($tanggalBaru)
                    ->locale('id')
                    ->translatedFormat('d F Y')
                : 'Belum ditentukan';

            $waktuTampil = $waktuBaru
                ? $waktuBaru . ' WIB'
                : 'Belum ditentukan';

            $pesan = 'Jadwal konsultasi '
                . ($konsultasi->jenis_konsultasi ?? 'Umum')
                . ' telah diperbarui. Jadwal terbaru: '
                . $tanggalTampil
                . ', pukul '
                . $waktuTampil
                . '.';

            if (!empty(trim($validated['pesan_admin'] ?? ''))) {
                $pesan .= ' Pesan admin: '
                    . trim($validated['pesan_admin']);
            }

            Notifikasi::create([
                'client_id' => $konsultasi->client_id,
                'judul' => 'Perubahan Jadwal Konsultasi',
                'pesan' => $pesan,
                'is_read' => false,
            ]);
        });

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

        $adminId = Auth::guard('admin')->id();

        if ($adminId) {
            $laporan->admin_id = $adminId;
        }

        $laporan->save();

        // Buat notifikasi saat admin mengirim balasan.
        if (
            !empty(trim($validated['pesan_admin'] ?? ''))
            && !empty($laporan->client_id)
        ) {
            DB::table('notifikasi')->insert([
                'client_id' => $laporan->client_id,
                'judul' => 'Balasan Call Center',
                'pesan' => 'Balasan untuk laporan "'
                    . $laporan->subjek
                    . '": '
                    . trim($validated['pesan_admin']),
                'is_read' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        return redirect()->back()->with(
            'success',
            'Status laporan dan pesan balasan berhasil disimpan. Notifikasi klien telah dibuat jika pesan dikirim.'
        );
    }
}