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
		$this->load->model('admin_model');
	}

	public function index()
	{
		if(!$this->session->userdata('logged_in')){ 
			$this->login();
		}else{
			if($this->modname != '')
			{
				$data = $this->admin_model->get_all_data($this->modtable);
				$this->vars['content'] = $this->db_to_form->create_list_view($this->modname, $this->modvars, $data);
			}
			$this->load->view('admin', $this->vars);
		}
	}

	public function login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$stoken = $this->input->post('stoken');

		if($username != '' && $password != '')
		{
			$this->form_validation->set_rules('username', 'Username', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');

			if(($this->form_validation->run() == TRUE) && ($this->crypto->hashed_sha256("!!34df$#jkUWml2!md3.^03-.!jWek") == $this->encrypt->decode($stoken)))
			{
				$data_from_db = $this->admin_model->get_data_by_sql("SELECT a.id as user_id, a.username, a.realname, a.password FROM users a WHERE a.username = '".$username."' LIMIT 1;");
				if(count($data_from_db) > 0)
				{
					if($this->crypto->hashed_sha256($password) == $this->encrypt->decode($data_from_db[0]->password))
					{
						$this->session->sess_regenerate();
						unset($data_from_db[0]->password);
						$this->session->set_userdata(array('username' => $username, 'realname' => $data_from_db[0]->realname, 'user_id' => $data_from_db[0]->user_id, 'logged_in' => true, 'usersessionkey' => $this->crypto->encrypted($username)));

						redirect(base_url().'admin','location');
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
		redirect(base_url().'admin','location');
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
		$password = $_POST['password'];

		$newpassword_enc = $CI->crypto->encrypted($password);

		$data['id'] = $CI->session->userdata('user_id');
		$data['username'] = 'admin';
		$data['realname'] = $CI->session->userdata('realname');
		$data['password'] = $newpassword_enc;

		$CI->admin_model->update('users', $data);

		redirect(base_url().'admin','location');
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
}