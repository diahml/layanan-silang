@extends('layouts.main')

@section('container')
<section id="hero" class="hero d-flex align-items-center">
    <div class="container">
      <div class="row">
        <div class="col-xl-4">
          <h2 data-aos="fade-up ">REGISTER</h2>

          <div class="d-flex mt-4" data-aos="fade-up" data-aos-delay="200">
<!-- Vertical Form -->
<form method="POST" action="/register" class="row g-3" enctype="multipart/form-data">
 @csrf
    <div class="col-md-12 ">
      <label for="name" class="form-label text-light">Name</label>
      <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Type your full name">
      @error('name')
    <div class="invalid-feedback">
      {{ $message }}
    </div>
    @enderror
    </div>
    <div class="col-md-12 ">
      <label for="email" class="form-label text-light">Email</label>
      <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Use your valid email or daily usage email">
      @error('email')
    <div class="invalid-feedback">
      {{ $message }}
    </div>
    @enderror
    </div>
    <div class="col-md-12 ">
        <label for="address" class="form-label text-light">Address</label>
        <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" placeholder="Your currently stayed in">
        @error('address')
    <div class="invalid-feedback">
      {{ $message }}
    </div>
    @enderror
      </div>
      <div class="col-md-12 ">
        <input type="hidden" class="form-control" id="password" name="password">
        <input type="hidden" class="form-control" id="is_admin" name="is_admin">
      </div>
    <div class="col-md-12 ">
        <label for="commissariat" class="form-label text-light">Commissariat</label>
        <select id="commissariat" name="commissariat" class="form-select">
          <option selected hidden>Choose...</option>
          <option value="Universitas Jenderal Soedirman">Universitas Jenderal Soedirman</option>
          <option value="Universitas Muhammadiyah Purwokerto">Universitas Muhammadiyah Purwokerto</option>
          <option value="UIN Saizu Purwokerto">UIN Saizu Purwokerto</option>
        </select>
    </div>
    <div class="col-md-12">
        <label for="phone" class="form-label text-light">Phone</label>
        <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" placeholder="type 62 instead of 0 (e.g. 6289624546570)">
        @error('phone')
    <div class="invalid-feedback">
      {{ $message }}
    </div>
    @enderror
    </div>

    <div class="col-md-12">
      <label for="idcard" class="form-label text-light">ID Card [ KTM/KTP ]</label>
      <div class="col-sm-12">
        <img class="img-preview img-fluid mb-3 col-sm-5">
        <input class="form-control @error('idcard') is-invalid @enderror" type="file" id="idcard" name="idcard" onchange="previewImage()">
        @error('idcard')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
        </div>
      </div>
    
    <div class="text-center">
      <button type="submit" class="btn-get-started">REGISTER</button>
    </div>
  </form><!-- Vertical Form -->
</div>

</div>
</div>
</div>
</section><!-- End Hero Section -->
<script>
  function previewImage(){
    const image = document.querySelector('#idcard');
    const imgPreview = document.querySelector('.img-preview');
    imgPreview.style.display ='block';

    const oFReader = new FileReader();
    oFReader.readAsDataURL(image.files[0]);

    oFReader.onload = function(oFReader){
      imgPreview.src = oFReader.target.result;
    }
  }
</script>
  @endsection