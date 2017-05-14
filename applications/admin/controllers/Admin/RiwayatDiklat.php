<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class RiwayatDiklat
{
	var $name = 'Riwayat Pendidikan dan Latihan';
	var $table = 'riwayat_diklat';
	var $field = array(
						'id' => array('type' => 'primary_key','show_on_table'=>false,'show_on_detail'=>false),
						'user_id' => array('type' => 'onetoone','text' => 'NIP','fkey' => 'Pendaftar','show_on_table'=>false,'readonly'=>true,'show_on_detail'=>false),
						'nama_diklat' => array('type' => 'varchar','text' => 'Nama Diklat *)'),
						'lembaga' => array('type' => 'varchar','text' => 'Lembaga Penyelenggara'),
						'no_sertifikat' => array('type' => 'varchar','text' => 'No Sertifikat *)','show_on_table'=>false),
						'tahun' => array('type' => 'year','text' => 'Tahun Diklat'),
					);
	var $ket = '*) wajib diisi.';
}
