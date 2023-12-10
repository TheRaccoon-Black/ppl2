<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light " style="z-index:99;width:100%; position:fixed">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                <p><?php echo anchor('login/logout', '<button class="btn btn-danger">Log Out</button>'); ?></p>

                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Contact</a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4" style="z-index:99; position:fixed">
            <!-- Brand Logo -->
            <a href="index3.html" class="brand-link">
                <!-- <img src="<?= base_url('assets/templates/')?>dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
                <img src="<?= base_url('assets/templates/dist')?>/img/logo.png" style="heigth: 70px;width: 70px;"
                    class="img-circle elevation-2" alt="User Image">
                <span class="brand-text font-weight-light">Uang.ku</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <!-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
              <img src="<?= base_url('assets/templates/')?>dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
              <a href="#" class="d-block">Alexander Pierce</a>
            </div>
          </div> -->

                <!-- SidebarSearch Form
          <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
              <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-sidebar">
                  <i class="fas fa-search fa-fw"></i>
                </button>
              </div>
            </div>
          </div> -->

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
                   with font-awesome or any other icon font library -->
                        <!-- <li class="nav-item">
                    <a href="<?= base_url()?>" class="nav-link">
                      <i class="nav-icon fas fa-tachometer-alt"></i>
                      <p>dashboard</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?= base_url('index.php/siswa')?>" class="nav-link">
                      <i class="nav-icon fas fa-users"></i>
                      <p>siswa</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="nav-icon fas fa-user"></i>
                      <p>Guru</p>
                    </a>
                  </li> -->
                        <li class="nav-item menu-open active">
                            <a href="<?= base_url('index.php/user')?>" class="nav-link active">
                                <i class="nav-icon fas fa-wallet"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <li class="nav-item menu-open active">
                            <a href="<?= base_url('index.php/menu/lacak')?>" class="nav-link active">
                                <i class="nav-icon fas fa-file-invoice-dollar"></i>
                                <p>
                                    Pelacakan pengeluaran
                                </p>
                            </a>
                        </li>
                        <li class="nav-item menu-open active">
                            <a href="<?= base_url('index.php/menu/lacakmasuk')?>" class="nav-link active">
                                <i class="nav-icon fas fa-file-invoice-dollar"></i>
                                <p>
                                    Pelacakan pemasukkan
                                </p>
                            </a>
                        </li>
                        <li class="nav-item menu-open">
                            <a href="<?= base_url('index.php/menu/rencana')?>" class="nav-link active">
                                <i class="nav-icon fas fa-money-check-alt"></i>
                                <p>
                                    Perencanaan Anggaran
                                </p>
                            </a>
                        </li>
                        <li class="nav-item menu-open">
                            <a href="<?= base_url('index.php/menu/laporan')?>" class="nav-link active">
                                <i class="nav-icon fas fa-chart-line"></i>
                                <p>
                                    Pelaporan Keuangan
                                </p>
                            </a>
                        </li>
                        <li class="nav-item menu-open">
                            <a href="<?= base_url('index.php/menu/tujuan')?>" class="nav-link active">
                                <i class="nav-icon fas fa-book"></i>
                                <p>
                                    Tujuan Keuangan 
                                </p>
                            </a>
                        </li>
                        <!-- <li class="nav-item menu-open">
                            <a href="<?= base_url('index.php/user/investasi')?>" class="nav-link active">
                                <i class="nav-icon fas fa-book"></i>     
                                <p>
                                    Investasi
                                </p>
                            </a>
                        </li> -->
                        <li class="nav-item menu-open">
                            <a href="<?= base_url('index.php/user/tools')?>" class="nav-link active">
                                <i class="nav-icon fas fa-book"></i>
                                <p>
                                    Tools keuangan
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <!-- <h1 class="m-0"><?= $title?></h1>-->
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <!-- <li class="breadcrumb-item"><a href="#">-</a></li> -->
                                <!-- <li class="breadcrumb-item active"><?= $title?></li> -->
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content" style="margin-top:40px;">
                <div class="container-fluid vh-100">