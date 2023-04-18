@extends('layouts.inner')
@section('containers')

<div class="card">
    <div class="card-body">
      <h5 class="card-title">Data Peminjaman Buku</h5>
      <table>
        <tr>
          <td><a href="/peminjaman-export_pdf" target="_blank" class="btn btn-secondary mb-3">
            PDF
          </a>
          <a href="/peminjaman-export_excel" class="btn btn-secondary mb-3">
            Excel
          </a></td>
        </tr>
      </table>

      @if ($peminjaman->isEmpty())
        <h6 class="card-text">Belum ada peminjaman buku</h6>
      @else

 <!-- Default Table -->
 <table class="table table-borderless datatable">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nama Sekolah</th>
        <th scope="col">No PIC</th>
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
        <td>{{ $peminjaman->user->commissariat }}</td>
        <td>0{{ $peminjaman->user->phone }}</td>
        <td>{{ \Carbon\Carbon::parse($peminjaman->tgl_pinjam)->format('d M Y') }}</td>
        <td>{{ \Carbon\Carbon::parse($peminjaman->tgl_kembali)->format('d M Y') }}</td>
        <td>
          @if($peminjaman->status=="dipinjam")
              @if(\Carbon\Carbon::today() ==  \Carbon\Carbon::parse($peminjaman->tgl_kembali)) 
              Hari ini batas akhir pengembalian buku
              @elseif(\Carbon\Carbon::today() >=  \Carbon\Carbon::parse($peminjaman->tgl_kembali))
              Pengembalian buku terlewat {{ \Carbon\Carbon::today()->diffInDays($peminjaman->tgl_kembali) }} hari           
              @else 
             Sisa Waktu Pengembalian Buku {{ \Carbon\Carbon::today()->diffInDays($peminjaman->tgl_kembali) }} hari lagi        
              @endif
              @else
              Buku telah dikembalikan
              @endif
        </td>
        <td>
          <a href="/admin/peminjaman/dipinjam/{{ $peminjaman->user_id }}"> 
              <i class="bi bi-eye"></i>
          </a>
          <form action="/admin/peminjaman/dipinjam/{{ $peminjaman->id }}" method="get" class="d-inline">
            {{-- @method('delete') --}}
            @csrf
            <button class="bi bi-trash text-danger border-0" onclick="return confirm('Apakah anda yakin untuk menghapus data?')"> </button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  @endif
  <!-- End Default Table Example -->

    </div>
</div>

@endsection
