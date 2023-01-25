<body id="page-top">
    <div id="wrapper">
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-text mx-3">APP PENGGAJIAN</div>
            </a>
            <hr class="sidebar-divider my-0">
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url(($this->session->userdata('hak_akses') == '1') ? 'admin/dashboard' : 'pegawai/dashboard') ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <?php 
            
            if (($this->session->userdata('hak_akses') == '1')) {
            
            ?>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-database"></i>
                    <span>Master Data</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="<?= base_url('admin/DataPegawai') ?>">Data Pegawai</a>
                        <a class="collapse-item" href="<?= base_url('admin/DataJabatan') ?>">Data Jabatan</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-money-check-alt"></i>
                    <span>Transaksi</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="<?= base_url('admin/DataAbsen') ?>">Data Absensi</a>
                        <a class="collapse-item" href="<?= base_url('admin/PotonganGaji') ?>">Potongan Gaji</a>

                        <a class="collapse-item" href="<?= base_url('admin/RekapKaryawan') ?>">Rekap Karyawan</a>
                        <a class="collapse-item" href="<?= base_url('admin/DataGaji') ?>">Data Gaji</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-copy"></i>
                    <span>Laporan</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="<?= base_url('admin/laporan_gaji') ?>">Laporan Gaji</a>
                        <a class="collapse-item" href="<?= base_url('admin/laporan_absensi') ?>">Laporan Absensi</a>
                        <a class="collapse-item" href="<?= base_url('admin/slip_gaji') ?>">Slip Gaji</a>
                    </div>
                </div>
            </li>

            <?php } else { ?>

            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('pegawai/DataGaji') ?>">
                    <i class="fas fa-money-check-alt"></i>
                    <span>Data Gaji</span></a>
            </li>

            <?php } ?>

            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('GantiPassword') ?>"> 
                    <i class="fas fa-fw fa-lock"></i>
                    <span>Ganti Password</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('Welcome/logout') ?>">
                    <i class="fas fa-fw fa-sign-out-alt"></i>
                    <span>Logout</span></a>
            </li>

            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>


        </ul>

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <h4 class="font-weight-bold">PT BJM SERVICE</h4>
                    <ul class="navbar-nav ml-auto">
                        <div class="topbar-divider d-none d-sm-block"></div>
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Selamat Datang <?= $this->session->userdata('nama_pegawai') ?></span>
                                <img class="img-profile rounded-circle" src="<?= base_url('ext/photo/' . $this->session->userdata('photo')) ?>">
                            </a>
                        </li>

                    </ul>

                </nav>