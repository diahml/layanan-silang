@extends('layouts.inner')
@section('containers')
@if(session()->has('success'))
  <div class="alert alert-success " role="alert">
        {{ session('success') }}
  </div>
@endif
<nav>
    <h1>Your Review</h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Your Review</a></li>
        <li class="breadcrumb-item active">Page</li>
      </ol>
    </nav>
    <div class="card">
      <div class="card-body">
      <table class="table table-borderless datatable">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Title</th>
              <th scope="col">Review</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($reviews as $review)
              <tr>
                  <td>{{ $loop->iteration }}</td>
                  @if(!isset($review->book->id))
                  <td>book has been deleted</td>
                  @else
                  <td>{{ $review->book->title }}</td>
                  @endif
                  <td>{{  $review->excerpt }}</td>
                  <td>
                    <a  class="badge bg-warning" href="/member/review/edit/{{$review->id}}"><i class="bi bi-pencil-square"></i></a>
                    <a  class="badge bg-danger" href="/member/review/hapusmyre/{{$review->id}}" onclick="return confirm('are you sure for delete?')"><i class="bi bi-trash-fill"></i></a>
                  </td>
                </tr>
              @endforeach
          </tbody>
      </table>
      </div>
      </div>
@endsection