<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengumuman
{
	var $name = 'Pengumuman';
	var $table = 'pengumuman';
	var $field = array(
						'id' => array('type' => 'primary_key','show_on_table'=>false,'show_on_detail'=>false),
						'title' => array('type' => 'varchar','text' => 'News Title','link_to_detail'=>true),
						'tanggal' => array('type' => 'date','text' => 'Date'),
						'summary' => array('type' => 'text'),
						'fullteks' => array('type' => 'text','show_on_table'=>false,'text' => 'Content'),
						'status' => array('type' => 'flag','show_on_table'=>false,'flag_value'=>array(0=>'Tidak Aktif',1=>'Aktif')),
						'newsfile' => array('type' => 'file', 'dir_to_save' => NEWS_DIR,'show_on_table'=>false,'text'=>'File'),
						'frontimg' => array('type' => 'file', 'dir_to_save' => NEWS_DIR,'show_on_table'=>false,'text'=>'File'),
					);
	
	function create_front_view()
	{
		$CI =& get_instance();
		$data = $CI->frontend_model->get_limit_data($this->table,4);
		$view = '';
		//$view .= '<div class="box box-solid">';
		
		//$view .= '<div class="box-body">';
		$view .= '<div class="welcome-content">';
		
		for($i=0;$i<count($data) && $i<2;$i++){
			$url_detail = '<h4><a class="font-white" href="'.base_url().'pengumuman/detail/'.$data[$i]->id.'">';

			//$view .= '<div class="col-md-6">';
			
			$view .= '<div class="col-md-12">';
			$view .= '<p>'.$url_detail.$data[$i]->title.'</a></h4></p>';
			if($data[$i]->frontimg){
				$view .= '<img src="'.$this->field['frontimg']['dir_to_save'].'/'.$data[$i]->frontimg.'" class="profile-user-img img-responsive img-circle" />';
			}else{
				$view .= '<img src="'.REALPATH.ASSETS_DIR.'/images/default-circle-img-01.jpg" class="profile-user-img img-responsive img-circle" />';
			}
			$view .= '<p>'.$data[$i]->summary.'</p>';
			$view .= '</div>';
		
			//$view .= '</div>';
		}
		
		$view .= '</div>'; // container
		//$view .= '</div>'; // box-body
		//$view .= '</div>'; // box

		return $view;
	}

	function create_list_view()
	{
		$CI =& get_instance();
		$data = $CI->frontend_model->get_limit_data($this->table,10);
		$view = '';
		$imgdef = '<img src="'.REALPATH.ASSETS_DIR.'/images/default-circle-img-01.jpg" class="desktop-only profile-user-img img-responsive img-circle" />';
		$view .= '<div class="welcome-content">';
		for($i=0;$i<count($data);$i++){
			$url_detail = '<h4><a class="font-white" href="'.base_url().'pengumuman/detail/'.$data[$i]->id.'">'.$data[$i]->title.'</a></h4>';
			$view .= '<div class="col-md-12">';
			$view .= '<p>'.$url_detail.'</p>';
			$view .= ($data[$i]->frontimg) ? '<img src="'.$this->field['frontimg']['dir_to_save'].'/'.$data[$i]->frontimg.'" class="desktop-only profile-user-img img-responsive img-circle" />' : $imgdef;
			$view .= $data[$i]->summary;
			$view .= '</div>';
			$view .= '<div class="col-md-12"><hr></div>';
		}
		$view .= '</div>';
		
		return $view;
	}

	function create_detail_view()
	{
		$CI =& get_instance();
		$data_id = $CI->uri->rsegment(4,0);
		$data = $CI->frontend_model->get_data_by_id($this->table,$data_id,'id');
		list($y,$m,$d) = explode("-", $data[0]->tanggal);
		$view = '';
		$view .= '<div class="row">';
		$view .= '<div class="col-lg-12 welcome-content">';
		$view .= '<h4>'.$data[0]->title.'</h4>';
		$view .= '<h6><i>'.$d.' '.date("F",mktime(0,0,0,$m,$d,$y)).' '.$y.'</i></h6>';
		$view .= ($data[0]->fullteks) ? '<div>'.$data[0]->fullteks.'</div>' : '<div>'.$data[0]->summary.'</div>';
		$view .= ($data[0]->newsfile) ? '<a class="font-yellow" href="'.REALPATH.$this->field['newsfile']['dir_to_save'].'/'.$data[0]->newsfile.'">'.$data[0]->newsfile.'</a>' : '';
		$view .= '</div>'; // col-lg-12
		$view .= '</div>'; // row
		
		return $view;
	}
}
