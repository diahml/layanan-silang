<!-- ======= Header ======= -->
<header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="/admin" class="logo d-flex align-items-center">
        {{-- <img src="assets/img/logo.png" alt=""> --}}
        <span class="d-none d-lg-block">Layanan Silang</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

  

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-person-fill"></i>
            <span class="d-none d-md-block dropdown-toggle ps-2">{{ auth()->user()->instansi }}</span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">

            <li>
              <form action="/logout" method="POST">
                @csrf
                <button type="submit" class="dropdown-item d-flex align-items-center bi bi-box-arrow-right" id="button-logout">
                  Logout
                </button>
              </form>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->