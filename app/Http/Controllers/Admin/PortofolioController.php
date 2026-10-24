<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Portofolio;
use App\Models\Layanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PortofolioController extends Controller
{
    public function index()
    {
        $portofolio = Portofolio::latest()->paginate(10);
        $layanan = Layanan::all();

        return view('admin.portofolio.index', compact('portofolio', 'layanan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul'        => 'required|string|max:255',
            'deskripsi'    => 'required|string',
            'nama_klien'   => 'nullable|string|max:255',
            'link_project' => 'nullable|url|max:255',
            'tahun'        => 'nullable|string|max:4',
            'kategori'     => 'nullable|string|max:100',
            'layanan_id'   => 'required|exists:layanan,id',
            'rating'       => 'required|numeric|min:1|max:5',
            'fitur_utama'  => 'nullable|string',
            'teknologi'    => 'nullable|string|max:255',
            'gambar'       => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('portofolio', 'public');
        }

        Portofolio::create($data);
        return redirect()->route('admin.portofolio.index')->with('success', 'Portofolio berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $portofolio = Portofolio::findOrFail($id);

        $request->validate([
            'judul'        => 'required|string|max:255',
            'deskripsi'    => 'required|string',
            'nama_klien'   => 'nullable|string|max:255',
            'link_project' => 'nullable|url|max:255',
            'tahun'        => 'nullable|string|max:4',
            'kategori'     => 'nullable|string|max:100',
            'layanan_id'   => 'required|exists:layanan,id',
            'rating'       => 'required|numeric|min:1|max:5',
            'fitur_utama'  => 'nullable|string',
            'teknologi'    => 'nullable|string|max:255',
            'gambar'       => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('gambar')) {
            if ($portofolio->gambar && Storage::disk('public')->exists($portofolio->gambar)) {
                Storage::disk('public')->delete($portofolio->gambar);
            }
            $data['gambar'] = $request->file('gambar')->store('portofolio', 'public');
        }

        $portofolio->update($data);
        return redirect()->route('admin.portofolio.index')->with('success', 'Portofolio berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $portofolio = Portofolio::findOrFail($id);
        if ($portofolio->gambar && Storage::disk('public')->exists($portofolio->gambar)) {
            Storage::disk('public')->delete($portofolio->gambar);
        }
        $portofolio->delete();

        return redirect()->route('admin.portofolio.index')->with('success', 'Portofolio berhasil dihapus.');
    }
}
