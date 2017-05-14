<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="col-md-12">
	<div class="container">
		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Main content -->
			<div class="content body">
				<div class="col-md-2"></div>
				<div class="col-md-8">
					<?=$content['error']?>
					<div class="box box-primary">
						<div class="box-header with-border">
							<h4><?=$content['header']?></h4>
						</div>
						<form class="form-horizontal" action="<?=base_url()?>contact/savenewdata" method="post">
							<div class="box-body">
								<div class="form-group">
									<label for="inputNama" class="col-md-3 control-label ">Nama</label>
									<div class="col-md-8">
									  <input type="text" class="form-control input-sm" name="inputNama" id="inputNama" placeholder="Your Name">
									</div>
								</div>
								
								<div class="form-group">
									<label for="inputEmail" class="col-md-3 control-label ">Email</label>
									<div class="col-md-8">
									  <input type="text" class="form-control input-sm" name="inputEmail" id="inputEmail" placeholder="Your Email">
									</div>
								</div>

								<div class="form-group">
									<label for="textArea" class="col-md-3 control-label ">Pertanyaan</label>
									<div class="col-md-8">
									  <textarea name="inputIsi" class="form-control input-sm" rows="3" id="textArea"></textarea>
									  <span class="help-block"></span>
									</div>
								</div>

								<div class="form-group">
									<label for="inputSubject" class="col-md-3 control-label ">Robot Check</label>
									<div class="col-md-2">
									  <input type="text" class="form-control input-sm" name="robot_check" id="robot_check" placeholder="">
									</div>
									<div class="col-md-6" style="margin-top:9px;">
									  <label> + <?=$content['first_number']?> = <?=$content['second_number']?></label>
									</div>
								</div>
							</div>
							<div class="box-footer">
								<input type="hidden" name="robot_check_a" value="<?=$content['first_number']?>">
								<input type="hidden" name="robot_check_b" value="<?=$content['second_number']?>">
								<input type="hidden" name="<?=$content['crsf_name']?>" value="<?=$content['crsf_hash']?>" />
								<button type="submit" class="btn btn-primary btn-flat btn-sm">Send</button> 
							</div>
						</form>
					</div>
				</div>
				<div class="col-md-2"></div>
			</div><!-- /.content -->
		</div><!-- /.content-wrapper -->
	</div>
</div>