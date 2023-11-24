<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {
public function add_user() {
    $data = array(
        'login' => $this->input->post('login'),
        'password' => $this->input->post('password'),
        // Ajoutez d'autres champs au besoin
    );

    // Ajoutez les données à la base de données
    $this->db->insert('utilisateur', $data);
}
}
?>
