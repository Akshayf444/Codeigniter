<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Api extends CI_Controller {

    public function __construct() {
        parent::__construct();
        
    }
    public function login()
    {
        $this->load->model('User_model');
        $email=$_GET['email'];
        $password=md5($_GET['password']);
        $check = $this->User_model->log($email, $password);

            if (!empty($check) && $check['type'] == 'User') {

                $this->session->set_userdata("user_id", $check['auth_id']);
                $this->session->set_userdata("user_email", $check['email']);
                $this->session->set_userdata("user_mobile", $check['mobile']);
                $this->session->set_userdata("user_type", $check['type']);
                $check1= $this->User_model->find_by_id($check['auth_id']);
                
               
            }
        $output = array('status' => 'success', 'message' => $check1);
        header('content-type: application/json');
        echo json_encode($output);
        
    }
}