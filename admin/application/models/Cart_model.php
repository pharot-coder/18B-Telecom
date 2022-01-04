<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cart_model extends CI_Model
{
    /* public function GetCartRow($userid)
    {
        $sql = $this->db->select(
            'c.*',
            'p.productname',
            'p.price',
            'p.images',
            'u.first_name',
            'u.last_name',
            'u.username'
        )
            ->from('tblcart c')
            ->join('tblproduct p', 'c.productid = p.productid', 'INNER')
            ->join(' tbluser u', 'c.userid = u.userid', 'INNER')
            ->where('c.userid', $userid)
            ->get();
        return $sql->result();
    } */

    public function GetCartRow($customerid)
    {
        $sql = $this->db->query("SELECT c.*,p.productname,p.price,p.images,cu.first_name,cu.last_name,cu.username from tblcart as c 
        INNER JOIN tblproduct as p on c.productid = p.productid 
        INNER JOIN tblcustomer as cu on c.customerid = cu.customerid
        where c.customerid = " . $customerid . " ");
        return $sql->result();
    }

    public function UpdateQTY($qty, $cart_id)
    {
        $this->db->query("update tblcart set qty = " . $qty . " where cart_id = " . $cart_id . " ");
    }

    public function FetchRow($cart_id)
    {
        $sql = $this->db->select('*')
            ->from('tblcart')
            ->where('cart_id', $cart_id)
            ->get();
        return $sql->result();
    }
}

/*  
SELECT c.*,p.productname,p.price,p.images,u.first_name,u.last_name,u.username from tblcart as c INNER JOIN tblproduct as p on c.productid = p.productid 
INNER JOIN tbluser as u on c.userid = u.userid
where c.userid = 21;
*/