<?php

defined('BASEPATH') or exit('No direct script access allowed');

class C_sale_category extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('sid')) {
            return redirect('sale/login');
        }
        $this->load->model('sale_model/M_category');
    }

    public function index()
    {
        $categoryData = $this->M_category->getData();
        $this->load->view('sale/V_category', [
            'categoryData' => $categoryData
        ]);
    }
}

/* End of file C_category.php */