<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class FormasiJabatan
{
	var $name = 'Formasi Jabatan';
	var $table = 'formasi_jabatan';
	var $field = array(
						'id' => array('type' => 'primary_key','show_on_table'=>false),
						'nama' => array('type' => 'varchar','text' => 'Nama Formasi'),
						'jenis_jabatan' => array('type' => 'onetoone','text' => 'Jabatan Formasi','fkey' => 'JenisJabatan'),
						'duedate' => array('type' => 'date','text' => 'Batas Akhir Pendaftaran'),
					);
	var $fkey = array(
					'value' => 'id',
					'text' => 'nama',
				);
}
