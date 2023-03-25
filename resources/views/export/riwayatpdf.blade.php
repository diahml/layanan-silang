<!DOCTYPE html>
<html>
<head>
<style>
#buku {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#buku td, #buku th {
  border: 1px solid #ddd;
  padding: 8px;
}

#buku tr:nth-child(even){background-color: #f2f2f2;}

#buku tr:hover {background-color: #5eade1;}

#buku th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #69a9e9;
  color: white;
}
</style>
</head>
<body>

<h1>Riwayat Peminjaman Buku</h1>

<table id="buku">
  <tr>
    <th>No</th>
    <th>Nama Sekolah</th>
    <th>Judul Buku</th>
    <th>No Buku</th>
    <th>No Punggung Buku</th>
    <th>Tanggal Pinjam</th>
    <th>Tanggal Kembali</th>
  </tr>
  @foreach ($data as $peminjaman)
  <tr>
    <td>{{ $loop->iteration }}<</td>
    <td>{{ $peminjaman->user->instansi }}</td>
    <td>{{ $peminjaman->book->judul}}</td>
    <td>{{ $peminjaman->book->no_buku }}</td>
    <td>{{ $peminjaman->book->npb }}</td>
    <td>{{ \Carbon\Carbon::parse($peminjaman->tgl_pinjam)->format('d M Y') }}</td>
    <td>{{ \Carbon\Carbon::parse($peminjaman->tgl_kembali)->format('d M Y') }}</td>
  </tr>
  @endforeach
  
</table>

</body>
</html>


