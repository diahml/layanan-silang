@extends('layouts.inner')
@section('containers')

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
                 <table class="table table-borderless datatable">
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
                      <td>{{ $peminjaman->user->name }}</td>
                      @if(!isset($peminjaman->book->id))
                      <td>Buku Telah dihapus</td>
                      <td>tidak terdeteksi</td>
                      <td>tidak terdeteksi</td>
                      @else
                      <td>{{ $peminjaman->book->title }}</td>
                      <td>{{ $peminjaman->book->booknum }}</td>
                      <td>{{ $peminjaman->book->backnum }}</td>
                      @endif
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