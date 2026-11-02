<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pelatihan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PelatihanController extends Controller
{
    public function index()
    {
        $pelatihan = Pelatihan::latest()->paginate(10);
        $layanan = \App\Models\Layanan::all(); // Tambahkan baris ini

        return view('admin.pelatihan.index', compact('pelatihan', 'layanan')); // Tambahkan 'layanan' ke compact
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required',
            'harga' => 'required|numeric',
            'kategori' => 'nullable|string|max:100',
            'gambar' => 'nullable|image|mimes:png,jpg,jpeg,gif,bmp|min:2048|max:8192',
        ], [
            'gambar.min' => 'Ukuran gambar minimal harus 2 MB.',
            'gambar.max' => 'Ukuran gambar tidak boleh lebih dari 8 MB.',
            'gambar.mimes' => 'Format gambar harus berupa: png, jpg, jpeg, gif, atau bmp.',
            'gambar.image' => 'File yang diunggah harus berupa gambar.'
        ]);

        $data = $request->all();

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('pelatihan', 'public');
        }

        Pelatihan::create($data);

        return redirect()->route('admin.pelatihan.index')->with('success', 'Pelatihan berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $pelatihan = Pelatihan::findOrFail($id);

        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required',
            'harga' => 'required|numeric',
            'kategori' => 'nullable|string|max:100',
            'gambar' => 'nullable|image|mimes:png,jpg,jpeg,gif,bmp|min:2048|max:8192',
        ], [
            'gambar.min' => 'Ukuran gambar minimal harus 2 MB.',
            'gambar.max' => 'Ukuran gambar tidak boleh lebih dari 8 MB.',
            'gambar.mimes' => 'Format gambar harus berupa: png, jpg, jpeg, gif, atau bmp.',
            'gambar.image' => 'File yang diunggah harus berupa gambar.'
        ]);

        $data = $request->all();

        if ($request->hasFile('gambar')) {
            if ($pelatihan->gambar && Storage::disk('public')->exists($pelatihan->gambar)) {
                Storage::disk('public')->delete($pelatihan->gambar);
            }
            $data['gambar'] = $request->file('gambar')->store('pelatihan', 'public');
        }

        $pelatihan->update($data);

        return redirect()->route('admin.pelatihan.index')->with('success', 'Pelatihan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $pelatihan = Pelatihan::findOrFail($id);

        if ($pelatihan->gambar && Storage::disk('public')->exists($pelatihan->gambar)) {
            Storage::disk('public')->delete($pelatihan->gambar);
        }

        $pelatihan->delete();

        return redirect()->route('admin.pelatihan.index')->with('success', 'Pelatihan berhasil dihapus.');
    }
}
