@extends('layout.main')
@extends('partial.link')

@section('container')
@if(session()->has('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
@endif
<section id="hero" class="d-flex align-items-center">
    <div class="containers" data-aos="zoom-out" data-aos-delay="100">
      <h1>Selamat Datang di <br><span>Perpustakaan Bank Indonesia</span></h1>
      <h2>Kantor Perwakilan Purwokerto</h2>
    </div>
</section><!-- End Hero -->

    <!-- ======= Featured Services Section ======= -->
    <section id="featured-services" class="featured-services">
        <div class="container" data-aos="fade-up">
            <h2>Layanan Perpustakaan</h2>
  
          <div class="row">
            <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
              <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
                <div class="icon"><i class="bi bi-1-circle"></i></div>
                <h4 class="title">Layanan Baca</h4>
                {{-- <p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi</p> --}}
              </div>
            </div>
  
            <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
              <div class="icon-box" data-aos="fade-up" data-aos-delay="200">
                <div class="icon"><i class="bi bi-2-circle"></i></div>
                <h4 class="title">Layanan Kids Corner</h4>
                {{-- <p class="description">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore</p> --}}
              </div>
            </div>

            <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                <div class="icon-box" data-aos="fade-up" data-aos-delay="200">
                  <div class="icon"><i class="bi bi-3-circle"></i></div>
                  <h4 class="title">Layanan Pemustaka</h4>
                  {{-- <p class="description">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore</p> --}}
                </div>
              </div>
  
            <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
              <div class="icon-box" data-aos="fade-up" data-aos-delay="300">
                <div class="icon"><i class="bi bi-4-circle"></i></div>
                <h4 class="title">Layanan Silang</h4>
                {{-- <p class="description">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia</p> --}}
              </div>
            </div>
  
            <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
              <div class="icon-box" data-aos="fade-up" data-aos-delay="400">
                <div class="icon"><i class="bi bi-5-circle"></i></div>
                <h4 class="title">Layanan CLick and Read</h4>
                {{-- <p class="description">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis</p> --}}
              </div>
            </div>

            <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                <div class="icon-box" data-aos="fade-up" data-aos-delay="400">
                  <div class="icon"><i class="bi bi-6-circle"></i></div>
                  <h4 class="title">Layanan IBI Library</h4>
                  {{-- <p class="description">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis</p> --}}
                </div>
              </div>

              <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                <div class="icon-box" data-aos="fade-up" data-aos-delay="400">
                  <div class="icon"><i class="bi bi-7-circle"></i></div>
                  <h4 class="title">Layanan Referensi</h4>
                  {{-- <p class="description">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis</p> --}}
                </div>
              </div>

              <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                <div class="icon-box" data-aos="fade-up" data-aos-delay="400">
                  <div class="icon"><i class="bi bi-8-circle"></i></div>
                  <h4 class="title">Layanan Sirkulasi</h4>
                  {{-- <p class="description">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis</p> --}}
                </div>
              </div>
  
          </div>
  
        </div>
      </section><!-- End Featured Services Section -->

       <!-- ======= About Section ======= -->
    <section id="about" class="about section-bg">
        <div class="container" data-aos="fade-up">
        
          <div class="section-title">
            <h2>About</h2>
            <h3><span>Perpustakaan Bank Indonesia</span></h3>
            <p>adalah perpustakaan khusus yang dikelola oleh Bank Indonesia yang menyediakan serta mengelola koleksi perpustakaan yang berkaitan langsung dengan pelaksanaan tugas Bank Indonesia.</p>
          </div>
  
          <div class="row">
            <div class="col-lg-6" data-aos="fade-right" data-aos-delay="100">
              <img src="/assets/img/perpus.jpg" class="img-fluid" alt="">
            </div>
            <div class="col-lg-6 pt-4 pt-lg-0 content d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="100">
                <h3 class="text-center">VISI </h3>
                <p class="text-center">
                 Mendukung kebijakan Bank Indonesia yang efektif dan peningkatan kualitas sumber daya manusia melalui pengelolaan perpustakaan yang profesional, kelengkapan koleksi perpustakaan sesuai kebutuhan riset dan pelayanan prima.
                </p>
            {{-- </div>
            <div class="col-lg-6 pt-4 pt-lg-0 content d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="100"> --}}
                <h3 class="text-center">MISI </h3>
                <p class="text-center">
                Mengelola referensi literatur untuk kegiatan riset dan penelitian dalam mendukung pelaksanaan tugas Bank Indonesia di bidang lain terkait peningkatan kompetensi sumber daya manusia.
                </p>
            </div>
          </div>
  
        </div>
      </section><!-- End About Section -->
@endsection


