@extends ('layout.main')
@extends('partial.link')

@section('container')

<div class="row justify-content-center my-5">
    <div class="col-md-5">
        <main class="form-signin">

          @if(session()->has('loginError'))
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('loginError') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          @endif
            <form action="/login" method="POST">
              @csrf
              <h1 class="h3 mb-3 fw-normal text-center">Login</h1>


              <div class="form-floating mb-3">
                <input type="text" class="form-control @error('username') is-invalid
                @enderror" id="username" name="username" placeholder="Username">
                <label for="floatingInput">Username</label>
                @error('username')
                <div class="invalid-feedback">
                  {{ $message }}  
                </div>
                @enderror
              </div>

              <div class="form-floating mb-3">
      
                <input type="password" class="form-control  @error('password') is-invalid
                @enderror" id="password" name="password" placeholder="password" required>
                <label for="floatingInput">Password</label>
                
                @error('password')
                <div class="invalid-feedback">
                  {{ $message }}  
                </div>
                @enderror
              </div>
          
          
              <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>

              <p class="mt-2">*login hanya dapat dilakukan oleh admin dan peserta layanan silang</p>
            </form>
          </main>
    </div>
</div>

@endsection