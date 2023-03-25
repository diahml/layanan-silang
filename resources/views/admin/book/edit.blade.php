@extends('admin.layout.main')

@section('container')



<div class="card">
    <div class="card-body">
      <h5 class="card-title">Input Data Buku Baru</h5>

<form method="post" action="/admin/buku/{{ $book->npb }}">
  @method('put')
    @csrf
      <!-- Floating Labels Form -->
      <form class="row g-3">

        <div class="col-10 mt-3">
          <label for="judul" class="form-label">Judul</label>
          <input type="text" class="form-control @error('judul') is-invalid"
              
          @enderror id="judul" name="judul" placeholder="Judul" value="{{ old('judul', $book->judul) }}">
          @error('judul')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>

        <div class="col-10 mt-3">
          <label for="pengarang" class="form-label">Penulis</label>
          <input type="text" class="form-control @error('pengarang') is-invalid" @enderror id="pengarang" name="pengarang" placeholder="Penulis" value="{{ old('pengarang', $book->pengarang) }}">
          @error('pengarang')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror

        </div>

        <div class="col-10 mt-3">
          <label for="cover" class="form-label">Cover Buku (JPEG, PNG, JPG)</label>
          <input type="hidden" name="oldImage" value='{{ $book->cover }}'>
          <input type="file" class="form-control @error('cover') is-invalid" @enderror id="cover" name="cover">
          @error('cover')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
    
    <div class="col-10 mt-3">
      <label for="book_category_id" class="form-label">Kategori</label>
      <select class="form-select" id="book_category_id" name="book_category_id">
        @foreach ($book_categories as $book_category)
        @if (old('book_category_id')==$book_category->id)
        <option value="{{ $book_category->id }}" selected>{{ $book_category->kelas }}</option>
        @else
        <option value="{{ $book_category->id }}">{{ $book_category->kelas }}</option>
        @endif
            
        @endforeach
      </select>
    </div>

        <div class="col-10 mt-3">
            <label for="tahun_terbit" class="form-label">Tahun Terbit</label>
            <input type="tahun_terbit" class="form-control @error('tahun_terbit') is-invalid"
                
            @enderror id="tahun_terbit" name="tahun_terbit" placeholder="Tahun Terbit" value="{{ old('tahun_terbit', $book->tahun_terbit) }}">
            @error('tahun_terbit')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
        
          <div class="col-10 mt-3">
            <label for="npb" class="form-label">Nomor Punggung Buku</label>
            <input type="text" class="form-control @error('npb') is-invalid"
                
            @enderror id="npb" name="npb" placeholder="Nomor Punggung Buku" value="{{ old('npb', $book->npb) }}">
            @error('npb')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
        

          <div class="col-10 mt-3">
            <label for="no_buku" class="form-label">Nomor Buku</label>
            <input type="text" class="form-control @error('no_buku') is-invalid"
                
            @enderror id="no_buku" name="no_buku" placeholder="Nomor Buku" value="{{ old('no_buku', $book->no_buku) }}">
            @error('no_buku')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>

          <div class="col-10 mt-3">
            <label for="stok" class="form-label">Stok</label>
            <input type="text" class="form-control @error('stok') is-invalid"
                
            @enderror id="stok" name="stok" placeholder="Stok" value="{{ old('stok', $book->stok) }}">
            @error('stok')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>

        <div class="mt-3">
          <button type="submit" class="btn btn-primary">Update Data</button>
        </div>
      </form><!-- End floating Labels Form -->
    </div>

    </div>

@endsection