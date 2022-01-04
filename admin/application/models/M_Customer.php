<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Customer extends CI_Model
{


    public function GetData()
    {
        $sql = $this->db->select('*')
            ->from('tblcustomer')
            ->get();
        return $sql->result();
    }

    public function addData($tablename, $data)
    {
        $this->db->insert($tablename, $data);
    }

    public function deleteData($customerid)
    {
        $this->db->delete('tblcustomer', array('customerid' => $customerid));
    }

    public function UpdateStatus($status, $customerid)
    {
        $this->db->set('status', $status)
            ->where('customerid', $customerid)
            ->update('tblcustomer');
    }

    public function updateData($customerid, $first_name, $last_name, $username, $address, $phonenumber, $email, $password)
    {
        $data = array(
            'first_name' => $first_name,
            'last_name' => $last_name,
            'username' => $username,
            'address' => $address,
            'phone_number' => $phonenumber,
            'email' => $email,
            'password' => $password
        );
        $this->db->where('customerid', $customerid);
        $this->db->update('tblcustomer', $data);
    }

    public function FetchRow($customerid)
    {
        $sql =  $this->db->select('*')
            ->from('tblcustomer')
            ->where('customerid', $customerid)
            ->get();
        return $sql->result();
    }
}

/* End of file M_Customer.php */