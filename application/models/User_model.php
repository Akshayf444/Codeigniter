<?php

class User_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function create() {
        $this->load->helper('url');

        $data2 = array(
            'email' => $this->input->post('email'),
            'mobile' => $this->input->post('mobile'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'type' => "User",
            'password' => md5($this->input->post('password')),
        );


        return $this->db->insert('authentication', $data2);
    }

    public function log($email, $pass) {
        $query = $this->db->get_where('authentication', array('email' => $email, 'password' => $pass,));
        return $query->row_array();
    }

    public function find_by_id($id) {
        if ($id === FALSE) {
            $query = $this->db->get('authentication');
            return $query->result_array();
        }

        $query = $this->db->get_where('authentication', array('auth_id' => $id));
        return $query->row_array();
    }

    public function find_by_user_id($id) {
        if ($id === FALSE) {
            $query = $this->db->get('user');
            return $query->result_array();
        }

        $query = $this->db->get_where('user', array('auth_id' => $id));
        return $query->row_array();
    }

    public function user_qualification_by_id($id) {

        $query = $this->db->get_where('user_qualification', array('auth_id' => $id));
        return $query->row_array();
    }

    public function Add_detail($id, $email, $mobile) {

        $entryExist = $this->Show_profile($id);

        $data = array('name' => $this->input->post('name'),
            'dob' => $this->input->post('dob'),
            'email' => $email,
            'mobile' => $mobile,
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

        if (!empty($entryExist)) {
            $this->db->where(array('auth_id' => $id));
            return $this->db->update('user', $data);
        } else {
            $data['created_at'] = date('Y-m_d H:i:s');
            return $this->db->insert('user', $data);
        }
    }

    public function Show_profile($id) {

        $this->db->select('user.*,address_master.*');
        $this->db->from('user');
        $this->db->join('address_master', 'address_master.auth_id = user.auth_id', 'left');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function Show_profile2($id) {
        $query = $this->db->get_where('address_master', array('auth_id' => $id));
        return $query->row_array();
    }

    public function profile_update($id, $email, $mobile) {

        $data = array('name' => $this->input->post('name'),
            'dob' => $this->input->post('dob'),
            'email' => $email,
            'mobile' => $mobile,
            'auth_id' => $id,
//            'created_at' => date('Y-m_d H:i:s'),
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
        $this->db->where(array('auth_id' => $id));
        return $this->db->update('user', $data);
    }

    public function education_master() {
        $query = $this->db->get('education_master');
        return $query->result();
    }

    public function user_qualification($id) {
        $data = array('qualification' => $this->input->post('qualification'),
            'specialization' => $this->input->post('specialization'),
            'institute' => $this->input->post('institute'),
            'year' => $this->input->post('year'),
            'created' => date('Y-m-d H:i:s'),
            'auth_id' => $id,
        );
        return $this->db->insert('user_qualification', $data);
    }

    public function user_qualification_update($id) {
        $data = array('qualification' => $this->input->post('qualification'),
            'specialization' => $this->input->post('specialization'),
            'institute' => $this->input->post('institute'),
            'year' => $this->input->post('year'),
            'updated_at' => date('Y-m-d H:i:s'),
            'auth_id' => $id,
        );
        $this->db->where(array('auth_id' => $id));
        return $this->db->update('user_qualification', $data);
    }

    public function project_add($id) {
        $data = array(
            'client' => $this->input->post('client'),
            'auth_id' => $id,
            'projects_title' => $this->input->post('projects_title'),
            'to' => $this->input->post('to'),
            'from' => $this->input->post('from'),
            'location' => $this->input->post('location'),
            'site' => $this->input->post('site'),
            'type' => $this->input->post('type'),
            'detail' => $this->input->post('detail'),
            'role' => $this->input->post('role'),
            'role_description' => $this->input->post('role_description'),
            'team_size' => $this->input->post('team_size'),
            'skill' => $this->input->post('skill'),
        );
        return $this->db->insert('user_project', $data);
    }

    public function project_by_id($id) {


        $query = $this->db->get_where('user_project', array('auth_id' => $id));
        return $query->row_array();
    }

    public function project_update($id) {
        $data = array(
            'client' => $this->input->post('client'),
            'projects_title' => $this->input->post('projects_title'),
            'to' => $this->input->post('to'),
            'from' => $this->input->post('from'),
            'location' => $this->input->post('location'),
            'site' => $this->input->post('site'),
            'type' => $this->input->post('type'),
            'detail' => $this->input->post('detail'),
            'role' => $this->input->post('role'),
            'role_description' => $this->input->post('role_description'),
            'team_size' => $this->input->post('team_size'),
            'skill' => $this->input->post('skill'),
        );
        $this->db->where(array('auth_id' => $id));
        return $this->db->update('user_project', $data);
    }

    public function view($id) {
        $query = "SELECT *,(l.location) AS loc,(up.location) AS ploc,(up.role) AS prole  FROM user u
                    LEFT JOIN work_exp we
                    ON u.auth_id=we.auth_id
                    LEFT JOIN `location_master`lm
                    ON lm.loc_id=u.current_location
                    LEFT JOIN user_qualification uq
                    ON uq.auth_id=u.auth_id
                    LEFT JOIN education_master em
                    ON em.edu_id=uq.qualification
                    LEFT JOIN location_master l
                    ON l.loc_id=u.`current_location`
                    LEFT JOIN functional_area fa
                    ON fa.fun_id=u.`function_area`
                    LEFT JOIN industry_master ind
                    ON ind.indus_id=u.`industry`
                    LEFT JOIN address_master am
                    ON am.`auth_id`=u.`auth_id`
                    LEFT JOIN user_project up
                    ON up.`auth_id`=u.`auth_id`
                    WHERE u.auth_id=$id";
        $query = $this->db->query($query);

        return $query->row_array();
    }
    public function view2($id) {
        $query = "SELECT *,(l.location) AS loc,(up.location) AS ploc,(up.role) AS prole  FROM user u
                    LEFT JOIN work_exp we
                    ON u.auth_id=we.auth_id
                    LEFT JOIN `location_master`lm
                    ON lm.loc_id=u.current_location
                    LEFT JOIN user_qualification uq
                    ON uq.auth_id=u.auth_id
                    LEFT JOIN education_master em
                    ON em.edu_id=uq.qualification
                    LEFT JOIN location_master l
                    ON l.loc_id=u.`current_location`
                    LEFT JOIN functional_area fa
                    ON fa.fun_id=u.`function_area`
                    LEFT JOIN industry_master ind
                    ON ind.indus_id=u.`industry`
                    LEFT JOIN address_master am
                    ON am.`auth_id`=u.`auth_id`
                    LEFT JOIN user_project up
                    ON up.`auth_id`=u.`auth_id`
                    WHERE u.auth_id=$id";
        $query = $this->db->query($query);

        return $query->result();
    }

}
