@extends('admin.layout.main')

@section('container')

@section('container')

<div class="card">
    <div class="card-body">
      <h5 class="card-title">Riwayat Peminjaman Buku</h5>
      <table>
        <tr>
          <td><a href="/riwayat-export_pdf" target="_blank" class="btn btn-secondary mb-3">
            PDF
          </a>
          <a href="/riwayat-export_excel" class="btn btn-secondary mb-3">
            Excel
          </a></td>
        </tr>
      </table>

      @if ($peminjaman->isEmpty())
      <h6 class="card-text">Belum ada riwayat peminjaman buku</h6>
      @else
     
                 <!-- Default Table -->
                 <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                    <th scope="col">Nama Sekolah</th>
                      <th scope="col">Judul Buku</th>
                      <th scope="col">No Buku</th>
                      <th scope="col">No Punggung Buku</th>
                      <th scope="col">Tanggal Pinjam</th>
                      <th scope="col">Tanggal Kembali</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($peminjaman as $peminjaman)
                    <tr>
                      <th scope="row">{{ $loop->iteration}}</th>
                      <td>{{ $peminjaman->user->instansi }}</td>
                      <td>{{ $peminjaman->book->judul }}</td>
                      <td>{{ $peminjaman->book->no_buku }}</td>
                      <td>{{ $peminjaman->book->npb }}</td>
                      <td>{{ \Carbon\Carbon::parse($peminjaman->tgl_pinjam)->format('d M Y') }}</td>
                      <td>{{ \Carbon\Carbon::parse($peminjaman->tgl_kembali)->format('d M Y') }}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                <!-- End Default Table Example -->
      @endif

      



    </div>
</div>

@endsection