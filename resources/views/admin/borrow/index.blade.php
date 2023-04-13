@extends('layouts.inner')
@section('containers')
@if(session()->has('success'))
  <div class="alert alert-success " role="alert">
        {{ session('success') }}
  </div>
@endif
<div class="pagetitle">
  <h1>List of Borrower</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Borrow</a></li>
      <li class="breadcrumb-item active">List of Borrower</li>
    </ol>
  </nav>
</div><!-- End Page Title -->
<div class="card">
<div class="card-body">
<table class="table table-borderless datatable">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Title</th>
        <th scope="col">Date Borrow</th>
        <th scope="col">Date Return</th>
        <th scope="col">Desc</th>
        <th scope="col">Action</th>
        <th scope="col">Status</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($borrows as $borrow)
        
        <tr>
            <td>{{ $loop->iteration }}</td>
            @if(!isset($borrow->member->id))
            <td>user isn't a member again</td>
            @else
            <td>{{ $borrow->member->name }}</td>
            @endif
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
              Member has been late for {{ \Carbon\Carbon::today()->diffInDays($borrow->returnAt) }} days           
              @else 
              {{ \Carbon\Carbon::today()->diffInDays($borrow->returnAt) }} days remaining             
              @endif
              @else
              Member has been return this book 
              @endif
            </td>
            <td>
                <a  class="badge bg-warning" href="/admin/borrow/edit/{{$borrow->id}}"><i class="bi bi-pencil-square"></i></a>
                <a  class="badge bg-danger" href="/admin/borrow/hapus/{{ $borrow->id}}" onclick="return confirm('are you sure for delete?')"><i class="bi bi-trash-fill"></i></a>
                @if(\Carbon\Carbon::today() ==  \Carbon\Carbon::parse($borrow->returnAt)) 
                <a target="_blank" class="badge bg-primary" href="https://wa.me/62{{$borrow->member->phone}}?text=Hallo {{ $borrow->member->name }}, saya dari perpustakaan Bank Indonesia Purwokerto.%0D%0A%0D%0AWaktu peminjamanmu dengan judul  hari ini sudah mencapai tenggat waktu.%0D%0A%0D%0AJangan lupa untuk mengembalikan buku ke Perpustakaan Bank Indonesia Purwokerto atau melakukan perpanjangan dengan melakukan konfirmasi ke nomor ini. Terima Kasih"><i class="ri-chat-3-fill"></i></a>
                @elseif(\Carbon\Carbon::today() >=  \Carbon\Carbon::parse($borrow->returnAt))
                <a target="_blank" class="badge bg-primary" href="https://wa.me/62{{$borrow->member->phone}}?text=Hallo {{ $borrow->member->name }}, saya dari perpustakaan Bank Indonesia Purwokerto.%0D%0A%0D%0AWaktu peminjamanmu sudah terlewat {{ \Carbon\Carbon::today()->diffInDays($borrow->returnAt) }} hari.%0D%0A%0D%0AJangan lupa untuk mengembalikan buku ke Perpustakaan Bank Indonesia Purwokerto. Terima Kasih"><i class="ri-chat-3-fill"></i></a>
                @else 
                <a target="_blank" class="badge bg-primary" href="https://wa.me/62{{$borrow->member->phone}}?text=Hallo {{ $borrow->member->name }}, saya dari perpustakaan Bank Indonesia Purwokerto.%0D%0A%0D%0AWaktu peminjamanmu tersisa {{ \Carbon\Carbon::today()->diffInDays($borrow->returnAt) }} hari lagi.%0D%0A%0D%0AJangan lupa untuk mengembalikan buku ke Perpustakaan Bank Indonesia Purwokerto. Terima Kasih"><i class="ri-chat-3-fill"></i></a>
                @endif
              </td>
              <td>
                @if($borrow->status=="borrowed")
                <a  class="badge bg-warning" href="/admin/borrow/status/{{$borrow->id}}" onclick="return confirm('is {{ $borrow->member->name }} has return the book?')">{{ $borrow->status }}</i></a>  
                @else
                <a  class="badge bg-secondary" disabled>{{ $borrow->status }}</i></a>  
                @endif
              </td>
          </tr>
        @endforeach
    </tbody>
</table>
</div>
</div>
<div class="card">
  <div class="card-body">
<table class="table table-borderless datatable">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Title</th>
      <th scope="col">Date Borrow</th>
      <th scope="col">Date Return</th>
      <th scope="col">Desc</th>
      <th scope="col">Action</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
      @foreach ($returns as $return)
      
      <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $return->member->name }}</td>
          @if(!isset($return->book->id))
          <td>book has been deleted</td>
          @else
          <td>{{ $return->book->title }}</td>
          @endif
          <td>{{ date("d-m-Y", strtotime($return->borrowAt)) }}</td>
          <td>{{ date("d-m-Y", strtotime($return->returnAt)) }}</td>
          <td> 
            @if($return->status=="borrowed")
            @if(\Carbon\Carbon::today() ==  \Carbon\Carbon::parse($return->returnAt)) 
            This is due date
            @elseif(\Carbon\Carbon::today() >=  \Carbon\Carbon::parse($return->returnAt))
            Member has been late for {{ \Carbon\Carbon::today()->diffInDays($return->returnAt) }} days           
            @else 
            {{ \Carbon\Carbon::today()->diffInDays($return->returnAt) }} days remaining             
            @endif
            @else
            Member has been return this book 
            @endif
          </td>
          <td>
              <a  class="badge bg-warning" href="/admin/borrow/edit/{{$return->id}}"><i class="bi bi-pencil-square"></i></a>
              <a  class="badge bg-danger" href="/admin/borrow/hapus/{{ $return->id}}" onclick="return confirm('are you sure for delete?')"><i class="bi bi-trash-fill"></i></a>
              <a  class="badge bg-primary" href="https://wa.me/62{{$return->member->phone}}?text=Hallo {{$return->member->name}} 👋, Saya {{auth()->user()->name}} dari Perpustakaan Bank Indonesia Purwokerto mengingatkan bahwa masa peminjaman buku tersisa {{\Carbon\Carbon::today()->diffInDays($return->returnAt)}} hari lagi. Jangan lupa untuk mengembalikan buku ke Perpustakaan Bank Indonesia Purwokerto segera~ 💫"><i class="ri-chat-3-fill"></i></a>
              {{-- <form action="/admin/membering/{{$return->id}}" method="get" class="d-inline">
              @csrf
              <button  class="badge bg-danger border-0" onclick="return confirm('are you sure for delete?')"><i class="bi bi-trash-fill"></i>
              </button>
              </form> --}}
            </td>
            <td>
              @if($return->status=="borrowed")
              <a  class="badge bg-warning" href="/admin/borrow/status/{{$return->id}}" onclick="return confirm('is {{ $return->member->name }} has return the book?')">{{ $return->status }}</i></a>  
              @else
              <a  class="badge bg-secondary" disabled>{{ $return->status }}</i></a>  
              @endif
            </td>
        </tr>
      @endforeach
  </tbody>
</table>
</div>
</div>
@endsection