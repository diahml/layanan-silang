<header id="header" class="header d-flex align-items-center">
  <div class="container d-flex align-items-center justify-content-between">

    <a href="/" class="logo d-flex align-items-center">
      <!-- Uncomment the line below if you also wish to use an image logo -->
      <img src="/vendors/img/logo.png" alt="">
      {{-- <img src="/vendors/img/favicon.png" alt=""> --}}

      <h1 class="d-flex align-items-center">BI-STAKA</h1>
    </a>    <!-- Uncomment below if you prefer to use an image logo -->
    <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt=""></a>-->

    <nav id="navbar" class="navbar navbar-expand-lg">
      
      <ul>
        @auth
        <li class="nav-item {{ ($active==="home" ? 'active' :'') }}"><a class="nav-link" href="/">Home</a></li>
        <li class="nav-item {{ ($active==="katalog" ? 'active' :'') }}"><a class="nav-link " href="/katalog-buku">Catalogue</a></li>
        <li class="nav-item {{ ($active==="kegiatan" ? 'active' :'') }}"><a class="nav-link" href="/blog">Blog</a></li>
        @else
        <li class="nav-item {{ ($active==="home" ? 'active' :'') }}"><a class="nav-link" href="/">Home</a></li>
        <li class="nav-item {{ ($active==="katalog" ? 'active' :'') }}"><a class="nav-link " href="/katalog-buku">Catalogue</a></li>
        <li class="nav-item {{ ($active==="kegiatan" ? 'active' :'') }}"><a class="nav-link" href="/blog">Blog</a></li>
        <li class="nav-item {{ ($active==="presence" ? 'active' :'') }}"><a class="nav-link" href="/presence">Presence</a></li>        
        @endauth
        @auth
        <li class="nav-item {{ ($active==="peminjaman" ? 'active' :'') }}"><a class="nav-link" href="/peminjaman">Peminjaman Buku</a></li>
        @endauth
      </ul>

      

      <ul class="navbar-nav ml-auto">
      
        @auth
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Welcome {{ auth()->user()->name }}
          </a>
          <ul class="dropdown-menu">
            <li>
            <form action="/logout" method="POST">
              @csrf
              <button type="submit" class="dropdown-item d-flex align-items-center bi bi-box-arrow-left" id="button-logout">
                 Logout
              </button>
            </form>
          </li>
          </ul>
        </li>
        {{-- tampilin logout, pinjaman saya --}}
        @else
       
          <li class="nav-item {{ ($active==="login" ? 'active' :'') }}">
            <a class="nav-link" href="/login"><i class="bi bi-box-arrow-right"></i> Login</a>
          </li>   
        @endauth 
        
      </ul>

        
    </nav><!-- .navbar -->

  </div>
</header>

{{-- <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
    <div class="container mt-2 mb-2">
    <a class="navbar-brand" href="/">Layanan Silang</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item {{ ($active==="home" ? 'active' :'') }}">
          <a class="nav-link" href="/">Home</a>
        </li>
        <li class="nav-item {{ ($active==="katalog" ? 'active' :'') }}">
          <a class="nav-link" href="/katalog-buku">Katalog Buku</a>
        </li>
        <li class="nav-item {{ ($active==="kegiatan" ? 'active' :'') }}">
          <a class="nav-link" href="/kegiatan">Kegiatan</a>
        </li>
        @auth
        <li class="nav-item {{ ($active==="peminjaman" ? 'active' :'') }}">
          <a class="nav-link" href="/peminjaman">Peminjaman Buku</a>
        </li>
        @endauth
      </ul>

      <ul class="navbar-nav ml-auto">
      @auth
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Welcome {{ auth()->user()->instansi }}
        </a>
        <ul class="dropdown-menu">
          <li>
          <form action="/logout" method="POST">
            @csrf
            <button type="submit" class="dropdown-item d-flex align-items-center bi bi-box-arrow-left" id="button-logout">
              Logout
            </button>
          </form>
        </li>
        </ul>
      </li>
      {{-- tampilin logout, pinjaman saya --}}
      {{-- @else
     
        <li class="nav-item {{ ($active==="login" ? 'active' :'') }}">
          <a class="nav-link" href="/login"><i class="bi bi-box-arrow-right"></i>Login</a>
        </li>   
      @endauth
    </ul>

      
      <div>
    </div>
  </nav>  --}}