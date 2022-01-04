<?php
defined('BASEPATH') or exit('No direct script access allowed');
class M_login extends CI_Model
{


    public function validatelogin($email, $password, $userlevel, $status)
    {
        $sql = $this->db->select('*')
            ->from('tbluser')
            ->where(['email' => $email, 'userlevel' => $userlevel, 'status' => $status])
            ->get();
        $row = $sql->row();
        if (password_verify($password, $row->password)) {
            return $sql->row();
        } else {
            return false;
        }
    }
}