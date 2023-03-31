@extends('layouts.inner')
@section('containers')
@if(session()->has('success'))
  <div class="alert alert-success " role="alert">
        {{ session('success') }}
  </div>
@endif
<div class="pagetitle">
  <h1>List of Visitors</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a>List of visitors</a></li>
      <li class="breadcrumb-item active">Page</li>
    </ol>
  </nav>
</div><!-- End Page Title -->
            <table class="table table-borderless datatable">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Name</th>
                  <th scope="col">Institution</th>
                  <th scope="col">Phone</th>
                  <th scope="col">Time</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($presence as $pres)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $pres->name }}</td>
                  <td>{{ $pres->institution }}</td>
                  <td>0{{ $pres->phone}}</td>
                  <td>{{ $pres->created_at->diffForHumans() }}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
@endsection