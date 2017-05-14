<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class RiwayatKepangkatan
{
	var $name = 'Riwayat Kepangkatan';
	var $table = 'riwayat_pangkat';
	var $field = array(
						'id' => array('type' => 'primary_key','show_on_table'=>false,'show_on_detail'=>false),
						'user_id' => array('type' => 'onetoone','text' => 'NIP','fkey' => 'Pendaftar','show_on_table'=>false,'readonly'=>true,'show_on_detail'=>false),
						//'nip' => array('type' => 'varchar','text' => 'NIP'),
						'golongan' => array('type' => 'onetoone','text' => 'Gol/Pangkat','fkey' => 'Pangkat'),
						'tmt' => array('type' => 'date','text' => 'TMT'),
						/*'unit_kerja' => array('type' => 'onetoone','text' => 'Unit Kerja','fkey' => 'UnitKerja'),*/
						/*'masa_kerja_tahun' => array('type' => 'int','text' => 'Masa Kerja Tahun'),
						'masa_kerja_bulan' => array('type' => 'int','text' => 'Masa Kerja Bulan'),
						'ak' => array('type' => 'int','text' => 'Angka Kredit saat dilantik'),*/
						'tgl_sk' => array('type' => 'date','text' => 'Tgl SK','show_on_table'=>false),
						'no_sk' => array('type' => 'varchar','text' => 'No SK','show_on_table'=>false),
						'keterangan' => array('type' => 'text','text' => 'Keterangan','show_on_table'=>false),
					);
}
