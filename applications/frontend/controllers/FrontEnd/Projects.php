<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Projects
{
    var $name = 'Projects';
    var $title = '';
    
    function create_list_view($error = "")
    {
        $CI =& get_instance();
        $sql = "SELECT * FROM project WHERE active=1";
        $data = $CI->frontend_model->get_data_by_sql($sql);
        $view['header'] = 'Projects';
        for($i=0;$i<count($data);$i++){
            $view['project'][$i] = $data[$i];
        }
        
        return $view;
    }

}
