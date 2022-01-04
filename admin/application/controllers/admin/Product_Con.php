<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Product_Con extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Product_Model');
        $this->load->helper('url_helper', 'form');
        $this->load->library('form_validation');
        if (!$this->session->userdata('adid')) {
            redirect('admin/login');
        }
    }

    public function index()
    {
        $getproduct = $this->Product_Model->GetData();
        $getcategory = $this->Product_Model->GetCategory();
        $getsupplier = $this->Product_Model->GetSupplier();
        $getbrand = $this->Product_Model->GetBrand();
        $data = array(
            'product' => $getproduct,
            'category' => $getcategory,
            'supplier' => $getsupplier,
            'brand' => $getbrand
        );
        $this->load->view("admin/v_product", $data);
    }

    public function FetchRow()
    {
        $output = array();
        $productid = $this->input->post('productid');
        $data = $this->Product_Model->FetchRow($productid);
        foreach ($data as $row) {
            $output['productid'] = $row->productid;
            $output['productname'] = $row->productname;
            $output['description'] = $row->description;
            $output['supplierid'] = $row->supplierid;
            $output['categoryid'] = $row->categoryid;
            $output['brandid'] = $row->brandid;
            $output['price'] = $row->price;
            $output['cost'] = $row->cost;
            $output['date_add'] = $row->date_add;
            $output['qty'] = $row->qty;
            $output['userid'] = $row->userid;
            $output['status'] = $row->status;
        }
        echo json_encode($output);
    }

    public function InsertData()
    {
        $data['msg'] = "";
        $config['upload_path']          = '../assets/img/';
        $config['allowed_types']        = 'gif|jpg|png|';
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('images')) {
            $data = $this->input->post();
            $images = $this->upload->data();
            $dateadd = date('Y-m-d');
            $file = base_url("../assets/img/" . $images['raw_name'] . $images['file_ext']);
            $data['filepath'] = $images['raw_name'] . $images['file_ext'];
            $data['product']  = array(
                'productname' => $this->input->post('productname'),
                'description' => $this->input->post('description'),
                'supplierid' => $this->input->post('supplierid'),
                'categoryid' => $this->input->post('categoryid'),
                'brandid' => $this->input->post('brandid'),
                'images' => $data['filepath'],
                'price' => $this->input->post('price'),
                'cost' => $this->input->post('cost'),
                'qty' => $this->input->post('qty'),
                'userid' => $this->input->post('userid'),
                'date_add' => $dateadd
            );
            $this->Product_Model->ProductInsert('tblproduct', $data['product']);
            $getproduct = $this->Product_Model->GetData();
            $getcategory = $this->Product_Model->GetCategory();
            $getsupplier = $this->Product_Model->GetSupplier();
            $getbrand = $this->Product_Model->GetBrand();
            $data = array(
                'product' => $getproduct,
                'category' => $getcategory,
                'supplier' => $getsupplier,
                'brand' => $getbrand
            );
            $this->session->set_flashdata('success', 'Insert Successfully');
            return redirect('product');
        } else {
            $getproduct = $this->Product_Model->GetData();
            $getcategory = $this->Product_Model->GetCategory();
            $getsupplier = $this->Product_Model->GetSupplier();
            $getbrand = $this->Product_Model->GetBrand();
            $data = array(
                'product' => $getproduct,
                'category' => $getcategory,
                'supplier' => $getsupplier,
                'brand' => $getbrand
            );
            $this->session->set_flashdata('error', 'Insert Fail, Please try again later');
            return redirect('product');
        }
        //return redirect("admin/Product_Con");
    }
    public function DelProduct()
    {
        $productid = $this->input->post('productid');
        $this->Product_Model->DelProduct($productid);
        $this->session->set_flashdata('success', 'Delete Successfully');
        return redirect('product');
    }

    public function UpdatePro()
    {
        $productname = $this->input->post('productname');
        $description = $this->input->post('description');
        $supplierid = $this->input->post('supplierid');
        $categoryid = $this->input->post('categoryid');
        $brandid = $this->input->post('brandid');
        $cost = $this->input->post('cost');
        $price = $this->input->post('price');
        $qty = $this->input->post('qty');
        $productid = $this->input->post('productid');
        $updatedata = $this->Product_Model->UpdatePro($productname, $description, $supplierid, $categoryid, $brandid, $cost, $price, $qty, $productid);
        if ($updatedata == true) {
            $this->session->set_flashdata('error', 'Product Update Fail');
            return redirect('product');
        } else {
            $this->session->set_flashdata('success', 'Product Update Successfully');
            return redirect('product');
        }
    }

    public function UpdateStatus()
    {
        $status = $this->input->post('status');
        $productid = $this->input->post('productid');
        $updatestatus =  $this->Product_Model->UpdateStatus($status, $productid);
        if ($updatestatus->error) {
            $this->session->set_flashdata('error', 'Product Status Updated Fail');
            return redirect('product');
        } else {
            $this->session->set_flashdata('success', 'Product Status Updated Successfully');
            return redirect('product');
        }
    }

    public function editPhoto($productid)
    {
        $img = $this->Product_Model->editPhoto($productid);
        $imgGalleryData = $this->Product_Model->getProPhotos($productid);
        $this->load->view('admin/V_productimage', [
            'imgdata' => $img,
            'imgGalleryData' => $imgGalleryData
        ]);
    }

    public function uploadPhotos()
    {
        $productid = $this->input->post('productid');
        $this->load->library('upload');
        $dataupload = array();
        $ImageCount = count($_FILES['galleryimages']['name']);
        for ($i = 0; $i < $ImageCount; $i++) {
            $_FILES['file']['name']       = $_FILES['galleryimages']['name'][$i];
            $_FILES['file']['type']       = $_FILES['galleryimages']['type'][$i];
            $_FILES['file']['tmp_name']   = $_FILES['galleryimages']['tmp_name'][$i];
            $_FILES['file']['error']      = $_FILES['galleryimages']['error'][$i];
            $_FILES['file']['size']       = $_FILES['galleryimages']['size'][$i];

            // File upload configuration
            $uploadPath = '../assets/img/';
            $config['upload_path'] = $uploadPath;
            $config['allowed_types'] = 'jpg|jpeg|png|gif';

            // Load and initialize upload library
            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            // Upload file to server
            if ($this->upload->do_upload('file')) {
                // Uploaded file data
                $imageData = $this->upload->data();
                $uploadImgData[$i]['images'] = $imageData['file_name'];
                $uploadImgData[$i]['productid'] = $productid;
            }
        }

        if (!empty($uploadImgData)) {
            // Insert files data into the database
            $this->Product_Model->uploadPhotos($uploadImgData);
            $this->session->set_flashdata('success', 'Product photos gallery upload Successfully');
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            $this->session->set_flashdata('error', 'Product Photos gallery upload Fail');
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function uploadPhoto()
    {
        $config['upload_path']          = '../assets/img/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('images')) {
            $productid  = $this->input->post('productid');
            $data = $this->input->post();
            $images = $this->upload->data();
            $file = base_url("../assets/img/" . $images['raw_name'] . $images['file_ext']);
            $data['filepath'] = $images['raw_name'] . $images['file_ext'];
            $this->Product_Model->uploadPhoto($productid, $data['filepath']);
            $this->session->set_flashdata('success', 'Product Photos update success');
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            $this->session->set_flashdata('error', 'Product Photos update Fail');
            redirect($_SERVER['HTTP_REFERER']);
        }
    }


    public function delPhotoGallery()
    {
        $proid = $this->input->post('productid');
        $delPhoto = $this->Product_Model->delPhotoGallery($proid);
        if ($delPhoto == false) {
            $this->session->set_flashdata('success', 'Product Gallery Remove Successfully');
            return redirect('product');
        } else {
            $this->session->set_flashdata('error', 'Product Gallery Remove Fail');
            return redirect('product');
        }
    }
}