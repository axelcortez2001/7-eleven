<?php
class Employee extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Employee_model');
        $this->load->library('session');
    }
    public function index()
    {
        $user = $this->session->userdata('user');
        if ($user) {
            $data['user'] = $user;
            $data['employees'] = $this->Employee_model->get_employee();
            $this->load->view('hr/show_employee', $data);
        } else {
            redirect('Login');
        }
    }
    public function add()
    {
        $datehired = date('Y-m-d');
        $this->load->model('Employee_model'); //Load the user_model
        $data = array(
            'name' => $this->input->post('name'),
            'role' => $this->input->post('role'),
            'salary' => $this->input->post('salary'),
            'bankaccount' => $this->input->post('bankaccount'),
            'datehired' => $datehired,

        );
        $this->Employee_model->create_employee(
            $data['name'],
            $data['role'],
            $data['salary'],
            $data['bankaccount'],
            $data['datehired']
        );
        redirect('employee');
    }

    public function update()
    {
        $this->load->model('Employee_model'); //Load the user_model
        $data = array(
            'employee_id' => $this->input->post('employee_id'),
            'name' => $this->input->post('name'),
            'role' => $this->input->post('role'),
            'salary' => $this->input->post('salary'),
            'bankaccount' => $this->input->post('bankaccount'),

        );
        $this->Employee_model->update_employee(
            $data['employee_id'],
            $data['name'],
            $data['role'],
            $data['salary'],
            $data['bankaccount']
        );

        redirect('employee');
    }

    public function delete($employee_id)
    {
        $this->Employee_model->delete_employee($employee_id);
        redirect('employee');
    }

    public function search()
    {
        $keyword = $this->input->post('keyword');

        // Perform the search
        $data['employees'] = $this->Employee_model->search_employee($keyword);

        $user = $this->session->userData('user');
        $data['user'] = $user; // Add this line to pass the $user variable to the view

        // Load the user list view with the search results
        $this->load->view('show_employee', $data);
    }
}
