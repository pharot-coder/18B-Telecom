<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_category extends CI_Model
{

    public function getData()
    {
        $sql = $this->db->select('*')
            ->from('tblcategory')
            ->get();
        return $sql->result();
    }
}

/* End of file M_category.php */