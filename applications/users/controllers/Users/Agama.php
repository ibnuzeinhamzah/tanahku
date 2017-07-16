<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Agama
{
	var $name = 'Agama';
	var $table = 'agama';
	var $field = array(
						'id' => array('type' => 'primary_key','show_on_table'=>false),
						'agama' => array('type' => 'varchar','text' => 'Agama'),
					);
	var $fkey = array(
					'value' => 'id',
					'text' => 'agama',
				);
}
