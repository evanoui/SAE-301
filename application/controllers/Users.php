<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

    public function add_user() {
        $this->load->database();
        $this->load->library('form_validation');
        $this->load->model('user_model'); // Charger le modèle User_model

        // Définir les règles de validation
        $this->form_validation->set_rules('login', 'Login', 'required');
        // ... (ajoutez d'autres règles de validation ici) ...

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('create_user');
        } else {
            $data = array(
                'login' => $this->input->post('login'),
                // ... (ajoutez d'autres champs ici) ...
            );

            // Utiliser le modèle pour ajouter l'utilisateur à la base de données
            $result = $this->user_model->add_user($data);

            if ($result) {
                // Rediriger vers une page de confirmation ou une autre page
                redirect('users/add_success');
            } else {
                // Gérer l'échec de l'insertion
                echo 'Échec de l\'ajout de l\'utilisateur.';
            }
        }
    }

    // ... (autres méthodes du contrôleur) ...
}
