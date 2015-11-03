<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Api extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
    }

    public function login() {
        $this->load->model('User_model');
        $email = $_GET['email'];
        $password = md5($_GET['password']);
        $content = array();
        $check = $this->User_model->log($email, $password);


        if (!empty($check) && $check['type'] == 'User') {
            //$content[] = $check;
            $view['user3'] = array_shift($this->User_model->qualification_view($check['auth_id']));
            $view['profile'] = $this->User_model->view($check['auth_id']);
            $content[] = array(
                'email' => $view['profile']['email'],
                'name' => $view['profile']['name'],
                'user_id' => $view['profile']['user_id'],
                'mobile' => $view['profile']['mobile'],
                'location' => $view['profile']['loc'],
                'key skill' => $view['profile']['key_skill'],
                'experince_month' => $view['profile']['experince_month'],
                'experince_year' => $view['profile']['exp_year'],
                'qualification' => $view['user3']->qualification,
                'specialization' => $view['user3']->specialization,
                'institute' => $view['user3']->institute,
                'year' => $view['user3']->year,
                'auth_id' => $view['user3']->auth_id,
            );
            $output = array('status' => 'success', 'message' => $content);
        } else {
            $output = array('status' => 'Error', 'message' => 'Error');
        }


        header('content-type: application/json');
        echo json_encode($output);
    }

    public function register() {
        $this->load->model('User_model');
        $this->load->model('address_model');

        if ($this->input->post()) {

            $field_array = array(
                'email' => $this->input->post('email'),
                'password' => md5($this->input->post('password')),
                'mobile' => $this->input->post('mobile'),
                'created_at' => date('Y-m-d H:i:s'),
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
            $this->User_model->Add_detail($id, $data);

            ////////Insert education Details
            $qualification = $this->input->post("qualification");
            $specialization = $this->input->post("specialization");
            $institute = $this->input->post("institute");
            $year = $this->input->post("year");

            for ($i = 0; $i < count($this->input->post('qualification')); $i++) {
                $education_details = array(
                    'qualification' => $qualification[$i],
                    'specialization' => $specialization[$i],
                    'institute' => $institute[$i],
                    'year' => $year[$i],
                    'created' => date('Y-m-d H:i:s'),
                    'auth_id' => $id
                );

                $this->User_model->user_qualification($education_details);
            }

            $output = array('status' => 'success', 'message' => $id);
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
        if (!empty($locations)) {
            foreach ($locations as $loc) {
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

    public function changepassword() {
        $this->load->model('User_model');
        $this->load->model('address_model');
        $auth_id = $_GET['auth_id'];
        $password = md5($_GET['password']);
        $old_password = md5($_GET['old_password']);
        $check = $this->User_model->find_by_id($auth_id);
//        $field_array=array();
        $field_array = array(
            'password' => $password,
        );
        if ($check['password'] == $old_password) {
            if (!empty($field_array)) {
                $id = $this->User_model->changepassword($field_array, $auth_id);
                $output = array('status' => 'success', 'message' => 'successfully changed');
            } else {
                $output = array('status' => 'error', 'message' => 'Enter Password');
            }
        } else {
            $output = array('status' => 'error', 'message' => 'Details Not Found');
        }

        header('content-type: application/json');
        echo json_encode($output);
    }

    public function resume_add() {
//            if ($this->input->post()) {
        $user_id = $_REQUEST['id'];
        $detail = $_REQUEST['detail'];

        $config['upload_path'] = asset_url() . 'Resume';
        $config['allowed_types'] = 'pdf|doc|docx';
        $config['max_size'] = '4096';
        $new_name = time();
        $config['file_name'] = $new_name;
        $this->load->library('upload', $config);
        $this->upload->display_errors('', '');
        $this->form_validation->set_rules('detail', 'client', 'trim|required');
        if (!$this->upload->do_upload("resume")) {
            echo $this->upload->display_errors();
            die();
            $this->data['error'] = array('error' => $this->upload->display_errors());
            $output = array('status' => 'error', 'message' => 'Details Not Found');
        } else {
            $upload_result = $this->upload->data();

            print_r($upload_result['file_name']); //or print any valid
            $this->User_model->resume($upload_result['file_name'], $user_id, $detail);
            $output = array('status' => 'success', 'message' => 'Resume successfully added');
        }


//            $data = array('title' => 'Resume Upload', 'content' => 'User/resume', 'view_data' => 'blank');
//            $this->load->view('template1', $data);
        header('content-type: application/json');
        echo json_encode($output);
    }

    public function view() {


        $user_id = $_REQUEST['id'];
        $content = array();
        $view['profile'] = $this->User_model->view($user_id);

        $view['user3'] = array_shift($this->User_model->qualification_view($user_id));

        $content[] = array(
            'email' => $view['profile']['email'],
            'name' => $view['profile']['name'],
            'user_id' => $view['profile']['user_id'],
            'mobile' => $view['profile']['mobile'],
            'location' => $view['profile']['loc'],
            'experince_month' => $view['profile']['experince_month'],
            'experince_year' => $view['profile']['exp_year'],
            'qualification' => $view['user3']->qualification,
            'specialization' => $view['user3']->specialization,
            'institute' => $view['user3']->institute,
            'year' => $view['user3']->year,
            'auth_id' => $view['user3']->auth_id,
        );
        if (!empty($view)) {
            //$output = array('status' => 'Success', 'message' => array('profile'=>$view['profile'],'Education'=>$view['user3']));
            $output = array('status' => 'Success', 'message' => $content);
        } else {
            $output = array('status' => 'error', 'message' => 'Details Not Found');
        }

        header('content-type: application/json');
        echo json_encode($output);
    }

    public function show_skill() {
        //.$skill = $_REQUEST['skill'];
        $user_id = $_REQUEST['id'];
        $find = $this->User_model->find_by_user_id($user_id);
        $content = array();
        $content[] = array(
            'key skill' => $find['key_skill']
        );
        $output = array('status' => 'success', 'message' => $content);
        header('content-type: application/json');
        echo json_encode($output);
    }

    public function edit_skill() {
        $skill = $_REQUEST['skill'];
        $user_id = $_REQUEST['id'];
        $data = array('key_skill' => $skill);
        $find = $this->User_model->Add_skill($data, $user_id);

        $output = array('status' => 'success', 'message' => 'updated Successfully');
        header('content-type: application/json');
        echo json_encode($output);
    }

}
