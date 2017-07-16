<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class PemilikTanah
{
    var $name = 'PemilikTanah';
    var $table = 'pemilik_tanah';
    var $field = array(
                        'id' => array('type' => 'primary_key','show_on_table'=>false),
                        'nama' => array('type' => 'varchar','text' => 'Nama Pemilik Tanah'),
                        'alamat' => array('type' => 'text','text' => 'Alamat Pemilik Tanah','show_on_table'=>false),
                        'no_ktp' => array('type' => 'varchar','text' => 'KTP Pemilik Tanah','show_on_table'=>false),
                        'active' => array('type' => 'flag','text' => 'Aktif','flag_value' => array(0=>'Tidak',1=>'Ya')),
                    );
    var $fkey = array(
                    'value' => 'id',
                    'text' => 'nama'
                );
}
