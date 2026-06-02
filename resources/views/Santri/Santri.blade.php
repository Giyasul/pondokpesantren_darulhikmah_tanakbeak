@extends('layout.layout')

@section('judul', 'Data Peserta Didik - Pondok Pesantren Darul Hikmah')

@section('konten')
    <style>
        :root {
            --primary-green: #0D6B0D;
            --accent-gold: #D4AF37;
            --light-bg: #f8f9fa;
        }

        html,
        body {
            background-color: var(--light-bg);
            overflow-x: hidden;
        }

        /* --- HERO SECTION --- */
        .hero-carousel .carousel-item {
            height: 400px;
            background-color: #000;
            border-bottom: 3px solid #D4AF37;
        }

        .carousel-image-container {
            position: relative;
            width: 100%;
            height: 100%;
        }

        .carousel-image-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: cover;
            opacity: 0.45;
        }

        .carousel-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to bottom, rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.7));
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            color: #fff;
        }

        .carousel-overlay h1 {
            font-weight: 800;
            font-size: clamp(2.5rem, 6vw, 4rem);
            color: #ffffff;
            text-transform: uppercase;
            letter-spacing: 2px;
            margin: 0;
            text-shadow:
                0 0 6px rgba(255, 255, 255, 0.45),
                0 0 14px rgba(212, 175, 55, 0.35),
                2px 2px 10px rgba(0, 0, 0, 0.85);
        }

        .carousel-overlay p {
            font-size: 1.25rem;
            color: #ffffff;
            text-shadow:
                0 0 6px rgba(255, 255, 255, 0.45),
                0 0 14px rgba(212, 175, 55, 0.35),
                2px 2px 10px rgba(0, 0, 0, 0.85);
        }

        /* --- WRAPPER UTAMA --- */
        .main-content-wrapper {
            background: #ffffff;
            border-radius: 20px;
            padding: 50px 40px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            border: 1px solid #eee;
            margin-top: 40px;
            position: relative;
            z-index: 5;
        }

        .section-title {
            color: var(--primary-green);
            font-weight: 800;
            text-transform: uppercase;
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
            width: 60%;
            height: 3px;
            background-color: var(--accent-gold);
        }

        /* --- MODAL STYLE REVISI (FOCUS FONT SIZE) --- */
        .modal-content {
            border-radius: 25px;
            border: none;
            overflow: hidden;
        }

        /* Judul Field (NISN, ANGKATAN, dll) */
        .detail-label-title {
            color: var(--primary-green);
            font-weight: 800;
            font-size: 1rem;
            /* Ukuran diperbesar agar lebih dominan */
            display: block;
            text-transform: uppercase;
            margin-bottom: 2px;
            letter-spacing: 0.5px;
        }

        /* Isi Data (Nilai dari database) */
        .detail-value-text {
            color: #333;
            font-weight: 500;
            font-size: 1.1rem;
            /* Ukuran data dibuat lebih mantap dibaca */
            margin-bottom: 0;
        }

        .img-detail-container {
            width: 100%;
            height: 100%;
            border-radius: 20px;
            overflow: hidden;
            background-color: #f8f9fa;
            border: 1px solid #eee;
        }

        .img-detail-full {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .reveal {
            opacity: 0;
            transform: translateY(30px);
            transition: all .8s ease;
        }

        .reveal.show {
            opacity: 1;
            transform: translateY(0);
        }

        /* --- ANIMASI MODAL --- */
        .modal.fade .modal-dialog {
            transform: scale(0.9) translateY(30px);
            opacity: 0;
            transition: all 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
        }

        .modal.show .modal-dialog {
            transform: scale(1) translateY(0);
            opacity: 1;
        }

        .modal-backdrop.show {
            opacity: 0.7;
            backdrop-filter: blur(5px);
        }

        .img-detail-container {
            min-height: 250px;
        }
    </style>

    <div class="carousel slide hero-carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="carousel-image-container">
                    <img src="{{ asset('image/pondok.jpeg') }}">
                    <div class="carousel-overlay text-center px-3">
                        <h1 class="reveal fw-bold display-4 text-white">DATA PESERTA DIDIK</h1>
                        <p class="reveal lead text-white">Pondok Pesantren Darul Hikmah Tanak Beak</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mb-5">
        <div class="main-content-wrapper reveal">
            <div class="text-center mb-5">
                <h2 class="section-title">DAFTAR DATA SANTRI</h2>
            </div>

            <div class="row mb-4 align-items-end g-3">
                <div class="col-lg-8">
                    <form action="{{ route('santri.index') }}" method="GET" class="row g-2">
                        <div class="col-6 col-md-4">
                            <label class="small fw-bold text-success">JENJANG</label>
                            <select name="jenjang" id="jenjangSelect" class="form-select border-success">
                                <option value="">Semua</option>
                                <option value="MTS" {{ request('jenjang') == 'MTS' ? 'selected' : '' }}>MTS</option>
                                <option value="MA" {{ request('jenjang') == 'MA' ? 'selected' : '' }}>MA</option>
                            </select>
                        </div>
                        <div class="col-6 col-md-4">
                            <label class="small fw-bold text-success">KELAS</label>
                            <select name="kelas" id="kelasSelect" class="form-select border-success">
                                <option value="">Semua</option>
                            </select>
                        </div>
                        <div class="col-12 col-md-2 d-flex align-items-end">
                            <button type="submit" class="btn btn-success w-100 fw-bold shadow-sm">FILTER</button>
                        </div>
                    </form>
                </div>
                <div class="col-lg-4 text-end">
                    <form action="{{ route('santri.index') }}" method="GET">
                        <label class="small fw-bold text-success">CARI NAMA</label>
                        <div class="input-group">
                            <input type="text" name="search" class="form-control border-success" placeholder="Cari..."
                                value="{{ request('search') }}">
                            <button class="btn btn-success" type="submit"><i class="bi bi-search"></i></button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-hover align-middle border">
                    <thead style="background-color: var(--primary-green); color: white;">
                        <tr>
                            <th width="60" class="text-center">NO</th>
                            <th>NAMA LENGKAP</th>
                            <th class="text-center">JENJANG/KELAS</th>
                            <th class="text-center">STATUS</th>
                            <th width="120" class="text-center">AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($santris as $index => $s)
                            <tr>
                                <td class="text-center fw-bold">{{ $santris->firstItem() + $index }}</td>
                                <td class="fw-bold text-uppercase text-dark">{{ $s->nama }}</td>
                                <td class="text-center">
                                    <span class="badge bg-light text-success border border-success px-3">
                                        {{ $s->jenjang }} - Kelas {{ trim(str_ireplace('kelas', '', $s->kelas)) }}
                                    </span>
                                </td>
                                <td class="text-center">
                                    @php $st = strtolower($s->status ?? 'aktif'); @endphp
                                    <span
                                        class="badge {{ $st == 'aktif' ? 'bg-success' : 'bg-secondary' }} px-3 text-capitalize">
                                        {{ $st }}
                                    </span>
                                </td>
                                <td class="text-center">
                                    <button class="btn btn-sm btn-outline-success px-3 fw-bold" data-bs-toggle="modal"
                                        data-bs-target="#detailModal{{ $s->id }}">
                                        DETAIL
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-5 text-muted">Data tidak ditemukan.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-4 d-flex justify-content-center">
                {{ $santris->appends(request()->input())->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>

    @foreach ($santris as $s)
        <div class="modal fade" id="detailModal{{ $s->id }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content border-0 shadow-lg">

                    <div class="text-end p-2 pb-0">
                        <button type="button" class="btn-close m-2" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body px-4 px-md-5 pb-5 pt-0">
                        <div class="mb-4">
                            <h2 class="fw-bold mb-1" style="color: #222; font-size: 2.2rem; letter-spacing: -1px;">
                                {{ $s->nama }}</h2>
                            <div style="width: 50px; height: 5px; background-color: #D4AF37; border-radius: 10px;"></div>
                        </div>

                        <div class="row g-4 d-flex align-items-stretch">
                            <div class="col-md-5">
                                <div
                                    class="img-detail-container shadow-sm d-flex align-items-center justify-content-center">
                                    @if ($s->foto)
                                        <img src="{{ asset('storage/' . $s->foto) }}" class="img-detail-full">
                                    @else
                                        <i class="bi bi-person-circle text-secondary" style="font-size: 120px;"></i>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-7">
                                <div class="row g-3">
                                    <div class="col-6">
                                        <label class="detail-label-title">NISN</label>
                                        <p class="detail-value-text">{{ $s->nisn ?? '-' }}</p>
                                    </div>

                                    <div class="col-6">
                                        <label class="detail-label-title">Jenis Kelamin</label>
                                        <p class="detail-value-text">{{ $s->jk == 'L' ? 'Laki-laki' : 'Perempuan' }}</p>
                                    </div>

                                    <div class="col-6">
                                        <label class="detail-label-title">Angkatan</label>
                                        <p class="detail-value-text">{{ $s->angkatan ?? '-' }}</p>
                                    </div>

                                    <div class="col-6">
                                        <label class="detail-label-title">Status</label>
                                        <p class="detail-value-text">{{ ucfirst($s->status ?? 'Aktif') }}</p>
                                    </div>

                                    <div class="col-12">
                                        <label class="detail-label-title">Tempat & Tanggal Lahir</label>
                                        <p class="detail-value-text">{{ $s->tempat_lahir ?? '-' }},
                                            {{ $s->tanggal_lahir ?? '-' }}</p>
                                    </div>

                                    <div class="col-12">
                                        <hr class="my-2" style="opacity: 0.1;">
                                        <label class="detail-label-title">Pendidikan Aktif</label>
                                        <p class="fw-bold fs-5" style="color: #0D6B0D; margin-bottom: 0;">
                                            {{ $s->jenjang }} - Kelas {{ trim(str_ireplace('kelas', '', $s->kelas)) }}
                                        </p>
                                    </div>

                                    <div class="col-12">
                                        <label class="detail-label-title">Alamat Asal</label>
                                        <p class="detail-value-text text-muted" style="line-height: 1.5;">
                                            {{ $s->alamat ?? '-' }}</p>
                                    </div>
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
            // Reveal animation
            const observer = new IntersectionObserver(entries => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) entry.target.classList.add('show');
                });
            });
            document.querySelectorAll('.reveal').forEach(el => observer.observe(el));

            // Logic Filter Kelas Dinamis
            const jenjangSelect = document.getElementById('jenjangSelect');
            const kelasSelect = document.getElementById('kelasSelect');
            const urlParams = new URLSearchParams(window.location.search);
            const selectedKelas = urlParams.get('kelas');

            const daftarKelas = {
                'MTS': ['7', '8', '9'],
                'MA': ['10', '11', '12']
            };

            function updateOpsiKelas() {
                const jenjang = jenjangSelect.value;
                kelasSelect.innerHTML = '<option value="">Semua</option>';

                if (daftarKelas[jenjang]) {
                    daftarKelas[jenjang].forEach(item => {
                        const opt = document.createElement('option');
                        opt.value = item;
                        opt.text = 'Kelas ' + item;
                        if (item === selectedKelas) opt.selected = true;
                        kelasSelect.appendChild(opt);
                    });
                }
            }

            updateOpsiKelas();
            jenjangSelect.addEventListener('change', updateOpsiKelas);
        });
    </script>
@endsection
