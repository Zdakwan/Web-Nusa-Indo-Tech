<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Konsultasi;
use App\Models\Client;

class DashboardController extends Controller
{
    public function index()
    {
        $aktivitas = Konsultasi::with('client')
            ->latest()
            ->get();

        $konsultasi = $aktivitas;

        $totalPermintaan = $aktivitas->count();
        $menunggu = $aktivitas->whereIn('status', ['pending', 'Menunggu'])->count();
        $diproses = $aktivitas->whereIn('status', ['approved', 'Diproses'])->count();
        $selesai  = $aktivitas->whereIn('status', ['completed', 'Selesai'])->count();

        $clients = Client::orderBy('name')->get();

        return view('admin.dashboard', compact(
            'aktivitas',
            'konsultasi',
            'totalPermintaan',
            'menunggu',
            'diproses',
            'selesai',
            'clients'
        ));
    }

    public function createAktivitas()
    {
        return redirect()->route('admin.dashboard');
    }

    public function storeAktivitas(Request $request)
    {
        $request->validate([
            'nama_klien'        => 'required|string|max:255',
            'permintaan'        => 'required|string',
            'tanggal_pengajuan' => 'required|date',
            'status'            => 'required|string',
        ]);

        $client = null;
        if ($request->filled('client_id')) {
            $client = Client::find($request->client_id);
        }

        if (!$client) {
            $client = Client::where('company', $request->nama_klien)
                ->orWhere('name', $request->nama_klien)
                ->first();
        }

        if (!$client) {
            $clientColumns = Schema::getColumnListing('clients');
            $newClientData = [
                'name'       => $request->nama_klien,
                'username'   => Str::slug($request->nama_klien, '_') . '_' . rand(100, 999),
                'email'      => Str::slug($request->nama_klien, '') . rand(10, 99) . '@klien.com',
                'password'   => Hash::make('Password123!'),
                'created_at' => now(),
                'updated_at' => now(),
            ];
            
            // Perbaikan: Hanya masukkan no_telp jika kolomnya memang ada
            if (in_array('no_telp', $clientColumns)) {
                $newClientData['no_telp'] = '081234567890';
            }
            if (in_array('company', $clientColumns)) {
                $newClientData['company'] = $request->nama_klien;
            }
            
            $clientId = DB::table('clients')->insertGetId($newClientData);
        } else {
            $clientId = $client->id;
            if (Schema::hasColumn('clients', 'company')) {
                DB::table('clients')->where('id', $clientId)->update([
                    'company' => $request->nama_klien
                ]);
            }
        }

        $columns = Schema::getColumnListing('konsultasi');
        $data = [
            'client_id'  => $clientId,
            'status'     => $request->status,
            'created_at' => $request->tanggal_pengajuan . ' ' . now()->format('H:i:s'),
            'updated_at' => now(),
        ];

        if (in_array('catatan_klien', $columns)) $data['catatan_klien'] = $request->permintaan;
        if (in_array('topik', $columns)) $data['topik'] = $request->permintaan;
        if (in_array('permintaan', $columns)) $data['permintaan'] = $request->permintaan;
        if (in_array('jenis_layanan', $columns)) $data['jenis_layanan'] = $request->permintaan;
        if (in_array('tanggal_konsultasi', $columns)) $data['tanggal_konsultasi'] = $request->tanggal_pengajuan;
        if (in_array('waktu_konsultasi', $columns)) $data['waktu_konsultasi'] = '09:00:00';

        $konsultasiId = DB::table('konsultasi')->insertGetId($data);

        if (Schema::hasTable('notifikasi')) {
            DB::table('notifikasi')->insert([
                'client_id'  => $clientId,
                'judul'      => 'Jadwal & Aktivitas Konsultasi #' . $konsultasiId,
                'pesan'      => 'Admin telah menambahkan aktivitas konsultasi: ' . $request->permintaan,
                'is_read'    => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        return redirect()->route('admin.dashboard')
            ->with('success', 'Aktivitas berhasil ditambahkan!');
    }

    public function updateAktivitas(Request $request, int $id)
    {
        $request->validate([
            'nama_klien'        => 'required|string|max:255',
            'permintaan'        => 'required|string',
            'tanggal_pengajuan' => 'required|date',
            'status'            => 'required|string',
        ]);

        $konsultasi = Konsultasi::findOrFail($id);

        if ($konsultasi->client_id) {
            $updateClient = ['name' => $request->nama_klien];
            if (Schema::hasColumn('clients', 'company')) {
                $updateClient['company'] = $request->nama_klien;
            }
            DB::table('clients')->where('id', $konsultasi->client_id)->update($updateClient);
        }

        $columns = Schema::getColumnListing('konsultasi');
        $data = [
            'status'     => $request->status,
            'updated_at' => now(),
        ];

        if (in_array('catatan_klien', $columns)) $data['catatan_klien'] = $request->permintaan;
        if (in_array('tanggal_konsultasi', $columns)) $data['tanggal_konsultasi'] = $request->tanggal_pengajuan;

        DB::table('konsultasi')->where('id', $id)->update($data);

        if ($konsultasi->client_id && Schema::hasTable('notifikasi')) {
            $labelStatus = match ($request->status) {
                'approved', 'Diproses'  => 'Disetujui / Diproses',
                'completed', 'Selesai'  => 'Selesai',
                'rejected', 'Ditolak'   => 'Ditolak',
                default                 => 'Menunggu',
            };

            DB::table('notifikasi')->insert([
                'client_id'  => $konsultasi->client_id,
                'judul'      => 'Status Konsultasi #' . $id . ' ' . $labelStatus,
                'pesan'      => 'Permintaan "' . $request->permintaan . '" kini berstatus: ' . $labelStatus . '.',
                'is_read'    => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        return redirect()->route('admin.dashboard')
            ->with('success', 'Aktivitas berhasil diperbarui!');
    }

    public function destroyAktivitas(int $id)
    {
        DB::table('konsultasi')->where('id', $id)->delete();

        return redirect()->route('admin.dashboard')
            ->with('success', 'Aktivitas berhasil dihapus!');
    }
}