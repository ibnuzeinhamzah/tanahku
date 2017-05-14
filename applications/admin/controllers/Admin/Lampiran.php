<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Lampiran
{
	var $name = 'Dokumen Lampiran';
	var $table = 'lampiran';
	var $field = array(
						'id' => array('type' => 'primary_key','show_on_table'=>false),
						'title' => array('type' => 'varchar','text' => 'Judul Lampiran'),
						'lampiranfile' => array('type' => 'file', 'dir_to_save' => LAMPIRAN_DIR,'show_on_table'=>false,'text'=>'File'),
					);
}
