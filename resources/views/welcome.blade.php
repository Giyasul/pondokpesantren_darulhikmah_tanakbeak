@extends('layout.layout')
@section('judul', 'Selamat Datang di Pondok Pesantren Darul Hikmah')
@section('konten')

<style>
    .card-section {
    top: -100px;
    position: relative;
    z-index: 5;
}
.feature-card {
    position: relative;
    background: rgba(34, 46, 53, 0.88);
    border-radius: 16px;
    backdrop-filter: blur(4px);
    padding: 28px 18px;
    text-align: center;
    color: #fff;
    cursor: pointer;
    box-shadow:
        0 0 0 1px rgba(255, 255, 255, 0.25),
        0 0 12px 4px rgba(255,255,255,0.18),
        0 14px 30px rgba(0,0,0,0.55);       
    transition: transform .25s ease, box-shadow .25s ease;
}
.feature-card:hover {
    transform: scale(1.07);
    box-shadow:
        0 0 18px 6px rgba(255,255,255,0.25),
        0 20px 40px rgba(0,0,0,0.65);
}
.feature-card .icon {
    font-size: 32px;
    margin-bottom: 10px;
    color: #ffffff;
    transition: color .25s ease;
}
.feature-card:hover .icon {
    color: #14D1C7; 
}
.feature-card h6 {
    color: #ffffff;
    transition: color .25s ease;
}
.feature-card:hover h6 {
    color: #14D1C7; 
}
  .carousel-item img {
    height: 600px;
    object-fit: cover;
    object-position: center;
    background-color: #ffffff;
  }
  .carousel-item::after {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(to bottom, rgba(0,0,0,0.2) 0%, rgba(0,0,0,0.6) 100%);
    z-index: 1;
  }
  .carousel-caption {
    z-index: 2;
    bottom: 15%; 
    padding: 60px;
    
  }
  .carousel-caption h5 {
    font-weight: 700;
    font-size: 3rem;
    text-shadow:  
        0 0 6px rgba(255,255,255,0.45),
        0 0 14px rgba(20,209,199,0.35),
        2px 2px 10px rgba(0,0,0,0.85);
  }
   .carousel-caption p {
    font-weight: 500;
    font-size: 1.1rem;
    text-shadow: 
        0 0 6px rgba(255,255,255,0.45),
        0 0 14px rgba(20,209,199,0.35),
        2px 2px 10px rgba(0,0,0,0.85);
  }
.carousel-control-prev,
.carousel-control-next {
    width: 100px;
}
.carousel-control-prev-icon,
.carousel-control-next-icon {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    background-size: 20px;
    background-color: rgba(34,46,53,0.85);
    backdrop-filter: blur(6px);
    box-shadow:
        0 0 8px rgba(255,255,255,0.35),
        0 0 18px rgba(20,209,199,0.35),
        0 10px 28px rgba(0,0,0,0.65);
    transition: all .3s ease;
}
.carousel-control-prev-icon:hover,
.carousel-control-next-icon:hover {
    background-color: rgba(20,209,199,0.95);
    box-shadow:
        0 0 12px rgba(255,255,255,0.6),
        0 0 26px rgba(20,209,199,0.65),
        0 14px 36px rgba(0,0,0,0.75);
    transform: scale(1.08);
}
   @media (max-width: 768px) {
    .carousel-item img { height: 400px;}
     .carousel-caption h5 {
        font-size: 1.4rem;
        line-height: 1.25;
        margin-bottom: 6px;
    }
        .carousel-caption p {
        display: none;
    }
  }
.float-card {
  opacity: 1;
  transform: translateY(60px);
  animation: floatIn .9s ease forwards;
}
.delay-1 { animation-delay: .2s; }
.delay-2 { animation-delay: .4s; }
.delay-3 { animation-delay: .6s; }
@keyframes floatIn {
  from {
    transform: translateY(60px);
  }
  to {
    transform: translateY(0);
  }
}

</style>

<div id="carouselExampleCaptions" class="carousel slide " data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active" data-bs-interval="4000">
      <img src="{{ asset('image/pondok.jpeg') }}" class="d-block w-100" alt="Slide 1">
      <div class="carousel-caption ">
        <h5>Selamat Datang di Darul Hikmah NWDI</h5>
        <p>Membentuk generasi unggul yang berakhlakul karimah dan cerdas mandiri</p>
      </div>
    </div>
    <div class="carousel-item" data-bs-interval="4000">
      <img src="{{ asset('image/pondok1.jpeg') }}" class="d-block w-100" alt="Slide 2">
      <div class="carousel-caption ">
        <h5>Pendidikan Berkualitas</h5>
        <p>Integrasi kurikulum pesantren dan nasional</p>
      </div>
    </div>
    <div class="carousel-item" data-bs-interval="4000">
      <img src="{{ asset('image/pondok2.jpeg') }}" class="d-block w-100" alt="Slide 2">
      <div class="carousel-caption ">
        <h5>Mencetak Generasi Berdaya Saing</h5>
        <p>Perpaduan nilai keislaman dan kompetensi untuk masa depan gemilang</p>
      </div>
    </div>
  </div>

  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon"></span>
  </button>
</div>
<div class="container card-section">
  <div class="row g-5 justify-content-center">
    <div class="col-lg-3 col-md-4 col-10 float-card delay-1">
      <div class="feature-card ">
    <div class="icon">
        <i class="bi bi-book"></i>
    </div>
    <h6>Pendidikan</h6>
</div>
    </div>
    <div class="col-lg-3 col-md-4 col-10 float-card delay-2">
      <div class="feature-card ">
    <div class="icon">
        <i class="bi-moon"></i>
    </div>
    <h6>Kegiatan</h6>
</div>
    </div>
    <div class="col-lg-3 col-md-4 col-10 float-card delay-3">
      <div class="feature-card ">
    <div class="icon">
        <i class="bi-building"></i>
    </div>
    <h6>Asrama</h6>
</div>
    </div>
  </div>
</div>

  <div class="container">
    <h1 class="text-center fw-bold">TENTANG KAMI</h1>
  </div>
  
@endsection