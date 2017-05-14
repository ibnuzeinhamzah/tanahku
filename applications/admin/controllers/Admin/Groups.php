<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Groups
{
	var $name = 'Groups';
	var $table = 'groups';
	var $field = array(
					'id' => array('type' => 'primary_key','show_on_table'=>false),
					'name' => array('type' => 'varchar','text' => 'Nama Grup'),
				);
	var $fkey = array(
					'value' => 'id',
					'text' => 'name',
				);
}
