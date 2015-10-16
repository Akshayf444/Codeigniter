<?php

class Job extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Job_model');
    }

    function Jobs() {
        
    }

    function add() {
        $data['auth_id'] = $this->user_id;
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

}
