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
            'deskripsi'  => 'required|string',
            'icon'       => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048',
        ]);

        $data = $request->only(['nama_layanan', 'deskripsi']);

        if ($request->hasFile('icon')) {
            $data['icon'] = $request->file('icon')->store('layanan', 'public');
        }

        Layanan::create($data);

        return redirect()->route('admin.layanan.index')->with('success', 'Layanan berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $layanan = Layanan::findOrFail($id);

        $request->validate([
            'nama_layanan' => 'required|string|max:255',
            'deskripsi'  => 'required|string',
            'icon'       => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048',
        ]);

        $data = $request->only(['nama_layanan', 'deskripsi']);

        if ($request->hasFile('icon')) {
            // Hapus file lama untuk efisiensi penyimpanan
            if ($layanan->icon && Storage::disk('public')->exists($layanan->icon)) {
                Storage::disk('public')->delete($layanan->icon);
            }
            $data['icon'] = $request->file('icon')->store('layanan', 'public');
        }

        $layanan->update($data);

        return redirect()->route('admin.layanan.index')->with('success', 'Layanan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $layanan = Layanan::findOrFail($id);

        if ($layanan->icon && Storage::disk('public')->exists($layanan->icon)) {
            Storage::disk('public')->delete($layanan->icon);
        }

        $layanan->delete();

        return redirect()->route('admin.layanan.index')->with('success', 'Layanan berhasil dihapus.');
    }
}
