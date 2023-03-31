@extends('layouts.inner')
@section('containers')
@if(session()->has('success'))
  <div class="alert alert-success " role="alert">
        {{ session('success') }}
  </div>
@endif
<div class="pagetitle">
  <h1>List of Registers</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Members</a></li>
      <li class="breadcrumb-item active">List of Registers</li>
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
                  <th scope="col">ID Card</th>
                  <th scope="col">Role</th>
                  <th scope="col">Action</th>
                  <th scope="col">Approval</th>    
                  <th scope="col">Email</th>    
                </tr>
              </thead>
              <tbody>
                @foreach ($registers as $register)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $register->name }}</td>
                  <td>{{ $register->commissariat }}</td>
                  <td>0{{ $register->phone }}</td>
                  <td><img src="{{ asset('storage/'. $register->idcard) }}" class="img-fluid" style="width: 15rem; height: 10rem;"></td>
                  <td>
                    @if($register->is_member==1) 
                    GenBI
                    @elsif($register->is_admin==1) 
                    @else 
                    Librarian
                    @endif
                  </td>
                  <td>
                      <a  class="badge bg-danger" href="/admin/membering/delete/{{$register->id}}" onclick="return confirm('are you sure for delete?')"><i class="bi bi-trash-fill"></i></a>
                  </td>
                  <td>
                    <a  class="badge bg-warning" href="/admin/membering/approve/{{$register->id}}" onclick="return confirm('make {{ $register->name }} as a member?')">Approve</i></a>  
                  </td>
                  <td>                    
                    <a target="_blank" href="https://mail.google.com/mail/?view=cm&fs=1&to={{$register->email}}&su=Membership of Bank Indonesia Purwokerto's Library&body=Halo {{$register->name}}, kami ingin memberitahukan bahwa kamu secara resmi menjadi anggota dari Perpustakaan Bank Indonesia Kantor Perwakilan Purwokerto. Sebagai anggota, kamu dapat login ke web Bibrary untuk melihat katalog buku dan melihat riwayat peminjaman buku.%0D%0A %0D%0AUntuk melakukan login, kamu dapat menggunakan email yang didaftarkan dan password berupa nomor telepon yang didaftarkan.%0D%0A %0D%0ASekarang kamu bisa meminjam buku di perpustakaan. Adapun ketentuan peminjaman buku di Perpustakaan Bank Indonesia Kantor Perwakilan Purwokerto:%0D%0A %0D%0A1. Anggota diizinkan meminjam buku maksimal sebanyak 3 buku selama masa peminjaman buku %0D%0A2. Masa peminjaman buku yaitu 2 minggu dan dapat diperpanjang maksimal 1 kali perpanjangan %0D%0A3. Jika buku yang dipinjam hilang, rusak, dsb maka peminjam diwajibkan mengganti buku yang sama atau buku dengan kategori yang sama">Email</a>  
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
@endsection