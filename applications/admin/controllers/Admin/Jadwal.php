<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Jadwal
{
	var $name = 'Jadwal Pelaksanaan';
	var $table = 'jadwal_pelaksanaan';
	var $field = array(
						'id' => array('type' => 'primary_key','show_on_table'=>false),
						'title' => array('type' => 'varchar','text' => 'Judul'),
						'body' => array('type' => 'text','show_on_table'=>false,'text' => 'Content'),
					);
}
