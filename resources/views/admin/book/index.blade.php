@extends('admin.layout.main')

@section('container')

<div class="card">
    <div class="card-body">
      <h5 class="card-title">Data Buku </h5>
      <table>
        <tr>
          <td> <a href="/admin/buku/create" class="btn btn-primary mb-3">Input Data Buku Baru</a></td>
          <td><a href="/book-export_pdf" target="_blank" class="btn btn-secondary mb-3">
           PDF
          </a>
          <a href="/book-export_excel" class="btn btn-secondary mb-3">
            Excel
          </a></td>
        </tr>
      </table>
  

      <!-- Default Table -->
      <table class="table" id="bookTable">
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
            <tr>
              <th scope="row">{{ $loop->iteration }}</th>
              <td>{{ $book->title }}</td>
              <td>{{ $book->author }}</td>
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
      <div class="d-flex justify-content-center">
        {{ $books->links() }}
    </div>
      <!-- End Default Table Example -->
      
    </div>
  </div>

@endsection


