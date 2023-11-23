<?php
$this->load->database(); 

class Internships_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_students()
    {
        $query = $this->db->get('students');
        return $query->result_array();
    }

    public function add_student($id,$lastname,$firstname,$email){
        $data=array(
        'student_id'=>$id,
        'lastname'=>$lastname,
        'firstname'=>$firstname,
        'email'=>$email// Argument given to the method
        );
        return $this->db->insert('students',$data);
        }
        
        public function delete_student($id) {
            $data=array('student_id'=>$id);
            $this->db->delete('students',$data);
            }
}
?>
