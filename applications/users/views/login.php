<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php include_once "header_no_login.php"; ?>
<section>
    <div class="container">
        <div class="login-box">
            <div class="login-box-header">
                <?=validation_errors()?>
            </div>
            <div class="login-box-body">
                <p class="login-box-msg">Sign in to start your session</p>
                <form action="<?=base_url()?>users/login" method="post">
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
                            <button type="submit" class="btn btn-info">Sign In</button>
                        </div><!-- /.col -->
                    </div>
                </form>
                <a class="font-blue" href="<?=base_url()?>users/forgot-password">I forgot my password</a><br>
            </div><!-- /.login-box-body -->
        </div><!-- /.login-box -->
    </div>
</section>
<?php include_once "footer.php"; ?>