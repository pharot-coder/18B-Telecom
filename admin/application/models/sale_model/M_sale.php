<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_sale extends CI_Model
{

    public function getProduct()
    {
        $sql = $this->db->select('productid, productname,price,images')
            ->from('tblproduct')
            ->where('status = 1')
            ->get();
        return $sql->result();
    }

    public function getCostProduct($proid)
    {
        $sql = $this->db->select('productid,price')
            ->from('tblproduct')
            ->where('productid', $proid)
            ->get();
        return $sql->result();
    }

    public function getData($userid)
    {
        $sql = $this->db->select('*')
            ->from('tblsale_order')
            ->where('userid', $userid)
            ->order_by('sale_date desc')
            ->get();
        return $sql->result();
    }

    public function getRow($sale_id)
    {
        $sql  = $this->db->select('*')
            ->from('tblsale_order')
            ->where('sale_orderid', $sale_id)
            ->get();
        return $sql->result();
    }

    public function getDetailSale($sale_id)
    {
        $sql = $this->db->select('sod.*,productname')
            ->from('tblsale_orderdetail as sod')
            ->join('tblproduct as p', 'sod.productid = p.productid', 'left')
            ->where('sale_orderid', $sale_id)
            ->get();
        return $sql->result_array();
    }

    public function getSale_OrderDetail($sale_id)
    {
        $sql = $this->db->select('sod.*,productname')
            ->from('tblsale_orderdetail as sod')
            ->join('tblproduct as p', 'sod.productid = p.productid', 'left')
            ->where('sale_orderid', $sale_id)
            ->get();
        return $sql->result_array();
    }

    public function getSale_Order($sale_id)
    {
        $sql  = $this->db->select('*')
            ->from('tblsale_order')
            ->where('sale_orderid', $sale_id)
            ->get();
        return $sql->result();
    }

    public function countQty($productid)
    {
        $sql = $this->db->select('productid, qty')
            ->from('tblproduct')
            ->where('productid', $productid)
            ->get();
        return $sql->result();
    }
}

/* End of file M_sale.php */