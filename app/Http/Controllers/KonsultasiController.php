<?php

namespace App\Http\Controllers;

use App\Models\Konsultasi;
use App\Models\Notifikasi;
use App\Models\PreferensiNotifikasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class KonsultasiController extends Controller
{
    // Menampilkan formulir booking konsultasi.
    public function booking()
    {
        return view('konsultasi.booking');
    }

    /**
     * Menyimpan pendaftaran konsultasi dari client.
     */
    public function store(Request $request)
    {
        // Memvalidasi data yang dikirim melalui formulir booking.
        $validated = $request->validate([
            'nama_perusahaan' => 'required|string|max:255',
            'nama_pic' => 'required|string|max:255',
            'jabatan_pic' => 'nullable|string|max:100',
            'email_pic' => 'required|email|max:255',
            'telepon_pic' => 'required|string|max:30',
            'jenis_konsultasi' => 'required|in:IT Training,IT Consulting,Software Development',
            'deskripsi_kebutuhan' => 'required|string|max:5000',
            'tanggal_konsultasi' => 'required|date|after_or_equal:today',
            'waktu_konsultasi' => 'required|date_format:H:i',
        ]);

        // Mengambil ID client yang sedang login.
        $clientId = Auth::guard('client')->id();

        // Pastikan proses hanya berjalan untuk client yang sudah login.
        if (!$clientId) {
            abort(401, 'Silakan login terlebih dahulu.');
        }

        // Menyimpan konsultasi dan notifikasi dalam satu transaksi.
        DB::transaction(function () use ($validated, $clientId) {
            // Menyimpan pendaftaran konsultasi.
            $konsultasi = Konsultasi::create([
                'client_id' => $clientId,
                'nama_perusahaan' => $validated['nama_perusahaan'],
                'nama_pic' => $validated['nama_pic'],
                'jabatan_pic' => $validated['jabatan_pic'] ?? null,
                'email_pic' => $validated['email_pic'],
                'telepon_pic' => $validated['telepon_pic'],
                'jenis_konsultasi' => $validated['jenis_konsultasi'],
                'tanggal_konsultasi' => $validated['tanggal_konsultasi'],
                'waktu_konsultasi' => $validated['waktu_konsultasi'],
                'catatan_klien' => $validated['deskripsi_kebutuhan'],
                'status' => 'pending',
            ]);

            /*
             * Ambil preferensi khusus client yang sedang login.
             * Jika belum ada, buat preferensi dengan semua notifikasi aktif.
             */
            $preferensi = PreferensiNotifikasi::firstOrCreate(
                ['client_id' => $clientId],
                [
                    'update_konsultasi' => true,
                    'perubahan_jadwal' => true,
                    'updated_proyek' => true,
                    'artikel_ensiklopedia' => true,
                ]
            );

            /*
             * Buat notifikasi pendaftaran hanya jika update konsultasi aktif.
             * Pendaftaran konsultasi tetap tersimpan meskipun notifikasi OFF.
             */
            if ($preferensi->update_konsultasi) {
                Notifikasi::create([
                    'client_id' => $clientId,
                    'judul' => 'Pendaftaran Konsultasi Berhasil',
                    'pesan' => 'Pendaftaran konsultasi '
                        . $konsultasi->jenis_konsultasi
                        . ' berhasil dikirim dan sedang menunggu persetujuan Admin.',
                    'is_read' => false,
                ]);
            }
        });

        // Mengarahkan client ke dashboard setelah pendaftaran berhasil.
        return redirect()
            ->route('dashboard')
            ->with('success', 'Pendaftaran konsultasi berhasil dikirim.');
    }

    /**
     * Menampilkan daftar konsultasi milik client yang login.
     */
    public function index()
    {
        $konsultasis = Konsultasi::where(
            'client_id',
            Auth::guard('client')->id()
        )
            ->orderByDesc('created_at')
            ->get()
            ->map(function ($konsultasi) {
                $daftarStatus = [
                    'pending' => 'Menunggu Persetujuan',
                    'approved' => 'Disetujui Admin',
                    'rejected' => 'Ditolak',
                    'completed' => 'Selesai',
                ];

                // Memformat waktu pembuatan data menjadi WIB.
                $tanggalPengajuan = $konsultasi->created_at
                    ? $konsultasi->created_at
                        ->timezone('Asia/Jakarta')
                        ->locale('id')
                        ->translatedFormat('d M Y, H:i')
                    : '-';

                // Menampilkan tanggal dan waktu konsultasi.
                if (in_array($konsultasi->status, ['approved', 'completed'])) {
                    $jadwal = \Carbon\Carbon::parse(
                        $konsultasi->tanggal_konsultasi
                    )
                        ->locale('id')
                        ->translatedFormat('d M Y');

                    if ($konsultasi->waktu_konsultasi) {
                        $jadwal .= ', ' . substr(
                            $konsultasi->waktu_konsultasi,
                            0,
                            5
                        );
                    }
                } else {
                    $jadwal = 'Menunggu konfirmasi';
                }

                return [
                    'id' => $konsultasi->id,
                    'judul' => 'Konsultasi ' . $konsultasi->jenis_konsultasi,
                    'kategori' => $konsultasi->jenis_konsultasi,
                    'tanggal_pengajuan' => $tanggalPengajuan,
                    'jadwal' => $jadwal,
                    'status' => $daftarStatus[$konsultasi->status]
                        ?? $konsultasi->status,
                ];
            });

        return view('konsultasi.index', compact('konsultasis'));
    }

    /**
     * Menampilkan detail konsultasi milik client yang sedang login.
     */
    public function detail($id)
    {
        // Memastikan konsultasi ditemukan dan dimiliki client yang login.
        $data = Konsultasi::where('id', $id)
            ->where('client_id', Auth::guard('client')->id())
            ->firstOrFail();

        $daftarStatus = [
            'pending' => 'Menunggu Persetujuan',
            'approved' => 'Disetujui Admin',
            'rejected' => 'Ditolak',
            'completed' => 'Selesai',
        ];

        $statusLabel = $daftarStatus[$data->status] ?? $data->status;

        // Memformat tanggal pengajuan berdasarkan zona waktu WIB.
        $tanggalPengajuan = $data->created_at
            ? $data->created_at
                ->timezone('Asia/Jakarta')
                ->locale('id')
                ->translatedFormat('d M Y, H:i')
            : '-';

        // Menampilkan riwayat yang dapat diketahui dari data saat ini.
        $riwayat = [];

        if ($data->created_at) {
            $riwayat[] = [
                'judul' => 'Pengajuan Dibuat',
                'tanggal' => $tanggalPengajuan,
                'warna' => 'gray',
            ];
        }

        // Menampilkan status terakhir tanpa mengarang waktu persetujuan.
        if ($data->status !== 'pending') {
            $riwayat[] = [
                'judul' => $statusLabel,
                'tanggal' => $data->updated_at
                    ? $data->updated_at
                        ->timezone('Asia/Jakarta')
                        ->locale('id')
                        ->translatedFormat('d M Y, H:i')
                    : '-',
                'warna' => $data->status === 'rejected' ? 'gray' : 'green',
            ];
        }

        $catatanStatus = [
            'pending' => 'Pendaftaran Anda telah diterima dan sedang menunggu pemeriksaan Admin.',
            'approved' => 'Pendaftaran Anda telah disetujui Admin. Silakan periksa informasi jadwal yang tersedia.',
            'rejected' => 'Pendaftaran konsultasi Anda ditolak. Silakan hubungi Admin untuk informasi lebih lanjut.',
            'completed' => 'Konsultasi Anda telah selesai.',
        ];

        $konsultasi = [
            'id' => $data->id,
            'judul' => 'Konsultasi ' . $data->jenis_konsultasi,

            'kode_pengajuan' => 'KNS-' .
                ($data->created_at
                    ? $data->created_at->timezone('Asia/Jakarta')->format('Ymd')
                    : now('Asia/Jakarta')->format('Ymd')) .
                '-' . str_pad((string) $data->id, 3, '0', STR_PAD_LEFT),

            'status' => $statusLabel,
            'status_database' => $data->status,
            'jenis_konsultasi' => $data->jenis_konsultasi ?? '-',
            'deskripsi_kebutuhan' => $data->catatan_klien ?? '-',
            'tanggal_pengajuan' => $tanggalPengajuan,
            'status_konsultasi' => $statusLabel,

            'nama_perusahaan' => $data->nama_perusahaan ?? '-',
            'nama_pic' => $data->nama_pic ?? '-',
            'email_pic' => $data->email_pic ?? '-',
            'no_telp' => $data->telepon_pic ?? '-',
            'jabatan' => $data->jabatan_pic ?? '-',

            'catatan_admin' => $catatanStatus[$data->status]
                ?? 'Silakan hubungi Admin untuk informasi lebih lanjut.',

            'riwayat' => $riwayat,
        ];

        return view('konsultasi.detail', compact('konsultasi'));
    }

    /**
     * Menampilkan detail jadwal konsultasi dari database.
     * Client hanya dapat mengakses jadwal miliknya sendiri.
     */
    public function jadwal($id)
    {
        $data = Konsultasi::where('id', $id)
            ->where('client_id', Auth::guard('client')->id())
            ->firstOrFail();

        $daftarStatus = [
            'pending' => 'Menunggu Persetujuan',
            'approved' => 'Disetujui Admin',
            'rejected' => 'Ditolak',
            'completed' => 'Selesai',
        ];

        $status = $daftarStatus[$data->status] ?? $data->status;

        // Format tanggal konsultasi dalam bahasa Indonesia.
        $tanggal = $data->tanggal_konsultasi
            ? \Carbon\Carbon::parse($data->tanggal_konsultasi)
                ->locale('id')
                ->translatedFormat('l, d F Y')
            : 'Belum ditentukan';

        // Format waktu konsultasi.
        $waktu = $data->waktu_konsultasi
            ? substr($data->waktu_konsultasi, 0, 5) . ' WIB'
            : 'Belum ditentukan';

        $linkMeeting = $data->link_meeting;

        $catatanAdmin = match ($data->status) {
            'pending' => 'Pendaftaran konsultasi Anda masih menunggu persetujuan Admin.',
            'approved' => $linkMeeting
                ? 'Jadwal konsultasi telah disetujui. Silakan hadir sesuai tanggal dan waktu yang tertera.'
                : 'Jadwal konsultasi telah disetujui, tetapi tautan meeting belum tersedia.',
            'rejected' => 'Pendaftaran konsultasi Anda ditolak. Silakan hubungi Admin untuk informasi lebih lanjut.',
            'completed' => 'Konsultasi Anda telah selesai.',
            default => 'Silakan hubungi Admin untuk informasi lebih lanjut.',
        };

        $jadwal = [
            'id' => $data->id,
            'judul' => 'Konsultasi ' . ($data->jenis_konsultasi ?? 'Umum'),
            'status' => $status,
            'status_database' => $data->status,
            'tanggal' => $tanggal,
            'waktu' => $waktu,
            'konsultan' => 'Belum ditentukan',
            'metode' => $linkMeeting ? 'Online' : 'Belum ditentukan',
            'link_meeting' => $linkMeeting,
            'catatan_admin' => $catatanAdmin,
        ];

        return view('konsultasi.jadwal', compact('jadwal'));
    }

    /**
     * Menampilkan daftar notifikasi milik client yang login.
     */
    public function notifikasi()
    {
        $daftarNotifikasi = Notifikasi::where(
            'client_id',
            Auth::guard('client')->id()
        )
            ->latest()
            ->get();

        $notifikasi = $daftarNotifikasi->map(function ($item) {
            $judul = strtolower($item->judul);

            if (str_contains($judul, 'jadwal')) {
                $icon = 'far fa-calendar-alt';
                $warna = 'blue';
            } elseif (
                str_contains($judul, 'ditolak') ||
                str_contains($judul, 'tolak')
            ) {
                $icon = 'fas fa-times';
                $warna = 'yellow';
            } elseif (
                str_contains($judul, 'disetujui') ||
                str_contains($judul, 'berhasil')
            ) {
                $icon = 'fas fa-check';
                $warna = 'green';
            } else {
                $icon = 'fas fa-bell';
                $warna = 'blue';
            }

            $waktu = $item->created_at
                ? $item->created_at
                    ->timezone('Asia/Jakarta')
                    ->locale('id')
                    ->translatedFormat('d M Y, H:i') . ' WIB'
                : '-';

            return [
                'id' => $item->id,
                'judul' => $item->judul,
                'pesan' => $item->pesan,
                'waktu' => $waktu,
                'icon' => $icon,
                'warna' => $warna,
                'baru' => !$item->is_read,
            ];
        });

        return view('konsultasi.notifikasi', compact('notifikasi'));
    }

    /**
     * Menampilkan detail satu notifikasi dan otomatis menandainya dibaca.
     */
    public function detailNotifikasi($id)
    {
        // Pastikan notifikasi milik client yang sedang login.
        $item = Notifikasi::where('id', $id)
            ->where('client_id', Auth::guard('client')->id())
            ->firstOrFail();

        // Tandai hanya notifikasi yang sedang dibuka.
        if (!$item->is_read) {
            $item->update([
                'is_read' => true,
            ]);
        }

        $waktu = $item->created_at
            ? $item->created_at
                ->timezone('Asia/Jakarta')
                ->locale('id')
                ->translatedFormat('d M Y, H:i') . ' WIB'
            : '-';

        // Menentukan ikon berdasarkan judul.
        $judul = strtolower($item->judul);

        if (str_contains($judul, 'jadwal')) {
            $icon = 'far fa-calendar-alt';
            $warna = 'blue';
        } elseif (
            str_contains($judul, 'ditolak') ||
            str_contains($judul, 'tolak')
        ) {
            $icon = 'fas fa-times';
            $warna = 'yellow';
        } elseif (
            str_contains($judul, 'disetujui') ||
            str_contains($judul, 'berhasil')
        ) {
            $icon = 'fas fa-check';
            $warna = 'green';
        } else {
            $icon = 'fas fa-bell';
            $warna = 'blue';
        }

        $detail = [
            'id' => $item->id,
            'judul' => $item->judul,
            'pesan' => $item->pesan,
            'waktu' => $waktu,
            'icon' => $icon,
            'warna' => $warna,
            'baru' => false,
        ];

        return view('konsultasi.detail-notifikasi', compact('detail'));
    }

    /**
     * Menandai semua notifikasi milik client sebagai sudah dibaca.
     */
    public function tandaiSemuaDibaca()
    {
        Notifikasi::where(
            'client_id',
            Auth::guard('client')->id()
        )
            ->where('is_read', false)
            ->update([
                'is_read' => true,
            ]);

        return redirect()
            ->route('notifikasi.index')
            ->with('success', 'Semua notifikasi berhasil ditandai sudah dibaca.');
    }
}