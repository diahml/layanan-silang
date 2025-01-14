@extends('layouts.inner')
@section('containers')
@if(session()->has('success'))
  <div class="alert alert-success " role="alert">
        {{ session('success') }}
  </div>
@endif
<div class="card">
    <div class="card-body">
      <h5 class="card-title">Kategori Post </h5>

  

      <!-- Default Table -->
      <table class="table table-borderless datatable">
        <a href="/admin/post/kategori/create" class="btn btn-primary mb-3">Tambah Kategori Baru</a>
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Kategori</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($post_categories as $post_category)
                
            <tr>
              <th scope="row">{{ $loop->iteration }}</th>
              <td>{{ $post_category->name }}</td>
              <td>
                <a href="/admin/post/kategori/{{ $post_category->id }}/edit"> 
                    <i class="bi bi-pencil-square text-warning"></i>
                </a>
                <form action="/admin/post/kategori/{{ $post_category->id }}" method="post" class="d-inline">
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