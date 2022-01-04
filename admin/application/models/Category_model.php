<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 * 
 */
class Category_model extends CI_Model
{
	public function GetData()
	{
		$sql = $this->db->select('*')
			->from('tblcategory')
			->get();
		return $sql->result();
	}

	public function GetRow($id)
	{
		$sql = $this->db->select('*')
			->from('tblcategory')
			->where('categoryid', $id)
			->get();
		return $sql->result();
	}

	public function FetchRow($categoryid)
	{
		$sql = $this->db->select('*')
			->from('tblcategory')
			->where('categoryid', $categoryid)
			->get();
		return $sql->result();
	}

	public function CatDel($categoryid)
	{
		$this->db->where('categoryid', $categoryid)
			->delete('tblcategory');
	}

	public function UpdateStatus($status, $categoryid)
	{
		$data = array(
			'status' => $status
		);
		$this->db->where('categoryid', $categoryid);
		$this->db->update('tblcategory', $data);
	}


	public function InsertData($tablename, $data)
	{
		$this->db->insert($tablename, $data);
	}

	public function UpdateCategory($categoryname, $categoryid)
	{
		$data = array(
			'categoryname' => $categoryname
		);
		$this->db->where('categoryid', $categoryid);
		$this->db->update('tblcategory', $data);
	}

	public function UpdatePhoto($images, $categoryid)
	{
		$data = array(
			'images' => $images
		);
		$this->db->where('categoryid', $categoryid);
		$this->db->update('tblcategory', $data);
	}
}