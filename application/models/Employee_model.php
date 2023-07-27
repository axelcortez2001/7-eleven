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
}
