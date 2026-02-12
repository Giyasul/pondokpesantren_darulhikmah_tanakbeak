@extends('layout.layout')
@section('judul', 'Berita Lengkap')
@section('konten')

    <style>
        .detail-section {
            padding: 100px 0;
            background: #f8f9fa;
        }

        .detail-card {
            background: #ffffff;
            border-radius: 20px;
            overflow: hidden;
            border: 2px solid rgba(212, 175, 55, .7);
            box-shadow:
                0 10px 25px rgba(212, 175, 55, .3),
                0 25px 60px rgba(0, 0, 0, .15);
            transition: .4s ease;
        }

        .detail-card:hover {
            transform: translateY(-6px);
            box-shadow:
                0 14px 35px rgba(212, 175, 55, .5),
                0 30px 70px rgba(0, 0, 0, .2);
        }

        .detail-image img {
            width: 100%;
            height: 420px;
            object-fit: cover;
        }

        .detail-content {
            padding: 40px;
        }

        .detail-title {
            font-weight: 800;
            color: #004d00;
            font-size: 2rem;
        }

        .detail-meta {
            font-size: .9rem;
            color: #6c757d;
            margin-bottom: 25px;
        }

        .detail-meta span {
            margin-right: 15px;
        }

        .detail-text {
            line-height: 1.9;
            font-size: 1.05rem;
            color: #333;
            text-align: justify;
        }

        .btn-kembali {
            border-radius: 12px;
            font-weight: 600;
            color: #0D6B0D;
            border: 2px solid #0D6B0D;
            background: transparent;
            transition: .3s ease;
        }

        .btn-kembali:hover {
            background: #0D6B0D;
            color: #fff;
            transform: translateY(-3px);
            box-shadow: 0 12px 30px rgba(13, 107, 13, .35);
        }

        @media (max-width: 768px) {
            .detail-image img {
                height: 250px;
            }

            .detail-content {
                padding: 25px;
            }
        }
    </style>

    <section class="detail-section">
        <div class="container">
            <div class="detail-card">

                {{-- GAMBAR --}}
                <div class="detail-image">
                    <img src="{{ asset('storage/' . $berita->gambar) }}" alt="{{ $berita->judul }}">
                </div>

                {{-- ISI --}}
                <div class="detail-content">
                    <h2 class="detail-title mb-3">
                        {{ $berita->judul }}
                    </h2>

                    <div class="detail-meta">
                        <span>
                            <i class="bi bi-person-fill"></i>
                            {{ $berita->penulis }}
                        </span>

                        <span>
                            <i class="bi bi-calendar-event"></i>
                            {{ $berita->created_at->format('d F Y') }}
                        </span>
                    </div>

                    <div class="detail-text">
                        {!! nl2br(e($berita->isi)) !!}
                    </div>

                    <div class="mt-4">
                        <a href="{{ url()->previous() }}" class="btn px-4 py-2 btn-kembali">
                            <i class="bi bi-arrow-left"></i> Kembali
                        </a>
                    </div>

                </div>

            </div>
        </div>
    </section>

@endsection
