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
  <h1>List of Reviews</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Books</a></li>
      <li class="breadcrumb-item active">List of Reviews</li>
    </ol>
  </nav>
</div><!-- End Page Title -->
<table class="table table-borderless datatable">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Title</th>
        <th scope="col">Reviewer</th>
        <th scope="col">Commissariat</th>
        <th scope="col">Review</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach($reviews as $review)
        <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $review->book->title }}</td>
        <td>{{ $review->reviewer->name }}</td>
        <td>{{ $review->reviewer->commissariat }}</td>
        <td>{!! $review->body !!}</td>
        <td>
            <a  class="badge bg-danger" href="/admin/katalogue/hapusreview/{{ $review->id}}" onclick="return confirm('are you sure for delete?')"><i class="bi bi-trash-fill"></i></a>
            {{-- <form action="/admin/membering/{{$member->id}}" method="get" class="d-inline">
            @csrf
            <button  class="badge bg-danger border-0" onclick="return confirm('are you sure for delete?')"><i class="bi bi-trash-fill"></i>
            </button>
            </form> --}}
          </td>
      </tr>
      @endforeach
    </tbody>
  </table>
            
@endsection