<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome
{
	var $name = 'Welcome';
	
	function create_list_view()
	{
		//include_once APPPATH.'controllers/FrontEnd/News.php';
		//$n = new News;
		
		$view = '';
		$view .= '<div class="row">';
		$view .= '</div>';

		//$view .= '<div class="row">';
		//$view .= $n->create_front_view();
		//$view .= '</div>'; // row

		return $view;
	}

}
