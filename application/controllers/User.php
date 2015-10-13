<?php

class User extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->library('session');
    }

    public function register() {

        $this->form_validation->set_rules('email', 'email', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');
        $this->form_validation->set_rules('mobile', 'mobile', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->loadFinalView(array('User/registration'));
        } else {
            $this->User_model->create();
            redirect('User/login_show', 'refresh');
            // $this->loadFinalView(array('User/login'));
            //redirect('news', 'refresh');
        }
    }

    public function login_show() {


        $this->loadFinalView(array('User/login'));
    }

    public function login() {
        $this->load->helper('url');
        $new = $_POST['email'];
        $pass = md5($_POST['password']);
        $check = $this->User_model->log($new, $pass);
         //&& $check['is_active']==1 && $check['is_verified']==1
        if (!empty($check)) {
          $this->session->set_userdata("user_id",$check['auth_id']);
          $this->session->set_userdata("user_email",$check['email']);
            $check1['User'] = $this->User_model->find_by_id($check['auth_id']);
            //$this->load->view('User/success');
            redirect('User/view', 'refresh');
        } else {
            $this->load->view('User/error');
        }
        
        }
        
        public function view()
    {
        $this->load->helper('url');
        $user_id=$this->session->userdata("user_id");
        $user_email=$this->session->userdata("user_email");
        $check1['User'] = $this->User_model->find_by_id($user_id);
        $this->load->view('header');
            $this->load->view('User/View', $check1);
            $this->load->view('footer');
    }
        
        public function logout() {
        $this->load->helper('url');
    

//        $data['title'] = 'Update a news item';
        
            $this->session->unset_userdata("user_id");
            $this->session->unset_userdata("user_email");
          
            redirect('User/login_show', 'refresh');

        
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
