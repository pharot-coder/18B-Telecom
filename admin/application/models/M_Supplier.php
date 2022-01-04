<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Supplier extends CI_Model
{
    public function GetData()
    {
        $sql = $this->db->select('*')
            ->from('tblsupplier')
            ->get();
        return $sql->result();
    }

    public function AddData($tablename, $data)
    {
        $this->db->insert($tablename, $data);
    }

    public function DeleteData($supplierid)
    {
        $this->db->where('supplierid', $supplierid)
            ->delete('tblsupplier');
    }

    public function FetRowData($supplierid)
    {
        $sql = $this->db->select('*')
            ->from('tblsupplier')
            ->where('supplierid', $supplierid)
            ->get();
        return $sql->result();
    }
}

/* End of file ModelName.php */