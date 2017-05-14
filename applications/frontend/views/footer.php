<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="col-md-12 footer">
  <div class="container">
    <footer class="main-footer">
      <div class="hidden-xs">
        <img src="<?=REALPATH.ASSETS_DIR?>/images/logo-footer.png" style="float:left;margin-right:10px;margin-top:-16px;">
      </div>
      <p>
        <strong>Badan Perencanaan Pembangunan Nasional</strong><br/>
        <strong>Copyright &copy; 2015.</strong> All rights reserved.
      </p>
    </footer>
  </div>
</div>
<!-- jQuery 2.1.4 -->
<script src="<?=REALPATH.ASSETS_DIR?>/admin/plugins/jQuery/jQuery-2.1.4.min.js"></script>
<!-- Bootstrap 3.3.5 -->
<script src="<?=REALPATH.ASSETS_DIR?>/admin/bootstrap/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="<?=REALPATH.ASSETS_DIR?>/admin/plugins/fastclick/fastclick.min.js"></script>
<script src="<?=REALPATH.ASSETS_DIR?>/admin/dist/js/app.min.js"></script>
<script src="<?=REALPATH.ASSETS_DIR?>/admin/plugins/iCheck/icheck.min.js"></script>

<?php if(in_array($modules,array("Data Pribadi","Riwayat Pendidikan","Riwayat Kepangkatan","Riwayat Jabatan","Dokumen Pendukung"))){ ?>
<script src="<?=REALPATH.ASSETS_DIR?>/admin/plugins/input-mask/jquery.inputmask.js"></script>
<script src="<?=REALPATH.ASSETS_DIR?>/admin/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="<?=REALPATH.ASSETS_DIR?>/admin/plugins/input-mask/jquery.inputmask.phone.extensions.js"></script>
<script src="<?=REALPATH.ASSETS_DIR?>/admin/plugins/input-mask/jquery.inputmask.extensions.js"></script>
<script>
  $(function () {
    $("[data-mask]").inputmask();
  });
</script>
<?php } ?>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>