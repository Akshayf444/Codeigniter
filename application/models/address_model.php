<?php

class address_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function add_address($id) {
        $query = $this->db->get_where('address_master', array('auth_id' => $id));
        $data3 = array('auth_id' => $this->input->post('auth_id'),
            'address1' => $this->input->post('address1'),
            'pincode' => $this->input->post('pincode'),
            'state' => $this->input->post('state'),
            'city' => $this->input->post('city'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        );
        $data4 = array('auth_id' => $this->input->post('auth_id'),
            'address1' => $this->input->post('address1'),
            'pincode' => $this->input->post('pincode'),
            'state' => $this->input->post('state'),
            'city' => $this->input->post('city'),
//            add_pincode();
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        );
        if (!empty($query->num_rows() > 0)) {
            $this->db->where('auth_id', $id);
            return $this->db->update('address_master', $data3);
        } else {
            return $this->db->insert('address_master', $data4);
        }
    }

   

    public function find_id($id) {
        $query = $this->db->get_where('address_master', array('auth_id' => $id));
        return $query->row_array();
    }

}
