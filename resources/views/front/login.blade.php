@extends('layouts.main')

@section('container')
<section id="hero" class="hero d-flex align-items-center">
    <div class="container">
      <div class="row">
        <div class="col-xl-4">
          <h2 data-aos="fade-up ">LOGIN</h2>
          @if(session()->has('loginError'))
             <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('loginError') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
          @endif
          <div class="d-flex mt-4" data-aos="fade-up" data-aos-delay="200">
            <!-- Floating Labels Form -->
              <form method="POST" action="/login" class="row g-3">
                @csrf
                <div class="col-md-12 mb-3">
                  <div class="form-floating">
                    <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" placeholder="internal/external">
                    <label for="email">Email</label>
                    @error('email')
                          <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
                <div class="col-md-12 mb-3">
                    <div class="form-floating">
                      <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="password">
                      <label for="password">password</label>
                      @error('password')
                      <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>
                </div>
                <div class="d-flex flex-row-reverse" data-aos="fade-up" data-aos-delay="200">
                  <a href="/register" class="">WANNA BE A MEMBER OF LIBRARY?</a>
                </div>
                <div class="d-flex" data-aos="fade-up" data-aos-delay="200">
                    <button type="submit" class="btn-get-started">LOGIN</button>
                  </div>
              </form><!-- End floating Labels Form -->
          </div>

        </div>
      </div>
    </div>
  </section><!-- End Hero Section -->
@endsection