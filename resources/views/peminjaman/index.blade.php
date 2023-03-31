{{-- @extends('layout.main') --}}
@extends('peminjaman.layout.main')
@extends('partial.link')

@section('container')

<div class="card">
    <div class="card-body">
      @if ($peminjamanApproved->isEmpty())
      <h5 class="card-title">Pengajuan Peminjaman Buku</h5>
        @if($peminjaman->isEmpty())
        <h6 class="card-text">Belum ada pengajuan peminjaman buku</h6>
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
            <th scope="row">{{ $loop->iteration }}</th>
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
      @endif
      <!-- End Default Table Example -->

      @else
        
      <h5 class="card-title">Data Peminjaman Buku Saya</h5>
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
            <th scope="col">Deskripsi</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
         
          @foreach ($peminjamanApproved as $peminjaman)
          <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            {{-- <td>{{ $peminjaman->user->instansi }}</td>
            <td>{{ $peminjaman->user->kontak }}</td> --}}
            <td>{{ $peminjaman->book->title }}</td>
            <td>{{ $peminjaman->book->booknum }}</td>
            <td>{{ $peminjaman->book->backnum }}</td>
            <td>{{ \Carbon\Carbon::parse($peminjaman->tgl_pinjam)->format('d M Y') }}</td>
            <td>{{ \Carbon\Carbon::parse($peminjaman->tgl_kembali)->format('d M Y') }}</td> 
            <td>
              @if($peminjaman->status=="dipinjam")
              @if(\Carbon\Carbon::today() ==  \Carbon\Carbon::parse($peminjaman->tgl_kembali)) 
              Hari ini batas akhir pengembalian buku
              @elseif(\Carbon\Carbon::today() >=  \Carbon\Carbon::parse($peminjaman->tgl_kembali))
              Pengembalian buku terlewat {{ \Carbon\Carbon::today()->diffInDays($borrow->tgl_kembali) }} hari           
              @else 
             Sisa Waktu Pengembalian Buku {{ \Carbon\Carbon::today()->diffInDays($peminjaman->tgl_kembali) }} hari lagi        
              @endif
              @else
              Buku telah dikembalikan
              @endif
            </td>
            @if ($peminjaman->ke === 1)  
            <td><a href="/peminjaman/{{ $peminjaman->id }}/edit" class="btn btn-primary">Perpanjang</a></td>  
            @else
            <td>-</td>  
            @endif      
          </tr>
          @endforeach
          {{-- @endif --}}

        </tbody>
      </table>


      
      <!-- End Default Table Example -->

      @endif



    </div>
</div>

@endsection