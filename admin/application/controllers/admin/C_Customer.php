<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_Customer extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Customer');
        $this->load->helper('url_helper');
        if (empty($this->session->userdata('adid'))) {
            redirect('admin/login');
        }
    }
    public function index()
    {
        $data['customer'] = $this->M_Customer->GetData();
        $this->load->view('admin/V_Customer', $data);
    }

    public function FetchRow()
    {
        $output = array();
        $customerid = $this->input->post('customerid');
        $customerdata = $this->M_Customer->FetchRow($customerid);
        foreach ($customerdata as $row) {
            $output['customerid'] = $row->customerid;
            $output['first_name'] = $row->first_name;
            $output['last_name'] = $row->last_name;
            $output['address'] = $row->address;
            $output['email'] = $row->email;
            $output['password'] = $row->password;
            $output['phone_number'] = $row->phone_number;
            $output['username'] = $row->username;
            $output['status'] = $row->status;
        }
        echo json_encode($output);
    }

    public function addData()
    {
        $this->form_validation->set_rules('first_name', 'First Name', 'required');
        $this->form_validation->set_rules('last_name', 'Last Name', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('email', 'First Name', 'required');
        $this->form_validation->set_rules('phonenumber', 'Phone Number', 'required');
        $this->form_validation->set_rules('address', 'Addresss', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');

        if ($this->form_validation->run() == FALSE) {
            # code...
            $this->load->view('admin/V_addcustomer');
        } else {
            # code...
            $data = array(
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'username' => $this->input->post('username'),
                'email' => $this->input->post('email'),
                'address' => $this->input->post('address'),
                'phone_number' => $this->input->post('phonenumber'),
                'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
            );
            $addData = $this->M_Customer->addData('tblcustomer', $data);
            if ($addData == true) {
                $this->session->set_flashdata('error', 'Customer Add Fail !');
                return redirect('customer');
            } else {
                $this->session->set_flashdata('success', 'Customer Add Successfully');
                return redirect('customer');
            }
        }
    }

    public function UpdateStatus()
    {
        $status = $this->input->post('status');
        $customerid = $this->input->post('customerid');
        $StatusUpdate = $this->M_Customer->UpdateStatus($status, $customerid);
        if ($StatusUpdate == true) {
            $this->session->set_flashdata('error', 'Customer Status Update Fail !');
            return redirect('customer');
        } else {
            $this->session->set_flashdata('success', 'Customer Status Update Successfully');
            return redirect('customer');
        }
    }

    public function updateData()
    {
        $customerid = $this->input->post('customerid');
        $first_name = $this->input->post('first_name');
        $last_name = $this->input->post('last_name');
        $username = $this->input->post('username');
        $email = $this->input->post('email');
        $phonenumber = $this->input->post('phonenumber');
        $password = password_hash($this->input->post('password'), PASSWORD_BCRYPT);
        $address = $this->input->post('address');
        $updataData = $this->M_Customer->updateData($customerid, $first_name, $last_name, $username, $address, $phonenumber, $email, $password);
        if ($updataData == FALSE) {
            $this->session->set_flashdata('success', 'Updated Customer Successfully');
            return redirect('customer');
        } else {
            $this->session->set_flashdata('error', 'Update customer Fail !');
            return redirect('customer');
        }
    }

    public function deleteData()
    {
        $customerid = $this->input->post('customerid');
        $deldata = $this->M_Customer->deleteData($customerid);
        if ($deldata == true) {
            $this->session->set_flashdata('error', 'Delete customer Fail !');
            return redirect('customer');
        } else {
            $this->session->set_flashdata('success', 'Delete Customer Successfully');
            return redirect('customer');
        }
    }
}

/* End of file Controllername.php */