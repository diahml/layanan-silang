@extends ('layout/main')
@extends ('partial/link')
@section('container')

<h1 class="mb-5">Post Category : {{ $post_category }}</h1>

@if ($posts->count())
    <div class="card mb-3">
        <img src="https://source.unsplash.com/1200x400/?{{ $posts[0]->post_category->name }}" class="card-img-top" alt="{{ $posts[0]->post_category->name }}">
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
                <img src="https://source.unsplash.com/500x400/?{{ $post->post_category->name }}" class="card-img-top" alt="$post->post_category->name">
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

   

{{-- @foreach($posts as $post)
    <article>
        <h2><a href="/posts/{{ $post->slug }}">{{ $post->title}}</a></h2>
            <p>{{ $post->excerpt }}</p>
    </article>
@endforeach --}}

@endsection