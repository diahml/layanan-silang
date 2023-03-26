@extends('layouts.inner')
@section('containers')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <h1 class="mb-3">{{ $post->title }}</h1>
            
            <a href="/admin/kegiatan" class="btn btn-success"> 
                <i class="bi bi-arrow-left "></i>
                Back
            </a>
            <a href="/admin/kegiatan/{{ $post->slug }}/edit" class="btn btn-warning"> 
                <i class="bi bi-pencil-square"></i>
                Edit
            </a>
            <form action="/admin/kegiatan/{{ $post->slug }}" method="post" class="d-inline">
                @method('delete')
                @csrf
                <button class="btn btn-danger bi-trash" onclick="return confirm('Apakah anda yakin untuk menghapus data?')"> Delete</button>
              </form>

            @if ($post->image)
            <div style="max-height: 400px; overflow:hidden;">
                <img class="mt-3" src="{{ asset('storage/'.$post->image) }}" alt="$post->post_category->name">
            </div>
                
            @else
            <img class="mt-3" src="https://source.unsplash.com/700x300/?{{ $post->post_category->name }}" alt="$post->post_category->name" class="img-fluid"> 
            @endif

            <article class="my-3">
                {!!  $post->body!!}
            </article>

            <br><br>
        </div>
    </div>
</div>

@endsection