<?php

class Employe extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('employe_model');
        $this->load->library('session');
    }

    public function register() {

        $this->form_validation->set_rules('email', 'email', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');
        $this->form_validation->set_rules('mobile', 'mobile', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->loadFinalView(array('Employe/registration'));
        } else {
            $this->employe_model->create();
            redirect('Employe/login_show', 'refresh');
            // $this->loadFinalView(array('User/login'));
            //redirect('news', 'refresh');
        }
    }

    public function login_show() {


        $this->loadFinalView(array('Employe/login'));
    }

    public function login() {
        $new = $_POST['email'];
        $pass = md5($_POST['password']);
        $check = $this->employe_model->log($new, $pass);
        if (!empty($check) && $check['is_active']==1 && $check['is_verified']==1) {
           // $this->session->set_userdata("user_id",$check['id']);
            $check1['User'] = $this->employe_model->find_by_id($check['id']);
            $this->load->view('User/success');
        } else {
            $this->load->view('User/error');
        }
        
        }
    

//    public function create() {
//        $this->load->helper('form');
//        $this->load->library('form_validation');
//
//        $data['title'] = 'Enter User Detail';
//
//        $this->form_validation->set_rules('email', 'email', 'required');
//        $this->form_validation->set_rules('password', 'password', 'required');
//
//        if ($this->form_validation->run() === FALSE) {
//            $this->load->view('templates/header', $data);
//            $this->load->view('User/create');
//            $this->load->view('templates/footer');
//        } else {
//            $this->user_model->create();
//            $this->load->view('User/success');
//            //redirect('news', 'refresh');
//        }
//    }
}

