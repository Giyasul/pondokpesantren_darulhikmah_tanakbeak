@extends('layout.layout')
@section('judul', 'Galeri Foto - Pondok Pesantren Darul Hikmah')
@section('konten')

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css" />

    <style>
        /* 1. Background Hijau Muda */
        html, body { 
            background-color: #f1f8f1; 
            overflow-x: hidden; 
        }

        /* 2. Hero Section / Carousel */
        .hero-carousel .carousel-item { height: 400px; background-color: #000; }
        .carousel-image-container { position: relative; width: 100%; height: 100%; }
        .carousel-image-container img { 
            width: 100%; height: 100%; object-fit: cover; opacity: 0.45; 
        }
        .carousel-overlay {
            position: absolute; top: 0; left: 0; width: 100%; height: 100%;
            display: flex; flex-direction: column; justify-content: center; align-items: center;
            background: rgba(0, 0, 0, 0.4);
            text-align: center;
        }
        .carousel-overlay h1 {
            font-weight: 800; font-size: clamp(2.5rem, 6vw, 4rem); color: #ffffff;
            text-transform: uppercase; letter-spacing: 2px; margin: 0;
            text-shadow: 2px 2px 15px rgba(0,0,0,0.5);
        }

        /* 3. Garis Emas List Dibawah Carousel */
        .gold-separator {
            width: 100%;
            height: 6px;
            background: linear-gradient(90deg, #b8860b 0%, #d4af37 50%, #b8860b 100%);
            box-shadow: 0 3px 10px rgba(0,0,0,0.15);
            position: relative;
            z-index: 10;
        }

        /* 4. Main Wrapper */
        .main-gallery-wrapper {
            margin-top: 60px; 
            padding-bottom: 100px;
        }

        /* 5. Box Putih (Gallery Container) */
        .gallery-card-container {
            background: #ffffff;
            border-radius: 20px;
            padding: 50px 40px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.03);
            border: 1px solid rgba(13, 107, 13, 0.1);
        }

        /* 6. Section Title - Jarak Rapat */
        .section-header { 
            text-align: center; 
            margin-bottom: 25px; /* Jarak rapat ke card */
        }
        .section-title {
            font-weight: 800; color: #0D6B0D; font-size: 1.8rem;
            text-transform: uppercase; display: inline-block; position: relative;
            padding-bottom: 10px;
        }
        .section-title::after {
            content: ""; position: absolute; left: 20%; bottom: 0;
            width: 60%; height: 4px; background: #D4AF37; border-radius: 2px;
        }

        /* 7. Card Style dengan Shadow Tipis & Zoom */
        .folder-card {
            background: #fff; 
            border-radius: 15px; 
            overflow: hidden;
            cursor: pointer; 
            transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
            border: 1px solid rgba(0,0,0,0.03); 
            height: 100%;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05); /* Shadow Tipis */
        }
        .folder-card:hover { 
            transform: translateY(-8px); 
            box-shadow: 0 12px 25px rgba(0, 0, 0, 0.1); /* Shadow Tebal saat Hover */
        }
        .folder-cover-wrapper { 
            width: 100%; aspect-ratio: 1/1; overflow: hidden; background: #f8f8f8; 
        }
        .folder-cover { 
            width: 100%; height: 100%; object-fit: cover; 
            transition: transform 0.6s ease; 
        }
        .folder-card:hover .folder-cover { transform: scale(1.12); }

        .folder-info { padding: 20px; text-align: center; }
        .folder-name { font-weight: 700; color: #333; margin: 0; font-size: 1.1rem; }
        .photo-count { 
            font-size: 0.85rem; color: #777; margin-top: 8px; display: inline-block;
            background: #f1f8f1; padding: 3px 12px; border-radius: 15px;
        }

        /* 8. Kustomisasi Pagination */
        .pagination-wrapper .pagination { gap: 5px; }
        .pagination-wrapper .page-link {
            color: #0D6B0D; border-radius: 8px; border: 1px solid #dee2e6;
            padding: 8px 16px; transition: 0.3s;
        }
        .pagination-wrapper .page-item.active .page-link {
            background-color: #0D6B0D; border-color: #0D6B0D; color: #fff;
        }
        .pagination-wrapper .page-link:hover {
            background-color: #f1f8f1; color: #0D6B0D; border-color: #D4AF37;
        }

        /* Reveal Animation */
        .reveal { opacity: 0; transform: translateY(30px); transition: all .8s ease; }
        .reveal.show { opacity: 1; transform: translateY(0); }
    </style>

    {{-- Banner --}}
    <div class="carousel slide hero-carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="carousel-image-container">
                    <img src="{{ asset('image/pondok.jpeg') }}" alt="Banner">
                    <div class="carousel-overlay">
                        <div class="reveal">
                            <h1>Galeri Foto</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="gold-separator"></div>

    {{-- Content --}}
    <div class="container main-gallery-wrapper">
        <div class="gallery-card-container reveal">
            <div class="section-header">
                <h2 class="section-title">KOLEKSI ALBUM</h2>
            </div>

            <div class="row g-4 justify-content-center">
                @forelse($galeri as $item)
                    @php
                        $images = is_array($item->gambar) ? $item->gambar : json_decode($item->gambar, true);
                        $cover = !empty($images) ? $images[0] : 'image/pondok.jpeg';
                    @endphp
                    
                    <div class="col-6 col-md-4 col-lg-3">
                        <div class="folder-card" onclick="openGallery('{{ $item->id }}')">
                            <div class="folder-cover-wrapper">
                                <img src="{{ asset('storage/' . $cover) }}" class="folder-cover">
                            </div>
                            <div class="folder-info">
                                <h5 class="folder-name">{{ $item->folder }}</h5>
                                <span class="photo-count">
                                    <i class="bi bi-images me-1"></i> {{ count($images) }} Foto
                                </span>
                            </div>
                        </div>

                        {{-- Hidden Links Fancybox --}}
                        <div id="gallery-{{ $item->id }}" style="display:none;">
                            @foreach($images as $img)
                                <a href="{{ asset('storage/' . $img) }}" 
                                   data-fancybox="album-{{ $item->id }}" 
                                   data-caption="Album: {{ $item->folder }}">
                                </a>
                            @endforeach
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center py-5">
                        <p class="text-muted">Album belum tersedia.</p>
                    </div>
                @endforelse
            </div>

            <div class="d-flex justify-content-center mt-5 pagination-wrapper">
                {{ $galeri->links('pagination::bootstrap-5') }}
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
    <script>
        function openGallery(id) {
            const firstLink = document.querySelector(`[data-fancybox="album-${id}"]`);
            if (firstLink) { firstLink.click(); }
        }

        document.addEventListener('DOMContentLoaded', function() {
            Fancybox.bind("[data-fancybox]", { infinite: true });

            const observer = new IntersectionObserver(entries => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) entry.target.classList.add('show');
                });
            }, { threshold: 0.1 });
            document.querySelectorAll('.reveal').forEach(el => observer.observe(el));
        });
    </script>

@endsection