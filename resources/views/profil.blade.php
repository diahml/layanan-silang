
@extends('layout.main')

@section('container')

@foreach ($posts as $post)
    <article class="mb-3">
    <h2>{{ $post->title }}</h2>
    <p>{{ $post->body }}</p>
  </article>
@endforeach
@endsection