<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    // Ajout utilisateur dans la bdd
    public function add_user()
    {
        $data = array(
            'login' => $this->input->post('login'),
            'password' => md5($this->input->post('password')),
            'nom' => $this->input->post('nom'),
            'prenom' => $this->input->post('prenom'),
            'ddn' => $this->input->post('ddn'),
            'email' => $this->input->post('email'),
            'type_utilisateur' => $this->input->post('type_utilisateur')
        );

        $this->db->insert('utilisateur', $data);
    }

    // Récupérer la liste des utilisateurs
    public function get_users()
    {
        $query = $this->db->get('utilisateur');
        return $query->result();
    }

    public function get_specific_user($user_id)
    {
        $query = $this->db->where('id', $user_id)->get('utilisateur');

        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return null;
        }
    }

    public function delete_user($user_id)
    {
        $this->db->where('id', $user_id);
        $this->db->delete('utilisateur');
    }

    public function login($username, $password)
    {
        $this->db->where('login', $username); 
        $this->db->where('password', md5($password));
        $query = $this->db->get('utilisateur');

        if ($query->num_rows() == 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function inscription()
    {
        $data = array(
            'login' => $this->input->post('login'),
            'password' => md5($this->input->post('password')),
            'nom' => $this->input->post('nom'),
            'prenom' => $this->input->post('prenom'),
            'ddn' => $this->input->post('ddn'),
            'email' => $this->input->post('email'),
            'type_utilisateur' => 'client' // client par défaut
        );

        $this->db->insert('utilisateur', $data);
    }


}

?>