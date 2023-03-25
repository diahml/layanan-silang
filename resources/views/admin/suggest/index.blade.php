@extends('layouts.inner')
@section('containers')
@if(session()->has('success'))
  <div class="alert alert-success " role="alert">
        {{ session('success') }}
  </div>
@endif
            <table class="table table-borderless datatable">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Title</th>
                  <th scope="col">Author</th>
                  <th scope="col">Status</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($suggests as $suggest)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $suggest->title }}</td>
                  <td>{{ $suggest->author}}</td>
                  <td>
                    <a  class="badge bg-warning" href="/admin/suggest/approve/{{$suggest->id}}" onclick="return confirm('{{ $suggest->title }} by {{ $suggest->author }} already exist')">Approve</i></a>  
                  </td>
                  <td>
                    <a  class="badge bg-danger" href="/admin/suggest/delete/{{$suggest->id}}" onclick="return confirm('are you sure for delete this suggestion?')"><i class="bi bi-trash-fill"></i></a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
@endsection