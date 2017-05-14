<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class DataPribadi
{
	var $name = 'Data Pribadi';
	var $table = 'biodata';
	var $field = array(
						'id' => array('type' => 'primary_key','show_on_table'=>false,'show_on_detail'=>false),
						'user_id' => array('type' => 'onetoone','text' => 'NIP','fkey' => 'Pendaftar','show_on_table'=>false,'readonly'=>true,'show_on_detail'=>false),
						'realname' => array('type' => 'varchar','text' => 'Nama'),
						'gelar_depan' => array('type' => 'varchar','text' => 'Gelar Depan'),
						'gelar_belakang' => array('type' => 'varchar','text' => 'Gelar Belakang'),
						'tempat_lahir' => array('type' => 'varchar','text' => 'Tempat Lahir'),
						'tanggal_lahir' => array('type' => 'date','text' => 'Tanggal Lahir'),
						'alamat_rumah' => array('type' => 'text','text' => 'Alamat','show_on_table'=>false),
						/*'alamat_saat_ini' => array('type' => 'text','text' => 'Alamat Saat Ini','show_on_table'=>false),*/
						'agama' => array('type' => 'onetoone','text' => 'Agama','fkey' => 'Agama'),
						'jenis_kelamin' => array('type' => 'flag','text' => 'Jenis Kelamin','flag_value' => array('Laki-Laki'=>'Laki - Laki','Perempuan'=>'Perempuan')),
						'telp_rumah' => array('type' => 'varchar','text' => 'Telp Rumah'),
						'no_hp' => array('type' => 'varchar','text' => 'No Handphone'),
						'no_npwp' => array('type' => 'varchar','text' => 'No NPWP'),
						/*
						'ktp' => array('type' => 'file','text' => 'File KTP', 'dir_to_save'=>KTP_DIR,'show_on_table'=>false),
						'foto' => array('type' => 'file','text' => 'File Foto', 'dir_to_save'=>FOTO_DIR,'show_on_table'=>false),
						'toefl' => array('type' => 'file','text' => 'File TOEFL', 'dir_to_save'=>TOEFL_DIR,'show_on_table'=>false),
						*/
					);
	var $maxdata = 1;
}
