@extends('layouts.inner')
@section('containers')
@if(session()->has('success'))
  <div class="alert alert-success " role="alert">
        {{ session('success') }}
  </div>
@endif
<div class="card">
    <div class="card-body">
      <h5 class="card-title">Data Sekolah Peserta Layanan Silang </h5>
      <table>
        <tr>
          <td><a href="/admin/sekolah/create" class="btn btn-primary mb-3">Input Data Sekolah Baru</a></td>
          <td><a href="/data-sekolah-export_pdf" target="_blank" class="btn btn-secondary mb-3">
            PDF
          </a>
          <a href="/data-sekolah-export_excel" class="btn btn-secondary mb-3">
            Excel
          </a></td>
        </tr>
      </table>

      <!-- Default Table -->
      <table class="table table-borderless datatable">
        
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nama Sekolah</th>
            <th scope="col">Alamat</th>
            <th scope="col">No PIC</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($sekolah as $sekolah)
                
            <tr>
              <th scope="row">{{ $loop->iteration }}</th>
              <td>{{ $sekolah->name }}</td>
              <td>{{ $sekolah->address }}</td>
              <td>0{{ $sekolah->phone }}</td>
              <td>
                <a href="/admin/sekolah/{{ $sekolah->id }}/edit"> 
                    <i class="bi bi-pencil-square text-warning"></i>
                </a>
                <form action="/admin/sekolah/{{ $sekolah->id }}" method="post" class="d-inline">
                  @method('delete')
                  @csrf
                  <button class="bi bi-trash text-danger border-0" onclick="return confirm('Apakah anda yakin untuk menghapus data?')"> </button>
                </form>
              </td>
            </tr>

            @endforeach
        </tbody>
      </table>
      <!-- End Default Table Example -->
    </div>
  </div>


@endsection