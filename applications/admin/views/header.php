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
            <li class="<?php echo ($modules == 'Project') ? 'active':''; ?>"><a href="<?=REALPATH?>admin/pemiliktanah"><i class="fa fa-files-o"></i> Pemilik Tanah <i class="fa fa-angle-left pull-right"></i></a></li>
            <li class="<?php echo ($modules == 'Project') ? 'active':''; ?>"><a href="<?=REALPATH?>admin/tanah"><i class="fa fa-files-o"></i> Tanah <i class="fa fa-angle-left pull-right"></i></a></li>
            <li class="<?php echo ($modules == 'Project') ? 'active':''; ?>"><a href="<?=REALPATH?>admin/project"><i class="fa fa-files-o"></i> Project <i class="fa fa-angle-left pull-right"></i></a></li>
            <li class="<?php echo ($modules == 'Investor') ? 'active':''; ?>"><a href="<?=REALPATH?>admin/investor"><i class="fa fa-files-o"></i> Investor <i class="fa fa-angle-left pull-right"></i></a></li>
            <li class="<?php echo ($modules == 'Investor') ? 'active':''; ?>"><a href="<?=REALPATH?>admin/investasi"><i class="fa fa-files-o"></i> Investasi <i class="fa fa-angle-left pull-right"></i></a></li>
            
            <li class="treeview" id="scrollspy-components">
              <a href="javascript::;"><i class="fa fa-cogs"></i> Settings <i class="fa fa-angle-left pull-right"></i></a>
            </li>
          </ul>
        </div>
        <!-- /.sidebar -->
      </aside>
      <?php } ?>
      