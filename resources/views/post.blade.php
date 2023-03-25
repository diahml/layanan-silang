@extends ('layout/main')
@extends('partial.link')
@section ('container')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <h3 class="mb-3">{{ $post->title }}</h3>
            
            <p>Category : <a href="/post_categories/{{ $post->post_category->slug }}"> {{$post->post_category->name }} </a></p>

            @if ($post->image)
            <div style="max-height: 400px; overflow:hidden;">
                <img src="{{ asset('storage/'.$post->image) }}" alt="$post->post_category->name">
            </div>
                
            @else
            <img src="https://source.unsplash.com/700x300/?{{ $post->post_category->name }}" alt="$post->post_category->name" class="img-fluid"> 
            @endif
            <article class="my-3">
                {!!  $post->body!!}
            </article>

            <a href="/blog">Back</a>
            <br><br>
        </div>
    </div>
</div>

@endsection

