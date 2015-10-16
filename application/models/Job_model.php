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

}
