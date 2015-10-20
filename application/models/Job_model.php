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
        $this->db->select('jobs.*,industry_master.industry as industry_name,functional_area.fun_area,location_master.location as loc');
        $this->db->from('jobs');
        $this->db->join('industry_master ', 'jobs.industry=industry_master.indus_id', 'left');
        $this->db->join('location_master ', 'jobs.location=location_master.loc_id', 'left');
        $this->db->join('functional_area', 'jobs.functional_area=functional_area.fun_id', 'left');
        $this->db->where('jobs.job_id', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function update_job($id) {
//        $query = $this->view_job($id);
        $field_array = array(
            'job_id'=>  $this->input->post('id'),
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
        
            $this->db->where('jobs.job_id', $id);
            return $this->db->update('jobs', $field_array);
        
    }

}
