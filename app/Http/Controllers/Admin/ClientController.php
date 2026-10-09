<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::latest()->paginate(10);
        return view('admin.client.index', compact('clients'));
    }

    public function destroy($id)
    {
        Client::findOrFail($id)->delete();
        return back()->with('success', 'Akun Klien berhasil dihapus beserta data terkaitnya.');
    }
}
