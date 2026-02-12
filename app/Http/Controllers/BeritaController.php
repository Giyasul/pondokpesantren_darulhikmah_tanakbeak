<?php

namespace App\Http\Controllers;

use App\Models\Berita;

class BeritaController extends Controller
{
    public function index()
    {
        $berita = Berita::latest()->take(3)->get();

        return view('welcome', compact('berita'));
    }

    public function show($id)
    {
        $berita = Berita::findOrFail($id);

        return view('berita_lengkap', compact('berita'));
    }

    public function semua()
    {
        $beritas = Berita::latest()->paginate(10);

        return view('berita', compact('beritas'));
    }
}
