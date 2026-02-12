<?php

namespace App\Http\Controllers;

use App\Models\Berita;

class BeritaController extends Controller
{
    public function index()
    {
        $berita = Berita::latest()->take(3)->get();
        // Ambil data promosi agar layout tidak error saat dimuat di halaman utama
        $beritaLain = Berita::inRandomOrder()->limit(6)->get();

        return view('welcome', compact('berita', 'beritaLain'));
    }

    public function show($id)
    {
        $berita = Berita::findOrFail($id);
        
        // Ambil 6 berita lain untuk section promosi di bawah berita lengkap
        $beritaLain = Berita::where('id', '!=', $id)
                            ->inRandomOrder()
                            ->limit(6)
                            ->get();

        return view('berita_lengkap', compact('berita', 'beritaLain'));
    }

    public function semua()
    {
        $beritas = Berita::latest()->paginate(10);
        return view('berita', compact('beritas'));
    }
}