<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataPribadi
{
	var $name = 'Data Pribadi';
	var $table = 'users';
	var $field = array(
						'id' => array('type' => 'primary_key','show_on_table'=>false),
						'user_id' => array('type' => 'onetoone','text' => 'User ID','show_on_table'=>false,'fkey'=>'User'),
						'realname' => array('type' => 'varchar','text' => 'Nama Asli'),
						'gelar_depan' => array('type' => 'varchar','text' => 'Gelar Depan'),
						'gelar_belakang' => array('type' => 'varchar','text' => 'Gelar Belakang'),
						'tempat_lahir' => array('type' => 'varchar','text' => 'Tempat Lahir'),
						'tanggal_lahir' => array('type' => 'date','text' => 'Tanggal Lahir'),
						'alamat_rumah' => array('type' => 'text','text' => 'Alamat Rumah'),
						'alamat_saat_ini' => array('type' => 'text','text' => 'Alamat Saat Ini'),
						'agama' => array('type' => 'onetoone','text' => 'Agama','fkey'=>'Agama'),
						'jenis_kelamin' => array('type' => 'flag','text' => 'Jenis Kelamin','flag_value'=>array('Laki-Laki'=>'Laki-Laki','Perempuan'=>'Perempuan')),
						'telp_rumah' => array('type' => 'varchar','text' => 'Telp Rumah'),
						'no_hp' => array('type' => 'varchar','text' => 'No HP'),
						'ktp' => array('type' => 'file', 'dir_to_save' => KTP_DIR,'show_on_table'=>false,'text' => 'KTP'),
						'foto' => array('type' => 'file', 'dir_to_save' => FOTO_DIR,'show_on_table'=>false,'text' => 'Foto'),
						'toefl' => array('type' => 'file', 'dir_to_save' => TOEFL_DIR,'show_on_table'=>false,'text' => 'TOEFL',),
						'data_final' => array('type' => 'flag','text' => 'Apakah Data Sudah Final','flag_value'=>array(0=>'Belum',1=>'Sudah')),
						'verifikasi' => array('type' => 'flag','text' => 'Apakah Data Sudah di Verifikasi','flag_value'=>array(0=>'Belum',1=>'Sudah')),
					);

	function create_list_view()
	{
		$CI =& get_instance();
		if($CI->session->username && $CI->session->logged_in && $CI->session->usersessionkey)
		{
			$data = $CI->frontend_model->get_data_by_sql("SELECT * FROM biodata WHERE user_id = " . $CI->session->user_id);
			if(count($data) > 0)
			{
				$agama = $CI->frontend_model->get_data_by_sql("SELECT * FROM agama WHERE id = " . $data[0]->agama);
				$view = '';
				$view .= '<div class="col-md-12">';
				$view .= '<div class="box box-primary">';
				$view .= '<div class="box-header with-border bg-light-blue">';
				$view .= '<i class="fa fa-user"></i><h3 class="box-title">Data Pribadi</h3>';
				$view .= '</div>';

				$view .= '<div class="box-body">';

				$view .= '<dl class="dl-horizontal">';
				$view .= '<dt><label class="col-md-4 control-label">Nama Asli</label></dt>';
				$view .= '<dd>';
				$view .= $data[0]->gelar_depan.' '.$data[0]->realname.', '.$data[0]->gelar_belakang;
				$view .= '</dd>';
				$view .= '</dl>';
				$view .= '<hr>';

				$view .= '<dl class="dl-horizontal">';
				$view .= '<dt><label class="col-md-4 control-label">TTL</label></dt>';
				$view .= '<dd>';
				$view .= $data[0]->tempat_lahir.', '.$data[0]->tanggal_lahir;
				$view .= '</dd>';
				$view .= '</dl>';
				$view .= '<hr>';

				$view .= '<dl class="dl-horizontal">';
				$view .= '<dt><label class="col-md-4 control-label">Alamat Rumah</label></dt>';
				$view .= '<dd>';
				$view .= $data[0]->alamat_rumah;
				$view .= '</dd>';
				$view .= '</dl>';
				$view .= '<hr>';

				$view .= '<dl class="dl-horizontal">';
				$view .= '<dt><label class="col-md-4 control-label">Alamat Saat Ini</label></dt>';
				$view .= '<dd>';
				$view .= $data[0]->alamat_saat_ini;
				$view .= '</dd>';
				$view .= '</dl>';
				$view .= '<hr>';

				$view .= '<dl class="dl-horizontal">';
				$view .= '<dt><label class="col-md-4 control-label">Agama</label></dt>';
				$view .= '<dd>';
				$view .= $agama[0]->agama;
				$view .= '</dd>';
				$view .= '</dl>';
				$view .= '<hr>';

				$view .= '<dl class="dl-horizontal">';
				$view .= '<dt><label class="col-md-4 control-label">Jenis Kelamin</label></dt>';
				$view .= '<dd>';
				$view .= $data[0]->jenis_kelamin;
				$view .= '</dd>';
				$view .= '</dl>';
				$view .= '<hr>';

				$view .= '<dl class="dl-horizontal">';
				$view .= '<dt><label class="col-md-4 control-label">Telp Rumah</label></dt>';
				$view .= '<dd>';
				$view .= $data[0]->telp_rumah;
				$view .= '</dd>';
				$view .= '</dl>';
				$view .= '<hr>';

				$view .= '<dl class="dl-horizontal">';
				$view .= '<dt><label class="col-md-4 control-label">No HP</label></dt>';
				$view .= '<dd>';
				$view .= $data[0]->no_hp;
				$view .= '</dd>';
				$view .= '</dl>';
				$view .= '<hr>';

				$view .= '<dl class="dl-horizontal">';
				$view .= '<dt><label class="col-md-4 control-label">KTP</label></dt>';
				$view .= '<dd>';
				$view .= ($data[0]->ktp) ? '<a href="'.REALPATH.KTP_DIR.'/'.$data[0]->ktp.'">'.$data[0]->ktp.'</a>' : '';
				$view .= '</dd>';
				$view .= '</dl>';
				$view .= '<hr>';

				$view .= '<dl class="dl-horizontal">';
				$view .= '<dt><label class="col-md-4 control-label">TOEFL</label></dt>';
				$view .= '<dd>';
				$view .= ($data[0]->toefl) ? '<a href="'.REALPATH.TOEFL_DIR.'/'.$data[0]->toefl.'">'.$data[0]->toefl.'</a>' : '';
				$view .= '</dd>';
				$view .= '</dl>';
				$view .= '<hr>';

				$view .= '<dl class="dl-horizontal">';
				$view .= '<dt><label class="col-md-4 control-label">Foto</label></dt>';
				$view .= '<dd>';
				$view .= ($data[0]->foto) ? '<img src="'.REALPATH.FOTO_DIR.'/'.$data[0]->foto.'" class="profile-user-img img-responsive img-circle">' : '';
				$view .= '</dd>';
				$view .= '</dl>';				

				$view .= '</div>'; // box-body

				$view .= '<div class="box-footer">';
				$view .= '<a href="'.base_url().'data-pribadi/editdata/'.$CI->session->user_id.'"><button class="btn btn-primary btn-flat btn-sm">Edit</button></a>';
				$view .= '</div>';
				$view .= '</form>';

				$view .= '</div>'; // box
				$view .= '</div>'; // col-md-6

				return $view;
			}
			else
			{
				return $this->insert_form();
			}
		}
		else
		{
			redirect(base_url().'user', 'location', 302);
		}
	}

	function insert_form()
	{
		$CI =& get_instance();
		if($CI->session->username && $CI->session->logged_in && $CI->session->usersessionkey){
			$agama = $CI->frontend_model->get_data_by_sql("SELECT * FROM agama");
			$c = $CI->crypto->encrypted("!!34df$#jkUWml2!md3.^03-.!jWek");
			$csrf = array(
				'name' => $CI->security->get_csrf_token_name(),
				'hash' => $CI->security->get_csrf_hash()
			);
			$view = '';
			$view .= '<div class="col-md-12">';

			if(validation_errors()){
				$view .= '<div class="box box-solid box-danger">';
				$view .= '<div class="box-header bg-red">';
				$view .= '<i class="fa fa-warning"></i>';
				$view .= '<h3 class="box-title">Submit Data Pribadi Error.</h3>';
				$view .= '<div class="box-tools pull-right">';
				$view .= '<button class="btn btn-sm bg-red" data-widget="remove"><i class="fa fa-times"></i></button>';
				$view .= '</div>';
				$view .= '</div>';
				$view .= '<div class="box-body border-radius-none">';
				$view .= validation_errors();
				$view .= '</div>';
				$view .= '</div>';

			}

			$view .= '<div class="box box-primary">';
			$view .= '<div class="box-header with-border bg-light-blue">';
			$view .= '<i class="fa fa-user"></i><h3 class="box-title">Form Data Pribadi</h3>';
			$view .= '</div>';

			$view .= '<form class="form-horizontal" action="'.base_url().'data-pribadi/savenewdata" method="post" enctype="multipart/form-data">';
			$view .= '<div class="box-body">';

			$view .= '<div class="form-group">';
			$view .= '<label class="col-md-3 control-label">Nama Asli</label>';
			$view .= '<div class="col-md-8">';
			$view .= '<input id="realname" name="realname" class="form-control input-sm" type="text" placeholder="Nama Asli">';
			$view .= '</div>';
			$view .= '</div>';

			$view .= '<div class="form-group">';
			$view .= '<label class="col-md-3 control-label">Gelar Depan</label>';
			$view .= '<div class="col-md-8">';
			$view .= '<input id="gelar_depan" name="gelar_depan" class="form-control input-sm" type="text" placeholder="Gelar Depan">';
			$view .= '</div>';
			$view .= '</div>';

			$view .= '<div class="form-group">';
			$view .= '<label class="col-md-3 control-label">Gelar Belakang</label>';
			$view .= '<div class="col-md-8">';
			$view .= '<input id="gelar_belakang" name="gelar_belakang" class="form-control input-sm" type="text" placeholder="Gelar Belakang">';
			$view .= '</div>';
			$view .= '</div>';

			$view .= '<div class="form-group">';
			$view .= '<label class="col-md-3 control-label">Tempat Lahir</label>';
			$view .= '<div class="col-md-8">';
			$view .= '<input id="tempat_lahir" name="tempat_lahir" class="form-control input-sm" type="text" placeholder="Tempat Lahir">';
			$view .= '</div>';
			$view .= '</div>';

			$view .= '<div class="form-group">';
			$view .= '<label class="col-md-3 control-label">Tanggal Lahir</label>';
			$view .= '<div class="col-md-8">';
			$view .= '<input id="tanggal_lahir" name="tanggal_lahir" class="form-control input-sm" type="text" placeholder="Tanggal Lahir" data-inputmask="\'alias\': \'yyyy/mm/dd\'" data-mask>';
			$view .= '</div>';
			$view .= '</div>';

			$view .= '<div class="form-group">';
			$view .= '<label class="col-md-3 control-label">Alamat Rumah</label>';
			$view .= '<div class="col-md-8">';
			$view .= '<textarea id="alamat_rumah" name="alamat_rumah" class="form-control"></textarea>';
			$view .= '</div>';
			$view .= '</div>';

			$view .= '<div class="form-group">';
			$view .= '<label class="col-md-3 control-label">Alamat Saat Ini</label>';
			$view .= '<div class="col-md-8">';
			$view .= '<textarea name="alamat_saat_ini" id="alamat_saat_ini" class="form-control"></textarea>';
			$view .= '</div>';
			$view .= '</div>';

			$view .= '<div class="form-group">';
			$view .= '<label class="col-md-3 control-label">Agama</label>';
			$view .= '<div class="col-md-8">';
			$view .= '<select name="agama" class="form-control" style="width:200px">';
			$view .= '<option>-- Pilih Agama --</option>';
			for($i=0;$i<count($agama);$i++) $view .= '<option value="'.$agama[$i]->id.'">'.$agama[$i]->agama.'</option>';
			$view .= '</select>';
			$view .= '</div>';
			$view .= '</div>';

			$view .= '<div class="form-group">';
			$view .= '<label class="col-md-3 control-label">Jenis Kelamin</label>';
			$view .= '<div class="col-md-8 radio">';
			$view .= '<label><input type="radio" name="jenis_kelamin" value="Laki-Laki">&nbsp;Laki-Laki&nbsp;</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
			$view .= '<label><input type="radio" name="jenis_kelamin" value="Perempuan">&nbsp;Perempuan</label>';
			$view .= '</div>';
			$view .= '</div>';

			$view .= '<div class="form-group">';
			$view .= '<label class="col-md-3 control-label">Telp Rumah</label>';
			$view .= '<div class="col-md-8">';
			$view .= '<input id="telp_rumah" name="telp_rumah" class="form-control input-sm" type="text" placeholder="Telp Rumah" data-inputmask="\'alias\': \'(####)-########\'" data-mask>';
			$view .= '</div>';
			$view .= '</div>';

			$view .= '<div class="form-group">';
			$view .= '<label class="col-md-3 control-label">No HP</label>';
			$view .= '<div class="col-md-8">';
			$view .= '<input id="no_hp" name="no_hp" class="form-control input-sm" type="text" placeholder="No HP" data-inputmask="\'alias\': \'###-#########\'" data-mask>';
			$view .= '</div>';
			$view .= '</div>';

			$view .= '<div class="form-group">';
			$view .= '<label class="col-md-3 control-label">Upload KTP</label>';
			$view .= '<div class="col-md-8">';
			$view .= '<input id="ktp" name="ktp" type="file">';
			$view .= '</div>';
			$view .= '</div>';

			$view .= '<div class="form-group">';
			$view .= '<label class="col-md-3 control-label">Upload TOEFL</label>';
			$view .= '<div class="col-md-8">';
			$view .= '<input id="toefl" name="toefl" type="file">';
			$view .= '</div>';
			$view .= '</div>';

			$view .= '<div class="form-group">';
			$view .= '<label class="col-md-3 control-label">Upload Foto</label>';
			$view .= '<div class="col-md-8">';
			$view .= '<input id="foto" name="foto" type="file">';
			$view .= '</div>';
			$view .= '</div>';
			

			$view .= '</div>'; // box-body

			$view .= '<div class="box-footer">';
			$view .= '<input name="stoken" class="form-control input-sm" type="hidden" value="'.$c.'">';
			$view .= '<input type="hidden" name="'.$csrf['name'].'" value="'.$csrf['hash'].'" />';
			$view .= '<button class="btn btn-primary btn-flat btn-sm" type="submit">Submit</button>';
			$view .= '</div>';
			$view .= '</form>';

			$view .= '</div>'; // box
			$view .= '</div>'; // col-md-6

			return $view;
		}else{
			redirect(base_url().'user', 'location', 302);
		}
	}

	function edit_form()
	{
		$CI =& get_instance();
		if($CI->session->username && $CI->session->logged_in && $CI->session->usersessionkey){
			$user_id = $CI->uri->rsegment(4,0);
			$data = $CI->frontend_model->get_data_by_sql("SELECT * FROM biodata WHERE user_id = ".$user_id);
			if(count($data) > 0){
				$agama = $CI->frontend_model->get_data_by_sql("SELECT * FROM agama");
				$c = $CI->crypto->encrypted("!!34df$#jkUWml2!md3.^03-.!jWek");
				$csrf = array(
					'name' => $CI->security->get_csrf_token_name(),
					'hash' => $CI->security->get_csrf_hash()
				);
				$view = '';
				$view .= '<div class="col-md-12">';

				if(validation_errors()){
					$view .= '<div class="box box-solid box-danger">';
					$view .= '<div class="box-header bg-red">';
					$view .= '<i class="fa fa-warning"></i>';
					$view .= '<h3 class="box-title">Submit Data Pribadi Error.</h3>';
					$view .= '<div class="box-tools pull-right">';
					$view .= '<button class="btn btn-sm bg-red" data-widget="remove"><i class="fa fa-times"></i></button>';
					$view .= '</div>';
					$view .= '</div>';
					$view .= '<div class="box-body border-radius-none">';
					$view .= validation_errors();
					$view .= '</div>';
					$view .= '</div>';

				}

				$view .= '<div class="box box-primary">';
				$view .= '<div class="box-header with-border bg-light-blue">';
				$view .= '<i class="fa fa-user"></i><h3 class="box-title">Form Data Pribadi</h3>';
				$view .= '</div>';

				$view .= '<form class="form-horizontal" action="'.base_url().'data-pribadi/saveupdatedata" method="post" enctype="multipart/form-data">';
				$view .= '<div class="box-body">';

				$view .= '<div class="form-group">';
				$view .= '<label class="col-md-3 control-label">Nama Asli</label>';
				$view .= '<div class="col-md-8">';
				$view .= '<input id="realname" name="realname" class="form-control input-sm" type="text" placeholder="Nama Asli" value="'.$data[0]->realname.'">';
				$view .= '</div>';
				$view .= '</div>';

				$view .= '<div class="form-group">';
				$view .= '<label class="col-md-3 control-label">Gelar Depan</label>';
				$view .= '<div class="col-md-8">';
				$view .= '<input id="gelar_depan" name="gelar_depan" class="form-control input-sm" type="text" placeholder="Gelar Depan" value="'.$data[0]->gelar_depan.'">';
				$view .= '</div>';
				$view .= '</div>';

				$view .= '<div class="form-group">';
				$view .= '<label class="col-md-3 control-label">Gelar Belakang</label>';
				$view .= '<div class="col-md-8">';
				$view .= '<input id="gelar_belakang" name="gelar_belakang" class="form-control input-sm" type="text" placeholder="Gelar Belakang" value="'.$data[0]->gelar_belakang.'">';
				$view .= '</div>';
				$view .= '</div>';

				$view .= '<div class="form-group">';
				$view .= '<label class="col-md-3 control-label">Tempat Lahir</label>';
				$view .= '<div class="col-md-8">';
				$view .= '<input id="tempat_lahir" name="tempat_lahir" class="form-control input-sm" type="text" placeholder="Tempat Lahir" value="'.$data[0]->tempat_lahir.'">';
				$view .= '</div>';
				$view .= '</div>';

				$view .= '<div class="form-group">';
				$view .= '<label class="col-md-3 control-label">Tanggal Lahir</label>';
				$view .= '<div class="col-md-8">';
				$view .= '<input id="tanggal_lahir" name="tanggal_lahir" class="form-control input-sm" type="text" placeholder="Tanggal Lahir" data-inputmask="\'alias\': \'yyyy/mm/dd\'" data-mask value="'.$data[0]->tanggal_lahir.'">';
				$view .= '</div>';
				$view .= '</div>';

				$view .= '<div class="form-group">';
				$view .= '<label class="col-md-3 control-label">Alamat Rumah</label>';
				$view .= '<div class="col-md-8">';
				$view .= '<textarea id="alamat_rumah" name="alamat_rumah" class="form-control">'.$data[0]->alamat_rumah.'</textarea>';
				$view .= '</div>';
				$view .= '</div>';

				$view .= '<div class="form-group">';
				$view .= '<label class="col-md-3 control-label">Alamat Saat Ini</label>';
				$view .= '<div class="col-md-8">';
				$view .= '<textarea name="alamat_saat_ini" id="alamat_saat_ini" class="form-control">'.$data[0]->alamat_saat_ini.'</textarea>';
				$view .= '</div>';
				$view .= '</div>';

				$view .= '<div class="form-group">';
				$view .= '<label class="col-md-3 control-label">Agama</label>';
				$view .= '<div class="col-md-8">';
				$view .= '<select name="agama" class="form-control" style="width:200px">';
				$view .= '<option>-- Pilih Agama --</option>';
				for($i=0;$i<count($agama);$i++){ $selected = ($data[0]->agama == $agama[$i]->id) ? "selected" : ""; $view .= '<option '.$selected.' value="'.$agama[$i]->id.'">'.$agama[$i]->agama.'</option>'; }
				$view .= '</select>';
				$view .= '</div>';
				$view .= '</div>';

				$view .= '<div class="form-group">';
				$view .= '<label class="col-md-3 control-label">Jenis Kelamin</label>';
				$view .= '<div class="col-md-8 radio">';
				$checked = ($data[0]->jenis_kelamin == "Laki-Laki") ? "checked" : "";
				$view .= '<label><input type="radio" name="jenis_kelamin" value="Laki-Laki" '.$checked.'>&nbsp;Laki-Laki&nbsp;</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
				$checked = ($data[0]->jenis_kelamin == "Perempuan") ? "checked" : "";
				$view .= '<label><input type="radio" name="jenis_kelamin" value="Perempuan" '.$checked.'>&nbsp;Perempuan</label>';
				$view .= '</div>';
				$view .= '</div>';

				$view .= '<div class="form-group">';
				$view .= '<label class="col-md-3 control-label">Telp Rumah</label>';
				$view .= '<div class="col-md-8">';
				$view .= '<input id="telp_rumah" name="telp_rumah" class="form-control input-sm" type="text" placeholder="Telp Rumah" data-inputmask="\'alias\': \'(####)-########\'" data-mask value="'.$data[0]->telp_rumah.'">';
				$view .= '</div>';
				$view .= '</div>';

				$view .= '<div class="form-group">';
				$view .= '<label class="col-md-3 control-label">No HP</label>';
				$view .= '<div class="col-md-8">';
				$view .= '<input id="no_hp" name="no_hp" class="form-control input-sm" type="text" placeholder="No HP" data-inputmask="\'alias\': \'###-#########\'" data-mask value="'.$data[0]->no_hp.'">';
				$view .= '</div>';
				$view .= '</div>';

				$view .= '<div class="form-group">';
				$view .= '<label class="col-md-3 control-label">Upload KTP</label>';
				$view .= '<div class="col-md-8">';
				$view .= '<input id="ktp" name="ktp" type="file">';
				$view .= ($data[0]->ktp != "") ? '<a href="'.REALPATH.KTP_DIR.'/'.$data[0]->ktp.'">'.$data[0]->ktp.'</a>' : '';
				$view .= '</div>';
				$view .= '</div>';

				$view .= '<div class="form-group">';
				$view .= '<label class="col-md-3 control-label">Upload TOEFL</label>';
				$view .= '<div class="col-md-8">';
				$view .= '<input id="toefl" name="toefl" type="file">';
				$view .= ($data[0]->toefl != "") ? '<a href="'.REALPATH.TOEFL_DIR.'/'.$data[0]->toefl.'">'.$data[0]->toefl.'</a>' : '';
				$view .= '</div>';
				$view .= '</div>';

				$view .= '<div class="form-group">';
				$view .= '<label class="col-md-3 control-label">Upload Foto</label>';
				$view .= '<div class="col-md-8">';
				$view .= '<input id="foto" name="foto" type="file">';
				$view .= ($data[0]->foto != "") ? '<img src="'.REALPATH.FOTO_DIR.'/'.$data[0]->foto.'" class="profile-user-img img-responsive img-circle">' : '';
				$view .= '</div>';
				$view .= '</div>';
				

				$view .= '</div>'; // box-body

				$view .= '<div class="box-footer">';
				$view .= '<input name="stoken" class="form-control input-sm" type="hidden" value="'.$c.'">';
				$view .= '<input type="hidden" name="'.$csrf['name'].'" value="'.$csrf['hash'].'" />';
				$view .= '<button class="btn btn-primary btn-flat btn-sm" type="submit">Update</button>';
				$view .= '</div>';
				$view .= '</form>';

				$view .= '</div>'; // box
				$view .= '</div>'; // col-md-6

				return $view;
			}else{
				return $this->insert_form();
			}
		}else{
			redirect(base_url().'user', 'location', 302);
		}
	}

	function savenewdata()
	{
		$CI =& get_instance();
		if($CI->session->username && $CI->session->logged_in && $CI->session->usersessionkey)
		{
			$user_id = $CI->session->user_id;
			$realname = $_POST['realname'];
			$gelar_depan = $_POST['gelar_depan'];
			$gelar_belakang = $_POST['gelar_belakang'];
			$tempat_lahir = $_POST['tempat_lahir'];
			$tanggal_lahir = $_POST['tanggal_lahir'];
			$alamat_rumah = $_POST['alamat_rumah'];
			$alamat_saat_ini = $_POST['alamat_saat_ini'];
			$agama = $_POST['agama'];
			$jenis_kelamin = $_POST['jenis_kelamin'];
			$telp_rumah = $_POST['telp_rumah'];
			$no_hp = $_POST['no_hp'];
			$stoken = $_POST['stoken'];
			
			$CI->form_validation->set_rules('realname', 'Nama Asli', 'required|xss_clean');
			$CI->form_validation->set_rules('stoken', 'CSRF Token Not Found', 'required');

			if(($CI->form_validation->run($CI) == TRUE) && ($CI->crypto->hashed_sha256("!!34df$#jkUWml2!md3.^03-.!jWek") == $CI->encrypt->decode($stoken)))
			{
				$data['user_id'] = $user_id;
				$data['realname'] = $realname;
				$data['gelar_depan'] = $gelar_depan;
				$data['gelar_belakang'] = $gelar_belakang;
				$data['tempat_lahir'] = $tempat_lahir;
				$data['tanggal_lahir'] = $tanggal_lahir;
				$data['alamat_rumah'] = $alamat_rumah;
				$data['alamat_saat_ini'] = $alamat_saat_ini;
				$data['agama'] = $agama;
				$data['jenis_kelamin'] = $jenis_kelamin;
				$data['telp_rumah'] = $telp_rumah;
				$data['no_hp'] = $no_hp;

				$CI->load->model('admin_model');
				$biodata_id = $CI->admin_model->insert('biodata', $data);

				if(isset($_FILES)){
					foreach ($_FILES as $kFiles => $vFiles) 
					{
						if(is_uploaded_file($_FILES[$kFiles]['tmp_name']))
						{ 
							$uploaddir = $this->field[$kFiles]['dir_to_save'] . '/';
							$data[$kFiles] = $CI->db_to_form->do_upload($_FILES[$kFiles], $kFiles, $uploaddir, $user_id);
							$CI->admin_model->update('biodata', 'id', $biodata_id, $data);
						}
					}
				}
				return $this->create_list_view();
			}
			else
			{
				return $this->insert_form();
			}
		}else{
			redirect(base_url().'user', 'location', 302);
		}
	}

	function saveupdatedata()
	{
		$CI =& get_instance();
		if($CI->session->username && $CI->session->logged_in && $CI->session->usersessionkey)
		{
			$user_id = $CI->session->user_id;
			$realname = $_POST['realname'];
			$gelar_depan = $_POST['gelar_depan'];
			$gelar_belakang = $_POST['gelar_belakang'];
			$tempat_lahir = $_POST['tempat_lahir'];
			$tanggal_lahir = $_POST['tanggal_lahir'];
			$alamat_rumah = $_POST['alamat_rumah'];
			$alamat_saat_ini = $_POST['alamat_saat_ini'];
			$agama = $_POST['agama'];
			$jenis_kelamin = $_POST['jenis_kelamin'];
			$telp_rumah = $_POST['telp_rumah'];
			$no_hp = $_POST['no_hp'];
			$stoken = $_POST['stoken'];
			
			$CI->form_validation->set_rules('realname', 'Nama Asli', 'required|xss_clean');
			$CI->form_validation->set_rules('stoken', 'CSRF Token Not Found', 'required');

			if(($CI->form_validation->run($CI) == TRUE) && ($CI->crypto->hashed_sha256("!!34df$#jkUWml2!md3.^03-.!jWek") == $CI->encrypt->decode($stoken)))
			{
				$data['user_id'] = $user_id;
				$data['realname'] = $realname;
				$data['gelar_depan'] = $gelar_depan;
				$data['gelar_belakang'] = $gelar_belakang;
				$data['tempat_lahir'] = $tempat_lahir;
				$data['tanggal_lahir'] = $tanggal_lahir;
				$data['alamat_rumah'] = $alamat_rumah;
				$data['alamat_saat_ini'] = $alamat_saat_ini;
				$data['agama'] = $agama;
				$data['jenis_kelamin'] = $jenis_kelamin;
				$data['telp_rumah'] = $telp_rumah;
				$data['no_hp'] = $no_hp;

				$CI->load->model('admin_model');
				$CI->admin_model->update('biodata', 'user_id', $user_id, $data);

				if(isset($_FILES))
				{
					foreach ($_FILES as $kFiles => $vFiles) 
					{
						if(is_uploaded_file($_FILES[$kFiles]['tmp_name']))
						{ 
							$uploaddir = $this->field[$kFiles]['dir_to_save'] . '/';
							$data[$kFiles] = $CI->db_to_form->do_upload($_FILES[$kFiles], $kFiles, $uploaddir, $user_id);
							$CI->admin_model->update('biodata', 'user_id', $user_id, $data);
						}
					}
				}
				return $this->create_list_view();
			}
			else
			{
				return $this->insert_form();
			}
		}else{
			redirect(base_url().'user', 'location', 302);
		}
	}

}
