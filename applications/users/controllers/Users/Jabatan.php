<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Jabatan
{
	var $name = 'Jabatan';
	var $table = 'tbl_jabatan';
	var $field = array(
						'id' => array('type' => 'primary_key','show_on_table'=>false),
						'nama' => array('type' => 'varchar','text' => 'nama'),
					);
	var $fkey = array(
					'value' => 'id',
					'text' => 'nama',
				);
}
