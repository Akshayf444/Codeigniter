<?php

class Job extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Job_model');
    }

    function Jobs() {
        
    }

    function index() {
        $this->Search();
    }

    function add() {
        $data['auth_id'] = $this->session->userdata("user_id");
        if (isset($this->user_id) && $this->user_id != '' && $this->user_type == 'Employee') {
            if ($this->input->post()) {
                $this->form_validation->set_rules('title', 'title', 'trim|required');
                $this->form_validation->set_rules('description', 'description', 'trim|required');
                $this->form_validation->set_rules('keyword', 'keyword', 'trim|required');
                $this->form_validation->set_rules('exp_min', 'Minimum Experience', 'trim|required');
                $this->form_validation->set_rules('exp_max', 'Maximum Experience', 'trim|required');
                $this->form_validation->set_rules('ctc_min', 'CTC', 'trim|required');
                $this->form_validation->set_rules('location', 'Location', 'trim|required');
                $this->form_validation->set_rules('functional_area', 'Functional Area', 'trim|required');
                $this->form_validation->set_rules('industry', 'Industry', 'trim|required');

                if ($this->form_validation->run() == TRUE) {
                    $this->Job_model->add();
                }
            }

            $this->load->model('Master_model');
            $data['location'] = $this->Master_model->getLocation();
            $data['experience'] = $this->Master_model->getWorkExperience();
            $data['industry'] = $this->Master_model->getIndustry();
            $data['functional_area'] = $this->Master_model->getFunctionArea();

            $data = array('title' => 'Add Job', 'content' => 'job/add', 'view_data' => $data);
            $this->load->view('template1', $data);
        } else {
            redirect('Employee/logout', 'refresh');
        }
    }

    public function Job_list() {

        $user_id = $this->session->userdata("user_id");

        $userdata['users'] = $this->Job_model->job_list($user_id);

        $data = array('title' => 'List Of Jobs ', 'content' => 'job/job_list', 'view_data' => $userdata);
        $this->load->view('template1', $data);
    }

    public function view($id) {
//        $user_id = $this->session->userdata("user_id");
        $userData['user'] = $this->Job_model->view_job($id);
        $data = array('title' => 'Basic Employee Profile', 'content' => 'job/view', 'view_data' => $userData);
        $this->load->view('template1', $data);
    }

    public function edit($id) {
        $this->form_validation->set_rules('title', 'title', 'trim|required');
        $this->form_validation->set_rules('description', 'description', 'trim|required');
        $this->form_validation->set_rules('keyword', 'keyword', 'trim|required');
        $this->form_validation->set_rules('exp_min', 'Minimum Experience', 'trim|required');
        $this->form_validation->set_rules('exp_max', 'Maximum Experience', 'trim|required');
        $this->form_validation->set_rules('ctc_min', 'CTC', 'trim|required');
        $this->form_validation->set_rules('location', 'Location', 'trim|required');
        $this->form_validation->set_rules('functional_area', 'Functional Area', 'trim|required');
        $this->form_validation->set_rules('industry', 'Industry', 'trim|required');
        if ($this->form_validation->run() == TRUE) {
            $this->Job_model->update_job($id);
        }
        $result = $this->Job_model->view_job($id);
        $data['user'] = $result;
        $this->load->model('Master_model');
        $data['industry'] = $this->Master_model->getFunctionArea($result['industry']);
        $data['location'] = $this->Master_model->getLocation($result['location']);
        $data['experience'] = $this->Master_model->getWorkExperience($result['exp_min']);
        $data['experience1'] = $this->Master_model->getWorkExperience($result['exp_max']);
        $data['functional_area'] = $this->Master_model->getFunctionArea($result['functional_area']);
        $userdata = array('title' => ' update Job', 'content' => 'job/edit', 'view_data' => $data);
        $this->load->view('template1', $userdata);
    }

    public function Search() {
        $this->load->model('Master_model');
        $search = array();
        $user_id = $this->session->userdata("user_id");
        if ($this->input->post()) {
            $conditions = array();
            if ($this->input->post('skill') != '') {
                $skill = $this->input->post('skill');
                $conditions[] = "j.`keyword` LIKE '$skill%'";
            }
            if ($this->input->post('location') != '') {
                $location = $this->input->post('location');
                $conditions[] = "j.`location` ='$location'";
            }
            if ($this->input->post('experince') != '') {
                $experince = $this->input->post('experince');
                $conditions[] = "j.exp_max =$experince ";
            }

            $search['job'] = $this->Job_model->search($conditions);
        }

        $data = array('title' => 'Search Job', 'content' => 'job/index', 'view_data' => $search, 'frontImage' => 'search.jpg', 'searchBar' => TRUE, 'dropdowns' => $this->Master_model->getLocation());
        $this->load->view('template2', $data);
    }

}
