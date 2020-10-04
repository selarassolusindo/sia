<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Akun_model extends CI_Model
{

    public $table = 't02_akun';
    public $id = 'idakun';
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
        $this->db->like('idakun', $q);
    	$this->db->or_like('Kode', $q);
    	$this->db->or_like('Nama', $q);
    	$this->db->or_like('Induk', $q);
    	$this->db->or_like('Urut', $q);
    	$this->db->or_like('created_at', $q);
    	$this->db->or_like('updated_at', $q);
    	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('idakun', $q);
    	$this->db->or_like('Kode', $q);
    	$this->db->or_like('Nama', $q);
    	$this->db->or_like('Induk', $q);
    	$this->db->or_like('Urut', $q);
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
     * ambil akun level terakhir
     */
    function getAllLastLevel()
    {
        $this->db->where('idakun not in (select induk from t02_akun)');
        $this->db->order_by('urut', 'asc');
        return $this->db->get($this->table)->result();
    }

    /**
     * modif
     */
    function getLimitData($limit, $start = 0, $q = NULL) {
        $this->db->order_by('urut', 'asc');
        $this->db->like('idakun', $q);
    	$this->db->or_like('Kode', $q);
    	$this->db->or_like('Nama', $q);
    	$this->db->or_like('Induk', $q);
    	$this->db->or_like('Urut', $q);
    	$this->db->or_like('created_at', $q);
    	$this->db->or_like('updated_at', $q);
    	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    /**
     * get new kode-sub by kode-induk
     */
    function getNewKode($induk, $kodeInduk)
    {

        $this->db->where('induk', $induk);
        $this->db->limit(1);
        $this->db->order_by('urut', 'desc');
        $recCount = $this->db->get($this->table)->count_all_results();
        return $this->db->get($this->table)->row();
    }

}

/* End of file Akun_model.php */
/* Location: ./application/models/Akun_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-10-03 23:12:33 */
/* http://harviacode.com */
