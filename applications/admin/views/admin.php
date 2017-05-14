<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php include_once "header.php"; ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <h1><?=$modules?></h1>
    <ol class="breadcrumb">
      <li><a href="<?=REALPATH?>admin"><i class="fa fa-dashboard"></i> Home</a></li>
      <?php if($modules != "" && $modules != "Dashboard"){ ?><li class="active"><?=$modules?></li><?php } ?>
    </ol>
  </div>

  <!-- Main content -->
  <div class="content body"><br/><br/>
  <?=$content?>
  </div><!-- /.content -->
</div><!-- /.content-wrapper -->

<?php include_once "footer.php"; ?>