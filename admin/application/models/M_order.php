<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_order extends CI_Model
{

    public function GetData()
    {
        $sql = $this->db->select('o.*,c.customerid,c.username,c.images')
            ->from('tblorder as o')
            ->join('tblcustomer as c', 'c.customerid = o.customerid', 'left')
            ->order_by('o.order_date', 'desc')
            ->get();
        return $sql->result();
    }

    public function getUserRow($customerid)
    {
        $sql = $this->db->select('first_name,last_name,username,address,phone_number,email,images')
            ->from('tblcustomer')
            ->where('customerid', $customerid)
            ->get();
        return $sql->result();
    }

    public function FetRowData($orderid)
    {
        $sql = $this->db->select('*')
            ->from('tblorder')
            ->where('orderid', $orderid)
            ->get();
        return $sql->result();
    }

    public function UpdateStatus($status, $orderid)
    {
        $this->db->set('status', $status)
            ->where('orderid', $orderid)
            ->update('tblorder');
    }

    public function addNewOrderStatus($tablename, $data)
    {
        $this->db->insert($tablename, $data);
    }

    public function GetDetailOrder($orderid)
    {
        $sql = $this->db->query('SELECT od.*,p.productid as prodid,p.productname,p.images,p.price
         from tblorder_detail as od LEFT JOIN tblproduct as p 
        on od.productid = p.productid where od.orderid = "' . $orderid . '"');
        return $sql->result_array();
    }

    public function FilterOrderDate($startdate, $enddate)
    {
        $sql = $this->db->query('SELECT o.*,c.username,c.images from tblorder as o
         LEFT JOIN tblcustomer as c on o.customerid = c.customerid where o.order_date
          BETWEEN "' . $startdate . '" and "' . $enddate . '"');
        return $sql->result_array();
    }

    public function filterStatus($status)
    {
        $sql = $this->db->select('o.*,c.customerid,c.username,c.images')
            ->from('tblorder as o')
            ->join('tblcustomer as c', 'c.customerid = o.customerid', 'left')
            ->where('o.status', $status)
            ->order_by('o.order_date', 'desc')
            ->get();
        return $sql->result_array();
    }

    public function getDataOrder()
    {
        $sql = $this->db->select('*')
            ->from('tbl_order_status')
            ->get();
        return $sql->result();
    }

    public function viewOrderInvoice($orderid)
    {
        $sql = $this->db->select('o.orderid ,o.order_date, o.payment_method, c.customerid, c.username')
            ->from('tblorder as o')
            ->join('tblcustomer as c', 'o.customerid = c.customerid', 'left')
            ->where('o.orderid', $orderid)
            ->get();
        return $sql->result();
    }

    public function viewdetailOrderInvoice($orderid)
    {
        $sql = $this->db->query('SELECT od.*,p.productid as prodid,p.productname,p.images,p.price,
         o.payment_method, o.order_date, c.username
        from tblorder_detail as od LEFT JOIN tblproduct as p 
        on od.productid = p.productid 
				left JOIN tblorder as o on o.orderid = od.orderid 
				LEFT JOIN tblcustomer as c on c.customerid = o.customerid
				where od.orderid =  "' . $orderid . '"');
        return $sql->result_array();
    }
}

/* End of file ModelName.php */