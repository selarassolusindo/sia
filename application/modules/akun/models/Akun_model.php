<?php

class Akun_model extends grocery_CRUD_Model
{
    public function totalRows($idakun, $table) //getById($id, $table)
    {
        $this->db->where('Induk', $idakun);
        $this->db->from($table);
        return $this->db->count_all_results();
    }

    // get data by id
    public function getById($idakun, $table)
    {
        echo 'a'; exit;
        $this->db->where('idakun', $idakun);
        $r = $this->db->get($table)->row();
        // return $this->db->get($table)->row();
        echo pre($r); exit;
        return $this->db->last_query();
    }
}
