<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Login extends CI_Controller
{


    public function index()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');
        if ($this->form_validation->run()) {
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $userlevel = 2;
            $status = 1;
            $this->load->model('User_Login_Model');
            $validate = $this->User_Login_Model->validatelogin($email, $password, $userlevel, $status);
            if ($validate) {
                $this->session->set_userdata('sid', $validate);
                return redirect('user/dashboard');
            } else {
                $this->session->set_flashdata('error', 'Invalid details. Please try again with valid details');
                redirect('user/login');
            }
        } else {
            $this->load->view('user/login');
        }
    }

    //function for logout
    public function logout()
    {
        $this->session->unset_userdata('sid');
        $this->session->sess_destroy();
        return redirect('user/login');
    }
}