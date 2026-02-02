<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/galeri', function () {
    return view('galeri');
});
Route::get('/sejarah', function () {
    return view('sejarah');
});
Route::get('/visi-misi', function () {
    return view('visi_misi');
});
