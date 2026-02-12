@extends('layout.layout')

@section('judul', 'Visi & Misi Pondok Pesantren Darul Hikmah NW')

@section('konten')

    <style>
        /* HEADER - Konsisten dengan Sejarah */
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

        /* CARD KONTEN - Mengikuti style Sejarah */
        .visi-card {
            background: #ffffff;
            border-radius: 25px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
            margin-top: 25px;
            position: relative;
            z-index: 10;
            border: 1px solid #eee;
            color: #333;
        }

        /* Judul Section - Hijau NW & Garis Emas */
        .section-title {
            color: #004d00;
            font-weight: 800;
            position: relative;
            display: inline-block;
            margin-bottom: 15px;
            text-transform: uppercase;
        }

        .section-title::after {
            content: '';
            display: block;
            width: 60%;
            height: 4px;
            background: #D4AF37;
            margin: 8px auto 0;
            border-radius: 10px;
        }

        /* LAYOUT 2 KOLOM */
        .row-top {
            display: flex;
            gap: 40px;
            margin-bottom: 50px;
            border-bottom: 1px dashed #ddd;
            padding-bottom: 40px;
        }

        .col-visi {
            flex: 1;
            text-align: center;
        }

        .col-misi {
            flex: 1.5;
            text-align: center;
            /* Membuat judul Misi ke tengah */
        }

        .misi-list {
            padding-left: 20px;
            text-align: justify;
            /* Teks list tetap rata kiri-kanan */
            line-height: 1.8;
            margin-top: 20px;
            display: inline-block;
            /* Membantu list tetap proporsional saat parent center */
        }

        .misi-list li {
            margin-bottom: 12px;
        }

        /* PENJELASAN VISI */
        .penjelasan-box {
            text-align: justify;
        }

        .point-title {
            color: #004d00;
            font-weight: 800;
            font-size: 1.2rem;
            margin-top: 30px;
            display: block;
        }

        .penjelasan-box p {
            line-height: 1.9;
            margin-top: 5px;
        }

        /* ANIMASI */
        .reveal {
            opacity: 0;
            transform: translateY(40px);
            transition: all .8s ease;
        }

        .reveal.show {
            opacity: 1;
            transform: translateY(0);
        }

        @media (max-width: 992px) {
            .row-top {
                flex-direction: column;
                text-align: center;
            }
        }
    </style>

    <section class="page-header">
        <div class="container reveal">
            <h1>Visi & Misi</h1>
            <p>Pondok Pesantren Darul Hikmah NW Tanak Beak</p>
        </div>
    </section>

    <section class="py-4" style="background-color: #f4f7f4;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-11 col-xl-10 reveal">

                    <div class="visi-card p-4 p-md-5">

                        <div class="row-top">
                            <div class="col-visi">
                                <h2 class="section-title">Visi</h2>
                                <p class="mt-4 fs-5 fw-bold" style="color: #004d00;">
                                    Bekerja, Belajar, Jujur, Ikhlas
                                </p>
                            </div>

                            <div class="col-misi">
                                <h2 class="section-title">Misi</h2>
                                <div class="text-start">
                                    <ol class="misi-list">
                                        <li>Menciptakan santri dan santriwati yang memiliki karakter moral dan kompetensi
                                            kinerja yang seimbang.</li>
                                        <li>Menciptakan santri dan santriwati yang mampu berpikir kritis, kreatif,
                                            komunikatif, dan kolaboratif.</li>
                                        <li>Menciptakan santri dan santriwati yang terbuka wawasannya dalam literasi baca,
                                            budaya, teknologi, dan ekonomi.</li>
                                        <li>Menjadikan Darul Hikmah sebagai lembaga pendidikan dan pengajaran yang
                                            <strong>PRIMA</strong> (Panutan, Rapi, Indah, Mencerdaskan, dan Amanah).
                                        </li>
                                    </ol>
                                </div>
                            </div>
                        </div>

                        <div class="penjelasan-box">
                            <div class="text-center mb-4">
                                <h2 class="section-title">Penjelasan Visi</h2>
                            </div>

                            <span class="point-title">A. BEKERJA</span>
                            <p>
                                Konsep kerja mengandung empat hal, yaitu kerja keras, kerja cerdas, kerja ikhlas, dan kerja
                                tuntas. Nilai kerja ini dapat terwujud apabila didukung oleh empat kecerdasan: kecerdasan
                                fisik, kecerdasan intelektual, kecerdasan emosional, dan kecerdasan spiritual. Kecerdasan
                                fisik berfungsi menjaga kesehatan jasmani agar aktivitas berjalan optimal. Kecerdasan
                                intelektual berkaitan dengan kemampuan berpikir dan memahami ilmu pengetahuan. Kecerdasan
                                emosional berperan dalam hubungan sosial dan muamalah, sedangkan kecerdasan spiritual
                                berkaitan erat dengan keyakinan dan pengamalan ajaran Islam yang berlandaskan keimanan
                                kepada Allah SWT.
                            </p>

                            <span class="point-title">B. BELAJAR</span>
                            <p>
                                Belajar adalah usaha memperoleh ilmu dan kepandaian serta proses berkelanjutan sepanjang
                                hayat. Belajar dimaknai sebagai upaya menggali ilmu-ilmu Allah, baik yang tersurat maupun
                                tersirat, baik kauniyah maupun qauliyah, sebagai bekal kehidupan dunia dan akhirat.
                            </p>

                            <span class="point-title">C. JUJUR</span>
                            <p>
                                Jujur adalah kesesuaian antara perkataan dan perbuatan. Seseorang dikatakan jujur apabila
                                berkata dan bertindak sesuai dengan kebenaran. Kejujuran harus mewarnai seluruh aspek
                                kehidupan, baik dalam pikiran, ucapan, maupun perbuatan.
                            </p>

                            <span class="point-title">D. IKHLAS</span>
                            <p>
                                Ikhlas merupakan sikap tulus dalam beramal yang semata-mata ditujukan untuk memperoleh ridha
                                Allah SWT. Amal ibadah tidak akan diterima tanpa keikhlasan. Ikhlas berhubungan erat dengan
                                niat dan mencerminkan kebersihan hati, ketulusan, serta kejujuran dalam keyakinan dan
                                perbuatan yang hanya ditujukan kepada Allah SWT.
                            </p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
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
    </script>

@endsection
