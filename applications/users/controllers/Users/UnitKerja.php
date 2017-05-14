<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class UnitKerja
{
	var $name = 'UnitKerja';
	var $table = 'tbl_unit_kerja';
	var $field = array(
						'id' => array('type' => 'primary_key','show_on_table'=>false),
						'nama' => array('type' => 'varchar','text' => 'nama'),
					);
	var $fkey = array(
					'value' => 'id',
					'text' => 'nama',
				);
}
