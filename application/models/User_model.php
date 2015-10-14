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

    public function find_by_user_id($id) {
        if ($id === FALSE) {
            $query = $this->db->get('user');
            return $query->result_array();
        }

        $query = $this->db->get_where('user', array('auth_id' => $id));
        return $query->row_array();
    }

    public function user_qualification_by_id($id) {

        $query = $this->db->get_where('user_qualification', array('auth_id' => $id));
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

    public function Show_profile($id) {
        $query = $this->db->get_where('user', array('auth_id' => $id));
        return $query->row_array();
    }

    public function profile_update($id, $email, $mobile) {

        $data = array('name' => $this->input->post('name'),
            'dob' => $this->input->post('dob'),
            'email' => $email,
            'mobile' => $mobile,
            'auth_id' => $id,
//            'created_at' => date('Y-m_d H:i:s'),
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
        $this->db->where(array('auth_id' => $id));
        return $this->db->update('user', $data);
    }

    public function education_master() {
        $query = $this->db->get('education_master');
        return $query->result();
    }

    public function user_qualification($id) {
        $data = array('qualification' => $this->input->post('qualification'),
            'specialization' => $this->input->post('specialization'),
            'institute' => $this->input->post('institute'),
            'year' => $this->input->post('year'),
            'created' => date('Y-m-d H:i:s'),
            'auth_id' => $id,
        );
        return $this->db->insert('user_qualification', $data);
    }

    public function user_qualification_update($id) {
        $data = array('qualification' => $this->input->post('qualification'),
            'specialization' => $this->input->post('specialization'),
            'institute' => $this->input->post('institute'),
            'year' => $this->input->post('year'),
            'updated_at' => date('Y-m-d H:i:s'),
            'auth_id' => $id,
        );
        $this->db->where(array('auth_id' => $id));
        return $this->db->update('user_qualification', $data);
    }

}
