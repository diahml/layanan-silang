@extends('admin.layout.main')

@section('container')

<div class="card">
    <div class="card-body">
      <h5 class="card-title">Konfirmasi Data Permohonan Peminjaman Buku {{ $peminjaman[0]->user->instansi }}</h5>
 <table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Judul Buku</th>
        <th scope="col">No Buku</th>
        <th scope="col">Action</th>
        
        
      </tr>
    </thead>
    <tbody>
      @foreach ($peminjaman as $peminjaman)
      <tr>
        <th scope="row" id="row">{{ $loop->iteration }}</th>
        <td>{{ $peminjaman->book->judul }}</td>
        <td>{{ $peminjaman->book->no_buku }}</td>
        <td id="action_{{ $loop->iteration }}">
          <a href="/admin/peminjaman/approved/{{ $peminjaman->id }}" class="btn btn-success" id="terima">Terima</a>
          <a href="/admin/peminjaman/ditolak/{{ $peminjaman->id }}" class="btn btn-danger" id="tolak">Tolak</a>
       
        </td>
      </tr>

      @endforeach
    </tbody>
  </table>

    </div>
</div>

@endsection

