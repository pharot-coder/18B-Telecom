<?php

defined('BASEPATH') or exit('No direct script access allowed');

class C_sale_login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('sale_model/M_login');
    }

    public function index()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');
        if ($this->form_validation->run()) {
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $userlevel = 2;
            $status = 1;
            $validate = $this->M_login->validatelogin($email, $password, $userlevel, $status);
            if ($validate) {
                $this->session->set_userdata('sid', $validate);
                return redirect('sale/dashboard');
            } else {
                $this->session->set_flashdata('error', 'Invalid details. Please try again with valid details');
                redirect('sale/login');
            }
        } else {
            $this->load->view('sale/V_login');
        }
    }

    //function for logout
    public function logout()
    {
        $this->session->unset_userdata('sid');
        $this->session->sess_destroy();
        return redirect('sale/login');
    }
}

/* End of file Controllername.php */