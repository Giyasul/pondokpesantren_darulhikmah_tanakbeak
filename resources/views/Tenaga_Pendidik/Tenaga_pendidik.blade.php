@extends('layout.layout')
@section('judul', 'Tenaga Pendidik - Pondok Pesantren Darul Hikmah')
@section('konten')

<style>
    :root {
        --primary-green: #0D6B0D;
        --accent-gold: #D4AF37;
        --light-bg: #f8f9fa;
    }

    html, body { background-color: var(--light-bg); }

    /* --- JUDUL SELAYANG PANDANG --- */
    .section-title-wrapper {
        text-align: center;
        margin-bottom: 40px;
    }

    .section-title {
        color: var(--primary-green);
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 1px;
        display: inline-block;
        position: relative;
        padding-bottom: 15px;
        font-size: 1.75rem;
    }

    .section-title::after {
        content: "";
        position: absolute;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
        width: 60%; /* Panjang garis emas */
        height: 3px;
        background-color: var(--accent-gold);
        border-radius: 2px;
    }

    /* --- WRAPPER UTAMA --- */
    .main-content-wrapper {
        background: #ffffff;
        border-radius: 20px;
        padding: 50px 40px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.05);
        border: 1px solid #eee;
        margin-top: 40px; /* Jarak dari Hero */
        position: relative;
    }

    /* --- TEACHER CARD --- */
    .teacher-card { 
        background: #fff;
        border-radius: 15px; 
        overflow: hidden;
        border: 1px solid #f0f0f0;
        box-shadow: 0 4px 12px rgba(0,0,0,0.05);
        transition: all 0.3s ease;
        cursor: pointer;
        height: 100%;
        display: flex;
        flex-direction: column;
    }
    
    .teacher-card:hover { 
        transform: translateY(-8px);
        box-shadow: 0 12px 20px rgba(0,0,0,0.1);
        border-color: var(--accent-gold);
    }

    .teacher-img-wrapper { 
        width: 100%; 
        aspect-ratio: 1/1; 
        overflow: hidden;
    }

    .teacher-img { width: 100%; height: 100%; object-fit: cover; }
    .teacher-info { padding: 15px 10px; text-align: center; }
    .teacher-name { font-weight: 700; color: #333; display: block; font-size: 0.95rem; line-height: 1.2; }
    .teacher-subject { font-size: 0.8rem; color: #888; display: block; text-transform: uppercase; margin-top: 5px; }

    /* --- MODAL STYLE --- */
    .modal { z-index: 9999 !important; }
    .modal-backdrop { z-index: 9998 !important; }
    .modal-content { border-radius: 20px; border: none; }
    .modal-teacher-name { font-size: 1.8rem; font-weight: 800; color: #222; border-bottom: 3px solid var(--accent-gold); padding-bottom: 5px; margin-bottom: 15px; display: inline-block; }
    .detail-label { font-weight: 800; color: var(--primary-green); margin-top: 15px; display: block; text-transform: uppercase; font-size: 0.85rem; }
    .detail-text { color: #444; font-size: 0.95rem; margin-bottom: 0; }
    .img-detail-full { width: 100%; aspect-ratio: 3/4; object-fit: cover; border-radius: 12px; }

    /* --- HERO --- */
    .hero-carousel .carousel-item { height: 350px; background-color: #000; }
    .carousel-image-container img { width: 100%; height: 100%; object-fit: cover; opacity: 0.4; }
    .carousel-overlay { position: absolute; top: 0; left: 0; width: 100%; height: 100%; display: flex; flex-direction: column; justify-content: center; align-items: center; color: #fff; }

    /* Animation */
    .reveal { opacity: 0; transform: translateY(30px); transition: all .8s ease; }
    .reveal.show { opacity: 1; transform: translateY(0); }

    @media (max-width: 768px) {
        .main-content-wrapper { padding: 30px 20px; margin-top: 20px; }
        .section-title { font-size: 1.4rem; }
    }
</style>

<div class="carousel slide hero-carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <div class="carousel-image-container">
                <img src="{{ asset('image/pondok.jpeg') }}">
                <div class="carousel-overlay text-center px-3">
                    <h1 class="fw-bold display-4">TENAGA PENDIDIK</h1>
                    <p class="lead">Profil Guru dan Asatidz Pondok Pesantren Darul Hikmah</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container mb-5">
    <div class="main-content-wrapper">
        
        <div class="section-title-wrapper reveal">
            <h2 class="section-title">DAFTAR PENGAJAR PONPES DARUL HIKMAH</h2>
        </div>

        <div class="row g-4 justify-content-center">
            @forelse ($gurus as $guru)
                <div class="col-6 col-md-4 col-lg-3 reveal">
                    <div class="teacher-card" data-bs-toggle="modal" data-bs-target="#detailGuru{{ $guru->id }}">
                        <div class="teacher-img-wrapper">
                            <img src="{{ $guru->foto ? asset('storage/' . $guru->foto) : asset('image/default.jpeg') }}" class="teacher-img">
                        </div>
                        <div class="teacher-info">
                            <span class="teacher-name">{{ $guru->nama }}</span>
                            <span class="teacher-subject">{{ $guru->mapel }}</span>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <p class="text-muted">Data belum tersedia.</p>
                </div>
            @endforelse
        </div>

        <div class="mt-5 d-flex justify-content-center">
            {{ $gurus->links('pagination::bootstrap-5') }}
        </div>
    </div>
</div>

@foreach ($gurus as $guru)
    <div class="modal fade" id="detailGuru{{ $guru->id }}" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content p-4 p-md-5">
                <div class="text-end position-absolute top-0 end-0 p-3">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-0 text-start">
                    <h2 class="modal-teacher-name">{{ $guru->nama }}</h2>
                    <div class="row mt-3">
                        <div class="col-md-5 mb-4 text-center">
                            <img src="{{ $guru->foto ? asset('storage/' . $guru->foto) : asset('image/default.jpeg') }}" class="img-detail-full">
                        </div>
                        <div class="col-md-7">
                            <div class="row">
                                <div class="col-6 mb-3"><span class="detail-label">NIK</span><p class="detail-text">{{ $guru->nik ?? '-' }}</p></div>
                                <div class="col-6 mb-3"><span class="detail-label">NUPTK</span><p class="detail-text">{{ $guru->nuptk ?? '-' }}</p></div>
                                <div class="col-6 mb-3"><span class="detail-label">JENIS KELAMIN</span><p class="detail-text">{{ $guru->jk == 'L' ? 'Laki-laki' : 'Perempuan' }}</p></div>
                                <div class="col-6 mb-3"><span class="detail-label">KONTAK</span><p class="detail-text">{{ $guru->no_hp ?? '-' }}</p></div>
                            </div>
                            <div class="mb-3"><span class="detail-label">EMAIL</span><p class="detail-text text-break">{{ $guru->email ?? '-' }}</p></div>
                            <div class="mb-3"><span class="detail-label">TEMPAT & TANGGAL LAHIR</span><p class="detail-text">{{ $guru->tempat_lahir }}, {{ $guru->tanggal_lahir ? \Carbon\Carbon::parse($guru->tanggal_lahir)->translatedFormat('d F Y') : '-' }}</p></div>
                            <div class="mt-3 pt-3 border-top">
                                <span class="detail-label">BIDANG KEAHLIAN / MAPEL</span><p class="detail-text">{{ $guru->mapel }}</p>
                                <span class="detail-label">PENEMPATAN</span><p class="detail-text">{{ $guru->penempatan }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach

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