<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User
{
	var $name = 'User';
	var $table = 'users';
	var $field = array(
						'id' => array('type' => 'primary_key','show_on_table'=>false),
						'username' => array('type' => 'varchar','text' => 'Username'),
						'password' => array('type' => 'password','text' => 'Password','show_on_table'=>false),
						'realname' => array('type' => 'varchar','text' => 'Nama Asli'),
						'active' => array('type' => 'flag','text' => 'Aktif','flag_value' => array(0=>'Tidak',1=>'Ya')),
					);


	function create_list_view()
	{
		$CI =& get_instance();
		if($CI->session->username && $CI->session->logged_in && $CI->session->usersessionkey){
			return $this->dashboard();
		}else{
			return $this->login_form();
		}
	}

	function login()
	{
		$CI =& get_instance();
		$username = $_POST['username'];
		$password = $_POST['password'];
		$stoken = $_POST['stoken'];

		$CI->form_validation->set_rules('username', 'Username', 'required|xss_clean');
		$CI->form_validation->set_rules('password', 'Password', 'required|xss_clean');

		if(($CI->form_validation->run($CI) == TRUE) && ($CI->crypto->hashed_sha256("!!34df$#jkUWml2!md3.^03-.!jWek") == $CI->encrypt->decode($stoken)))
		{
			$CI->load->model('frontend_model');
			$data_from_db = $CI->frontend_model->get_data_by_sql("SELECT a.id as user_id, a.username, a.realname, a.password, b.group_id, c.nip FROM users a LEFT JOIN user_group b ON a.id = b.user_id LEFT JOIN pendaftar c ON a.id = c.user_id WHERE a.username = '".$username."' LIMIT 1;");
			if(count($data_from_db) > 0){
				if($CI->crypto->hashed_sha256($password) == $CI->encrypt->decode($data_from_db[0]->password))
				{
					$CI->session->sess_regenerate();
					unset($data_from_db[0]->password);
					$CI->session->set_userdata(array('username' => $username, 'realname' => $data_from_db[0]->realname, 'user_id' => $data_from_db[0]->user_id, 'group_id' => $data_from_db[0]->group_id, 'user_nip' => $data_from_db[0]->nip, 'logged_in' => true, 'usersessionkey' => $CI->crypto->encrypted($username)));

					return $this->dashboard();
				}
				else
				{
					return $this->login_form();
				}
			}
			else
			{
				return $this->login_form();
			}
		}
		else
		{
			return $this->login_form();
		}
	}

	function login_form()
	{
		$CI =& get_instance();
		$c = $CI->crypto->encrypted("!!34df$#jkUWml2!md3.^03-.!jWek");
		$csrf = array(
			'name' => $CI->security->get_csrf_token_name(),
			'hash' => $CI->security->get_csrf_hash()
		);
		$view = '';
		/*
		$view .= '<div class="col-md-4"></div>';
		$view .= '<div class="col-md-4">';

		if(validation_errors()){
			$view .= '<div class="box box-solid box-danger">';
			$view .= '<div class="box-header bg-red">';
			$view .= '<i class="fa fa-warning"></i>';
			$view .= '<h3 class="box-title">Login Error.</h3>';
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
		$view .= '<i class="fa fa-user"></i><h3 class="box-title">Login</h3>';
		$view .= '</div>';

		$view .= '<form class="form-horizontal" action="'.base_url().'user/login" method="post">';
		$view .= '<div class="box-body">';

		$view .= '<div class="form-group">';
		$view .= '<label class="col-md-3 control-label">Username</label>';
		$view .= '<div class="col-md-8">';
		$view .= '<input id="username" name="username" class="form-control input-sm" type="text" placeholder="Username">';
		$view .= '</div>';
		$view .= '</div>';

		$view .= '<div class="form-group">';
		$view .= '<label class="col-md-3 control-label">Password</label>';
		$view .= '<div class="col-md-8">';
		$view .= '<input id="password" name="password" class="form-control input-sm" type="password" placeholder="Password">';
		$view .= '</div>';
		$view .= '</div>';

		$view .= '</div>'; // box-body

		$view .= '<div class="box-footer">';
		$view .= '<input name="stoken" class="form-control input-sm" type="hidden" value="'.$c.'">';
		$view .= '<input type="hidden" name="'.$csrf['name'].'" value="'.$csrf['hash'].'" />';
		$view .= '<button class="btn btn-primary btn-flat btn-sm" type="submit">Login</button>';
		$view .= '</div>';
		$view .= '</form>';

		$view .= '</div>'; // box
		$view .= '</div>'; // col-md-6
		$view .= '<div class="col-md-4"></div>';
		*/
		$view .= '<div class="login-box">';
		$view .= '<div class="login-logo">';
		$view .= '<a href="'.base_url().'"><b>Lelang Jabatan</b></a>';
		$view .= '</div><!-- /.login-logo -->';
		$view .= '<div class="login-box-body bg-navy">';
		$view .= '<p class="login-box-msg">Sign in to start your session</p>';
		$view .= '<form action="'.base_url().'user/login" method="post">';
		$view .= '<div class="form-group has-feedback">';
		$view .= '<input type="username" class="form-control" placeholder="Email">';
		$view .= '<span class="glyphicon glyphicon-envelope form-control-feedback"></span>';
		$view .= '</div>';
		$view .= '<div class="form-group has-feedback">';
		$view .= '<input type="password" class="form-control" placeholder="Password">';
		$view .= '<span class="glyphicon glyphicon-lock form-control-feedback"></span>';
		$view .= '</div>';
		$view .= '<div class="row">';
		$view .= '<div class="col-xs-8">';
		$view .= '<div class="checkbox icheck">';
		$view .= '<label>';
		$view .= '<input type="checkbox"> Remember Me';
		$view .= '</label>';
		$view .= '</div>';
		$view .= '</div><!-- /.col -->';
		$view .= '<div class="col-xs-4">';
		$view .= '<button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>';
		$view .= '</div><!-- /.col -->';
		$view .= '</div>';
		$view .= '</form>';
		$view .= '<a href="'.base_url().'user/forgot-password">I forgot my password</a><br>';
		$view .= '<a href="'.base_url().'pendaftaran" class="text-center">Register a new membership</a>';
		$view .= '</div><!-- /.login-box-body -->';
		$view .= '</div><!-- /.login-box -->';

		return $view;
	}

	function logoff()
	{
		$CI =& get_instance();
		$CI->session->sess_destroy();
		$CI->session->sess_regenerate();
		return $this->login_form();
	}

	function dashboard()
	{
		$CI =& get_instance();
		if($CI->session->username && $CI->session->logged_in && $CI->session->usersessionkey){
			$v = 'Dashboard Pendaftar';
			return $v;
		}else{
			return $this->login_form();
		}
	}
}
