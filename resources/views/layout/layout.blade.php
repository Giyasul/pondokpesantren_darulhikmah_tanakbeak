<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>@yield('judul')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="icon" href="{{ asset('image/logo.jpeg') }}" type="image/jpeg">
    <style>
        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Inter', 'Segoe UI', system-ui, sans-serif;
            background-color: #f4f7f4;
            color: #333333;
            margin: 0;
            padding-top: 70px;
        }

        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1050;
            background: #004d00;
            padding: 14px 0;
            transition: all 0.35s ease;
            width: 100%;
            border-bottom: 2px solid #D4AF37;
        }

        .navbar .nav-link {
            color: #ffffff;
            font-weight: 500;
        }

        .navbar .nav-link:hover {
            color: #D4AF37;
        }

        .navbar .dropdown-menu {
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(6px);
            border-radius: 16px;
            padding: 14px 10px;
            min-width: 230px;
            border: 1px solid #D4AF37;
            box-shadow:
                0 16px 40px rgba(0, 0, 0, 0.2);
            transform-origin: top;
        }

        .navbar .dropdown-item {
            color: #004d00;
            padding: 12px 16px;
            margin-bottom: 6px;
            border-radius: 12px;
            font-size: 14px;
            font-weight: 500;
            background: rgba(0, 77, 0, 0.03);
            transition: all .25s ease;
        }

        .navbar .dropdown-item:hover {
            background: #004d00;
            color: #ffffff;
            transform: translateX(6px);
            box-shadow: 0 4px 12px rgba(0, 77, 0, 0.2);
        }

        .dropdown-menu {
            display: none;
            opacity: 0;
            visibility: hidden;
            transform: translateY(14px);
            transition: opacity .3s ease, transform .35s ease;
        }

        .dropdown-menu.show {
            display: block;
            opacity: 1;
            visibility: visible;
            transform: translateY(0) scale(1);
        }

        .navbar-scroll {
            background: rgba(0, 77, 0, 0.75) !important;
            backdrop-filter: blur(10px);
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.15);
        }

        .carousel-img {
            height: 70vh;
            object-fit: cover;
        }

        .navbar .dropdown-toggle::after {
            transition: transform 0.45s cubic-bezier(0.22, 1, 0.36, 1),
                border-top-color .3s ease;
        }

        .nav-item.dropdown:hover .dropdown-toggle::after {
            border-top-color: #D4AF37;
            transform: rotate(180deg);
        }

        @media (min-width: 992px) {
            .dropdown-menu {
                display: block;
                opacity: 0;
                visibility: hidden;
                transform: translateY(14px);
            }

            .nav-item.dropdown:hover>.dropdown-menu {
                opacity: 1;
                visibility: visible;
                transform: translateY(0);
            }
        }

        .brand-title {
            font-size: 12px;
            font-weight: 400;
            color: #D4AF37;
            text-align: center;
        }

        .brand-subtitle {
            font-size: 15px;
            font-weight: 700;
            color: #ffffff;
        }

        .navbar .nav-link:focus,
        .navbar .nav-link:active,
        .navbar .nav-link.show {
            color: #ffffff;
            background-color: transparent;
        }

        footer {
            background-color: #003300;
            color: #ffffff;
            padding: 50px 0;
            border-top: 4px solid #D4AF37;
        }

        footer h5 {
            color: #D4AF37;
            font-weight: 700;
            margin-bottom: 1.5rem;
        }

        footer .nav-link {
            color: rgba(255, 255, 255, 0.7);
            transition: 0.3s;
        }

        footer .nav-link:hover {
            color: #D4AF37;
            padding-left: 5px;
        }

        footer .text-body-secondary {
            color: rgba(255, 255, 255, 0.5) !important;
        }

        .footer-social {
            display: flex;
            gap: 15px;
        }

        .footer-social a {
            width: 42px;
            height: 42px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #ffffff;
            font-size: 18px;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(212, 175, 55, 0.4);
            transition: all .3s ease;
        }

        .footer-social a:hover {
            color: #003300;
            transform: scale(1.15);
            background: #D4AF37;
            box-shadow: 0 0 12px rgba(212, 175, 55, 0.4);
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center gap-3" href="#">
                <img src="{{ asset('image/logo.jpeg') }}" alt="Logo" width="45"
                    class="rounded-circle shadow-sm border border-white">
                <div class="brand-text">
                    <div class="brand-title">Pondok Pesantren</div>
                    <div class="brand-subtitle">Darul Hikmah Tanak Beak</div>
                </div>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}">Beranda</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarProfil" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Profil
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarProfil">
                            <li><a class="dropdown-item" href="{{ url('/sejarah') }}">Sejarah</a></li>
                            <li><a class="dropdown-item" href="{{ url('/visi-misi') }}">Visi & Misi</a></li>
                            <li><a class="dropdown-item" href="#">Tenaga Pendidik</a></li>
                            <li><a class="dropdown-item" href="#">Ekskul</a></li>
                            <li><a class="dropdown-item" href="#">Struktur Organisasi</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarLembaga" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Lembaga
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarLembaga">
                            <li><a class="dropdown-item" href="#">RA</a></li>
                            <li><a class="dropdown-item" href="#">MI</a></li>
                            <li><a class="dropdown-item" href="#">MTS</a></li>
                            <li><a class="dropdown-item" href="#">MA</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarInfo" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Informasi
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarInfo">
                            <li><a class="dropdown-item" href="#">PPDB</a></li>
                            <li><a class="dropdown-item" href="#">Perpustakaan Digital</a></li>
                            <li><a class="dropdown-item" href="#">Berita & Artikel</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/galeri') }}">Galeri</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    @yield('konten')

    <footer>
        <div class="container ">
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <a href="/" class="d-flex align-items-center mb-3 text-decoration-none">
                        <img src="{{ asset('image/logo.jpeg') }}" alt="Logo" width="40"
                            class="rounded-circle me-2">
                        <span class="brand-subtitle">Darul Hikmah Tanak Beak</span>
                    </a>
                    <p class="text-body-secondary">
                        Pondok Pesantren Darul Hikmah Tanak Beak. <br>
                        Membina generasi qur'ani, berakhlak mulia, dan berwawasan luas.
                    </p>
                    <div class="footer-social ">
                        <a href="https://wa.me/6283129793242?text=Assalamualaikum%20saya%20ingin%20bertanya%20tentang%20PPDB"
                            target="_blank" rel="noopener" aria-label="WhatsApp">
                            <i class="bi bi-whatsapp"></i>
                        </a>
                        <a href="https://www.youtube.com/@Pondokn4gadarulhikmah" target="_blank" rel="noopener"
                            aria-label="YouTube"><i class="bi bi-youtube"></i></a>
                        <a href="#" aria-label="Instagram"><i class="bi bi-instagram"></i></a>
                        <a href="#" aria-label="Facebook"><i class="bi bi-facebook"></i></a>
                        <a href="#" aria-label="TikTok"><i class="bi bi-tiktok"></i></a>
                    </div>
                    <p class="text-body-secondary mt-3">© 2026 Ponpes Darul Hikmah.</p>
                </div>
                <div class="col-6 col-md-2 mb-3 ms-auto">
                    <h5>Profil</h5>
                    <ul class="nav flex-column">
                        <li class="nav-item mb-2"><a href="{{ url('/sejarah') }}" class="nav-link p-0">Sejarah</a>
                        </li>
                        <li class="nav-item mb-2"><a href="{{ url('/visi-misi') }}" class="nav-link p-0">Visi
                                Misi</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0">Struktur</a></li>
                    </ul>
                </div>
                <div class="col-6 col-md-2 mb-3">
                    <h5>Lembaga</h5>
                    <ul class="nav flex-column">
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0">RA</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0">MI</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0">MTs</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0">MA</a></li>
                    </ul>
                </div>
                <div class="col-6 col-md-2 mb-3">
                    <h5>Bantuan</h5>
                    <ul class="nav flex-column">
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0">Kontak</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0">PPDB</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0">Lokasi</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

</body>
<script>
    const navbar = document.querySelector('.navbar');
    window.addEventListener('scroll', () => {
        if (window.scrollY > 80) {
            navbar.classList.add('navbar-scroll');
        } else {
            navbar.classList.remove('navbar-scroll');
        }
    });
</script>

</html>
