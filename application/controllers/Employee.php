<?php

class Employee extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('employee_model');
        $this->load->library('session');
    }

    public function register() {

        $this->form_validation->set_rules('email', 'email', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');
        $this->form_validation->set_rules('mobile', 'mobile', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->loadFinalView(array('Employee/registration'));
        } else {
            $this->employee_model->create();
            redirect('Employee/login_show', 'refresh');
            // $this->loadFinalView(array('User/login'));
            //redirect('news', 'refresh');
        }
    }

    public function login_show() {


        $this->loadFinalView(array('Employee/login'));
    }

    public function login() {
        $new = $_POST['email'];
        $pass = md5($_POST['password']);
        $check = $this->employee_model->log($new, $pass);
        if (!empty($check) ) {
            $this->session->set_userdata("user_id",$check['auth_id']);
            $this->session->set_userdata("user_email",$check['email']);
            $this->session->set_userdata("user_mobile",$check['mobile']);
            $check1['User'] = $this->employee_model->find_by_id($check['auth_id']);
           //$this->load->view('Employe/view');
            redirect('Employee/view', 'refresh');
        } else {
            $this->load->view('Employee/error');
        }
        
        }
      public function logout() {
        $this->load->helper('url');
    

//        $data['title'] = 'Update a news item';
        
            $this->session->unset_userdata("user_id");
            $this->session->unset_userdata("user_email");
            $this->session->unset_userdata("user_mobile");
            redirect('Employee/login_show', 'refresh');

        
    }
    public function view()
    {
        $this->load->helper('url');
        $user_id=$this->session->userdata("user_id");
        $user_email=$this->session->userdata("user_email");
        $check1['User'] = $this->employee_model->find_by_id($user_id);
        $this->load->view('header');
            $this->load->view('Employee/View', $check1);
            $this->load->view('footer');
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

