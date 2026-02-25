<?php

use App\Http\Controllers\BeritaController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\PerpustakaanController;
use Illuminate\Support\Facades\Route;

Route::get('/sejarah', function () {
    return view('sejarah');
});
Route::get('/visi-misi', function () {
    return view('visi_misi');
});
// Route::get('/tenaga-pendidik', function () {
//     return view('tenaga_pendidik');
// });
Route::get('/', [BeritaController::class, 'index']);
Route::get('/galeri', [GaleriController::class, 'index']);
Route::get('/berita/{id}', [BeritaController::class, 'show'])->name('berita');
Route::get('/berita', [BeritaController::class, 'semua'])->name('berita.semua');
Route::get('/perpustakaan', [PerpustakaanController::class, 'index'])->name('perpustakaan.index');
use App\Http\Controllers\GuruContoller;

Route::get('/tenaga-pendidik', [GuruContoller::class, 'index'])->name('tenaga-pendidik');


use App\Http\Controllers\SantriController;

    
// Route untuk halaman data santri
Route::get('/santri', [SantriController::class, 'index'])->name('santri.index');  




// Route untuk Galeri Foto
Route::get('/galeri/foto', [GaleriController::class, 'index'])->name('galeri.foto');

// Route untuk Galeri Video (Opsional, jika ingin dipisah)
Route::get('/galeri/video', [GaleriController::class, 'video'])->name('galeri.video');