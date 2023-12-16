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
        $this->form_validation->set_rules('ddn', 'Date de naissance', 'required|callback_verif_age');
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
        $this->form_validation->set_rules('ddn', 'Date de naissance', 'required|callback_verif_age');
        $this->form_validation->set_rules('email', 'Adresse e-mail', 'required|valid_email');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('inscription');
        } else {
            // ajout dans la bdd
            $this->User_model->inscription();
            redirect('users/login');
        }
    }

    public function verif_age($date)
{
    // Calculer l'âge 
    $birthdate = new DateTime($date);
    $today = new DateTime();
    $age = $birthdate->diff($today)->y;

    // Vérifier si l'âge est supérieur ou égal à 18
    if ($age < 18) {
        $this->form_validation->set_message('verif_age', 'Vous devez être majeur pour créer un compte.');
        return FALSE;
    }

    return TRUE;
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
}
?>