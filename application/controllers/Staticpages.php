<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Staticpages extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->database();
    }
    
    public function display($content = 'home')
    {
        $this->load->library('session');


        $this->load->database();

        if (!file_exists('application/views/' . $content . '.php')) {

            show_404();
        }

        $data['content'] = $content;

        $this->load->vars($data);
        $this->load->view('template', $data);
    }

    public function index()
    {
        $this->load->helper('url');
        $this->load->view('template');
    }


}
?>