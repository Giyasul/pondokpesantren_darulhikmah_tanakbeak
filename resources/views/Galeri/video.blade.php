@extends('layout.layout')
@section('judul', 'Galeri Video - Pondok Pesantren Darul Hikmah')
@section('konten')

    <style>
        /* 1. Background Hijau Muda */
        html,
        body {
            background-color: #f1f8f1;
            overflow-x: hidden;
        }

        /* 2. Hero Section / Carousel */
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
            opacity: 0.45;
        }

        .carousel-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            background: rgba(0, 0, 0, 0.4);
            text-align: center;
        }

        .carousel-overlay h1 {
            font-weight: 800;
            font-size: clamp(2.5rem, 6vw, 4rem);
            color: #ffffff;
            text-transform: uppercase;
            letter-spacing: 2px;
            margin: 0;
            text-shadow:
                0 0 6px rgba(255, 255, 255, 0.45),
                0 0 14px rgba(212, 175, 55, 0.35),
                2px 2px 10px rgba(0, 0, 0, 0.85);
        }

        /* 3. Transisi Halus Tulisan Carousel */
        .reveal {
            opacity: 0;
            transform: translateY(40px);
            transition: all 1.2s cubic-bezier(0.165, 0.84, 0.44, 1);
            will-change: transform, opacity;
        }

        .reveal.show {
            opacity: 1;
            transform: translateY(0);
        }

        .carousel-overlay h1 {
            transition-delay: 0.3s;
            /* Jeda sedikit agar estetik */
        }

        /* 4. Garis Emas List */
        .gold-separator {
            width: 100%;
            height: 6px;
            background: linear-gradient(90deg, #b8860b 0%, #d4af37 50%, #b8860b 100%);
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.15);
            position: relative;
            z-index: 10;
        }

        /* 5. Main Wrapper */
        .main-gallery-wrapper {
            margin-top: 60px;
            padding-bottom: 100px;
        }

        .gallery-card-container {
            background: #ffffff;
            border-radius: 20px;
            padding: 50px 40px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.03);
            border: 1px solid rgba(13, 107, 13, 0.1);
        }

        /* 6. Section Title */
        .section-header {
            text-align: center;
            margin-bottom: 25px;
        }

        .section-title {
            font-weight: 800;
            color: #0D6B0D;
            font-size: 1.8rem;
            text-transform: uppercase;
            display: inline-block;
            position: relative;
            padding-bottom: 10px;
        }

        .section-title::after {
            content: "";
            position: absolute;
            left: 20%;
            bottom: 0;
            width: 60%;
            height: 4px;
            background: #D4AF37;
            border-radius: 2px;
        }

        /* 7. Video Card Style */
        .video-card {
            background: #fff;
            border-radius: 15px;
            overflow: hidden;
            transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
            border: 1px solid rgba(0, 0, 0, 0.03);
            height: 100%;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
        }

        .video-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 25px rgba(0, 0, 0, 0.1);
        }

        .video-wrapper {
            position: relative;
            width: 100%;
            aspect-ratio: 16 / 9;
            background: #000;
        }

        .video-wrapper iframe,
        .video-wrapper video {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border: none;
        }

        .video-info {
            padding: 20px;
            text-align: center;
        }

        .video-title {
            font-weight: 700;
            color: #333;
            margin: 0;
            font-size: 1.1rem;
        }

        /* 8. Kustomisasi Pagination */
        .pagination-wrapper .pagination {
            gap: 5px;
        }

        .pagination-wrapper .page-link {
            color: #0D6B0D;
            border-radius: 8px;
            border: 1px solid #dee2e6;
            padding: 8px 16px;
            transition: 0.3s;
        }

        .pagination-wrapper .page-item.active .page-link {
            background-color: #0D6B0D;
            border-color: #0D6B0D;
            color: #fff;
        }
    </style>

    {{-- Banner --}}
    <div class="carousel slide hero-carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="carousel-image-container">
                    <img src="{{ asset('image/pondok.jpeg') }}" alt="Banner Video">
                    <div class="carousel-overlay">
                        <div class="reveal">
                            <h1>Galeri Video</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="gold-separator"></div>

    {{-- Content --}}
    <div class="container main-gallery-wrapper">
        <div class="gallery-card-container reveal">
            <div class="section-header">
                <h2 class="section-title">VIDEO KEGIATAN</h2>
            </div>

            <div class="row g-4 justify-content-center">
                @forelse($videos as $item)
                    <div class="col-12 col-md-6">
                        <div class="video-card">
                            <div class="video-wrapper">
                                {{-- Deteksi Youtube atau File Lokal --}}
                                @if (str_contains($item->video, 'youtube.com') || str_contains($item->video, 'youtu.be'))
                                    @php
                                        $url = parse_url($item->video);
                                        if (isset($url['query'])) {
                                            parse_str($url['query'], $query);
                                            $id = $query['v'] ?? '';
                                        } else {
                                            $id = ltrim($url['path'], '/');
                                        }
                                    @endphp
                                    <iframe src="https://www.youtube.com/embed/{{ $id }}"
                                        allowfullscreen></iframe>
                                @else
                                    <video controls>
                                        <source src="{{ asset('storage/' . $item->video) }}" type="video/mp4">
                                        Browser anda tidak mendukung video.
                                    </video>
                                @endif
                            </div>
                            <div class="video-info">
                                <h5 class="video-title">{{ $item->folder }}</h5>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center py-5">
                        <p class="text-muted">Video belum tersedia.</p>
                    </div>
                @endforelse
            </div>

            {{-- Navigasi Pagination --}}
            <div class="d-flex justify-content-center mt-5 pagination-wrapper">
                {{ $videos->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Observer untuk memicu animasi reveal
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
