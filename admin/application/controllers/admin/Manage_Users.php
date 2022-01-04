<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Manage_Users extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('ManageUsers_Model');
        $this->load->helper('url_helper');
        if (!$this->session->userdata('adid'))
            redirect('admin/login');
    }

    public function index()
    {
        $user = $this->ManageUsers_Model->GetUser();
        $this->load->view('admin/manage_users', ['userdetails' => $user]);
    }

    // For particular Record
    public function getuserdetail($uid)
    {
        $udetail = $this->ManageUsers_Model->getuserdetail($uid);
        $this->load->view('admin/getuserdetails', ['ud' => $udetail]);
    }
    public function deleteuser()
    {
        $uid = $this->input->post('userid');
        $this->ManageUsers_Model->deleteuser($uid);
        $this->session->set_flashdata('success', 'User data deleted');
        redirect('admin/manage_users');
    }
    public function UserAdd()
    {
        $this->form_validation->set_rules('fname', 'First Name', 'required');
        $this->form_validation->set_rules('lname', 'Last Name', 'required');
        $this->form_validation->set_rules('uname', 'Username', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');
        $this->form_validation->set_rules('phonenumber', 'Phone Number', 'required');
        $this->form_validation->set_rules('dob', 'Date Of Birth', 'required');
        $this->form_validation->set_rules('usertype', 'User Type', 'required');
        if ($this->form_validation->run() == FALSE) {

            $this->load->view('admin/V_user_add');
        } else {

            $data['user'] = array(
                'first_name' => $this->input->post('fname'),
                'last_name' => $this->input->post('lname'),
                'username' => $this->input->post('uname'),
                'email' => $this->input->post('email'),
                'dob' => $this->input->post('dob'),
                'phone' => $this->input->post('phonenumber'),
                'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
                'userlevel' => $this->input->post('usertype')
            );
            $this->ManageUsers_Model->AddData('tbluser', $data['user']);
            $this->session->set_flashdata('success', 'User add successfully');
            return redirect('admin/manage_users');
        }
    }

    public function GetRow()
    {
        $userid = $this->input->get('userid');
        $out = array();
        $datauser = $this->ManageUsers_Model->GetRow($userid);
        foreach ($datauser as $row) {
            $out['userid'] = $row->userid;
            $out['username'] = $row->username;
            $out['frst_name'] = $row->first_name;
            $out['last_name'] = $row->last_name;
            $out['phone'] = $row->phone;
            $out['email'] = $row->email;
            $out['address'] = $row->address;
            $out['dob'] = $row->dob;
            $out['register_date'] = $row->register_date;
            $out['status'] = $row->status;
            $out['userlevel'] = $row->userlevel;
            $out['images'] = $row->images;
        }
        echo json_encode($out);
    }

    public function editStatus()
    {
        $userid = $this->input->post('userid');
        $status  = $this->input->post('status');
        $this->ManageUsers_Model->editStatus($status, $userid);
        $this->session->set_flashdata('success', 'User status update successfully');
        return redirect('admin/manage_users');
    }
}