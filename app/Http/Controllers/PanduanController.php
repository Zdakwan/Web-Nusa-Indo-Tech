<?php

namespace App\Http\Controllers;

class PanduanController extends Controller
{
    /**
     * Menampilkan halaman Panduan Penggunaan Platform.
     */
    public function index()
    {
        return view('pengaturan.panduan.index');
    }
}