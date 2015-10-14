<?php

class User extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
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

    public function login() {

        if ($this->input->post()) {

            $new = $_POST['email'];
            $pass = md5($_POST['password']);
            $check = $this->User_model->log($new, $pass);

            if (!empty($check)) {
                $this->session->set_userdata("user_id", $check['auth_id']);
                $this->session->set_userdata("user_email", $check['email']);
                $this->session->set_userdata("user_mobile", $check['mobile']);
                $check1['User'] = $this->User_model->find_by_id($check['auth_id']);
                //$this->load->view('User/success');
                redirect('User/Add_profile', 'refresh');
            } else {
                $this->load->view('User/error');
            }
        }

        $data = array('title' => 'Login', 'content' => 'User/login');
        $this->load->view('template2', $data);
    }

    public function Add_profile() {

        if ($this->is_logged_in() == TRUE) {

            if ($this->input->post()) {
                $user_id = $this->session->userdata("user_id");
                $user_email = $this->session->userdata("user_email");
                $user_mobile = $this->session->userdata("user_mobile");
                $this->form_validation->set_rules('name', 'name', 'required');
                $this->form_validation->set_rules('dob', 'dob', 'required');
                $this->form_validation->set_rules('sex', 'sex', 'required');
                $this->form_validation->set_rules('experince_year', 'experince_year', 'required');
                $this->form_validation->set_rules('experince_month', 'experince_month', 'required');
                $this->form_validation->set_rules('current_location', 'current_location', 'required');
                $this->form_validation->set_rules('prefred_location', 'prefred_location', 'required');
                $this->form_validation->set_rules('industry', 'industry', 'required');
                $this->form_validation->set_rules('function_area', 'function_area', 'required');
                $this->form_validation->set_rules('role', 'role', 'required');
                $this->form_validation->set_rules('key_skill', 'key_skill', 'required');
                $this->form_validation->set_rules('marital_status', 'marital_status', 'required');
                $this->form_validation->set_rules('resume_headline', 'resume_headline', 'required');
                //$check1['User'] = $this->User_model->find_by_id($user_id);
                if ($this->form_validation->run() === True) {
                    $check2['User1'] = $this->User_model->Add_detail($user_id, $user_email, $user_mobile);
                }
                $this->load->view('User/success');
            }
            $data = array('title' => 'Basic Profile', 'content' => 'User/Add_profile', 'view_data' => 'blank');
            $this->load->view('template1', $data);
        } else {
            redirect('User/login', 'refresh');
        }
    }

    public function logout() {

        $this->session->unset_userdata("user_id");
        $this->session->unset_userdata("user_email");
        $this->session->unset_userdata("user_mobile");
        $this->session->session_destroy();
        redirect('User/login', 'refresh');
    }

    public function is_logged_in() {
        $is_logged_in = $this->session->userdata('user_id');
        if (isset($is_logged_in) && $is_logged_in != '') {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function profile_update() {
        if ($this->is_logged_in() == TRUE) {

            if ($this->input->post()) {
                
            }
            $is_logged_in = $this->session->userdata('user_id');
            $show = $this->user_modal->Show_profile($is_logged_in);
            $data = array('title' => 'Basic Profile', 'content' => 'User/Add_profile', $show);
            $this->load->view('template1', $data);
        } else {
            redirect('User/login', 'refresh');
        }
    }

}
