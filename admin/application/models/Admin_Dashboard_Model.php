<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Admin_Dashboard_Model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('adid'))
            redirect('admin/login');
    }

    public function totalcount()
    {
        $query = $this->db->select('customerid')
            ->get('tblcustomer');
        return  $query->num_rows();
    }

    public function totalproduct()
    {
        $sql = $this->db->select('productid')
            ->get('tblproduct');
        return $sql->num_rows();
    }

    public function totalcategory()
    {
        $sql = $this->db->select('categoryid')
            ->get('tblcategory');
        return $sql->num_rows();
    }

    public function totalUser()
    {
        $sql = $this->db->select('userid')
            ->get('tbluser');
        return $sql->num_rows();
    }

    public function totalOrder()
    {
        $year = date('Y');
        $sql = $this->db->query('SELECT DATE_FORMAT(order_date,"%M") as  month, COUNT(DATE_FORMAT(order_date,"%M")) as count from tblorder
        where YEAR(order_date) = ' . $year . ' GROUP BY DATE_FORMAT(order_date,"%M")
         order by max(order_date)');
        return $sql->result_array();
    }

    public function totalVisitor()
    {
        $sql = $this->db->select('DATE_FORMAT(date,"%M") as date, count(*) as countVisitor')
            ->from('tblvisitor')
            ->group_by('DATE_FORMAT(date,"%M")')
            ->order_by('max(date)')
            ->get();
        return $sql->result();
    }

    public function totalVisitorbyYear($year)
    {
        $sql = $this->db->select('DATE_FORMAT(date,"%M") as date, count(*) as countVisitor')
            ->from('tblvisitor')
            ->where('year(date)', $year)
            ->group_by('DATE_FORMAT(date,"%M")')
            ->order_by('max(date)')
            ->get();
        return $sql->result();
    }


    /* public function countlastsevendays(){
$query2=$this->db->select('userid')   
                 ->where('regDate >=  DATE(NOW()) - INTERVAL 10 DAY')
                 ->get('tbluser');
return  $query2->num_rows();
}

public function countthirtydays(){
$query3=$this->db->select('userid')   
                 ->where('regDate >=  DATE(NOW()) - INTERVAL 30 DAY')
                 ->get('tbluser');
return  $query3->num_rows();
} */
}