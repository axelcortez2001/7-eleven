<?php

class Staff_model extends CI_Model {
    public function getStaff($username, $password) {
        $this->db->select('*');
        $this->db->from('tbl_user');
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $query = $this->db->get();
        return $query->row();
    }
}
?>