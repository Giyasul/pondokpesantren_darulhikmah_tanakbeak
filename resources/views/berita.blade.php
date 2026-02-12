@extends('layout.layout')
@section('judul', 'Indeks Berita - Pondok Pesantren Darul Hikmah')
@section('konten')

    <style>
        html,
        body {
            overflow-x: hidden;
            background: #f9f9f9;
        }

        .berita-section {
            padding: 30px 0 60px;
        }

        /* Header Indeks */
        .section-header {
            border-bottom: 2px solid #0D6B0D;
            margin-bottom: 25px;
        }

        .section-header h2 {
            font-weight: 800;
            color: #333;
            font-size: 1.4rem;
            text-transform: uppercase;
            margin-bottom: 8px;
        }

        /* Card Wrapper - Memastikan tinggi kartu sama (Equal Height) */
        .berita-card {
            border: none;
            background: #fff;
            /* Tambah background putih agar lebih bersih di mobile */
            transition: all 0.3s ease;
            height: 100%;
            display: flex;
            flex-direction: column;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        .img-wrapper {
            position: relative;
            width: 100%;
            aspect-ratio: 16/9;
            /* Menjaga rasio gambar tetap konsisten */
            overflow: hidden;
        }

        .berita-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        /* Tipografi & Konten */
        .berita-body {
            padding: 15px;
            flex-grow: 1;
            /* Membuat body mengisi sisa ruang kartu */
            display: flex;
            flex-direction: column;
        }

        .category-label {
            color: #d10000;
            font-weight: 700;
            font-size: 0.7rem;
            text-transform: uppercase;
            margin-bottom: 5px;
            display: block;
        }

        .berita-title {
            font-weight: 700;
            font-size: 1.1rem;
            line-height: 1.4;
            color: #222;
            margin-bottom: 10px;
            text-decoration: none;
            /* Potong teks jika judul terlalu panjang (3 baris) */
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .berita-title:hover {
            color: #0D6B0D;
        }

        .berita-meta {
            font-size: 0.75rem;
            color: #888;
            margin-bottom: 10px;
            margin-top: auto;
        }

        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .berita-section {
                padding: 20px 0 40px;
            }

            .berita-title {
                font-size: 1rem;
            }

            .section-header h2 {
                font-size: 1.2rem;
            }

            /* Mengurangi padding pada col untuk mobile agar kartu tidak terlalu sempit */
            .row.g-4 {
                --bs-gutter-x: 1rem;
            }
        }
    </style>

    <div class="container berita-section">
        <div class="section-header">
            <h2>Berita</h2>
        </div>

        <div class="row g-4">
            @foreach ($beritas as $berita)
                <div class="col-12 col-md-6 col-lg-4"> {{-- 1 kolom di mobile, 2 di tablet, 3 di desktop --}}
                    <div class="berita-card">
                        {{-- Gambar --}}
                        <a href="{{ route('berita', $berita->id) }}" class="img-wrapper">
                            @if ($berita->gambar)
                                <img src="{{ asset('storage/' . $berita->gambar) }}" class="berita-img"
                                    alt="{{ $berita->judul }}">
                            @else
                                <img src="{{ asset('image/pondok.jpeg') }}" class="berita-img" alt="Default">
                            @endif
                        </a>

                        <div class="berita-body">
                            <span class="category-label">{{ $berita->penulis ?? 'Warta Pesantren' }}</span>

                            <a href="{{ route('berita', $berita->id) }}" class="berita-title">
                                {{ $berita->judul }}
                            </a>

                            <div class="berita-meta">
                                <i class="bi bi-calendar3 me-1"></i>
                                {{ $berita->created_at->translatedFormat('d F Y') }}
                            </div>

                            <p class="text-muted small mb-0">
                                {{ Str::limit(strip_tags($berita->isi), 85) }}
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- Pagination --}}
        <div class="d-flex justify-content-center mt-5">
            {{ $beritas->links('pagination::bootstrap-5') }}
        </div>
    </div>

@endsection
