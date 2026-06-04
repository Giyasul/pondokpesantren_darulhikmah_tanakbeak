@extends('layout.layout')
@section('judul', 'Ekstrakurikuler - Pondok Pesantren Darul Hikmah')
@section('konten')

    <style>
        html,
        body {
            overflow-x: hidden;
        }

        /* Hero Section / Header Page */
        .ekskul-header {
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)),
                url('{{ asset('image/pondok.jpeg') }}');
            background-size: cover;
            background-position: center;
            padding: 100px 0;
            text-align: center;
            border-bottom: 5px solid #D4AF37;
        }

        .ekskul-header h1 {
            font-weight: 800;
            font-size: clamp(2.2rem, 5vw, 3.5rem);
            color: #ffffff;
            text-shadow:
                0 0 6px rgba(255, 255, 255, 0.45),
                0 0 14px rgba(212, 175, 55, 0.35),
                2px 2px 10px rgba(0, 0, 0, 0.85);
        }

        .ekskul-header p {
            font-weight: 500;
            font-size: 1.1rem;
            text-shadow:
                0 0 6px rgba(255, 255, 255, 0.45),
                0 0 14px rgba(212, 175, 55, 0.35),
                2px 2px 10px rgba(0, 0, 0, 0.85);
        }

        /* Global Ekskul Styling */
        .ekskul-section {
            padding: 100px 0;
            display: flex;
            align-items: center;
        }

        .ekskul-title {
            font-size: 2.8rem;
            font-weight: 800;
            margin-bottom: 25px;
            position: relative;
        }

        .ekskul-text {
            font-size: 1.1rem;
            line-height: 1.9;
            text-align: justify;
            color: inherit;
        }

        .ekskul-image-wrapper {
            position: relative;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
        }

        .ekskul-image-wrapper img {
            width: 100%;
            height: auto;
            display: block;
            transition: transform 0.5s ease;
        }

        .ekskul-image-wrapper:hover img {
            transform: scale(1.05);
        }

        /* Warna Hijau Khusus */
        .bg-green-pondok {
            background-color: #0D6B0D;
            color: #ffffff;
        }

        /* Animasi Reveal */
        .reveal {
            opacity: 0;
            transform: translateY(50px);
            transition: all 0.8s ease-out;
        }

        .reveal.show {
            opacity: 1;
            transform: translateY(0);
        }

        .delay-1 {
            transition-delay: 0.2s;
        }

        .delay-2 {
            transition-delay: 0.4s;
        }

        /* Responsive */
        @media (max-width: 991px) {
            .ekskul-section {
                padding: 60px 0;
            }

            .ekskul-title {
                font-size: 2.2rem;
                text-align: center;
            }

            .ekskul-header h1 {
                font-size: 2.5rem;
            }
        }
    </style>

    <div class="ekskul-header">
        <div class="container">
            <h1 class="reveal">Ekstrakurikuler</h1>
            <p class="text-white-50 reveal delay-1">Mengembangkan Bakat dan Minat Santri untuk Generasi Berkemajuan</p>
        </div>
    </div>

    <section class="ekskul-section bg-white">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6 reveal">
                    <div class="ekskul-image-wrapper">
                        <img src="{{ asset('image/Ekskul/pramuka.png') }}" alt="Kegiatan Pramuka">
                    </div>
                </div>
                <div class="col-lg-6 reveal delay-1">
                    <h2 class="ekskul-title" style="color: #004d00;">Pramuka</h2>
                    <p class="ekskul-text text-muted">
                        Ekstrakurikuler Pramuka di Pondok Darul Hikmah merupakan wadah pembinaan karakter santri yang
                        berlandaskan nilai kedisiplinan, kemandirian, tanggung jawab, dan kepemimpinan. Melalui berbagai
                        kegiatan seperti latihan rutin, perkemahan, jelajah alam, dan kegiatan sosial, santri dilatih untuk
                        memiliki jiwa tangguh, kerja sama tim yang baik, serta semangat gotong royong. Pramuka tidak hanya
                        membentuk fisik yang kuat, tetapi juga menanamkan akhlak mulia dan jiwa kepemimpinan yang
                        berlandaskan nilai-nilai Islam.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="ekskul-section bg-green-pondok">
        <div class="container">
            <div class="row g-5 align-items-center flex-lg-row-reverse">
                <div class="col-lg-6 reveal">
                    <div class="ekskul-image-wrapper">
                        <img src="{{ asset('image/Ekskul/hadrah.png') }}" alt="Kegiatan Hadrah">
                    </div>
                </div>
                <div class="col-lg-6 reveal delay-1">
                    <h2 class="ekskul-title text-white">Hadrah</h2>
                    <p class="ekskul-text">
                        Ekstrakurikuler Hadrah di Pondok Darul Hikmah merupakan kegiatan seni Islami yang bertujuan
                        menumbuhkan kecintaan santri kepada Rasulullah ﷺ melalui lantunan shalawat dan iringan alat musik
                        rebana. Kegiatan ini menjadi wadah pengembangan bakat di bidang seni, sekaligus sarana dakwah yang
                        menyejukkan hati. Melalui latihan rutin dan penampilan dalam berbagai acara pondok maupun kegiatan
                        keagamaan, santri dilatih untuk kompak, percaya diri, serta menjaga kekompakan tim dengan tetap
                        menjunjung tinggi adab dan nilai-nilai Islam.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const revealEls = document.querySelectorAll('.reveal');
            const revealObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('show');
                    }
                });
            }, {
                threshold: 0.15
            });

            revealEls.forEach(el => revealObserver.observe(el));
        });
    </script>

@endsection
