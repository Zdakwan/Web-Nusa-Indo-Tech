<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PenggunaController extends Controller
{
    public function index()
    {
        $admins = Admin::latest()->paginate(10);
        return view('admin.pengguna.index', compact('admins'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:admins,email',
            'password' => 'required|string|min:6',
            'role'     => 'required|in:super_admin,admin_konten,admin_layanan',
        ]);

        Admin::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'     => $request->role,
        ]);
        return back()->with('success', 'Admin berhasil ditambahkan.');
    }

    public function destroy($id)
    {
        if (auth('admin')->id() == $id) return back()->withErrors(['Tidak bisa menghapus akun sendiri!']);
        Admin::findOrFail($id)->delete();
        return back()->with('success', 'Admin berhasil dihapus.');
    }
}
