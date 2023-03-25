@extends('layouts.inner')
@section('containers')

<div class="pagetitle">
  <h1>Preorder Book</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Preorder Book</a></li>
      <li class="breadcrumb-item active">Page</li>
    </ol>
  </nav>
</div><!-- End Page Title -->
  <div class="card">
    <div class="card-body">
        <form method="POST" action="/member/suggest" class="row g-3" enctype="multipart/form-data">
            @csrf
            <div class="col-12">
              <label for="title" class="form-label">Title</label>
              <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" autofocus value="{{ old('title') }}">
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
                  @if(old('category_id') == $category->id)
                  <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                  @else
                  <option value="{{ $category->id }}">{{ $category->name }}</option>
                  @endif
                  @endforeach
                </select>
            </div>

            <div class="col-12">
                <label for="author" class="form-label">Author</label>
                <input type="text" class="form-control @error('author') is-invalid @enderror" id="author" name="author" value="{{ old('author') }}">
                @error('author')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
            </div>

            
            <div class="text-center">
              <button type="submit" class="btn btn-primary">Recommend This Book</button>
            </div>
          </form><!-- Vertical Form -->
    </div>
    </div>
    
  @endsection