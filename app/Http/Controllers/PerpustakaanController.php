<?php

namespace App\Http\Controllers;

use App\Models\Perpustakaan;
use Illuminate\Http\Request;

class PerpustakaanController extends Controller
{
    public function index()
    {
        // Mengambil data terbaru, 10 buku per halaman
        $books = Perpustakaan::latest()->paginate(10);
        
        return view('perpustakaan', compact('books'));
    }
}