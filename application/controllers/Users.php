<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->helper('url');
        $this->load->library('session');
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
        // Charger la bibliothèque de formulaire CodeIgniter si ce n'est pas déjà fait
        
        $this->load->library('form_validation');
    
        // Définir les règles de validation pour le formulaire
        $this->form_validation->set_rules('login', 'Nom d\'utilisateur', 'required|trim');
        $this->form_validation->set_rules('password', 'Mot de passe', 'required');
    
        // Initialiser la variable $user_is_logged_in
        $data['user_is_logged_in'] = $this->session->userdata('user_id') !== null;
    
        if ($this->form_validation->run() === FALSE) {
            // Si la validation échoue, réafficher le formulaire avec les erreurs
            $this->load->view('login_view', $data);
        } else {
            // Si la validation réussit, vérifier les informations de connexion
            $login = $this->input->post('login');
            $password = $this->input->post('password');
            echo "Login: $login, Password: $password"; 
            $user = $this->User_model->login($login, $password);
    
            if ($user) {
                // Utilisateur connecté avec succès
                // Vous pouvez stocker des informations de session ici si nécessaire
                $this->session->set_userdata('user_id', $user->id);
                redirect('dashboard'); // Rediriger vers la page d'accueil ou le tableau de bord après la connexion
            } else {
                // Échec de la connexion, afficher un message d'erreur
                $data['error_message'] = 'Nom d\'utilisateur ou mot de passe incorrect.';
                $this->load->view('login_view', $data);
            }
        }

        
    }
    
    public function dashboard() {
        // Vérifier si l'utilisateur est connecté
        if (!$this->session->userdata('user_id')) {
            redirect('users/login');
        }
    
        // Charger la vue du tableau de bord
        $this->load->view('dashboard_view');
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('users/login');
    }
    
}


?>
