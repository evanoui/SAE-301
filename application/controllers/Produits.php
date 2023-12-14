<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produits extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Produit_model');
        $this->load->helper('url');
        $this->load->library('session');
    }

    //Ajout d'un produit
    public function ajouter()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('type', 'Type', 'required|trim');
        $this->form_validation->set_rules('description', 'Description', 'required');
        $this->form_validation->set_rules('marque', 'Marque', 'required');
        $this->form_validation->set_rules('modele', 'Modèle', 'required');
        $this->form_validation->set_rules('prix_location', 'Prix de Location', 'required');
        $this->form_validation->set_rules('etat', 'État', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('ajouter_produit');
        } else {
            $this->Produit_model->ajouter_produit();
            redirect('produits/list');
        }
    }

    // Liste des produits et suppresion (gerant)
    public function list()
    {
        $data['products'] = $this->Produit_model->get_products();
        $this->load->view('liste_produit_gerant', $data);

    }

    // Liste des produits (client)
    public function list_client()
    {
        $data['products'] = $this->Produit_model->get_products();
        $this->load->view('liste_produit_client', $data);
    }

    // Supp
    public function delete($product_id)
    {
        $this->Produit_model->delete_product($product_id);
        redirect('produits/list');
    }

}
