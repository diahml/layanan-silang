@extends('layouts.inner')
@section('containers')
        <nav>
          <h1>Add New Category</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Add Category</a></li>
              <li class="breadcrumb-item active">Page</li>
            </ol>
          </nav>
          <div class="card">
            <div class="card-body">
              <!-- No Labels Form -->
              <h5 class="card-title">Add New Category</h5>

              <!-- Vertical Form -->
              <form method="POST" action="/admin/category" class="row g-3">
                @csrf
                <div class="col-12">
                  <label for="name" class="form-label">Name</label>
                  <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" autofocus value="{{ old('name') }}">
                  @error('name')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
                </div>
                
                
                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Add Category</button>
                </div>
              </form><!-- Vertical Form -->


    </div>
</div>
<script>
  const name = document.querySelector('#name');
  const slug = document.querySelector('#slug')

  name.addEventListener('change', function(){
    fetch('/admin/category/checkSlug?name='+name.value)
    .then(response => response.json())
    .then(data => slug.value = data.slug)
  });

  
</script>
@endsection