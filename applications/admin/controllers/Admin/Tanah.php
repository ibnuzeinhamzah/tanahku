<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Tanah
{
    var $name = 'Tanah';
    var $table = 'tanah';
    var $field = array(
                        'id' => array('type' => 'primary_key','show_on_table'=>false),
                        'id_pemilik' => array('type' => 'onetoone','text' => 'PemilikTanah','fkey' => 'PemilikTanah','show_on_table'=>false),
                        'no_shm' => array('type' => 'varchar','text' => 'No SHM'),
                        'alamat' => array('type' => 'text','text' => 'Alamat Letak Tanah','show_on_table'=>false),
                        'luas' => array('type' => 'int','text' => 'Luas Tanah (m2)'),
                        'nilai' => array('type' => 'int','text' => 'Nilai Jual Tanah'),
                        'active' => array('type' => 'flag','text' => 'Aktif','flag_value' => array(0=>'Tidak',1=>'Ya')),
                    );
    var $fkey = array(
                    'value' => 'id',
                    'text' => array('no_shm','nilai')
                );
}
