<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function add_user() {
        $data = array(
            'login' => $this->input->post('login'),
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT), // Note: utiliser des méthodes de hachage sécurisées en production
            'nom' => $this->input->post('nom'),
            'prenom' => $this->input->post('prenom'),
            'ddn' => $this->input->post('ddn'),
            'email' => $this->input->post('email'),
            'type_utilisateur' => $this->input->post('type_utilisateur')
        );

        $this->db->insert('utilisateur', $data);
    }

    public function get_users() {
        // Récupérer la liste des utilisateurs depuis la base de données
        $query = $this->db->get('utilisateur');
        return $query->result();
    }

    public function delete_user($user_id) {
        $this->db->where('id', $user_id);
        $this->db->delete('utilisateur');
    }

    public function login($login, $password) {
        $query = $this->db->get_where('utilisateur', array('login' => $login));
    
        // Vérifier si la requête a réussi
        if ($query) {
            $user = $query->row();
    
            // Vérifier si l'utilisateur existe et si le mot de passe est correct
            if ($user && password_verify($password, $user->password)) {
                return $user;
            }
        }
    
        // Si quelque chose ne va pas (utilisateur non trouvé, mot de passe incorrect, erreur de base de données, etc.)
        return null;
    }
    
}
?>
