@extends('layouts.inner')
@section('containers')
@if(session()->has('success'))
  <div class="alert alert-success " role="alert">
        {{ session('success') }}
  </div>
@endif
<div class="pagetitle">
  <h1>List of Members</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Members</a></li>
      <li class="breadcrumb-item active">List of Members</li>
    </ol>
  </nav>
</div><!-- End Page Title -->
            <table class="table table-borderless datatable">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Name</th>
                  <th scope="col">Commissariat</th>
                  <th scope="col">Phone</th>
                  <th scope="col">Role</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($members as $member)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $member->name }}</td>
                  <td>{{ $member->commissariat }}</td>
                  <td>0{{ $member->phone }}</td>
                  <td>
                    @if($member->is_member==1) 
                    GenBI
                    @elseif($member->is_school==1) 
                    School                  
                    @else
                    Librarian
                    @endif
                  </td>
                  <td>
                      <a  class="badge bg-info" href="/admin/membering/{{$member->id}}"><i class="bi bi-eye-fill"></i></a>
                      <a  class="badge bg-warning" href="/admin/membering/edit/{{$member->id}}"><i class="bi bi-pencil-square"></i></a>
                      <a  class="badge bg-danger" href="/admin/hapus/{{ $member->id}}" onclick="return confirm('are you sure for delete?')"><i class="bi bi-trash-fill"></i></a>
                      {{-- <form action="/admin/membering/{{$member->id}}" method="get" class="d-inline">
                      @csrf
                      <button  class="badge bg-danger border-0" onclick="return confirm('are you sure for delete?')"><i class="bi bi-trash-fill"></i>
                      </button>
                      </form> --}}
                    </td>
                </tr>
                @endforeach
              </tbody>
            </table>
@endsection