<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Proyek;
use App\Models\RiwayatProyek;
use App\Models\Konsultasi;
use App\Models\Notifikasi;
use App\Models\PreferensiNotifikasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use Barryvdh\DomPDF\Facade\Pdf;

class AdminProyekController extends Controller
{
    /**
     * Menampilkan daftar seluruh proyek.
     */
    public function index()
    {
        $proyek = Proyek::with(['client', 'konsultasi'])
            ->latest()
            ->paginate(10);

        return view('admin.proyek.index', compact('proyek'));
    }

    /**
     * Menampilkan formulir tambah proyek.
     * Hanya konsultasi approved yang belum memiliki proyek.
     */
    public function create()
    {
        $konsultasis = Konsultasi::with('client')
            ->where('status', 'approved')
            ->whereDoesntHave('proyek')
            ->latest()
            ->get();

        // Siapkan data konsultasi untuk ditampilkan melalui JavaScript.
        $daftarKonsultasi = $konsultasis->map(function ($konsultasi) {
            return [
                'id' => $konsultasi->id,
                'client' => $konsultasi->client->name ?? '-',
                'perusahaan' => $konsultasi->nama_perusahaan ?? '-',
                'jenis' => $konsultasi->jenis_konsultasi ?? 'Umum',
                'tanggal' => $konsultasi->tanggal_konsultasi
                    ? \Carbon\Carbon::parse($konsultasi->tanggal_konsultasi)
                        ->locale('id')
                        ->translatedFormat('d F Y')
                    : '-',
            ];
        })->values();

        return view('admin.proyek.create', compact(
            'konsultasis',
            'daftarKonsultasi'
        ));
    }

    /**
     * Menyimpan proyek berdasarkan konsultasi yang disetujui.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'konsultasi_id' => 'required|exists:konsultasi,id',
            'nama_proyek' => 'required|string|max:255',
            'deskripsi' => 'nullable|string|max:5000',
        ]);

        DB::transaction(function () use ($validated) {

            // Ambil konsultasi dan kunci selama proses penyimpanan.
            $konsultasi = Konsultasi::where('id', $validated['konsultasi_id'])
                ->lockForUpdate()
                ->firstOrFail();

            // Pastikan konsultasi sudah disetujui.
            if ($konsultasi->status !== 'approved') {
                throw ValidationException::withMessages([
                    'konsultasi_id' => 'Konsultasi belum disetujui Admin.',
                ]);
            }

            // Pastikan konsultasi belum pernah menjadi proyek.
            if (Proyek::where('konsultasi_id', $konsultasi->id)->exists()) {
                throw ValidationException::withMessages([
                    'konsultasi_id' => 'Konsultasi ini sudah memiliki proyek.',
                ]);
            }

            $adminId = Auth::guard('admin')->id();

            // Buat proyek berdasarkan data konsultasi.
            $proyek = Proyek::create([
                'konsultasi_id' => $konsultasi->id,
                'client_id' => $konsultasi->client_id,
                'admin_id' => $adminId,
                'nama_proyek' => $validated['nama_proyek'],
                'deskripsi' => $validated['deskripsi'] ?? null,
                'progres' => 0,
                'status' => 'berjalan',
            ]);

            // Simpan riwayat awal proyek.
            RiwayatProyek::create([
                'proyek_id' => $proyek->id,
                'admin_id' => $adminId,
                'progres' => 0,
                'catatan' => 'Proyek berhasil dibuat berdasarkan konsultasi yang disetujui.',
            ]);
        });

        return redirect()
            ->route('admin.proyek.index')
            ->with('success', 'Proyek berhasil dibuat berdasarkan konsultasi.');
    }

    /**
     * Menampilkan detail proyek.
     */
    public function show($id)
    {
        $proyek = Proyek::with([
            'client',
            'admin',
            'konsultasi',
            'riwayat.admin',
        ])->findOrFail($id);

        return view('admin.proyek.show', compact('proyek'));
    }

    /**
     * Menampilkan halaman edit progres proyek.
     */
    public function edit($id)
    {
        $proyek = Proyek::with(['client', 'konsultasi'])
            ->findOrFail($id);

        return view('admin.proyek.edit', compact('proyek'));
    }

    /**
     * Memperbarui informasi proyek.
     */
    public function update(Request $request, $id)
    {
        $proyek = Proyek::findOrFail($id);

        $validated = $request->validate([
            'nama_proyek' => 'required|string|max:255',
            'deskripsi' => 'nullable|string|max:5000',
        ]);

        $proyek->update($validated);

        return redirect()
            ->route('admin.proyek.show', $proyek->id)
            ->with('success', 'Informasi proyek berhasil diperbarui.');
    }

    /**
     * Memperbarui progres dan membuat notifikasi untuk client.
     */
    public function updateProgress(Request $request, $id)
    {
        $validated = $request->validate([
            'progres' => 'required|integer|min:0|max:100',
            'catatan' => 'required|string|max:5000',
        ]);

        $adminId = Auth::guard('admin')->id();
        $proyek = Proyek::findOrFail($id);

        DB::transaction(function () use (
            $proyek,
            $validated,
            $adminId
        ) {
            $proyek->update([
                'progres' => $validated['progres'],
                'status' => $validated['progres'] == 100
                    ? 'selesai'
                    : 'berjalan',
            ]);

            // Simpan riwayat perkembangan.
            RiwayatProyek::create([
                'proyek_id' => $proyek->id,
                'admin_id' => $adminId,
                'progres' => $validated['progres'],
                'catatan' => $validated['catatan'],
            ]);

            // Ambil preferensi notifikasi client.
            $preferensi = PreferensiNotifikasi::firstOrCreate(
                ['client_id' => $proyek->client_id],
                [
                    'update_konsultasi' => true,
                    'perubahan_jadwal' => true,
                    'updated_proyek' => true,
                    'artikel_ensiklopedia' => true,
                ]
            );

            // Kirim notifikasi jika preferensi aktif.
            if ($preferensi->updated_proyek) {
                Notifikasi::create([
                    'client_id' => $proyek->client_id,
                    'judul' => 'Updated Proyek',
                    'pesan' => 'Progres proyek "' . $proyek->nama_proyek
                        . '" telah diperbarui menjadi '
                        . $validated['progres'] . '%. '
                        . 'Catatan perkembangan: '
                        . $validated['catatan'],
                    'is_read' => false,
                ]);
            }
        });

        return redirect()
            ->route('admin.proyek.show', $proyek->id)
            ->with('success', 'Progres proyek berhasil diperbarui.');
    }

    /**
     * Menghapus proyek.
     */
    public function destroy($id)
    {
        $proyek = Proyek::findOrFail($id);
        $proyek->delete();

        return redirect()
            ->route('admin.proyek.index')
            ->with('success', 'Proyek berhasil dihapus.');

    }

    public function exportSinglePdf($id)
    {
        // 1. Ambil data 1 proyek beserta relasi client-nya
        $proyek = \App\Models\Proyek::with('client')->findOrFail($id);

        // 2. Load file single_pdf.blade.php
        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('admin.proyek.single_pdf', compact('proyek'))
                ->setPaper('a4', 'portrait')
                ->setOption('isRemoteEnabled', true);

        // 3. Tampilkan PDF di tab baru (Preview / Stream)
        return $pdf->stream('Laporan-Rincian-' . str_replace(' ', '-', $proyek->nama_proyek) . '.pdf');
    }
}
