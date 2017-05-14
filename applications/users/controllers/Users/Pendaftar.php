<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Pendaftar
{
	var $name = 'Pendaftar';
	var $table = 'pendaftar';
	var $field = array(
						'id' => array('type' => 'primary_key','show_on_table'=>false),
						'user_id' => array('type' => 'onetoone','text' => 'Username','fkey' => 'Users','show_on_table'=>false),
						'email' => array('type' => 'varchar','text' => 'Email','show_on_table'=>false),
						'nip' => array('type' => 'varchar','text' => 'NIP'),
						'no_ktp' => array('type' => 'varchar','text' => 'No. KTP','show_on_table'=>false),
						'jurusan_formasi' => array('type' => 'onetoone','text' => 'Formasi Jabatan','fkey' => 'FormasiJabatan'),
						'no_registrasi' => array('type' => 'varchar','text' => 'No. Registrasi'),
						'aktivasi' => array('type' => 'flag','text' => 'Sudah Aktivasi','flag_value' => array(0=>'Belum',1=>'Sudah')),
						'link_aktivasi' => array('type' => 'varchar','text' => 'URL Link Aktivasi','show_on_table'=>false),
						'updated' => array('type' => 'flag','text' => 'Sudah Di Update','flag_value' => array(0=>'Belum',1=>'Sudah')),
					);
	var $fkey = array(
					'value' => 'user_id',
					'text' => 'nip',
				);
}
