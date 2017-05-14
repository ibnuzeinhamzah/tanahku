<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller 
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
			redirect(base_url().'admin/login','location');
		}else{
			if($this->modname != '')
			{
				$this->vars['content'] = (method_exists($this->modvars, 'index')) ? $this->modvars->index() : $this->db_to_form->create_list_view($this->modname, $this->modvars, $this->admin_model->get_all_data($this->modtable));
			}else{
				$this->vars['content'] = $this->dashboard();
			}
			$this->load->view('admin', $this->vars);
		}
	}

	public function detail()
	{
		if(!$this->session->userdata('logged_in')){ 
			redirect(base_url().'admin/login','location');
		}else{
			$data_id = $this->uri->rsegment(4,0);
			if($this->modname != '')
			{
				$this->vars['content'] = (method_exists($this->modvars, 'detail')) ? $this->modvars->detail($data_id) : $this->db_to_form->create_detail_view($this->modname, $this->modvars, $this->admin_model->get_data_by_id($this->modtable,$data_id,$this->modfieldID));
			}
			$this->load->view('detail', $this->vars);
		}	
	}

	public function confirm()
	{
		if(!$this->session->userdata('logged_in')){ 
			redirect(base_url().'admin/login','location');
		}else{
			$data_id = $this->uri->rsegment(4,0);
			if($this->modname != '')
			{
				$data = $this->admin_model->get_data_by_id($this->modtable,$data_id,$this->modfieldID);
				$this->vars['content'] = $this->db_to_form->create_delete_view($this->modname, $this->modvars, $data);
			}
			$this->load->view('confirm', $this->vars);
		}
	}

	public function insert()
	{
		if(!$this->session->userdata('logged_in')){ 
			redirect(base_url().'admin/login','location');
		}else{
			if($this->modname != '')
			{
				$this->vars['content'] = $this->db_to_form->create_insert_view($this->modname, $this->modvars);
			}
			$this->load->view('insert', $this->vars);
		}
	}

	public function save()
	{
		if(!$this->session->userdata('logged_in')){ 
			redirect(base_url().'admin/login','location');
		}else{
			if($this->modname != '')
			{
				$data = array();
				foreach ($this->modfield as $k => $v)
				{
					if($v['type'] != 'primary_key')
					{
						if($v['type'] == 'file'){
							$file_upload_name = $this->get_upload_file($v['dir_to_save'], $k);
							$data[$k] = $file_upload_name;
						}else{
							$data[$k] = $this->input->post($k, TRUE);
							$data[$k] = ($v['type'] == 'password') ? $this->crypto->encrypted($data[$k]) : $data[$k];
						}
					}
				}
				$this->admin_model->insert($this->modtable, $data);
				redirect(base_url().'admin/'.$this->modname,'location');
			}
			redirect(base_url().'admin','location');
		}
	}

	public function edit()
	{
		if(!$this->session->userdata('logged_in')){ 
			redirect(base_url().'admin/login','location');
		}else{
			$data_id = $this->uri->rsegment(4,0);
			if($this->modname != '')
			{
				$data = $this->admin_model->get_data_by_id($this->modtable,$data_id,$this->modfieldID);
				$this->vars['content'] = $this->db_to_form->create_edit_view($this->modname, $this->modvars, $data);
			}
			$this->load->view('edit', $this->vars);
		}
	}

	public function update()
	{
		if(!$this->session->userdata('logged_in')){ 
			redirect(base_url().'admin/login','location');
		}else{
			if($this->modname != '')
			{
				$data = array();
				foreach ($this->modfield as $k => $v)
				{
					if($v['type'] == 'file'){
						$file_upload_name = $this->get_upload_file($v['dir_to_save'], $k);
						$file_upload_name = ($file_upload_name == '') ? $this->input->post($k.'_old', TRUE) : $file_upload_name;
						$data[$k] = $file_upload_name;
					}else{
						$data[$k] = $this->input->post($k, TRUE);
						if($v['type'] == 'password'){
							$oldpass = $this->input->post('old-'.$k, TRUE);
							$data[$k] = ($data[$k] != '' && ($this->crypto->hashed_sha256($data[$k]) != $this->encrypt->decode($oldpass))) ? $this->crypto->encrypted($data[$k]) : $oldpass;
						}
					}
				}
				$this->admin_model->update($this->modtable, $data);
				redirect(base_url().'admin/'.$this->modname,'location');
			}
			redirect(base_url().'admin','location');
		}
	}

	public function delete()
	{
		if(!$this->session->userdata('logged_in')){ 
			redirect(base_url().'admin/login','location');
		}else{
			if($this->modname != '')
			{
				$data_id = $this->input->post($this->modfieldID, TRUE);
				$this->admin_model->delete($this->modtable, $data_id, $this->modfieldID);
				redirect(base_url().'admin/'.$this->modname,'location');
			}
			redirect(base_url().'admin','location');
		}
	}

	public function lolos()
	{
		if(!$this->session->userdata('logged_in')){ 
			redirect(base_url().'admin/login','location');
		}else{
			if($this->modname != '')
			{
				$data = $this->admin_model->get_data_by_id($this->modtable,1,'lolos');
				$this->vars['content'] = $this->db_to_form->create_list_view($this->modname, $this->modvars, $data, true);
			}else{
				$this->vars['content'] = $this->dashboard();
			}
			$this->load->view('admin', $this->vars);
		}
	}

	public function tidaklolos()
	{
		if(!$this->session->userdata('logged_in')){ 
			redirect(base_url().'admin/login','location');
		}else{
			if($this->modname != '')
			{
				$data = $this->admin_model->get_data_by_id($this->modtable,0,'lolos');
				$this->vars['content'] = $this->db_to_form->create_list_view($this->modname, $this->modvars, $data, true);
			}else{
				$this->vars['content'] = $this->dashboard();
			}
			$this->load->view('admin', $this->vars);
		}
	}

	public function setlolos()
	{
		if($this->session->userdata('logged_in')){ 
			if($this->modname != ''){
				$id = $this->input->post($this->modfieldID, TRUE);
				$data_update = $this->input->post('lolos', TRUE);
				$this->admin_model->update_by_id($this->modtable, $id, $this->modfieldID, 'lolos', $data_update);
			}
		}
		return 200;
	}

	function dashboard(){
		include_once 'Admin/Dashboard.php';
		$v = new Dashboard;
		return $v->dashboard();
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

	function pdf()
	{
		$this->load->library('parser');
		$this->load->library('Ci_Mpdf');
		$this->vars['content'] = '';
		if(!$this->session->userdata('logged_in')){ 
			redirect(base_url().'users/login','location');
		}else{
			$data_id = $this->uri->rsegment(4,0);
			if($this->modname != '')
			{
				// $data = $this->users_model->get_data_by_id($this->modtable,$data_id,$this->modfieldID);
				$this->vars['content'] = $this->modvars->pdf_form();
			}
		}	
		$paper_size = 'A4';
		$this->vars['header'] = '';//'Seleksi Jabatan Pimpinan Tinggi Bappenas';
		$this->vars['footer'] = $this->vars['header'];
		$style = 'div {float:left !important;}';
		$style .= '.pdf-container {border-collapse: collapse; width:100%; }';
		$style .= 'table {border:solid 1px #000;}';
		$style .= 'td.key{font-weight:bold; width:180px;border-top:1px dotted #000;border-bottom:1px dotted #000;border-left:0px;border-right:0px;}';
		$style .= '.value{border-left:0px;border-right:0px;border-top:1px dotted #000;border-bottom:1px dotted #000;}';
		$style .= 'td.no-border{border-bottom:0;border-left:0;}';
		$style .= '.center{text-align:center;}';
		$style .= '.table-title{font-weight:bold; background-color:#BBD6EB;color:#000;}';
		$this->ci_mpdf->generate_pdf($this->vars,'pdf', $style, 'P' ,$paper_size);
	}
}