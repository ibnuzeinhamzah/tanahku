<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class TipeJabatan
{
	var $name = 'Tipe Jabatan';
	var $table = 'tipe_jabatan';
	var $field = array(
					'id' => array('type' => 'primary_key','show_on_table'=>false),
					'nama' => array('type' => 'varchar','text' => 'Nama Jabatan'),
				);
	var $fkey = array(
					'value' => 'id',
					'text' => 'nama',
				);
}
