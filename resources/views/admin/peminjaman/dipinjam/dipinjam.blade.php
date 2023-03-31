@extends('layouts.inner')
@section('containers')

<div class="card">
    <div class="card-body">
        <h5 class="card-title">Data Peminjaman Buku {{ $peminjaman[0]->user->instansi }}</h5>
    
        <!-- Default Table -->
        <table class="table table-borderless datatable">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Judul Buku</th>
                <th scope="col">No Buku</th>
                <th scope="col">No Punggung Buku</th>
                <th scope="col">Tanggal Pinjam</th>
                <th scope="col">Tanggal Kembali</th>
                <th scope="col">Deskripsi</th>
                <th scope="col">Action</th>
                
            </tr>
          </thead>
          <tbody>
            @foreach ($peminjaman as $peminjaman)
            <tr>
              <th scope="row">{{ $loop->iteration }}</th>
              <td>{{ $peminjaman->book->title }}</td>
              <td>{{ $peminjaman->book->booknum }}</td>
              <td>{{ $peminjaman->book->backnum }}</td>
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
              <td>{{ \Carbon\Carbon::parse($peminjaman->tgl_pinjam)->format('d M Y') }}</td>
              <td>{{ \Carbon\Carbon::parse($peminjaman->tgl_kembali)->format('d M Y') }}</td>
              <td><a href="/admin/peminjaman/dikembalikan/{{ $peminjaman->id }}" class="btn btn-primary">Dikembalikan</a></td>
            </tr>
            @endforeach
          </tbody>
        </table>
        {{-- @foreach ($peminjaman as $peminjaman) --}}
        <table>
          <thead>
            <tr>
              <th scope="col">Kirim Notifikasi</th>
          </tr>
        </thead>
          <tbody>
          <tr>
            <td scope="row">
              <a href="https://wa.me/62{{ $peminjaman->user->phone }}?text=Halo%20{{ $peminjaman->user->name }},%20buku%20yang%20disetujui%20peminjamannya%20sudah%20dapat%20diambil%20di%20Perpustakaan%20Bank%20Indonesia,%20ya!%20Daftar%20buku%20yang%20disetujui%20dapat%20dilihat%20di%20halaman%20peminjaman%20buku.">Buku Dapat Diambil</a>
            </td>
          </tr>
          <tr>
            <td>
              <a href="https://wa.me/62{{ $peminjaman->user->phone }}?text=Hallo {{ $peminjaman->user->name }}, saya dari perpustakaan Bank Indonesia Purwokerto.%0D%0A%0D%0AWaktu peminjamanmu tersisa {{ \Carbon\Carbon::today()->diffInDays($peminjaman->tgl_kembali) }} hari lagi.%0D%0A%0D%0AJangan lupa untuk mengembalikan buku ke Perpustakaan Bank Indonesia Purwokerto. Terima Kasih">Deadline Pengembalian Buku</a>
            </td>
          </tr>
          <tr>
            <td>
              <a href="https://wa.me/62{{ $peminjaman->user->phone }}?text=Halo%20{{ $peminjaman->user->name }},...">Notifikasi Lain (Custom)</a>
            </td>
          </tr>
        
      </tbody>
      </table>
      {{-- @endforeach --}}
        <!-- End Default Table Example -->
    </div>
</div>

@endsection