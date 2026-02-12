@extends('layout.layout')
@section('judul', 'Perpustakaan Digital - Pondok Pesantren Darul Hikmah')
@section('konten')

<style>
    body { background-color: #f8f9fa; }

    /* CAROUSEL HEADER - Redup & Elegan (Mirip Page Header Sejarah) */
    .hero-carousel .carousel-item {
        height: 450px;
        background-color: #000;
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
        opacity: 0.6; 
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
        text-align: center;
        border-bottom: 4px solid #D4AF37; 
    }

    .carousel-overlay h1 {
        font-weight: 800;
        font-size: clamp(2rem, 5vw, 3rem);
        color: #ffffff;
        text-shadow: 0 0 10px rgba(0, 0, 0, 0.8);
        text-transform: uppercase;
        margin-bottom: 10px;
    }

    /* Deskripsi Carousel Tengah & Lebar Otomatis */
    .carousel-overlay p {
        font-size: 1.1rem;
        font-weight: 400;
        max-width: 700px; /* Batasi lebar agar tidak terlalu melebar di layar besar */
        margin-left: auto; /* Push ke tengah */
        margin-right: auto; /* Push ke tengah */
        text-shadow: 0 0 5px rgba(0, 0, 0, 0.8);
    }

    /* SECTION PERPUSTAKAAN */
    .library-section { padding: 50px 0 80px; }
    
    .section-header {
        text-align: center;
        margin-bottom: 45px;
    }
    
    .section-title {
        font-weight: 800;
        color: #0D6B0D;
        font-size: 1.8rem;
        text-transform: uppercase;
        display: inline-block; 
        position: relative;
        padding-bottom: 8px;
    }

    .section-title::after {
        content: "";
        position: absolute;
        left: 0;
        bottom: 0;
        width: 100%; 
        height: 4px;
        background: #D4AF37; 
        border-radius: 2px;
    }

    /* CARD STYLE (Tetap Padat) */
    .book-card {
        background: #fff;
        border: 1px solid #e9ecef;
        border-radius: 12px;
        overflow: hidden;
        display: flex;
        flex-direction: column;
        height: 100%; 
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        box-shadow: 0 4px 15px rgba(0,0,0,0.05);
    }

    .book-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 12px 25px rgba(0,0,0,0.1);
    }

    .book-cover-wrapper {
        position: relative;
        width: 100%;
        aspect-ratio: 3/4; 
        background: #f1f3f5;
    }

    .book-img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .book-body {
        padding: 15px;
        display: flex;
        flex-direction: column;
        flex-grow: 1; 
    }

    .book-title {
        font-weight: 700;
        font-size: 0.95rem;
        color: #212529;
        line-height: 1.4;
        margin-bottom: 6px;
        text-decoration: none;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        min-height: 2.6rem; 
    }

    .book-author {
        font-size: 0.8rem;
        color: #6c757d;
        margin-bottom: 4px;
    }

    .book-date {
        font-size: 0.75rem;
        color: #aaa;
        margin-bottom: 15px;
        display: flex;
        align-items: center;
    }

    .book-footer {
        margin-top: auto; 
        border-top: 1px solid #f8f9fa;
        padding-top: 12px;
    }

    .btn-read {
        background-color: #0D6B0D;
        color: white;
        font-weight: 700;
        font-size: 0.75rem;
        text-transform: uppercase;
        border-radius: 8px;
        padding: 10px;
        width: 100%;
        display: inline-block;
        text-align: center;
        text-decoration: none;
        transition: 0.3s;
    }

    .btn-read:hover {
        background-color: #084d08;
        color: #fff;
        letter-spacing: 0.5px;
    }

    /* GRID LAYOUT */
    .row.g-padat {
        --bs-gutter-x: 1rem;
        --bs-gutter-y: 1.5rem;
    }

    @media (min-width: 992px) {
        .col-lg-2-4 {
            flex: 0 0 auto;
            width: 20%;
        }
    }

    @media (max-width: 768px) {
        .hero-carousel .carousel-item { height: 300px; }
        .carousel-overlay h1 { font-size: 1.8rem; }
        .carousel-overlay p { font-size: 0.9rem; }
        .section-title { font-size: 1.4rem; }
    }

    /* Reveal Animation Style */
    .reveal {
        opacity: 0;
        transform: translateY(40px);
        transition: all .8s ease;
    }

    .reveal.show {
        opacity: 1;
        transform: translateY(0);
    }
</style>

<div id="heroLibrary" class="carousel slide hero-carousel" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <div class="carousel-image-container">
                <img src="{{ asset('image/pondok.jpeg') }}" alt="Perpustakaan Darul Hikmah">
                <div class="carousel-overlay">
                    <div class="container reveal"> {{-- Tambahkan reveal di sini --}}
                        <h1 class="animate__animated animate__fadeInDown">Perpustakaan Digital</h1>
                        <p class="animate__animated animate__fadeInUp">Jendela dunia bagi para santri. Akses literasi dan kitab kuning dalam satu genggaman untuk mewujudkan generasi yang kaya amal dan anggun dalam akhlak.</p>
                    </div>
                </div>
            </div>
        </div>
        </div>
</div>

<div class="container library-section">
    {{-- Header Judul Tengah --}}
    <div class="section-header reveal"> {{-- Tambahkan reveal di sini --}}
        <h2 class="section-title">Koleksi Buku</h2>
    </div>

    {{-- Grid Buku --}}
    <div class="row g-padat">
        @forelse($books as $book)
        <div class="col-6 col-md-4 col-lg-2-4 reveal"> {{-- Tambahkan reveal di setiap kartu --}}
            <div class="book-card">
                <div class="book-cover-wrapper">
                    @if($book->foto)
                        <img src="{{ asset('storage/' . $book->foto) }}" class="book-img" alt="{{ $book->judul }}">
                    @else
                        <img src="{{ asset('image/pondok.jpeg') }}" class="book-img" alt="Default Cover">
                    @endif
                </div>

                <div class="book-body">
                    <a href="#" class="book-title">{{ $book->judul }}</a>
                    <div class="book-author">Oleh: {{ $book->penulis }}</div>
                    
                    <div class="book-date">
                        <i class="bi bi-calendar3 me-2"></i>
                        {{ $book->created_at->translatedFormat('d M Y') }}
                    </div>

                    <div class="book-footer">
                        @if($book->file_pdf)
                            <a href="{{ asset('storage/' . $book->file_pdf) }}" class="btn-read" target="_blank">
                                <i class="bi bi-file-earmark-pdf me-1"></i> Baca Sekarang
                            </a>
                        @else
                            <span class="btn-read bg-secondary" style="opacity: 0.6; cursor: not-allowed;">
                                File Kosong
                            </span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12 text-center py-5 reveal"> {{-- Tambahkan reveal di sini --}}
            <div class="p-5 border rounded-3 bg-white shadow-sm">
                <i class="bi bi-book text-muted" style="font-size: 3rem;"></i>
                <p class="text-muted mt-3">Koleksi buku belum tersedia di rak digital.</p>
            </div>
        </div>
        @endforelse
    </div>

    {{-- Navigasi Halaman --}}
    <div class="d-flex justify-content-center mt-5 reveal"> {{-- Tambahkan reveal di sini --}}
        {{ $books->links('pagination::bootstrap-5') }}
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const observer = new IntersectionObserver(entries => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('show');
                } else {
                    // Opsional: Hapus 'show' ketika tidak terlihat (untuk efek berulang)
                    // entry.target.classList.remove('show'); 
                }
            });
        }, {
            threshold: 0.1 // Berapa persen elemen harus terlihat agar trigger
        });

        document.querySelectorAll('.reveal').forEach(el => observer.observe(el));
    });
</script>

@endsection