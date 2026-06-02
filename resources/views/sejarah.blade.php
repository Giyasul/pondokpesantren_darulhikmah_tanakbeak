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
                            <h2 class="section-title">SELAYANG PANDANG PONPES. DARUL HIKMAH NW</h2>
                        </div>

                        <div class="timeline">

                            <div class="timeline-item">
                                <h5>1950-an Potret Kehidupan Beragama Masyarakat</h5>
                                <p>
                                    Pada tahun 1950-an, potret kehidupan beragama pada masyarakat Narmada dan sekitarnya
                                    diwarnai oleh beragam kepercayaan atau agama. Beberapa di antaranya berupa kepercayaan
                                    <strong>Animisme</strong>, <strong>Hindu</strong>, dan <strong>agama Islam</strong>.
                                    Bagi sebagian komunitas Muslim waktu itu, Islam diyakini, dipahami, dan diamalkan
                                    cenderung pada faham sinkretisme — perpaduan antara doktrin Islam dengan ideologi
                                    lokal — yang terformulasi dalam paham <strong>Wetu Telu</strong>. Hal ini sangat
                                    mungkin terjadi karena Narmada dan sekitarnya merupakan salah satu basis komunitas
                                    Hindu di Lombok bagian barat, sementara pembumian Islam di daerah ini saat itu
                                    belum terlaksana dengan baik dan sempurna.
                                </p>
                            </div>

                            <div class="timeline-item">
                                <h5>Perintisan Lembaga Pendidikan Islam</h5>
                                <p>
                                    Realitas empiris ini mendorong para tokoh Islam di Narmada untuk membangun dan
                                    mendirikan lembaga pendidikan berupa
                                    <strong>Madrasah Ibtidaiyah Nahdlatul Wathan Nurul Huda Narmada</strong>.
                                    Salah satu tokoh agama yang merintis berdirinya madrasah ini adalah
                                    <strong>TGH. M. Djuani Mukhtar</strong>. Madrasah ini dihajatkan untuk memberikan
                                    pembelajaran agama Islam kepada masyarakat dan generasi muda, sekaligus
                                    mengkonstruksi manusia yang unggul secara intelektual, kaya dengan amal,
                                    serta anggun dalam moral dan kebijakan.
                                </p>
                            </div>

                            <div class="timeline-item">
                                <h5>Perkembangan Madrasah</h5>
                                <p>
                                    Dinamika madrasah ini terus berkembang seiring dengan respons positif masyarakat
                                    terhadap pendidikan. Untuk memenuhi hajat masyarakat, terutama dalam bidang
                                    pendidikan Islam, madrasah ini diperluas tugas dan fungsinya menjadi beberapa
                                    lembaga pendidikan di seluruh wilayah Narmada dan sekitarnya, berupa
                                    <strong>Madrasah Aliyah</strong> dan <strong>Madrasah Tsanawiyah</strong>.
                                </p>
                            </div>

                            <div class="timeline-item">
                                <h5>1990-an Tantangan Pendidikan di Tanak Beak</h5>
                                <p>
                                    Pada tahun 1990-an, Desa Tanak Beak termasuk salah satu desa yang masuk kategori
                                    <strong>IDT (Inpres Desa Tertinggal)</strong>. Salah satu poin penilaiannya adalah
                                    masih tingginya angka putus sekolah. Setiap tahun lebih dari 30 anak yang telah
                                    menyelesaikan pendidikan Sekolah Dasar (SD) tidak bisa melanjutkan ke jenjang
                                    <strong>SLTP</strong>, baik karena permasalahan ekonomi maupun masih kurangnya
                                    kesadaran orang tua akan pentingnya pendidikan. Kondisi inilah yang mendasari
                                    pemikiran dan cita-cita beberapa pemuda Desa Tanak Beak yang didukung penuh oleh
                                    <strong>TGH. Hasanain Djuaini</strong> selaku tokoh masyarakat, serta mendapat
                                    restu dari <strong>TGH. M. Djuaini Mukhtar</strong> selaku tokoh agama, untuk
                                    membangun satuan pendidikan setingkat SLTP guna menampung anak-anak yang
                                    terancam putus sekolah.
                                </p>
                            </div>

                            <div class="timeline-item">
                                <h5>1998 Lahirnya Tsanawiyah Reformasi</h5>
                                <p>
                                    Tahun 1998 merupakan tonggak awal gerakan Reformasi di Indonesia yang dirintis
                                    oleh para mahasiswa, membawa semangat perubahan pada bidang ekonomi, sosial,
                                    politik, dan budaya. Semangat Reformasi inilah yang membuka hati dan tekad
                                    beberapa pemuda di Desa Tanak Beak untuk memperkuat desanya dalam bidang
                                    pendidikan. Dengan semangat tersebut, berdirilah madrasah setingkat MTs yang
                                    disebut <strong>"Tsanawiyah Reformasi"</strong> — kelak menjadi cikal bakal
                                    <strong>Madrasah Tsanawiyah Darul Hikmah NW</strong>. Pada tahap awal, lembaga
                                    ini menjadi kelas jauh dari Madrasah Tsanawiyah NW Putri Narmada yang bernaung
                                    di bawah <strong>Yayasan Perguruan Pondok Pesantren Nahdlatul Wathan Narmada
                                        (YPPPNW Narmada)</strong> yang dipimpin oleh TGH. M. Djuaini Mukhtar.
                                </p>
                            </div>

                            <div class="timeline-item">
                                <h5>2002 Berdiri Mandiri</h5>
                                <p>
                                    Pada tahun 2002, Madrasah Tsanawiyah Reformasi resmi terpisah dari Madrasah
                                    Tsanawiyah NW Putri Narmada yang saat itu dipimpin oleh
                                    <strong>TGH. Hasanain Djuaini, LC</strong>, dan selanjutnya berdiri sendiri
                                    dengan nama <strong>Madrasah Tsanawiyah Darul Hikmah NW Tanak Beak</strong>
                                    di bawah pimpinan pertamanya <strong>Ust. Sahnan, S.Ag</strong>.
                                    Lembaga ini bernaung di bawah
                                    <strong>Yayasan Darul Hikmah NW Tanak Beak</strong>
                                    sebagai induknya, yang dipimpin oleh
                                    <strong>Ust. Khalilurrahman, S.Ag</strong> hingga saat ini.
                                </p>
                            </div>

                            <div class="timeline-item">
                                <h5>2012 Berdirinya Pondok Pesantren</h5>
                                <p>
                                    Pada tahun 2012 dimulailah pendidikan berasrama dengan nama
                                    <strong>Pondok Pesantren Darul Hikmah NW</strong>, yang bertujuan memaksimalkan
                                    tujuan dan hasil pendidikan. Bersama seluruh lapisan masyarakat, akhirnya dapat
                                    dilaksanakan pembebasan lahan seluas <strong>73 are</strong> yang berada di sebelah
                                    barat Desa Tanak Beak. Sebagai pengisi lahan yang masih kosong, di tempat baru
                                    ini ditanami kurang lebih <strong>400 batang pohon naga (Dragon Fruit)</strong>,
                                    sehingga menginspirasi masyarakat untuk menyebut lokasi tersebut sebagai
                                    <strong>Repok Naga</strong>. Pondok pun lebih dikenal dengan sebutan
                                    <strong>Pondok Naga</strong>.
                                </p>
                            </div>

                            <div class="timeline-item">
                                <h5>21 Februari 2012 Peresmian Resmi</h5>
                                <p>
                                    Tepat pada tanggal <strong>21 Februari 2012 (21022012)</strong> dilaksanakan
                                    peletakan batu pertama pembangunan asrama dan ruang belajar. Hadir dalam
                                    kesempatan bersejarah tersebut antara lain
                                    <strong>TGKH L.M. Turmudzi Badaruddin</strong> selaku Rais Syuriah PBNU,
                                    <strong>H. Zaini Arony</strong> selaku Bupati Lombok Barat,
                                    <strong>H. Abdul Manan</strong> selaku Camat Narmada,
                                    <strong>H. Muslim</strong> Kepala Kantor Kemenag,
                                    <strong>H.M. Udin</strong> dari FKSPP Lombok Barat,
                                    <strong>Amrul Jihadi, S.Ag.</strong> selaku Kepala Desa, seluruh Kepala Dusun,
                                    tokoh masyarakat, dan jamaah Tanak Beak. Tanggal tersebut selanjutnya
                                    ditetapkan menjadi tanggal berdirinya
                                    <strong>Pondok Pesantren Darul Hikmah NW</strong> secara resmi.
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
