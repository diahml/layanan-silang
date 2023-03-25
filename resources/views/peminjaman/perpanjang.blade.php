@extends('admin.layout.main')

@section('container')

<div class="card">
    <div class="card-body">
      <h5 class="card-title">Perpanjangan Peminjaman Buku</h5>

<form method="post" action="/peminjaman/{{ $peminjaman->id}}">
  @method('put')
    @csrf
      <!-- Floating Labels Form -->
      <form class="row g-3">
        @csrf
        <div class="col-10 mt-3">
            <div class="row mb-3">
                <p>Mohon samakan tanggal kembali untuk semua buku yang akan diperpanjang</p>
                <label for="tgl_kembali" class="col-sm-2 col-form-label">Tanggal Kembali</label>
                <div class="col-sm-8">
                  <input type="date" class="form-control" id="tgl_kembali" name="tgl_kembali">
                </div>
              </div>
        </div>

        <div class="mt-3">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form><!-- End floating Labels Form -->
    </div>

    </div>

@endsection