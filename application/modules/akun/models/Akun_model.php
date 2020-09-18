<?php

class Akun_model extends grocery_CRUD_Model
{
    public function getById($id, $table)
    {
        $this->db->where('Induk', $id);
        $this->db->from($table);
        return $this->db->count_all_results();
    }
}
