<?php
class User_model extends CI_Model
{

    public function get_user()
    {
        $this->db->select('*');
        $this->db->from('tbl_user');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function create_user($name, $username, $password, $role)
    {
        $data = array(
            'name' => $name,
            'username' => $username,
            'password' => $password,
            'role' => $role,
        );
        $this->db->insert('tbl_user', $data);
    }

    public function update_user($id, $name, $username, $password, $role)
    {
        $data = array(
            'name' => $name,
            'username' => $username,
            'password' => $password,
            'role' => $role
        );
        $this->db->where('id', $id);
        $this->db->update('tbl_user', $data);
    }

    public function delete_user($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tbl_user');
    }
}
