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
    function getNewKode($idakun)
    {
        $row = $this->get_by_id($idakun);
        $kode = $row->Kode;
        $lenKode = strlen($row->Kode);
        switch ($lenKode) {
            case 1:
                $strLeft = 2;
                $strBetween1 = '1';
                $strBetween2 = STRBETWEEN21;
                $strSubStr = 1;
                break;
            case 2:
                $strLeft = 4;
                $strBetween1 = '01';
                $strBetween2 = STRBETWEEN22;
                $strSubStr = 2;
                break;
            case 4:
                $strLeft = 7;
                $strBetween1 = '001';
                $strBetween2 = STRBETWEEN24;
                $strSubStr = 3;
                break;
            case 7:
                $strLeft = 10;
                $strBetween1 = '001';
                $strBetween2 = STRBETWEEN27;
                $strSubStr = 3;
                break;
        }
        $this->db->where('left(kode, '.$strLeft.') >=', $kode . $strBetween1);
        $this->db->where('left(kode, '.$strLeft.') <=', $kode . $strBetween2);
        $this->db->where('length(kode) = '.$strLeft);
        $this->db->order_by('kode', 'desc');
        $this->db->limit(1);
        $row = $this->db->get($this->table)->row();
        // echo pre($this->db->last_query()); die();
        if ($row) {
            /**
             * data yang dicari :: ditemukan
             */
            $value = $row->Kode;
            // $sLastKode = intval(substr($value, 3, 3)); // ambil 3 digit terakhir
            $sLastKode = intval(substr($value, $lenKode, $strSubStr)); // ambil 3 digit terakhir
            $sLastKode = intval($sLastKode) + 1; // konversi ke integer, lalu tambahkan satu
            $sNextKode = $kode . ($lenKode > 1 ? sprintf('%0'.$strSubStr.'s', $sLastKode) : $sLastKode); // format hasilnya dan tambahkan prefix
            // if (strlen($sNextKode) > 6) {
            //     $sNextKode = "JNS999";
            // }
        } else {
            /**
             * data yang dicari :: tidak ditemukan, maka
             * kode-induk + 1   => untuk level 2
             *            + 01  => untuk level 3
             *            + 001 = > untuk level 4 dan 5
             */
            $sNextKode = $kode . $strBetween1;
        }
        return $sNextKode;
    }

}

/* End of file Akun_model.php */
/* Location: ./application/models/Akun_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-10-03 23:12:33 */
/* http://harviacode.com */
