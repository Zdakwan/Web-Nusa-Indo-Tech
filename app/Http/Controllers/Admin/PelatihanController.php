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
        return view('admin.pelatihan.index', compact('pelatihan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required',
            'harga' => 'required|numeric',
            'kategori' => 'nullable|string|max:100',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
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
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
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
