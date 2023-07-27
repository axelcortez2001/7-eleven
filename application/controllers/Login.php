<?php
class Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Staff_model');
        $this->load->library('session');
    }
    public function index()
    {
        $this->load->view('Login');
    }
    public function authenticate()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $staff = $this->Staff_model->getStaff($username, $password);
        if ($staff) {
            $userdata = array(
                'id' => $staff->id,
                'username' => $staff->username,
                'password' => $staff->password,
                'name' => $staff->name,
                'role' => $staff->role,
            );
            $this->session->set_userdata('user', $userdata);
            redirect('Dashboard');
        } else {
            $data['error'] = 'Invalid username or password';
            echo '<script>alert("' . $data['error'] . '");</script>';
            $this->load->view('Login', $data);
        }
    }
    public function logout()
    {
        $this->session->unset_userdata('user');
        redirect('Login');
    }
}
