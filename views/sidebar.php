<ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion toggled" id="accordionSidebar">
  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
    <div class="sidebar-brand-icon rotate-n-15">
      <i class="fas fa-truck-monster"></i>
    </div>
    <div class="sidebar-brand-text mx-3">4MyPoint</div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0" />

  <!-- Nav Item - Dashboard -->
  <li class="nav-item">
    <a class="nav-link" href="/4_my_point/index.php">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span></a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider" />

  <!-- Heading -->
  <div class="sidebar-heading">Features</div>

  <!-- Nav Item - Pages Collapse Menu -->
  <li class="nav-item">
    <a class="nav-link" href="/4_my_point/jenis_pelanggaran/index.php">
      <i class="fas fa-fw fa-book-reader"></i>
      <span>Tata Tertib Siswa</span>
    </a>
  </li>

  <!-- Nav Item - Utilities Collapse Menu -->

  <li class="nav-item">
    <a class="nav-link" href="/4_my_point/pelanggaran/index.php">
      <i class="fas fa-fw fa-pencil-ruler"> </i>
      <span>Pelanggaran</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="/4_my_point/penghargaan/index.php">
      <i class="fas fa-fw fa-trophy"></i>
      <span>Penghargaan</span>
    </a>
  </li>

  <!-- Nav Item - Tables -->
  <?php if ($_SESSION["nama_hak_akses"] !== "siswa") { ?>
    <li class="nav-item">
      <a class="nav-link" href="/4_my_point/siswa/index.php">
        <i class="fas fa-fw fa-user-graduate"></i>
        <span>Siswa</span></a>
    </li>
  <?php } ?>

  <li class="nav-item">
    <a class="nav-link" href="/4_my_point/kelas/index.php">
      <i class="fas fa-fw fa-house-user"></i>
      <span>Kelas</span></a>
  </li>

  <?php if ($_SESSION["nama_hak_akses"] !== "siswa") { ?>
    <li class="nav-item">
      <a class="nav-link" href="/4_my_point/guru/index.php">
        <i class="fas fa-fw fa-chalkboard-teacher"></i>
        <span>Guru</span></a>
    </li>
  <?php } ?>

  <li class="nav-item">
    <a class="nav-link" href="/4_my_point/laporan/index.php">
    <i class="fas fa-fw fa-download"></i>
      <span>Laporan</span></a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block" />

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>
</ul>