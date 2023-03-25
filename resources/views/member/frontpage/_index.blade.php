@extends('layouts.inner')
@section('containers')

  <div class="pagetitle">
    <h1>Front Page</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active">Welcome, {{ auth()->user()->name }}</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

    <div class="row">
      <div class="col-sm-4 mb-4">
        <input type="text" id="myFilter" class="form-control" onkeyup="myFunction()" placeholder="Search for card name...">
      </div>
    </div>

    <div class="row" id="catalogue">
      @foreach ($books as $book)
      <div class="col-md-2 m-3 ">
        <div class="card" style="width: 18rem; height: 35rem;" >
            <div class="position-absolute bg-dark px-3 py-2" style="background-color: rgba(0,0,0,0.7)"><a href="/post?category={{ $book->category->slug }}" class="text-white text-decoration-none">{{ $book->category->name }}</a></div>
            @if($book->image)
            <img src="{{ asset('storage/'. $book->image) }}" alt="{{ $book->category->name }}" class="img-fluid">
            @else
            <img src="https://picsum.photos/500/500" class="card-img-top" alt="{{ $book->category->name }}">
            @endif
            <div class="card-body">
              <h5 class="card-title">{{ $book->title }}</h5>
              @if($book->stock >= 1)
              <a href="#" class="btn btn-primary mb-3" disabled>Available</a>
              @else
              <a href="#" class="btn btn-secondary mb-3" disabled>Unavailable</a>
              @endif
              <p><small class="text-muted"> Author <a href="/post?author={{$book->author}}" class="text-decoration-none">{{ $book->author }}</a></small></p>
              <p class="card-text">{{ $book->excerpt }}</p>
              <a  class="badge bg-info" href="/admin/katalogue/{{$book->id}}"><i class="bi bi-eye-fill"></i></a>
              <a  class="badge bg-warning" href="/admin/katalogue/edit/{{$book->id}}"><i class="bi bi-pencil-square"></i></a>
              <a  class="badge bg-danger" href="/admin/katalogue/destroy/{{ $book->slug}}" onclick="return confirm('are you sure for delete?')"><i class="bi bi-trash-fill"></i></a>
            </div>
          </div>
      </div>
      @endforeach
  @endsection