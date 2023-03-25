
@extends('layouts.inner')
@section('containers')


@foreach($book as $b)
<h2 class="mb-3"></h2>
<section class="section profile">
    <div class="row">
      <div class="col-xl-4">
        @if($b->cover)
        <div class="card">
          <img src="{{ asset('storage/'. $b->cover) }}" alt="{{ $b->category->name }}" class="img-fluid col-sm-4 mt-3" style="width: 200%;">
      </div>
        @else
        <img src="https://picsum.photos/500/600" class="img-fluid" alt="">
        @endif
      </div>
      <div class="col-xl-8">

        <div class="card">
          <div class="card-body pt-3">
            <!-- Bordered Tabs -->
            <ul class="nav nav-tabs nav-tabs-bordered">

              <li class="nav-item">
                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#overview">Overview</button>
              </li>

              <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#review">Review</button>
              </li>

            </ul>
            <div class="tab-content pt-2">

              <div class="tab-pane fade show active overview" id="overview">
                <h5 class="card-title">Title</h5>
                <h5>{{ $b->title }}</h5>

                <h5 class="card-title">Details</h5>
                
                <div class="row fs-5">
                  <div class="col-lg-3 col-md-4 label ">Author</div>
                  <div class="col-lg-9 col-md-8">{{ $b->author  }}</div>
                </div>

                <div class="row fs-5">
                  <div class="col-lg-3 col-md-4 label ">Category</div>
                  <div class="col-lg-9 col-md-8">{{ $b->category->name }}</div>
                </div>

                <div class="row fs-5">
                    <div class="col-lg-3 col-md-4 label">Book Number</div>
                    <div class="col-lg-9 col-md-8">{{ $b->booknum }}</div>
                  </div>

                  <div class="row fs-5">
                    <div class="col-lg-3 col-md-4 label">Back Number</div>
                    <div class="col-lg-9 col-md-8">{{ $b->backnum }}</div>
                  </div>

                  <div class="row fs-5">
                    <div class="col-lg-3 col-md-4 label">Book Year</div>
                    <div class="col-lg-9 col-md-8">{{ $b->bookyear }}</div>
                  </div>

              </div>

              <div class="tab-pane fade review pt-3" id="review">
                <!-- Profile Edit Form -->
                @foreach($b->review as $review)
                <div class="row">
                  @if(!isset($review->reviewer->id))
                  anonymous
                  @else
                   {{ $review->reviewer->name }}
                   @endif
                    <div class="col-lg-9 col-md-8">
                      {!! $review->body !!}
                    </div>
                </div>
                @endforeach  

              </div>

            </div><!-- End Bordered Tabs -->

          </div>
        </div>

      </div>

    </div>
  </section>
@endforeach
@endsection