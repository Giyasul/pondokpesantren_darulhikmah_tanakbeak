<?php

    namespace App\Http\Controllers;

    // Gunakan model DataSiswa sesuai folder Models Anda
    use App\Models\DataSiswa; 
    use Illuminate\Http\Request;
    use Illuminate\View\View;

    class SantriController extends Controller
    {
        public function index(Request $request): View
{
    $query = DataSiswa::query();

    if ($request->filled('search')) {
        $query->where('nama', 'like', '%' . $request->search . '%');
    }

    if ($request->filled('jenjang')) {
        $query->where('jenjang', $request->jenjang);
    }
    
    // Gunakan LIKE agar jika di DB isinya "kelas 12", 
    // input "12" dari filter tetap bisa menemukannya.
    if ($request->filled('kelas')) {
        $query->where('kelas', 'like', '%' . $request->kelas . '%');
    }

    // Pastikan filter tidak hilang saat pindah halaman (pagination)
    $santris = $query->paginate(10)->withQueryString();

    return view('Santri.Santri', compact('santris'));
}
    }