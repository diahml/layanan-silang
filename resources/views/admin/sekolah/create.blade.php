@extends('layouts.inner')
@section('containers')

<div class="card">
    <div class="card-body">
      <h5 class="card-title">Input Data Sekolah Baru</h5>

<form method="post" action="/admin/sekolah">
    @csrf
      <!-- Floating Labels Form -->
      <form class="row g-3">

        {{-- <div class="col-10 mt-3">
          <label for="no_pic" class="form-label">No PIC</label>
          <input type="text" class="form-control @error('no_pic') is-invalid"
              
          @enderror id="no_pic" name="no_pic" placeholder="No PIC" value="{{ old('no_pic') }}">
          @error('no_pic')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div> --}}

        <div class="col-10 mt-3">
          <label for="instansi" class="form-label">Nama Sekolah</label>
          <input type="text" class="form-control @error('instansi') is-invalid" @enderror id="instansi" name="instansi" placeholder="Nama Sekolah" value="{{ old('instansi') }}">
          @error('instansi')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror

        </div>

        <div class="col-10 mt-3">
            <label for="alamat" class="form-label">Alamat Sekolah</label>
            <input type="text" class="form-control @error('alamat') is-invalid" @enderror id="alamat" name="alamat" placeholder="Alamat Sekolah" value="{{ old('alamat') }}">
            @error('alamat')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
  
        </div>

        <div class="col-10 mt-3">
            <label for="kontak" class="form-label">No Telepon</label>
            <div class="input-group">
            <span class="input-group-text" id="basic-addon1">+62</span>
            <input type="kontak" class="form-control @error('kontak') is-invalid"  
            @enderror id="kontak" name="kontak" placeholder="No Telepon" value="{{ old('kontak') }}">
          </div>
            @error('kontak')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
            
          </div>

          <div class="col-10 mt-3">
            <label for="email" class="form-label">Email</label>
            <input type="text" class="form-control @error('email') is-invalid" @enderror id="email" name="email" placeholder="Email" value="{{ old('email') }}">
            @error('email')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
  
        </div>

        <div class="col-10 mt-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control @error('username') is-invalid" @enderror id="username" name="username" placeholder="Username" value="{{ old('username') }}">
            @error('username')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
  
        </div>

        <div class="col-10 mt-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control @error('password') is-invalid" @enderror id="passwprd" name="password" placeholder="Password">
            @error('password')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
  
        </div>

        <div class="mt-3">
          <button type="submit" class="btn btn-primary">Input Data</button>
        </div>
      </form><!-- End floating Labels Form -->
    </div>

    </div>

@endsection