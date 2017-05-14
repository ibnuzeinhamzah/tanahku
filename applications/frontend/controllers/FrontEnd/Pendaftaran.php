<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendaftaran
{
	var $name = 'Pendaftaran';
	var $table = 'pendaftar';
	var $field = array(
						'id' => array('type' => 'primary_key','show_on_table'=>false),
						'user_id' => array('type' => 'onetoone','text' => 'Username','fkey' => 'Users','show_on_table'=>false),
						'email' => array('type' => 'varchar','text' => 'Email','show_on_table'=>false),
						'nip' => array('type' => 'varchar','text' => 'NIP'),
						'no_ktp' => array('type' => 'varchar','text' => 'No. KTP','show_on_table'=>false),
						'jurusan_formasi' => array('type' => 'onetoone','text' => 'Formasi Jabatan','fkey' => 'FormasiJabatan'),
						'no_registrasi' => array('type' => 'varchar','text' => 'No. Registrasi'),
						'aktivasi' => array('type' => 'flag','text' => 'Sudah Aktivasi','flag_value' => array(0=>'Belum',1=>'Sudah')),
						'link_aktivasi' => array('type' => 'varchar','text' => 'URL Link Aktivasi','show_on_table'=>false),
						'updated' => array('type' => 'flag','text' => 'Sudah Di Update','flag_value' => array(0=>'Belum',1=>'Sudah')),
					);

	function create_list_view($data = array())
	{
		$CI =& get_instance();
		$a = rand(0,50);
		$b = rand(0,50);
		$c = $CI->crypto->encrypted("jd92ks,!ks#.3SWek3-@dm3");
		$csrf = array(
			'name' => $CI->security->get_csrf_token_name(),
			'hash' => $CI->security->get_csrf_hash()
		);
		
		$formasi = $CI->frontend_model->get_data_by_sql("SELECT id, nama FROM formasi_jabatan");

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
		$view .= '</div>';

		$view .= '<form class="form-horizontal" action="'.base_url().'pendaftaran/savenewdata" method="post">';
		$view .= '<div class="box-body">';

		$view .= '<div class="form-group">';
		$view .= '<label class="col-md-3 control-label">Nama Lengkap</label>';
		$view .= '<div class="col-md-8">';
		$view .= '<input id="realname" name="realname" class="form-control input-sm" type="text" placeholder="Nama Lengkap">';
		$view .= '</div>';
		$view .= '</div>';

		$view .= '<div class="form-group">';
		$view .= '<label class="col-md-3 control-label">NIP</label>';
		$view .= '<div class="col-md-8">';
		$view .= '<input id="nip" name="nip" class="form-control input-sm" type="text" placeholder="NIP">';
		$view .= '</div>';
		$view .= '</div>';

		$view .= '<div class="form-group">';
		$view .= '<label class="col-md-3 control-label">No. KTP</label>';
		$view .= '<div class="col-md-8">';
		$view .= '<input id="no_ktp" name="no_ktp" class="form-control input-sm" type="text" placeholder="No KTP">';
		$view .= '</div>';
		$view .= '</div>';

		$view .= '<div class="form-group">';
		$view .= '<label class="col-md-3 control-label">Email</label>';
		$view .= '<div class="col-md-8">';
		$view .= '<input id="email" name="email" class="form-control input-sm" type="text" placeholder="Email">';
		$view .= '</div>';
		$view .= '</div>';

		$view .= '<div class="form-group">';
		$view .= '<label class="col-md-3 control-label">Password</label>';
		$view .= '<div class="col-md-8">';
		$view .= '<input id="password" name="password" class="form-control input-sm" type="password" placeholder="Password" value="">';
		$view .= '</div>';
		$view .= '</div>';

		$view .= '<div class="form-group">';
		$view .= '<label class="col-md-3 control-label">Confirm Password</label>';
		$view .= '<div class="col-md-8">';
		$view .= '<input id="confirm_password" name="confirm_password" class="form-control input-sm" type="password" placeholder="Confirm Password" value="">';
		$view .= '</div>';
		$view .= '</div>';

		// $view .= '<div class="form-group">';
		// $view .= '<label class="col-md-3 control-label">Formasi Jabatan</label>';
		// $view .= '<div class="col-md-8">';
		// $view .= '<select name="jurusan_formasi" class="form-control">';
		// $view .= '<option value="">-- Pilih Formasi Jabatan --</option>';
		// for($j=0;$j<count($formasi);$j++) $view .= '<option value="'.$formasi[$j]->id.'">'.$formasi[$j]->nama.'</option>';
		// $view .= '</select>';
		// $view .= '</div>';
		// $view .= '</div>';

		$view .= '<div class="form-group">';
		$view .= '<label class="col-md-3 control-label ">Robot Check</label>';
		$view .= '<div class="col-md-2">';
		$view .= '<input id="robot_check" name="robot_check" class="form-control input-sm" type="text" placeholder="">';
		$view .= '</div>';
		$view .= '<div class="col-md-6">';
		$view .= '<label> + ' . $a . ' = ' . $b .'</label>';
		//$view .= '<div class="col-md-8">';
		//$view .= '<div class="g-recaptcha" data-sitekey="6LdpWhYTAAAAAL0kjlb-womfd4eo6J0Xw7rUNfcG"></div>';
		$view .= '</div>';
		$view .= '</div>';

		$view .= '</div>';

		$view .= '<div class="box-footer">';
		$view .= '<input name="robot_check_a" class="form-control input-sm" type="hidden" value="'.$a.'">';
		$view .= '<input name="robot_check_b" class="form-control input-sm" type="hidden" value="'.$b.'">';
		$view .= '<input name="robot_check_c" class="form-control input-sm" type="hidden" value="'.$c.'">';
		$view .= '<input type="hidden" name="'.$csrf['name'].'" value="'.$csrf['hash'].'" />';
		$view .= '<button class="btn btn-primary btn-flat btn-sm" type="submit">Submit</button>';
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
		//$recaptcha = $_POST['g-recaptcha-response'];
		//$this->validate_recaptcha($recaptcha);

		$realname = $_POST['realname'];
		$nip = $_POST['nip'];
		$no_ktp = $_POST['no_ktp'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$confirm_password = $_POST['confirm_password'];
		// $jurusan_formasi = $_POST['jurusan_formasi'];
		$robot_check = $_POST['robot_check'];
		$a = $_POST['robot_check_a'];
		$b = $_POST['robot_check_b'];
		$c = $_POST['robot_check_c'];
		
		$CI->form_validation->set_message('required', '{field} wajib diisi.');
		$CI->form_validation->set_message('is_unique', '{field} sudah digunakan.');
		$CI->form_validation->set_message('valid_email', '{field} tidak sesuai dengan format email.');
		$CI->form_validation->set_message('matches', '{field} tidak sama dengan {param}.');
		$CI->form_validation->set_message('exact_length', 'panjang {field} tidak sama dengan {param} digit.');

		$CI->form_validation->set_rules('realname', 'Nama Lengkap', 'required|xss_clean');
		$CI->form_validation->set_rules('nip', 'NIP', 'required|xss_clean|is_unique[pendaftar.nip]|exact_length[18]');
		$CI->form_validation->set_rules('no_ktp', 'No KTP', 'required|xss_clean|is_unique[pendaftar.no_ktp]');
		$CI->form_validation->set_rules('email', 'Email', 'required|xss_clean|valid_email|is_unique[users.username]');
		$CI->form_validation->set_rules('password', 'Password', 'required|xss_clean|matches[confirm_password]|min_length[8]');
		$CI->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|xss_clean|matches[password]');
		$CI->form_validation->set_rules('robot_check', 'Robot Check', 'required|xss_clean');

		if(($CI->form_validation->run($CI) == TRUE) && ($CI->crypto->hashed_sha256("jd92ks,!ks#.3SWek3-@dm3") == $CI->encrypt->decode($c)) && ($b - $a == $robot_check))
		{
			$CI->load->model('admin_model');
			$password = $CI->crypto->encrypted($password);
			$data_users['username'] = $email;
			$data_users['password'] = $password;
			$data_users['realname'] = '';
			$data_users['active'] = 0;
			$user_id = $CI->admin_model->insert('users', $data_users);
			$registrasi_user_id = $user_id;
			while (strlen($registrasi_user_id) <= 8) {
				$registrasi_user_id = '0' . $registrasi_user_id;
			}
			// $registrasi_jurusan = $jurusan_formasi;
			// while (strlen($registrasi_jurusan) <= 3) {
			// 	$registrasi_jurusan = '0' . $registrasi_jurusan;
			// }
			// $no_registrasi = date("Y") . $jurusan_formasi . $registrasi_user_id;
			$no_registrasi = date("Y") . $registrasi_user_id;
			$link_aktivasi = $no_registrasi.'-'.strtoupper(substr($c,2,25));
			$link_aktivasi = str_replace("/", "-", $link_aktivasi);
			$link_aktivasi = str_replace("+", "-", $link_aktivasi);

			$user_group['user_id'] = $user_id;
			$user_group['group_id'] = 2;
			$CI->admin_model->insert('user_group', $user_group);

			$data_pendaftar['realname'] = $realname;
			$data_pendaftar['nip'] = $nip;
			$data_pendaftar['no_ktp'] = $no_ktp;
			$data_pendaftar['user_id'] = $user_id;
			$data_pendaftar['email'] = $email;
			// $data_pendaftar['jurusan_formasi'] = $jurusan_formasi;
			$data_pendaftar['no_registrasi'] = $no_registrasi;
			$data_pendaftar['link_aktivasi'] = $link_aktivasi;
			if (!$CI->admin_model->insert('pendaftar', $data_pendaftar)) {
				$CI->admin_model->delete('users', $user_id, 'id');
				$CI->admin_model->delete('user_group', $user_id, 'user_id');
			}

			$data['username'] = $data_users['username'];
			$data['link_aktivasi'] = $data_pendaftar['link_aktivasi'];

			return $this->sending_email($data);
		}
		else
		{
			// $data['jurusan_formasi'] = $jurusan_formasi;
			$data['realname'] = $realname;
			$data['nip'] = $nip;
			$data['no_ktp'] = $no_ktp;
			$data['email'] = $email;

			return $this->create_list_view($data);
		}
	}

	function resend_email()
	{
		$data['username'] = $_POST['username'];
		$data['link_aktivasi'] = $_POST['link_aktivasi'];

		return $this->sending_email($data);
	}

	function sending_email($data = "")
	{
		$CI =& get_instance();
		$CI->load->library('email');
		$email_from = $CI->config->item('email_from');
		$email_from_name = $CI->config->item('email_from_name');
		$CI->email->from($email_from, $email_from_name);

		$recipient = $data['username'];
		$subject = 'Aktivasi Pendaftaran Lelang Kementerian Perencanaan Pembangunan Nasional / Bappenas';
		$message = 'Selamat Anda telah berhasil mendaftar dalam Lelang Jabatan Kementerian Perencanaan Pembangunan Nasional / Bappenas.'."\r\n";
		$message .= 'Silahkan klik link aktivasi dibawah ini untuk melakukan aktivasi login Anda.'."\r\n";
		$message .= 'Gunakan login dibawah ini untuk login ke Sistem Lelang Jabatan Kementerian Perencanaan Pembangunan Nasional / Bappenas.'."\r\n"."\r\n";
		$message .= 'Username : '.$data['username']."\r\n";
		$message .= 'Password : ********** (password yang Anda masukkan pada saat pendaftaran).'."\r\n"."\r\n";
		$message .= 'Link aktivasi : '.LINK_URL.'/pendaftaran/aktivasi/'.$data['link_aktivasi']."\r\n"."\r\n"."\r\n";
		$message .= 'Kementerian Perencanaan Pembangunan Nasional / Bappenas.'."\r\n";
		
		$CI->email->to($recipient); 
		$CI->email->subject($subject);
		$CI->email->message($message);

		if($CI->email->send()) { return $this->pendaftaran_sukses(); }
		else { return $this->gagal_kirim_email($data); }
	}

	function gagal_kirim_email($data = "")
	{
		$CI =& get_instance();
		$csrf = array(
			'name' => $CI->security->get_csrf_token_name(),
			'hash' => $CI->security->get_csrf_hash()
		);
		$v = '<div class="container">';
		$v .= '<div class="row">';
		$v .= '<div class="col-lg-12">';
		$v .= '<h3>Pendaftaran Lelang Jabatan Kementerian Perencanaan Pembangunan Nasional / Bappenas</h3>';
		$v .= '<div class="row">';
		$v .= '<div class="col-lg-12 col-lg-offset-1">';
		$v .= '<div class="well">';
		$v .= 'Data telah berhasil dimasukkan.<br/>';
		$v .= 'Namun kami tidak berhasil mengirim link aktivasi ke email anda.<br/>';
		$v .= 'Silahkan klik tombol dibawah untuk mencoba mengirim ulang link aktivasi ke email anda.<br/><br/>';
		$v .= '<form class="bs-example form-horizontal"  action="'.REALPATH.'pendaftaran/resendemail" method="post">';
		$v .= '<input type="hidden" name="username" value="'.$data['username'].'">';
		$v .= '<input type="hidden" name="link_aktivasi" value="'.$data['link_aktivasi'].'">';
		$v .= '<div class="form-group">';
		$v .= '<div class="col-sm-9 col-sm-offset-3">';
		$v .= '<input type="hidden" name="'.$csrf['name'].'" value="'.$csrf['hash'].'" />';
		$v .= '<button class="btn btn-primary"> Resend </button>';
		$v .= '</div>';
		$v .= '</div>';
		$v .= '</form>';
		$v .= '</div>';
		$v .= '</div>';
		$v .= '</div>';
		$v .= '</div>';
		$v .= '</div>';
		$v .= '</div>';

		return $v;
	}

	function pendaftaran_sukses()
	{
		$v = '<div class="container">';
		$v .= '<div class="row">';
		$v .= '<div class="col-lg-12">';
		$v .= '<h3>Pendaftaran Lelang Jabatan Kementerian Perencanaan Pembangunan Nasional / Bappenas</h3>';
		$v .= '<div class="row">';
		$v .= '<div class="col-lg-12 col-lg-offset-1">';
		$v .= '<div class="well">';
		$v .= 'Data telah berhasil dimasukkan.<br/>';
		$v .= 'Silahkan membuka email Anda untuk mengaktivasi login Anda.';
		$v .= '</div>';
		$v .= '</div>';
		$v .= '</div>';
		$v .= '</div>';
		$v .= '</div>';
		$v .= '</div>';

		return $v;
	}

	function aktivasi($link)
	{
		$CI =& get_instance();
		$link_aktivasi = $link;
		$aktivasi = substr($link_aktivasi, 0, 13);
		$CI->load->model('frontend_model');
		$data_from_db = $CI->frontend_model->get_data_by_sql("SELECT id, user_id, no_registrasi, link_aktivasi FROM pendaftar WHERE aktivasi = 0 AND no_registrasi = '".$aktivasi."' AND link_aktivasi = '".$link_aktivasi."' LIMIT 1");
		if(count($data_from_db) > 0)
		{
			if($data_from_db[0]->no_registrasi == $aktivasi && $data_from_db[0]->link_aktivasi == $link_aktivasi)
			{
				$id = $data_from_db[0]->id;
				$user_id = $data_from_db[0]->user_id;
				$CI->load->model('admin_model');
				$data_pendaftar = array();
				$data_pendaftar['aktivasi'] = 1;
				$data_users = array();
				$data_users['active'] = 1;
				$CI->admin_model->update('pendaftar', 'id', $id, $data_pendaftar);
				$CI->admin_model->update('users', 'id', $user_id, $data_users);
				$message['message'] = 'Data anda telah berhasil di aktivasi.<br/>Silahkan login untuk memasukkan data lengkap anda.';
			}
			else
			{
				$message['message'] = 'Link aktivasi salah atau sudah tidak berlaku lagi.';
			}
		}
		else
		{
			$message['message'] = 'Link aktivasi salah atau sudah tidak berlaku lagi.';
		}
		return $this->message_aktivasi($message);
	}

	function message_aktivasi($message)
	{
		$v = '<div class="container">';
		$v .= '<div class="row">';
		$v .= '<div class="col-lg-12">';
		$v .= '<h3>Pendaftaran Lelang Jabatan Kementerian Perencanaan Pembangunan Nasional / Bappenas</h3>';
		$v .= '<div class="row">';
		$v .= '<div class="col-lg-12 col-lg-offset-1">';
		$v .= '<div class="well">';
		$v .= $message['message'];
		$v .= '</div>';
		$v .= '</div>';
		$v .= '</div>';
		$v .= '</div>';
		$v .= '</div>';
		$v .= '</div>';
		return $v;
	}

	function validate_recaptcha($recaptcha)
	{
		$url = "https://www.google.com/recaptcha/api/siteverify";
		$fields = array(
			'secret' => urlencode('6LdpWhYTAAAAADHF86nf7IWKD63kTT3DfqGiblCM'),
			'response' => urlencode($recaptcha)
		);
		$fields_string = http_build_query($fields); //'';
		//foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
		//rtrim($fields_string, '&');

		$google_url = "https://www.google.com/recaptcha/api/siteverify";
		$secret = '6LdpWhYTAAAAADHF86nf7IWKD63kTT3DfqGiblCM';
		$ip = $_SERVER['REMOTE_ADDR'];
		$url = $google_url."?secret=".$secret."&response=".$recaptcha."&remoteip=".$ip;

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		//curl_setopt($ch,CURLOPT_POST, count($fields));
		//curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_TIMEOUT, 10);
		$result = curl_exec($ch);      
		curl_close($ch);
		$res = json_decode($result, true);
		var_dump($res);
	}
}
