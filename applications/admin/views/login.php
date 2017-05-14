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
<p class="login-box-msg">Sign in to start your session</p>
<form action="<?=base_url()?>admin/login" method="post">
<div class="form-group has-feedback">
<input type="text" name="username" class="form-control" placeholder="Username"/>
<span class="glyphicon glyphicon-user form-control-feedback"></span>
</div>
<div class="form-group has-feedback">
<input type="password" name="password" class="form-control" placeholder="Password"/>
<span class="glyphicon glyphicon-lock form-control-feedback"></span>
</div>
<div class="row">
<div class="col-xs-8">
</div><!-- /.col -->
<div class="col-xs-4">
<input type="hidden" name="stoken" value="<?=$c?>"/>
<input type="hidden" name="<?=$csrf['name']?>" value="<?=$csrf['hash']?>" />
<button type="submit" class="btn btn-block btn-flat">Sign In</button>
</div><!-- /.col -->
</div>
</form>
<!--<a href="<?=base_url()?>admin/forgot-password">I forgot my password</a><br>-->
</div><!-- /.login-box-body -->
</div><!-- /.login-box -->
</div><!-- ./wrapper -->