<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Project
{
    var $name = 'Project';
    var $table = 'project';
    var $field = array(
                        'id' => array('type' => 'primary_key','show_on_table'=>false),
                        'id_tanah' => array('type' => 'onetoone','text' => 'Tanah','fkey' => 'Tanah'),
                        'nama' => array('type' => 'varchar','text' => 'Nama Project'),
                        'deskripsi' => array('type' => 'text','text' => 'Deskripsi Project','show_on_table'=>false),
                        'nilai' => array('type' => 'int','text' => 'Nilai Project'),
                        'slot_saham' => array('type' => 'int','text' => 'Jumlah Slot Saham'),
                        'nilai_saham' => array('type' => 'int','text' => 'Nilai Saham Per Slot'),
                        'active' => array('type' => 'flag','text' => 'Aktif','flag_value' => array(0=>'Tidak',1=>'Ya')),
                    );
    var $fkey = array(
                    'value' => 'id',
                    'text' => array('nama','nilai_saham')
                );
}
