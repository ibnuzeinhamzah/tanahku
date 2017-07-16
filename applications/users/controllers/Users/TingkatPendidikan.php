<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class TingkatPendidikan
{
	var $name = 'Tingkat Pendidikan';
	var $table = 'tingkat_pendidikan';
	var $field = array(
						'id' => array('type' => 'primary_key','show_on_table'=>false),
						'nama' => array('type' => 'varchar','text' => 'Tingkat Pendidikan'),
					);
	var $fkey = array(
					'value' => 'id',
					'text' => 'nama',
				);
}
