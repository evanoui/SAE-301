<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function add_user() {
        $data = array(
            'login' => $this->input->post('login'),
            'password' => md5($this->input->post('password')), // Note: utiliser des méthodes de hachage sécurisées en production
            'nom' => $this->input->post('nom'),
            'prenom' => $this->input->post('prenom'),
            'ddn' => $this->input->post('ddn'),
            'email' => $this->input->post('email'),
            'type_utilisateur' => $this->input->post('type_utilisateur')
        );

        $this->db->insert('utilisateur', $data);
    }
}
?>
