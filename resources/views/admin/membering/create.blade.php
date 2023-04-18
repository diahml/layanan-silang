@extends('layouts.inner')
@section('containers')
<div class="pagetitle">
  <h1>Add New Member</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Add Member</a></li>
      <li class="breadcrumb-item active">Page</li>
    </ol>
  </nav>
</div><!-- End Page Title -->
          <div class="card">
            <div class="card-body">
              <!-- No Labels Form -->
              <h5 class="card-title">Add New Member</h5>

              <!-- Vertical Form -->
              <form method="POST" action="/admin/membering" class="row g-3">
                @csrf
                <div class="col-12">
                  <label for="name" class="form-label">Name</label>
                  <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name">
                  @error('name')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
                </div>
                <div class="col-12">
                  <label for="email" class="form-label">Email</label>
                  <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email">
                  @error('email')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
                </div>
                <div class="col-12">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" placeholder="1234 Main St">
                    @error('address')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
                  </div>
                  <div class="col-12">
                    <input type="hidden" class="form-control" id="password" name="password">
                    <input type="hidden" class="form-control" id="is_admin" name="is_admin">
                  </div>
                <div class="col-12">
                    <label for="commissariat" class="form-label">Commissariat/Pihak</label>
                    <select id="commissariat" name="commissariat" class="form-select">
                      <option selected hidden>Choose...</option>
                      <option value="Universitas Jenderal Soedirman">Universitas Jenderal Soedirman</option>
                      <option value="Universitas Muhammadiyah Purwokerto">Universitas Muhammadiyah Purwokerto</option>
                      <option value="UIN Saizu Purwokerto">UIN Saizu Purwokerto</option>
                      <option value="Internal Bank Indonesia">Internal Bank Indonesia</option>
                    </select>
                </div>
                <div class="col-12">
                  <label for="commissariat" class="form-label">Phone Number</label>
                  <div class="form-floating">
                    <div class="input-group">
                      <span class="input-group-text" id="basic-addon1">+62</span>
                      <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" placeholder="Phone Number" value="{{ old('phone') }}">
                    </div>
                    @error('phone')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
                 
                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Add Member</button>
                </div>
              </form><!-- Vertical Form -->


    </div>
</div>

@endsection