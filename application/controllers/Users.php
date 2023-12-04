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

    public function user_list() {
        $data['users'] = $this->User_model->get_users(); // Assurez-vous que vous avez une méthode get_users() dans votre modèle
        $this->load->view('user_list', $data);
    }
    public function delete($user_id) {
        $this->User_model->delete_user($user_id);
        redirect('users/user_list'); 
    }

    public function login() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('login', 'Nom d\'utilisateur', 'required');
        $this->form_validation->set_rules('password', 'Mot de passe', 'required');
    
        if ($this->form_validation->run() === FALSE) {
            // Afficher la vue de connexion avec les erreurs de validation
            $this->load->view('login_view');
        } else {
            // Vérifier les informations de connexion
            $login = $this->input->post('login');
            $password = $this->input->post('password');
            $user = $this->User_model->login($login, $password);
    
            if ($user) {
                // Connexion réussie, rediriger vers la page d'accueil ou une autre page
                redirect('produits/list');
            } else {
                // Informations de connexion incorrectes, afficher la vue de connexion avec un message d'erreur
                $data['error_message'] = 'Nom d\'utilisateur ou mot de passe incorrect';
                $this->load->view('login_view', $data);
            }
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('users/login');
    }
    
}
?>
