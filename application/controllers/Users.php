<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

    public function add_user() {
        $this->load->database();
        $this->load->library('form_validation');
        $this->load->model('user_model'); // Charger le modèle user_model en minuscules

        // Définir les règles de validation
        $this->form_validation->set_rules('login', 'Login', 'required');
        $this->form_validation->set_rules('password', 'Mot de passe', 'required');
        // Ajoutez d'autres règles de validation au besoin
        
        if ($this->form_validation->run() == FALSE) {
            // Affichez des messages d'erreur si la validation échoue
            $this->load->view('create_user');
        } else {
            // Traitement du formulaire réussi, ajoutez les données à la base de données
            $this->user_model->add_user(); // Utilisez user_model avec une minuscule
            // Redirigez ou affichez une vue de succès
            redirect('users/add_sucess.php');
        }

        // ... (autres méthodes du contrôleur) ...
    }
}
