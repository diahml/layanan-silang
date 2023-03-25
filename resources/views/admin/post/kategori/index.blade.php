@extends('admin.layout.main')

@section('container')

<div class="card">
    <div class="card-body">
      <h5 class="card-title">Kategori Post </h5>

  

      <!-- Default Table -->
      <table class="table">
        <a href="/admin/kegiatan/kategori/create" class="btn btn-primary mb-3">Tambah Kategori Baru</a>
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
                <a href="/admin/kegiatan/kategori/{{ $post_category->id }}/edit"> 
                    <i class="bi bi-pencil-square text-warning"></i>
                </a>
                <form action="/admin/kegiatan/kategori/{{ $post_category->id }}" method="post" class="d-inline">
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