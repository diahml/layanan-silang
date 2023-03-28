@extends('layouts.inner')
@section('containers')

<div class="card">
    <div class="card-body">
      <h5 class="card-title">Edit Data Sekolah Baru</h5>

<form method="post" action="/admin/sekolah/{{ $sekolah->id }}">
    @method('put')
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
          <label for="name" class="form-label">Nama Sekolah</label>
          <input type="text" class="form-control @error('name') is-invalid" @enderror id="name" name="name" placeholder="Nama Sekolah" value="{{ old('name', $sekolah->name) }}">
          @error('name')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror

        </div>

        <div class="col-10 mt-3">
            <label for="address" class="form-label">Alamat Sekolah</label>
            <input type="text" class="form-control @error('address') is-invalid" @enderror id="address" name="address" placeholder="Alamat Sekolah" value="{{ old('address', $sekolah->address) }}">
            @error('address')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
  
        </div>

        <div class="col-10 mt-3">
            <label for="phone" class="form-label">No Telepon</label>
            <div class="input-group">
            <span class="input-group-text" id="basic-addon1">+62</span>
            <input type="phone" class="form-control @error('phone') is-invalid"
                
            @enderror id="phone" name="phone" placeholder="No Telepon" value="{{ old('phone', $sekolah->phone) }}">
            @error('phone')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>

          <div class="col-10 mt-3">
            <label for="email" class="form-label">Email</label>
            <input type="text" class="form-control @error('email') is-invalid" @enderror id="email" name="email" placeholder="Email" value="{{ old('email', $sekolah->email) }}">
            @error('email')
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
          <button type="submit" class="btn btn-primary">Update Data</button>
        </div>
      </form><!-- End floating Labels Form -->
    </div>

    </div>

@endsection