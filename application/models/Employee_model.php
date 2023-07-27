<?php
class Employee_model extends CI_Model
{

    public function get_employee()
    {
        $this->db->select('*');
        $this->db->from('tbl_employee');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function create_employee($name, $role, $salary, $bankaccount, $datehired)
    {
        $data = array(
            'name' => $name,
            'role' => $role,
            'salary' => $salary,
            'bankaccount' => $bankaccount,
            'datehired' => $datehired,
        );
        $this->db->insert('tbl_employee', $data);
    }

    public function update_employee($employee_id, $name, $role, $salary, $bankaccount)
    {
        $data = array(
            'name' => $name,
            'role' => $role,
            'salary' => $salary,
            'bankaccount' => $bankaccount
        );
        $this->db->where('employee_id', $employee_id);
        $this->db->update('tbl_employee', $data);
    }

    public function delete_employee($employee_id)
    {
        $this->db->where('employee_id', $employee_id);
        $this->db->delete('tbl_employee');
    }

    public function search_employee($keyword)
    {
        // Perform a search for users based on the keyword
        $this->db->like('employee_id', $keyword);
        $this->db->or_like('name', $keyword);
        $this->db->or_like('role', $keyword);
        $this->db->or_like('datehired', $keyword);
        $this->db->or_like('bankaccount', $keyword);
        return $this->db->get('tbl_employee')->result_array();
    }
}
