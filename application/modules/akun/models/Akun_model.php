<?php

class Akun_model extends grocery_CRUD_Model
{
    public function totalRows($idakun, $table) //getById($id, $table)
    {
        $this->db->where('Induk', $idakun);
        $this->db->from($table);
        return $this->db->count_all_results();
    }
}
