<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Investor
{
    var $name = 'Investor';
    var $table = 'investor';
    var $field = array(
                        'id' => array('type' => 'primary_key','show_on_table'=>false),
                        'nama' => array('type' => 'varchar','text' => 'Nama Investor'),
                        'alamat' => array('type' => 'text','text' => 'Alamat Investor','show_on_table'=>false),
                        'no_ktp' => array('type' => 'varchar','text' => 'KTP Investor','show_on_table'=>false),
                        'active' => array('type' => 'flag','text' => 'Aktif','flag_value' => array(0=>'Tidak',1=>'Ya')),
                    );
    var $fkey = array(
                    'value' => 'id',
                    'text' => 'nama'
                );
}
