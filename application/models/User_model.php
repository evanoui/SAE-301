<?php
class User_model extends CI_Model {
    public function add_user($data) {
        return $this->db->insert('utilisateur', $data);
    }
}
