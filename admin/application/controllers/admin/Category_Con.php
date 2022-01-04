<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 * 
 */

class Category_Con extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Category_model');
        $this->load->helper('url_helper');
        if (!$this->session->userdata('adid'))
            redirect('admin/login');
    }

    public function index()
    {
        $data['category'] = $this->Category_model->GetData();
        $this->load->view('admin/V_category', $data);
    }

    public function GetRow($id)
    {
        $data['caterow'] = $this->Category_model->GetRow($id);
        $this->load->view('admin/v_row_category', $data);
    }

    public function FetchRow()
    {
        $output = array();
        $categoryid = $this->input->post('categoryid');
        $data = $this->Category_model->FetchRow($categoryid);
        foreach ($data as $row) {
            $output['categoryid'] = $row->categoryid;
            $output['categoryname'] = $row->categoryname;
            $output['status'] = $row->status;
        }
        echo json_encode($output);
    }

    public function Catdel()
    {
        $categoryid = $this->input->post('categoryid');
        $this->Category_model->CatDel($categoryid);
        redirect('admin/Category_Con');
    }

    public function UpdateCat()
    {
        $categoryname = $this->input->post('categoryname');
        $categoryid = $this->input->post('categoryid');
        $updatecategroy = $this->Category_model->UpdateCategory($categoryname, $categoryid);
        if ($updatecategroy == false) {
            $this->session->set_flashdata('success', 'Category updateed successfully');
            return redirect('category');
        } else {
            $this->session->set_flashdata('error', 'Category updateed fail');
            return redirect('category');
        }
    }

    public function UpdateStatus()
    {
        $status = $this->input->post('status');
        $categoryid = $this->input->post('categoryid');
        $updatestatus = $this->Category_model->UpdateStatus($status, $categoryid);
        if ($updatestatus == false) {
            $this->session->set_flashdata('success', 'Category Status Update Successfully');
            return redirect('category');
        } else {
            $this->session->set_flashdata('error', 'Category Status Update Fail');
            return redirect('category');
        }
    }

    public function UpdatePhoto()
    {
        $date['msg'] = "";
        $config['upload_path']          = 'assests/images';
        $config['allowed_types']        = 'gif|jpg|png|pdf|doc';
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('images')) {
            $data = $this->input->post();
            $images = $this->upload->data();
            $file = base_url("assests/images" . $images['raw_name'] . $images['file_ext']);
            $data['filepath'] = $images['raw_name'] . $images['file_ext'];
            $images = $data['filepath'];
            $categoryid = $this->input->post('categoryid');
            $this->Category_model->UpdatePhoto($images, $categoryid);
            $data['msg'] = 'Update successful.';
            redirect('admin/Category_Con');
        } else {
            redirect('admin/Category_Con');
        }
    }


    public function InsertData()
    {
        $this->form_validation->set_error_delimiters("<div class='error'>", "</div>");
        $this->form_validation->set_rules('categoryname', 'CategoryName', 'required');

        if ($this->form_validation->run() == TRUE) {
            # code...
            $data['category'] = array('categoryname' => $this->input->post('categoryname'));
            $addcategory =  $this->Category_model->InsertData('tblcategory', $data['category']);
            if ($addcategory == false) {
                $this->session->set_flashdata('success', 'Category add successfully');
                return redirect('category');
            } else {
                $this->session->set_flashdata('error', 'Category add fail');
                return redirect('category');
            }
        } else {
            $this->session->set_flashdata('error', validation_errors());
            return redirect('category');
        }
    }
}