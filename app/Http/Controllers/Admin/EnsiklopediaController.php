<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ensiklopedia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EnsiklopediaController extends Controller
{
    public function index()
    {
        $ensiklopedia = Ensiklopedia::latest()->paginate(10);
        return view('admin.ensiklopedia.index', compact('ensiklopedia'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'judul'    => 'required|string|max:255',
            'kategori' => 'required|string|max:100',
            'konten'   => 'required|string',
            'gambar'   => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('ensiklopedia', 'public');
        }

        Ensiklopedia::create($data);
        return back()->with('success', 'Artikel berhasil ditambahkan.');
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
