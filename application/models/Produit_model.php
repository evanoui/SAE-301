<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produit_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function add_product() {
        // Récupérer les données soumises depuis le formulaire et les ajouter à la base de données
        $data = array(
            'type' => $this->input->post('type'),
            'description' => $this->input->post('description'),
            'marque' => $this->input->post('marque'),
            'modele' => $this->input->post('modele'),
            'prix_location' => $this->input->post('prix_location'),
            'etat' => $this->input->post('etat')
        );

        $this->db->insert('produit', $data);
    }

    public function get_products() {
        // Récupérer la liste des produits depuis la base de données
        $query = $this->db->get('produit');
        return $query->result();
    }

    public function delete_product($product_id) {
        $this->db->where('id', $product_id);
        $this->db->delete('produit');
    }

}

