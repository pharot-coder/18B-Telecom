<?php

defined('BASEPATH') or exit('No direct script access allowed');

class C_sale_brand extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('sale_model/M_brand');
    }

    public function index()
    {
        $getData = $this->M_brand->getData();
        $this->load->view('sale/V_Brand', [
            'brandData' => $getData
        ]);
    }
}

/* End of file C_brand.php */