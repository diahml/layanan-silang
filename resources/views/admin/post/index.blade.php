@extends('layouts.inner')
@section('containers')
@if(session()->has('success'))
  <div class="alert alert-success " role="alert">
        {{ session('success') }}
  </div>
@endif
<div class="card">
    <div class="card-body">
      <h5 class="card-title">Post Kegiatan/Berita Perpustakaan </h5>

  

      <!-- Default Table -->
      <table class="table table-borderless datatable">
        <a href="/admin/post/create" class="btn btn-primary mb-3">Create New Post</a>
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Judul</th>
            <th scope="col">Kategori</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
                
            <tr>
              <th scope="row">{{ $loop->iteration }}</th>
              <td>{{ $post->title }}</td>
              <td>{{ $post->post_category->name }}</td>
              <td>
                <a href="/admin/post/{{ $post->slug }}"> 
                    <i class="bi bi-eye"></i>
                </a>
                <a href="/admin/post/{{ $post->slug }}/edit"> 
                    <i class="bi bi-pencil-square text-warning"></i>
                </a>
                <form action="/admin/post/{{ $post->slug }}" method="post" class="d-inline">
                  @method('delete')
                  @csrf
                  <button class="bi bi-trash text-danger border-0" onclick="return confirm('Apakah anda yakin untuk menghapus data?')"> </button>
                </form>
              </td>
            </tr>

            @endforeach
        </tbody>
      </table>
      <!-- End Default Table Example -->
    </div>
  </div>

@endsection