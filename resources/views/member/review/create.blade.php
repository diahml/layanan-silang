@extends('layouts.inner')
@section('containers')
<nav>
  @foreach($book as $book)
    <h3>Add Review For {{ $book->title }}</h3>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Add Review</a></li>
        <li class="breadcrumb-item active">Page</li>
      </ol>
    </nav>

    <div class="col-lg-12">
      <div class="row">

        <!-- Sales Card -->
        <div class="col-xxl-6 col-md-6  text-center mx-auto d-block">

            <img src="{{ asset('storage/'. $book->image) }}" alt="{{ $book->category->name }}" class="img-fluid col-sm-4 mt-3 " style="width: 50%;">


        </div><!-- End Sales Card -->
      </div>
    </div><!-- End Left side columns -->
      <!-- General Form Elements -->
    
      @endforeach

      <form method="POST" action="/member/review" class="mb-5">
        @csrf

        <input type="hidden"  id="book_id" name="book_id" value="{{ request()->id_book }}">
        
        <div class="row mb-3">
          @error('body')
            <p class="text-danger">{{ $message }}</p>
            @enderror
          <input id="body" type="hidden" name="body" value="{{ old('body') }}">
          <trix-editor input="body"></trix-editor>
          <div class="col-sm-10">
            
          </div>
        </div>
<br>
          <div class="row mb-3 mt-5 text-center">
            <div class="col-sm-12">
              <button type="submit" class="btn btn-primary">Review</button>
            </div>
          </div> 
        </div>

      </form><!-- End General Form Elements -->

    </div>
  </div>
@endsection