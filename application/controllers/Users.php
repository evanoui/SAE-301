<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->library('form_validation');
    }

    public function create()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('login', 'Nom d\'utilisateur', 'required|trim');
        $this->form_validation->set_rules('password', 'Mot de passe', 'required');
        $this->form_validation->set_rules('nom', 'Nom', 'required');
        $this->form_validation->set_rules('prenom', 'Prénom', 'required');
        $this->form_validation->set_rules('ddn', 'Date de naissance', 'required');
        $this->form_validation->set_rules('email', 'Adresse e-mail', 'required|valid_email');
        $this->form_validation->set_rules('type_utilisateur', 'Type d\'utilisateur', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('creer_gerant_admin');
        } else {
            // ajout dans la bdd
            $this->User_model->add_user();
            redirect('users/success');
        }
    }

    // Formulaire d'inscription
    public function inscription()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('login', 'Nom d\'utilisateur', 'required|trim');
        $this->form_validation->set_rules('password', 'Mot de passe', 'required');
        $this->form_validation->set_rules('nom', 'Nom', 'required');
        $this->form_validation->set_rules('prenom', 'Prénom', 'required');
        $this->form_validation->set_rules('ddn', 'Date de naissance', 'required');
        $this->form_validation->set_rules('email', 'Adresse e-mail', 'required|valid_email');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('inscription');
        } else {
            // ajout dans la bdd
            $this->User_model->inscription();
            redirect('users/login');
        }
    }

    public function success()
    {
        // Pag de succès après l'ajout d'un utilisateur
        $this->load->view('add_success');
    }

    public function liste_utilisateur()
    {
        $data['users'] = $this->User_model->get_users(); // Récupérer les utilisateurs
        $this->load->view('liste_utilisateur', $data);
    }
    public function delete($user_id)
    {
        $this->User_model->delete_user($user_id);
        redirect('users/liste_utilisateur');
    }

    public function login()
    {
        // Récupérer les données du formulaire de connexion
        $login = $this->input->post('username');
        $password = $this->input->post('password');

        $this->load->model('User_model');
        $authenticated = $this->User_model->login($login, $password);

        if ($authenticated) {
            // création d'une session
            $user_data = array(
                'user_id' => $login,
                'username' => $login,
            );

            $this->session->set_userdata($user_data);
            redirect('');
        } else {
            $data['user_is_logged_in'] = false;
            $this->load->view('login_view', $data);
        }
    }
    
    public function logout()
    {
        // déconnexion et destruction de la session en cours 
        $this->session->unset_userdata('username');
        $this->session->sess_destroy();

        redirect('users/login');
    }

    public function delete_account()
    {
        // Assurez-vous que l'utilisateur est connecté
        if (!$this->session->userdata('user_id')) {
            // Redirigez l'utilisateur vers la page de connexion s'il n'est pas connecté
            redirect('users/login');
        }

        // Si le formulaire de confirmation est soumis
        if ($this->input->post('confirm')) {
            // Récupérez l'ID de l'utilisateur connecté
            $user_id = $this->session->userdata('user_id');
            echo "ID de l'utilisateur à supprimer : $user_id";
            // Supprimez le compte de l'utilisateur à partir de la base de données
            $this->User_model->delete_user($user_id);

            // Déconnectez l'utilisateur
            $this->session->unset_userdata('user_id');
            $this->session->unset_userdata('username');
            $this->session->sess_destroy();

            // Redirigez l'utilisateur vers la page d'accueil ou une autre page
            redirect(''); // ou vers la page souhaitée après la suppression du compte
        } else {
            // Si le formulaire de confirmation n'est pas soumis, redirigez vers la page 'compte'
            redirect('users/compte');
        }
    }


    public function modification_compte()
    {
        // Assurez-vous que l'utilisateur est connecté
        if (!$this->session->userdata('user_id')) {
            // Redirigez l'utilisateur vers la page de connexion s'il n'est pas connecté
            redirect('users/login');
        }

        // Récupérez l'ID de l'utilisateur connecté
        $user_id = $this->session->userdata('user_id');

        // Récupérez les informations actuelles de l'utilisateur depuis la base de données
        $data['user'] = $this->User_model->get_specific_user($user_id);

        // Chargez la vue pour la modification du compte avec les informations actuelles
        $this->load->view('compte', $data);
    }

    public function sauvegarde_modif_compte()
    {
        // Assurez-vous que l'utilisateur est connecté
        if (!$this->session->userdata('user_id')) {
            // Redirigez l'utilisateur vers la page de connexion s'il n'est pas connecté
            redirect('users/login');
        }

        // Récupérez l'ID de l'utilisateur connecté
        $user_id = $this->session->userdata('user_id');

        // Récupérez les données postées depuis le formulaire de modification
        $data = array(
            'first_name' => $this->input->post('first_name'),
            'last_name' => $this->input->post('last_name'),
            'dob' => $this->input->post('dob'),
            'password' => $this->input->post('password'),
            'email' => $this->input->post('email'),
        );

        // Appelez la méthode du modèle pour mettre à jour les informations de l'utilisateur
        $this->User_model->update_user($user_id, $data);

        // Redirigez l'utilisateur vers la page de compte ou une autre page
        redirect('users/compte');
    }
}
?>