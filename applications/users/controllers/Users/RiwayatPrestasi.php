<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class RiwayatPrestasi
{
	var $name = 'Prestasi';
	var $table = 'riwayat_prestasi';
	var $field = array(
						'id' => array('type' => 'primary_key','show_on_table'=>false,'show_on_detail'=>false),
						'user_id' => array('type' => 'onetoone','text' => 'NIP','fkey' => 'Pendaftar','show_on_table'=>false,'readonly'=>true,'show_on_detail'=>false),
						'prestasi' => array('type' => 'varchar','text' => 'Prestasi Yang Pernah Dicapai*'),
						'tingkat' => array('type' => 'varchar','text' => 'Tingkat**'),
						'pemberi_penghargaan' => array('type' => 'varchar','text' => 'Pemberi Penghargaan'),
						'tahun' => array('type' => 'year','text' => 'Tahun Perolehan'),
					);
	var $ket = '*<br/>**';
}
