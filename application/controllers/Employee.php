<?php
    class Employee extends CI_Controller{
        public function __construct() {
            parent::__construct();
            $this->load->library('session');
            $this->load->model('Employee_model');
        }
        public function index() {
            // Retrieve the user data from the session
            $user = $this->session->userdata('user');
            if ($user) {
                // Pass the user data to the view
                $data['user'] = $user;
                $data['employees'] = $this->Employee_model->get_employee();
                $this->load->view('hr/show_employee', $data);
            } else {
                // User data not found in session, redirect to login
                redirect('login');
            }
        }
    }
?>