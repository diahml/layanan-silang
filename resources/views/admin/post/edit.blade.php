@extends('layouts.inner')
@section('containers')

<div class="card">
    <div class="card-body">
      <h5 class="card-title">Edit Post</h5>

<form method="post" action="/admin/kegiatan/{{ $post->slug }}" enctype="multipart/form-data">
  @method('put')
    @csrf
      <!-- Floating Labels Form -->
      <form class="row g-3">

        <div class="col-10 mt-3">
          <label for="title" class="form-label">Judul</label>
          <input type="text" class="form-control @error('title') is-invalid"
              
          @enderror id="title" name="title" placeholder="Judul" value="{{ old('title', $post->title) }}">
          @error('title')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
        <div class="col-10 mt-3">
          <label for="slug" class="form-label">Slug</label>
          <input type="text" class="form-control @error('slug') is-invalid" @enderror id="slug" name="slug" placeholder="Slug" value="{{ old('slug', $post->slug) }}">
          @error('slug')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror

          {{-- slug otomatisnya gabisa lagi --}}
        </div>
        <div class="col-10 mt-3">
          <label for="post_category_id" class="form-label">Kategori</label>
          <select class="form-select" id="post_category_id" name="post_category_id">
            @foreach ($post_categories as $post_category)
            @if (old('post_category_id', $post->post_category_id)==$post_category->id)
            <option value="{{ $post_category->id }}" selected>{{ $post_category->name }}</option>
            @else
            <option value="{{ $post_category->id }}">{{ $post_category->name }}</option>
            @endif
                
            @endforeach
          </select>
        </div>

        <div class="col-10 mt-3">
          <label for="image" class="form-label">Post Image</label>
          <input type="hidden" name="oldImage" value='{{ $post->image }}'>
          @if ($post->image)
          <img src="{{  asset('storage/'.$post->image) }}" class="img-preview img-fluid mb-2" alt="">
          @else
          <img class="img-preview img-fluid mb-2" alt="">
          @endif
          
          <input type="file" class="form-control @error('image') is-invalid" @enderror id="image" name="image" onchange="previewImage()">
          @error('image')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>

        <div class="col-10 mt-3">
          <label for="body" class="form-label">Body</label>
          @error('body')
          <p style="color: red">{{ $message }}</p>
          @enderror
          <input id="body" type="hidden" name="body" value="{{ old('body' , $post->body) }}">
          <trix-editor input="body"></trix-editor>
        </div>
        

        <div class="mt-3">
          <button type="submit" class="btn btn-primary">Update Post</button>
        </div>
      </form><!-- End floating Labels Form -->

    </div>

<script>
    const title = document.querySelector('#title');
    const slug = document.querySelector('#slug');

    title.addEventListener('change', function(){
        fetch('/admin/kegiatan/checkSlug?title='+ title.value)
        .then(response => response.json())
        .then(data => slug.value = data.slug)
    });

    document.addEventListener('trix-file-accept', function(e){
      e.preventDefault();
    })

    function previewImage(){
      const image = document.querySelector('#image');
      const imgPreview = document.querySelector('.img-preview');

      imgPreview.style.display = 'block';

      const oFReader = new FileReader();
      oFReader.readAsDataURL(image.files[0]);

      oFReader.onload = function (oFREvent) {
        imgPreview.src = oFREvent.target.result;
      }
    }
</script>
@endsection