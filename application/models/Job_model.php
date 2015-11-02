<?php

class Job_model extends CI_Model {

    function add() {
        $field_array = array(
            'title' => $this->input->post('title'),
            'description' => $this->input->post('description'),
            'no_of_vacancy' => $this->input->post('no_of_vacancy'),
            'exp_min' => $this->input->post('exp_min'),
            'exp_max' => $this->input->post('exp_max'),
            'ctc_min' => $this->input->post('ctc_min'),
            'ctc_type' => $this->input->post('ctc_type'),
            'hide_ctc' => $this->input->post('hide_ctc'),
            'location' => $this->input->post('location'),
            'industry' => $this->input->post('industry'),
            'functional_area' => $this->input->post('functional_area'),
            'auth_id' => $this->input->post('auth_id'),
            'keyword' => $this->input->post('keyword'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        );

        $this->db->insert('jobs', $field_array);
    }

    public function job_list($id) {

        $query = $this->db->get_where('jobs', array('auth_id' => $id));
        return $query->result();
    }

    public function view_job($id) {
        $this->db->select('jobs.*,industry_master.industry as industry_name,functional_area.fun_area,location_master.location as loc,emp.*');
        $this->db->from('jobs');
        $this->db->join('industry_master ', 'jobs.industry = industry_master.indus_id', 'left');
        $this->db->join('location_master ', 'jobs.location = location_master.loc_id', 'left');
        $this->db->join('functional_area', 'jobs.functional_area = functional_area.fun_id', 'left');
        $this->db->join('emp_profile emp', 'jobs.auth_id = emp.auth_id', 'left');
        $this->db->where('jobs.job_id', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function update_job($id) {
//        $query = $this->view_job($id);
        $field_array = array(
            'job_id' => $this->input->post('id'),
            'title' => $this->input->post('title'),
            'description' => $this->input->post('description'),
            'no_of_vacancy' => $this->input->post('no_of_vacancy'),
            'exp_min' => $this->input->post('exp_min'),
            'exp_max' => $this->input->post('exp_max'),
            'ctc_min' => $this->input->post('ctc_min'),
            'ctc_type' => $this->input->post('ctc_type'),
            'hide_ctc' => $this->input->post('hide_ctc'),
            'location' => $this->input->post('location'),
            'industry' => $this->input->post('industry'),
            'functional_area' => $this->input->post('functional_area'),
            'keyword' => $this->input->post('keyword'),
            'updated_at' => date('Y-m-d H:i:s'),
        );

        $this->db->where('jobs.job_id', $id);
        return $this->db->update('jobs', $field_array);
    }

    public function appiled_job($id) {
        $query = "SELECT jobs.`job_id`, (u.name) AS NAME,(jobs.title) AS title,u.`mobile`,(apply_job.`auth_id`) AS user_id,(u.`email`)AS email FROM apply_job
                LEFT JOIN jobs 
                ON apply_job.job_id=jobs.job_id
                LEFT JOIN user u 
                ON apply_job.auth_id=u.auth_id
                WHERE jobs.auth_id=$id";
        $query = $this->db->query($query);
        return $query->result();
    }

    public function search($conditions) {
        $query = "SELECT * ,(lm.`location`) AS loc FROM jobs j
                LEFT JOIN emp_profile ep
                ON j.auth_id=ep.`auth_id`
                LEFT JOIN `location_master` lm
                ON lm.loc_id=j.location
                LEFT JOIN `functional_area` fa
                ON fa.`fun_id`=j.`functional_area`";
        if (!empty($conditions)) {
            $query .= ' WHERE ' . join(' OR ', $conditions);
        }
//        echo $query;
        $query = $this->db->query($query);

        return $query->result();
    }

    public function applied($job_id, $auth_id = 0) {
        $data = "SELECT j.*,aj.* FROM jobs j
                LEFT JOIN apply_job aj
                ON j.job_id=aj.job_id
                WHERE aj.auth_id=$auth_id AND j.job_id=$job_id";
        $query = $this->db->query($data);

        return $query->row_array();
    }

    public function apply($job_id, $auth_id) {
        $data = array(
            'job_id' => $job_id,
            'auth_id' => $auth_id,
            'created' => date('Y-m-d H:i:s'),
        );
        return $this->db->insert('apply_job', $data);
    }

    public function apply_id($job_id, $auth_id) {
        $data = "SELECT * FROM apply_job
                WHERE job_id=$job_id AND auth_id=$auth_id";
        $query = $this->db->query($data);
        return $query->row_array();
    }

    public function user_applied($auth_id) {
        $data = "SELECT *,(l.location) AS loc,(up.location) AS ploc,(up.role) AS prole  FROM user u
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
                WHERE u.auth_id=$auth_id";
        $query = $this->db->query($data);
        return $query->row_array();
    }

    public function resume_search_view($location, $skill) {
        $data = "SELECT * FROM user u
                    LEFT JOIN `location_master` lm
                    ON lm.`loc_id`=u.`current_location`
                    WHERE u.`current_location`='$location' AND u.`key_skill` LIKE '%$skill%'";

        $query = $this->db->query($data);

        return $query->result();
    }

    public function type($skill) {
        $data = "SELECT * FROM industry_master
                WHERE industry  LIKE '$skill%'";

        $query = $this->db->query($data);

        return $query->result();
    }

    public function filter($conditions) {
        $query = "SELECT *,(lm.`location`)AS loc FROM jobs j
            LEFT JOIN `location_master` lm
            ON lm.`loc_id`=j.`location`
            LEFT JOIN `industry_master` im
            ON im.`indus_id`=j.`industry`
            LEFT JOIN `emp_profile` ep
            ON ep.`auth_id`=j.`auth_id`";

        if (!empty($conditions)) {
            $query .= ' WHERE ' . join(' AND ', $conditions);
        }

        $query = $this->db->query($query);

        return $query->result();
    }

}
