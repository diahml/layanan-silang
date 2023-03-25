@extends('admin.layout.main')

@section('container')

<div class="card">
    <div class="card-body">
        <h5 class="card-title">Data Peminjaman Buku {{ $peminjaman[0]->user->instansi }}</h5>
    
        <!-- Default Table -->
        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Judul Buku</th>
                <th scope="col">No Buku</th>
                <th scope="col">No Punggung Buku</th>
                <th scope="col">Tanggal Pinjam</th>
                <th scope="col">Tanggal Kembali</th>
                <th scope="col">Action</th>
                
            </tr>
          </thead>
          <tbody>
            @foreach ($peminjaman as $peminjaman)
            <tr>
              <th scope="row">{{ $loop->iteration }}</th>
              <td>{{ $peminjaman->book->judul }}</td>
              <td>{{ $peminjaman->book->no_buku }}</td>
              <td>{{ $peminjaman->book->npb }}</td>
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
              <a href="https://wa.me/62{{ $peminjaman->user->kontak }}?text=Halo%20{{ $peminjaman->user->instansi }},%20buku%20yang%20disetujui%20peminjamannya%20sudah%20dapat%20diambil%20di%20Perpustakaan%20Bank%20Indonesia,%20ya!%20Daftar%20buku%20yang%20disetujui%20dapat%20dilihat%20di%20halaman%20peminjaman%20buku.">Buku Dapat Diambil</a>
            </td>
          </tr>
          <tr>
            <td>
              <a href="https://wa.me/62{{ $peminjaman->user->kontak }}?text=Halo%20{{ $peminjaman->user->instansi }},%20jangan%20lupa%20batas%20akhir%20pengembalian%20buku%20di%20tanggal%20{{ \Carbon\Carbon::parse($peminjaman->tgl_kembali)->format('d M Y') }}.">Deadline Pengembalian</a>
            </td>
          </tr>
          <tr>
            <td>
              <a href="https://wa.me/62{{ $peminjaman->user->kontak }}?text=Halo%20{{ $peminjaman->user->instansi }},...">Notifikasi Lain (Custom)</a>
            </td>
          </tr>
        
      </tbody>
      </table>
      {{-- @endforeach --}}
        <!-- End Default Table Example -->
    </div>
</div>

@endsection