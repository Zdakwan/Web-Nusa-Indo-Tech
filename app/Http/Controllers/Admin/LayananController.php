<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Layanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LayananController extends Controller
{
    public function index()
    {
        $layanan = Layanan::latest()->paginate(10);
        return view('admin.layanan.index', compact('layanan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_layanan' => 'required|string|max:255',
            'kategori'     => 'required|string|max:100',
            'deskripsi'    => 'required|string',
            // Batasi format ke jpeg, png, jpg, gif
            'icon'         => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', 
        ]);

        $data = $request->only(['nama_layanan', 'kategori', 'deskripsi']);

        if ($request->hasFile('icon')) {
            $data['icon'] = $request->file('icon')->store('layanan', 'public');
        }

        Layanan::create($data);

        return redirect()->route('admin.layanan.index')->with('success', 'Layanan berhasil ditambahkan.');
    }

    // Sebelumnya: public function update(Request $request, $id)
public function update(Request $request, string $id)
    {
        $layanan = Layanan::findOrFail($id);

        $request->validate([
            'nama_layanan' => 'required|string|max:255',
            'kategori'     => 'required|string|max:100',
            'deskripsi'    => 'required|string',
            // Batasi format ke jpeg, png, jpg, gif
            'icon'         => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', 
        ]);

        $data = $request->only(['nama_layanan', 'kategori', 'deskripsi']);

        if ($request->hasFile('icon')) {
            // Hapus file lama jika ada
            if ($layanan->icon && Storage::disk('public')->exists($layanan->icon)) {
                Storage::disk('public')->delete($layanan->icon);
            }
            $data['icon'] = $request->file('icon')->store('layanan', 'public');
        }

        $layanan->update($data);

        return redirect()->route('admin.layanan.index')->with('success', 'Layanan berhasil diperbarui.');
    }

    // Sebelumnya: public function destroy($id)
public function destroy(string $id)
    {
        $layanan = Layanan::findOrFail($id);

        // Hapus file dari storage saat layanan dihapus
        if ($layanan->icon && Storage::disk('public')->exists($layanan->icon)) {
            Storage::disk('public')->delete($layanan->icon);
        }

        $layanan->delete();

        return redirect()->route('admin.layanan.index')->with('success', 'Layanan berhasil dihapus.');
    }
}