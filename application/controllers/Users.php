<?php

class Users extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
    }

    public function create() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('login', 'Login', 'required|is_unique[utilisateur.login]');
        $this->form_validation->set_rules('password', 'Mot de passe', 'required');
        $this->form_validation->set_rules('nom', 'Nom', 'required');
        $this->form_validation->set_rules('prenom', 'Prénom', 'required');
        $this->form_validation->set_rules('ddn', 'Date de naissance', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[utilisateur.email]');
        $this->form_validation->set_rules('type_utilisateur', 'Type d\'utilisateur', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('create_user');
        } else {
            $data = array(
                'login' => $this->input->post('login'),
                'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
                'nom' => $this->input->post('nom'),
                'prenom' => $this->input->post('prenom'),
                'ddn' => $this->input->post('ddn'),
                'email' => $this->input->post('email'),
                'type_utilisateur' => $this->input->post('type_utilisateur')
            );

            $user_id = $this->User_model->create_user($data);

            if ($user_id) {
                // Rediriger vers une page de succès ou une autre page
                redirect('success');
            } else {
                // Gérer les erreurs d'insertion
            }
        }
    }
}
