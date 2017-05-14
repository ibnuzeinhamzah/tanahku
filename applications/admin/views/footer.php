<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0.0
    </div>
    <strong>Copyright &copy; 2015.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <div class="pad">
      This is an example of the control sidebar.
    </div>
  </aside><!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>

</div><!-- ./wrapper -->

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
<script src="https://google-code-prettify.googlecode.com/svn/loader/run_prettify.js"></script>
<?php if($this->uri->rsegment(3,'') == ''){ ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.2/raphael-min.js"></script>
<script src="<?=REALPATH.ASSETS_DIR?>/admin/plugins/morris/morris.min.js"></script>
<?php } ?>

<?php if($this->uri->rsegment(2) == 'insert' || $this->uri->rsegment(2) == 'edit'){ ?>
<script src="https://cdn.ckeditor.com/4.4.3/standard/ckeditor.js"></script>
<script src="<?=REALPATH.ASSETS_DIR?>/admin/plugins/input-mask/jquery.inputmask.js"></script>
<script src="<?=REALPATH.ASSETS_DIR?>/admin/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="<?=REALPATH.ASSETS_DIR?>/admin/plugins/input-mask/jquery.inputmask.extensions.js"></script>
<?php } ?>
<script>
  $(function () {
    <?php if($this->uri->rsegment(2) == 'insert' || $this->uri->rsegment(2) == 'edit'){ ?>
      $(".texteditor").each(function(){
        var elid = $(this).attr('id');
        CKEDITOR.replace(elid);
      });
      $("[data-mask]").inputmask();
    <?php } ?>
    <?php if($this->uri->rsegment(2) == 'index'){ ?>
      $("#list-data").each(function(){
        $(this).DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
      });
    <?php } ?>
    <?php if($this->uri->rsegment(3,'') == ''){ ?>
      var bar = new Morris.Bar({
        <?=$this->session->userdata('chartdata');?>
      });
    <?php } ?>
    $("#lolos").on('change', function(){
      var csrf_val = "<?=$this->security->get_csrf_hash()?>";
      // console.log(csrf+':'+csrf_val);
      $.ajax({
        method: "POST",
        url: "<?=REALPATH?>admin/pendaftar/setlolos",
        data: { csrf_token: csrf_val, id: $(this).data("id"), lolos: $(this).val() }
      }).done(function( msg ) {
        console.log( "Data Saved: " + msg );
      });
    });
  });
</script>