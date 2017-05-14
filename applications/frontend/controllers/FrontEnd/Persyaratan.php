<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Persyaratan
{
	var $name = 'Persyaratan Pelaksanaan';
	var $table = 'persyaratan';
	var $field = array(
						'id' => array('type' => 'primary_key','show_on_table'=>false),
						'title' => array('type' => 'varchar','text' => 'News Title'),
						'body' => array('type' => 'text','show_on_table'=>false,'text' => 'Content'),
					);
	

	function create_list_view()
	{
		$CI =& get_instance();
		$data = $CI->frontend_model->get_limit_data($this->table,2);
		$view = '';
		//$view .= '<div class="box box-solid">';
		
		//$view .= '<div class="box-body">';
		$view .= '<div class="welcome-content">';
		
		for($i=0;$i<count($data) && $i<3;$i++){
			$url_detail = '<h4><a class="font-white" href="'.base_url().'jadwal/detail/'.$data[$i]->id.'">';

			//$view .= '<div class="col-md-6">';
			$view .= '<div class="col-md-12">';
			$view .= '<p>'.$url_detail.$data[$i]->title.'</a></h3></p>';
			$view .= '<p>'.$data[$i]->body.'</p>';
			$view .= '</div>';
			//$view .= '</div>';
		}
		
		$view .= '</div>'; // container
		//$view .= '</div>'; // box-body
		//$view .= '</div>'; // box

		return $view;
	}

	function create_detail_view()
	{
		$CI =& get_instance();
		$d = $CI->frontend_model->get_limit_data($this->table,1);
		$data_id = $d[0]->id;
		$data = $CI->frontend_model->get_data_by_id($this->table,$data_id,'id');
		$view = '';		

		$view .= '<div class="row">';
		$view .= '<div class="col-lg-12 welcome-content">';
		//$view .= '<div class="box box-solid">';
		//$view .= '<div class="box-header with-border">';
		$view .= '<h4>'.$data[0]->title.'</h4>';
		//$view .= '</div>';

		//$view .= '<div class="box-body">';
		
		$view .= '<div>'.$data[0]->body.'</div>';
		//$view .= '</div>'; // box-body
		
		//$view .= '</div>'; // box
		$view .= '</div>'; // col-lg-12
		$view .= '</div>'; // row
		
		return $view;
	}
}
