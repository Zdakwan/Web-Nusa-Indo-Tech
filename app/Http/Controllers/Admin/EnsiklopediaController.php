<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ensiklopedia;
use App\Models\Layanan; // Memanggil model Layanan
use App\Models\Notifikasi; // Tambahan: model notifikasi
use App\Models\PreferensiNotifikasi; // Tambahan: model preferensi notifikasi
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB; // Tambahan: transaksi database

class EnsiklopediaController extends Controller
{
    public function index()
    {
        $ensiklopedia = Ensiklopedia::latest()->paginate(10);
        $layanan = Layanan::all(); // Mengambil semua data dari tabel layanans

        return view('admin.ensiklopedia.index', compact('ensiklopedia', 'layanan'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'judul'    => 'required|string|max:255',
            'kategori' => 'required|string|max:100', // Ini akan menyimpan nama_layanan dari dropdown
            'konten'   => 'required|string',
            'gambar'   => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('ensiklopedia', 'public');
        }

        // Tambahan: menyimpan artikel dan notifikasi dalam satu transaksi.
        DB::transaction(function () use ($data) {

            // Menyimpan artikel ensiklopedia.
            $artikel = Ensiklopedia::create($data);

            // Mengambil client yang mengaktifkan notifikasi artikel ensiklopedia.
            $clientIds = PreferensiNotifikasi::where('artikel_ensiklopedia', true)
                ->pluck('client_id');

            // Mengirim notifikasi kepada setiap client yang mengaktifkan preferensi.
            foreach ($clientIds as $clientId) {
                Notifikasi::create([
                    'client_id' => $clientId,
                    'judul' => 'Artikel Ensiklopedia Baru',
                    'pesan' => 'Artikel baru berjudul "' . $artikel->judul
                        . '" telah ditambahkan ke Ensiklopedia IT. '
                        . 'Silakan kunjungi halaman ensiklopedia untuk membaca artikel.',
                    'is_read' => false,
                ]);
            }
        });

        return back()->with('success', 'Artikel berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $artikel = Ensiklopedia::findOrFail($id);

        $data = $request->validate([
            'judul'    => 'required|string|max:255',
            'kategori' => 'required|string|max:100',
            'konten'   => 'required|string',
            'gambar'   => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($artikel->gambar && Storage::disk('public')->exists($artikel->gambar)) {
                Storage::disk('public')->delete($artikel->gambar);
            }
            // Simpan gambar baru
            $data['gambar'] = $request->file('gambar')->store('ensiklopedia', 'public');
        }

        $artikel->update($data);
        return back()->with('success', 'Artikel berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $artikel = Ensiklopedia::findOrFail($id);
        if ($artikel->gambar && Storage::disk('public')->exists($artikel->gambar)) {
            Storage::disk('public')->delete($artikel->gambar);
        }
        $artikel->delete();
        return back()->with('success', 'Artikel berhasil dihapus.');
    }
}