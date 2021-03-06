<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Groups_model extends CI_Model
{
    public $table = 'groups';
    public $id = 'id';
    public $order = 'DESC';

    public function __construct()
    {
        parent::__construct();
    }

    // get all
    public function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    public function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    // get total rows
    public function total_rows($q = null)
    {
        $this->db->like('id', $q);
        $this->db->or_like('name', $q);
        $this->db->or_like('description', $q);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    public function get_limit_data($limit, $start = 0, $q = null)
    {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $q);
        $this->db->or_like('name', $q);
        $this->db->or_like('description', $q);
        $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    public function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    public function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    public function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

    // get all where left(description, 2) = 'PT' or 'CV'
    public function get_all_by_title()
    {
        $where = "left(description, 2) = 'PT' or left(description, 2) = 'CV'";
        $this->db->where($where);
        $this->db->order_by('description', 'asc');
        echo $this->db->last_query();
        return $this->db->get($this->table)->result();
    }
}

/* End of file Groups_model.php */
/* Location: ./application/models/Groups_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-09-11 04:00:34 */
/* http://harviacode.com */
