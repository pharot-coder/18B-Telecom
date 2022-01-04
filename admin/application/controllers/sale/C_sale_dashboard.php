<?php


defined('BASEPATH') or exit('No direct script access allowed');

class C_sale_dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('sid')) {
            return redirect('sale/login');
        }
        $this->load->model('sale_model/M_dashboard');
    }

    public function index()
    {
        $sid = $this->session->userdata('sid')->userid;
        $getDetail = $this->M_dashboard->getSaleDetial($sid);
        $sumBrand = $this->M_dashboard->getSumBrand();
        $sumCategory = $this->M_dashboard->getSumCategory();
        $sumProduct = $this->M_dashboard->getSumProduct();
        $totalSale = $this->M_dashboard->total_sale_order();
        $this->load->view('sale/V_dashboard', [
            'getDataSale' => $getDetail,
            'sumBrand' => $sumBrand,
            'sumCategory' => $sumCategory,
            'sumProduct' => $sumProduct,
            'totalSale' => $totalSale
        ]);
    }
}

/* End of file C_dashboard.php */