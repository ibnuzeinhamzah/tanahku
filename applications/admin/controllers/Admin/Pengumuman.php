<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Pengumuman
{
	var $name = 'Pengumuman';
	var $table = 'pengumuman';
	var $field = array(
						'id' => array('type' => 'primary_key','show_on_table'=>false),
						'title' => array('type' => 'varchar','text' => 'News Title'),
						'tanggal' => array('type' => 'date','text' => 'Date'),
						'summary' => array('type' => 'text','show_on_table'=>false),
						'fullteks' => array('type' => 'text','show_on_table'=>false,'text' => 'Content'),
						'status' => array('type' => 'flag','show_on_table'=>false,'flag_value'=>array(0=>'Tidak Aktif',1=>'Aktif')),
						'newsfile' => array('type' => 'file', 'dir_to_save' => NEWS_DIR,'show_on_table'=>false,'text'=>'File'),
						'frontimg' => array('type' => 'file', 'dir_to_save' => NEWS_DIR,'show_on_table'=>false,'text'=>'File'),
					);
}
