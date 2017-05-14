<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="col-md-12 footer">
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

<!-- jQuery 2.1.4 -->
<script src="<?=REALPATH.ASSETS_DIR?>/admin/plugins/jQuery/jQuery-2.1.4.min.js"></script>
<!-- Bootstrap 3.3.5 -->
<script src="<?=REALPATH.ASSETS_DIR?>/admin/bootstrap/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="<?=REALPATH.ASSETS_DIR?>/admin/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?=REALPATH.ASSETS_DIR?>/admin/plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- FastClick -->
<script src="<?=REALPATH.ASSETS_DIR?>/admin/plugins/fastclick/fastclick.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=REALPATH.ASSETS_DIR?>/admin/dist/js/app.min.js"></script>
<!-- SlimScroll 1.3.0 -->
<script src="<?=REALPATH.ASSETS_DIR?>/admin/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- <script src="https://google-code-prettify.googlecode.com/svn/loader/run_prettify.js"></script> -->
<script src="<?=REALPATH.ASSETS_DIR?>/admin/documentation/docs.js"></script>
<?php if($this->uri->rsegment(2) == 'insert' || $this->uri->rsegment(2) == 'edit'){ ?>
<script src="<?=REALPATH.ASSETS_DIR?>/javascripts/bootstrap-datepicker.min.js"></script>
<!--
<script src="<?=REALPATH.ASSETS_DIR?>/admin/plugins/input-mask/jquery.inputmask.js"></script>
<script src="<?=REALPATH.ASSETS_DIR?>/admin/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="<?=REALPATH.ASSETS_DIR?>/admin/plugins/input-mask/jquery.inputmask.extensions.js"></script>
-->
<script src="<?=REALPATH.ASSETS_DIR?>/admin/plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    //$("[data-mask]").inputmask();
    $('.date').datepicker({
      viewMode: 'years',
      format: 'yyyy/mm/dd',
      autoclose: true
    });
    $('.year').datepicker({
      startView: 'years',
      minViewMode: 'years',
      maxViewMode: 'years',
      format: 'yyyy',
      autoclose: true
    });
    $('.datetimepicker').datepicker();
    $('input').iCheck({
      checkboxClass: 'icheckbox_flat-blue',
      radioClass: 'iradio_flat-blue',
      width: '5%' // optional
    });
  });
</script>
<?php } ?>
<?php if($this->uri->rsegment(3) == 'pilih-formasi-jabatan'){ ?>
<script>
function allSelected(flag) {
  if (flag==true) {
    var $pilihan1 = $('select[name=jurusan_formasi1]').val();
    var $pilihan2 = $('select[name=jurusan_formasi2]').val();
    var $pilihan3 = $('select[name=jurusan_formasi3]').val();
    var $pilihan4 = $('select[name=jurusan_formasi4]').val();
    var tidakSamaSemua = $pilihan1 == $pilihan2 ? 0 : $pilihan1 == $pilihan3 ? 0 : $pilihan1 == $pilihan4 ? 0 : $pilihan2 == $pilihan3 ? 0 : $pilihan2 == $pilihan4 ? 0 : $pilihan3 == $pilihan4 ? 0 : 1;
    var terpilihSemua = $pilihan1 == "" ? 0 : $pilihan2 == "" ? 0 : $pilihan3 == "" ? 0 : $pilihan4 == "" ? 0 : 1;
    if (tidakSamaSemua && terpilihSemua) {
      $('button[type=submit]').attr('class', 'btn btn-primary btn-flat btn-sm');
      $('button[type=submit]').attr('disabled', false);
    } else {
      $('button[type=submit]').attr('class', 'btn btn-default btn-flat btn-sm disabled');
      $('button[type=submit]').attr('disabled', true);
    }
  }
}
</script>
<?php } ?>