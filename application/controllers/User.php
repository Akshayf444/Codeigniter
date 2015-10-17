<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
    }

    public function index() {
        $this->login();
    }

    public function register() {
        $this->form_validation->set_rules('email', 'email', 'trim|required');
        $this->form_validation->set_rules('password', 'password', 'trim|required');
        $this->form_validation->set_rules('mobile', 'mobile', 'trim|required');

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

            if (!empty($check) && $check['type'] == 'User') {

                $this->session->set_userdata("user_id", $check['auth_id']);
                $this->session->set_userdata("user_email", $check['email']);
                $this->session->set_userdata("user_mobile", $check['mobile']);
                $this->session->set_userdata("user_type", $check['type']);
                $check1['User'] = $this->User_model->find_by_id($check['auth_id']);
                //$this->load->view('User/success');
                redirect('User/Add_profile', 'refresh');
            } else {
                $data['user'] = "Incorrect Login";
                $this->load->view('User/login', $data);
            }
        }

        $data = array('title' => 'Login', 'content' => 'User/login');
        $this->load->view('template2', $data);
    }

    public function Add_profile() {
        $this->load->model('Master_model');
        $this->load->model('address_model');
        $user_id = $this->session->userdata("user_id");
        $user_profile = $this->User_model->Show_profile($user_id);

        $user_email = $this->session->userdata("user_email");
        $user_mobile = $this->session->userdata("user_mobile");

        if ($this->is_logged_in() == TRUE) {

            if ($this->input->post()) {
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



            $dropdown['user'] = $user_profile;
            $dropdown['dropdowns'] = isset($user_profile['current_location']) ? $this->Master_model->getLocation($user_profile['current_location']) : $this->Master_model->getLocation();
            $dropdown['industry'] = isset($user_profile['industry']) ? $this->Master_model->getIndustry($user_profile['industry']) : $this->Master_model->getIndustry();
            $dropdown['function'] = isset($user_profile['function_area']) ? $this->Master_model->getFunctionArea($user_profile['function_area']) : $this->Master_model->getFunctionArea();

            
            $data = array('title' => 'Basic Profile', 'content' => 'User/Add_profile', 'view_data' => $dropdown);
            $this->load->view('template1', $data);
        } else {
            redirect('User/login', 'refresh');
        }
    }

    public function logout() {

        $this->session->unset_userdata("user_id");
        $this->session->unset_userdata("user_email");
        $this->session->unset_userdata("user_mobile");
        $this->session->unset_userdata("user_type");
//        $this->session->session_destroy();
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
        $this->load->model('Master_model');
        if ($this->is_logged_in() == TRUE) {
            if ($this->input->post()) {
                $user_id = $this->session->userdata("user_id");
                $user_email = $this->session->userdata("user_email");
                $user_mobile = $this->session->userdata("user_mobile");
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
                $data['user'] = $this->User_model->profile_update($user_id);
                redirect('User/Profile_update', 'refresh');
            }
            $is_logged_in = $this->session->userdata('user_id');
            $show['user'] = $this->User_model->Show_profile($is_logged_in);
            $show['dropdowns'] = $this->Master_model->getLocation();
            $data = array('title' => 'Basic Profile', 'content' => 'User/Profile_update', 'view_data' => $show);
            $this->load->view('template1', $data);
        } else {
            redirect('User/login', 'refresh');
        }
    }

    public function user_qualification() {
        $this->load->model('Master_model');
        if ($this->is_logged_in() == TRUE) {
            if ($this->input->post()) {
                $user_id = $this->session->userdata("user_id");
                $this->form_validation->set_rules('qualification', 'qualification', 'trim|required');
                $this->form_validation->set_rules('specialization', 'specialization', 'trim|required');
                $this->form_validation->set_rules('institute', 'institute', 'trim|required');
                $this->form_validation->set_rules('year', 'year', 'trim|required');


                $qual = $this->User_model->user_qualification_by_id($user_id);

                if ($this->form_validation->run() === True) {
                    if ($qual['auth_id'] !== $user_id) {
                        $add = $this->User_model->user_qualification($user_id);
                    } else {
                        $update = $this->User_model->user_qualification_update($user_id);
                    }
                }
            }
            $is_logged_in = $this->session->userdata('user_id');
            $dropdown['dropdowns'] = $this->Master_model->getQualification();
            $dropdown['institute'] = $this->Master_model->institute();
            $data = array('title' => 'Basic Qualification', 'content' => 'User/user_qualification', 'view_data' => $dropdown);
            $this->load->view('template1', $data);
        } else {
            redirect('User/login', 'refresh');
        }
    }

    public function user_projects() {
        $this->load->model('Master_model');
        $user_id = $this->session->userdata("user_id");
        $qual1 = $this->User_model->project_by_id($user_id);
        if ($this->is_logged_in() == TRUE) {
            if ($this->input->post()) {
                $this->form_validation->set_rules('client', 'client', 'trim|required');
                $this->form_validation->set_rules('projects_title', 'projects_title', 'trim|required');
                $this->form_validation->set_rules('to', 'to', 'trim|required');
                $this->form_validation->set_rules('from', 'from', 'trim|required');
                $this->form_validation->set_rules('location', 'location', 'trim|required');
                $this->form_validation->set_rules('site', 'site', 'trim|required');
                $this->form_validation->set_rules('type', 'type', 'trim|required');
                $this->form_validation->set_rules('detail', 'detail', 'trim|required');
                $this->form_validation->set_rules('role', 'role', 'trim|required');
                $this->form_validation->set_rules('role_description', 'role_description', 'trim|required');
                $this->form_validation->set_rules('team_size', 'team_size', 'trim|required');
                $this->form_validation->set_rules('skill', 'skill', 'required');
                if ($this->form_validation->run() === True) {
                    $this->User_model->project_add($user_id);
                }
            }
            $is_logged_in = $this->session->userdata('user_id');
            $data = array('title' => 'Projects', 'content' => 'User/Add_projects', 'view_data' => 'blank');
            $this->load->view('template1', $data);
        } else {
            redirect('User/login', 'refresh');
        }
    }
    
    public function view()
    {
        if ($this->is_logged_in() == TRUE) {
            if ($this->input->post()) {
                
            }
            $user_id = $this->session->userdata('user_id');
            $view['user']=$this->User_model->view($user_id);
            $data = array('title' => 'Projects', 'content' => 'User/View', 'view_data' => $view);
            $this->load->view('template1', $data);
        } else {
            redirect('User/login', 'refresh');
        }
    }

}
