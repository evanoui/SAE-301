<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Staticpages extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->database(); // Charger la bibliothèque de base de données
    }
    public function display($content = 'home') {
        // Charger la bibliothèque de session
        $this->load->library('session');
    
        // Charger la bibliothèque de base de données
        $this->load->database();
    
        if (!file_exists('application/views/' . $content . '.php')) {
            // Whoops, we don't have a page for that!
            show_404();
        }
    
        $data['content'] = $content;
        // $data is 'extracted' and its components have global access
        $this->load->vars($data);
        // Charger une page générique
        $this->load->view('template', $data);
    }
    

    public function index() {
        $this->load->helper('url'); 
        $this->load->view('template'); 
    }

    
}
?>

