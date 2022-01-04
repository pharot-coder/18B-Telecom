<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_invoice extends CI_Model
{
    public function getData()
    {
        $sql = $this->db->select('i.*,o.order_date,o.payment_method,c.username as customername')
            ->from('tblinvoice as i')
            ->join('tblorder as o', 'i.orderid = o.orderid', 'left')
            ->join('tblcustomer as c', 'o.customerid = c.customerid', 'left')
            ->order_by('i.date', 'desc')
            ->get();
        return $sql->result();
    }

    public function getDataInvoiceRow($invoiceid)
    {
        $sql = $this->db->select('i.*,o.order_date,c.username as customername')
            ->from('tblinvoice as i')
            ->join('tblorder as o', 'i.orderid = o.orderid', 'left')
            ->join('tblcustomer as c', 'o.customerid = c.customerid', 'left')
            ->where('invoiceid', $invoiceid)
            ->get();
        return $sql->result();
    }

    public function getDetailRow($invoiceid)
    {
        $sql = $this->db->select('id.*,p.productname, p.price')
            ->from('tblinvoice_detail as id')
            ->join('tblproduct as p', 'id.productid  =  p.productid', 'left')
            ->where('id.invoiceid', $invoiceid)
            ->get();
        return $sql->result_array();
    }

    public function getOrderID($orderid)
    {
        $sql =  $this->db->select('*')
            ->from('tblinvoice')
            ->where('orderid', $orderid)
            ->get();
        return $sql->result();
    }

    public function addData($tablename, $data)
    {
        $this->db->insert($tablename, $data);
        $lastid = $this->db->insert_id();
        return $lastid;
    }

    public function addDataDeatil($tablename, $data)
    {
        $this->db->insert_batch($tablename, $data);
    }

    public function destroy($invoiceid)
    {
        $this->db->delete('tblinvoice', array(
            'invoiceid' => $invoiceid
        ));
    }


    public function getInvoiceDetail($invoiceid)
    {
        $sql = $this->db->select('id.*,p.productname, p.price')
            ->from('tblinvoice_detail as id')
            ->join('tblproduct as p', 'id.productid  =  p.productid', 'left')
            ->where('id.invoiceid', $invoiceid)
            ->get();
        return $sql->result_array();
    }

    public function getInvoiceData($invoiceid)
    {
        $sql = $this->db->select('i.*,o.order_date,c.username as customername')
            ->from('tblinvoice as i')
            ->join('tblorder as o', 'i.orderid = o.orderid', 'left')
            ->join('tblcustomer as c', 'o.customerid = c.customerid', 'left')
            ->where('invoiceid', $invoiceid)
            ->get();
        return $sql->result();
    }

    // public function viewOrder($orderid)
    // {
    //     $sql = $this->db->select('o.orderid ,o.order_date, o.payment_method, c.customerid, c.username')
    //         ->from('tblorder as o')
    //         ->join('tblcustomer as c', 'o.customerid = c.customerid', 'left')
    //         ->where('o.orderid', $orderid)
    //         ->get();
    //     return $sql->result();
    // }

    // public function getOrderDeatail($orderid)
    // {
    //     $sql = $this->db->query('SELECT od.*,p.productid as prodid,p.productname,p.images,p.price,
    //      o.payment_method, o.order_date, c.username
    //     from tblorder_detail as od LEFT JOIN tblproduct as p 
    //     on od.productid = p.productid 
    // 			left JOIN tblorder as o on o.orderid = od.orderid 
    // 			LEFT JOIN tblcustomer as c on c.customerid = o.customerid
    // 			where od.orderid =  "' . $orderid . '"');
    //     return $sql->result_array();
    // }
}

/* End of file M_invoice.php */