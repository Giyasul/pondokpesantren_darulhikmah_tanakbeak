@extends('layout.layout')
@section('judul', 'Galeri Pondok Pesantren Darul Hikmah')
@section('konten')

    <style>
        .page-header {
            background:
                linear-gradient(to bottom, rgba(0, 0, 0, .35), rgba(0, 0, 0, .85)),
                url('{{ asset('image/pondok.jpeg') }}') center/cover no-repeat;
            padding: 120px 0;
            color: #fff;
            text-align: center;
        }

        .page-header h1 {
            font-weight: 800;
            font-size: clamp(2rem, 4vw, 3rem);
            letter-spacing: .5px;
            color: #ffffff;
            text-shadow:
                0 0 6px rgba(255, 255, 255, .45),
                0 0 14px rgba(20, 209, 199, .35),
                2px 2px 10px rgba(0, 0, 0, .85);
        }

        .page-header p {
            color: rgba(255, 255, 255, .9);
            text-shadow:
                0 0 6px rgba(255, 255, 255, .45),
                0 0 6px rgba(20, 209, 199, .25),
                2px 2px 8px rgba(0, 0, 0, .75);
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
                0 0 0 1px rgba(255, 255, 255, .18),
                0 0 18px rgba(20, 209, 199, .25),
                0 18px 40px rgba(0, 0, 0, .65);
            transition: transform .35s ease, box-shadow .35s ease;
        }

        .gallery-item:hover {
            transform: translateY(-6px) scale(1.02);
            box-shadow:
                0 0 22px rgba(20, 209, 199, .45),
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
            box-shadow: inset 0 -4px 0 #14D1C7;
            opacity: .9;
            pointer-events: none;
        }

        .gallery-overlay h5 {
            color: #ffffff;
            font-weight: 600;
            text-shadow:
                0 0 6px rgba(255, 255, 255, .45),
                0 0 12px rgba(20, 209, 199, .35),
                2px 2px 10px rgba(0, 0, 0, .85);
        }

        .gallery-item:hover .gallery-overlay h5 {
            transform: translateY(0);
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
        <div class="container">
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
                        ['pondok.jpeg', 'Kegiatan Belajar Santri'],
                        ['pondok1.jpeg', 'Suasana Asrama Santri'],
                        ['pondok2.jpeg', 'Kegiatan di Masjid Pondok'],
                        ['pondok.jpeg', 'Ekstrakurikuler & Pelatihan'],
                        ['pondok1.jpeg', 'Kegiatan Sosial Santri'],
                        ['pondok2.jpeg', 'Upacara & Kegiatan Formal'],
                    ];
                @endphp

                @foreach ($galeri as $i => $g)
                    <div class="col-lg-4 col-md-6 reveal delay-{{ ($i % 3) + 1 }}">
                        <div class="gallery-item">
                            <img src="{{ asset('image/' . $g[0]) }}">
                            <div class="gallery-overlay">
                                <h5>{{ $g[1] }}</h5>
                            </div>
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
