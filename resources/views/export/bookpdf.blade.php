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

<h1>Data Buku</h1>

<table id="buku">
  <tr>
    <th>No</th>
    <th>Judul</th>
    <th>Penulis</th>
    <th>Kategori</th>
    <th>No Buku</th>
    <th>No Punggung Buku</th>
  </tr>
  @foreach ($data as $book)
  <tr>
    <td>{{ $loop->iteration }}</td>
    <td>{{ $book->title }}</td>
    <td>{{ $book->author}}</td>
    <td>{{ $book->category->name }}</td>
    <td>{{ $book->booknum }}</td>
    <td>{{ $book->backnum }}</td>
  </tr>
  @endforeach
  
</table>

</body>
</html>


