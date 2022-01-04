<?php

defined('BASEPATH') or exit('No direct script access allowed');

class C_sale_sale extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('sale_model/M_sale');
    }

    public function index()
    {
        $userid = $this->session->userdata('sid')->userid;
        $getData = $this->M_sale->getData($userid);
        $this->load->view('sale/V_sale', [
            'saleData' => $getData
        ]);
    }

    public function addSaleOrder()
    {
        $getProduct  = $this->M_sale->getProduct();
        $this->load->view('sale/V_add_sale_order', [
            'productData' => $getProduct
        ]);
    }

    public function getCostProduct()
    {
        $proid = $this->input->post('productid');
        $output = array();
        $data = $this->M_sale->getCostProduct($proid);
        foreach ($data as $row) {
            $output['productid'] = $row->productid;
            $output['cost'] = $row->price;
        }
        echo json_encode($output);
    }

    public function getProduct()
    {
        $out = '';
        $data = $this->M_sale->getProduct();
        foreach ($data as $row) :
            $out .= '<option value="' . $row->productid . '" >   ' . $row->productname . ' </option> ';
        endforeach;
        echo json_encode($out);
    }

    public function getRow()
    {
        $sale_id = $this->input->get('sale_id');
        $out = array();
        $data = $this->M_sale->getRow($sale_id);
        foreach ($data as $row) {
            $out['sale_orderid']  = $row->sale_orderid;
            $out['phone_number'] = $row->phone_number;
            $out['place'] = $row->place;
            $out['devlivery_type'] = $row->delivery_type;
            $out['sale_date'] = $row->sale_date;
            $out['cash_in'] = $row->cash_in;
            $out['userid'] = $row->userid;
            $out['income'] = $row->income;
            $out['total_cost'] = $row->total_cost;
            $out['delivery_fee'] = $row->delivery_fee;
        }
        echo json_encode($out);
    }

    public function storeData()
    {
        $product_id = $this->input->post('product_id', TRUE);
        $qty = $this->input->post('order_item_quantity', TRUE);
        $price = $this->input->post('order_item_price', TRUE);
        $userid = $this->session->userdata('sid')->userid;
        $date = $this->input->post('sale_date');
        $income = $this->input->post('income');
        $delivery_fee = $this->input->post('delivery_fee');
        $cash_in = $this->input->post('cash_in');
        $delivery_type = $this->input->post('delivery_type');
        $remark = $this->input->post('remark');
        $place = $this->input->post('place');
        $phone_number = $this->input->post('phone_number');
        $total_cost = $this->input->post('total_cost');
        $data = array(
            'sale_date' => $date,
            'phone_number' => $phone_number,
            'place' => $place,
            'delivery_type' => $delivery_type,
            'userid' => $userid,
            'delivery_fee' => $delivery_fee,
            'total_cost' => $total_cost,
            'income' => $income,
            'cash_in' => $cash_in,
            'remark' => $remark
        );
        $addData = $this->db->insert('tblsale_order', $data);
        $lastid = $this->db->insert_id();
        $data_detail = array();
        if ($addData) {
            foreach ($product_id as $key => $val) :
                $data_detail[] = array(
                    'sale_orderid' => $lastid,
                    'productid' => $val,
                    'qty' => $qty[$key],
                    'price' => $price[$key]
                );
            endforeach;
            $this->db->insert_batch('tblsale_orderdetail', $data_detail);
            $this->session->set_flashdata('success', 'Create Order Successfully');
            return redirect('sale/sale_order');
        } else {
            $this->session->set_flashdata('error', 'Create Order fail');
            return redirect('sale/sale_order');
        }
    }

    public function getDetailSale()
    {
        $sale_id = $this->input->get('sale_id');
        $output = array('detail' => '', 'total' => '');
        $cnt = 0;
        $data = $this->M_sale->getDetailSale($sale_id);
        $count = count($data);
        $subtotal = 0;
        $total  = 0;
        if ($count > 0) {
            foreach ($data as $row) {
                $cnt++;
                $subtotal = $row['qty'] * $row['price'];
                $total += $subtotal;
                $output['detail'] .= '
                                    <tr>
                                        <td> ' . $cnt . ' </td>
                                        <td> ' . $row['productname'] . ' </td>
                                        <td> ' . $row['price'] . ' </td>
                                        <td> ' . $row['qty'] . '</td>
                                        <td> &#36; ' . number_format($subtotal, 2) . ' </td>
                                    </tr>
                ';
            }

            $output['total'] .= '
            &#36;  ' . number_format($total, 2) . '
           ';
        } else {
            $output['detail'] .= '
            <tr>
                <td colspan="6"> No data found </td>
            </tr>
            ';
            $output['total'] .= '
            &#36;  ' . number_format($total, 2) . '
           ';
        }
        echo json_encode($output);
    }


    public function createInvoice($sale_id)
    {
        $data =  array(
            'dataInvoceDetail' => $this->M_sale->getSale_OrderDetail($sale_id),
            'dataInvoice' => $this->M_sale->getSale_Order($sale_id)
        );
        $this->load->view('sale/V_printInvoice', $data);
    }

    public function countQty()
    {
        $product_id = $this->input->get('productid');
        $qty = $this->input->get('qty');
        $output = array();
        $dataQty =  $this->M_sale->countQty($product_id);

        foreach ($dataQty as $row) {
            if ($qty > $row->qty) {
                $output['message'] = " Product quantity is out of stock";
                $output['error'] = true;
                $output['current_qty'] = $row->qty;
            }
        }
        echo json_encode($output);
    }
}

/* End of file C_sale_sale.php */