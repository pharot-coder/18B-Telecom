<?php
defined('BASEPATH') or exit('No direct script access allowed');
class User_Login_Model extends CI_Model
{


	// public function validatelogin($email, $password, $status)
	// {

	// 	$query = $this->db->where(['email' => $email, 'password' => $password]);
	// 	$account = $this->db->get('tbluser')->row();
	// 	if ($account != NULL) {
	// 		$dbstatus = $account->isActive;
	// 		//verifying status
	// 		if ($dbstatus == $status) {
	// 			return $account->id;
	// 		} else {
	// 			return NULL;
	// 			$this->session->set_flashdata('error', 'Your accounis is not active contact admin');
	// 			redirect('user/login');
	// 		}
	// 	}
	// 	return NULL;
	// }

	public function validatelogin($email, $password, $userlevel, $status)
	{
		$sql = $this->db->select('*')
			->from('tbluser')
			->where(['email' => $email, 'password' => $password, 'userlevel' => $userlevel, 'status' => $status])
			->get();
		return $sql->row();
	}
}