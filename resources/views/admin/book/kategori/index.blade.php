@extends('admin.layout.main')

@section('container')
<div class="card">
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
    <div class="card-body">
      <h5 class="card-title">Kategori Buku </h5>
      <table>
        <tr>
          <td> <a href="/admin/buku/kategori/create" class="btn btn-primary mb-3">Tambah Kategori Baru</a></td>
          <td><a href="/book_category-export_pdf" target="_blank" class="btn btn-secondary mb-3">
            PDF
          </a>
          <a href="/book_category-export_excel" class="btn btn-secondary mb-3">
            Excel
          </a></td>
        </tr>
      </table>
  

      <!-- Default Table -->
      <table class="table">
        
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Kelas</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($book_categories as $book_category)
                
            <tr>
              <th scope="row">{{ $loop->iteration }}</th>
              <td>{{ $book_category->kelas }}</td>
              <td>
                <a href="/admin/buku/kategori/{{ $book_category->id }}/edit"> 
                    <i class="bi bi-pencil-square text-warning"></i>
                </a>
                <form action="/admin/buku/kategori/{{ $book_category->id }}" method="post" class="d-inline">
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