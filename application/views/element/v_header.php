<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <meta name="Fiqisulaiman">
  <link rel="icon" type="image/png" href="<?php echo base_url('assets/img/favicon/favicon-32x32.png')?>" sizes="32x32" />
  <title><?php echo $title ?></title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="<?php echo base_url('assets/modules/bootstrap/css/bootstrap.min.css')?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/modules/fontawesome/css/all.min.css')?>">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="<?php echo base_url('assets/modules/datatables/datatables.min.css')?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css')?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css')?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/modules/jquery-selectric/selectric.css')?>">

  <!-- Template CSS -->
  <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css')?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/css/components.css')?>">

  <!-- 1. AddChat css -->
  <link href="<?php echo base_url('assets/addchat/css/addchat.min.css') ?>" rel="stylesheet">
</head>

<body style="background-color:#f9f9f9;">
  <!-- 2. AddChat widget -->
  <div id="addchat_app" 
      data-baseurl="<?php echo base_url() ?>"
      data-csrfname="<?php echo $this->security->get_csrf_token_name() ?>"
      data-csrftoken="<?php echo $this->security->get_csrf_hash() ?>"
  ></div>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg" style="background-color: #ffc107;"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
          </ul>
        </form>
        <ul class="navbar-nav navbar-right">
          <h5 style="color: #fff;"><?php echo $judul_header ?></h5>
        </ul>
      </nav>

      <!-- Untuk Login Sebagai Admin -->
      <?php if ($this->session->userdata('LEVEL') == 'admin'){ ?>
      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="<?php echo site_url('dashboard') ?>" style="color: #ffc107;">Apps Penjualan</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a style="color: #ffc107;" href="<?php echo site_url('dashboard') ?>">APS</a>
          </div>
          <ul class="sidebar-menu">
            <!-- Menu Dashboard -->
            <li class="<?php if(isset($active_dashboard)){echo $active_dashboard ;}?>">
              <a class="nav-link" href="<?php echo site_url('dashboard')?>"><i class="fas fa-desktop text-warning"></i> <span>Dashboard</span></a>
            </li>
            <!-- Menu Master Data -->
            <li class="dropdown">
              <a href="#" class="nav-link has-dropdown"><i class="fas fa-archive text-warning"></i><span>Master Data</span></a>
              <ul class="dropdown-menu">
                <li class="<?php if(isset($active_barang)){echo $active_barang;} ?>">
                  <a class="nav-link" href="<?php echo site_url('master_barang') ?>"><i class="fas fa-box text-warning"></i> Data Barang</a>
                </li>

                <li class="<?php if(isset($active_pelanggan)){echo $active_pelanggan;} ?>">
                  <a class="nav-link" href="<?php echo site_url('master_pelanggan') ?>"><i class="fas fa-users text-warning"></i> Data Pelanggan</a>
                </li>

                <li class="<?php if(isset($active_pegawai)){echo $active_pegawai;} ?>">
                  <a class="nav-link" href="<?php echo site_url('master_pegawai') ?>"><i class="fas fa-user text-warning"></i> Data Pegawai</a>
                </li>

                <li class="<?php if(isset($active_contact)){echo $active_contact;} ?>">
                  <a class="nav-link" href="<?php echo site_url('master_contact') ?>"><i class="fas fa-address-card t text-warning"></i>Data Contact</a>
                </li>
              </ul>
            </li>
            <!-- Menu Penjualan -->
            <li class="<?php if(isset($active_penjualan)){echo $active_penjualan ;}?>"">
              <a class="nav-link" href="<?php echo site_url('penjualan')?>"><i class="fas fa-handshake text-warning"></i> <span>Penjualan</span></a>
            </li>
            <!-- Menu Laporan -->
            <li class="<?php if(isset($active_laporan)){echo $active_laporan ;}?>"">
              <a class="nav-link" href="<?php echo site_url('laporan') ?>"><i class="fas fa-print text-warning"></i> <span>Print Laporan</span></a>
            </li>
            <!-- Logout -->
            <li>
              <a class="nav-link" href="<?php echo site_url('login/logout') ?>"><i class="fas fa-power-off text-danger"></i> <span>Logout</span></a>
            </li>
          </ul>
        </aside>
      </div>
      <?php } else { ?>

      <!-- Untuk Login Sebagai Pegawai -->
      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="#">Apps Penjualan</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="#">APS</a>
          </div>
          <ul class="sidebar-menu">
            <!-- Meny Dashboard -->
            <li class="<?php if(isset($active_dashboard)){echo $active_dashboard; }?>">
              <a class="nav-link" href="<?php echo site_url('dashboard') ?>"><i class="fas fa-desktop text-warning"></i> <span>Dashboard</span></a>
            </li>
            <!-- Menu Penjualan -->
            <li class="<?php if(isset($active_penjualan)){echo $active_penjualan;} ?>">
              <a class="nav-link" href="<?php echo site_url('penjualan') ?>"><i class="fas fa-list text-warning"></i> <span>Penjualan</span></a>
            </li>
            <!-- Menu Laporan -->
            <li class="<?php if(isset($active_laporan)){echo $active_laporan;} ?>">
              <a class="nav-link" href="<?php echo site_url('laporan') ?>"><i class="fas fa-print text-warning"></i> <span>Print Laporan</span></a>
            </li>
            <!-- Logout -->
            <li>
              <a class="nav-link" href="<?php echo site_url('login/logout') ?>"><i class="fas fa-power-off text-danger"></i> <span>Logout</span></a>
            </li>
          </ul>
        </aside>
      </div>
      <?php } ?>
