<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produits extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Produit_model');
        $this->load->helper('url');
    }


    public function add() {
        // Charger la bibliothèque de formulaire CodeIgniter si ce n'est pas déjà fait
        $this->load->library('form_validation');

        // Définir les règles de validation pour le formulaire
        $this->form_validation->set_rules('type', 'Type', 'required|trim');
        $this->form_validation->set_rules('description', 'Description', 'required');
        $this->form_validation->set_rules('marque', 'Marque', 'required');
        $this->form_validation->set_rules('modele', 'Modèle', 'required');
        $this->form_validation->set_rules('prix_location', 'Prix de Location', 'required');
        $this->form_validation->set_rules('etat', 'État', 'required');


        if ($this->form_validation->run() === FALSE) {
            // Si la validation échoue, réafficher le formulaire avec les erreurs
            $this->load->view('add_product');
        } else {
            // Si la validation réussit, ajouter l'utilisateur à la base de données
            $this->Produit_model->add_product();
            redirect('produits/list'); // Rediriger vers une page de succès ou une autre action
        }
    }

    public function list() {
        $data['products'] = $this->Produit_model->get_products(); // Assurez-vous d'avoir cette méthode dans votre modèle
        $this->load->view('product_list', $data);
    }

    public function delete($product_id) {
        $this->Produit_model->delete_product($product_id);
        redirect('produits/list');
    }
    
}
