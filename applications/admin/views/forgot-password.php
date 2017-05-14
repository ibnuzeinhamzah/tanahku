<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php include_once "header_no_login.php"; ?>

<div class="login-box">
<div class="login-logo">
<a href="<?=base_url()?>"><img src="<?=REALPATH.ASSETS_DIR?>/images/logo-header-login.png" class="desktop-only" style="" /></a>
</div><!-- /.login-logo -->
<div class="login-box-header">
<?=validation_errors()?>
</div>
<div class="login-box-body">
<p class="login-box-msg">Change Password</p>
<form action="<?=base_url()?>admin/confirm-forgot-password" method="post">
<div class="form-group has-feedback">
<input type="text" name="email" class="form-control" placeholder="Email"/>
<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
</div>
<div class="row">
<div class="col-xs-8">
</div><!-- /.col -->
<div class="col-xs-4">
<input type="hidden" name="stoken" value="<?=$c?>"/>
<input type="hidden" name="<?=$csrf['name']?>" value="<?=$csrf['hash']?>" />
<button type="submit" class="btn btn-warning btn-block btn-flat">Submit</button>
</div><!-- /.col -->
</div>
</form>
</div><!-- /.login-box-body -->
</div><!-- /.login-box -->
</div><!-- ./wrapper -->