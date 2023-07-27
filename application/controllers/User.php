<?php
class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->library('session');
    }
    public function index()
    {
        $user = $this->session->userdata('user');
        if ($user) {
            $data['user'] = $user;
            $data['users'] = $this->User_model->get_user();
            $this->load->view('user/show_user', $data);
        } else {
            redirect('Login');
        }
    }
    public function add()
    {
        $datehired = date('Y-m-d');
        $this->load->model('User_model'); //Load the user_model
        $data = array(
            'name' => $this->input->post('name'),
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'),
            'role' => $this->input->post('role'),

        );
        $this->User_model->create_user(
            $data['name'],
            $data['username'],
            $data['password'],
            $data['role']
        );
        redirect('User');
    }

    public function update()
    {
        $this->load->model('User_model'); //Load the user_model
        $data = array(
            'id' => $this->input->post('id'),
            'name' => $this->input->post('name'),
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'),
            'role' => $this->input->post('role'),

        );
        $this->User_model->update_user(
            $data['id'],
            $data['name'],
            $data['username'],
            $data['password'],
            $data['role']
        );

        redirect('User');
    }

    public function delete($id)
    {
        $this->User_model->delete_user($id);
        redirect('User');
    }
}
