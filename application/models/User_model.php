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

    public function find_by_email($id) {

        $query = $this->db->get_where('authentication', array('email' => $id));
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

    public function user_qualification_update($data, $id) {
//        $data = array(
//            'qualification' => $this->input->post('qualification'),
//            'specialization' => $this->input->post('specialization'),
//            'institute' => $this->input->post('institute'),
//            'year' => $this->input->post('year'),
//            'updated_at' => date('Y-m-d H:i:s'),
//            'auth_id' => $id,
//        );
        $this->db->where(array('id' => $id));
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
        $query = "SELECT *,(l.location) AS cuurentloc,(lmm.location) AS preloc,(up.location) AS ploc,(up.role) AS prole,(u.role) AS rol  FROM user u
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
                    LEFT JOIN `location_master`lmm
                    ON lmm.loc_id=u.`prefred_location`
                    LEFT JOIN functional_area fa
                    ON fa.fun_id=u.`function_area`
                    LEFT JOIN industry_master ind
                    ON ind.indus_id=u.`industry`
                    LEFT JOIN address_master am
                    ON am.`auth_id`=u.`auth_id`
                    LEFT JOIN user_project up
                    ON up.`auth_id`=u.`auth_id`
                    WHERE u.auth_id=$id
                    ORDER BY we.emp_id DESC  LIMIT 1";
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

    public function resume2($name, $id, $detail) {
        $data = array(
            'resume' => $name,
            'detail' => $detail,
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

    public function project_update3($id, $data) {
        $this->db->where(array('id' => $id));
        return $this->db->update('user_project', $data);
    }

    public function update_qualification($data, $id) {
        $this->db->where(array('id' => $id));
        return $this->db->update('user_qualification', $data);
    }

    public function all_job($id, $skill) {
        $skills = explode(",", $skill);
        $query = "SELECT * FROM jobs j
                LEFT JOIN emp_profile ep
                ON j.auth_id=ep.`auth_id`
                LEFT JOIN `location_master` lm
                ON lm.loc_id=j.location
                LEFT JOIN `functional_area` fa
                ON j.functional_area=fa.fun_id 
                LEFT JOIN `industry_master` im
                ON im.indus_id=j.industry
                WHERE j.functional_area=$id ";

        if (!empty($skills)) {
            foreach ($skills as $value) {
                $query .= " OR j.keyword LIKE '%$value%' ";
            }
        }

        $query = $this->db->query($query);

        return $query->result();
    }

    public function all_job3($id, $skill, $user_id = 0) {
        $skills = explode(",", $skill);
        $query = "SELECT *,(j.job_id) as job_id ,(fa.fun_area) AS functional_area,(im.industry) AS industry,(CASE WHEN ap.job_id IS NOT NULL THEN 1 ELSE 0 END) AS applied_status FROM jobs j
                LEFT JOIN emp_profile ep
                ON j.auth_id=ep.`auth_id`
                LEFT JOIN `location_master` lm
                ON lm.loc_id=j.location
                LEFT JOIN `functional_area` fa
                ON j.functional_area=fa.fun_id 
                LEFT JOIN `industry_master` im
                ON im.indus_id=j.industry ";
        if ($user_id > 0) {
            $query .= "LEFT JOIN apply_job ap ON ap.job_id = j.job_id AND ap.auth_id = '$user_id'";
        }
        $query .= " WHERE j.functional_area=$id";

        if (!empty($skills)) {
            foreach ($skills as $value) {
                $query .= " OR j.keyword LIKE '%$value%' ";
            }
        }
        
        //echo $query;

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

    public function changepassword($data, $id) {
        $this->db->where(array('auth_id' => $id));
        return $this->db->update('authentication', $data);
    }

    public function application($id) {
        $query = "SELECT * FROM apply_job aj
                LEFT JOIN jobs j
                ON aj.`job_id`=j.`job_id`
                LEFT JOIN `emp_profile` ep
                ON ep.`auth_id` =j.`auth_id`
                LEFT JOIN `functional_area` fa
                ON j.functional_area=fa.fun_id 
                LEFT JOIN `industry_master` im
                ON im.indus_id=j.industry
                LEFT JOIN `location_master` lm
                ON lm.`loc_id`=j.`location`
                WHERE aj.auth_id=$id";
        $query = $this->db->query($query);
        return $query->result();
    }

    public function saved_jobs($job_id, $auth_id) {
        $data = array(
            'job_id' => $job_id,
            'auth_id' => $auth_id,
            'created' => date('Y-m-d H:i:s'),
        );
        return $query = $this->db->insert('saved_jobs', $data);
    }

    public function saved_jobs_by_id($job_id, $auth_id) {
        $query = "SELECT * FROM saved_jobs sj
                WHERE job_id=$job_id AND auth_id=$auth_id";
        $query = $this->db->query($query);
        return $query->row_array();
    }

    public function viewsavedjobs($id) {
        $query = "SELECT *,(aj.`created`)AS creat FROM saved_jobs aj
                LEFT JOIN jobs j
                ON aj.`job_id`=j.`job_id`
                LEFT JOIN `emp_profile` ep
                ON ep.`auth_id` =j.`auth_id`
                LEFT JOIN `location_master` lm
                ON lm.`loc_id`=j.`location`
                WHERE aj.auth_id=$id";
        $query = $this->db->query($query);
        return $query->result();
    }

    public function user_resume($id) {
        $query = "SELECT * FROM `user_resume`ur 
                    WHERE ur.auth_id=$id
                    ORDER BY ur.`id` DESC LIMIT 1";
        $query = $this->db->query($query);
        return $query->row_array();
    }

    public function Add_skill($data, $id) {

        $this->db->where(array('auth_id' => $id));
        return $this->db->update('user', $data);
//        $query = "update user set `key_skill`=[$skill]  WHERE auth_id=$id";
//       return  $query = $this->db->query($query);
        //return $query->row_array();
    }

    public function verification($data) {

        return $query = $this->db->insert('user_verification', $data);
    }

    public function verification_update($id, $data) {

        $this->db->where(array('auth_id' => $id));
        return $this->db->update('user_verification', $data);
    }

    public function verification_by_id($id) {

        $query = "SELECT *FROM user_verification u
                    WHERE u.auth_id=$id";
        $query = $this->db->query($query);

        return $query->row_array();
    }

    public function check_code($id, $data) {

        $this->db->where(array('auth_id' => $id));
        return $this->db->update('user_verification', $data);
    }

    public function project_add2($data) {

        return $this->db->insert('user_project', $data);
    }

    public function personal_detail($id, $data) {

        $this->db->where(array('auth_id' => $id));
        return $this->db->update('user', $data);
    }

    public function veiw3($id) {

        $query = "SELECT * FROM `user_verification`
                    WHERE auth_id=$id";
        $query = $this->db->query($query);

        return $query->row_array();
    }
    public function work_exp_show($id) {

        $query = "SELECT * FROM `work_exp`
                    WHERE auth_id=$id";
        $query = $this->db->query($query);

        return $query->row_array();
    }

    public function show_alljobs($data, $user_id) {

        $query = "SELECT * ,CASE  WHEN ap.`job_id` IS NOT NULL THEN 1 ELSE 0 END AS applied_status,(fa.fun_area) AS functional_area,(im.industry) AS industry FROM jobs j
                LEFT JOIN emp_profile ep
                ON j.auth_id=ep.`auth_id`
                LEFT JOIN `location_master` lm
                ON lm.loc_id=j.location
                LEFT JOIN apply_job ap
                ON ap.`job_id`=j.`job_id`
                LEFT JOIN `functional_area` fa
                ON j.functional_area=fa.fun_id 
                LEFT JOIN `industry_master` im
                ON im.indus_id=j.industry
                WHERE j.`job_id` IN($data) AND ap.auth_id=$user_id";
        $query = $this->db->query($query);

        return $query->result();
    }

    public function project_delete($id) {

        $this->db->where('id', $id);
        return $this->db->delete('user_project');
    }

    public function delete_qualification($id) {

        $this->db->where('id', $id);
        return $this->db->delete('user_qualification');
    }

}
