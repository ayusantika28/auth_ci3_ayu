<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library(array('session', 'form_validation'));
        $this->load->helper(array('url', 'form'));
        $this->load->model('User_model');
    }

    public function register() {
        // Set rules for registration form
        $this->form_validation->set_rules('username', 'Username', 'required|is_unique[users.username]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');

        if ($this->form_validation->run() === FALSE) {
            // Load the registration view
            $this->load->view('auth/register');
        } else {
            // Get form data
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            // Register user
            if ($this->User_model->register($username, $password)) {
                $this->session->set_flashdata('success', 'Registration successful. Please log in.');
                redirect('auth/login');
            } else {
                $this->session->set_flashdata('error', 'Registration failed. Please try again.');
                redirect('auth/register');
            }
        }
    }

    public function login() {
        // If already logged in, redirect to dashboard
        if ($this->session->userdata('logged_in')) {
            redirect('dashboard');
        }

        // Set rules for login form
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() === FALSE) {
            // Load the login view
            $this->load->view('auth/login');
        } else {
            // Get form data
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            // Check login credentials
            $user = $this->User_model->login($username, $password);

            if ($user) {
                // Set user data in session
                $user_data = array(
                    'user_id' => $user->id,
                    'username' => $user->username,
                    'logged_in' => TRUE
                );
                $this->session->set_userdata($user_data);

                // Redirect to dashboard
                redirect('dashboard');
            } else {
                // Set error message
                $this->session->set_flashdata('error', 'Invalid username or password');
                redirect('auth/login');
            }
        }
    }

    public function logout() {
        // Unset session data
        $this->session->unset_userdata('logged_in');
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('username');

        // Redirect to login page
        redirect('auth/login');
    }
}
