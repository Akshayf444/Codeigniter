<?php

class Job extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Job_model');
    }

    function Jobs() {
        
    }

    function add() {
        //var_dump($this->user_id);
        if (isset($this->user_id) && $this->user_id != '' && $this->user_type == 'Employee') {
            if ($this->input->post()) {
                $this->form_validation->set_rules('title', 'title', 'required');
                $this->form_validation->set_rules('description', 'description', 'required');
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
            }

            $data['auth_id'] = $this->user_id;
            $data = array('title' => 'Add Job', 'content' => 'job/add', 'view_data' => $data);
            $this->load->view('template1', $data);
        }  else {
            redirect('Employee/logout','refresh');
        }
    }

}
