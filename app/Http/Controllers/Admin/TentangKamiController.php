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

    public function updateProfil(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'visi' => 'nullable|string',
            'misi' => 'nullable|string',
            'teks_kolaborasi_tim' => 'nullable|string',
            'teks_kolaborasi_serah_terima' => 'nullable|string',
            'foto_kolaborasi_tim' => 'nullable|image|mimes:png,jpg,jpeg,gif,bmp|min:2048|max:8192',
            'foto_kolaborasi_serah_terima' => 'nullable|image|mimes:png,jpg,jpeg,gif,bmp|min:2048|max:8192',
        ], [
            'foto_kolaborasi_tim.min' => 'Gagal: Ukuran foto tim terlalu kecil. Minimal harus 2 MB.',
            'foto_kolaborasi_tim.max' => 'Gagal: Ukuran foto tim terlalu besar. Maksimal 8 MB.',
            'foto_kolaborasi_tim.mimes' => 'Format foto tim harus berupa: png, jpg, jpeg, gif, atau bmp.',
            'foto_kolaborasi_serah_terima.min' => 'Gagal: Ukuran foto serah terima terlalu kecil. Minimal harus 2 MB.',
            'foto_kolaborasi_serah_terima.max' => 'Gagal: Ukuran foto serah terima terlalu besar. Maksimal 8 MB.',
            'foto_kolaborasi_serah_terima.mimes' => 'Format foto serah terima harus berupa: png, jpg, jpeg, gif, atau bmp.',
        ]);

        $tentang = TentangKami::first() ?? new TentangKami();
        $data = $request->except(['_token', '_method', 'foto_kolaborasi_tim', 'foto_kolaborasi_serah_terima']);

        if ($request->hasFile('foto_kolaborasi_tim')) {
            if ($tentang->foto_kolaborasi_tim && Storage::disk('public')->exists($tentang->foto_kolaborasi_tim)) {
                Storage::disk('public')->delete($tentang->foto_kolaborasi_tim);
            }
            $data['foto_kolaborasi_tim'] = $request->file('foto_kolaborasi_tim')->store('kolaborasi', 'public');
        }

        if ($request->hasFile('foto_kolaborasi_serah_terima')) {
            if ($tentang->foto_kolaborasi_serah_terima && Storage::disk('public')->exists($tentang->foto_kolaborasi_serah_terima)) {
                Storage::disk('public')->delete($tentang->foto_kolaborasi_serah_terima);
            }
            $data['foto_kolaborasi_serah_terima'] = $request->file('foto_kolaborasi_serah_terima')->store('kolaborasi', 'public');
        }

        TentangKami::updateOrCreate(['id' => 1], $data);

        return redirect()->back()->with('success', 'Informasi Tentang Kami berhasil diperbarui!');
    }

    public function storeTim(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:png,jpg,jpeg,gif,bmp|min:2048|max:8192',
        ], [
            'foto.min' => 'Gagal: Ukuran foto anggota terlalu kecil. Minimal harus 2 MB.',
            'foto.max' => 'Gagal: Ukuran foto anggota terlalu besar. Maksimal 8 MB.',
            'foto.mimes' => 'Format foto harus berupa: png, jpg, jpeg, gif, atau bmp.'
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
            'foto' => 'nullable|image|mimes:png,jpg,jpeg,gif,bmp|min:2048|max:8192',
        ], [
            'foto.min' => 'Gagal: Ukuran foto anggota terlalu kecil. Minimal harus 2 MB.',
            'foto.max' => 'Gagal: Ukuran foto anggota terlalu besar. Maksimal 8 MB.',
            'foto.mimes' => 'Format foto harus berupa: png, jpg, jpeg, gif, atau bmp.'
        ]);

        if ($request->hasFile('foto')) {
            if ($tim->foto && Storage::disk('public')->exists($tim->foto)) {
                Storage::disk('public')->delete($tim->foto);
            }
            $data['foto'] = $request->file('foto')->store('tim', 'public');
        }

        $tim->update($data);
        return redirect()->back()->with('success', 'Data anggota tim diperbarui.');
    }

    public function destroyTim($id)
    {
        $tim = AnggotaTim::findOrFail($id);
        if ($tim->foto && Storage::disk('public')->exists($tim->foto)) {
            Storage::disk('public')->delete($tim->foto);
        }
        $tim->delete();

        return redirect()->back()->with('success', 'Anggota tim dihapus.');
    }
}
