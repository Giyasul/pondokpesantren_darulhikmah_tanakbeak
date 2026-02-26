@extends('layout.layout')

{{-- Ganti bagian ini sesuai halaman (RA/MI/MTs/MA) --}}
@section('judul', 'Lembaga - RA')

@section('konten')

    <style>
        :root {
            --primary-green: #0D6B0D;
            --accent-gold: #D4AF37;
            --light-bg: #f8f9fa;
        }

        .main-content-wrapper {
            background: #ffffff;
            border-radius: 20px;
            padding: 100px 40px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            border: 1px solid #eee;
            margin: 60px auto;
            max-width: 900px;
        }

        /* --- VISUAL CSS (PENGGANTI GAMBAR) --- */
        .coming-soon-visual {
            width: 150px;
            height: 150px;
            background: linear-gradient(135deg, var(--primary-green), #1a8e1a);
            border-radius: 30%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 30px;
            box-shadow: 0 15px 35px rgba(13, 107, 13, 0.2);
            position: relative;
            animation: float 3s ease-in-out infinite;
        }

        .coming-soon-visual i {
            font-size: 4rem;
            color: #ffffff;
        }

        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-15px); }
            100% { transform: translateY(0px); }
        }

        .status-badge {
            display: inline-block;
            background-color: #e8f5e9;
            color: var(--primary-green);
            padding: 8px 20px;
            border-radius: 50px;
            font-weight: 700;
            font-size: 0.85rem;
            margin-bottom: 20px;
            text-transform: uppercase;
            border: 1px solid rgba(13, 107, 13, 0.1);
        }

        .coming-soon-title {
            color: #222;
            font-weight: 800;
            font-size: 2.5rem;
            margin-bottom: 15px;
        }

        .coming-soon-desc {
            color: #666;
            max-width: 550px;
            margin: 0 auto;
            line-height: 1.6;
            font-size: 1.1rem;
        }

        /* --- ANIMASI REVEAL --- */
        .reveal {
            opacity: 0;
            transform: translateY(30px);
            transition: all .8s ease;
        }

        .reveal.show {
            opacity: 1;
            transform: translateY(0);
        }
    </style>

    <div class="container text-center">
        <div class="main-content-wrapper reveal">
            
            {{-- Badge Status --}}
            <div class="status-badge">
                Tahap Pengembangan
            </div>

            {{-- Visual Pengganti Gambar (Menggunakan Icon) --}}
            <div class="coming-soon-visual">
                <i class="bi bi-gear-wide-connected"></i>
            </div>

            {{-- Teks Informasi --}}
            <h1 class="coming-soon-title">Segera Hadir!</h1>
            <p class="coming-soon-desc">
                Mohon maaf, halaman ini sedang dalam proses sinkronisasi database dan pembaharuan konten akademik. Kami akan segera kembali!
            </p>

            {{-- Tombol Navigasi --}}
            <div class="mt-5">
                <a href="{{ url('/') }}" class="btn btn-success px-5 py-2 shadow-sm" 
                   style="background-color: var(--primary-green); border-radius: 12px; font-weight: 600;">
                    <i class="bi bi-house-door me-2"></i> Kembali ke Beranda
                </a>
            </div>

        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const observer = new IntersectionObserver(entries => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) entry.target.classList.add('show');
                });
            }, { threshold: 0.1 });
            
            document.querySelectorAll('.reveal').forEach(el => observer.observe(el));
        });
    </script>

@endsection