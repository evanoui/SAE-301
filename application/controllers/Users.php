<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->helper('url');
    }

    public function create() {
        // Charger la bibliothèque de formulaire CodeIgniter si ce n'est pas déjà fait
        $this->load->library('form_validation');

        // Définir les règles de validation pour le formulaire
        $this->form_validation->set_rules('login', 'Nom d\'utilisateur', 'required|trim');
        $this->form_validation->set_rules('password', 'Mot de passe', 'required');
        $this->form_validation->set_rules('nom', 'Nom', 'required');
        $this->form_validation->set_rules('prenom', 'Prénom', 'required');
        $this->form_validation->set_rules('ddn', 'Date de naissance', 'required');
        $this->form_validation->set_rules('email', 'Adresse e-mail', 'required|valid_email');
        $this->form_validation->set_rules('type_utilisateur', 'Type d\'utilisateur', 'required');

        if ($this->form_validation->run() === FALSE) {
            // Si la validation échoue, réafficher le formulaire avec les erreurs
            $this->load->view('create_user');
        } else {
            // Si la validation réussit, ajouter l'utilisateur à la base de données
            $this->User_model->add_user();
            redirect('users/success'); // Rediriger vers une page de succès ou une autre action
        }
    }

    public function success() {
        // Afficher une page de succès après l'ajout d'un utilisateur
        $this->load->view('add_success');
    }
}
?>
