@extends('layout.main')
@extends('partial.link')

@section('container')

<div class="pagetitle mt-3 border-bottom">
    <h3>Kategori Buku</h3>
</div>
  <!-- ======= Featured Services Section ======= -->
  <section id="featured-services" class="featured-services">

    <div class="container" data-aos="fade-up">
      <div class="row">
        @foreach ($katalogs as $katalog)
        <div class="col-md-4 mb-3">
          <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
            <div>
              <a href="/katalog-buku/{{ $katalog->kelas }}">
              <img src="https://source.unsplash.com/200x250?{{ $katalog->kelas }}" class="card-img-top" alt="$post->post_category->name">
            </a>
            </div>
            <h5 class="title mt-2 text-center"><a href="/katalog-buku/{{ $katalog->kelas }}">{{ $katalog->kelas }}</a></h5>
            
          </div>
        </div>
        @endforeach
        </div>

      </div>

    </div>
  </section><!-- End Featured Services Section -->
@endsection