<?php
defined('BASEPATH') or exit('No direct script access allowed');
class ManageUsers_Model extends CI_Model
{
	public function getusersdetails()
	{
		$query = $this->db->select('firstName,lastName,emailId,regDate,id')
			->get('tblusers');
		return $query->result();
	}
	//Getting particular user deatials on the basis of id	
	public function getuserdetail($uid)
	{
		$ret = $this->db->select('firstName,lastName,emailId,regDate,id,mobileNumber,lastUpdationDate')
			->where('id', $uid)
			->get('tblusers');
		return $ret->row();
	}

	// Function for use deletion
	public function deleteuser($uid)
	{
		$this->db->where('userid', $uid)
			->delete('tbluser');
	}
	public function GetUser()
	{
		$sql = $this->db->select('*')
			->from('tbluser')
			->get();
		return $sql->result();
	}

	public function AddData($tablename, $data)
	{
		$this->db->insert($tablename, $data);
	}

	public function GetRow($userid)
	{
		$sql = $this->db->select('*')
			->from('tbluser')
			->where('userid', $userid)
			->get();
		return $sql->result();
	}

	public function editStatus($status, $userid)
	{
		$this->db->set('status', $status)
			->where('userid', $userid)
			->update('tbluser');
	}
}