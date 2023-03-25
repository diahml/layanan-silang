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

<h1>Data Kategori Buku</h1>

<table id="buku">
  <tr>
    <th>No</th>
    <th>Kelas</th>
  </tr>
  @foreach ($data as $book_category)
  <tr>
    <td>{{ $loop->iteration }}</td>
    <td>{{ $book_category->kelas }}</td>
  </tr>
  @endforeach
  
</table>

</body>
</html>


