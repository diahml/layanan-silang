@extends('layout.main')
@extends('partial.link')

@section('container')
 
{{-- <div class="pagetitle border-bottom mt-3 mb-3">
  <h2> <a href="/katalog-buku"  style="color:black; text-decoration:none">Katalog Buku</a> </h2>
</div> --}}


@if ($books->count())
<div class="row justify-content-center pt-5">
    <div class="col-md-6">
        <form action="/katalog-buku">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Cari Judul atau Penulis..." name="search" value="{{ request('search') }}">
                <button class="btn btn-primary" type="submit" id="button-addon2">Cari</button>
              </div>
        </form>
    </div>
</div>

<section id="portfolio" class="portfolio">
<div class="container" data-aos="fade-up">

<div class="portfolio-isotope" data-portfolio-filter="*" data-portfolio-layout="masonry" data-portfolio-sort="original-order">
    <ul class="portfolio-flters" data-aos="fade-up" data-aos-delay="100">
      <li data-filter="*" class="filter-active">All</li>
      @foreach($categories as $category)
      <li data-filter=".{{$category->name}}">{{ $category->name }}</li>           
      @endforeach
    </ul><!-- End Portfolio Filters -->

<div class="row gy-4 portfolio-container" data-aos="fade-up" data-aos-delay="300">
    @foreach ($books as $book)
    <div class="col-sm-6 col-md-6-flex align-items-stretch portfolio-item {{ $book->category->name }}">
          <div class="member-img" >
            @if ($book->image)
            <img src="{{ asset('storage/'.$book->image) }}" alt="$book->book_category->kelas" style="width: 290px; height:360px; display:block;margin-left:auto; margin-right :auto">
        @else
        <img src="https://source.unsplash.com/1200x400/science" class="img-fluid" alt="">
        @endif 
          </div>
          <div class="member-info">
            <h4 class="text-center mt-2">{{ $book->title}} - {{ $book->booknum }}</h4>
            <table class="table">
                <tbody>
                    <tr>
                        <td>Penulis</td>
                        <td>{{ $book->author }}</td>
                    </tr>
                    <tr>
                        <td>Tahun Terbit</td>
                        <td>{{ $book->bookyear }}</td>
                    </tr> 
                    <tr>
                        <td>No Punggung Buku</td>
                        <td>{{ $book->backnum }}</td>
                    </tr> 
                    <tr>
                        <td>No Buku</td>
                        <td>{{ $book->booknum }}</td>
                    </tr>
                    <tr>
                        <td>Kategori</td>
                        <td>
                           {{ $book->category->name }}
                        </td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        @if ($book->stock>=1)
                        <td>Tersedia</td>
                        @else
                        <td style="color: red">Tidak Tersedia</td>
                        @endif
                        
                    </tr>  
                </tbody>
            </table>
          </div>
      </div>
      @endforeach
    </div>
</div>

</div>
</section><!-- End Portfolio Section -->
@else
<p class="text-center">Buku tidak ditemukan</p>
@endif

<div class="d-flex justify-content-center">
    {{ $books->links() }}
</div>

    
@endsection
