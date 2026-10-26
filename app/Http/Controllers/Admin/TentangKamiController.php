<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TentangKami;
use App\Models\AnggotaTim;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TentangKamiController extends Controller
{
    public function index()
    {
        $tentang = TentangKami::first() ?? new TentangKami();
        $tim = AnggotaTim::latest()->get();

        return view('admin.tentang-kami.index', compact('tentang', 'tim'));
    }

    // --- FUNGSI UPDATE TEKS, VISI MISI & MAPS ---
    public function updateProfil(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'visi' => 'nullable|string',
            'misi' => 'nullable|string',
            'alamat' => 'nullable|string',
            'telepon' => 'nullable|string|max:50',
            'email' => 'nullable|email|max:100',
            'gmaps_embed' => 'nullable|string',
        ]);

        TentangKami::updateOrCreate(['id' => 1], $request->except('_token', '_method'));

        return redirect()->back()->with('success', 'Informasi Tentang Kami berhasil diperbarui!');
    }

    // --- FUNGSI CRUD ANGGOTA TIM ---
    public function storeTim(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'foto' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('tim', 'public');
        }

        AnggotaTim::create($data);
        return redirect()->back()->with('success', 'Anggota tim berhasil ditambahkan.');
    }

    public function updateTim(Request $request, $id)
    {
        $tim = AnggotaTim::findOrFail($id);
        $data = $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'foto' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            if ($tim->foto) Storage::disk('public')->delete($tim->foto);
            $data['foto'] = $request->file('foto')->store('tim', 'public');
        }

        $tim->update($data);
        return redirect()->back()->with('success', 'Data anggota tim diperbarui.');
    }

    public function destroyTim($id)
    {
        $tim = AnggotaTim::findOrFail($id);
        if ($tim->foto) Storage::disk('public')->delete($tim->foto);
        $tim->delete();

        return redirect()->back()->with('success', 'Anggota tim dihapus.');
    }
}
