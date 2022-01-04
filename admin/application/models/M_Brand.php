<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Brand extends CI_Model
{
    public function GetData()
    {
        $sql = $this->db->select('*')
            ->from('tblbrand')
            ->get();
        return $sql->result();
    }

    public function delete($brandid)
    {
        $this->db->where('brandid', $brandid)
            ->delete('tblbrand');
    }

    public function fetchRow($brandid)
    {
        $sql = $this->db->select('*')
            ->from('tblbrand')
            ->where('brandid', $brandid)
            ->get();
        return $sql->result();
    }

    public function updateStatus($status, $brandid)
    {
        $this->db->set('status', $status)
            ->where('brandid', $brandid)
            ->update('tblbrand');
    }

    public function AddData($tablename, $data)
    {
        $this->db->insert($tablename, $data);
    }
}

/* End of file ModelName.php */