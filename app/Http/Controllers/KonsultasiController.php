<?php

namespace App\Http\Controllers;

use App\Models\Konsultasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KonsultasiController extends Controller
{
    // Menampilkan formulir booking konsultasi
    public function booking()
    {
        return view('konsultasi.booking');
    }

    /**
     * Menyimpan pendaftaran konsultasi dari client.
     */
    public function store(Request $request)
    {
        // Memvalidasi data yang dikirim melalui formulir booking
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

        // Menyimpan pendaftaran beserta identitas client yang login
        Konsultasi::create([
            'client_id' => Auth::guard('client')->id(),
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

        // Mengarahkan client ke dashboard setelah pendaftaran berhasil
        return redirect()
            ->route('dashboard')
            ->with('success', 'Pendaftaran konsultasi berhasil dikirim.');
    }

    /**
     * Menampilkan daftar konsultasi milik client yang login.
     */
    public function index()
    {
        // Mengambil hanya konsultasi milik client yang sedang login
        $konsultasis = Konsultasi::where(
            'client_id',
            Auth::guard('client')->id()
        )
            ->orderByDesc('created_at')
            ->get()
            ->map(function ($konsultasi) {
                // Menerjemahkan status database menjadi teks tampilan
                $daftarStatus = [
                    'pending' => 'Menunggu Persetujuan',
                    'approved' => 'Disetujui Admin',
                    'rejected' => 'Ditolak',
                    'completed' => 'Selesai',
                ];

                // Mengubah waktu pembuatan data menjadi WIB
                $tanggalPengajuan = $konsultasi->created_at
                    ? $konsultasi->created_at
                        ->timezone('Asia/Jakarta')
                        ->locale('id')
                        ->translatedFormat('d M Y, H:i')
                    : '-';

                // Menampilkan tanggal dan waktu konsultasi
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

                // Menyesuaikan struktur data dengan tabel daftar konsultasi
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
        // Memastikan konsultasi ditemukan dan dimiliki client yang login
        $data = Konsultasi::where('id', $id)
            ->where('client_id', Auth::guard('client')->id())
            ->firstOrFail();

        // Menerjemahkan status database menjadi teks tampilan
        $daftarStatus = [
            'pending' => 'Menunggu Persetujuan',
            'approved' => 'Disetujui Admin',
            'rejected' => 'Ditolak',
            'completed' => 'Selesai',
        ];

        $statusLabel = $daftarStatus[$data->status] ?? $data->status;

        // Memformat tanggal pengajuan berdasarkan zona waktu WIB
        $tanggalPengajuan = $data->created_at
            ? $data->created_at
                ->timezone('Asia/Jakarta')
                ->locale('id')
                ->translatedFormat('d M Y, H:i')
            : '-';

        // Menampilkan riwayat yang dapat diketahui dari data saat ini
        $riwayat = [];

        if ($data->created_at) {
            $riwayat[] = [
                'judul' => 'Pengajuan Dibuat',
                'tanggal' => $tanggalPengajuan,
                'warna' => 'gray',
            ];
        }

        // Menampilkan status terakhir tanpa mengarang waktu persetujuan
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

        // Menyiapkan pesan sesuai status pendaftaran
        $catatanStatus = [
            'pending' => 'Pendaftaran Anda telah diterima dan sedang menunggu pemeriksaan Admin.',
            'approved' => 'Pendaftaran Anda telah disetujui Admin. Silakan periksa informasi jadwal yang tersedia.',
            'rejected' => 'Pendaftaran konsultasi Anda ditolak. Silakan hubungi Admin untuk informasi lebih lanjut.',
            'completed' => 'Konsultasi Anda telah selesai.',
        ];

        // Menyiapkan data untuk ditampilkan pada halaman detail
        $konsultasi = [
            'id' => $data->id,
            'judul' => 'Konsultasi ' . $data->jenis_konsultasi,

            // Kode ini dibentuk dari tanggal pembuatan dan ID, bukan kolom database
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
        // Mengambil konsultasi berdasarkan ID dan client yang sedang login
        $data = Konsultasi::where('id', $id)
            ->where('client_id', Auth::guard('client')->id())
            ->firstOrFail();

        // Menerjemahkan status database menjadi teks tampilan
        $daftarStatus = [
            'pending' => 'Menunggu Persetujuan',
            'approved' => 'Disetujui Admin',
            'rejected' => 'Ditolak',
            'completed' => 'Selesai',
        ];

        $status = $daftarStatus[$data->status] ?? $data->status;

        // Format tanggal konsultasi dalam bahasa Indonesia
        $tanggal = $data->tanggal_konsultasi
            ? \Carbon\Carbon::parse($data->tanggal_konsultasi)
                ->locale('id')
                ->translatedFormat('l, d F Y')
            : 'Belum ditentukan';

        // Format waktu konsultasi
        $waktu = $data->waktu_konsultasi
            ? substr($data->waktu_konsultasi, 0, 5) . ' WIB'
            : 'Belum ditentukan';

        // Link hanya tersedia jika sudah diisi oleh admin
        $linkMeeting = $data->link_meeting;

        // Informasi sesuai data yang benar-benar tersedia
        $catatanAdmin = match ($data->status) {
            'pending' => 'Pendaftaran konsultasi Anda masih menunggu persetujuan Admin.',
            'approved' => $linkMeeting
                ? 'Jadwal konsultasi telah disetujui. Silakan hadir sesuai tanggal dan waktu yang tertera.'
                : 'Jadwal konsultasi telah disetujui, tetapi tautan meeting belum tersedia.',
            'rejected' => 'Pendaftaran konsultasi Anda ditolak. Silakan hubungi Admin untuk informasi lebih lanjut.',
            'completed' => 'Konsultasi Anda telah selesai.',
            default => 'Silakan hubungi Admin untuk informasi lebih lanjut.',
        };

        // Menyiapkan data untuk halaman jadwal
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
     * Menampilkan halaman notifikasi client.
     *
     * Data notifikasi di method ini masih dummy.
     */
    public function notifikasi()
    {
        // Data contoh notifikasi
        $notifikasi = [
            [
                'judul' => 'Pendaftaran Disetujui',
                'pesan' => 'Pendaftaran konsultasi Anda telah disetujui oleh Admin.',
                'waktu' => '5 menit yang lalu',
                'icon' => 'fas fa-comment',
                'warna' => 'green',
                'baru' => true,
            ],
            [
                'judul' => 'Jadwal Konsultasi Dikonfirmasi',
                'pesan' => 'Jadwal konsultasi Anda telah dikonfirmasi.',
                'waktu' => '10 menit yang lalu',
                'icon' => 'far fa-calendar-alt',
                'warna' => 'blue',
                'baru' => true,
            ],
            [
                'judul' => 'Data Pendaftaran Berhasil',
                'pesan' => 'Pendaftaran konsultasi Anda telah berhasil dikirim.',
                'waktu' => '1 jam yang lalu',
                'icon' => 'fas fa-exclamation',
                'warna' => 'blue',
                'baru' => false,
            ],
            [
                'judul' => 'Pengingat Jadwal',
                'pesan' => 'Pastikan Anda sudah siap sebelum konsultasi dimulai.',
                'waktu' => '2 jam yang lalu',
                'icon' => 'fas fa-bell',
                'warna' => 'yellow',
                'baru' => false,
            ],
            [
                'judul' => 'Akun Anda Aktif',
                'pesan' => 'Terima kasih telah bergabung dengan layanan kami.',
                'waktu' => '1 hari yang lalu',
                'icon' => 'fas fa-user-check',
                'warna' => 'green',
                'baru' => false,
            ],
        ];

        return view('konsultasi.notifikasi', compact('notifikasi'));
    }
}
