<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 * 
 */
class Cart_Con extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Cart_model');
        $this->load->helper('url_helper');
        if (!$this->session->userdata('adid'))
            redirect('admin/login');
    }

    public function ShowData($customerid)
    {
        $data['cartdata'] =  $this->Cart_model->GetCartRow($customerid);
        $this->load->view('admin/V_cart', $data);
    }

    public function UpdateQTY()
    {
        $qty = $this->input->post('qty');
        $cart_id = $this->input->post('cart_id');
        $cartupdate =  $this->Cart_model->UpdateQTY($qty, $cart_id);
        if ($cartupdate == false) {
            $this->session->set_flashdata('success', 'Quantity Updated Successfully');
            return redirect('customer');
        } else {
            $this->session->set_flashdata('error', 'Quantity Updated Fail');
            return redirect('customer');
        }
    }

    public function FetchRow()
    {
        $output = array();
        $cartid = $this->input->post('cart_id');
        $data = $this->Cart_model->FetchRow($cartid);
        foreach ($data as $row) {
            $output['cart_id'] = $row->cart_id;
            $output['qty'] = $row->qty;
            $output['cutomerid'] = $row->customerid;
            $output['productid'] = $row->productid;
        }
        echo json_encode($output);
    }
}