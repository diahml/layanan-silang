@extends('admin.layout.main')

@section('container')
<div class="pagetitle">
  <h1>Dashboard</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item active">Perpustakaan Bank Indonesia Kantor Perwakilan Purwokerto</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section dashboard">
  <div class="row">

    <!-- Left side columns -->
    <div class="col-lg-12">
      <div class="row">

        <!-- Sekolah Card -->
        <div class="col-xxl-4 col-md-6">
          <div class="card info-card sales-card">

            <div class="card-body">
              <h5 class="card-title">Jumlah Sekolah Peserta Layanan Silang</span></h5>

              <div class="d-flex align-items-center">
                <div class="ps-3">
                  <h6>{{$sekolah}}</h6>
                </div>
              </div>
            </div>

          </div>
        </div>

        <!-- Buku Card -->
        <div class="col-xxl-4 col-md-6">
          <div class="card info-card revenue-card">

            <div class="card-body">
              <h5 class="card-title">Jumlah Buku</span></h5>

              <div class="d-flex align-items-center">
                <div class="ps-3">
                  <h6>{{ $book }}</h6>
                </div>
              </div>
            </div>

          </div>
        </div><!-- End Revenue Card -->

        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Data Peminjaman Buku</h5>

              <!-- Table with stripped rows -->
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Sekolah</th>
                    <th scope="col">Judul Buku</th>
                    <th scope="col">Tanggal Pinjam</th>
                    <th scope="col">Tanggal Kembali</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($peminjaman as $peminjaman)
                  <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $peminjaman->user->instansi }}</td>
                    <td>judul</td>
                    <td>{{ \Carbon\Carbon::parse($peminjaman->tgl_pinjam)->format('d M Y') }}</td>
                    <td>{{ \Carbon\Carbon::parse($peminjaman->tgl_kembali)->format('d M Y') }}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>

  </div>
</section>

@endsection