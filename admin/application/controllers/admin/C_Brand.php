<?php

defined('BASEPATH') or exit('No direct script access allowed');

class C_Brand extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Brand');
        $this->load->helper('url_helper');
        if (!$this->session->userdata('adid'))
            redirect('admin/login');
    }

    public function index()
    {
        $brandData = $this->M_Brand->GetData();
        $this->load->view('admin/V_Brand', [
            'branddata' => $brandData
        ]);
    }

    public function AddData()
    {
        $data['msg'] = "";
        $config['upload_path']          = '../assets/img/';
        $config['allowed_types']        = 'gif|jpg|png|pdf|doc';
        $this->load->library('upload', $config);
        $this->form_validation->set_rules('brandname', 'Brand Name', 'required');
        if (empty($_FILES['photo']['name'])) {
            $this->form_validation->set_rules('photo', 'Photo', 'required');
        }
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('error', validation_errors());
            return redirect('brand');
        } else {
            if ($this->upload->do_upload('photo')) {
                $data = $this->input->post();
                $images = $this->upload->data();
                $file = base_url("../assets/img/" . $images['raw_name'] . $images['file_ext']);
                $data['filepath'] = $images['raw_name'] . $images['file_ext'];
                $data['brand'] = array(
                    'brandname' => $this->input->post('brandname'),
                    'images' => $data['filepath']
                );
                $this->M_Brand->AddData('tblbrand', $data['brand']);
                $this->session->set_flashdata('success', 'Brand Name add Successfully');
                return redirect('brand');
            }
        }
    }

    public function updateStatus()
    {
        $brandid = $this->input->post('brandid');
        $status = $this->input->post('status');
        $update = $this->M_Brand->updateStatus($status, $brandid);
        if ($update ==  FALSE) {
            $this->session->set_flashdata('success', 'Update Success');
            return redirect('brand');
        } else {
            $this->session->set_flashdata('error', 'Update Fail');
            return redirect('brand');
        }
    }

    public function delete()
    {
        $brandid = $this->input->post('brandid');
        $delete = $this->M_Brand->delete($brandid);
        if ($delete == FALSE) {
            $this->session->set_flashdata('success', 'Deleted Success');
            return redirect('brand');
        } else {
            $this->session->set_flashdata('error', 'Deleted Fail');
            return redirect('brand');
        }
    }

    public function fetchRow()
    {
        $output = array();
        $brandid = $this->input->post('brandid');
        $data = $this->M_Brand->fetchRow($brandid);
        foreach ($data as $row) {
            $output['brandid'] = $row->brandid;
            $output['brandname'] = $row->brandname;
            $output['status'] = $row->status;
        }
        echo json_encode($output);
    }
}

/* End of file Controllername.php */