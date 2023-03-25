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

<h1>Data Peserta Layanan Silang</h1>

<table id="buku">
  <tr>
    <th>No</th>
    <th>Nama Sekolah</th>
    <th>Alamat</th>
    <th>No PIC</th>
  </tr>
  @foreach ($data as $sekolah)
  <tr>
    <td>{{ $loop->iteration }}<</td>
    <td>{{ $sekolah->instansi }}</td>
    <td>{{ $sekolah->alamat}}</td>
    <td>0{{ $sekolah->kontak}}</td>
  </tr>
  @endforeach
  
</table>

</body>
</html>


