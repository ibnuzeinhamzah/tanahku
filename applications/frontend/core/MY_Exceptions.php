<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class MY_Exceptions extends CI_Exceptions 
{
    public function __construct()
    {
        parent::__construct();
        $this->CI =& get_instance();
        $this->set_realpath();
    }

    public function show_404($page = '', $log_error = TRUE)
    {
        header("HTTP/1.1 404 Not Found");
        echo $this->CI->load->view('header.php',array('PAGE_TITLE'=>'Page not found'),true);
        echo $this->CI->load->view('pagenotfound.php',null,true);
        echo $this->CI->load->view('footer.php',null,true);
        exit(4);
    }

    function set_realpath()
    {
        $j = $this->CI->uri->total_segments();
        $realpath = "";
        for($i=2;$i<=$j;$i++) $realpath .= "../";
        if($this->CI->uri->total_segments() >= 1 && substr($_SERVER['REQUEST_URI'],-1) == "/") $realpath .= "../";
        define('REALPATH',$realpath);
    }
}