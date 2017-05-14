<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class RiwayatJabatan
{
	var $name = 'Riwayat Jabatan';
	var $table = 'riwayat_jabatan';
	var $field = array(
						'id' => array('type' => 'primary_key','show_on_table'=>false,'show_on_detail'=>false),
						'user_id' => array('type' => 'onetoone','text' => 'NIP','fkey' => 'Pendaftar','show_on_table'=>false,'readonly'=>true,'show_on_detail'=>false),
						'tipe_jabatan' => array('type' => 'onetoone','text' => 'Tipe Jabatan','fkey' => 'JenisJabatan'),
						'jabatan' => array('type' => 'varchar','text' => 'Nama Jabatan'),
						'instansi' => array('type' => 'varchar','text' => 'Nama Instansi'),
						'tmt' => array('type' => 'date','text' => 'TMT'),
						'no_sk_jabatan' => array('type' => 'varchar','text' => 'No SK Jabatan','show_on_table'=>false),
						'uraian' => array('type' => 'text','text' => 'Uraian Singkat Tupoksi'),
						'periode_menjabat_awal' => array('type' => 'year','text' => 'Periode Menjabat (mulai)'),
						'periode_menjabat_akhir' => array('type' => 'year','text' => 'Periode Menjabat (sampai)'),
					);
}
