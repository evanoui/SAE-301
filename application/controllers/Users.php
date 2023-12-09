<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->library('form_validation');
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

    public function inscription() {
        // Charger la bibliothèque de formulaire CodeIgniter si ce n'est pas déjà fait
        $this->load->library('form_validation');

        // Définir les règles de validation pour le formulaire
        $this->form_validation->set_rules('login', 'Nom d\'utilisateur', 'required|trim');
        $this->form_validation->set_rules('password', 'Mot de passe', 'required');
        $this->form_validation->set_rules('nom', 'Nom', 'required');
        $this->form_validation->set_rules('prenom', 'Prénom', 'required');
        $this->form_validation->set_rules('ddn', 'Date de naissance', 'required');
        $this->form_validation->set_rules('email', 'Adresse e-mail', 'required|valid_email');

        if ($this->form_validation->run() === FALSE) {
            // Si la validation échoue, réafficher le formulaire avec les erreurs
            $this->load->view('inscription');
        } else {
            // Si la validation réussit, ajouter l'utilisateur à la base de données
            $this->User_model->inscription();
            redirect('users/login'); // Rediriger vers une page de succès ou une autre action
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
        // Logique pour récupérer les données du formulaire de connexion
        $login = $this->input->post('username'); // Utilisez 'username' au lieu de 'user_id'
        $password = $this->input->post('password');
    
        // Utilisez la méthode du modèle pour vérifier les informations d'identification
        $this->load->model('User_model');
        $authenticated = $this->User_model->login($login, $password);
    
        if ($authenticated) {
            // Si l'authentification réussit, créez une session
            $user_data = array(
                'user_id' => $login, // Utilisez 'username' ici
                'username' => $login,
                // ... d'autres données que vous souhaitez stocker dans la session
            );
    
            $this->session->set_userdata($user_data);
    
            // Redirigez l'utilisateur vers une page après la connexion
            redirect(''); // Assurez-vous que 'login_view' est une route valide dans votre application
        } else {
            // Si l'authentification échoue, vous pouvez gérer cela ici (afficher un message d'erreur, etc.)
            // ...
    
            // Initialisez la variable $user_is_logged_in à false
            $data['user_is_logged_in'] = false;
    
            // Chargez la vue avec les données
            $this->load->view('login_view', $data);
        }
    }
    

    public function logout() {
        // Déconnectez l'utilisateur et détruisez la session
        $this->session->unset_userdata('username');
        $this->session->sess_destroy();
        
        // Redirigez l'utilisateur vers une page après la déconnexion
        redirect('users/login'); // Assurez-vous que 'auth/login' est une route valide dans votre application
    }
}
    




?>
