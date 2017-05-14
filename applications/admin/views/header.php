<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE9" >
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Administration Page</title>
  <!-- Bootstrap 3.3.5 -->
  <link rel="stylesheet" href="<?=REALPATH.ASSETS_DIR?>/admin/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="<?=REALPATH.ASSETS_DIR?>/admin/plugins/datatables/dataTables.bootstrap.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=REALPATH.ASSETS_DIR?>/admin/dist/css/CustomAdminLTE.css">
  <link rel="stylesheet" href="<?=REALPATH.ASSETS_DIR?>/admin/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="<?=REALPATH.ASSETS_DIR?>/admin/dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="<?=REALPATH.ASSETS_DIR?>/admin/plugins/morris/morris.css">
  
  <!--link rel="stylesheet" href="<=REALPATH.ASSETS_DIR?>/admin/documentation/style.css"-->

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="skin-blue fixed" data-spy="scroll" data-target="#scrollspy">
    <div class="wrapper">

      <header class="main-header">
        <!-- Logo -->
        <!-- Logo -->
        <a href="<?=REALPATH?>admin" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>CI</b></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg">Admin Page</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="glyphicon glyphicon-user"></i>
                  <span class="hidden-xs"><?=$this->session->userdata('username')?></span>
                </a>
                <ul class="dropdown-menu">
                  <li class="user-header">
                    <p><?=$this->session->userdata('realname')?></p>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="<?=REALPATH?>admin/change-password" class="btn btn-default btn-flat">Change Password</a>
                    </div>
                    <div class="pull-right">
                      <a href="<?=REALPATH?>admin/logoff" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
              
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <?php if($this->uri->rsegment(2) != 'change_password'){ ?>
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <div class="sidebar" id="scrollspy">

          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="nav sidebar-menu">
            <li class="header">ADMIN MENU</li>
            <li class="<?php echo ($modules == 'Dashboard' || $modules == '') ? 'active':''; ?>"><a href="<?=REALPATH?>admin"><i class="fa fa-dashboard"></i> Dashboard <i class="fa fa-angle-left pull-right"></i></a></li>
            <li class="<?php echo ($modules == 'Persyaratan') ? 'active':''; ?>"><a href="<?=REALPATH?>admin/persyaratan"><i class="fa fa-files-o"></i> Persyaratan <i class="fa fa-angle-left pull-right"></i></a></li>
            <li class="<?php echo ($modules == 'Jadwal Pelaksanaan') ? 'active':''; ?>"><a href="<?=REALPATH?>admin/jadwal"><i class="fa fa-files-o"></i> Jadwal Pelaksanaan <i class="fa fa-angle-left pull-right"></i></a></li>
            <li class="<?php echo ($modules == 'Pengumuman') ? 'active':''; ?>"><a href="<?=REALPATH?>admin/pengumuman"><i class="fa fa-files-o"></i> Pengumuman <i class="fa fa-angle-left pull-right"></i></a></li>
            <li class="<?php echo ($modules == 'Tata Cara Daftar') ? 'active':''; ?>"><a href="<?=REALPATH?>admin/tata-cara-daftar"><i class="fa fa-files-o"></i> Tata Cara Daftar <i class="fa fa-angle-left pull-right"></i></a></li>
            <li class="treeview" id="scrollspy-components">
              <a href="javascript::;"><i class="fa fa-cogs"></i> Pendaftar <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="nav treeview-menu">
                <li class="<?php echo ($modules == 'Pendaftar') ? 'active':''; ?>"><a href="<?=REALPATH?>admin/pendaftar"><i class="fa fa-user-plus"></i> Semua <i class="fa fa-angle-left pull-right"></i></a></li>
                <li class="<?php echo ($modules == 'Pendaftar') ? 'active':''; ?>"><a href="<?=REALPATH?>admin/pendaftar/lolos"><i class="fa fa-user-plus"></i> Lolos <i class="fa fa-angle-left pull-right"></i></a></li>
                <li class="<?php echo ($modules == 'Pendaftar') ? 'active':''; ?>"><a href="<?=REALPATH?>admin/pendaftar/tidaklolos"><i class="fa fa-user-plus"></i> Tidak <i class="fa fa-angle-left pull-right"></i></a></li>
              </ul>
            </li>
            <li class="<?php echo ($modules == 'Dokumen Lampiran') ? 'active':''; ?>"><a href="<?=REALPATH?>admin/lampiran"><i class="fa fa-user-plus"></i> Dokumen Lampiran <i class="fa fa-angle-left pull-right"></i></a></li>
            
            <li class="treeview" id="scrollspy-components">
              <a href="javascript::;"><i class="fa fa-cogs"></i> Settings <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="nav treeview-menu">
                <li class="<?php echo ($modules == 'Formasi Jabatan') ? 'active':''; ?>"><a href="<?=REALPATH?>admin/formasi-jabatan"><i class="fa fa-sitemap"></i> Formasi Jabatan <i class="fa fa-angle-left pull-right"></i></a></li>
                <li class="<?php echo ($modules == 'Jenis Jabatan') ? 'active':''; ?>"><a href="<?=REALPATH?>admin/jenis-jabatan"><i class="fa fa-bookmark"></i> Jenis Jabatan <i class="fa fa-angle-left pull-right"></i></a></li>
                <li class="<?php echo ($modules == 'Jenis Dokumen') ? 'active':''; ?>"><a href="<?=REALPATH?>admin/jenis-dokumen"><i class="fa fa-file"></i> Jenis Dokumen <i class="fa fa-angle-left pull-right"></i></a></li>
                <li class="<?php echo ($modules == 'Users') ? 'active':''; ?>"><a href="<?=REALPATH?>admin/users"><i class="fa fa-user"></i> User <i class="fa fa-angle-left pull-right"></i></a></li>
                <li class="<?php echo ($modules == 'Groups') ? 'active':''; ?>"><a href="<?=REALPATH?>admin/groups"><i class="fa fa-users"></i> Group <i class="fa fa-angle-left pull-right"></i></a></li>
                <li class="<?php echo ($modules == 'Users Groups') ? 'active':''; ?>"><a href="<?=REALPATH?>admin/users-groups"><i class="fa fa-puzzle-piece"></i> Users Group <i class="fa fa-angle-left pull-right"></i></a></li>
                <li class="<?php echo ($modules == 'Agama') ? 'active':''; ?>"><a href="<?=REALPATH?>admin/agama"><i class="fa fa-puzzle-piece"></i> Agama <i class="fa fa-angle-left pull-right"></i></a></li>
                <li class="<?php echo ($modules == 'Tingkat Pendidikan') ? 'active':''; ?>"><a href="<?=REALPATH?>admin/tingkat-pendidikan"><i class="fa fa-puzzle-piece"></i> Tingkat Pendidikan <i class="fa fa-angle-left pull-right"></i></a></li>
              </ul>
            </li>
            
            <!--<li><a href="<?=REALPATH?>admin/file-upload"><i class="fa fa-folder"></i> File Upload <i class="fa fa-angle-left pull-right"></i></a></li>-->
          </ul>
        </div>
        <!-- /.sidebar -->
      </aside>
      <?php } ?>
      