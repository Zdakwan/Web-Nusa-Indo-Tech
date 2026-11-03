<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ensiklopedia;
use App\Models\Layanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EnsiklopediaController extends Controller
{
    public function index()
    {
        $ensiklopedia = Ensiklopedia::latest()->paginate(10);
        $layanan = Layanan::all();

        return view('admin.ensiklopedia.index', compact('ensiklopedia', 'layanan'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'judul'    => 'required|string|max:255',
            'kategori' => 'required|string|max:100',
            'konten'   => 'required|string',
            'gambar'   => 'nullable|image|mimes:png,jpg,jpeg,gif,bmp|min:2048|max:8192',
        ], [
            'gambar.min' => 'Gagal: Ukuran gambar terlalu kecil. Minimal harus 2 MB.',
            'gambar.max' => 'Gagal: Ukuran gambar terlalu besar. Maksimal 8 MB.',
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
            'gambar.min' => 'Gagal: Ukuran gambar terlalu kecil. Minimal harus 2 MB.',
            'gambar.max' => 'Gagal: Ukuran gambar terlalu besar. Maksimal 8 MB.',
            'gambar.mimes' => 'Format gambar harus berupa: png, jpg, jpeg, gif, atau bmp.',
            'gambar.image' => 'File yang diunggah harus berupa gambar.'
        ]);

        if ($request->hasFile('gambar')) {
            if ($artikel->gambar && Storage::disk('public')->exists($artikel->gambar)) {
                Storage::disk('public')->delete($artikel->gambar);
            }
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
