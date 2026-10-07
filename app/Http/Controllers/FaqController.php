<?php

namespace App\Http\Controllers;

class FaqController extends Controller
{
    /**
     * Menampilkan halaman FAQ.
     */
    public function index()
    {
        return view('pengaturan.faq.index');
    }
}