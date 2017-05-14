<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FrontEnd extends CI_Controller 
{
	protected $modname = "";
	protected $modfile = "";
	protected $modvars = "";
	protected $vars = array('content' => '','modules' => 'Dashboard');

	function __construct()
	{
		parent::__construct();
		$this->modname = $this->uri->rsegment(3,'welcome');
		$this->modfile = $this->ModulesNameConv();
		if(file_exists(APPPATH.'/controllers/FrontEnd/'.$this->modfile.'.php')){
			include_once 'FrontEnd/'.$this->modfile.'.php';
			$this->modvars = new $this->modfile;
			$this->vars['modules'] = $this->modvars->name;
			$this->set_realpath();
			$this->load->model('frontend_model');
		}else{
			show_404();
		}
	}

	function template($view)
	{
		$this->vars['session'] = $this->session;
		$this->load->view('header', $this->vars);
		$this->load->view($view, $this->vars);
		$this->load->view('footer', $this->vars);
	}

	public function index()
	{
		$this->vars['content'] = $this->modvars->create_list_view();
		$v = file_exists(APPPATH.'/views/'.$this->modfile.'/index.php') ? $this->modfile.'/index' : 'index';
		$this->template($v);
	}

	public function detail()
	{
		$this->vars['content'] = $this->modvars->create_detail_view();
		$v = file_exists(APPPATH.'/views/'.$this->modfile.'/detail.php') ? $this->modfile.'/detail' : 'detail';
		$this->template($v);
	}

	function insertnewdata()
	{
		$this->vars['content'] = $this->modvars->insert_form();
		$v = file_exists(APPPATH.'/views/'.$this->modfile.'/index.php') ? $this->modfile.'/index' : 'index';
		$this->template($v);
	}

	function editdata()
	{
		$this->vars['content'] = $this->modvars->edit_form();
		$v = file_exists(APPPATH.'/views/'.$this->modfile.'/index.php') ? $this->modfile.'/index' : 'index';
		$this->template($v);
	}

	function savenewdata()
	{
		$this->vars['content'] = $this->modvars->savenewdata();
		$v = file_exists(APPPATH.'/views/'.$this->modfile.'/index.php') ? $this->modfile.'/index' : 'index';
		$this->template($v);
	}

	function saveupdatedata()
	{
		$this->vars['content'] = $this->modvars->saveupdatedata();
		$v = file_exists(APPPATH.'/views/'.$this->modfile.'/index.php') ? $this->modfile.'/index' : 'index';
		$this->template($v);
	}

	function resendemail()
	{
		$this->vars['content'] = $this->modvars->resend_email();
		$v = file_exists(APPPATH.'/views/'.$this->modfile.'/index.php') ? $this->modfile.'/index' : 'index';
		$this->template($v);
	}

	function aktivasi()
	{
		$link = $this->uri->rsegment(4,'');
		$this->vars['content'] = $this->modvars->aktivasi($link);
		$v = file_exists(APPPATH.'/views/'.$this->modfile.'/index.php') ? $this->modfile.'/index' : 'index';
		$this->template($v);
	}

	function login()
	{
		$this->vars['content'] = $this->modvars->login();
		$v = file_exists(APPPATH.'/views/'.$this->modfile.'/index.php') ? $this->modfile.'/index' : 'index';
		$this->template($v);
	}

	function logoff()
	{
		$this->vars['content'] = $this->modvars->logoff();
		$v = file_exists(APPPATH.'/views/'.$this->modfile.'/index.php') ? $this->modfile.'/index' : 'index';
		$this->template($v);
	}

	function change_password()
	{
		$this->vars['content'] = $this->modvars->change_password();
		$v = file_exists(APPPATH.'/views/'.$this->modfile.'/index.php') ? $this->modfile.'/index' : 'index';
		$this->template($v);
	}

	function dashboard()
	{
		$this->vars['content'] = $this->modvars->dashboard();
		$v = file_exists(APPPATH.'/views/'.$this->modfile.'/index.php') ? $this->modfile.'/index' : 'index';
		$this->template($v);
	}

	function set_realpath()
	{
		$j = $this->uri->total_segments();
		$realpath = "";
		for($i=2;$i<=$j;$i++) $realpath .= "../";
		if($this->uri->total_segments() >= 1 && substr($_SERVER['REQUEST_URI'],-1) == "/") $realpath .= "../";
		define('REALPATH',$realpath);
	}

	function ModulesNameConv(){
		$t = explode("-", $this->modname);
		$modfile = "";
		for($i=0;$i<count($t);$i++) $modfile .= ucfirst($t[$i]);
		return $modfile;
	}
}
