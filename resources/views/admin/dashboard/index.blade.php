@extends('layouts.inner')
@section('containers')

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">
        @if(session()->has('success'))
        <div class="alert alert-success " role="alert">
              {{ session('success') }}
        </div>
        @endif
        @if(session()->has('successUpdated'))
        <div class="alert alert-success " role="alert">
              {{ session('successUpdated') }}
        </div>
        @endif
        @if(session()->has('unsuccess'))
        <div class="alert alert-danger " role="alert">
              {{ session('unsuccess') }}
        </div>
        @endif
        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">
                

                <div class="card-body">
                  <h5 class="card-title">Visitor <span>| Cummulative</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{ $presence }}</h6>
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

            <!-- Revenue Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">

                

                <div class="card-body">
                  <h5 class="card-title">Visitor <span>| {{ date("d-m-Y", strtotime( \Carbon\Carbon::today())) }}</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{ $today }}</h6>
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->

            <!-- Revenue Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">

                

                <div class="card-body">
                  <h5 class="card-title">Categories's <span>Book</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{ $category }}</h6>
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->


          </div>
        </div><!-- End Left side columns -->
        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

            <!-- Customers Card -->
            <div class="col-xxl-4 col-xl-12">

              <div class="card info-card customers-card">

                

                <div class="card-body">
                  <h5 class="card-title">Member <span>| GenBI & Internal</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{ $member }}</h6>
                    </div>
                  </div>

                </div>
              </div>

            </div><!-- End Customers Card -->
            

            <!-- Customers Card -->
            <div class="col-xxl-4 col-xl-12">

              <div class="card info-card sales-card">

                <div class="card-body">
                  <h5 class="card-title">Collection Book <span>| Available</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{ $book }}</h6>
                    </div>
                  </div>

                </div>
              </div>

            </div><!-- End Customers Card -->

            <!-- Customers Card -->
            <div class="col-xxl-4 col-xl-12">

              <div class="card info-card sales-card">

                

                <div class="card-body">
                  <h5 class="card-title">Preorder Book <span>| Request</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{ $suggest }}</h6>
                    </div>
                  </div>

                </div>
              </div>

            </div><!-- End Customers Card -->
          </div>
        </div><!-- End Left side columns -->

          <!-- Left side columns -->
          <div class="col-lg-12">
            <div class="row">
              
  
              <!-- Customers Card -->
              <div class="col-xxl-6 col-xl-12">
  
                <div class="card info-card sales-card">
  
                  <div class="card-body">
                    <h5 class="card-title">School <span>| Layanan Silang</span></h5>
  
                    <div class="d-flex align-items-center">
                      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-people"></i>
                      </div>
                      <div class="ps-3">
                        <h6>{{ $school }}</h6>
                      </div>
                    </div>
  
                  </div>
                </div>
  
              </div><!-- End Customers Card -->
  
              <!-- Customers Card -->
              <div class="col-xxl-6 col-xl-12">

                <div class="card info-card customers-card">
  
                  
                  
  
                  <div class="card-body">
                    <h5 class="card-title">Blog <span>| Activities</span></h5>
  
                    <div class="d-flex align-items-center">
                      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-people"></i>
                      </div>
                      <div class="ps-3">
                        <h6>{{ $post }}</h6>
                      </div>
                    </div>
  
                  </div>
                </div>
  
              </div><!-- End Customers Card -->
            </div>
          </div><!-- End Left side columns -->  

        <!-- Recent Activity -->
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Categories <span>| Book</span></h5>

            <div class="list-group list-group-light">
              @foreach($categories as $category)
              <div class="list-group-item list-group-item-action px-3 border-0 d-flex justify-content-between">
                <a class="text-decoration-none text-dark" href="category/edit/{{ $category->id }}" 
                  aria-current="true">
                  {{ $category->name }}
                </a>
                <a  class="badge bg-danger" href="category/hapus/{{ $category->id}}" onclick="return confirm('are you sure for delete?')"><i class="bi bi-trash-fill"></i></a>

              </div>
              @endforeach
            </div>

          </div>
        </div><!-- End Recent Activity -->

      </div>
    </section>

  <!-- ======= Footer ======= -->
  @endsection