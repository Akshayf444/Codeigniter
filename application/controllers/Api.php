<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Api extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function login() {
        $this->load->model('User_model');
        $email = $_GET['email'];
        $password = md5($_GET['password']);
        $check = $this->User_model->log($email, $password);

        if (!empty($check) && $check['type'] == 'User') {

            $this->session->set_userdata("user_id", $check['auth_id']);
            $this->session->set_userdata("user_email", $check['email']);
            $this->session->set_userdata("user_mobile", $check['mobile']);
            $this->session->set_userdata("user_type", $check['type']);
            $check1 = $this->User_model->find_by_id($check['auth_id']);
        }
        $output = array('status' => 'success', 'message' => $check1);
        header('content-type: application/json');
        echo json_encode($output);
    }

    public function register() {
        $this->load->model('User_model');
        $this->load->model('address_model');

        if ($this->input->post()) {

            $field_array = array(
                'email' => $this->input->post('email'),
                'password' => $this->input->post('password'),
                'mobile' => $this->input->post('mobile'),
                'type' => 'User'
            );

            ///////Create New User
            $id = $this->User_model->create($field_array);
            $data = array(
                'name' => $this->input->post('name'),
                'dob' => $this->input->post('dob'),
                'email' => $this->input->post('email'),
                'mobile' => $this->input->post('mobile'),
                'auth_id' => $id,
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

            /////////Insert Basic Profile
            $this->User_model->Add_detail($data);

            ////////Insert education Details
            $education_details = array(
                'qualification' => $this->input->post('qualification'),
                'specialization' => $this->input->post('specialization'),
                'institute' => $this->input->post('institute'),
                'year' => $this->input->post('year'),
                'created' => date('Y-m-d H:i:s'),
                'auth_id' => $id,
            );

            $this->User_model->user_qualification($data);
            $output = array('status' => 'success', 'message' => 'Error');
        } else {
            $output = array('status' => 'error', 'message' => 'Error');
        }

        header('content-type: application/json');
        echo json_encode($output);
    }

    public function getLocation() {
        $this->load->model('Master_model');
        $locations = $this->Master_model->listLocation();
        $content = array();
        if (!empty($result)) {
            foreach ($result as $loc) {
                $content[] = array(
                    'loc_id' => $loc->loc_id,
                    'location' => $loc->location
                );
            }
            $output = array('status' => 'success', 'message' => $content);
        } else {
            $output = array('status' => 'error', 'message' => 'Details Not Found');
        }

        header('content-type: application/json');
        echo json_encode($output);
    }

}
