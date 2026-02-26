<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\DataSiswa; // Tambahkan ini untuk mengambil data santri
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function index()
    {
        // --- Logika Berita (Tetap sesuai permintaan Anda) ---
        $berita = Berita::latest()->take(3)->get();
        $beritaLain = Berita::inRandomOrder()->limit(6)->get();

        // --- Tambahan Logika Statistik Santri untuk Welcome ---
        // Menghitung jumlah berdasarkan status di database
        $jumlahAktif = DataSiswa::where('status', 'aktif')->count();
        $jumlahAlumni = DataSiswa::where('status', 'lulus')->count();

        // Kirim semua variabel ke view 'welcome'
        return view('welcome', compact('berita', 'beritaLain', 'jumlahAktif', 'jumlahAlumni'));
    }

    public function show($id)
    {
        $berita = Berita::findOrFail($id);
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