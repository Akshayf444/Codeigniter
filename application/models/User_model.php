<?php

class User_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function create($data) {
        $this->db->insert('authentication', $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
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

    public function find_by_user_id2($id) {

        $query = "SELECT *FROM user u
                    WHERE u.auth_id=$id";
        $query = $this->db->query($query);

        return $query->row_array();
    }

    public function user_qualification_by_id($id) {

        $query = $this->db->get_where('user_qualification', array('auth_id' => $id));
        return $query->row_array();
    }

    public function Add_detail($id, $data) {
        $entryExist = $this->Show_profile($id);

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
        $this->db->where('user.auth_id', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function Show_profile2($id) {
        $query = $this->db->get_where('address_master', array('auth_id' => $id));
        return $query->row_array();
    }

    public function education_master() {
        $query = $this->db->get('education_master');
        return $query->result();
    }

    public function user_qualification($data) {
        return $this->db->insert('user_qualification', $data);
    }

    public function user_qualification_update($id) {
        $data = array(
            'qualification' => $this->input->post('qualification'),
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
        $query = "SELECT * FROM user_project
                   WHERE auth_id=$id";
        $query = $this->db->query($query);

        return $query->result();
    }

    public function qualification_view($id) {
        $query = "SELECT *,(uq.id) AS idd FROM user u
                    LEFT JOIN `user_qualification` uq
                    ON uq.`auth_id`=u.`auth_id`
                    LEFT JOIN `specialization_master` sp
                    ON sp.spec_id=uq.`specialization`
                    LEFT JOIN `institute_master`ins
                    ON ins.id=uq.`institute`
                    LEFT JOIN `education_master` edu 
                    ON edu.`edu_id`=uq.`qualification`
                    WHERE u.auth_id=$id";
        $query = $this->db->query($query);

        return $query->result();
    }

    public function resume($name, $id) {
        $data = array(
            'resume' => $name,
            'detail' => $this->input->post('detail'),
            'created' => date('Y-m-d H:i:s'),
            'auth_id' => $id,
        );
        return $query = $this->db->insert('user_resume', $data);
    }

    public function resume_view($id) {
        $query = "SELECT * FROM user_resume 
                    WHERE auth_id=$id
                    ORDER BY auth_id DESC LIMIT 1
                    ";
        $query = $this->db->query($query);

        return $query->result();
    }

    public function project_by_id2($id) {
        $query = $this->db->get_where('user_project', array('id' => $id));
        return $query->row_array();
    }

    public function qualification_by_id($id) {
        $query = $this->db->get_where('user_qualification', array('id' => $id));
        return $query->row_array();
    }

    public function project_update2() {
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

        $this->db->where(array('id' => $this->input->post('id')));
        return $this->db->update('user_project', $data);
    }

    public function update_qualification($data, $id) {
        $this->db->where(array('id' => $id));
        return $this->db->update('user_qualification', $data);
    }

    public function all_job($id, $skill) {
        $query = "SELECT *FROM jobs j
                LEFT JOIN emp_profile ep
                ON j.auth_id=ep.`auth_id`
                LEFT JOIN `location_master` lm
                ON lm.loc_id=j.location
                WHERE j.functional_area=$id AND j.`keyword` LIKE '$skill%'";
        $query = $this->db->query($query);

        return $query->result();
    }

    public function all_job2() {
        $query = "SELECT *FROM jobs j
                LEFT JOIN emp_profile ep
                ON j.auth_id=ep.`auth_id`
                LEFT JOIN `location_master` lm
                ON lm.loc_id=j.location";
        $query = $this->db->query($query);

        return $query->result();
    }

    public function view_search($id) {
        $query = "SELECT *,(lm.`location`) AS loc FROM jobs j
                LEFT JOIN emp_profile ep
                ON j.auth_id=ep.`auth_id`
                LEFT JOIN `location_master` lm
                ON lm.loc_id=j.location
                LEFT JOIN `functional_area` fa
                ON fa.`fun_id`=j.`functional_area`
                LEFT JOIN `industry_master` im
                ON j.`industry`=im.`indus_id`
                WHERE j.`job_id`=$id";
        $query = $this->db->query($query);

        return $query->row_array();
    }

}
