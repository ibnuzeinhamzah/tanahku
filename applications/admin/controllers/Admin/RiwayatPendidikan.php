<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class RiwayatPendidikan
{
	var $name = 'Riwayat Pendidikan';
	var $table = 'riwayat_pendidikan';
	var $field = array(
						'id' => array('type' => 'primary_key','show_on_table'=>false,'show_on_detail'=>false),
						'user_id' => array('type' => 'onetoone','text' => 'NIP','fkey' => 'Pendaftar','show_on_table'=>false,'readonly'=>true,'show_on_detail'=>false),
						'tingkat_pendidikan' => array('type' => 'onetoone','text' => 'Tingkat Pendidikan','fkey' => 'TingkatPendidikan'),
						'fakultas' => array('type' => 'varchar','text' => 'Fakultas'),
						'jurusan' => array('type' => 'varchar','text' => 'Jurusan'),
						'universitas' => array('type' => 'varchar','text' => 'Universitas *)'),
						'ipk' => array('type' => 'varchar','text' => 'IPK *)'),
						'no_ijazah' => array('type' => 'varchar','text' => 'No Ijazah','show_on_table'=>false),
						'tahun_lulus' => array('type' => 'year','text' => 'Tahun Lulus *)'),
						/*'judul_skripsi' => array('type' => 'text','text' => 'Judul Skripsi','show_on_table'=>false),*/
						/*'ijazah' => array('type' => 'file','text' => 'File Ijazah', 'dir_to_save'=>IJAZAH_DIR,'show_on_table'=>false),*/
						/*'transkrip' => array('type' => 'file','text' => 'File Transkrip', 'dir_to_save'=>TRANSKRIP_DIR,'show_on_table'=>false),*/
						/*'pendidikan_negeri' => array('type' => 'flag','text' => 'Kategori Lembaga Pendidikan','flag_value'=>array(0=>'Swasta',1=>'Negeri')),*/
					);
	var $ket = '*) wajib diisi.';
}
