@extends ('layout/main')
@extends('partial.link')
@section ('container')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <h3 class="mb-3">{{ $post->title }}</h3>
            
            <p>{{$post->post_category->name }}</p>

            @if ($post->image)
            <div style="overflow:hidden; object-fit: cover;">
                <img class="mt-3" src="{{ asset('storage/'.$post->image) }}" alt="$post->post_category->name" class="img-fluid mt-3" style="width:800px; height: 400px; ">
            </div>            
            @else
            <img class="mt-3" src="https://source.unsplash.com/700x300" alt="$post->post_category->name" class="img-fluid"> 
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

