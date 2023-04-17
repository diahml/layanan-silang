@extends('layouts.inner')
@section('containers')


@foreach($user as $s)
<h2 class="mb-3"></h2>


<section class="section profile">
    <div class="row">
      <div class="col-xl-4">

        <div class="card">
          <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

            <img src="/vendors/img/profile-img.jpg" alt="Profile" class="rounded-circle">
            <h2>{{ $s->name }}</h2>
            <h3>{{ $s->commissariat }}</h3>
    
          </div>
        </div>

      </div>

      <div class="col-xl-8">

        <div class="card">
          <div class="card-body pt-3">
            <!-- Bordered Tabs -->
            <ul class="nav nav-tabs nav-tabs-bordered">

              <li class="nav-item">
                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
              </li>
              
            </ul>
            <div class="tab-content pt-2">

              <div class="tab-pane fade show active profile-overview" id="profile-overview">
                
                <h5 class="card-title">Profile Details</h5>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label ">Full Name</div>
                  <div class="col-lg-9 col-md-8">{{ $s->name }}</div>
                </div>

                <div class="row">
                    <div class="col-lg-3 col-md-4 label">Email</div>
                    <div class="col-lg-9 col-md-8">{{ $s->email }}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Address</div>
                    <div class="col-lg-9 col-md-8">{{ $s->address }}</div>
                  </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Commissariat/Pihak</div>
                  <div class="col-lg-9 col-md-8">{{ $s->commissariat }}</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Phone</div>
                  <div class="col-lg-9 col-md-8">62{{ $s->phone }}</div>
                </div>

              </div>


            </div><!-- End Bordered Tabs -->

          </div>
        </div>

      </div>
    </div>
  </section>

@endforeach
@endsection