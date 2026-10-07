<?php

namespace App\Http\Controllers;

class CallCenterController extends Controller
{
    /**
     * Menampilkan halaman Hubungi Call Center.
     */
    public function index()
    {
        return view('pengaturan.call-center.index');
    }
}