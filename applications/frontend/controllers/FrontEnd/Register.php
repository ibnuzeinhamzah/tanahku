<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register
{
    var $name = 'User';
    var $table = 'users';
    var $field = array(
                        'id' => array('type' => 'primary_key','show_on_table'=>false),
                        'username' => array('type' => 'varchar','text' => 'Username'),
                        'password' => array('type' => 'password','text' => 'Password','show_on_table'=>false),
                        'realname' => array('type' => 'varchar','text' => 'Nama Asli'),
                        'active' => array('type' => 'flag','text' => 'Aktif','flag_value' => array(0=>'Tidak',1=>'Ya')),
                    );


    function create_list_view()
    {
        $CI =& get_instance();
    }
}
