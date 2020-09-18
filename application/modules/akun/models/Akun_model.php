<?php

class Akun_model extends grocery_CRUD_Model
{
    public function getById($id)
    {
        $this->db->where('Induk', $id);
        $this->db->from('t02_akun');
        return $this->db->count_all_results();
    }
}
