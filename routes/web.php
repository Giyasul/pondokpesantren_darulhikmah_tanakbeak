<?php

use App\Http\Controllers\BeritaController;
use App\Http\Controllers\GaleriController;
use Illuminate\Support\Facades\Route;

Route::get('/sejarah', function () {
    return view('sejarah');
});
Route::get('/visi-misi', function () {
    return view('visi_misi');
});
Route::get('/tenaga-pendidik', function () {
    return view('tenaga_pendidik');
});
Route::get('/', [BeritaController::class, 'index']);
Route::get('/galeri', [GaleriController::class, 'index']);
Route::get('/berita/{id}', [BeritaController::class, 'show'])->name('berita');
Route::get('/berita', [BeritaController::class, 'semua'])->name('berita.semua');
