<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php include_once "header.php"; ?>
<div class="col-md-12">
  <div class="container">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <h4><?=$modules?></h4>
        <ol class="breadcrumb">
          <li><a href="<?=REALPATH?>users"><i class="fa fa-dashboard"></i> Home</a></li>
          <?php if($modules != "" && $modules != "Dashboard"){ ?><li class="active"><?=$modules?></li><?php } ?>
        </ol>
      </div>

      <!-- Main content -->
      <div class="content">
      <?=$content?>
      </div><!-- /.content -->
    </div><!-- /.content-wrapper -->
  </div>
</div>
<?php include_once "footer.php"; ?>