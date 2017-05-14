<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class UsersGroups
{
	var $name = 'Users Groups';
	var $table = 'user_group';
	var $field = array(
					'id' => array('type' => 'primary_key','show_on_table'=>false),
					'user_id' => array('type' => 'onetoone','text' => 'Username','fkey' => 'Users'),
					'group_id' => array('type' => 'onetoone','text' => 'Nama Grup','fkey' => 'Groups'),
				);
}
