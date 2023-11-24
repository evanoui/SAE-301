<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    public function add_user() {
        // Récupérez les données du formulaire
        $data = array(
            'login' => $this->input->post('login'),
            'password' => $this->input->post('password'),
            'nom' => $this->input->post('nom'),
            'prenom' => $this->input->post('prenom'),
            'ddn' => $this->input->post('ddn'),
            'email' => $this->input->post('email'),
            'type_utilisateur' => $this->input->post('type_utilisateur')
        );

        // Ajoutez les données à la base de données
        $this->db->insert('utilisateur', $data);
    }

    // ... autres méthodes ...

}
