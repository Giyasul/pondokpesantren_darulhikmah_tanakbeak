@extends('layout.layout')
@section('judul', 'Selamat Datang di Pondok Pesantren Darul Hikmah')
@section('konten')

    <style>
        html,
        body {
            overflow-x: hidden;
        }

        #carouselExampleCaptions {
            border-bottom: 3px solid #D4AF37;
        }

        .carousel-item img {
            height: 570px;
            object-fit: cover;
            object-position: center;
            background-color: #ffffff;
        }

        .carousel-item::after {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background:
                linear-gradient(to bottom, rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.75));
            z-index: 1;
        }

        .carousel-caption {
            z-index: 2;
            bottom: 15%;
            padding: 60px;

        }

        .carousel-caption h5 {
            font-weight: 700;
            font-size: 3rem;
            text-shadow:
                0 0 6px rgba(255, 255, 255, 0.45),
                0 0 14px rgba(212, 175, 55, 0.35),
                2px 2px 10px rgba(0, 0, 0, 0.85);
        }

        .carousel-caption p {
            font-weight: 500;
            font-size: 1.1rem;
            text-shadow:
                0 0 6px rgba(255, 255, 255, 0.45),
                0 0 14px rgba(212, 175, 55, 0.35),
                2px 2px 10px rgba(0, 0, 0, 0.85);
        }

        .carousel-control-prev,
        .carousel-control-next {
            width: 100px;
        }

        .carousel-control-prev-icon,
        .carousel-control-next-icon {
            width: 52px;
            height: 52px;
            border-radius: 50%;
            background-size: 18px;
            border: 1.5px solid rgba(212, 175, 55, 0.6);
            backdrop-filter: blur(6px);
            box-shadow:
                0 0 0 1px rgba(212, 175, 55, 0.25),
                0 0 14px rgba(212, 175, 55, 0.35),
                0 12px 30px rgba(0, 0, 0, 0.75);
            transition:
                background-color .35s ease,
                box-shadow .45s cubic-bezier(.22, 1, .36, 1),
                transform .35s ease;
        }

        .carousel-control-prev-icon:hover,
        .carousel-control-next-icon:hover {
            background-color: #D4AF37;
            box-shadow:
                0 0 0 1px rgba(212, 175, 55, 0.8),
                0 0 22px rgba(212, 175, 55, 0.7),
                0 18px 40px rgba(0, 0, 0, 0.85);
            transform: scale(1.1);
        }

        @media (max-width: 768px) {
            .carousel-item img {
                height: 400px;
            }

            .carousel-caption h5 {
                font-size: 1.4rem;
                line-height: 1.25;
                margin-bottom: 6px;
            }

            .carousel-caption p {
                display: none;
            }
        }


        .about-section {
            margin-top: 20px;
            padding-top: 10px;
        }

        .about-image {
            position: relative;
            border-radius: 22px;
            overflow: hidden;
            box-shadow:
                0 0 0 1px rgba(255, 255, 255, .25),
                0 0 18px rgba(255, 255, 255, .25),
                0 20px 45px rgba(0, 0, 0, .75);
        }

        .about-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .about-title {
            font-size: 2.4rem;
            font-weight: 800;
        }

        .about-title span {
            color: #004d00;
        }

        .about-text {
            color: rgba(0, 0, 0, 0.75);
            line-height: 1.7;
        }

        .about-list i {
            color: #004d00;
            margin-right: 8px;
        }

        .reveal {
            opacity: 0;
            transform: translateY(50px);
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

        .delay-3 {
            transition-delay: .45s
        }

        .about-btn {
            border-radius: 12px;
            font-weight: 600;
            letter-spacing: .3px;
            color: #0D6B0D;
            border: 1.8px solid #0D6B0D;
            background: transparent;
            transition:
                background-color .35s ease,
                color .35s ease,
                box-shadow .45s cubic-bezier(.22, 1, .36, 1),
                transform .45s cubic-bezier(.22, 1, .36, 1);
        }

        .about-btn i {
            transition: transform .45s cubic-bezier(.22, 1, .36, 1);
        }

        .about-btn:hover {
            background: #0D6B0D;
            color: #ffffff;
            transform: translateY(-2px) scale(1.04);
            box-shadow: 0 14px 36px rgba(13, 107, 13, .35);
        }

        .about-btn:hover i {
            transform: translateX(6px);
        }

        .sambutan-section {
            margin-top: 80px;
            margin-bottom: 80px;
        }

        .sambutan-card {
            background: #FFFFFF;
            border-radius: 15px;
            padding: 28px 30px;
            color: #000000;
            box-shadow:
                0 0 0 1px rgba(255, 255, 255, .2),
                0 18px 40px rgba(0, 0, 0, .65);
            border-left: 4px solid #D4AF37;
        }

        .sambutan-card h4 {
            color: #004d00;
        }

        .sambutan-image {
            height: 400px;
            position: relative;
            border-radius: 22px;
            overflow: hidden;
            box-shadow:
                0 0 0 1px rgba(255, 255, 255, .25),
                0 0 18px rgba(255, 255, 255, .25),
                0 20px 45px rgba(0, 0, 0, .75);
        }

        .sambutan-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: top;
        }

        .article-section {
            background-color: #0D6B0D;
            padding: 70px 0 80px;
            border-top: 3px solid #D4AF37;
            border-bottom: 3px solid #D4AF37;
        }

        .article-title {
            font-size: 2.3rem;
            font-weight: 800;
            color: #ffffff;
        }

        .article-card {
            background: #ffffff;
            border-radius: 18px;
            overflow: hidden;
            color: #222;
            border: 2px solid rgba(212, 175, 55, .65);
            box-shadow:
                0 10px 22px rgba(212, 175, 55, .35),
                0 20px 45px rgba(0, 0, 0, .2);
            transition:
                transform .45s cubic-bezier(.22, 1, .36, 1),
                box-shadow .45s cubic-bezier(.22, 1, .36, 1),
                border-color .45s ease;
        }

        .article-card:hover {
            transform: translateY(-8px);
            border-color: #D4AF37;
            box-shadow:
                0 14px 32px rgba(212, 175, 55, .6),
                0 28px 60px rgba(0, 0, 0, .25);
        }

        .article-card img {
            height: 220px;
            width: 100%;
            object-fit: cover;
        }

        .article-card h6 {
            font-weight: 800;
            color: #004d00;
            font-size: 1.05rem;
        }

        .article-card p {
            color: rgba(0, 0, 0, .7);
            font-size: .95rem;
            line-height: 1.6;
        }

        section {
            margin-top: 80px;
            margin-bottom: 80px;
        }

        .map-stat-section {
            background-color: #0D6B0D;
            margin-bottom: 0px;
            padding-top: 80px;
            padding-bottom: 130px;
            border-top: 3px solid #D4AF37;
        }

        .section-title {
            color: #fff;
            font-weight: 700;
        }

        .map-wrapper {
            height: 100%;
            min-height: 360px;
            border-radius: 16px;
            overflow: hidden;
            background: #222;
        }

        .map-wrapper iframe {
            width: 100%;
            height: 100%;
            border: 0;
        }

        .stat-card {
            display: flex;
            align-items: center;
            gap: 16px;
            background: #FFFFFF;
            border-radius: 14px;
            padding: 20px;
            border: 2px solid #D4AF37;
            box-shadow:
                0 0 0 1px rgba(212, 175, 55, .45),
                0 0 18px rgba(212, 175, 55, .35),
                0 18px 36px rgba(0, 0, 0, .75);
            transition: transform .3s ease;
        }

        .stat-card:hover {
            transform: translateY(-6px) scale(1.02);
            box-shadow:
                0 0 0 1px rgba(212, 175, 55, .45),
                0 0 18px rgba(212, 175, 55, .35),
                0 22px 46px rgba(0, 0, 0, .75);
        }

        .stat-icon {
            width: 52px;
            height: 52px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #0D6B0D;
            color: #ffffff;
            font-size: 22px;
        }

        .stat-card h3 {
            color: #0D6B0D;
        }

        .stat-card h6 {
            color: #2f3a2f;
            font-weight: 600;
        }

        .stat-card small {
            color: #6b6b6b;
        }

        .reveal-map {
            opacity: 0;
            transform: translateX(-60px) scale(.98);
            transition: all .9s ease;
        }

        .reveal-stat {
            opacity: 0;
            transform: translateX(60px) scale(.98);
            transition: all .9s ease;
        }

        .reveal-map.show,
        .reveal-stat.show {
            opacity: 1;
            transform: translateX(0) scale(1);
        }

        @media (max-width: 768px) {

            .reveal-map,
            .reveal-stat {
                transform: translateY(40px);
            }

            .reveal-map.show,
            .reveal-stat.show {
                transform: translateY(0);
            }

            .map-wrapper {
                height: 300px;
                min-height: 300px;
            }
        }
    </style>


    <div id="carouselExampleCaptions" class="carousel slide " data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="4000">
                <img src="{{ asset('image/pondok.jpeg') }}" class="d-block w-100" alt="Slide 1">
                <div class="carousel-caption ">
                    <h5>Selamat Datang di Darul Hikmah NWDI</h5>
                    <p>Membentuk generasi unggul yang berakhlakul karimah dan cerdas mandiri</p>
                </div>
            </div>
            <div class="carousel-item" data-bs-interval="4000">
                <img src="{{ asset('image/pondok1.jpeg') }}" class="d-block w-100" alt="Slide 2">
                <div class="carousel-caption ">
                    <h5>Pendidikan Berkualitas</h5>
                    <p>Integrasi kurikulum pesantren dan nasional</p>
                </div>
            </div>
            <div class="carousel-item" data-bs-interval="4000">
                <img src="{{ asset('image/pondok2.jpeg') }}" class="d-block w-100" alt="Slide 2">
                <div class="carousel-caption ">
                    <h5>Mencetak Generasi Berdaya Saing</h5>
                    <p>Perpaduan nilai keislaman dan kompetensi untuk masa depan gemilang</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>

    <section class="sambutan-section">
        <div class="container">
            <div class="row align-items-center g-5 reveal">
                <div class="col-lg-4">
                    <div class="sambutan-image">
                        <img src="{{ asset('image/pondok1.jpeg') }}" alt="Pimpinan Ponpes Darul Hikmah">
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="sambutan-card">
                        <h4 class="fw-bold mb-1">Sambutan Pimpinan</h4>
                        <small class="text-muted d-block mb-3">
                            Kepala Yayasan Pondok Pesantren Darul Hikmah
                        </small>
                        <p class="about-text fw-semibold">
                            بسم الله الرحمن الرحيم
                        </p>
                        <p class="about-text">
                            Assalamu’alaikum warahmatullahi wabarakatuh.
                        </p>
                        <p class="about-text">
                            Puji syukur ke hadirat Allah Subhanahu wa Ta’ala atas limpahan rahmat,
                            taufiq, dan inayah-Nya kepada kita semua. Shalawat serta salam semoga
                            senantiasa tercurah kepada junjungan kita Nabi Muhammad
                            Shallallahu ‘Alaihi Wasallam.
                        </p>
                        <p class="about-text">
                            Dalam rangka turut serta mencerdaskan kehidupan bangsa serta
                            mewujudkan tujuan pendidikan nasional, Yayasan Pondok Pesantren
                            Darul Hikmah NWDI Tanak Beak Narmada menyelenggarakan pendidikan Islam
                            terpadu, baik formal maupun nonformal.
                        </p>
                        <p class="about-text">
                            Alhamdulillah, kehadiran website Pondok Pesantren Darul
                            Hikmah ini menjadi sarana informasi dan komunikasi antara pondok
                            pesantren dengan orang tua santri, pendidik, alumni, serta seluruh
                            pihak yang peduli terhadap kemajuan pondok.
                        </p>
                        <p class="about-text">
                            Kami berharap pemanfaatan teknologi informasi ini dapat mendukung
                            peningkatan layanan pendidikan yang efektif, efisien, dan berkelanjutan.
                        </p>
                        <p class="fw-semibold mt-3 mb-0">
                            — Pimpinan Pondok Pesantren Darul Hikmah NWDI Tanak Beak
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="article-section mt-5">
        <div class="container">
            <div class="text-center mb-5 reveal">
                <h2 class="article-title">
                    Artikel & Berita Pesantren
                </h2>
                <p class=" mt-2" style="color: #ffffff">
                    Informasi dan kegiatan terbaru Pondok Pesantren Darul Hikmah
                </p>
            </div>
            <div class="row g-5 justify-content-center">
                @foreach ($berita as $index => $b)
                    <div class="col-lg-4 col-md-6 reveal delay-{{ $index + 1 }}">
                        <div class="article-card">
                            @if ($b->gambar)
                                <img src="{{ asset('storage/' . $b->gambar) }}" alt="{{ $b->judul }}">
                            @else
                                <img src="{{ asset('image/pondok.jpeg') }}" alt="Default">
                            @endif
                            <div class="p-4">
                                <h6>{{ $b->judul }}</h6>
                                <p class="mt-2">
                                    {{ \Illuminate\Support\Str::limit($b->isi, 120) }}
                                </p>
                                <a href="{{ route('berita', $b->id) }}" class="btn mt-2 about-btn">
                                    Baca Selengkapnya
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <div class="container mt-5 mb-0">
        <h1 class="text-center fw-bold" style="color: #004d00">TENTANG KAMI</h1>
    </div>
    <section class="about-section">
        <div class="container">
            <div class="row align-items-start g-5">
                <div class="col-lg-6 reveal">
                    <div class="about-image">
                        <img src="{{ asset('image/pondok.jpeg') }}" alt="Pondok Pesantren">
                    </div>
                </div>
                <div class="col-lg-6">
                    <h2 class="about-title reveal delay-2">
                        Pondok Pesantren <br>
                        <span>Darul Hikmah Tanak Beak</span>
                    </h2>
                    <p class="about-text mt-3 reveal delay-3">
                        Pondok Pesantren Darul Hikmah Tanak Beak adalah lembaga pendidikan Islam
                        yang berkomitmen membina generasi Qur'ani, berakhlakul karimah,
                        berilmu, dan mandiri melalui sistem pendidikan terpadu pesantren
                        dan pendidikan formal.
                    </p>
                    <ul class="list-unstyled about-list mt-4 reveal delay-3">
                        <li class="mb-2"><i class="bi bi-check-circle"></i> Pendidikan berbasis nilai Islam</li>
                        <li class="mb-2"><i class="bi bi-check-circle"></i> Pembinaan akhlak & karakter santri</li>
                        <li class="mb-2"><i class="bi bi-check-circle"></i> Lingkungan aman & kondusif</li>
                    </ul>
                    <a href="#" class="btn mt-2 px-4 py-2 reveal delay-3 about-btn">
                        Selengkapnya
                        <i class="bi bi-arrow-right ms-2"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="map-stat-section">
        <div class="container">
            <div class="row g-4 align-items-stretch">
                <div class="col-lg-7 reveal reveal-map">
                    <h5 class="section-title mb-3">Peta Lokasi</h5>
                    <hr style="color: #ffffff; border-top: 3px solid">
                    <div class="map-wrapper">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3944.8471989072054!2d116.1890462744468!3d-8.610665187471678!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dcdb8f8c5efbd9b%3A0xdc79eab95cb0b5a9!2sPonpes%20Darul%20Hikmah%20NW%20Tanak%20Beak%20Narmada!5e0!3m2!1sid!2sid!4v1769839147274"
                            allowfullscreen loading="lazy">
                        </iframe>
                    </div>
                </div>


              <div class="col-lg-5 reveal reveal-stat">
    <h5 class="section-title mb-3">Statistik Ringkas</h5>
    <hr style="color: #ffffff; border-top: 3px solid">
    
    <div class="stat-card mb-4 reveal delay-1">
        <div class="stat-icon">
            <i class="bi bi-people-fill"></i>
        </div>
        <div>
            <h6 class="mb-1">Jumlah Santri Aktif</h6>
            <h3 class="fw-bold mb-0">{{ number_format($jumlahAktif, 0, ',', '.') }}</h3>
            <small>Tahun Ajaran 2025 / 2026</small>
        </div>
    </div>

    <div class="stat-card mb-4 reveal delay-2">
        <div class="stat-icon">
            <i class="bi bi-mortarboard-fill"></i>
        </div>
        <div>
            <h6 class="mb-1">Jumlah Alumni</h6>
            <h3 class="fw-bold mb-0">{{ number_format($jumlahAlumni, 0, ',', '.') }}</h3>
            <small>Hingga Tahun Ini</small>
        </div>
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
            threshold: 0.2
        });
        revealEls.forEach(el => revealObserver.observe(el));
    </script>

@endsection
