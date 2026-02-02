@extends('layout.layout')

@section('judul', 'Sejarah Pondok Pesantren Darul Hikmah NW')

@section('konten')

    <style>
        .page-header {
            background:
                linear-gradient(to bottom, rgba(0, 0, 0, .45), rgba(0, 0, 0, .85)),
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

        .history-card {
            background: rgba(34, 46, 53, .92);
            border-radius: 22px;
            box-shadow:
                0 0 0 1px rgba(255, 255, 255, .18),
                0 0 18px rgba(20, 209, 199, .25),
                0 20px 45px rgba(0, 0, 0, .65);
        }

        .timeline {
            position: relative;
            padding-left: 34px;
        }

        .timeline::before {
            content: '';
            position: absolute;
            left: 12px;
            top: 0;
            bottom: 0;
            width: 3px;
            background: linear-gradient(to bottom,
                    #14D1C7,
                    rgba(20, 209, 199, .1));
            border-radius: 99px;
        }

        .timeline-item {
            position: relative;
            margin-bottom: 42px;
        }

        .timeline-item h5 {
            color: #14D1C7;
            font-weight: 700;
            margin-bottom: 8px;
        }

        .timeline-item p {
            color: #E0F7F5;
            line-height: 1.9;
            margin-bottom: 0;
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
            .reveal {
                opacity: 1 !important;
                transform: none !important;
            }
        }
    </style>

    <!-- HEADER -->
    <section class="page-header">
        <div class="container reveal">
            <h1>Sejarah Pondok Pesantren</h1>
            <p>
                Perjalanan panjang lahir dan berkembangnya Pondok Pesantren
                Darul Hikmah NW sebagai pusat pendidikan Islam
            </p>
        </div>
    </section>

    <!-- KONTEN -->
    <section class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-11 col-xl-10 reveal">

                    <div class="history-card history-wide p-4 p-md-5">
                        <div class="text-center mb-4">
                            <h3 class="fw-bold" style="color:#ffffff">
                                SELAYANG PANDANG PONPES DARUL HIKMAH NWDI
                            </h3>
                            <div
                                style="
                                    width: 80px;
                                    height: 4px;
                                    background: #ffffff;
                                    margin: 10px auto 0;
                                    border-radius: 99px;
                                    box-shadow: 0 0 12px rgba(20,209,199,.7);
                                    ">
                            </div>
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
        const reveals = document.querySelectorAll('.reveal');
        const observer = new IntersectionObserver(entries => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('show');
                }
            });
        }, {
            threshold: 0.2
        });

        reveals.forEach(el => observer.observe(el));
    </script>

@endsection
