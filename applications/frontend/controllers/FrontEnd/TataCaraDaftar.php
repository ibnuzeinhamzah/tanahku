<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TataCaraDaftar
{
	var $name = 'Tata Cara Daftar';
	var $table = 'tbl_tata_cara_daftar';
	var $field = array(
						'id' => array('type' => 'primary_key','show_on_table'=>false),
						'title' => array('type' => 'varchar','text' => 'News Title'),
						'tanggal' => array('type' => 'date','text' => 'Date'),
						'summary' => array('type' => 'text','show_on_table'=>false),
						'body' => array('type' => 'text','show_on_table'=>false,'text' => 'Content'),
						'tag' => array('type' => 'normaltext','show_on_table'=>false),
						'filepath' => array('type' => 'file', 'dir_to_save' => NEWS_DIR,'show_on_table'=>false,'text'=>'File'),
					);
	
	function create_front_view()
	{
		$CI =& get_instance();
		$data = $CI->frontend_model->get_limit_data($this->table,2);
		$view = '';
		//$view .= '<div class="box box-solid">';
		
		//$view .= '<div class="box-body">';
		$view .= '<div class="welcome-content">';
		
		for($i=0;$i<count($data) && $i<3;$i++){
			$url_detail = '<h4><a class="font-white" href="'.base_url().'news/detail/'.$data[$i]->id.'">';

			$view .= '<div class="col-md-6">';
			$view .= '<div class="col-md-12">';
			$view .= '<p>'.$url_detail.$data[$i]->title.'</a></h3></p>';
			$view .= '<img src="'.REALPATH.ASSETS_DIR.'/images/default-circle-img-01.jpg" class="profile-user-img img-responsive img-circle" />';
			$view .= '<p>'.$data[$i]->summary.'</p>';
			$view .= '</div>';
			$view .= '</div>';
		}
		
		$view .= '</div>'; // container
		//$view .= '</div>'; // box-body
		//$view .= '</div>'; // box

		return $view;
	}

	function create_list_view()
	{
		return $this->create_detail_view();
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
		
		$view .= '<h6><i>'.$data[0]->tanggal.'</i></h6>';
		$view .= ($data[0]->body) ? '<div>'.$data[0]->body.'</div>' : '<div>'.$data[0]->summary.'</div>';
		$view .= ($data[0]->filepath) ? '<a class="font-yellow" href="'.REALPATH.$this->field['filepath']['dir_to_save'].'/'.$data[0]->filepath.'">'.$data[0]->filepath.'</a>' : '';
		//$view .= '</div>'; // box-body
		
		//$view .= '</div>'; // box
		$view .= '</div>'; // col-lg-12
		$view .= '</div>'; // row
		
		return $view;
	}
}
