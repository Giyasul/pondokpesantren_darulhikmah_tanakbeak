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
.about-section {
  margin-top: 20px;   
  padding-top: 10px;  
}
.about-image {
  position: relative;
  border-radius: 22px;
  overflow: hidden;
  box-shadow:
    0 0 0 1px rgba(255,255,255,.25),
    0 0 18px rgba(255,255,255,.25),
    0 0 32px rgba(20,209,199,.35),
    0 20px 45px rgba(0,0,0,.75);
}
.about-image img {
  width: 100%;
  height: 100%;
  object-fit: cover;
}
.about-title {
  font-size: 2.4rem;
  font-weight: 800;
}
.about-title span {
  color: #14D1C7;
}
.about-text {
  color: rgba(255,255,255,.75);
  line-height: 1.7;
}
.about-list i {
  color: #14D1C7;
  margin-right: 8px;
}
.reveal {
  opacity: 0;
  transform: translateY(50px);
  transition: opacity .8s ease, transform .8s ease;
}
.reveal.show {
  opacity: 1;
  transform: translateY(0);
}
.delay-1 { transition-delay: .15s }
.delay-2 { transition-delay: .3s }
.delay-3 { transition-delay: .45s }
.about-btn {
  border-radius: 10px;
  font-weight: 600;
  letter-spacing: .3px;
  color: #14D1C7;
  border: 1px solid rgba(20,209,199,.65);
  background: transparent;
  transition: all .3s ease;
  box-shadow:
    0 0 0 rgba(20,209,199,0);
}
.about-btn:hover {
  background: rgba(20,209,199,.15);
  color: #14D1C7;
  transform: translateY(-2px) scale(1.03);
  box-shadow:
    0 0 10px rgba(20,209,199,.45),
    0 0 22px rgba(20,209,199,.35),
    0 10px 28px rgba(0,0,0,.6);
}
.sambutan-section {
  margin-top: 20px;
  margin-bottom: 150px;
}
.sambutan-card {
  background: rgba(34, 46, 53, 0.88);
  border-radius: 15px;
  padding: 28px 30px;
  color: #fff;
  box-shadow:
    0 0 0 1px rgba(255,255,255,.2),
    0 0 18px rgba(20,209,199,.25),
    0 18px 40px rgba(0,0,0,.65);
  border-left: 4px solid #14D1C7;
}
.sambutan-card h4 {
  color: #ffffff;
}
.sambutan-card small {
  color: rgba(255,255,255,.6) !important;
}
.sambutan-image {
  height: 400px;
  position: relative;
  border-radius: 22px;
  overflow: hidden;
  box-shadow:
    0 0 0 1px rgba(255,255,255,.25),
    0 0 18px rgba(255,255,255,.25),
    0 0 32px rgba(20,209,199,.35),
    0 20px 45px rgba(0,0,0,.75);
}
.sambutan-image img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  object-position: top; 
}
.article-section {
  background-color: #182126; 
  padding: 70px 0 80px;
  box-shadow:
    inset 0 8px 30px rgba(0,0,0,.7),
    inset 0 -8px 30px rgba(0,0,0,.7);
}
.article-title {
  font-size: 2.3rem;
  font-weight: 800;
  color: #ffffff;
}
.article-title span {
  color: #14D1C7;
}
.article-card {
  background: rgba(34, 46, 53, 0.9);
  border-radius: 16px;
  overflow: hidden;
  color: #fff;
  box-shadow:
    0 0 0 1px rgba(255,255,255,.18),
    0 0 18px rgba(20,209,199,.25),
    0 18px 40px rgba(0,0,0,.65);
  transition: transform .3s ease, box-shadow .3s ease;
}
.article-card:hover {
  transform: translateY(-6px);
  box-shadow:
    0 0 22px rgba(20,209,199,.45),
    0 22px 45px rgba(0,0,0,.75);
}
.article-card img {
    height: 220px;
    width: 100%;
    object-fit: cover;
}
.article-card h6 {
  font-weight: 700;
}
.article-card p {
  color: rgba(255,255,255,.75);
  font-size: .95rem;
  flex-grow: 1;
}
section {
  margin-top: 80px;
  margin-bottom: 80px;
}
.map-stat-section {
  background-color: #182126; 
  padding: 80px 0 120px;
  box-shadow:
    inset 0 8px 30px rgba(0,0,0,.7),
    inset 0 -8px 30px rgba(0,0,0,.7);
}
.section-title {
  color: #fff;
  font-weight: 700;
  letter-spacing: .3px;
}
.map-wrapper {
  height: 100%;
  min-height: 360px;
  border-radius: 16px;
  overflow: hidden;
  background: #222;
}
.map-wrapper iframe {
  width: 100%;
  height: 100%;
  border: 0;
}
.shadow-soft {
  box-shadow:
    0 0 0 1px rgba(255,255,255,.15),
    0 0 20px rgba(20,209,199,.25),
    0 20px 40px rgba(0,0,0,.7);
}
.stat-card {
  display: flex;
  align-items: center;
  gap: 16px;
  background: rgba(255,255,255,.05);
  border-radius: 14px;
  padding: 20px;
  color: #fff;
  box-shadow:
    0 0 0 1px rgba(20,209,199,.35),
    0 0 14px rgba(20,209,199,.35),
    0 18px 36px rgba(0,0,0,.75);
  transition: transform .3s ease;
}
.stat-card:hover {
  transform: translateY(-6px) scale(1.02);
  box-shadow:
    0 0 0 1px rgba(20,209,199,.55),
    0 0 22px rgba(20,209,199,.55),
    0 26px 50px rgba(0,0,0,.85);
}
.stat-icon {
  width: 56px;
  height: 56px;
  border-radius: 12px;
  display: flex;
  align-items: center;
  justify-content: center;
  color: #fff;
  font-size: 24px;  
}
.stat-card h3 {
  color: #14D1C7;
}
.stat-card small {
  color: rgba(255,255,255,.6);
}
.reveal-map {
  opacity: 0;
  transform: translateX(-60px) scale(.98);
  transition: all .9s ease;
}
.reveal-stat {
  opacity: 0;
  transform: translateX(60px) scale(.98);
  transition: all .9s ease;
}
.reveal-map.show,
.reveal-stat.show {
  opacity: 1;
  transform: translateX(0) scale(1);
}
@media (max-width: 768px) {
  .reveal-map,
  .reveal-stat {
    transform: translateY(40px); 
  }
  .reveal-map.show,
  .reveal-stat.show {
    transform: translateY(0);
  }
   .map-wrapper {
    height: 300px;
    min-height: 300px;
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

<section class="sambutan-section">
  <div class="container">
    <div class="row align-items-center g-5 reveal">
      <div class="col-lg-4">
        <div class="sambutan-image">
          <img src="{{ asset('image/pondok1.jpeg') }}" alt="Pimpinan Ponpes Darul Hikmah">
        </div>
      </div>
      <div class="col-lg-8">
        <div class="sambutan-card">
          <h4 class="fw-bold mb-1">Sambutan Pimpinan</h4>
          <small class="text-muted d-block mb-3">
            Kepala Yayasan Pondok Pesantren Darul Hikmah
          </small>
          <p class="about-text">
            Assalamu’alaikum warahmatullahi wabarakatuh.
          </p>
          <p class="about-text">
            Puji syukur kehadirat Allah SWT atas limpahan rahmat dan karunia-Nya.
            Pondok Pesantren Darul Hikmah hadir sebagai lembaga pendidikan Islam
            terpadu yang berkomitmen mencetak generasi berakhlakul karimah,
            berilmu, dan mandiri.
          </p>
          <p class="about-text mb-3">
            Melalui integrasi kurikulum pesantren dan pendidikan nasional,
            kami berupaya membentuk santri yang unggul dalam ilmu,
            kuat dalam iman, dan siap menghadapi tantangan zaman.
          </p>
          <p class="fw-semibold mb-0">
            — Nama Pimpinan
          </p>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="article-section mt-5">
  <div class="container">
    <div class="text-center mb-5 reveal">
      <h2 class="article-title">
        Artikel & <span>Berita Pesantren</span>
      </h2>
      <p class="about-text mt-2">
        Informasi dan kegiatan terbaru Pondok Pesantren Darul Hikmah
      </p>
    </div>
    <div class="row g-5 justify-content-center">
      <!-- CARD 1 -->
      <div class="col-lg-4 col-md-6 reveal delay-1">
        <div class="article-card">
          <img src="{{ asset('image/pondok1.jpeg') }}" alt="Berita">
          <div class="p-4">
            <h6>Kegiatan Santri Bulan Ramadhan</h6>
            <p class="mt-2">
              Berbagai kegiatan keislaman dan pembinaan karakter santri
              selama bulan suci Ramadhan.
            </p>
            <a href="#" class="btn btn-outline-info btn-sm mt-2">
              Baca Selengkapnya
            </a>
          </div>
        </div>
      </div>
      <!-- CARD 2 -->
      <div class="col-lg-4 col-md-6 reveal delay-2">
        <div class="article-card">
          <img src="{{ asset('image/pondok2.jpeg') }}" alt="Berita">
          <div class="p-4">
            <h6>Penerimaan Santri Baru 2026</h6>
            <p class="mt-2">
              Informasi resmi pendaftaran santri baru tahun ajaran
              2026/2027 pondok pesantren Darul Hikmah.
            </p>
            <a href="#" class="btn btn-outline-info btn-sm mt-2">
              Baca Selengkapnya
            </a>
          </div>
        </div>
      </div>
      <!-- CARD 3 -->
      <div class="col-lg-4 col-md-6 reveal delay-3">
        <div class="article-card">
          <img src="{{ asset('image/pondok.jpeg') }}" alt="Berita">
          <div class="p-4">
            <h6>Prestasi Santri Darul Hikmah</h6>
            <p class="mt-2">
              Santri Darul Hikmah meraih prestasi di berbagai bidang
              akademik dan non-akademik.
            </p>
            <a href="#" class="btn btn-outline-info btn-sm mt-2">
              Baca Selengkapnya
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
 
<div class="container mt-5 mb-0">
    <h1 class="text-center fw-bold">TENTANG KAMI</h1>
  </div>
  <section class="about-section">
  <div class="container">
    <div class="row align-items-start g-5">
      <div class="col-lg-6 reveal">
        <div class="about-image">
          <img src="{{ asset('image/pondok.jpeg') }}" alt="Pondok Pesantren">
        </div>
      </div>
      <div class="col-lg-6">
        <h2 class="about-title reveal delay-2">
          Pondok Pesantren <br>
          <span>Darul Hikmah Tanak Beak</span>
        </h2>
        <p class="about-text mt-3 reveal delay-3">
          Pondok Pesantren Darul Hikmah Tanak Beak adalah lembaga pendidikan Islam
          yang berkomitmen membina generasi Qur'ani, berakhlakul karimah,
          berilmu, dan mandiri melalui sistem pendidikan terpadu pesantren
          dan pendidikan formal.
        </p>
        <ul class="list-unstyled about-list mt-4 reveal delay-3">
          <li class="mb-2"><i class="bi bi-check-circle"></i> Pendidikan berbasis nilai Islam</li>
          <li class="mb-2"><i class="bi bi-check-circle"></i> Pembinaan akhlak & karakter santri</li>
          <li class="mb-2"><i class="bi bi-check-circle"></i> Lingkungan aman & kondusif</li>
        </ul>
        <a href="#" 
          class="btn btn-outline-info mt-2 px-4 py-2 reveal delay-3 about-btn">
            Selengkapnya
          <i class="bi bi-arrow-right ms-2"></i>
        </a>
      </div>
    </div>
  </div>
</section>

<section class="map-stat-section">
  <div class="container">
    <div class="row g-4 align-items-stretch">
      <div class="col-lg-7 reveal reveal-map">
        <h5 class="section-title mb-3">Peta Lokasi</h5>
        <hr>
        <div class="map-wrapper shadow-soft">
          <iframe 
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3944.8471989072054!2d116.1890462744468!3d-8.610665187471678!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dcdb8f8c5efbd9b%3A0xdc79eab95cb0b5a9!2sPonpes%20Darul%20Hikmah%20NW%20Tanak%20Beak%20Narmada!5e0!3m2!1sid!2sid!4v1769839147274"
            allowfullscreen
            loading="lazy">
          </iframe>
        </div>
      </div>
      <div class="col-lg-5 reveal reveal-stat">
        <h5 class="section-title mb-3">Statistik Ringkas</h5>
        <hr>
        <div class="stat-card mb-4 reveal delay-1">
          <div class="stat-icon bg-info">
            <i class="bi bi-people-fill"></i>
          </div>
          <div>
            <h6 class="mb-1">Jumlah Santri Aktif</h6>
            <h3 class="fw-bold mb-0">320</h3>
            <small>Tahun Ajaran 2025 / 2026</small>
          </div>
        </div>
        <div class="stat-card mb-4 reveal delay-2">
          <div class="stat-icon bg-success">
            <i class="bi bi-mortarboard-fill"></i>
          </div>
          <div>
            <h6 class="mb-1">Jumlah Alumni</h6>
            <h3 class="fw-bold mb-0">1.240</h3>
            <small>Hingga Tahun Ini</small>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<script>
const revealEls = document.querySelectorAll('.reveal');
const revealObserver = new IntersectionObserver((entries) => {
  entries.forEach(entry => {
    if (entry.isIntersecting) {
      entry.target.classList.add('show');
    }
  });
}, { threshold: 0.2 });
revealEls.forEach(el => revealObserver.observe(el));
</script>

@endsection