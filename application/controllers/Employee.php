<?php

class Employee extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('employee_model');
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
        }
    }

    public function login_show() {


        $this->loadFinalView(array('Employee/login'));
    }

    public function login() {
<<<<<<< HEAD
        if ($this->input->post()) {
            $new = $_POST['email'];
            $pass = md5($_POST['password']);
            $check = $this->employee_model->log($new, $pass);
            if (!empty($check && $check['type'] == 'employe')) {
                $this->session->set_userdata("user_id", $check['auth_id']);
                $this->session->set_userdata("user_email", $check['email']);
                $this->session->set_userdata("user_mobile", $check['mobile']);
                $check1['User'] = $this->employee_model->find_by_id($check['auth_id']);
                //$this->load->view('Employe/view');
                redirect('Employee/add_details', 'refresh');
            } else {
                $this->load->view('employee/error');
            }
        }
        $data = array('title' => 'Login', 'content' => 'employee/login');
        $this->load->view('template2', $data);
=======
        $new = $_POST['email'];
        $pass = md5($_POST['password']);
        $check = $this->employee_model->log($new, $pass);
        if (!empty($check)) {
            $this->session->set_userdata("user_id", $check['auth_id']);
            $this->session->set_userdata("user_email", $check['email']);
            $this->session->set_userdata("user_mobile", $check['mobile']);
            $check1['User'] = $this->employee_model->find_by_id($check['auth_id']);
            //$this->load->view('Employe/view');
            redirect('Employee/view', 'refresh');
        } else {
            $this->load->view('Employee/error');
        }
>>>>>>> 052e2361a1fba442efac6028855bce8bdbfd311b
    }

    public function logout() {
        $this->load->helper('url');


//        $data['title'] = 'Update a news item';

        $this->session->unset_userdata("user_id");
        $this->session->unset_userdata("user_email");
        $this->session->unset_userdata("user_mobile");
        redirect('Employee/login_show', 'refresh');
    }

    public function view() {
        $this->load->helper('url');
        $user_id = $this->session->userdata("user_id");
        $user_email = $this->session->userdata("user_email");
        $check1['User'] = $this->employee_model->find_by_id($user_id);
        $this->load->view('header');
        $this->load->view('Employee/View', $check1);
        $this->load->view('footer');
<<<<<<< HEAD
    }

    public function is_logged_in() {
        $is_logged_in = $this->session->userdata('user_id');
        if (isset($is_logged_in) && $is_logged_in != '') {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function add_details() {
        if ($this->is_logged_in() == TRUE) {
            $user_id = $this->session->userdata("user_id");
            $user_email = $this->session->userdata("mobile");
            $user_mobile = $this->session->userdata("user_email");
            if ($this->input->post()) {
                $this->form_validation->set_rules('name', 'name', 'required');
                $this->form_validation->set_rules('type', 'type', 'required');
                $this->form_validation->set_rules('industry_type', 'industry_type', 'required');
                $this->form_validation->set_rules('address_id', 'address_id', 'required');
                $this->form_validation->set_rules('industry_type', 'industry_type', 'required');

                if ($this->form_validation->run() === True) {
                    $check2['User1'] = $this->employee_model->add_details($user_id);
                }
//                $this->load->view('empolyee/success');
            }

            $userData['user_id'] = $user_id;
            $data = array('title' => 'Basic Employee Profile', 'content' => 'employee/add_details', 'view_data' => $userData);
            $this->load->view('template1', $data);
        } else {
            redirect('employee/login', 'refresh');
        }
    }

    public function view_data($user_id) {
        $user_id = $this->session->userdata("user_id");

        $this->load->model('employee');
        $data['user'] = $this->employee_model->find_id($user_id);
        $data1 = array('title' => 'Login', 'content' => 'employee/login', 'view_data' => $data);
        $this->load->view('template1', $data1);
    }

}

//   
//
//    

=======
    }

}
>>>>>>> 052e2361a1fba442efac6028855bce8bdbfd311b
