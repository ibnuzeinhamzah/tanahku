<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PilihFormasiJabatan
{
	var $name = 'Pilih Formasi Jabatan';
	var $table = 'pendaftar';
	var $field = array(
						'id' => array('type' => 'primary_key','show_on_table'=>false),
						'user_id' => array('type' => 'onetoone','text' => 'Username','fkey' => 'Users','show_on_table'=>false),
						'jurusan_formasi' => array('type' => 'onetoone','text' => 'Formasi Jabatan','fkey' => 'FormasiJabatan'),
					);

	function create_list_view($data = array())
	{
		$CI =& get_instance();
		$csrf = array(
			'name' => $CI->security->get_csrf_token_name(),
			'hash' => $CI->security->get_csrf_hash()
		);
		$user_id = $CI->session->userdata('user_id');
		$sql_formasi = "SELECT id, nama, duedate FROM formasi_jabatan";
		// $sql_formasi .= ($user_id > LAST_56_USERS_ID) ? " WHERE id = " . OPEN_FORMATION_ID : "";
		$formasi = $CI->users_model->get_data_by_sql($sql_formasi);
		$pilihanformasi = $CI->users_model->get_data_by_id('pendaftar',$user_id,'user_id');
		$formasiterpilih = explode("#", $pilihanformasi[0]->jurusan_formasi);

		$view = '';
		$view .= '<div class="col-md-2 desktop-only"></div>';
		$view .= '<div class="col-md-8">';

		if(validation_errors()){
			$view .= '<div class="box box-solid box-danger">';
			$view .= '<div class="box-header bg-red">';
			$view .= '<i class="fa fa-warning"></i>';
			$view .= '<h3 class="box-title">Form Pendaftaran Error.</h3>';
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
		$view .= '<div class="box-header with-border">';
		$view .= '<h4>Form Pendaftaran Seleksi Jabatan Pimpinan Tinggi</h4>';
		$view .= '<h5><i>Semua pilihan harus diisi.</i></h5>';
		$view .= '</div>';

		$view .= '<form class="form-horizontal" action="'.REALPATH.'users/pilih-formasi-jabatan/savenewdata" method="post">';
		$view .= '<div class="box-body">';

		$view .= '<div class="form-group">';
		$view .= '<label class="col-md-3 control-label">Formasi Jabatan I</label>';
		$view .= '<div class="col-md-8">';
		// $view .= '<select name="jurusan_formasi1" class="form-control" onchange="allSelected('.(LAST_56_USERS_ID >= $user_id).')">';
		$view .= '<select name="jurusan_formasi1" class="form-control">';
		$view .= '<option value="">-- Pilih Formasi Jabatan --</option>';
		for($j=0;$j<count($formasi);$j++){
			$selected = (isset($formasiterpilih[0]) && $formasi[$j]->id == $formasiterpilih[0]) ? 'selected' : '';
			if ($selected == 'selected' || strtotime($formasi[$j]->duedate) >= strtotime(date("Y-m-d H:i:s"))) {
				$view .= '<option value="'.$formasi[$j]->id.'" '.$selected.'>'.$formasi[$j]->nama.'</option>';
			}
		}
		$view .= '</select>';
		$view .= '</div>';
		$view .= '</div>';

		// if (LAST_56_USERS_ID >= $user_id) {
		// 	$view .= '<div class="form-group">';
		// 	$view .= '<label class="col-md-3 control-label">Formasi Jabatan II</label>';
		// 	$view .= '<div class="col-md-8">';
		// 	$view .= '<select name="jurusan_formasi2" class="form-control" onchange="allSelected(true)">';
		// 	$view .= '<option value="">-- Pilih Formasi Jabatan --</option>';
		// 	for($j=0;$j<count($formasi);$j++){
		// 		$selected = (isset($formasiterpilih[1]) && $formasi[$j]->id == $formasiterpilih[1]) ? 'selected' : '';
		// 		if ($selected == 'selected' || strtotime($formasi[$j]->duedate) >= strtotime(date("Y-m-d H:i:s"))) {
		// 			$view .= '<option value="'.$formasi[$j]->id.'" '.$selected.'>'.$formasi[$j]->nama.'</option>';
		// 		}
		// 	}
		// 	$view .= '</select>';
		// 	$view .= '</div>';
		// 	$view .= '</div>';

		// 	$view .= '<div class="form-group">';
		// 	$view .= '<label class="col-md-3 control-label">Formasi Jabatan III</label>';
		// 	$view .= '<div class="col-md-8">';
		// 	$view .= '<select name="jurusan_formasi3" class="form-control" onchange="allSelected(true)">';
		// 	$view .= '<option value="">-- Pilih Formasi Jabatan --</option>';
		// 	for($j=0;$j<count($formasi);$j++){
		// 		$selected = (isset($formasiterpilih[2]) && $formasi[$j]->id == $formasiterpilih[2]) ? 'selected' : '';
		// 		if ($selected == 'selected' || strtotime($formasi[$j]->duedate) >= strtotime(date("Y-m-d H:i:s"))) {
		// 			$view .= '<option value="'.$formasi[$j]->id.'" '.$selected.'>'.$formasi[$j]->nama.'</option>';
		// 		}
		// 	}
		// 	$view .= '</select>';
		// 	$view .= '</div>';
		// 	$view .= '</div>';

		// 	$view .= '<div class="form-group">';
		// 	$view .= '<label class="col-md-3 control-label">Formasi Jabatan IV</label>';
		// 	$view .= '<div class="col-md-8">';
		// 	$view .= '<select name="jurusan_formasi4" class="form-control" onchange="allSelected(true)">';
		// 	$view .= '<option value="">-- Pilih Formasi Jabatan --</option>';
		// 	for($j=0;$j<count($formasi);$j++){
		// 		$selected = (isset($formasiterpilih[3]) && $formasi[$j]->id == $formasiterpilih[3]) ? 'selected' : '';
		// 		if ($selected == 'selected' || strtotime($formasi[$j]->duedate) >= strtotime(date("Y-m-d H:i:s"))) {
		// 			$view .= '<option value="'.$formasi[$j]->id.'" '.$selected.'>'.$formasi[$j]->nama.'</option>';
		// 		}
		// 	}
		// 	$view .= '</select>';
		// 	$view .= '</div>';
		// 	$view .= '</div>';
		// }

		$view .= '</div>';

		$view .= '<div class="box-footer">';
		$view .= '<input type="hidden" name="user_id" value="'.$user_id.'" />';
		$view .= '<input type="hidden" name="'.$csrf['name'].'" value="'.$csrf['hash'].'" />';
		$view .= '<button class="btn btn-default btn-flat btn-sm disabled" type="submit" disabled>Submit</button>';
		$view .= '</div>';
		$view .= '</form>';

		$view .= '</div>'; // box
		$view .= '</div>'; // col-md-6
		$view .= '<div class="col-md-2 desktop-only"></div>';

		return $view;
	}

	function savenewdata()
	{
		$CI =& get_instance();
		$user_id = $CI->session->userdata('user_id');
		$jurusan_formasi1 = $CI->input->post('jurusan_formasi1');
		// if (LAST_56_USERS_ID >= $user_id) {
		// 	$jurusan_formasi2 = $CI->input->post('jurusan_formasi2');
		// 	$jurusan_formasi3 = $CI->input->post('jurusan_formasi3');
		// }
		
		// if($CI->form_validation->run($CI) == TRUE)
		// {
		$data_update['jurusan_formasi'] = $jurusan_formasi1;
		// $data_update['jurusan_formasi'] .= (LAST_56_USERS_ID >= $user_id) ? '#' . $jurusan_formasi2 . '#' . $jurusan_formasi3 : "";
		// var_dump($data_update['jurusan_formasi']);
		$CI->users_model->update_by_id('pendaftar', $user_id, 'user_id', 'jurusan_formasi', $data_update['jurusan_formasi']);
		// exit();
		redirect(base_url().'users','location');
		// }
		// else
		// {
		// 	$data['jurusan_formasi1'] = $jurusan_formasi1;
		// 	$data['jurusan_formasi2'] = $jurusan_formasi2;
			
		// 	return $this->create_list_view($data);
		// }
	}

}
