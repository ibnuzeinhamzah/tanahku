<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE9" >
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Lelang Jabatan BAPPENAS</title>
  <link rel="stylesheet" href="<?=REALPATH.ASSETS_DIR?>/admin/bootstrap/css/bootstrap.min.css">
  <!--
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  -->
  <link rel="stylesheet" href="<?=REALPATH.ASSETS_DIR?>/stylesheets/style.css">
  <link rel="stylesheet" href="<?=REALPATH.ASSETS_DIR?>/stylesheets/custom.css">
  <link rel="stylesheet" href="<?=REALPATH.ASSETS_DIR?>/admin/plugins/iCheck/square/blue.css">

  <link rel="apple-touch-icon" sizes="57x57" href="<?=REALPATH?>favicons/apple-touch-icon-57x57.png">
  <link rel="apple-touch-icon" sizes="60x60" href="<?=REALPATH?>favicons/apple-touch-icon-60x60.png">
  <link rel="apple-touch-icon" sizes="72x72" href="<?=REALPATH?>favicons/apple-touch-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="76x76" href="<?=REALPATH?>favicons/apple-touch-icon-76x76.png">
  <link rel="apple-touch-icon" sizes="114x114" href="<?=REALPATH?>favicons/apple-touch-icon-114x114.png">
  <link rel="apple-touch-icon" sizes="120x120" href="<?=REALPATH?>favicons/apple-touch-icon-120x120.png">
  <link rel="apple-touch-icon" sizes="144x144" href="<?=REALPATH?>favicons/apple-touch-icon-144x144.png">
  <link rel="apple-touch-icon" sizes="152x152" href="<?=REALPATH?>favicons/apple-touch-icon-152x152.png">
  <link rel="apple-touch-icon" sizes="180x180" href="<?=REALPATH?>favicons/apple-touch-icon-180x180.png">
  <link rel="icon" type="image/png" href="<?=REALPATH?>favicons/favicon-32x32.png" sizes="32x32">
  <link rel="icon" type="image/png" href="<?=REALPATH?>favicons/favicon-194x194.png" sizes="194x194">
  <link rel="icon" type="image/png" href="<?=REALPATH?>favicons/favicon-96x96.png" sizes="96x96">
  <link rel="icon" type="image/png" href="<?=REALPATH?>favicons/android-chrome-192x192.png" sizes="192x192">
  <link rel="icon" type="image/png" href="<?=REALPATH?>favicons/favicon-16x16.png" sizes="16x16">
  <link rel="manifest" href="<?=REALPATH?>favicons/manifest.json">
  <link rel="mask-icon" href="<?=REALPATH?>favicons/safari-pinned-tab.svg" color="#5bbad5">
  <meta name="msapplication-TileColor" content="#da532c">
  <meta name="msapplication-TileImage" content="<?=REALPATH?>favicons/mstile-144x144.png">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <?php if($modules == "Pendaftaran"){ ?><script src='https://www.google.com/recaptcha/api.js'></script><?php } ?>
</head>

<body class="pull_top">
  <nav class="navbar navbar-fixed-top header">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand mobile-only tablet-only" href="/">Lelang Jabatan BAPPENAS</a>
      </div>
      <div class="col-md-4">
        <img src="<?=REALPATH.ASSETS_DIR?>/images/logo-header.png" class="desktop-only" style="position:absolute;float:left;left:20px;top:10px;" />
      </div>
      <div class="col-md-8">
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right header-nav">
            <li class="<?=($modules=='Welcome')?'active':''; ?>"><a href="<?=REALPATH?>welcome">Home</a></li>
            <li role="presentation" class="dropdown <?=($modules=='Pengumuman')?'active':''; ?>">
              <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" href="<?=REALPATH?>pengumuman">Pengumuman <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li class="<?=($modules=='Persyaratan')?'active':''; ?>"><a href="<?=REALPATH?>persyaratan">Persyaratan</a></li>
                <li class="<?=($modules=='Tata Cara Daftar')?'active':''; ?>"><a href="<?=REALPATH?>tata-cara-daftar">Tata Cara Daftar</a></li>
              </ul>
            </li>
            <li class="<?=($modules=='Jadwal')?'active':''; ?>"><a href="<?=REALPATH?>jadwal">Jadwal</a></li>
            <li class="<?=($modules=='Pendaftaran')?'active':''; ?>"><a href="<?=REALPATH?>pendaftaran">Pendaftaran</a></li>
            <li class="<?=($modules=='Contact')?'active':''; ?>"><a href="<?=REALPATH?>contact">Hubungi Kami</a></li>
            <li><a href="<?=REALPATH?>users">Login</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>
  </nav>