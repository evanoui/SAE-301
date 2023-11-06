<?php
class User_model extends CI_Model {
    public function create_user($data) {
        $this->db->insert('utilisateur', $data);
        return $this->db->insert_id();
    }
}
