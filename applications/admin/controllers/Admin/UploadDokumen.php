<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class UploadDokumen
{
	var $name = 'Upload Dokumen';
	var $table = 'dokumen_pendukung';
	var $field = array(
						'id' => array('type' => 'primary_key','show_on_table'=>false,'show_on_detail'=>false),
						'user_id' => array('type' => 'onetoone','text' => 'Username','fkey' => 'User','show_on_table'=>false,'readonly'=>true,'show_on_detail'=>false),
						'jenis_document' => array('type' => 'onetoone','text' => 'Jenis Dokumen','fkey' => 'JenisDokumen','show_on_table'=>true,'readonly'=>false),
						'document' => array('type' => 'file','text' => 'File Dokumen','dir_to_save'=>DOKUMEN_DIR,'show_on_table'=>true),
					);
	var $ket = 'maksimal ukuran file adalah 1 mb.';
}
