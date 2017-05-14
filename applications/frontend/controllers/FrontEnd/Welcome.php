<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome
{
	var $name = 'Welcome';
	
	function create_list_view()
	{
		include_once APPPATH.'controllers/FrontEnd/Pengumuman.php';
		//include_once APPPATH.'controllers/FrontEnd/News.php';
		//$n = new News;
		$p = new Pengumuman;

		$view = '';
		$view .= '<div class="row">';
		$view .= $p->create_front_view();
		$view .= '</div>';

		//$view .= '<div class="row">';
		//$view .= $n->create_front_view();
		//$view .= '</div>'; // row

		return $view;
	}

}
