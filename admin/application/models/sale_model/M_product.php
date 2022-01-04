<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_Product extends CI_Model
{

    public function getData()
    {
        $sql = $this->db->select('p.*,c.categoryname')
            ->from('tblproduct as p')
            ->join('tblcategory as c', 'p.categoryid = c.categoryid', 'left')
            ->where('p.status = 1')
            ->get();
        return $sql->result();
    }

    public function getRow($id)
    {
        $sql = $this->db->select('*')
            ->from('tblproduct')
            ->where('productid', $id)
            ->get();
        return $sql->result();
    }
}

/* End of file M_Product.php */