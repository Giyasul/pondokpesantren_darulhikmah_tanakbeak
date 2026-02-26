<?php

namespace App\Http\Controllers;

use App\Models\DataSiswa;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SantriController extends Controller
{
    public function index(Request $request): View
    {
        // 1. Logika untuk Statistik (Agar angka di atas tabel tetap update)
        $jumlahAktif = DataSiswa::where('status', 'Aktif')->count();
        $jumlahAlumni = DataSiswa::where('status', 'Lulus')->count();

        // 2. Logika untuk Tabel Santri (Pencarian & Filter)
        $query = DataSiswa::query();

        // Filter berdasarkan nama (Pencarian)
        if ($request->filled('search')) {
            $query->where('nama', 'like', '%'.$request->search.'%');
        }

        // Filter berdasarkan Jenjang (MI/MTs/MA)
        if ($request->filled('jenjang')) {
            $query->where('jenjang', $request->jenjang);
        }

        // Filter berdasarkan Kelas
        if ($request->filled('kelas')) {
            $query->where('kelas', 'like', '%'.$request->kelas.'%');
        }

        // Ambil data dengan pagination (10 data per halaman)
        $santris = $query->paginate(10)->withQueryString();

        // Kirim semua variabel ke view 'Santri.Santri'
        return view('Santri.Santri', compact('santris', 'jumlahAktif', 'jumlahAlumni'));
    }
}