{{-- @extends('layout.main') --}}
@extends('peminjaman.layout.main')
@extends('partial.link')

@section('container')

<div class="card">
    <div class="card-body">
      <h5 class="card-title">Riwayat Peminjaman Buku</h5>

      @if ($peminjaman->isEmpty())
      <h6 class="card-text">Belum ada riwayat peminjaman buku</h6>
      @else
     
                 <!-- Default Table -->
                 <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      {{-- <th scope="col">Nama Sekolah</th>
                      <th scope="col">No PIC</th> --}}
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
                      <th scope="row">1</th>
                      {{-- <td>{{ $peminjaman->user->instansi }}</td>
                      <td>{{ $peminjaman->user->kontak }}</td> --}}
                      <td>{{ $peminjaman->book->title }}</td>
                      <td>{{ $peminjaman->book->booknum }}</td>
                      <td>{{ $peminjaman->book->backnum }}</td>
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