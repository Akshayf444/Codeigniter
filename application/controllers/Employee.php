<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Employee extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('employee_model');
        $this->load->model('User_model');
        $this->load->helper('file');
        $this->load->helper('download');
    }

    public function register() {
        $this->form_validation->set_rules('email', 'email', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');
        $this->form_validation->set_rules('mobile', 'mobile', 'required');

        if ($this->form_validation->run() === FALSE) {
            //$this->load->view('Employee/registration');
        } else {
            $check1 = $this->User_model->find_by_email($this->input->post('email'), $this->input->post('mobile'));
            if (empty($check1)) {
                $this->employee_model->create();
                //redirect('Employee/login', 'refresh');
                $check['error'] = "Registered Successfully";
            } else {
                $check['Error'] = 'Already Registered';
            }
        }

        $check['error1'] = "";
        $data = array('title' => 'Login', 'content' => 'employee/registration', 'view_data' => $check);
        $this->load->view('frontTemplate4', $data);
    }

    public function login() {

        if ($this->input->post()) {
            $new = $_POST['email'];
            $pass = md5($_POST['password']);
            $check = $this->employee_model->log($new, $pass);
            if (!empty($check) && $check['type'] == 'Employee') {
                $this->session->set_userdata("user_id", $check['auth_id']);
                $this->session->set_userdata("user_email", $check['email']);
                $this->session->set_userdata("user_mobile", $check['mobile']);
                $this->session->set_userdata("user_type", $check['type']);
                $check1['User'] = $this->employee_model->find_by_id($check['auth_id']);
                //$this->load->view('Employe/view');
                redirect('Employee/add_details', 'refresh');
            } else {
                $data1['user'] = "Incorrect Login";
                // $this->load->view('employee/error');
            }
        }
        $data1['user2'] = "";
        $data = array('title' => 'Login', 'content' => 'employee/login', 'view_data' => $data1);
        $this->load->view('frontTemplate', $data);
//         
    }

    public function logout() {
        $this->session->unset_userdata("user_id");
        $this->session->unset_userdata("user_email");
        $this->session->unset_userdata("user_mobile");
        $this->session->unset_userdata("user_type");
        redirect('Employee/login', 'refresh');
    }

    public function is_logged_in() {
        //$is_logged_in = $this->session->userdata('user_id');
        if (isset($this->user_id) && $this->user_id != '') {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function add_details() {
        if ($this->is_logged_in() == TRUE) {
            $user_id = $this->session->userdata("user_id");
            $this->load->model('Master_model');

            if ($this->input->post()) {
                $this->form_validation->set_rules('name', 'name', 'required');
                $this->form_validation->set_rules('type', 'type', 'required');
                $this->form_validation->set_rules('industry_type', 'industry_type', 'required');
                $this->form_validation->set_rules('address1', 'address1', 'required');
                $this->form_validation->set_rules('state', 'state', 'required');
                $this->form_validation->set_rules('city', 'city', 'required');
                $this->form_validation->set_rules('pincode', 'pincode', 'required');
                $this->form_validation->set_rules('designation', 'designation', 'required');

                if ($this->form_validation->run() === True) {
                    $this->employee_model->add_details($user_id);
                    $this->load->model('address_model');
                    $this->address_model->add_address($user_id);
                }
//                $this->load->view('empolyee/success');
            }
            $details = $this->employee_model->find_id($user_id);
            $userData['user'] = $details;
            $userData['industry'] = isset($details['industry_type']) ? $this->Master_model->getIndustry($details['industry_type']) : $this->Master_model->getIndustry();
            $userData['user_id'] = $user_id;
            $data = array('title' => 'Basic Employee Profile', 'content' => 'employee/add_details', 'view_data' => $userData);
            $this->load->view('template1', $data);
        } else {
            redirect('employee/login', 'refresh');
        }
    }

    public function add_pincode() {
        if (isset($_GET['pincode'])) {
            $pin = $_GET['pincode'];
            $state = file_get_contents("http://chemistconnect.co/ccwebservice.asmx/GetPincodeData?pincode={$pin}");

            echo $state;
        }
    }

    public function profile() {

        $user_id = $this->session->userdata("user_id");
        //$userData['user2'] = $this->session->userdata("mobile");
        $userData['user'] = $this->employee_model->profile($user_id);
        $data = array('title' => 'Basic Employee Profile', 'content' => 'employee/view', 'view_data' => $userData);
        $this->load->view('template1', $data);
    }

    public function Applied() {
        if ($this->is_logged_in() == TRUE) {
            $this->load->model('Master_model');
            $user_id = $this->session->userdata("user_id");
            if ($this->input->post()) {
                
            }

            $data = array('title' => 'Job Search', 'content' => 'employee/applied', 'view_data' => 'blank');
            $this->load->view('template1', $data);
        } else {
            redirect('Employee/login', 'refresh');
        }
    }

    public function User_view() {
        if ($this->is_logged_in() == TRUE) {
            $this->load->model('Master_model');
            $this->load->model('User_model');
            $this->load->model('Job_model');
            $id = $_GET['id'];
            $view['user'] = $this->Job_model->user_applied($id);
            $view['user2'] = $this->User_model->view2($id);
            $view['user3'] = $this->User_model->qualification_view($id);
            $view['user4'] = $this->User_model->user_resume($id);
            $view['user5'] = "Detail not found";
//            var_dump($view);
//          $view['string'] = read_file('../../Resume/'.$view['user4']);
            $user_id = $this->session->userdata("user_id");
            $data_new = array(
                'visitor_id' => $user_id,
                'jobseeker_id' => $id,
                'visited_at' => date('Y-m-d H:i:s'),
            );
            $check = $this->employee_model->vefication_check($id, $user_id);
            if (empty($check)) {
                $insert = $this->employee_model->email_verification($data_new);
            } else {
                
            }
            $data = array('title' => 'User View', 'content' => 'employee/user_view', 'view_data' => $view);
            $this->load->view('template1', $data);
        } else {
            redirect('Employee/login', 'refresh');
        }
    }

    public function download() {
        if ($this->is_logged_in() == TRUE) {
            $this->load->model('Master_model');
            $this->load->model('User_model');
            $this->load->model('Job_model');
            $id = $_GET['id'];
            $data = file_get_contents(base_url() . "assets/Resume/$id"); // Read the file's contents
            $name = $id;
            echo $name;
            force_download($name, $data);
            $this->load->view('donload complete');
        } else {
            redirect('Employee/login', 'refresh');
        }
    }

    public function resumesearch() {
        if ($this->is_logged_in() == TRUE) {
            $this->load->model('Master_model');
            $this->load->model('User_model');
            $this->load->model('Job_model');

            $data['dropdowns'] = $this->Master_model->getLocation();
            $data = array('title' => 'User View', 'content' => 'employee/SearchResume', 'view_data' => $data);
            $this->load->view('template1', $data);
        } else {
            redirect('Employee/login', 'refresh');
        }
    }

    public function resumesearchview() {
        if ($this->is_logged_in() == TRUE) {
            $this->load->model('Master_model');
            $this->load->model('Job_model');
            $user_id = $this->session->userdata("user_id");
            if ($this->input->post()) {
                $this->form_validation->set_rules('location', 'location', 'required');
                $this->form_validation->set_rules('skill', 'skill', 'required');
                $check['view'] = $this->Job_model->resume_search_view($this->input->post('location'), $this->input->post('skill'));
            }

            $data = array('title' => 'Job Search', 'content' => 'employee/Resume_Search_View', 'view_data' => $check);
            $this->load->view('template1', $data);
        } else {
            redirect('Employee/login', 'refresh');
        }
    }

    public function changepassword() {
        if ($this->is_logged_in() == TRUE) {
            $this->load->model('Master_model');
            $this->load->model('User_model');
            $user_id = $this->session->userdata("user_id");
            if ($this->input->post()) {
                $this->form_validation->set_rules('old_password', 'password', 'trim|required');
                $this->form_validation->set_rules('password', 'password', 'trim|required');
                $check = $this->User_model->find_by_id($user_id);
                if ($this->form_validation->run() === True) {

                    $data = array(
                        'password' => md5($this->input->post('password')),
                    );

                    if ($check['password'] == md5($this->input->post('old_password'))) {
                        $add = $this->User_model->changepassword($data, $user_id);
                        redirect('Employee/changepassword', 'refresh');
                    } else {
                        $er['error'] = "Wrong Previous Password";
                    }
                }
            }
            $er['errrrr'] = "";
            $data = array('title' => 'Job Search', 'content' => 'Employee/changepassword', 'view_data' => $er);
            $this->load->view('template1', $data);
        } else {
            redirect('User/login', 'refresh');
        }
    }

}
