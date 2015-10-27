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
        $this->db->select('user.name as name,jobs.title as title,user_resume.resume as resume ');
        $this->db->from('apply_job');
         $this->db->join('jobs', 'apply_job.job_id=jobs.job_id', 'left');
         
        $this->db->join('user', 'apply_job.auth_id=user.auth_id', 'left');
              $this->db->join('user_resume', 'apply_job.auth_id=user_resume.auth_id', 'left');
             $this->db->where('apply_job.auth_id', $id);
        $query = $this->db->get();
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

}
