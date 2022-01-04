<?php

defined('BASEPATH') or exit('No direct script access allowed');

class C_profile_setting extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_profile_setting');
        if (!$this->session->userdata('adid')) {
            return redirect('admin/login');
        }
    }

    public function index()
    {
        $userid = $this->session->userdata('adid')->userid;
        $this->load->view('admin/V_profile_setting', [
            'userData' => $this->M_profile_setting->getData($userid),
        ]);
    }

    public function editProfile()
    {
        $this->form_validation->set_rules('first_name', 'First Name', 'required');
        $this->form_validation->set_rules('last_name', 'Last name', 'required');
        $this->form_validation->set_rules('address', 'Adress', 'required');
        $this->form_validation->set_rules('phone_number', 'Phone Number', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $userid = $this->session->userdata('adid')->userid;
        $first_name = $this->input->post('first_name');
        $last_name = $this->input->post('last_name');
        $email  = $this->input->post('email');
        $phone_number = $this->input->post('phone_number');
        $username = $this->input->post('username');
        $address = $this->input->post('address');
        if ($this->form_validation->run() == TRUE) {
            # code...

            $editData =  $this->M_profile_setting->editProfile($userid, $username, $first_name, $last_name, $phone_number, $address, $email);
            if (!$editData) {
                $this->session->set_flashdata('success', 'Update Profile Successfully');
                return redirect('profile_setting', validation_errors());
            } else {
                $this->session->set_flashdata('error', 'Update Profile Fail !');
                return redirect('profile_setting', validation_errors());
            }
        } else {
            # code...
            $this->session->set_flashdata('error', validation_errors());
            return redirect('profile_setting');
        }
    }


    public function editPhoto()
    {
        $config['upload_path']          = '../assets/img/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('images')) {
            $userid  = $this->input->post('userid');
            $data = $this->input->post();
            $images = $this->upload->data();
            $file = base_url("../assets/img/" . $images['raw_name'] . $images['file_ext']);
            $data['filepath'] = $images['raw_name'] . $images['file_ext'];
            $this->Product_Model->editPhoto($userid, $data['filepath']);
            $this->session->set_flashdata('success', 'Profile Photos update success');
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            $this->session->set_flashdata('error', 'Profile Photos update Fail');
            redirect($_SERVER['HTTP_REFERER']);
        }
    }
}

/* End of file C_profile_setting.php */