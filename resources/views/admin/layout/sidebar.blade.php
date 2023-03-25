<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link collapsed{{ ($active==="admin" ? '.active' :'') }}" href="/admin/dashboard">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed{{ ($active==="admin/buku" ? '.active' :'') }}" data-bs-target="#book-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-book"></i><span>Data Buku</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="book-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="/admin/buku">
              <i class="bi bi-circle"></i><span>Data Buku</span>
            </a>
          </li>
          <li>
            <a href="/admin/buku/kategori">
              <i class="bi bi-circle"></i><span>Kategori Buku</span>
            </a>
          </li>
        </ul>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed{{ ($active==="admin/peminjaman" ? '.active' :'') }}" data-bs-target="#peminjaman-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-book"></i><span>Data Peminjaman Buku</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="peminjaman-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="/admin/peminjaman">
              <i class="bi bi-circle"></i><span>Permohonan Peminjaman Buku</span>
            </a>
          </li>
          <li>
            <a href="/admin/peminjaman/dipinjam">
              <i class="bi bi-circle"></i><span>Peminjaman Buku</span>
            </a>
          </li>
          <li>
            <a href="/admin/peminjaman/riwayat">
              <i class="bi bi-circle"></i><span>Riwayat Peminjaman</span>
            </a>
          </li>
        </ul>

        {{-- <a class="nav-link collapsed" href="/admin/peminjaman">
          <i class="bi bi-card-checklist"></i>
          <span>Data Peminjaman Buku</span>
        </a> --}}
      </li><!-- End Buku Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed{{ ($active==="admin/kegiatan" ? '.active' :'') }}" data-bs-target="#kegiatan-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-calendar-event"></i><span>Data Blog</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="kegiatan-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="/admin/kegiatan">
              <i class="bi bi-circle"></i><span>Data Blog</span>
            </a>
          </li>
          <li>
            <a href="/admin/kegiatan/kategori">
              <i class="bi bi-circle"></i><span>Kategori Blog</span>
            </a>
          </li>
        </ul>
      </li>

      {{-- <li class="nav-item">
        <a class="nav-link collapsed" href="/admin/profil">
          <i class="bi bi-file-earmark-person"></i>
          <span>Profil Perpustakaan</span>
        </a>
      </li><!-- End Profil Page Nav --> --}}

      <li class="nav-item">
        <a class="nav-link collapsed{{ ($active==="admin/sekolah" ? '.active' :'') }}" href="/admin/sekolah">
          <i class="bi bi-building"></i>
          <span>Data Peserta Layanan Silang</span>
        </a>
      </li><!-- End Peserta Page Nav -->


    </ul>

  </aside><!-- End Sidebar-->