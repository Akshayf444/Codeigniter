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
        $this->load->model('User_model');
        $this->load->model('address_model');
        $this->load->model('Master_model');
        if ($this->input->post()) {

            $field_array = array(
                'email' => $this->input->post('email'),
                'password' => md5($this->input->post('password')),
                'mobile' => $this->input->post('mobile'),
                'type' => 'User'
            );

            /////Create New User
            $id = $this->User_model->create($field_array);
            //echo $id;
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
            for ($i = 0; $i < count($this->input->post('qualification')); $i++) {
                ////////Insert education Details
                $education_details = array(
                    'qualification' => $this->input->post('qualification')[$i],
                    'specialization' => $this->input->post('specialization')[$i],
                    'institute' => $this->input->post('institute')[$i],
                    'year' => $this->input->post('year')[$i],
                    'created' => date('Y-m-d H:i:s'),
                    'auth_id' => $id,
                );

                $this->User_model->user_qualification($education_details);
            }
        }
        $dropdown['dropdowns'] = $this->Master_model->getQualification();
        $dropdown['institute'] = $this->Master_model->getInstitute();
        $dropdown['location'] = $this->Master_model->getLocation();
        $data = array('title' => 'Registration', 'content' => 'User/registration', 'view_data' => $dropdown);
        $this->load->view('template2', $data);
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
                redirect('User/view', 'refresh');
            } else {
                $data1['user'] = "Incorrect Login";
                //$this->load->view('User/login', $data);
            }
        }
        $data1['user1'] = "";
        $data = array('title' => 'Login', 'content' => 'User/login', 'view_data' => $data1);
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
                    $data = array(
                        'name' => $this->input->post('name'),
                        'dob' => $this->input->post('dob'),
                        'email' => $user_email,
                        'mobile' => $user_mobile,
                        'auth_id' => $user_id,
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
                    $check2['User1'] = $this->User_model->Add_detail($user_id, $data);
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
                $this->form_validation->set_rules('qualification[]', 'qualification', 'trim|required');
                $this->form_validation->set_rules('specialization[]', 'specialization', 'trim|required');
                $this->form_validation->set_rules('institute[]', 'institute', 'trim|required');
                $this->form_validation->set_rules('year[]', 'year', 'trim|required');


                $qual = $this->User_model->user_qualification_by_id($user_id);

                if ($this->form_validation->run() === True) {
                    for ($i = 0; $i < count($this->input->post('qualification')); $i++) {
                        $data = array(
                            'qualification' => $this->input->post('qualification')[$i],
                            'specialization' => $this->input->post('specialization')[$i],
                            'institute' => $this->input->post('institute')[$i],
                            'year' => $this->input->post('year')[$i],
                            'updated_at' => date('Y-m-d H:i:s'),
                            'created' => date('Y-m-d H:i:s'),
                            'auth_id' => $user_id,
                        );

                        $add = $this->User_model->user_qualification($data);
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

    public function view() {
        if ($this->is_logged_in() == TRUE) {
            if ($this->input->post()) {
                
            }
            $user_id = $this->session->userdata('user_id');
            $view['user'] = $this->User_model->view($user_id);
            $view['user2'] = $this->User_model->view2($user_id);
            $view['user3'] = $this->User_model->qualification_view($user_id);
            $data = array('title' => 'Projects', 'content' => 'User/View', 'view_data' => $view);
            $this->load->view('template1', $data);
        } else {
            redirect('User/login', 'refresh');
        }
    }

    public function other_detail() {
        if ($this->is_logged_in() == TRUE) {
            if ($this->input->post()) {
                
            }

            $data = array('title' => 'Other Detail', 'content' => 'User/other', 'view_data' => 'blank');
            $this->load->view('template1', $data);
        } else {
            redirect('User/login', 'refresh');
        }
    }

    public function resume() {
        if ($this->is_logged_in() == TRUE) {

            $data = array('title' => 'Resume Upload', 'content' => 'User/resume', 'view_data' => 'blank');
            $this->load->view('template1', $data);
        } else {
            redirect('User/login', 'refresh');
        }
    }

    public function resume_add() {
        if ($this->is_logged_in() == TRUE) {
//            if ($this->input->post()) {
            $user_id = $this->session->userdata('user_id');
            $config['upload_path'] = 'C:\wamp\www\jobportal\assets\Resume';
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
            } else {
                $upload_result = $this->upload->data();

                print_r($upload_result['file_name']); //or print any valid
                $this->User_model->resume($upload_result['file_name'], $user_id);
            }


//            $data = array('title' => 'Resume Upload', 'content' => 'User/resume', 'view_data' => 'blank');
//            $this->load->view('template1', $data);
            redirect('User/resume', 'refresh');
        } else {
            redirect('User/login', 'refresh');
        }
    }

    public function edit_project() {
        if ($this->is_logged_in() == TRUE) {

            $id = $_GET['id'];

            if ($this->input->post()) {
                $id = $this->form_validation->set_rules('id', 'id', 'trim|required');
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
                    $this->User_model->project_update2();
                    redirect('User/view', 'refresh');
                    //$this->load->view('User/success');
                }
            }
            $show['sh'] = $this->User_model->project_by_id2($id);
            $data = array('title' => 'Project Edit', 'content' => 'User/edit_project', 'view_data' => $show);
            $this->load->view('template1', $data);
        } else {
            redirect('User/login', 'refresh');
        }
    }

    public function edit_qualification() {
        $this->load->model('Master_model');
        $id = $_GET['id'];

        if ($this->is_logged_in() == TRUE) {
            if ($this->input->post()) {
                $user_id = $this->session->userdata("user_id");
                $this->form_validation->set_rules('qualification[]', 'qualification', 'trim|required');
                $this->form_validation->set_rules('specialization[]', 'specialization', 'trim|required');
                $this->form_validation->set_rules('id', 'id', 'trim|required');
                $this->form_validation->set_rules('institute[]', 'institute', 'trim|required');
                $this->form_validation->set_rules('year[]', 'year', 'trim|required');


                $qual = $this->User_model->user_qualification_by_id($user_id);

                if ($this->form_validation->run() === True) {
                    for ($i = 0; $i < count($this->input->post('qualification')); $i++) {
                        $data = array(
                            'qualification' => $this->input->post('qualification')[$i],
                            'specialization' => $this->input->post('specialization')[$i],
                            'institute' => $this->input->post('institute')[$i],
                            'year' => $this->input->post('year')[$i],
                            'updated_at' => date('Y-m-d H:i:s'),
                            'auth_id' => $user_id,
                        );

                        $add = $this->User_model->user_qualification_update($data, $this->input->post('id'));
                        redirect('User/view', 'refresh');
                    }
                }
            }
            $is_logged_in = $this->session->userdata('user_id');
            $dropdown['sh'] = $this->User_model->qualification_by_id($id);

            $dropdown['dropdowns'] = isset($dropdown['sh']['qualification']) ? $this->Master_model->getQualification($dropdown['sh']['qualification'], $dropdown['sh']['specialization']) : $this->Master_model->getQualification();
            $dropdown['institute'] = isset($dropdown['sh']['institute']) ? $this->Master_model->institute($dropdown['sh']['institute']) : $this->Master_model->institute();


            $data = array('title' => 'Basic Qualification', 'content' => 'User/edit_qualification', 'view_data' => $dropdown);
            $this->load->view('template1', $data);
        } else {
            redirect('User/login', 'refresh');
        }
    }

    public function SearchJob() {
        if ($this->is_logged_in() == TRUE) {
            $this->load->model('Master_model');
            $user_id = $this->session->userdata("user_id");
            if ($this->input->post()) {
                $this->form_validation->set_rules('skill', 'skill', 'trim|required');
                $this->form_validation->set_rules('location', 'location', 'trim|required');
                $this->form_validation->set_rules('experince', 'experince', 'trim|required');
                if ($this->form_validation->run() === True) {
                    
                }
            }
            $data = $this->User_model->find_by_user_id2($user_id);
            $data['job'] = $this->User_model->all_job($data['function_area'], $data['key_skill']);
            $data['dropdowns'] = $this->Master_model->getLocation();


            $data = array('title' => 'Job Search', 'content' => 'User/SearchForm', 'view_data' => $data);
            $this->load->view('template1', $data);
        } else {
            redirect('User/login', 'refresh');
        }
    }

    public function SearchJob2() {

        $this->load->model('Master_model');
        $user_id = $this->session->userdata("user_id");
        if ($this->input->post()) {
//            $this->form_validation->set_rules('skill', 'skill', 'trim|required');
//            $this->form_validation->set_rules('location', 'location', 'trim|required');
//            $this->form_validation->set_rules('experince', 'experince', 'trim|required');
//            if ($this->form_validation->run() === True) {
            //$data['job']=  $this->User_model->search($this->input->post('skill'),$this->input->post('location'),$this->input->post('experince'));

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

            $data['job'] = $this->Job_model->search($conditions);
//                   var_dump($data);
//            }
        }
        //$data = $this->User_model->find_by_user_id2($user_id);
        // $data['job'] = $this->User_model->all_job2();
        $data['dropdowns'] = $this->Master_model->getLocation();

        $data = array('title' => 'Job Search', 'content' => 'User/JobSearch', 'view_data' => $data);
        $this->load->view('template2', $data);
    }

    public function view_search() {
        $id = $_GET['id'];
        $data['view'] = $this->User_model->view_search($id);
        $data = array('title' => 'View Search', 'content' => 'User/viewsearch', 'view_data' => $data);
        $this->load->view('template2', $data);
    }

    public function view_search2() {
        if ($this->is_logged_in() == TRUE) {
            $this->load->model('Master_model');
            $this->load->model('Job_model');
            $is_logged_in = FALSE;
            $is_applied = FALSE;
            $is_applied2 = FALSE;
            $user_id = $this->session->userdata("user_id");
            $id = $_GET['id'];
            $data['view'] = $this->User_model->view_search($id);
            //$data['applied'] = $this->Job_model->apply($id, $user_id);
            $data['show'] = $this->Job_model->applied($id, $user_id);
            if (isset($this->user_id) && $this->user_id > 0 && $this->user_type == 'User') {
                $is_logged_in = TRUE;
                $applied = $this->Job_model->applied($id, $user_id);
                $applied2 = $this->User_model->saved_jobs_by_id($id, $user_id);
                if (!empty($applied)) {
                    $is_applied = TRUE;
                }
                if (!empty($applied2)) {
                    $is_applied2 = TRUE;
                }
            }
            $data['is_applied'] = $is_applied;
            $data['is_applied2'] = $is_applied2;
            $data['is_logged_in'] = $is_logged_in;
            $data = array('title' => 'Job Search', 'content' => 'User/viewsearch2', 'view_data' => $data);
            $this->load->view('template1', $data);
        } else {
            redirect('User/login', 'refresh');
        }
    }

    public function apply() {
        if ($this->is_logged_in() == TRUE) {

            $user_id = $this->session->userdata("user_id");
            $id = $_GET['id'];
            $data['job'] = $this->User_model->apply_id($id, $user_id);
            if (!empty($data['job'])) {
                redirect('User/SearchJob');
            } else {
                $this->User_model->apply($id, $user_id);
                //redirect('User/SearchJob', 'refresh');
                $this->load->view('User/success');
            }
        } else {
            redirect('User/login', 'refresh');
        }
    }

    public function changepassword() {
        if ($this->is_logged_in() == TRUE) {
            $this->load->model('Master_model');
            $user_id = $this->session->userdata("user_id");
            if ($this->input->post()) {
                $this->form_validation->set_rules('password', 'password', 'trim|required');
                if ($this->form_validation->run() === True) {

                    $data = array(
                        'password' => md5($this->input->post('password')),
                    );

                    $add = $this->User_model->changepassword($data, $user_id);
                    redirect('User/changepassword', 'refresh');
                }
            }
            $data = array('title' => 'Job Search', 'content' => 'User/changepassword', 'view_data' => 'blank');
            $this->load->view('template1', $data);
        } else {
            redirect('User/login', 'refresh');
        }
    }

    public function Applicationhistory() {
        if ($this->is_logged_in() == TRUE) {
            $this->load->model('Master_model');
            $user_id = $this->session->userdata("user_id");
            if ($this->input->post()) {
                
            }
            $data['history'] = $this->User_model->application($user_id);
            $data = array('title' => 'Job Search', 'content' => 'User/Applicationhistory', 'view_data' => $data);
            $this->load->view('template1', $data);
        } else {
            redirect('User/login', 'refresh');
        }
    }

    public function saved_jobs($id) {
        if ($this->is_logged_in() == TRUE) {
            $this->load->model('Master_model');
            $user_id = $this->session->userdata("user_id");

            $data['check'] = $this->User_model->saved_jobs_by_id($id, $user_id);
            if (empty($data['check'])) {
                $this->User_model->saved_jobs($id, $user_id);
                $this->load->view('User/Succesfully saved');
            } else {
                $this->load->view('User/Already Saved');
            }
        } else {
            redirect('User/login', 'refresh');
        }
    }

    public function viewsavedjobs() {
        if ($this->is_logged_in() == TRUE) {
            $this->load->model('Master_model');
            $user_id = $this->session->userdata("user_id");
            if ($this->input->post()) {
                
            }
            $data['history'] = $this->User_model->viewsavedjobs($user_id);
            $data = array('title' => 'Job Search', 'content' => 'User/savedjobs', 'view_data' => $data);
            $this->load->view('template1', $data);
        } else {
            redirect('User/login', 'refresh');
        }
    }

}
