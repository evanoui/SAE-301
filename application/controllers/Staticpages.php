<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Staticpages extends CI_Controller {
    public function display($content='home'){
        if(!file_exists('application/views/'.$content.'.php')){
            // Whoops , we don 't have a page for that !
            show_404();
            }
            $data['content']=$content;
            // $data is 'extracted ' and its compenents has a global access
            $this->load->vars($data);
            // Load a generic page
            $this->load->view('template');
            
    }

    public function index(){
        $this->display('home');
        }
}
?>

