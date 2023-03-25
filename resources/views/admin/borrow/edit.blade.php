@extends('layouts.inner')
@section('containers')
<div class="pagetitle">
  <h1>Edit Borrower</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Edit Borrower</a></li>
      <li class="breadcrumb-item active">Page</li>
    </ol>
  </nav>
</div><!-- End Page Title -->
@foreach($borrow as $borrow)
          <form method="POST" action="/admin/borrow/{{ $borrow->id }}" class="row g-3" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="col-12">
                <label for="member_id" class="form-label">Name</label>
                <select class="form-select" name="member_id" id="member_id" >
                  @foreach($members as $member)
                  @if(old('member_id', $borrow->member_id) == $member->id)
                  <option value="{{ $member->id }}" selected>{{ $member->name }}</option>
                  @else
                  <option value="{{ $member->id }}">{{ $member->name }}</option>
                  @endif
                  @endforeach
                </select>
                @error('member_id')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
              </div>

              <div class="col-12">
                <label for="book_id" class="col-sm-2 col-form-label">Book's title</label>
                  <select class="form-select" name="book_id" id="book_id" >
                    @foreach($books as $book)
                    @if(old('book_id', $borrow->book_id) == $book->id)
                    <option value="{{ $book->id }}" selected>{{ $book->title }} - {{ $book->booknum }}</option>
                    @elseif($book->stock == 0)
                    <option value="{{ $book->id }}" disabled>{{ $book->title }} - {{ $book->booknum }}</option>
                    @else
                    <option value="{{ $book->id }}">{{ $book->title }} - {{ $book->booknum }}</option>
                    @endif
                    @endforeach
                  </select>
              </div>

              <div class="row g-3">
                  <div class="col-md-6">
                      <label for="borrowAt" class="form-label">Borrow At</label>
                      <input type="date" min="{{ date('Y-m-d') }}" max="{{ date('Y-m-d', strtotime('+2 weeks')) }}" class="form-control @error('borrowAt') is-invalid @enderror" id="borrowAt" name="borrowAt" value="{{ old('borrowAt', $borrow->borrowAt) }}">
                      @error('borrowAt')
                      <div class="invalid-feedback">
                      {{ $message }}
                      </div>
                      @enderror
                  </div>

                  <div class="col-md-6">
                      <label for="returnAt" class="form-label">Return At</label>
                  <input type="date" min="{{ date('Y-m-d') }}" max="{{ date('Y-m-d', strtotime('+2 weeks')) }}" class="form-control @error('returnAt') is-invalid @enderror" id="returnAt" name="returnAt" value="{{ old('returnAt', $borrow->returnAt) }}">
                  @error('returnAt')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
              </div>
              <div class="text-center">
                <button type="submit" class="btn btn-primary">Edit Borrower</button>
              </div>
          </form><!-- Vertical Form -->

          @endforeach

@endsection