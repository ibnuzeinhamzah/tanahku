<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Users_model extends CI_Model {

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

    function get_last_data($table)
    {
        $this->db->limit(1);
        $this->db->order_by('tanggal','DESC');
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

    function insert($table, $data)
    {
        $this->db->insert($table, $data);
    }

    function update($table, $data)
    {
        $this->db->replace($table, $data);
    }

    function delete($table, $data_id, $field_id)
    {
        $this->db->where($field_id, $data_id);
        $this->db->delete($table);
    }

    function update_by_id($table, $id, $field_id, $field_update, $data_update)
    {
        $this->db->set($field_update, $data_update, TRUE);
        $this->db->where($field_id, $id);
        $this->db->update($table);
    }
    
}