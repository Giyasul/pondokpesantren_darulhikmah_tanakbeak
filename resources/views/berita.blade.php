    @extends('layout.layout')
    @section('judul', 'Indeks Berita - Pondok Pesantren Darul Hikmah')
    @section('konten')

        <style>
            html,
            body {
                background-color: #f8f9fa;
                overflow-x: hidden;
            }

            /* CAROUSEL HEADER - Redup & Elegan (Konsisten dengan Sejarah/Perpustakaan) */
            .hero-carousel .carousel-item {
                height: 400px;
                background-color: #000;
            }

            .carousel-image-container {
                position: relative;
                width: 100%;
                height: 100%;
            }

            .carousel-image-container img {
                width: 100%;
                height: 100%;
                object-fit: cover;
                opacity: 0.5;
            }

            .carousel-overlay {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: linear-gradient(to bottom, rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.7));
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                color: #fff;
                text-align: center;
                border-bottom: 4px solid #D4AF37;
            }

            .carousel-overlay h1 {
                font-weight: 800;
                font-size: clamp(2rem, 5vw, 3rem);
                text-transform: uppercase;
                text-shadow:
                    0 0 6px rgba(255, 255, 255, 0.45),
                    0 0 14px rgba(212, 175, 55, 0.35),
                    2px 2px 10px rgba(0, 0, 0, 0.85);
                margin-bottom: 10px;
            }

            .carousel-overlay p {
                font-size: 1.1rem;
                max-width: 700px;
                margin: 0 auto;
                text-shadow:
                    0 0 6px rgba(255, 255, 255, 0.45),
                    0 0 14px rgba(212, 175, 55, 0.35),
                    2px 2px 10px rgba(0, 0, 0, 0.85);
            }

            /* SECTION BERITA */
            .berita-section {
                padding: 60px 0 80px;
            }

            /* Judul Tengah Garis Otomatis */
            .section-header {
                text-align: center;
                margin-bottom: 50px;
            }

            .section-title {
                font-weight: 800;
                color: #0D6B0D;
                font-size: 1.8rem;
                text-transform: uppercase;
                display: inline-block;
                position: relative;
                padding-bottom: 8px;
            }

            .section-title::after {
                content: "";
                position: absolute;
                left: 0;
                bottom: 0;
                width: 100%;
                height: 4px;
                background: #D4AF37;
                border-radius: 2px;
            }

            /* Card Berita Modern */
            .berita-card {
                border: none;
                background: #fff;
                transition: all 0.3s ease;
                height: 100%;
                display: flex;
                flex-direction: column;
                border-radius: 15px;
                overflow: hidden;
                box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            }

            .berita-card:hover {
                transform: translateY(-10px);
                box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
            }

            .img-wrapper {
                position: relative;
                width: 100%;
                aspect-ratio: 16/9;
                overflow: hidden;
            }

            .berita-img {
                width: 100%;
                height: 100%;
                object-fit: cover;
                transition: transform 0.5s ease;
            }

            .berita-card:hover .berita-img {
                transform: scale(1.1);
            }

            .berita-body {
                padding: 20px;
                flex-grow: 1;
                display: flex;
                flex-direction: column;
            }

            .category-label {
                color: #D4AF37;
                font-weight: 700;
                font-size: 0.75rem;
                text-transform: uppercase;
                margin-bottom: 8px;
                display: block;
            }

            .berita-title {
                font-weight: 700;
                font-size: 1.15rem;
                line-height: 1.4;
                color: #222;
                margin-bottom: 12px;
                text-decoration: none;
                display: -webkit-box;
                -webkit-line-clamp: 2;
                -webkit-box-orient: vertical;
                overflow: hidden;
                min-height: 3.2rem;
            }

            .berita-title:hover {
                color: #0D6B0D;
            }

            .berita-meta {
                font-size: 0.8rem;
                color: #999;
                margin-bottom: 15px;
                display: flex;
                align-items: center;
            }

            .berita-excerpt {
                color: #666;
                font-size: 0.9rem;
                line-height: 1.5;
                margin-bottom: 0;
            }

            /* Reveal Animation Style */
            .reveal {
                opacity: 0;
                transform: translateY(40px);
                transition: all .8s ease;
            }

            .reveal.show {
                opacity: 1;
                transform: translateY(0);
            }

            @media (max-width: 768px) {
                .hero-carousel .carousel-item {
                    height: 300px;
                }

                .section-title {
                    font-size: 1.5rem;
                }
            }
        </style>

        <div id="heroBerita" class="carousel slide hero-carousel" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="carousel-image-container">
                        <img src="{{ asset('image/pondok.jpeg') }}" alt="Berita Pondok">
                        <div class="carousel-overlay">
                            <div class="container reveal">
                                <h1>Warta Pesantren</h1>
                                <p>Informasi terbaru, kegiatan santri, dan kabar terkini dari keluarga besar Pondok
                                    Pesantren Darul Hikmah NW Tanak Beak.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container berita-section">
            {{-- Header Judul Tengah --}}
            <div class="section-header reveal">
                <h2 class="section-title">Berita Terbaru</h2>
            </div>

            <div class="row g-4">
                @foreach ($beritas as $berita)
                    <div class="col-12 col-md-6 col-lg-4 reveal">
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
                                    <i class="bi bi-calendar3 me-2"></i>
                                    {{ $berita->created_at->translatedFormat('d F Y') }}
                                </div>

                                <p class="berita-excerpt">
                                    {{ Str::limit(strip_tags($berita->isi), 90) }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- Pagination --}}
            <div class="d-flex justify-content-center mt-5 reveal">
                {{ $beritas->links('pagination::bootstrap-5') }}
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const observer = new IntersectionObserver(entries => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            entry.target.classList.add('show');
                        }
                    });
                }, {
                    threshold: 0.1
                });

                document.querySelectorAll('.reveal').forEach(el => observer.observe(el));
            });
        </script>

    @endsection
