@extends('layouts.inner')
@section('containers')
@if(session()->has('success'))
  <div class="alert alert-success " role="alert">
        {{ session('success') }}
  </div>
@endif
@if(session()->has('unsuccess'))
  <div class="alert alert-danger " role="alert">
        {{ session('unsuccess') }}
  </div>
@endif
<div class="pagetitle">
  <h1>List of Books</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Books</a></li>
      <li class="breadcrumb-item active">List of Books</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<div class="container border p-md-2 p-2 ">
  <div class="row">
    <div class="col-sm-9 mt-3 m-3">
      <input type="text" id="myFilter" class="form-control" onkeyup="myFunction()" placeholder="Search for book's title">
    </div>
  </div>

  <!-- Default Table -->
  <table class="table" id="myItems">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Judul</th>
        <th scope="col">Penulis</th>
        <th scope="col">Kategori</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($books as $book)
        <tr class="tr">
          <th scope="row">{{ $loop->iteration }}</th>
          <td class="td">{{ $book->title }}</td>
          <td class="td">{{ $book->author }}</td>
          <td>{{ $book->category->name }}</td>
          <td>
            <a  class="badge bg-info" href="/admin/katalogue/{{$book->id}}"><i class="bi bi-eye-fill"></i></a>
            <a href="/admin/buku/{{ $book->npb }}/edit"> 
                <i class="bi bi-pencil-square text-warning"></i>
            </a>
            <form action="/admin/buku/{{ $book->npb }}" method="post" class="d-inline">
              @method('delete')
              @csrf
              <button class="bi bi-trash text-danger border-0" onclick="return confirm('Apakah anda yakin untuk menghapus data?')"> </button>
            </form>
          </td>
        </tr>

        @endforeach
      </tbody>
    
  </table>

  {{-- <div class="row g-1 g-md-3" id="myItems">
       @foreach ($books as $book)
      <div class="col-5 col-md-2 card m-3">
        <div class="position-absolute bg-dark px-3 py-2" style="background-color: rgba(0,0,0,0.7)"><a href="#" class="text-white text-decoration-none">{{ $book->book_category->name }}</a></div>
          @if($book->image)
          <img src="{{ asset('storage/'. $book->image) }}" alt="{{ $book->book_category->name }}" class="img-fluid" style="width: 20rem; height: 16rem;">
          @else
          <img src="https://picsum.photos/500/500" class="card-img-top" alt="{{ $book->book_category->name }}">
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
            <a  class="badge bg-danger" href="/admin/katalogue/destroy/{{ $book->slug}}" onclick="return confirm('are you sure for delete?')"><i class="bi bi-trash-fill"></i></a>        </div>
      </div>
      @endforeach     
  </div> --}}
</div>


            
@endsection