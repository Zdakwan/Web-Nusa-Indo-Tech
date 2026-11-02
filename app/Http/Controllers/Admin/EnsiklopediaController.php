<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ensiklopedia;
use App\Models\Layanan; // Memanggil model Layanan
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
            'gambar'   => 'nullable|image|mimes:png,jpg,jpeg,gif,bmp|min:2048|max:8192',
        ], [
            'gambar.min' => 'Ukuran gambar minimal harus 2 MB.',
            'gambar.max' => 'Ukuran gambar tidak boleh lebih dari 8 MB.',
            'gambar.mimes' => 'Format gambar harus berupa: png, jpg, jpeg, gif, atau bmp.',
            'gambar.image' => 'File yang diunggah harus berupa gambar.'
        ]);

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('ensiklopedia', 'public');
        }

        Ensiklopedia::create($data);
        return back()->with('success', 'Artikel berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $artikel = Ensiklopedia::findOrFail($id);

        $data = $request->validate([
            'judul'    => 'required|string|max:255',
            'kategori' => 'required|string|max:100',
            'konten'   => 'required|string',
            'gambar'   => 'nullable|image|mimes:png,jpg,jpeg,gif,bmp|min:2048|max:8192',
        ], [
            'gambar.min' => 'Ukuran gambar minimal harus 2 MB.',
            'gambar.max' => 'Ukuran gambar tidak boleh lebih dari 8 MB.',
            'gambar.mimes' => 'Format gambar harus berupa: png, jpg, jpeg, gif, atau bmp.',
            'gambar.image' => 'File yang diunggah harus berupa gambar.'
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
