<?php

class User_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function create() {
        $this->load->helper('url');





        $data2 = array(
            'email' => $this->input->post('email'),
            'mobile' => $this->input->post('mobile'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'type' => "User",
            'password' => md5($this->input->post('password')),
        );


        return $this->db->insert('authentication', $data2);
    }

    public function log($email, $pass) {


        $query = $this->db->get_where('authentication', array('email' => $email, 'password' => $pass,));
        return $query->row_array();
    }

    public function find_by_id($id) {
        if ($id === FALSE) {
            $query = $this->db->get('authentication');
            return $query->result_array();
        }

        $query = $this->db->get_where('authentication', array('auth_id' => $id));
        return $query->row_array();
    }

    public function Add_detail($id, $email, $mobile) {



        $data = array('name' => $this->input->post('name'),
            'dob' => $this->input->post('dob'),
            'email' => $email,
            'mobile' => $mobile,
            'auth_id' => $id,
            'created_at' => date('Y-m_d H:i:s'),
            'updated_at' => date('Y-m_d H:i:s'),
            'gender' => $this->input->post('sex'),
            'exp_year' => $this->input->post('experince_year'),
            'experince_month' => $this->input->post('experince_month'),
            'current_location' => $this->input->post('current_location'),
            'prefred_location' => $this->input->post('prefred_location'),
            'industry' => $this->input->post('industry'),
            'function_area' => $this->input->post('function_area'),
            'role' => $this->input->post('role'),
            'key_skill' => $this->input->post('key_skill'),
            'marital_status' => $this->input->post('marital_status'),
            'resume_headline' => $this->input->post('resume_headline'),
        );

        return $this->db->insert('user', $data);
    }
    public function Show_profile($id)
    {
        $query = $this->db->get_where('news',array('user_id'=>$id));
        return $query->row_array();
    }

}
