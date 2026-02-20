<?php

namespace App\Http\Controllers;

use App\Models\DataGuru; // Import model
use Illuminate\Http\Request;

class GuruContoller extends Controller
{
    public function index()
    {
        // Mengambil semua data guru dari table 'guru'
        // Gunakan paginate(12) agar otomatis mendukung pagination jika guru sudah banyak
        $gurus = DataGuru::latest()->paginate(12);

        // Mengarahkan ke file views/Tenaga_Pendidik/Tenaga_pendidik.blade.php
        return view('Tenaga_Pendidik.Tenaga_pendidik', compact('gurus'));
    }
}