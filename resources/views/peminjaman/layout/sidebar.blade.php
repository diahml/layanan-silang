<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link collapsed{{ ($active==="peminjaman" ? '.active' :'') }}" href="/peminjaman">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed{{ ($active==="riwayat" ? '.active' :'') }}" href="/peminjaman/riwayat">
          <i class="bi bi-card-checklist"></i>
          <span>Riwayat Peminjaman</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed{{ ($active==="pinjam" ? '.active' :'') }}" href="/peminjaman/peraturan">
          <i class="bi bi-card-checklist"></i>
          <span>Pinjam Buku</span>
        </a>
      </li>

     

    </ul>

  </aside><!-- End Sidebar-->