@extends ('layout/main')
@extends('partial.link')
@section('container')

{{-- @foreach ($posts as $posts)
    
@endforeach --}}
@if ($posts->count())
    <div class="card mb-3">
        @if ($posts[0]->image)
            <div style="overflow:hidden; object-fit: cover;">
                <img class="mt-3" src="{{ asset('storage/'.$posts[0]->image) }}" alt="$post->post_category->name" class="img-fluid mt-3" style="width:1300px; height: 460px; ">
            </div>            
        @else
        <img src="https://source.unsplash.com/1200x400/?{{ $posts[0]->post_category->name }}" class="card-img-top" alt="{{ $posts[0]->post_category->name }}">
        @endif

        <div class="card-body text-center">
          <h3 class="card-title"><a href="/posts/{{ $posts[0]->slug }}" class="text-decoration-none text-dark">{{ $posts[0]->title }}</a></h3>
          {{-- <small>{{ $posts[0]->created_at->diffForHumans() }}</small><br> --}}
          <p class="card-text">{{ $posts[0]->excerpt }}</p>
          <a href="/posts/{{ $posts[0]->slug }}" class="text-decoration-none btn btn-primary">Read more</a>
          
        </div>
      </div>

@else
    <p class="text-center fs-4">No Post Found.</p>
@endif

<div class="container">
    <div class="row">
        @foreach ($posts->skip(1) as $post)
        <div class="col-md-4 mb-3">
            <div class="card">
            @if ($post->image)
                <img src="{{ asset('storage/'.$post->image) }}" alt="$post->post_category->name">
            @else
            <img src="https://source.unsplash.com/500x400/?{{ $post->post_category->name }}" class="card-img-top" alt="$post->post_category->name">
            @endif

                
                <div class="card-body">
                  <h5 class="card-title"><a href="/posts/{{ $post->slug }}">{{ $post->title }}</a></h5>
                  <p class="card-text">{{ $post->excerpt }}</p>
                  <a href="/posts/{{ $post->slug }}" class="btn btn-primary">Read More</a>
                </div>
              </div>
        </div>
        @endforeach
    </div>
</div>


{{-- @foreach($posts->skip(1) as $post)
    <article class="mb-5 border-bottom pb-3">
        <h2><a href="/posts/{{ $post->slug }}" class="text-decoration-none">{{ $post->title}}</a></h2>
            <p>{{ $post->excerpt }}</p>

            <a href="/posts/{{ $post->slug }}" class="text-decoration-none">Read more...</a>
    </article>
@endforeach --}}

@endsection
