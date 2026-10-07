<?php

namespace App\Http\Controllers;

class PengaturanController extends Controller
{
    /**
     * Menampilkan halaman Pengaturan.
     */
    public function index()
    {
        return view('pengaturan.index');
    }
}