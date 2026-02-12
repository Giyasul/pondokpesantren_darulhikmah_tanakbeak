@extends('layout.layout')
@section('judul', 'Semua Berita')
@section('konten')

    <style>
        html,
        body {
            overflow-x: hidden;
        }

        .berita-section {
            padding: 70px 0;
        }

        .berita-card {
            border: none;
            border-radius: 18px;
            overflow: hidden;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
            transition: 0.3s;
            height: 100%;
        }

        .berita-card:hover {
            transform: translateY(-6px);
        }

        .berita-img {
            height: 220px;
            object-fit: cover;
            width: 100%;
        }

        .berita-title {
            font-weight: 700;
            font-size: 18px;
            min-height: 50px;
        }

        .berita-meta {
            font-size: 13px;
            color: #777;
        }

        .berita-excerpt {
            font-size: 14px;
            color: #555;
        }

        .btn-baca {
            border-radius: 30px;
            padding: 6px 18px;
            font-size: 14px;
        }
    </style>

    <div class="container berita-section">
        <div class="row">

            @foreach ($beritas as $berita)
                <div class="col-md-4 mb-4">
                    <div class="card berita-card">

                        {{-- Gambar --}}
                        <img src="{{ asset('storage/' . $berita->gambar) }}" class="berita-img" alt="{{ $berita->judul }}">

                        <div class="card-body d-flex flex-column">

                            {{-- Judul --}}
                            <div class="berita-title mb-2">
                                {{ Str::limit($berita->judul, 60) }}
                            </div>

                            {{-- Meta --}}
                            <div class="berita-meta mb-2">
                                {{ $berita->created_at->format('d M Y') }}
                            </div>

                            {{-- Isi Singkat --}}
                            <div class="berita-excerpt mb-3">
                                {{ Str::limit($berita->isi, 100) }}
                            </div>

                            {{-- Tombol --}}
                            <a href="{{ url('/berita/' . $berita->id) }}" class="btn btn-success btn-baca mt-auto">
                                Baca Selengkapnya →
                            </a>

                        </div>
                    </div>
                </div>
            @endforeach

        </div>

        {{-- Pagination --}}
        <div class="d-flex justify-content-center mt-4">
            {{ $beritas->links() }}
        </div>
    </div>

@endsection
