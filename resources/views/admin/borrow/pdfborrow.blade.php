<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="/vendors/img/favicon.png" rel="icon">
    <link href="/vendors/img/apple-touch-icon.png" rel="apple-touch-icon">
  
    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  
    <!-- Vendor CSS Files -->
    <link href="/vendors/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/vendors/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="/vendors/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="/vendors/quill/quill.snow.css" rel="stylesheet">
    <link href="/vendors/quill/quill.bubble.css" rel="stylesheet">
    <link href="/vendors/remixicon/remixicon.css" rel="stylesheet">
    <link href="/vendors/simple-datatables/style.css" rel="stylesheet">
  
    <!-- Template Main CSS File -->
    <link href="/vendors/css/style.css" rel="stylesheet">
    <style>
        table.static{
            position: relative;
            border: 1px solid #543535;
        }
    </style>
    <title>Borrows Report Library's Book</title>
</head>
<body>
    <div class="form-group">
        <p align="center"><b>Library's Book Reports</b></p>

        <table id="catalogue" class="table table-bordered" align="center" rules="all" border="1px" style="width:95%;">
        <tr>
            <th>No.</th>
            <th>Title</th>
            <th>Borrower</th>
            <th>Date of Borrow</th>
            <th>Date of Return</th>
            <th>Status</th>
        </tr>       
        @foreach($borrows as $borrow)    
        <tr>
            <td>{{ $loop->iteration}}</td>
            <td>{{ $borrow->book->title }}</td>
            <td>{{ $borrow->member->name }}</td>
            <td>{{ $borrow->borrowAt }}</td>
            <td>{{ $borrow->returnAt }}</td>
            <td>{{ $borrow->status }}</td>
        </tr>
        @endforeach
        </table>
        <div class="button p-5">
          <button type="button" class="btn btn-danger rounded-pill" onclick="printpdf()">PDF</button>
          <button type="button" class="btn btn-success rounded-pill" onclick="createxls()">CSV</button>
        </div>
    </div>
    

    <script>
        function printpdf() {
            window.print();
        }

    function createxls(){
    let rows = document.getElementsByTagName('tr');

let cells;
let csv = "";

let csvSeparator = ";"; // Sets the separator between fields
let quoteField = true; // Adds quotes around fields

let regex = /.*<img.*src="(.*?)"/i

for (let row = 0; row < rows.length; row++) {
  cells = rows[row].getElementsByTagName('td');
  if (cells.length === 0) {
    cells = rows[row].getElementsByTagName('th');
  }
  for (let cell = 0; cell < cells.length; cell++) {
    if (quoteField) { csv += '"'; }
    
    if (regex.test(cells[cell].innerHTML)) {
      csv += cells[cell].innerHTML.match(regex)[1];
    } else {
      csv += cells[cell].innerText;
    }
    
    if (quoteField) { csv += '"'; }
    
    if (cell === cells.length - 1) {
      csv += "\n";
    } else {
      csv += csvSeparator;
    }
  }
}

function downloadToFile(content, filename, contentType) {
  const a = document.createElement('a');
  const file = new Blob([content], {type: contentType});
  
  a.href = URL.createObjectURL(file);
  a.download = filename;
  
  // // To generate a link, use this:
  // a.innerHTML = "Download CSV";
  // document.body.appendChild(a);

  // If you want to automatically download then use this instead:
  
  a.click();
    URL.revokeObjectURL(a.href);
  
}

console.log(csv);

downloadToFile(csv, 'borrow-report.csv', 'text/plain');
}
    </script>
</body>
</html>