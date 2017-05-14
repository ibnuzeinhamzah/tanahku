<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class News
{
	var $name = 'News';
	var $table = 'tbl_news';
	var $field = array(
						'id' => array('type' => 'primary_key','show_on_table'=>false),
						'title' => array('type' => 'varchar','text' => 'News Title'),
						'tanggal' => array('type' => 'date','text' => 'Date'),
						'summary' => array('type' => 'text','show_on_table'=>false),
						'body' => array('type' => 'text','show_on_table'=>false,'text' => 'Content'),
						'tag' => array('type' => 'normaltext','show_on_table'=>false),
						'filepath' => array('type' => 'file', 'dir_to_save' => NEWS_DIR,'show_on_table'=>false,'text'=>'File'),
					);
}
