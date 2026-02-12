@extends('layout.layout')
@section('judul', 'Berita Lengkap')
@section('konten')

    <style>
        html,
        body {
            overflow-x: hidden;
            background-color: #ffffff;
        }

        .detail-section {
            padding: 60px 0;
        }

        .news-container {
            max-width: 800px;
            margin: 0 auto;
        }

        .news-header {
            text-align: center;
            margin-bottom: 40px;
        }

        .detail-title {
            font-weight: 800;
            font-size: 2.5rem;
            line-height: 1.2;
            margin-bottom: 15px;
            color: #222;
        }

        .detail-meta {
            font-size: 0.95rem;
            color: #555;
        }

        .meta-author {
            color: #0D6B0D;
            font-weight: bold;
        }

        .detail-image img {
            width: 100%;
            border-radius: 18px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
        }

        .image-caption {
            font-size: 0.85rem;
            color: #777;
            margin: 15px 0 30px;
            text-align: center;
        }

        .detail-text {
            line-height: 1.8;
            font-size: 1.15rem;
            color: #222;
            margin-bottom: 50px;
            text-align: justify;
        }

        .promosi-section {
            margin-top: 50px;
            padding-top: 30px;
            border-top: 3px solid #D4AF37;
        }

        .promo-card {
            background: #ffffff;
            border-radius: 15px;
            transition: all 0.45s cubic-bezier(.22, 1, .36, 1);
            text-decoration: none !important;
            color: inherit;
            padding: 10px;
            border: 1px solid transparent;
        }

        .promo-card:hover {
            transform: translateY(-8px);
            border-color: #D4AF37;
            box-shadow: 0 14px 32px rgba(212, 175, 55, 0.2);
        }

        .promo-img {
            height: 140px;
            object-fit: cover;
            width: 100%;
            border-radius: 10px;
        }

        .promo-author {
            font-size: 0.8rem;
            color: #0D6B0D;
            font-weight: bold;
            margin-top: 10px;
        }

        .promo-headline {
            font-size: 0.95rem;
            font-weight: 700;
            line-height: 1.3;
            color: #004d00;
        }

        .back-btn {
            color: #0D6B0D;
            font-weight: 600;
            text-decoration: none;
            transition: 0.3s;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .back-btn:hover {
            color: #D4AF37;
            transform: translateX(-5px);
        }

        .reveal {
            opacity: 0;
            transform: translateY(40px);
            transition: opacity .8s ease, transform .8s ease;
        }

        .reveal.show {
            opacity: 1;
            transform: translateY(0);
        }

        .delay-1 {
            transition-delay: .15s
        }

        .delay-2 {
            transition-delay: .3s
        }
    </style>

    <section class="detail-section">
        <div class="container">
            <div class="news-container">

                {{-- Tombol Kembali - Diarahkan ke halaman berita utama --}}
                <div class="mb-4 reveal">
                    <a href="{{ url()->previous() }}" class="back-btn small">
                        <i class="bi bi-arrow-left"></i> KEMBALI</a>
                </div>

                <div class="news-header reveal">
                    <h1 class="detail-title">{{ $berita->judul }}</h1>
                    <div class="detail-meta">
                        <span class="meta-author">{{ $berita->penulis }}</span>
                        <span class="mx-2">|</span>
                        <span>{{ $berita->created_at->format('d M Y') }}</span>
                    </div>
                </div>

                <div class="detail-image reveal delay-1">
                    @if ($berita->gambar)
                        <img src="{{ asset('storage/' . $berita->gambar) }}" alt="{{ $berita->judul }}">
                    @else
                        <img src="{{ asset('image/pondok.jpeg') }}" alt="Default Image">
                    @endif
                    <div class="image-caption">Oleh: {{ $berita->penulis }}</div>
                </div>

                <div class="detail-text reveal delay-2">
                    {!! nl2br(e($berita->isi)) !!}
                </div>

                <div class="promosi-section">
                    <div class="mb-4 reveal">
                        <h5 class="fw-bold m-0" style="color:#004d00">BERITA LAINNYA</h5>
                    </div>

                    <div class="row g-4">
                        @foreach ($beritaLain as $index => $item)
                            <div class="col-6 col-md-4 reveal delay-{{ $index + 1 }}">
                                <a href="{{ route('berita', $item->id) }}" class="promo-card d-block">
                                    <div class="position-relative">
                                        @if ($item->gambar)
                                            <img src="{{ asset('storage/' . $item->gambar) }}" class="promo-img"
                                                alt="{{ $item->judul }}">
                                        @else
                                            <img src="{{ asset('image/pondok.jpeg') }}" class="promo-img" alt="Default">
                                        @endif
                                    </div>
                                    <div class="promo-author">{{ $item->penulis }}</div>
                                    <div class="promo-headline">{{ \Illuminate\Support\Str::limit($item->judul, 50) }}
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </section>

    <script>
        const revealEls = document.querySelectorAll('.reveal');
        const revealObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('show');
                }
            });
        }, {
            threshold: 0.1
        });
        revealEls.forEach(el => revealObserver.observe(el));
    </script>

@endsection
