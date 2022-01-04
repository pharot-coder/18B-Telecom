<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_banner extends CI_Model
{

    protected $status;
    protected $sliderid;

    public function getData()
    {
        $sql = $this->db->select('*')
            ->from('tblslider')
            ->get();
        return $sql->result();
    }

    public function addData($tablename, $data)
    {
        $this->db->insert($tablename, $data);
    }

    public function destroy($sliderid)
    {
        $this->db->where('sliderid', $sliderid)
            ->delete('tblslider');
    }

    public function editStatus($status, $sliderid)
    {
        $this->db->set('status', $status)
            ->where('sliderid', $sliderid)
            ->update('tblslider');
    }

    public function getRow($sliderid)
    {
        $sql = $this->db->select('*')
            ->from('tblslider')
            ->where('sliderid', $sliderid)
            ->get();
        return $sql->result();
    }
}


/* End of file M_banner.php */