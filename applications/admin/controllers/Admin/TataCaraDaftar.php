<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class TataCaraDaftar
{
	var $name = 'Tata Cara Daftar';
	var $table = 'tbl_tata_cara_daftar';
	var $field = array(
						'id' => array('type' => 'primary_key','show_on_table'=>false),
						'title' => array('type' => 'varchar','text' => 'Judul'),
						'tanggal' => array('type' => 'date','text' => 'Date'),
						'summary' => array('type' => 'text','show_on_table'=>false),
						'body' => array('type' => 'text','show_on_table'=>false,'text' => 'Content'),
						'filepath' => array('type' => 'file', 'dir_to_save' => NEWS_DIR,'show_on_table'=>false,'text'=>'File'),
						'active' => array('type' => 'flag','text' => 'Active','flag_value'=>array(0=>'Tidak',1=>'Aktif')),
					);
}
