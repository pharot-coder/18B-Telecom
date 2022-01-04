<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_dashboard extends CI_Model
{

    public function getSaleDetial($sid)
    {
        $sql = $this->db->select('*')
            ->from('tbluser')
            ->where('userid', $sid)
            ->get();
        return $sql->result();
    }

    public function getSumBrand()
    {
        $sql = $this->db->select('*')
            ->from('tblbrand')
            ->get();
        return $sql->num_rows();
    }

    public  function getSumCategory()
    {
        $sql = $this->db->select('*')
            ->from('tblcategory')
            ->get();
        return $sql->num_rows();
    }
    public function getSumProduct()
    {
        $sql = $this->db->select('*')
            ->from('tblproduct')
            ->get();
        return $sql->num_rows();
    }

    public function total_sale_order()
    {
        $userid = $this->session->userdata('sid')->userid;
        $year = date('Y');
        $sql = $this->db->query('SELECT DATE_FORMAT(sale_date,"%M") as  month, COUNT(DATE_FORMAT(sale_date,"%M")) as count from tblsale_order
        where YEAR(sale_date) = ' . $year . ' and userid = ' . $userid . ' GROUP BY DATE_FORMAT(sale_date,"%M")
         order by max(sale_date)');
        return $sql->result_array();
    }
}

/* End of file M_dashboard.php */