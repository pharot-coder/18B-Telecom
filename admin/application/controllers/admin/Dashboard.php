<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Dashboard extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('adid'))
            redirect('admin/login');
    }

    public function index()
    {
        $this->load->model('Admin_Dashboard_Model');
        $totalcount = $this->Admin_Dashboard_Model->totalcount();
        $totalprod = $this->Admin_Dashboard_Model->totalproduct();
        $totalcategory = $this->Admin_Dashboard_Model->totalcategory();
        $totalorder = $this->Admin_Dashboard_Model->totalOrder();
        $tusers = $this->Admin_Dashboard_Model->totalUser();
        $totalVisitor = $this->Admin_Dashboard_Model->totalVisitor();
        $this->load->view('admin/dashboard', [
            'tcount' => $totalcount,
            'totalproduct' => $totalprod,
            'totalcategory' => $totalcategory,
            'torder' => $totalorder,
            'tusers' => $tusers,
            'tVisitor' => $totalVisitor
        ]);
    }



    // public function get_chart_data()
    // {
    //     $output = array('label' => '', 'data' => '');
    //     $this->load->model('Admin_Dashboard_Model');
    //     $data = $this->Admin_Dashboard_Model->totalOrder();
    //     foreach ($data  as $row) {
    //         $output['label'] .= '' . $row['month'] . '';
    //         $output['data'] .= ' ' . $row['count'] . ' ';
    //     }
    //     echo json_encode($output);
    // }
}