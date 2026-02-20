<!-- @extends('layout.layout')
@section('judul', 'Tenaga Pendidik Pondok Pesantren Darul Hikmah')
@section('konten')

    <style>
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

        .pendidik-col {
            padding-top: 10px;
            padding-bottom: 10px;
        }

        .pendidik-section {
            margin-top: 80px;
            margin-bottom: 100px;
        }

        .pendidik-card {
            position: relative;
            background: #ffffff;
            border-radius: 20px;
            overflow: visible;
            z-index: 1;
        }

        .pendidik-card-inner {
            border-radius: 20px;
            overflow: hidden;
            background: #fff;
            border: 2px solid rgba(212, 175, 55, .65);
            box-shadow:
                0 10px 22px rgba(212, 175, 55, .35),
                0 0 18px rgba(212, 175, 55, .25),
                0 22px 46px rgba(0, 0, 0, .35);
            transition:
                transform .45s cubic-bezier(.22, 1, .36, 1),
                box-shadow .45s cubic-bezier(.22, 1, .36, 1),
                border-color .45s ease;
        }

        .pendidik-card::after {
            content: "";
            position: absolute;
            inset: -12px;
            border-radius: 26px;
            background:
                radial-gradient(circle at top,
                    rgba(212, 175, 55, .55),
                    transparent 65%);
            opacity: .35;
            z-index: -1;
            filter: blur(18px);
            transition:
                opacity .45s ease,
                transform .45s ease;
        }

        .pendidik-card:hover::after {
            opacity: .75;
            transform: scale(1.03);
        }

        .pendidik-card:hover .pendidik-card-inner {
            transform: translateY(-8px) scale(1.02);
        }

        .pendidik-img {
            width: 100%;
            height: 260px;
            object-fit: cover;
        }

        .pendidik-body {
            padding: 20px;
            text-align: center;
        }

        .pendidik-nama {
            font-size: 18px;
            font-weight: 700;
            color: #004d00;
            margin-bottom: 6px;
            text-shadow:
                0 0 6px rgba(212, 175, 55, .25);
        }

        .pendidik-jabatan {
            font-size: 14px;
            font-weight: 600;
            color: #2f6b4f;
            background: rgba(212, 175, 55, .15);
            padding: 6px 16px;
            border-radius: 20px;
            display: inline-block;
            border: 1px solid rgba(212, 175, 55, .45);
        }

        .reveal-pendidik {
            opacity: 0;
            transform: translateY(40px) scale(.98);
            transition:
                opacity .8s ease,
                transform .8s cubic-bezier(.22, 1, .36, 1);
        }

        .reveal-pendidik.show {
            opacity: 1;
            transform: translateY(0) scale(1);
        }

        @media (max-width: 768px) {
            .reveal-pendidik {
                transform: translateY(40px) scale(.98);
            }
        }
    </style>

    <section class="page-header">
        <div class="container reveal">
            <h1>Tenaga Pendidik</h1>
            <p>
                Pendidik yang berdedikasi dalam membentuk generasi berilmu,
                berakhlak, dan berlandaskan nilai keislaman.
            </p>
        </div>
    </section>

    <div class="pendidik-section">
        <div class="container">
            <div class="row g-3">

                <div class="col-lg-3 col-md-4 col-sm-6 pendidik-col reveal-pendidik">
                    <div class="pendidik-card">
                        <div class="pendidik-card-inner">
                            <img src="{{ asset('image/pondok.jpeg') }}" class="pendidik-img">
                            <div class="pendidik-body">
                                <div class="pendidik-nama">Ust. Ahmad Fauzi</div>
                                <div class="pendidik-jabatan">Pengasuh Pondok</div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script>
        const pendidikEls = document.querySelectorAll('.reveal-pendidik');
        const pendidikObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('show');
                }
            });
        }, {
            threshold: 0.15
        });

        pendidikEls.forEach(el => pendidikObserver.observe(el));
    </script>

@endsection -->
