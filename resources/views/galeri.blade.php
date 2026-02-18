@extends('layout.layout')
@section('judul', 'Galeri Pondok Pesantren Darul Hikmah')
@section('konten')

    <style>
        /* HEADER - Redup & Elegan */
        .page-header {
            background:
                linear-gradient(to bottom, rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.75)),
                url('{{ asset('image/pondok.jpeg') }}') center/cover no-repeat;
            padding: 180px 0;
            color: #fff;
            text-align: center;
            border-bottom: 3px solid #D4AF37;
        }

        .page-header h1 {
            font-weight: 800;
            font-size: clamp(2.2rem, 5vw, 3.5rem);
            color: #ffffff;
            text-shadow:
                0 0 6px rgba(255, 255, 255, 0.45),
                0 0 14px rgba(212, 175, 55, 0.35),
                2px 2px 10px rgba(0, 0, 0, 0.85);
        }

        .page-header p {
            font-weight: 500;
            font-size: 1.1rem;
            text-shadow:
                0 0 6px rgba(255, 255, 255, 0.45),
                0 0 14px rgba(212, 175, 55, 0.35),
                2px 2px 10px rgba(0, 0, 0, 0.85);
        }

        .gallery-section {
            padding: 80px 0;
        }

        .gallery-item {
            position: relative;
            border-radius: 18px;
            overflow: hidden;
            background: #000;
            box-shadow:
                0 0 0 1px rgba(212, 175, 55, .35),
                0 0 16px rgba(212, 175, 55, .25),
                0 18px 40px rgba(0, 0, 0, .65);
            transition: transform .35s ease, box-shadow .35s ease;
        }

        .gallery-item:hover {
            transform: translateY(-6px) scale(1.02);
            box-shadow:
                0 0 22px rgba(212, 175, 55, .45),
                0 22px 45px rgba(0, 0, 0, .75);
        }

        .gallery-item img {
            width: 100%;
            transition: transform .6s ease;
        }

        .gallery-item:hover img {
            transform: scale(1.12);
        }

        .gallery-overlay {
            position: absolute;
            inset: 0;
            display: flex;
            align-items: flex-end;
            padding: 22px;
            background:
                linear-gradient(to top,
                    rgba(0, 0, 0, .85),
                    rgba(0, 0, 0, .2),
                    transparent);
            opacity: 0;
            transition: opacity .4s ease;
        }

        .gallery-item:hover .gallery-overlay {
            opacity: 1;
        }

        .gallery-item::after {
            content: "";
            position: absolute;
            inset: 0;
            border-radius: 18px;
            box-shadow: inset 0 -2px 0 rgba(212, 175, 55, 0.8);
            pointer-events: none;
        }

        .reveal {
            opacity: 0;
            transform: translateY(40px);
            transition: all .8s ease;
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

        .delay-3 {
            transition-delay: .45s
        }

        /* LIGHTBOX */
        .lightbox {
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, .85);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            opacity: 0;
            visibility: hidden;
            transition: .35s ease;
            z-index: 2000;
        }

        .lightbox.show {
            opacity: 1;
            visibility: visible;
        }

        .lightbox img {
            max-width: 90%;
            max-height: 80vh;
            border-radius: 16px;
            box-shadow:
                0 0 0 1px rgba(212, 175, 55, .35),
                0 0 18px rgba(212, 175, 55, .35),
                0 25px 50px rgba(0, 0, 0, .85);
            animation: zoomIn .35s ease;
        }

        @keyframes zoomIn {
            from {
                transform: scale(.85);
                opacity: 0;
            }

            to {
                transform: scale(1);
                opacity: 1;
            }
        }

        .lightbox-close {
            position: absolute;
            top: 20px;
            right: 28px;
            font-size: 34px;
            color: #fff;
            cursor: pointer;
        }

        .lightbox-download {
            margin-top: 18px;
            padding: 10px 24px;
            border-radius: 12px;
            font-weight: 600;
            letter-spacing: .3px;

            color: #0D6B0D;
            background: white;
            border: 1.8px solid #0D6B0D;

            text-decoration: none;
            transition:
                background-color .35s ease,
                color .35s ease,
                box-shadow .45s cubic-bezier(.22, 1, .36, 1),
                transform .45s cubic-bezier(.22, 1, .36, 1);
        }

        .lightbox-download:hover {
            background: #0D6B0D;
            color: #ffffff;
            transform: translateY(-2px) scale(1.04);
            box-shadow: 0 14px 36px rgba(13, 107, 13, .45);
        }

        .gallery-masonry {
            column-count: 4;
            column-gap: 20px;
        }

        .gallery-item {
            break-inside: avoid;
            margin-bottom: 20px;
            border-radius: 18px;
            overflow: hidden;
            box-shadow:
                0 0 0 1px rgba(212, 175, 55, .35),
                0 0 16px rgba(212, 175, 55, .25),
                0 18px 40px rgba(0, 0, 0, .65);
        }

        .gallery-item img {
            width: 100%;
            height: auto;
            display: block;
            border-radius: 18px;
        }

        @media (max-width: 992px) {
            .gallery-masonry {
                column-count: 3;
            }
        }

        @media (max-width: 576px) {
            .gallery-masonry {
                column-count: 3;
            }
        }
    </style>

    <!-- HEADER -->
    <section class="page-header">
        <div class="container reveal">
            <h1>Galeri Kegiatan Pondok</h1>
            <p>
                Dokumentasi kegiatan santri dan kehidupan di Pondok Pesantren
                Darul Hikmah
            </p>
        </div>
    </section>

    <!-- GALLERY -->
    <section class="gallery-section">
        <div class="container">
            <div class="row g-4">
                <div class="ratio ratio-16x9 rounded-4 overflow-hidden shadow-lg">
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/E05goM3V8tM?si=5nsFQsrJ_hExc8Us"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </div>
                <div class="gallery-masonry">
                    @foreach ($galeri as $g)
                        <div class="gallery-item reveal">
                            <img src="{{ asset('storage/' . $g->gambar) }}" class="gallery-img"
                                data-src="{{ asset('storage/' . $g->gambar) }}">
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <!-- LIGHTBOX -->
    <div id="lightbox" class="lightbox">
        <span class="lightbox-close">&times;</span>
        <img id="lightbox-img" src="">
        <a id="lightbox-download" class="lightbox-download" download>
            <i class="bi bi-download me-1"></i> Download
        </a>
    </div>

    <script>
        const reveals = document.querySelectorAll('.reveal');
        const observer = new IntersectionObserver(entries => {
            entries.forEach(entry => {
                if (entry.isIntersecting) entry.target.classList.add('show');
            });
        }, {
            threshold: 0.2
        });
        reveals.forEach(el => observer.observe(el));
    </script>
    <script>
        const lightbox = document.getElementById('lightbox');
        const lightboxImg = document.getElementById('lightbox-img');
        const downloadBtn = document.getElementById('lightbox-download');
        const closeBtn = document.querySelector('.lightbox-close');

        document.querySelectorAll('.gallery-img').forEach(img => {
            img.addEventListener('click', () => {
                const src = img.getAttribute('data-src');
                lightboxImg.src = src;
                downloadBtn.href = src;
                lightbox.classList.add('show');
            });
        });

        closeBtn.addEventListener('click', () => {
            lightbox.classList.remove('show');
        });

        lightbox.addEventListener('click', e => {
            if (e.target === lightbox) {
                lightbox.classList.remove('show');
            }
        });
    </script>
@endsection
