<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_profile_setting extends CI_Model
{

    public function getData($userid)
    {
        $sql = $this->db->select('*')
            ->from('tbluser')
            ->where('userid', $userid)
            ->get();
        return $sql->result();
    }

    public function editProfile($userid, $username, $first_name, $last_name, $phone_number, $address, $email)
    {
        $data = array(
            'first_name' => $first_name,
            'last_name' => $last_name,
            'username' => $username,
            'phone' => $phone_number,
            'address' => $address,
            'email' => $email
        );
        $this->db->where('userid', $userid);
        $this->db->update('tbluser', $data);
    }

    public function editPhoto($userid, $images)
    {
        $this->db->set('images', $images);
        $this->db->where('userid', $userid);
        $this->db->update('tbluser');
    }
}

/* End of file M_profile_setting.php */