<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Admin_Login_Model extends CI_Model
{


	public function validatelogin($email, $password, $userlevel, $status)
	{

		$sql = $this->db->query("select * from tbluser where email = '$email' and userlevel = '$userlevel' and status='$status' ");
		$row = $sql->row();

		if (password_verify($password, $row->password)) {
			return $sql->row();
		} else {
			return false;
		}
	}
}