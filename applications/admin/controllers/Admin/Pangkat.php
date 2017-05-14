<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Pangkat
{
	var $name = 'Pangkat';
	var $table = 'tbl_pangkat';
	var $field = array(
						'id' => array('type' => 'primary_key','show_on_table'=>false),
						'gol' => array('type' => 'varchar','text' => 'nama'),
						'ket_gol' => array('type' => 'varchar','text' => 'nama'),
					);
	var $fkey = array(
					'value' => 'id',
					'text' => array('gol','ket_gol'),
				);
}
