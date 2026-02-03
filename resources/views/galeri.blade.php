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
            height: 270px;
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
            height: 100%;
            object-fit: cover;
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
            box-shadow: inset 0 -4px 0 #D4AF37;
            opacity: .95;
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
                    <iframe src="https://www.youtube.com/embed/videoseries?list=UUcyvmgQ5nV3kTKxDx6OSdFQ"
                        title="YouTube Uploads" allowfullscreen>
                    </iframe>
                </div>
                @php
                    $galeri = [
                        ['pondok.jpeg'],
                        ['pondok1.jpeg'],
                        ['pondok2.jpeg'],
                        ['pondok.jpeg'],
                        ['pondok1.jpeg'],
                        ['pondok2.jpeg'],
                    ];
                @endphp

                @foreach ($galeri as $i => $g)
                    <div class="col-lg-4 col-md-6 reveal delay-{{ ($i % 3) + 1 }}">
                        <div class="gallery-item">
                            <img src="{{ asset('image/' . $g[0]) }}">
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

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

@endsection
