@extends('layout.layout')

@section('judul', 'Sejarah Pondok Pesantren Darul Hikmah NW')

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
            border-bottom: 5px solid #D4AF37;
        }

        .page-header h1 {
            font-weight: 800;
            font-size: clamp(2.2rem, 5vw, 3.5rem);
            /* Warna diubah jadi putih dengan glow emas tipis */
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

        /* CARD KONTEN */
        .history-card {
            background: #ffffff;
            border-radius: 25px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
            margin-top: 25px;
            position: relative;
            z-index: 10;
            border: 1px solid #eee;
        }

        /* Judul Section di dalam Card */
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

        /* TIMELINE - Hijau NW & Emas */
        .timeline {
            position: relative;
            padding-left: 35px;
        }

        .timeline::before {
            content: '';
            position: absolute;
            left: 10px;
            top: 0;
            bottom: 0;
            width: 4px;
            background: linear-gradient(to bottom, #004d00, #D4AF37);
            border-radius: 10px;
        }

        .timeline-item {
            position: relative;
            margin-bottom: 45px;
        }

        .timeline-item::before {
            content: '';
            position: absolute;
            left: -33px;
            top: 5px;
            width: 20px;
            height: 20px;
            background: #D4AF37;
            border: 4px solid #ffffff;
            border-radius: 50%;
            box-shadow: 0 0 0 2px #004d00;
            z-index: 2;
        }

        .timeline-item h5 {
            color: #004d00;
            font-weight: 800;
            font-size: 1.25rem;
            margin-bottom: 12px;
        }

        .timeline-item p {
            color: #333333;
            line-height: 1.9;
            text-align: justify;
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

        @media (max-width: 768px) {
            .page-header {
                padding: 100px 0;
            }

            .history-card {
                margin-top: 20px;
            }
        }
    </style>

    <section class="page-header">
        <div class="container reveal">
            <h1>Sejarah Perjalanan</h1>
            <p>Pondok Pesantren Darul Hikmah NW Tanak Beak</p>
        </div>
    </section>

    <section class="py-4" style="background-color: #f4f7f4;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-11 col-xl-10 reveal">

                    <div class="history-card p-4 p-md-5">
                        <div class="text-center mb-5">
                            <h2 class="section-title">SELAYANG PANDANG PONPES DARUL HIKMAH NW</h2>
                        </div>

                        <div class="timeline">

                            <div class="timeline-item">
                                <h5>1950-an Kondisi Keagamaan Masyarakat</h5>
                                <p>
                                    Pada tahun 1950-an, kehidupan beragama masyarakat Narmada dan sekitarnya
                                    diwarnai oleh beragam kepercayaan seperti Animisme, Hindu, dan Islam.
                                    Sebagian umat Islam pada masa itu memahami dan mengamalkan ajaran Islam
                                    secara sinkretis dalam paham <strong>Wetu Telu</strong>.
                                    Kondisi ini terjadi karena wilayah Narmada merupakan salah satu basis
                                    komunitas Hindu di Lombok bagian barat, sementara pembumian Islam
                                    belum berjalan secara optimal.
                                </p>
                            </div>

                            <div class="timeline-item">
                                <h5>Perintisan Lembaga Pendidikan Islam</h5>
                                <p>
                                    Realitas tersebut mendorong para tokoh Islam di Narmada untuk membangun
                                    lembaga pendidikan Islam berupa
                                    <strong>Madrasah Ibtidaiyah Nahdlatul Wathan Nurul Huda Narmada</strong>.
                                    Salah satu tokoh perintis pendirian madrasah ini adalah
                                    <strong>TGH. M. Djuani Mukhtar</strong>.
                                    Madrasah ini bertujuan memberikan pendidikan agama Islam
                                    serta membentuk generasi yang unggul secara intelektual,
                                    kaya amal, dan anggun dalam akhlak.
                                </p>
                            </div>

                            <div class="timeline-item">
                                <h5>Perkembangan Madrasah</h5>
                                <p>
                                    Seiring meningkatnya kepercayaan masyarakat terhadap pendidikan Islam,
                                    madrasah ini terus berkembang dan memperluas perannya dengan mendirikan
                                    beberapa lembaga pendidikan lanjutan berupa
                                    <strong>Madrasah Tsanawiyah</strong> dan
                                    <strong>Madrasah Aliyah</strong>
                                    di wilayah Narmada dan sekitarnya.
                                </p>
                            </div>

                            <div class="timeline-item">
                                <h5>1990-an Tantangan Pendidikan di Tanak Beak</h5>
                                <p>
                                    Pada tahun 1990-an, Desa Tanak Beak termasuk kategori
                                    <strong>IDT (Inpres Desa Tertinggal)</strong>.
                                    Tingginya angka putus sekolah menjadi permasalahan utama,
                                    di mana setiap tahun lebih dari 30 anak lulusan SD
                                    tidak dapat melanjutkan pendidikan ke jenjang SLTP
                                    akibat faktor ekonomi dan rendahnya kesadaran
                                    akan pentingnya pendidikan.
                                </p>
                            </div>

                            <div class="timeline-item">
                                <h5>1998 Lahirnya Tsanawiyah Reformasi</h5>
                                <p>
                                    Semangat Reformasi 1998 yang melanda Indonesia turut
                                    menggerakkan para pemuda Desa Tanak Beak,
                                    dengan dukungan penuh dari
                                    <strong>TGH. Hasanain Djuaini</strong>
                                    serta restu <strong>TGH. M. Djuani Mukhtar</strong>,
                                    untuk mendirikan lembaga pendidikan setingkat MTs
                                    bernama <strong>Tsanawiyah Reformasi</strong>.
                                    Lembaga ini menjadi cikal bakal
                                    <strong>Madrasah Tsanawiyah Darul Hikmah NW</strong>.
                                </p>
                            </div>

                            <div class="timeline-item">
                                <h5>2002 Berdiri Mandiri</h5>
                                <p>
                                    Pada tahun 2002, Madrasah Tsanawiyah Reformasi resmi
                                    berpisah dari MTs NW Putri Narmada dan berdiri sendiri
                                    dengan nama
                                    <strong>Madrasah Tsanawiyah Darul Hikmah NW Tanak Beak</strong>.
                                    Madrasah ini dipimpin oleh
                                    <strong>Ust. Sahnan, S.Ag</strong>
                                    dan bernaung di bawah
                                    <strong>Yayasan Darul Hikmah NW Tanak Beak</strong>
                                    yang diketuai oleh
                                    <strong>Ust. Khalilurrahman, S.Ag</strong>.
                                </p>
                            </div>

                            <div class="timeline-item">
                                <h5>2012 Berdirinya Pondok Pesantren</h5>
                                <p>
                                    Tahun 2012 menjadi awal dimulainya pendidikan berasrama
                                    dengan nama <strong>Pondok Pesantren Darul Hikmah NW</strong>.
                                    Bersama masyarakat, dilakukan pembebasan lahan seluas
                                    <strong>73 are</strong> di sebelah barat Desa Tanak Beak.
                                    Lahan tersebut ditanami sekitar 400 batang buah naga,
                                    sehingga dikenal dengan sebutan <strong>Repok Naga</strong>
                                    atau <strong>Pondok Naga</strong>.
                                </p>
                            </div>

                            <div class="timeline-item">
                                <h5>21 Februari 2012 Peresmian</h5>
                                <p>
                                    Pada tanggal <strong>21 Februari 2012</strong> dilaksanakan
                                    peletakan batu pertama pembangunan asrama dan ruang belajar,
                                    yang dihadiri oleh tokoh nasional dan daerah,
                                    di antaranya TGKH L.M. Turmudzi Badaruddin,
                                    Bupati Lombok Barat H. Zaini Arony,
                                    serta para tokoh masyarakat Tanak Beak.
                                    Tanggal ini ditetapkan sebagai hari resmi berdirinya
                                    <strong>Pondok Pesantren Darul Hikmah NW</strong>.
                                </p>
                            </div>

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
