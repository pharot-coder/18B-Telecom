<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product_Model extends CI_Model
{

    public function GetData()
    {
        $sql = $this->db->query("SELECT p.*,c.categoryname,u.username from tblproduct 
        as p LEFT JOIN tblcategory 
        as c on p.categoryid = c.categoryid LEFT JOIN 
        tbluser  as u on p.userid = u.userid
        ORDER BY p.productid asc ");
        return $sql->result();
    }


    public function FetchRow($productid)
    {
        $sql = $this->db->select('*')
            ->from('tblproduct')
            ->where('productid', $productid)
            ->get();
        return $sql->result();
    }

    public function GetCategory()
    {
        $sql = $this->db->select('*')
            ->from('tblcategory')
            ->where('status', 1)
            ->get();
        return $sql->result();
    }

    public function ProductInsert($tablename, $data)
    {
        $this->db->insert($tablename, $data);
    }

    public function GetSupplier()
    {
        $sqlsupplier = $this->db->select('*')
            ->from('tblsupplier')
            ->where('status', 1)
            ->get();
        return $sqlsupplier->result();
    }

    public function GetBrand()
    {
        $sql = $this->db->select('*')
            ->from('tblbrand')
            ->where('status', 1)
            ->get();
        return $sql->result();
    }

    public function DelProduct($productid)
    {
        $this->db->where('productid', $productid)
            ->delete('tblproduct');
    }

    public function UpdatePro($productname, $description, $supplierid, $categoryid, $brandid, $cost, $price, $qty, $productid)
    {
        $this->db->query("update tblproduct set 
        productname = '$productname', 
        description = '$description', 
        supplierid = '$supplierid',
        categoryid = '$categoryid',
        brandid = '$brandid', 
        cost = '$cost', 
        price = '$price', 
        qty = '$qty'
        where productid = '$productid'");
    }

    public function UpdateStatus($status, $productid)
    {
        $this->db->query("update tblproduct set status = '" . $status . "' where productid = '" . $productid . "' ");
    }

    public function editPhoto($productid)
    {
        $this->db->select('productid, images');
        $this->db->from('tblproduct');
        $this->db->where('productid', $productid);
        $sql = $this->db->get();
        return $sql->result();
    }

    public function uploadPhoto($productid, $images)
    {
        $this->db->set('images', $images);
        $this->db->where('productid', $productid);
        $this->db->update('tblproduct');
    }

    public function uploadPhotos($dataupload = array())
    {

        $this->db->insert_batch('tblproduct_images', $dataupload);
    }

    public function getProPhotos($productid)
    {
        $sql = $this->db->select('*')
            ->from('tblproduct_images')
            ->where('productid', $productid)
            ->get();
        return $sql->result();
    }

    public function delPhotoGallery($proid)
    {
        $this->db->where('productid', $proid)
            ->delete('tblproduct_images');
    }
}