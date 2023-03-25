@extends('layouts.main')

@section('container')
<section id="hero" class="hero d-flex align-items-center">
    <div class="container">
      <div class="row">
        <div class="col-xl-4">
          <h2 data-aos="fade-up ">PRESENCE</h2>

          <div class="d-flex mt-4" data-aos="fade-up" data-aos-delay="200">
            <!-- Floating Labels Form -->
              <form method="POST" action="/presence" class="row g-3">
                @csrf
                <div class="col-md-12 mb-3">
                  <div class="form-floating mb-3">
                    <select class="form-select  @error('status') is-invalid @enderror" id="status" name="status" value="{{ old('status') }}">
                      <option selected hidden>Choose</option>
                      <option value="Anggota">Anggota</option>
                      <option value="Pengunjung">Pengunjung</option>
                    </select>
                    <label for="status">Status</label>
                  </div>
                  @error('status')
                          <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>  
                <div class="col-md-12 mb-3">
                    <div class="form-floating">
                      <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" placeholder="fullname">
                      <label for="name">Name</label>
                      @error('name')
                      <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>
                </div>
                <div class="col-md-12 mb-3">
                    <div class="form-floating">
                      <input type="text" class="form-control @error('institution') is-invalid @enderror" id="institution" name="institution" value="{{ old('institution') }}" placeholder="your institution">
                      <label for="institution">Institution</label>
                      @error('institution')
                          <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>
                </div>
                <div class="col-md-12 mb-3">
                    <div class="form-floating">
                      <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone') }}" placeholder="your phone number">
                      <label for="phone">Phone</label>
                      @error('phone')
                      <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>
                </div>
                <div class="d-flex" data-aos="fade-up" data-aos-delay="200">
                    <button type="submit" class="btn-get-started">PRESENCE</button>
                  </div>
              </form><!-- End floating Labels Form -->
          </div>

        </div>
      </div>
    </div>
  </section><!-- End Hero Section -->
@endsection