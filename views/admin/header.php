<!--
=========================================================
* Argon Dashboard - v1.2.0
=========================================================
* Product Page: https://www.creative-tim.com/product/argon-dashboard


* Copyright  Creative Tim (http://www.creative-tim.com)
* Coded by www.creative-tim.com



=========================================================
* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>GADE APP</title>
  <!-- Favicon -->
  <link rel="icon" href="<?=get_foto('/public_style/front/assets/img/favicon.ico')?>" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="<?php echo get_template_directory('back/vendor/nucleo/css/nucleo.css') ;?>">
  <link rel="stylesheet" href="<?php echo get_template_directory('back/vendor/@fortawesome/fontawesome-free/css/all.min.css') ;?>">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.23/r-2.2.6/sp-1.2.2/sl-1.3.1/datatables.min.css"/>
  <!-- Page plugins -->
  <!-- Argon CSS -->
  <link rel="stylesheet" href="<?php echo get_template_directory('back/css/argon.css?v=1.2.0') ;?>">
</head>

<body>
  <!-- Sidenav -->
  <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header  align-items-center" style="margin-bottom:80px;">
        <a class="navbar-brand" href="javascript:void(0)">
          <img src="<?=get_foto_assets('asc.png')?>" class="navbar-brand-img" alt="..." style="max-height: 120px; height:120;" >
        </a>
      </div>
      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link <?=is_active_page_print_rep(2, '', 'active')?>" href="<?=base_url('admin')?>">
                <i class="ni ni-tv-2 text-primary"></i>
                <span class="nav-link-text">Dashboard</span>
              </a>
            </li>
            
            <?php if ($this->sess['level_user'] == 'super_admin'): ?>
              <li class="nav-item">
                <a class="nav-link <?=is_active_page_print_rep(2, 'access', 'active')?>" href="<?=base_url('admin/access')?>">
                  <i class="fas fa-users-cog" style="color: #f1c40f;"></i>
                  <span class="nav-link-text">Users</span>
                </a>
              </li>
            <?php endif ?>

          </ul>

          <hr class="my-3">

          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link <?=is_active_page_print_rep(2, 'pekerjaan', 'active')?>" href="<?=base_url('admin/pekerjaan')?>">
                <i class="fas fa-certificate" style="color: #6ECB63;"></i>
                <span class="nav-link-text">Pekerjaan</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?=is_active_page_print_rep(2, 'karyawan', 'active')?>" href="<?=base_url('admin/karyawan')?>">
                <i class="fas fa-users" style="color: #FF00E4;"></i>
                <span class="nav-link-text">Data Karyawan</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?=is_active_page_print_rep(2, 'absensi', 'active')?>" href="<?=base_url('admin/absensi')?>">
                <i class="fab fa-500px" style="color: #FF00E4;"></i>
                <span class="nav-link-text">Data Absensi</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?=is_active_page_print_rep(2, 'cuti', 'active')?>" href="<?=base_url('admin/cuti')?>">
                <i class="fas fa-umbrella-beach" style="color: #FF00E4;"></i>
                <span class="nav-link-text">Data Cuti</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?=is_active_page_print_rep(2, 'reimburse', 'active')?>" href="<?=base_url('admin/reimburse')?>">
                <i class="fas fa-money-bill-wave" style="color: #FF00E4;"></i>
                <span class="nav-link-text">Data Reimburse</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?=is_active_page_print_rep(2, 'dispensasi', 'active')?>" href="<?=base_url('admin/dispensasi')?>">
                <i class="fas fa-hand-paper" style="color: #FF00E4;"></i>
                <span class="nav-link-text">Data Dispensasi</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?=is_active_page_print_rep(2, 'gaji', 'active')?>" href="<?=base_url('admin/gaji')?>">
                <i class="fas fa-money-check" style="color: #FF00E4;"></i>
                <span class="nav-link-text">Data Gaji</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?=is_active_page_print_rep(2, 'setting', 'active')?>" href="#setting-dashboards" data-toggle="collapse" role="button"  aria-controls="navbar-dashboards">
                <i class="fas fa-cog" style="color: #2980b9;"></i>
                <span class="nav-link-text">Setting</span>
              </a>
              <div class="collapse" id="setting-dashboards">
                <ul class="nav nav-sm flex-column">
                  <li class="nav-item">
                    <a href="<?=base_url('admin/setting/location')?>" class="nav-link">
                      <span class="sidenav-normal"> Location </span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?=base_url('admin/setting/hari_masuk')?>" class="nav-link">
                      <span class="sidenav-normal"> Hari Masuk </span>
                    </a>
                  </li>
                </ul>
              </div>

            </li>
          </ul>

          <!-- Divider -->
          <hr class="my-3">
          <!-- Navigation -->
          <ul class="navbar-nav mb-md-3">
            <li class="nav-item">
              <a class="nav-link" href="<?=base_url('logout')?>">
                <i class="fas fa-sign-out-alt" style="color: #e74c3c;"></i>
                <span class="nav-link-text">Logout</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Topnav -->
    <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
      <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Search form -->
          <!-- <form class="navbar-search navbar-search-light form-inline mr-sm-3" id="navbar-search-main">
            <div class="form-group mb-0">
              <div class="input-group input-group-alternative input-group-merge">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-search"></i></span>
                </div>
                <input class="form-control" placeholder="Search" type="text">
              </div>
            </div>
            <button type="button" class="close" data-action="search-close" data-target="#navbar-search-main" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </form> -->
          <!-- Navbar links -->
          <ul class="navbar-nav align-items-center  ml-md-auto ">
            <li class="nav-item d-xl-none">
              <!-- Sidenav toggler -->
              <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin" data-target="#sidenav-main">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </div>
            </li>
          </ul>
          <ul class="navbar-nav align-items-center  ml-auto ml-md-0 ">
            <li class="nav-item dropdown">
              <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="media align-items-center">
                  <span class="avatar avatar-sm rounded-circle">
                    <img alt="Image placeholder" src="<?=$this->sess['foto_user']?>">
                  </span>
                  <div class="media-body  ml-2  d-none d-lg-block">
                    <span class="mb-0 text-sm  font-weight-bold"><?=$this->sess['nama_user']?></span>
                  </div>
                </div>
              </a>
              <div class="dropdown-menu  dropdown-menu-right ">
                <div class="dropdown-header noti-title">
                  <h6 class="text-overflow m-0">Welcome!</h6>
                </div>
                <a href="#!" class="dropdown-item">
                  <i class="ni ni-single-02"></i>
                  <span>My profile</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="<?=base_url('logout')?>" class="dropdown-item">
                  <i class="ni ni-user-run"></i>
                  <span>Logout</span>
                </a>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Header -->