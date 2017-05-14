<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class RiwayatPenugasan
{
	var $name = 'Riwayat Penugasan';
	var $table = 'riwayat_penugasan';
	var $field = array(
						'id' => array('type' => 'primary_key','show_on_table'=>false,'show_on_detail'=>false),
						'user_id' => array('type' => 'onetoone','text' => 'NIP','fkey' => 'Pendaftar','show_on_table'=>false,'readonly'=>true,'show_on_detail'=>false),
						'nama_tim' => array('type' => 'varchar','text' => 'Nama Tim / Kelompok Kerja'),
						'instansi' => array('type' => 'varchar','text' => 'Nama Instansi / Lembaga'),
						'no_surat' => array('type' => 'varchar','text' => 'No Surat'),
						'tahun_awal' => array('type' => 'year','text' => 'Tahun Mulai'),
						'tahun_akhir' => array('type' => 'year','text' => 'Tahun Selesai'),
					);
}
