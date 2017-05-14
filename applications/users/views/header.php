<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE9" >
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Lelang Jabatan BAPPENAS</title>
  <link rel="stylesheet" href="<?=REALPATH.ASSETS_DIR?>/admin/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?=REALPATH.ASSETS_DIR?>/stylesheets/font-awesome.min.css">
  <link rel="stylesheet" href="<?=REALPATH.ASSETS_DIR?>/stylesheets/ionicons.min.css">
  <link rel="stylesheet" href="<?=REALPATH.ASSETS_DIR?>/admin/plugins/datatables/dataTables.bootstrap.css">
  <link rel="stylesheet" href="<?=REALPATH.ASSETS_DIR?>/stylesheets/style-users.css">
  <link rel="stylesheet" href="<?=REALPATH.ASSETS_DIR?>/stylesheets/custom-users.css">
  <link rel="stylesheet" href="<?=REALPATH.ASSETS_DIR?>/stylesheets/bootstrap-datepicker.css">
  <link rel="stylesheet" href="<?=REALPATH.ASSETS_DIR?>/admin/plugins/iCheck/flat/blue.css">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="pull_top">
  <nav class="navbar navbar-fixed-top user-header">
    
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand mobile-only tablet-only" href="/">Lelang Jabatan BAPPENAS</a>
      </div>
      <div class="col-md-3">
        <img src="<?=REALPATH.ASSETS_DIR?>/images/logo-header-small.png" class="desktop-only" style="position:absolute;float:left;left:20px;top:10px;" />
      </div>
      <div class="col-md-9">
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right header-nav">
            <li class="<?=($modules=='Dashboard')?'active':''; ?>"><a href="<?=REALPATH?>users">Home</a></li>
            <li class="<?=($modules=='Pilih Formasi Jabatan')?'active':''; ?>"><a href="<?=REALPATH?>users/pilih-formasi-jabatan">Pilihan<br/>Formasi</a></li>
            <li class="<?=($modules=='Data Pribadi')?'active':''; ?>"><a href="<?=REALPATH?>users/data-pribadi">Data<br/>Pribadi</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Riwayat<br/>Pendidikan <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li class="<?=($modules=='Riwayat Pendidikan')?'active':''; ?>"><a href="<?=REALPATH?>users/riwayat-pendidikan">Pendidikan Formil</a></li>
                <li class="<?=($modules=='Riwayat Diklat')?'active':''; ?>"><a href="<?=REALPATH?>users/riwayat-diklat">Pendidikan dan Latihan</a></li>
              </ul>
            </li>
            <li class="<?=($modules=='Riwayat Jabatan')?'active':''; ?>"><a href="<?=REALPATH?>users/riwayat-jabatan">Riwayat<br/>Jabatan</a></li>
            <li class="<?=($modules=='Riwayat Kepangkatan')?'active':''; ?>"><a href="<?=REALPATH?>users/riwayat-kepangkatan">Riwayat<br/>Kepangkatan</a></li>
            
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Data<br/>Lainnya <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li class="<?=($modules=='Riwayat Penugasan')?'active':''; ?>"><a href="<?=REALPATH?>users/riwayat-penugasan">Riwayat Penugasan Lain</a></li>
                <li class="<?=($modules=='Prestasi')?'active':''; ?>"><a href="<?=REALPATH?>users/riwayat-prestasi">Prestasi</a></li>
                <li class="<?=($modules=='Karya Tulis')?'active':''; ?>"><a href="<?=REALPATH?>users/karya-tulis">Karya Tulis / Publikasi</a></li>
              </ul>
            </li>

            <li class="<?=($modules=='Upload Dokumen')?'active':''; ?>"><a href="<?=REALPATH?>users/upload-dokumen">Upload<br/>Dokumen</a></li>
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="glyphicon glyphicon-user"></i>
                <span class="hidden-xs"><?=$this->session->userdata('username')?></span>
              </a>
              <ul class="dropdown-menu">
                <li>
                  <a href="<?=REALPATH?>users/change-password">Change Password</a>
                  <a href="<?=REALPATH?>users/logoff">Sign out</a>
                </li>
              </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    
  </nav>
      