<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_brand extends CI_Model
{
    public function getData()
    {
        $sql = $this->db->select('*')
            ->from('tblbrand')
            ->get();
        return $sql->result();
    }
}

/* End of file M_brand.php */