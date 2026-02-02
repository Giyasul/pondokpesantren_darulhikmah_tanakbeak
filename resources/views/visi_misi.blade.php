@extends('layout.layout')

@section('judul', 'Visi & Misi Pondok Pesantren Darul Hikmah NW')

@section('konten')

    <style>
        .page-header {
            background:
                linear-gradient(to bottom, rgba(0, 0, 0, .55), rgba(0, 0, 0, .9)),
                url('{{ asset('image/pondok.jpeg') }}') center/cover no-repeat;
            padding: 120px 0;
            text-align: center;
            color: #fff;
        }

        .page-header h1 {
            font-weight: 800;
            font-size: clamp(2.2rem, 4vw, 3.2rem);
            text-shadow: 0 0 14px rgba(20, 209, 199, .6);
        }

        .visi-card {
            background: rgba(34, 46, 53, .96);
            border-radius: 26px;
            box-shadow:
                0 0 0 1px rgba(255, 255, 255, .15),
                0 0 25px rgba(20, 209, 199, .25),
                0 25px 60px rgba(0, 0, 0, .75);
            color: #E0F7F5;
        }

        .visi-title {
            color: #ffffff;
            font-weight: 800;
            letter-spacing: .6px;
        }

        .divider {
            width: 90px;
            height: 4px;
            background: #14D1C7;
            border-radius: 99px;
            margin: 12px auto 30px;
            box-shadow: 0 0 16px rgba(20, 209, 199, .8);
        }

        .misi-list li {
            margin-bottom: 14px;
            line-height: 1.9;
        }

        .visi-point h5 {
            color: #14D1C7;
            font-weight: 700;
            margin-top: 28px;
        }

        .reveal {
            opacity: 0;
            transform: translateY(45px);
            transition: all .9s ease;
        }

        .reveal.show {
            opacity: 1;
            transform: translateY(0);
        }
    </style>

    <!-- HEADER -->
    <section class="page-header">
        <div class="container reveal">
            <h1>Visi & Misi</h1>
            <p class="mt-2">
                Pondok Pesantren Darul Hikmah NW
            </p>
        </div>
    </section>

    <!-- CONTENT -->
    <section class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10 col-xl-9 reveal">

                    <div class="visi-card p-4 p-md-5">

                        <!-- VISI -->
                        <div class="text-center">
                            <h3 class="visi-title">VISI</h3>
                            <div class="divider"></div>
                            <p class="fs-5 fw-semibold">
                                Bekerja, Belajar, Jujur, Ikhlas
                            </p>
                        </div>

                        <!-- MISI -->
                        <div class="mt-5">
                            <h3 class="visi-title text-center">MISI</h3>
                            <div class="divider"></div>

                            <ol class="misi-list">
                                <li>
                                    Menciptakan santri dan santriwati yang memiliki karakter moral
                                    dan kompetensi kinerja yang seimbang.
                                </li>
                                <li>
                                    Menciptakan santri dan santriwati yang mampu berpikir kritis,
                                    kreatif, komunikatif, dan kolaboratif.
                                </li>
                                <li>
                                    Menciptakan santri dan santriwati yang terbuka wawasannya
                                    dalam literasi baca, budaya, teknologi, dan ekonomi.
                                </li>
                                <li>
                                    Menjadikan Darul Hikmah sebagai lembaga pendidikan dan
                                    pengajaran yang <strong>PRIMA</strong>
                                    (Panutan, Rapi, Indah, Mencerdaskan, dan Amanah).
                                </li>
                            </ol>
                        </div>

                        <!-- PENJELASAN VISI -->
                        <div class="visi-point mt-5">
                            <h3 class="visi-title text-center">PENJELASAN VISI</h3>
                            <div class="divider"></div>

                            <h5>A. BEKERJA</h5>
                            <p>
                                Konsep kerja mengandung empat hal, yaitu kerja keras, kerja cerdas,
                                kerja ikhlas, dan kerja tuntas. Nilai kerja ini dapat terwujud apabila
                                didukung oleh empat kecerdasan: kecerdasan fisik, kecerdasan intelektual,
                                kecerdasan emosional, dan kecerdasan spiritual.
                                Kecerdasan fisik berfungsi menjaga kesehatan jasmani agar aktivitas
                                berjalan optimal. Kecerdasan intelektual berkaitan dengan kemampuan
                                berpikir dan memahami ilmu pengetahuan. Kecerdasan emosional berperan
                                dalam hubungan sosial dan muamalah, sedangkan kecerdasan spiritual
                                berkaitan erat dengan keyakinan dan pengamalan ajaran Islam
                                yang berlandaskan keimanan kepada Allah SWT.
                            </p>

                            <h5>B. BELAJAR</h5>
                            <p>
                                Belajar adalah usaha memperoleh ilmu dan kepandaian serta proses
                                berkelanjutan sepanjang hayat. Belajar dimaknai sebagai upaya menggali
                                ilmu-ilmu Allah, baik yang tersurat maupun tersirat, baik kauniyah
                                maupun qauliyah, sebagai bekal kehidupan dunia dan akhirat.
                            </p>

                            <h5>C. JUJUR</h5>
                            <p>
                                Jujur adalah kesesuaian antara perkataan dan perbuatan.
                                Seseorang dikatakan jujur apabila berkata dan bertindak sesuai
                                dengan kebenaran. Kejujuran harus mewarnai seluruh aspek
                                kehidupan, baik dalam pikiran, ucapan, maupun perbuatan.
                            </p>

                            <h5>D. IKHLAS</h5>
                            <p>
                                Ikhlas merupakan sikap tulus dalam beramal yang semata-mata
                                ditujukan untuk memperoleh ridha Allah SWT.
                                Amal ibadah tidak akan diterima tanpa keikhlasan.
                                Ikhlas berhubungan erat dengan niat dan mencerminkan
                                kebersihan hati, ketulusan, serta kejujuran dalam keyakinan
                                dan perbuatan yang hanya ditujukan kepada Allah SWT.
                            </p>
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
            threshold: 0.15
        });

        reveals.forEach(el => observer.observe(el));
    </script>

@endsection
