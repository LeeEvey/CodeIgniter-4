<ul class="navbar-nav bg-gradient-dark sidebar sidebar-light accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
            <i class="fas fa-home"></i>
        </div>
        <div class="sidebar-brand-text mx-3">BPC Admin</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Admin
    </div>

    <!-- Nav Item - Edit Profile -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('home'); ?>">
            <i class="fas fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-table"></i>
            <span>Data Master</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="<?= base_url('dataMaster'); ?>">Data Member</a>
                <a class="collapse-item" href="<?= base_url('dataMaster'); ?>/dataProyek">Data Proyek</a>
                <a class="collapse-item" href="<?= base_url('dataMaster'); ?>/dataProspek">Data & Status Prospek</a>
                <a class="collapse-item" href="<?= base_url('dataMaster'); ?>/dataFasilitas">Fasilitas Properti</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Edit Profile -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('komisi'); ?>">
            <i class="fas fa-money-check-alt"></i>
            <span>Komisi</span></a>
    </li>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-envelope"></i>
            <span>Pesan</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="<?= base_url('home'); ?>/pesanBroadcast">Broadcast</a>
                <a class="collapse-item" href="<?= base_url('home'); ?>/pesanDirect">Direct Message</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse" aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-sticky-note"></i>
            <span>Laporan</span>
        </a>
        <div id="collapse" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="<?= base_url('laporan'); ?>">Laporan Prospek</a>
                <a class="collapse-item" href="<?= base_url('laporan'); ?>/pengguna">Laporan Pengguna</a>
                <a class="collapse-item" href="<?= base_url('laporan'); ?>/komisi">Laporan Komisi</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Pages" aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-toolbox"></i>
            <span>Tools Maintenance</span>
        </a>
        <div id="Pages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="<?= base_url('maintenance'); ?>">Manage User & Role</a>
                <a class="collapse-item" href="<?= base_url('maintenance'); ?>/maintenance">Backup, Restore, Import Data</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>