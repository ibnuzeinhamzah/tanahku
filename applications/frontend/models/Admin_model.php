<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Admin_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->dbutil();
		$this->load->dbforge();
    }

    function insert($table, $data)
    {
        $this->db->insert($table, $data);
        return $this->db->insert_id();
    }

    function update($table, $primary_key_field, $primary_key_data, $data)
    {
        $this->db->where($primary_key_field, $primary_key_data);
        $this->db->update($table, $data);
    }
    
}