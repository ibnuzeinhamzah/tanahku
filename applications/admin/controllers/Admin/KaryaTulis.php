<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class KaryaTulis
{
	var $name = 'Karya Tulis';
	var $table = 'karya_tulis';
	var $field = array(
						'id' => array('type' => 'primary_key','show_on_table'=>false,'show_on_detail'=>false),
						'user_id' => array('type' => 'onetoone','text' => 'NIP','fkey' => 'Pendaftar','show_on_table'=>false,'readonly'=>true,'show_on_detail'=>false),
						'judul' => array('type' => 'varchar','text' => 'Judul'),
						'tahun' => array('type' => 'year','text' => 'Tahun Publikasi'),
					);
}
