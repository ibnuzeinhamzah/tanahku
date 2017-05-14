<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller 
{
	protected $modname = "";
	protected $modfile = "";
	protected $modvars = "";
	protected $modtable = "";
	protected $modfield = "";
	protected $modfieldID = "";
	protected $vars = array('content' => '','modules' => 'Dashboard');

	function __construct()
	{
		parent::__construct();
		$this->modname = $this->uri->rsegment(3,'');
		$function = $this->uri->rsegment(2,'index');
		if($this->modname != '')
		{
			$this->modfile = $this->ModulesNameConv();
			include_once 'Admin/'.$this->modfile.'.php';
			$this->modvars = new $this->modfile;
			$this->modtable = $this->modvars->table;
			$this->modfield = $this->modvars->field;
			$this->modfieldID = $this->get_field_id();
			$this->vars['modules'] = $this->modvars->name;
		}
		$this->set_realpath();
		$this->load->model('users_model');
	}

	public function index()
	{
		if(!$this->session->userdata('logged_in')){ 
			$this->login();
		}else{
			if($this->modname != '')
			{
				$data = $this->users_model->get_all_data($this->modtable);
				$this->vars['content'] = $this->db_to_form->create_list_view($this->modname, $this->modvars, $data);
			}
			$this->load->view('users', $this->vars);
		}
	}

	public function login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$stoken = $this->input->post('stoken');

		if($username == 'admin'){
			redirect(base_url().'admin','location');
		}

		if($username != '' && $password != '' && $username != 'admin')
		{
			$this->form_validation->set_rules('username', 'Username', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');

			if(($this->form_validation->run() == TRUE) && ($this->crypto->hashed_sha256("!!34df$#jkUWml2!md3.^03-.!jWek") == $this->encrypt->decode($stoken)))
			{
				$data_from_db = $this->users_model->get_data_by_sql("SELECT a.id as user_id, a.username, a.realname, a.password, b.nip, b.no_ktp, b.jurusan_formasi, b.no_registrasi FROM users a LEFT JOIN pendaftar b ON a.id = b.user_id WHERE a.username = '".$username."' AND a.active = 1 LIMIT 1;");
				if(count($data_from_db) > 0)
				{
					if($this->crypto->hashed_sha256($password) == $this->encrypt->decode($data_from_db[0]->password))
					{
						$this->session->sess_regenerate();
						unset($data_from_db[0]->password);
						$this->session->set_userdata(array('nip' => $data_from_db[0]->nip,'no_ktp' => $data_from_db[0]->no_ktp,'jurusan_formasi' => $data_from_db[0]->jurusan_formasi,'no_registrasi' => $data_from_db[0]->no_registrasi,'username' => $username, 'realname' => $data_from_db[0]->realname, 'user_id' => $data_from_db[0]->user_id, 'logged_in' => true, 'usersessionkey' => $this->crypto->encrypted($username)));

						redirect(base_url().'users','location');
					}
				}
			}
		}
		
		$this->login_form();
	}

	public function login_form()
	{
		$c = $this->crypto->encrypted("!!34df$#jkUWml2!md3.^03-.!jWek");
		$csrf = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash()
		);
		$this->vars['csrf'] = $csrf;
		$this->vars['c'] = $this->crypto->encrypted("!!34df$#jkUWml2!md3.^03-.!jWek");
		$this->load->view('login', $this->vars);
	}

	function logoff()
	{
		$CI =& get_instance();
		$CI->session->sess_destroy();
		$CI->session->sess_regenerate();
		redirect(base_url().'users','location');
	}

	function change_password()
	{
		$c = $this->crypto->encrypted("!!34df$#jkUWml2!md3.^03-.!jWek");
		$csrf = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash()
		);
		$this->vars['csrf'] = $csrf;
		$this->vars['c'] = $this->crypto->encrypted("!!34df$#jkUWml2!md3.^03-.!jWek");
		$this->load->view('change-password', $this->vars);
	}

	function update_password()
	{
		$CI =& get_instance();
		$password = $this->input->post('password');

		$newpassword_enc = $CI->crypto->encrypted($password);

		$data['id'] = $CI->session->userdata('user_id');
		$data['username'] = $CI->session->userdata('username');
		$data['realname'] = $CI->session->userdata('realname');
		$data['password'] = $newpassword_enc;

		$CI->users_model->update('users', $data);

		redirect(base_url().'users','location');
	}

	function forgot_password()
	{
		$c = $this->crypto->encrypted("!!34df$#jkUWml2!md3.^03-.!jWek");
		$csrf = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash()
		);
		$this->vars['csrf'] = $csrf;
		$this->vars['c'] = $this->crypto->encrypted("!!34df$#jkUWml2!md3.^03-.!jWek");
		$this->load->view('forgot-password', $this->vars);
	}

	function confirm_forgot_password()
	{
		$CI =& get_instance();
		$email = $CI->input->post('email');
		$nip = $CI->input->post('nip');
		
		$pass_enc = $CI->crypto->encrypted('password-baru');
		$newpassword = substr($pass_enc, 3,11);
		$newpassword_enc = $CI->crypto->encrypted($newpassword);
		
		$CI->form_validation->set_rules('email', 'Email', 'required');
		$CI->form_validation->set_rules('nip', 'NIP', 'required');
		$CI->form_validation->set_rules('nip', 'NIP & Email', 'callback_email_check['.$email.']');

		if ($CI->form_validation->run() == TRUE) {
			$datadb = $CI->users_model->get_data_by_sql("SELECT a.* FROM users a, pendaftar b WHERE a.id = b.user_id AND a.username LIKE '".$email."' AND b.nip = '".$nip."'");
			if (count($datadb) > 0) {
				$id = $datadb[0]->id;
				$data = array();
				$data['id'] = $id;
				$data['password'] = $newpassword_enc;
				$data['username'] = $email;
				$data['active'] = $datadb[0]->active;

				$CI->users_model->update('users', $data);

				$data['email'] = $email;
				$data['newpassword'] = $newpassword;
				$data['nip'] = $nip;
				return $this->sending_email($data);
			}
		}

		$this->forgot_password();
	}

	function sending_email($d)
	{
		$CI =& get_instance();
		$CI->load->library('email');
		$email_from = $CI->config->item('email_from');
		$email_from_name = $CI->config->item('email_from_name');
		$CI->email->from($email_from, $email_from_name);

		$recipient = $d['email'];
		$subject = 'Panitia Seleksi Jabatan Pimpinan Tinggi Bappenas';
		$message = 'Username Anda adalah : '.$d['email'].''."\r\n";
		$message .= 'Password baru Anda adalah : '.$d['newpassword'].''."\r\n";
		
		if (!$this->check_sudah_aktivasi($d)) {
			$datadb = $CI->users_model->get_data_by_sql("SELECT link_aktivasi FROM pendaftar WHERE email LIKE '".$d['email']."' AND nip = '".$d['nip']."' and aktivasi = 0");
			if (count($datadb) > 0) {
				$message .= $this->belum_aktivasi($datadb[0]->link_aktivasi);
			}
		}

		$CI->email->to($recipient); 
		$CI->email->subject($subject);
		$CI->email->message($message);

		if($CI->email->send()) { return $this->email_sukses(); }
		else { return $this->gagal_kirim_email($d); }
	}

	function check_sudah_aktivasi($d) {
		$CI =& get_instance();
		$datadb = $CI->users_model->get_data_by_sql("SELECT aktivasi FROM pendaftar WHERE email LIKE '".$d['email']."' AND nip = '".$d['nip']."'");
		if (count($datadb) > 0) {
			if ($datadb[0]->aktivasi == 1) return true;
		}
		return false;
	}

	function belum_aktivasi($data) {
		$message = 'Link aktivasi : '.LINK_URL.'/pendaftaran/aktivasi/'.$data."\r\n"."\r\n"."\r\n";
		$message .= 'Kementerian Perencanaan Pembangunan Nasional / Bappenas.'."\r\n";
		return $message;
	}

	function set_realpath()
	{
		$j = $this->uri->total_segments();
		$realpath = "";
		for($i=2;$i<=$j;$i++) $realpath .= "../";
		if($this->uri->total_segments() >= 1 && substr($_SERVER['REQUEST_URI'],-1) == "/") $realpath .= "../";
		define('REALPATH',$realpath);
	}

	function get_field_id()
	{
		foreach ($this->modfield as $key => $value) {
			if($value['type'] == 'primary_key') return $key;
		}
		return 'id';
	}

	function get_upload_file($target_dir, $file_post)
	{
		$config['upload_path'] = $target_dir;
		$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf|doc|docx|xls|xlsx|ppt|pptx';
		$this->load->library('upload', $config);

		if ($this->upload->do_upload($file_post))
        {
            return $this->upload->data('file_name');
        }
        return '';
	}

	function ModulesNameConv(){
		$t = explode("-", $this->modname);
		$modfile = "";
		for($i=0;$i<count($t);$i++) $modfile .= ucfirst($t[$i]);
		return $modfile;
	}

	function gagal_kirim_email($data = "")
	{
		$CI =& get_instance();
		$csrf = array(
			'name' => $CI->security->get_csrf_token_name(),
			'hash' => $CI->security->get_csrf_hash()
		);
		$v = '<div class="col-lg-12">';
		$v .= '<h3>Panitia Seleksi Jabatan Pimpinan Tinggi Bappenas</h3>';
		$v .= '<div class="row">';
		$v .= '<div class="col-lg-12 col-lg-offset-1">';
		$v .= 'Data telah berhasil dimasukkan.<br/>';
		$v .= 'Kami tidak berhasil mengirim password baru ke email anda.<br/>';
		$v .= 'Silahkan klik tombol dibawah untuk mencoba mengirim ulang password baru Anda.<br/><br/>';
		$v .= '<form class="bs-example form-horizontal"  action="'.REALPATH.'users/resendemail" method="post">';
		$v .= '<input type="hidden" name="email" value="'.$data['email'].'">';
		$v .= '<input type="hidden" name="newpassword" value="'.$data['newpassword'].'">';
		$v .= '<input type="hidden" name="nip" value="'.$data['nip'].'">';
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

		$this->load->view('confirm-forgot-password', array('v'=>$v));
	}

	function email_sukses()
	{
		$v = '<h3>Panitia Seleksi Jabatan Pimpinan Tinggi Bappenas</h3>';
		$v .= '<p>Password baru telah dikirim ke email Anda.<br/></p>';
		
		$this->load->view('confirm-forgot-password', array('v'=>$v));
	}

	function resend_email()
	{
		$CI =& get_instance();
		$data['email'] = $CI->input->post('email');
		$data['newpassword'] = $CI->input->post('newpassword');
		$data['nip'] = $CI->input->post('nip');

		return $this->sending_email($data);
	}

	function email_check($nip, $email) 
	{
		$CI =& get_instance();
		$datadb = $CI->users_model->get_data_by_sql("SELECT a.username FROM users a, pendaftar b WHERE a.id = b.user_id AND a.username LIKE '".$email."' AND b.nip = '".$nip."'");
		if (count($datadb) <= 0) {
			$this->form_validation->set_message('email_check', 'NIP '.$nip.' atau Email '.$email.' salah.');
			return FALSE;
		}

		return TRUE;
	}
}