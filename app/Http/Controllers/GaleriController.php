<?php

namespace App\Http\Controllers;

use App\Models\Galeri;

class GaleriController extends Controller
{
    public function index()
    {
        $data = Galeri::latest()->get()->groupBy('folder');

        $galeri = $data->map(function ($items) {
            $first = $items->first();

            $allImages = [];

            foreach ($items as $item) {
                $imgs = is_array($item->gambar)
                    ? $item->gambar
                    : json_decode($item->gambar, true);

                if (! empty($imgs)) {
                    $allImages = array_merge($allImages, $imgs);
                }
            }

            $first->gambar = $allImages;

            return $first;
        })->values();

        // manual pagination
        $perPage = 8;
        $currentPage = request()->get('page', 1);

        $paged = new \Illuminate\Pagination\LengthAwarePaginator(
            $galeri->forPage($currentPage, $perPage),
            $galeri->count(),
            $perPage,
            $currentPage,
            ['path' => request()->url()]
        );

        return view('Galeri.foto', ['galeri' => $paged]);
    }

    public function video()
    {
        $videos = \App\Models\Video::latest()->paginate(4);

        // PENTING: Nama di dalam compact harus 'videos' (pakai 's')
        return view('Galeri.video', compact('videos'));
    }
}
