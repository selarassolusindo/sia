<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Saldoawal_model extends CI_Model
{

    public $table = 't03_saldoawal';
    public $id = 'idsa';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
        $this->db = $this->load->database($this->session->userdata('groupName'), true);
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('idsa', $q);
    	$this->db->or_like('idakun', $q);
    	$this->db->or_like('Debit', $q);
    	$this->db->or_like('Kredit', $q);
    	$this->db->or_like('created_at', $q);
    	$this->db->or_like('updated_at', $q);
    	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('idsa', $q);
    	$this->db->or_like('idakun', $q);
    	$this->db->or_like('Debit', $q);
    	$this->db->or_like('Kredit', $q);
    	$this->db->or_like('created_at', $q);
    	$this->db->or_like('updated_at', $q);
    	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

    /**
     * join ke tabel t02_akun
     */
    function getLimitData($limit, $start = 0, $q = NULL) {
        // $this->db->order_by($this->id, $this->order);
        $this->db->order_by('idakun', 'asc');
        $this->db->like('idsa', $q);
        $this->db->or_like($this->table . '.idakun', $q);
        $this->db->or_like('Debit', $q);
        $this->db->or_like('Kredit', $q);
        // $this->db->or_like('created_at', $q);
        // $this->db->or_like('updated_at', $q);
        $this->db->limit($limit, $start);
        $this->db->select($this->table . '.*, t02_akun.Kode, t02_akun.Nama');
        $this->db->from($this->table);
        $this->db->join('t02_akun', 't02_akun.idakun = '.$this->table.'.idakun');
        // return $this->db->get($this->table)->result();
        return $this->db->get()->result();
    }

    /**
     * join ke tabel t02_akun
     */
    function getById($id)
    {
        $this->db->where($this->id, $id);
        $this->db->select($this->table . '.*, t02_akun.Kode, t02_akun.Nama');
        $this->db->from($this->table);
        $this->db->join('t02_akun', 't02_akun.idakun = '.$this->table.'.idakun');
        // return $this->db->get($this->table)->row();
        return $this->db->get()->row();
    }

}

/* End of file Saldoawal_model.php */
/* Location: ./application/models/Saldoawal_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-10-03 19:38:12 */
/* http://harviacode.com */