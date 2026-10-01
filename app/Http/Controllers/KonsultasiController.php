<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KonsultasiController extends Controller

//Form Booking Konsultasi
{
    public function booking()
    {
        return view('konsultasi.booking');
    }

     /**
     * Menampilkan daftar konsultasi milik client.
     *
     * Data yang digunakan saat ini masih berupa data dummy.
     */
    public function index()
    {
        // Data dummy konsultasi
        $konsultasis = [
            [
                'judul' => 'Konsul Training',
                'kategori' => 'IT Training',
                'tanggal_pengajuan' => '26 Sep 2026, 14:20',
                'jadwal' => '3- Sep 2026, 14:20',
                'status' => 'Terjadwal',
            ],
            [
                'judul' => 'Konsul Training',
                'kategori' => 'IT Training',
                'tanggal_pengajuan' => '26 Sep 2026, 14:20',
                'jadwal' => '3- Sep 2026, 14:20',
                'status' => 'Terjadwal',
            ],
            [
                'judul' => 'Konsul Training',
                'kategori' => 'IT Training',
                'tanggal_pengajuan' => '26 Sep 2026, 14:20',
                'jadwal' => '3- Sep 2026, 14:20',
                'status' => 'Terjadwal',
            ],
            [
                'judul' => 'Konsul Training',
                'kategori' => 'IT Training',
                'tanggal_pengajuan' => '26 Sep 2026, 14:20',
                'jadwal' => '3- Sep 2026, 14:20',
                'status' => 'Terjadwal',
            ],
            [
                'judul' => 'Konsul Training',
                'kategori' => 'IT Training',
                'tanggal_pengajuan' => '26 Sep 2026, 14:20',
                'jadwal' => '3- Sep 2026, 14:20',
                'status' => 'Terjadwal',
            ],
            [
                'judul' => 'Konsul Training',
                'kategori' => 'IT Training',
                'tanggal_pengajuan' => '26 Sep 2026, 14:20',
                'jadwal' => '3- Sep 2026, 14:20',
                'status' => 'Terjadwal',
            ],
            [
                'judul' => 'Konsul Training',
                'kategori' => 'IT Training',
                'tanggal_pengajuan' => '26 Sep 2026, 14:20',
                'jadwal' => '3- Sep 2026, 14:20',
                'status' => 'Terjadwal',
            ],
            [
                'judul' => 'Konsul Training',
                'kategori' => 'IT Training',
                'tanggal_pengajuan' => '26 Sep 2026, 14:20',
                'jadwal' => '3- Sep 2026, 14:20',
                'status' => 'Terjadwal',
            ],
            [
                'judul' => 'Konsul Training',
                'kategori' => 'IT Training',
                'tanggal_pengajuan' => '26 Sep 2026, 14:20',
                'jadwal' => '3- Sep 2026, 14:20',
                'status' => 'Terjadwal',
            ],
            [
                'judul' => 'Konsul Training',
                'kategori' => 'IT Training',
                'tanggal_pengajuan' => '26 Sep 2026, 14:20',
                'jadwal' => '3- Sep 2026, 14:20',
                'status' => 'Terjadwal',
            ],
        ];

        return view('konsultasi.index', compact('konsultasis'));
    }

    /**
     * Menampilkan detail pendaftaran konsultasi.
     *
     * Data saat ini masih berupa data dummy
     */
    public function detail($id)
    {
        // Data dummy detail konsultasi
        $konsultasi = [
            'id' => $id,
            'judul' => 'IT Training',
            'kode_pengajuan' => 'KNS-20260912-001',
            'status' => 'Disetujui Admin',

            'jenis_konsultasi' => 'IT Training',
            'deskripsi_kebutuhan' => 'Lorem Ipsum dolor',
            'tanggal_pengajuan' => '26 Sept 2026',
            'status_konsultasi' => 'Dijadwalkan',

            'nama_perusahaan' => 'IT Training',
            'nama_pic' => 'Lorem Ipsum dolor',
            'email_pic' => 'Lorem Ipsum dolor',
            'no_telp' => 'Lorem Ipsum dolor',
            'jabatan' => 'Lorem Ipsum dolor',

            'catatan_admin' => 'Pendaftaran konsultasi Training IT Anda telah disetujui oleh Admin. Jika ada perubahan, kami akan menghubungi Anda melalui Email.',

            'riwayat' => [
                [
                    'judul' => 'Pengajuan Dibuat',
                    'tanggal' => '26 Sept 2026, 10:44',
                    'warna' => 'gray',
                ],
                [
                    'judul' => 'Disetujui Oleh Admin',
                    'tanggal' => '27 Sept 2026, 10:30',
                    'warna' => 'green',
                ],
                [
                    'judul' => 'Dijadwalkan',
                    'tanggal' => '30 Sept 2026, 09:00',
                    'warna' => 'blue',
                ],
                [
                    'judul' => 'Disetujui Oleh Admin',
                    'tanggal' => '30 Sept 2026, 09:00',
                    'warna' => 'green',
                ],
            ],
        ];

        return view('konsultasi.detail', compact('konsultasi'));
    }

    /**
     * Menampilkan detail jadwal konsultasi.
     *
     * Data saat ini masih berupa data dummy
     * untuk kebutuhan frontend.
     */
    public function jadwal($id)
    {
        // Data dummy jadwal konsultasi
        $jadwal = [
            'id' => $id,
            'judul' => 'IT Training',
            'status' => 'Diverifikasi Admin',

            'tanggal' => 'Senin, 14 Sept 2026',
            'waktu' => '09.00-11.00',
            'konsultan' => 'Mey Trisna',
            'metode' => 'Online',
            'link_meeting' => 'https://zoom.us/l/123456789',

            'catatan_admin' => 'Jadwal Telah Dikonfirmasi, Silahkan Hadir 10 Menit Sebelum Konsultasi Dimulai',
        ];

        return view('konsultasi.jadwal', compact('jadwal'));
    }

    /**
     * Menampilkan halaman notifikasi client.
     *
     * Data saat ini masih berupa data dummy
     * untuk kebutuhan frontend.
     */
    public function notifikasi()
    {
        // Data dummy notifikasi
        $notifikasi = [
            [
                'judul' => 'Pendaftaran Disetujui',
                'pesan' => 'Pendaftaran konsultasi Training IT Anda telah disetujui oleh Admin.',
                'waktu' => '5 menit yang lalu',
                'icon' => 'fas fa-comment',
                'warna' => 'green',
                'baru' => true,
            ],
            [
                'judul' => 'Jadwal Konsultasi Dikonfirmasi',
                'pesan' => 'Konsultasi Anda dijadwalkan pada 14 Sept 2026, 09.00-11.00.',
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
                'pesan' => 'Konsultasi akan berlangsung dalam 1 hari. Pastikan Anda sudah siap.',
                'waktu' => '2 jam yang lalu',
                'icon' => 'fas fa-bell',
                'warna' => 'yellow',
                'baru' => false,
            ],
            [
                'judul' => 'Akun Anda Aktif',
                'pesan' => 'Terimakasih telah bergabung dengan layanan kami.',
                'waktu' => '1 hari yang lalu',
                'icon' => 'fas fa-user-check',
                'warna' => 'green',
                'baru' => false,
            ],
        ];

        return view('konsultasi.notifikasi', compact('notifikasi'));
    }
}