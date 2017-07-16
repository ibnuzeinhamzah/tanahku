<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard
{
	var $name = 'Dashboard';
	
	function dashboard()
	{
		$CI =& get_instance();
		$user_id = $CI->session->userdata('user_id');
		
		$view = '';		
		$view .= '<div class="row">';
		$view .= '<div class="col-lg-12">';
		$view .= '<div class="box box-solid">';
	
		$view .= '<div class="box-body">';
		
		

		$view .= '<div class="col-md-12">';
		$view .= '<hr>';
		$view .= '</div>';


		$view .= '<div class="col-md-12">';
		$view .= '<hr>';
		$view .= '</div>';

		$view .= '<div class="col-md-12">';
		$view .= '</div>';

		$view .= '</div>';

		$view .= '</div>'; // box
		$view .= '</div>'; // col-lg-12
		$view .= '</div>'; // row

		return $view;
	}
}
