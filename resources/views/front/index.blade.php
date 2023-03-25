@extends('layouts.main')

@section('container')
<section id="hero" class="hero d-flex align-items-center">
    <div class="container">
      <div class="row">
        <div class="col-xl-4">
          <h2 data-aos="fade-up">BI Kpw PURWOKERTO's LIBRARY</h2>
          <blockquote data-aos="fade-up" data-aos-delay="100">
            <p>library managed by Bank Indonesia that provides and manages many book collection of the library that are directly related to the implementation of Bank Indonesia's duties.</p>
          </blockquote>
          @if(session()->has('success'))
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
          @endif
          <div class="d-flex" data-aos="fade-up" data-aos-delay="200">
            <a href="/presence" class="btn-get-started">PRESENCE</a>
            <a href="/login" class="btn-watch-video d-flex align-items-center"><i class="bi bi-box-arrow-in-right"></i>LOGIN</a>
          </div>
          

        </div>
      </div>
    </div>
  </section><!-- End Hero Section -->
@endsection