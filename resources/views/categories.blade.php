@extends ('layout/main')

@section('container')
    <h1 class="mb-5">Post Categories</h1>

@foreach($post_categories as $post_category)
    <ul>
        <li><h3><a href="/post_categories/{{ $post_category->slug }}">{{ $post_category->name}}</a></h3></li>
    </ul>
@endforeach

@endsection