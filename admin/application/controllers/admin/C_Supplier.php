<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_Supplier extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Supplier');
        $this->load->helper('url_helper');

        if (empty($this->session->userdata('adid'))) {
            redirect('admin/login');
        }
    }

    public function index()
    {
        $data['supplier'] = $this->M_Supplier->GetData();
        $this->load->view('admin/V_Supplier', $data);
    }

    public function FetRowData()
    {
        $output = array();
        $supplierid = $this->input->post('supplierid');
        $data = $this->M_Supplier->FetRowData($supplierid);
        foreach ($data as $row) {
            $output['supplierid'] = $row->supplierid;
            $output['suppliername'] = $row->suppliername;
            $output['phone_number'] = $row->phone_number;
            $output['email'] = $row->email;
            $output['address'] = $row->address;
        }
        echo json_encode($output);
    }

    public function DeleteData()
    {
        $supplierid = $this->input->post('supplierid');
        $deldata = $this->M_Supplier->DeleteData($supplierid);
        if ($deldata == FALSE) {
            $this->session->set_flashdata('success', 'Supplier Data Delete Successfully');
            return redirect('supplier');
        } else {
            $this->session->set_flashdata('error', 'Supplier Data Delete Fail');
            return redirect('supplier');
        }
    }

    public function AddData()
    {
        $data['msg'] = "";
        $config['upload_path']          = '../assets/img/';
        $config['allowed_types']        = 'gif|jpg|png|pdf|doc';
        $this->load->library('upload', $config);
        $this->form_validation->set_rules('suppliername', 'Supplier Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('address', 'Address', 'required');
        $this->form_validation->set_rules('phonenumber', 'Phone Number', 'required');
        if (empty($_FILES['photo']['name'])) {
            $this->form_validation->set_rules('photo', 'Photo', 'required');
        }
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('admin/v_addsupplier');
        } else {
            if ($this->upload->do_upload('photo')) {
                $data = $this->input->post();
                $images = $this->upload->data();
                $file = base_url("../assets/img/" . $images['raw_name'] . $images['file_ext']);
                $data['filepath'] = $images['raw_name'] . $images['file_ext'];
                $data['supplier'] = array(
                    'suppliername' => $this->input->post('suppliername'),
                    'email' => $this->input->post('email'),
                    'phone_number' => $this->input->post('phonenumber'),
                    'address' => $this->input->post('address'),
                    'photo' => $data['filepath']
                );
                $this->M_Supplier->AddData('tblsupplier', $data['supplier']);
                $this->session->set_flashdata('success', 'Supplier Address Successfully');
                return redirect('supplier');
            }
        }
    }
}

/* End of file Controllername.php */