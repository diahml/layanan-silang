@extends('layouts.inner')
@section('containers')

<div class="card">
    <div class="card-body">
      <h5 class="card-title">Konfirmasi Data Permohonan Peminjaman Buku {{ $peminjaman[0]->user->instansi }}</h5>
      <table class="table table-borderless datatable">
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
        <td>{{ $peminjaman->book->title }}</td>
        <td>{{ $peminjaman->book->booknum }}</td>
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

