<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Persyaratan
{
	var $name = 'Persyaratan';
	var $table = 'persyaratan';
	var $field = array(
						'id' => array('type' => 'primary_key','show_on_table'=>false),
						'title' => array('type' => 'varchar','text' => 'Judul'),
						'body' => array('type' => 'text','show_on_table'=>false,'text' => 'Content'),
					);
}
