<?php

defined('BASEPATH') or exit('No direct script access allowed');

class C_banner extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('adid'))
            redirect('admin/login');
        $this->load->model('M_banner');
    }

    public function index()
    {
        $data['data'] = $this->M_banner->getData();
        $this->load->view('admin/V_banner', $data);
    }

    public function getRow()
    {
        $out = array();
        $sliderid = $this->input->get('id');
        $data = $this->M_banner->getRow($sliderid);
        foreach ($data as $row) {
            $out['sliderid'] = $row->sliderid;
            $out['status'] = $row->status;
        }
        echo json_encode($out);
    }

    public function addData()
    {
        $data['msg'] = "";
        $config['upload_path']          = '../assets/img/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $this->load->library('upload', $config);
        $this->form_validation->set_rules('slidername', 'slidern Name', 'required');
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('link_button', 'Link Button', 'required');
        $this->form_validation->set_rules('desc', 'Description', 'required');
        if (empty($_FILES['photo']['name'])) {
            $this->form_validation->set_rules('photo', 'Photo', 'required');
        }
        if ($this->form_validation->run() == false) {
            $this->load->view('admin/V_addbanner');
        } else {
            if ($this->upload->do_upload('photo')) {
                $data = $this->input->post();
                $images = $this->upload->data();
                $file = base_url("../assets/img/" . $images['raw_name'] . $images['file_ext']);
                $data['filepath']  = $images['raw_name'] . $images['file_ext'];
                $dataAdd = array(
                    'image' => $data['filepath']
                );
                $addslider = $this->M_banner->addData('tblslider', $dataAdd);
                if ($addslider->error) {
                    $this->session->set_flashdata('error', 'New slider add fail');
                    return redirect('banner');
                } else {
                    $this->session->set_flashdata('success', 'New slider add Successfully');
                    return redirect('banner');
                }
            }
        }
    }

    public function editStatus()
    {
        $sliderid = $this->input->post('sliderid');
        $status = $this->input->post('status');
        $this->M_banner->editStatus($status, $sliderid);
        $this->session->set_flashdata('success', ' Slider status edit Successfully');
        return redirect('banner');
    }

    public function destroy()
    {
        $sliderid = $this->input->post('sliderid');
        $delData = $this->M_banner->destroy($sliderid);
        if ($delData) {
            $this->session->set_flashdata('error', 'Slider delete fail');
            return redirect('banner');
        } else {
            $this->session->set_flashdata('success', ' Slider delete Successfully');
            return redirect('banner');
        }
    }
}

/* End of file Controllername.php */