<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

    public function add_user() {
        $this->load->database();
        $this->load->library('form_validation');
        $this->load->model('user_model');

        // Définir les règles de validation
        $this->form_validation->set_rules('login', 'Login', 'required');
        $this->form_validation->set_rules('password', 'Mot de passe', 'required');
        // Ajoutez d'autres règles de validation au besoin
        
        if ($this->form_validation->run() == FALSE) {
            // Affichez des messages d'erreur si la validation échoue
            $this->load->view('create_user');
        } else {
            // Traitement du formulaire réussi, ajoutez les données à la base de données
            $this->user_model->add_user();
            // Redirigez vers la méthode add_success
            redirect('users/add_success');
        }
    }

    public function add() {
        // Code à exécuter après l'ajout réussi (peut être une autre vue, un message de succès, etc.)
        $this->load->view('add_success'); // Remplacez 'success_view' par le nom réel de votre vue de succès
    }

    
}
