<?php

defined('BASEPATH') or exit('No direct script access allowed');

class C_sale_product extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('sale_model/M_product');
        if (!$this->session->userdata('sid')) {
            return redirect('sale/login');
        }
    }

    public function index()
    {
        $productData = $this->M_product->getData();
        $this->load->view('sale/V_product', [
            'productData' => $productData
        ]);
    }

    public function getRow()
    {
        $id = $this->input->get('id');
        $output = array();
        $data = $this->M_product->getRow($id);
        foreach ($data as $row) :
            $output['productid'] = $row->productid;
            $output['productname'] = $row->productname;
            $output['description'] = $row->description;
            $output['supplierid'] = $row->supplierid;
            $output['categoryid'] = $row->categoryid;
            $output['brandid'] = $row->brandid;
            $output['price'] = $row->price;
            $output['cost'] = $row->cost;
            $output['date_add'] = $row->date_add;
            $output['qty'] = $row->qty;
            $output['userid'] = $row->userid;
            $output['status'] = $row->status;
        endforeach;
        echo json_encode($output);
    }
}

/* End of file C_sale_product.php */