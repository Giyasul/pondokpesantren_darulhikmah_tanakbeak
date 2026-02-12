@extends('layout.layout')
@section('judul', 'Berita Lengkap')
@section('konten')

    <style>
        .detail-section { padding: 60px 0; background: #fff; }
        .news-container { max-width: 800px; margin: 0 auto; }
        
        /* Header Tengah */
        .news-header { text-align: center; margin-bottom: 40px; }
        .detail-title { font-weight: 800; font-size: 2.5rem; line-height: 1.2; margin-bottom: 15px; }
        .detail-meta { font-size: 0.95rem; color: #555; }
        .meta-author { color: #d10000; font-weight: bold; }

        /* Gambar & Konten */
        .detail-image img { width: 100%; border-radius: 8px; }
        .image-caption { font-size: 0.85rem; color: #777; margin: 10px 0 30px; }
        .detail-text { line-height: 1.8; font-size: 1.15rem; color: #222; margin-bottom: 50px; }

        /* Section Promosi / Berita Lainnya */
        .promosi-section { margin-top: 50px; padding-top: 30px; border-top: 2px solid #eee; }
        .promo-card { transition: 0.2s; text-decoration: none !important; color: inherit; }
        .promo-card:hover { transform: translateY(-5px); }
        .promo-img { height: 140px; object-fit: cover; width: 100%; border-radius: 8px; }
        .promo-author { font-size: 0.8rem; color: #0d6efd; font-weight: bold; margin-top: 10px; }
        .promo-headline { font-size: 0.95rem; font-weight: 700; line-height: 1.3; }
    </style>

    <section class="detail-section">
        <div class="container">
            <div class="news-container">
                
                {{-- Tombol Kembali --}}
                <div class="mb-4">
                    <a href="{{ url()->previous() }}" class="text-muted text-decoration-none small">
                        <i class="bi bi-arrow-left"></i> KEMBALI
                    </a>
                </div>

                {{-- Judul & Meta (Tengah) --}}
                <div class="news-header">
                    <h1 class="detail-title">{{ $berita->judul }}</h1>
                    <div class="detail-meta">
                        <span class="meta-author">{{ $berita->penulis }}</span> 
                        <span class="mx-2">|</span>
                        {{-- Menggunakan format tanggal standar jika translatedFormat bermasalah --}}
                        <span>{{ $berita->created_at->format('d M Y H:i') }} WIB</span>
                    </div>
                </div>

                {{-- Gambar Utama --}}
                <div class="detail-image">
                    @if($berita->gambar)
                        <img src="{{ asset('storage/' . $berita->gambar) }}" alt="{{ $berita->judul }}">
                    @else
                        <img src="{{ asset('image/pondok.jpeg') }}" alt="Default Image">
                    @endif
                    <div class="image-caption">Oleh: {{ $berita->penulis }}</div>
                </div>

                {{-- Isi Berita --}}
                <div class="detail-text">
                    {!! nl2br(e($berita->isi)) !!}
                </div>

                {{-- Konten Promosi / Berita Lainnya --}}
                <div class="promosi-section">
                    <div class="mb-4">
                        <h5 class="fw-bold m-0" style="color:#004d00">BERITA LAINNYA</h5>
                    </div>

                    <div class="row g-4">
                        @foreach($beritaLain as $item)
                        <div class="col-6 col-md-4">
                            {{-- DISESUAIKAN: Menggunakan route('berita') sesuai web.php kamu --}}
                            <a href="{{ route('berita', $item->id) }}" class="promo-card d-block">
                                <div class="position-relative">
                                    @if($item->gambar)
                                        <img src="{{ asset('storage/' . $item->gambar) }}" class="promo-img" alt="{{ $item->judul }}">
                                    @else
                                        <img src="{{ asset('image/pondok.jpeg') }}" class="promo-img" alt="Default">
                                    @endif
                                </div>
                                <div class="promo-author">{{ $item->penulis }}</div>
                                <div class="promo-headline">{{ \Illuminate\Support\Str::limit($item->judul, 55) }}</div>
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection