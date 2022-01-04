<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Login extends CI_Controller
{

	public function index()
	{
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		if ($this->form_validation->run()) {
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			$userlevel = 1;
			$status = 1;
			$this->load->model('Admin_Login_Model');
			$validate = $this->Admin_Login_Model->validatelogin($email, $password, $userlevel, $status);
			if ($validate) {
				$this->session->set_userdata('adid', $validate);
				$this->load->view("admin/includes/header", $validate);
				return redirect('admin/dashboard');
			} else {
				$this->session->set_flashdata('error', 'Invalid details. Please try again with valid details');
				redirect('admin/login');
			}
		} else {
			$this->load->view('admin/login');
		}
	}

	//function for logout
	public function logout()
	{
		$this->session->unset_userdata('adid');
		$this->session->sess_destroy();
		return redirect('http://localhost:8888/18B-Telecom/admin/');
	}
}