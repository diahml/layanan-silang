@extends('layouts.inner')
@section('containers')
<div class="pagetitle">
  <h1>Edit Book</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a>Edit Book</a></li>
      <li class="breadcrumb-item active">Page</li>
    </ol>
  </nav>
</div><!-- End Page Title -->
          <div class="card">
            <div class="card-body">
              <!-- No Labels Form -->
              <h5 class="card-title">Update Book</h5>
              <!-- Vertical Form -->
              <form method="POST" action="/admin/buku/{{ $book->id }}" class="row g-3" enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="col-12">
                  <label for="title" class="form-label">Title</label>
                  <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" autofocus value="{{ old('title', $book->title) }}">
                  @error('title')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
                </div>
                

                <div class="col-12">
                  <label for="category_id" class="col-sm-2 col-form-label">Category</label>
                    <select class="form-select" name="category_id" id="category_id" >
                      @foreach($categories as $category)
                      @if(old('category_id', $book->category_id) == $category->id)
                      <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                      @else
                      <option value="{{ $category->id }}">{{ $category->name }}</option>
                      @endif
                      @endforeach
                    </select>
                </div>

                <div class="col-12 mb-3">
                    <label for="image" class="col-sm-2 col form-label">Post Image</label>
                    <div class="col-12">
                      <input type="hidden" name="oldImage" value="{{ $book->image }}">
                      @if($book->image)
                      <img src="{{ asset('storage/'. $book->image) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
                      @else
                      <img class="img-preview img-fluid mb-3 col-sm-5">
                      @endif
                      <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
                      @error('image')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                      @enderror
                      </div>
                </div>


                <div class="col-12">
                    <label for="author" class="form-label">Author</label>
                    <input type="text" class="form-control @error('author') is-invalid @enderror" id="author" name="author" value="{{ old('author', $book->author) }}">
                    @error('author')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
                </div>
                <div class="col-12">
                    <label for="booknum" class="form-label">Book Number</label>
                    <input type="text" class="form-control @error('booknum') is-invalid @enderror" id="booknum" name="booknum" value="{{ old('booknum', $book->booknum) }}">
                    @error('booknum')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
                </div>
                <div class="col-12">
                    <label for="backnum" class="form-label">Back Number</label>
                    <input type="text" class="form-control @error('backnum') is-invalid @enderror" id="backnum" name="backnum" value="{{ old('backnum', $book->backnum) }}">
                    @error('backnum')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
                </div>
                <div class="col-12">
                    <label for="bookyear" class="form-label">Book Year</label>
                    <input type="text" class="form-control @error('bookyear') is-invalid @enderror" id="bookyear" name="bookyear" value="{{ old('bookyear', $book->bookyear) }}">
                    @error('bookyear')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Update Book</button>
                </div>
              </form><!-- Vertical Form -->


    </div>
</div>
<script>
  
  function previewImage(){
    const image = document.querySelector('#image');
    const imgPreview = document.querySelector('.img-preview');
    imgPreview.style.display ='block';

    const oFReader = new FileReader();
    oFReader.readAsDataURL(image.files[0]);

    oFReader.onload = function(oFReader){
      imgPreview.src = oFReader.target.result;
    }
  }
  
</script>
@endsection