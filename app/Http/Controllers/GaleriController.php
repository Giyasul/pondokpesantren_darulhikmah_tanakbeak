<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;

class GaleriController extends Controller
{
    public function index()
    {
        $galeri = Galeri::latest()->paginate(8);
 
        // Memanggil file foto.blade.php di dalam folder Galeri
        return view('Galeri.foto', compact('galeri'));
    }

    public function video()
    {
        $videos = \App\Models\Video::latest()->paginate(4);

        // PENTING: Nama di dalam compact harus 'videos' (pakai 's')
        return view('Galeri.video', compact('videos'));
    }
}