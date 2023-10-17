<?php
class Internships extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('internships_model');
        $this->load->helper('url');
    }

    public function delete($id){
        $this->internships_model->delete_student($id);
        $this->index();
        }
        
    public function index()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $data['title'] = 'List of students'; // a title to display above the list
        $data['content'] = 'main'; // template will call 'task_list ' sub - view
        $this->form_validation->set_rules('lastname', 'Last name', 'required');
        $this->form_validation->set_rules('firstname', 'First name', 'required');
        $this->form_validation->set_rules('id', 'Student id', 'required');
        $this->form_validation->set_rules('email', 'email', 'required');
        if ($this->form_validation->run() !== FALSE) {
            $lastname = $this->input->post('lastname');
            $firstname = $this->input->post('firstname');
            $id = $this->input->post('id');
            $email = $this->input->post('email');
            $this->internships_model->add_student($id, $lastname, $firstname, $email);
        }
        $data['studentlist'] = $this->internships_model->get_students();
        $this->load->vars($data);
        $this->load->view('template');
    }
    
    public function create()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('lastname', 'Last name', 'required');
        $this->form_validation->set_rules('firstname', 'First name', 'required');
        $this->form_validation->set_rules('id', 'Student id', 'required');
        $this->form_validation->set_rules('email', 'email', 'required');
        if ($this->form_validation->run() === FALSE) {
            $data['content'] = 'form';
        } else {
            $lastname = $this->input->post('lastname');
            $firstname = $this->input->post('firstname');
            $id = $this->input->post('id');
            $email = $this->input->post('email');
            $this->internships_model->add_student($id, $lastname, $firstname, $email);
            $data['content'] = 'add_success';
        }
        $this->load->vars($data);
        $this->load->view('template');
    }
}