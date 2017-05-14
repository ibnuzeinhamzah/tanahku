<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Frontend_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->dbutil();
		$this->load->dbforge();
    }

	public function get_all_data($table)
    {
        $query = $this->db->get($table);
        $data = array();
		foreach ($query->result() as $row) { $data[count($data)] = $row; }
		$query->free_result();
        return $data;
    }

    public function get_limit_data($table, $limit = 3)
    {
        $this->db->limit($limit);
        $query = $this->db->get($table);
        $data = array();
        foreach ($query->result() as $row) { $data[count($data)] = $row; }
        $query->free_result();
        return $data;
    }

    function get_data_by_id($table, $data_id, $field_id)
    {
    	$this->db->where($field_id,$data_id);
    	$query = $this->db->get($table);
        $data = array();
		foreach ($query->result() as $row) { $data[count($data)] = $row; }
		$query->free_result();
        return $data;
    }

    function get_data_by_sql($sql)
    {
        $query = $this->db->query($sql);
        $data = array();
        foreach ($query->result() as $row) { $data[count($data)] = $row; }
        $query->free_result();
        return $data;
    }
    
}