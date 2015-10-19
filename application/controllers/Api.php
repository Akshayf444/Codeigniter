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

    public function Add_profile() {
        $this->load->model('Master_model');
        $this->load->model('address_model');
        $user_id = $_REQUEST['user_id'];
        $user_profile = $this->User_model->Show_profile($user_id);



        if ($this->is_logged_in() == TRUE) {

            if ($this->input->request()) {
                $this->form_validation->set_rules('name', 'name', 'trim|required');
                $this->form_validation->set_rules('dob', 'dob', 'trim|required');
                $this->form_validation->set_rules('sex', 'sex', 'trim|required');
                $this->form_validation->set_rules('experince_year', 'experince_year', 'trim|required');
                $this->form_validation->set_rules('experince_month', 'experince_month', 'trim|required');
                $this->form_validation->set_rules('current_location', 'current_location', 'trim|required');
                $this->form_validation->set_rules('prefred_location', 'prefred_location', 'trim|required');
                $this->form_validation->set_rules('industry', 'industry', 'trim|required');
                $this->form_validation->set_rules('function_area', 'function_area', 'trim|required');
                $this->form_validation->set_rules('role', 'role', 'trim|required');
                $this->form_validation->set_rules('key_skill', 'key_skill', 'trim|required');
                $this->form_validation->set_rules('marital_status', 'marital_status', 'trim|required');
                $this->form_validation->set_rules('resume_headline', 'resume_headline', 'trim|required');
                $this->form_validation->set_rules('city', 'city', 'trim|required');
                $this->form_validation->set_rules('pincode', 'pincode', 'trim|required');
                $this->form_validation->set_rules('state', 'state', 'trim|required');
                $this->form_validation->set_rules('address1', 'address1', 'trim|required');
                //$check1['User'] = $this->User_model->find_by_id($user_id);
                if ($this->form_validation->run() === True) {
                    $check2['User1'] = $this->User_model->Add_detail($user_id, $user_email, $user_mobile);
                    $check3['User2'] = $this->address_model->add_address($user_id);
                    /* } else {
                      $data['user'] = $this->User_model->profile_update($user_id, $user_email, $user_mobile);
                      } */
                }
                redirect('User/Add_profile');
            }
        } else {
            redirect('User/login', 'refresh');
        }
    }

    public function register() {
        $this->load->model('User_model');
        $email = $_REQUEST['email'];
        $password = $_REQUEST['password'];
        $mobile = $_REQUEST['mobile'];

        if($this->User_model->create())
        {
            $output = array('status' => 'success', 'message' => 'Successfully Created');
        }
        else
        {
          $output = array('status' => 'error', 'message' => 'Error');  
        }
        


        header('content-type: application/json');
        
        echo json_encode($output);
    }

}
