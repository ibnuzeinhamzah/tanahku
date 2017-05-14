<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class JenisDokumen
{
	var $name = 'Jenis Dokumen';
	var $table = 'jenis_document';
	var $field = array(
					'id' => array('type' => 'primary_key','show_on_table'=>false),
					'nama' => array('type' => 'varchar','text' => 'Nama Jabatan'),
				);
	var $fkey = array(
					'value' => 'id',
					'text' => 'nama',
				);
}
