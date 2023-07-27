<?php
class Employee_model extends CI_Model {

    public function get_employee() {
        $this->db->select('*');
        $this->db->from('tbl_employee');
        $query = $this->db->get();
        return $query->result_array();
    }
}
