<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact
{
	var $name = 'Contact';
	var $title = 'Seleksi Jabatan Pimpinan Tinggi Bappenas';
	
	function create_list_view($error = "")
	{
		$CI =& get_instance();
		$view['header'] = 'Contact Us';
		$view['error'] = $error;
		$first_number = rand(0,100);
		$second_number = rand(0, 100);
		$view['first_number'] = $first_number;
		$view['second_number'] = $second_number;
		$view['crsf_name'] = $CI->security->get_csrf_token_name();
		$view['crsf_hash'] = $CI->security->get_csrf_hash();
		
		return $view;
	}

	function savenewdata()
	{
		$CI =& get_instance();
		
		$inputNama = $_POST['inputNama'];
		$inputEmail = $_POST['inputEmail'];
		$inputIsi = $_POST['inputIsi'];
		$robot_check = $_POST['robot_check'];
		$a = $_POST['robot_check_a'];
		$b = $_POST['robot_check_b'];
		

		$CI->form_validation->set_message('required', '{field} wajib diisi.');
		$CI->form_validation->set_message('is_unique', '{field} sudah digunakan.');
		$CI->form_validation->set_message('valid_email', '{field} tidak sesuai dengan format email.');
		$CI->form_validation->set_message('matches', '{field} tidak sama dengan {param}.');
		
		$CI->form_validation->set_rules('inputNama', 'Nama', 'required|xss_clean');
		$CI->form_validation->set_rules('inputEmail', 'Email', 'required|xss_clean|valid_email');
		$CI->form_validation->set_rules('inputIsi', 'Pertanyaan', 'required|xss_clean');
		$CI->form_validation->set_rules('robot_check', 'Robot Check', 'required|xss_clean');
		
		if(($CI->form_validation->run($CI) == TRUE) && ($b - $a == $robot_check))
		{
			$CI->load->model('admin_model');
			$data['nama'] = $inputNama;
			$data['email'] = $inputEmail;
			$data['pertanyaan'] = $inputIsi;
			$CI->admin_model->insert('contact', $data);

			return $this->pendaftaran_sukses();
		}
		else
		{
			$error = '<div class="box box-solid box-danger">';
			$error .= '<div class="box-header bg-red">';
			$error .= '<i class="fa fa-warning"></i>';
			$error .= '<h3 class="box-title">Error.</h3>';
			$error .= '<div class="box-tools pull-right">';
			$error .= '<button class="btn btn-sm bg-red" data-widget="remove"><i class="fa fa-times"></i></button>';
			$error .= '</div>';
			$error .= '</div>';
			$error .= '<div class="box-body border-radius-none">';
			$error .= validation_errors();
			$error .= '</div>';
			$error .= '</div>';

			return $this->create_list_view($error);
		}
	}

	function pendaftaran_sukses()
	{

		$v = '<div class="well">';
		$v .= 'Data telah berhasil dimasukkan.<br/>';
		$v .= 'Terimakasih.';
		$v .= '</div>';
		
		$CI =& get_instance();
		$view['header'] = 'Contact Us';
		$view['error'] = $v;
		$first_number = rand(0,100);
		$second_number = rand(0, 100);
		$view['first_number'] = $first_number;
		$view['second_number'] = $second_number;
		$view['crsf_name'] = $CI->security->get_csrf_token_name();
		$view['crsf_hash'] = $CI->security->get_csrf_hash();
		
		return $view;
	}

}
