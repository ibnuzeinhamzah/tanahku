<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Investasi
{
    var $name = 'Investasi';
    var $table = 'investasi';
    var $field = array(
                        'id' => array('type' => 'primary_key','show_on_table'=>false),
                        'id_investor' => array('type' => 'onetoone','text' => 'Investor','fkey' => 'Investor'),
                        'id_project' => array('type' => 'onetoone','text' => 'Project','fkey' => 'Project'),
                        'jumlah_saham' => array('type' => 'int','text' => 'Jumlah Saham'),
                        'nilai_saham' => array('type' => 'int','text' => 'Nilai Saham'),
                        'active' => array('type' => 'flag','text' => 'Aktif','flag_value' => array(0=>'Tidak',1=>'Ya')),
                    );
    var $fkey = array(
                    'value' => 'id',
                    'text' => 'nama'
                );
}
