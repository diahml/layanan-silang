@extends('layouts.inner')
@section('containers')
@if(session()->has('success'))
  <div class="alert alert-success " role="alert">
        {{ session('success') }}
  </div>
@endif
  <div class="pagetitle">
    <h1>Front Page</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active">Welcome, {{ auth()->user()->name }}</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

@foreach($borrows as $borrow)
          @if(!isset($borrow->book->id)|| !($borrow->book->cover))
          <div class="card mb-3" style="background-image: url(https://picsum.photos/400/200); height:300px; background-size: cover; background-position: center;">
            <div class="row g-0 message-block">
              <h5 class="card-title text-dark ">Most Popular</h5>
              <h5 class="card-title p-0">{{ $book->title }}</h5>
              <h6>By {{ $book->author }}</h6>
            </div>
          </div>
          @else
          <div class="card mb-3" style="background-image: url({{ asset('storage/'. $borrow->book->cover) }}); height:300px; background-size: cover; background-position: center;">
            <div class="row g-0 message-block">
              <h5 class="card-title text-dark ">Most Popular</h5>
              <h5 class="card-title p-0">{{ $borrow->book->title }}</h5>
              <h6>By {{ $borrow->book->author }}</h6>
            </div>
          </div>
          @endif
@endforeach
<!-- Card with an image on left -->
<div class="card mb-3">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="https://picsum.photos/400/200" class="img-fluid rounded-start" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        @if(\Carbon\Carbon::today()->format('d') % 1 == 0 ) 
        <h5 class="card-title">Good Friends, good books and a sleepy conscience this ideal life </h5>
        <p class="card-text">- Mark Twain</p>
        @elseif(\Carbon\Carbon::today()->format('d') % 2 == 0 ) 
        <h5 class="card-title">To read is to empower, To empower is to write, To write is influence, To influence is to change, To change is to live</h5>
        <p class="card-text"> - Jane Evershed</p>
        @else
        <h5 class="card-title">Libraries will get you through times of no money better than money will get you through time of no libraries </h5>
        <p class="card-text">- Anne Herbert</p>
        @endif
      </div>
    </div>
  </div>
</div><!-- End Card with an image on left -->


<div class="card mb-3">
  <div class="row g-0">
    
  <div class="container border p-md-3 ">   
    <div class="pagetitle">
      <h1>Catalogue</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Frontpage</a></li>
          <li class="breadcrumb-item active">List of Books</li>
        </ol>
      </nav>
      <hr class="hr" />
    </div><!-- End Page Title -->
        <div class="m-3 inputs">
          <input type="text" id="myFilter" class="form-control" onkeyup="myFunction()" placeholder="Search for book's title">
        </div>

        <div class="row g-1 g-md-3" id="myItems">
          @foreach ($books as $book)    

         <div class="col-5 col-md-2 card m-3">
          <div class="position-absolute bg-dark px-3 py-2" style="background-color: rgba(0,0,0,0.3)"><a class="text-white text-decoration-none">{{ $book->category->name }}</a></div>
            @if($book->cover)
            <img src="{{ asset('storage/'. $book->image) }}" alt="{{ $book->category->name }}" class="img-fluid" style="width: 20rem; height: 16rem;">
            @else
            <img src="https://picsum.photos/500/500" class="card-img-top" alt="{{ $book->category->name }}">
            @endif
            <a  href="/admin/katalogue/show/{{$book->id}}">
            <div class="card-body">
            <h5 class="card-title">{{ $book->title }}</h5>
              @if($book->stock >= 1)
              <a href="#" class="btn btn-primary mb-3" disabled>Available</a>
              @else
              <a href="#" class="btn btn-secondary mb-3" disabled>Unavailable</a>
              @endif            
              <p><small class="text-muted"> Author <a href="/post?author={{$book->author}}" class="text-decoration-none">{{ $book->author }}</a></small></p>
              <p class="card-text">{{ $book->excerpt }}</p>
          </div>
        </div>
      </a>
        @endforeach     
      </div>    
    </div>
  </div>
  </div>


  @endsection