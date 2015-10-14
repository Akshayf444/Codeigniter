<?php

class employee_model extends CI_Model {

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
            'type' => "employe",
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

    public function add_details() {
        $data = array('name' => $this->input->post['name'],
            'type' => $this->input->post['type'],
            'industry_type_id' => $this->input->post['industry_type'],
            'contact_person' => $this->input->post['contact_person'],
            'address_id' => $this->input->post['address_id'],
            'auth_id' => $this->input->post['user_id'],
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        );
        return $this->db->insert('emp_profile', $data);
    }

}
