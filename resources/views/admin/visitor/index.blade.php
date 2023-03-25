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
                  <td>{{ $pres->phone}}</td>
                  <td>{{ $pres->created_at->diffForHumans() }}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
@endsection