@extends('layouts.inner')
@section('containers')
@if(session()->has('success'))
  <div class="alert alert-success " role="alert">
        {{ session('success') }}
  </div>
@endif
<div class="pagetitle">
  <h1>History My Borrow</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">History My Borrow</a></li>
      <li class="breadcrumb-item active">Page</li>
    </ol>
  </nav>
</div><!-- End Page Title -->
  <div class="card">
    <div class="card-body">
    <table class="table table-borderless datatable">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Date Borrow</th>
            <th scope="col">Date Return</th>
            <th scope="col">Desc</th>
            <th scope="col">Status</th>
            <th scope="col">Review</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($borrows as $borrow)
            
            <tr>
                <td>{{ $loop->iteration }}</td>
                @if(!isset($borrow->book->id))
                <td>book has been deleted</td>
                @else
                <td>{{ $borrow->book->title }}</td>
                @endif
                <td>{{ date("d-m-Y", strtotime($borrow->borrowAt)) }}</td>
                <td>{{ date("d-m-Y", strtotime($borrow->returnAt)) }}</td>
                <td> 
                  @if($borrow->status=="borrowed")
                  @if(\Carbon\Carbon::today() ==  \Carbon\Carbon::parse($borrow->returnAt)) 
                  This is due date
                  @elseif(\Carbon\Carbon::today() >=  \Carbon\Carbon::parse($borrow->returnAt))
                  You has been late for {{ \Carbon\Carbon::today()->diffInDays($borrow->returnAt) }} days           
                  @else 
                  {{ \Carbon\Carbon::today()->diffInDays($borrow->returnAt) }} days remaining             
                  @endif
                  @else
                  You has been return this book {{ $borrow->created_at->diffForHumans() }}
                  @endif
                </td>
                
                  <td>
                    @if($borrow->status=="borrowed")
                    <a  class="badge bg-warning" disabled>{{ $borrow->status }}</i></a>  
                    @else
                    <a  class="badge bg-secondary" disabled>{{ $borrow->status }}</i></a>  
                    @endif
                  </td>
                  <td>
                    @if($borrow->reviews==0)
                    <a href="/member/review/create/{{$borrow->book->id}}"  class="badge bg-success">Review</i></a>  
                    @else
                    <a class="badge bg-secondary">Reviewed</i></a>  
                    @endif
                  </td>
              </tr>
            @endforeach
        </tbody>
    </table>
    </div>
    </div>
    
  @endsection