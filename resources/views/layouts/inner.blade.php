<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>{{ $title }}</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
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
   {{-- trix --}}
   <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
   <script type="text/javascript" src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>
   <style>
     trix-toolbar [data-trix-button-group ='file-tools']{
       display: none;
     }

     
     
   </style>

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.4.1
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">
    @can('admin')
    <div class="d-flex align-items-center justify-content-between">
      <a href="/admin/dashboard" class="logo d-flex align-items-center">
        <img src="/vendors/img/logo.png" alt="">
        <span class="d-none d-lg-block">BI-STAKA</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->
    @endcan
    @can('member')
    <div class="d-flex align-items-center justify-content-between">
      <a href="/member/frontpage" class="logo d-flex align-items-center">
        <img src="/vendors/img/logo.png" alt="">
        <span class="d-none d-lg-block">BI-STAKA</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->
    @endcan
    

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->

        

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="/vendors/img/profile-img.jpg" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2">{{ auth()->user()->name }}</span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>{{ auth()->user()->name }}</h6>
              <span>{{ auth()->user()->commissariat}}</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              @if(auth()->user()->is_admin==1)
              <a class="dropdown-item d-flex align-items-center" href="/admin/membering/show/{{ auth()->user()->id }}">
              @else
              <a class="dropdown-item d-flex align-items-center" href="/member/frontpage/show/{{ auth()->user()->id }}">
              @endif
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <hr class="dropdown-divider">
            <li>
              <a class="dropdown-item d-flex align-items-center" href="/">
                <i class="bi bi-globe2"></i>
                <span>Profile Site</span>
              </a>
            </li>
            <li>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
                <form action='/logout' method="POST">
                    @csrf
                      <button type="submit" class="dropdown-item">Logout</button>
                  </form>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">
    @can('admin')
    <li class="nav-heading">Librarian</li>
      <li class="nav-item">
        <a class="nav-link <?php if($title != "Dashboard") echo "collapsed";?>" href="/admin/dashboard">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link {{ ($active ==="list-borrow" ? '' :'collapsed') }}" data-bs-target="#borrow-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Borrow</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="borrow-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="/admin/borrow">
              <i class="bi bi-circle"></i><span>List of Borrower Member</span>
            </a>
          </li>
          <li>
            <a href="/admin/peminjaman/dipinjam">
              <i class="bi bi-circle"></i><span>List of Borrower School</span>
            </a>
          </li>
          <li>
            <a href="/admin/peminjaman">
              <i class="bi bi-circle"></i><span>List of Request Borrower School</span>
            </a>
          </li>
          <li>
            <a href="/admin/borrow/create">
              <i class="bi bi-circle"></i><span>Form Request Borrow</span>
            </a>
          </li>
          <li>
            <a href="/admin/borrow/pdfborrow" target="_blank">
              <i class="bi bi-circle"></i><span>Report</span>
            </a>
        </li>
        </ul>
      </li><!-- End Components Nav -->

      <li class="nav-item">
        <a class="nav-link {{ ($active ==="data-visitor" ? '' :'collapsed') }}" data-bs-target="#visitor-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Visitors</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="visitor-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="/admin/visitor">
              <i class="bi bi-circle"></i><span>List of Visitors</span>
            </a>
          </li>
          <li>
            <a href="/admin/visitor/pdfvisitor"  target="_blank">
              <i class="bi bi-circle"></i><span>Report</span>
            </a>
          </li>
        </ul>
      </li><!-- End Forms Nav -->
      
      <li class="nav-item">
        <a class="nav-link {{ ($active ==="data-member" ? '' :'collapsed') }}" href="/admin/membering/index" data-bs-target="#member-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-layout-text-window-reverse"></i><span>Members</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="member-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="/admin/membering/register">
              <i class="bi bi-circle"></i><span>List of Register</span>
            </a>
          </li>
          <li>
            <a href="/admin/membering">
              <i class="bi bi-circle"></i><span>List of Member</span>
            </a>
          </li>
          <li>
            <a href="/admin/membering/create">
              <i class="bi bi-circle"></i><span>Add New Member</span>
            </a>
          </li>
          <li>
            <a href="/admin/membering/pdfmember"  target="_blank">
              <i class="bi bi-circle"></i><span>Report</span>
            </a>
          </li>
        </ul>
      </li><!-- End Tables Nav -->

      <li class="nav-item">
        <a class="nav-link  {{ ($active ==="data-school" ? '' :'collapsed') }}" data-bs-target="#school-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-layout-text-window-reverse"></i><span>School</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="school-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="/admin/sekolah">
              <i class="bi bi-circle"></i><span>List of School</span>
            </a>
          </li>
        </ul>
      </li>

      <li class="nav-item">
        <a class="nav-link  {{ ($active ==="data-book" ? '' :'collapsed') }}" data-bs-target="#katalogue-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-layout-text-window-reverse"></i><span>Katalogue</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="katalogue-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="/admin/buku">
              <i class="bi bi-circle"></i><span>List of Books</span>
            </a>
          </li>
          <li>
            <a href="/admin/suggest">
              <i class="bi bi-circle"></i><span>List of Preorder Books</span>
            </a>
          </li>

          <li>
            <a href="/admin/katalogue/review">
              <i class="bi bi-circle"></i><span>List of Book's Reviews</span>
            </a>
          </li>
          <li>
            <a href="/admin/buku/create" >
              <i class="bi bi-circle"></i><span>Input New Book</span>
            </a>
          </li>
          <li>
            <a href="/admin/category/create">
              <i class="bi bi-circle"></i><span>Input New Category</span>
            </a>
          </li>
          <li>
            <a href="/admin/katalogue/pdfcatalogue" target="_blank">
              <i class="bi bi-circle"></i><span>Report</span>
            </a>
          </li>
        </ul>
      </li><!-- End Tables Nav -->

      <li class="nav-item">
        <a class="nav-link  {{ ($active ==="data-post" ? '' :'collapsed') }}" data-bs-target="#post-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-layout-text-window-reverse"></i><span>Post</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="post-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="/admin/post">
              <i class="bi bi-circle"></i><span>List of Post</span>
            </a>
          </li>
          <li>
            <a href="/admin/post/kategori">
              <i class="bi bi-circle"></i><span>List of Post Categories</span>
            </a>
          </li>
        </ul>
      </li>

      {{-- <li class="nav-item">
        <a class="nav-link  {{ ($active ==="data-book" ? '' :'collapsed') }}" data-bs-target="#katalogue-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-layout-text-window-reverse"></i><span>Diah</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="katalogue-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="/admin/buku">
              <i class="bi bi-circle"></i><span>List of Books</span>
            </a>
          </li>
          <li>
            <a href="/admin/suggest">
              <i class="bi bi-circle"></i><span>List of Preorder Books</span>
            </a>
          </li>

          <li>
            <a href="/admin/katalogue/review">
              <i class="bi bi-circle"></i><span>List of Book's Reviews</span>
            </a>
          </li>
          <li>
            <a href="/admin/katalogue/create" >
              <i class="bi bi-circle"></i><span>Input New Book</span>
            </a>
          </li>
          <li>
            <a href="/admin/category/create">
              <i class="bi bi-circle"></i><span>Input New Category</span>
            </a>
          </li>
          <li>
            <a href="/admin/katalogue/pdfcatalogue" target="_blank">
              <i class="bi bi-circle"></i><span>Report</span>
            </a>
          </li>
        </ul>
      </li><!-- End Tables Nav --> --}}
@endcan
@can('member')
      <li class="nav-heading">Member</li>
      <li class="nav-item">
        <a class="nav-link  {{ ($active ==="frontpage" ? '' :'collapsed') }} " href="/member/frontpage">
          <i class="bi bi-grid"></i>
          <span>Front Page</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link  {{ ($active ==="history-page" ? '' :'collapsed') }} " href="/member/historyborrow">
          <i class="bi bi-grid"></i>
          <span>History My Borrows</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link  {{ ($active ==="suggest" ? '' :'collapsed') }} " href="/member/suggest/create">
          <i class="bi bi-grid"></i>
          <span>Preorder Book</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link  {{ ($active ==="history-review" ? '' :'collapsed') }} " href="/member/review">
          <i class="bi bi-grid"></i>
          <span>History My Reviews</span>
        </a>
      </li><!-- End Dashboard Nav -->
@endcan
    </ul>

  </aside><!-- End Sidebar-->
  <main id="main" class="main">
  <section class="section">
        <div class="card">
          <div class="card-body">
            @yield('containers')
          </div>
        </div>
  </section>
  </main>
  <!-- ======= Footer ======= -->
  

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="/vendors/apexcharts/apexcharts.min.js"></script>
  <script src="/vendors/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="/vendors/chart.js/chart.min.js"></script>
  <script src="/vendors/echarts/echarts.min.js"></script>
  <script src="/vendors/quill/quill.min.js"></script>
  <script src="/vendors/simple-datatables/simple-datatables.js"></script>
  <script src="/vendors/tinymce/tinymce.min.js"></script>
  <script src="/vendors/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="/vendors/js/mains.js"></script>

  <script>
    function myFunction() {
    var input, filter, cards, cardContainer, h5, title, i;
    input = document.getElementById("myFilter");
    filter = input.value.toUpperCase();
    cardContainer = document.getElementById("myItems");
    cards = cardContainer.getElementsByClassName("tr");
    for (i = 0; i < cards.length; i++) {
        title = cards[i].querySelector("td.td");
        if (title.innerText.toUpperCase().indexOf(filter) > -1) {
            cards[i].style.display = "";
        } else {

            cards[i].style.display = "none";
        }
    }
}
    </script>

</body>

</html>