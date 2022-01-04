<?php
include("includes/connect.php");
session_start();

if (isset($_POST['upload'])) {

    try {
        $customerid = $_POST['customerid'];
        $target_dir = "assets/img/";
        $target_file = $target_dir . basename($_FILES["images"]["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
        move_uploaded_file($_FILES["images"]["tmp_name"], $target_file);
        $images = basename($_FILES["images"]["name"]);
        $sql = "update tblcustomer set images = '" . $images . "' where customerid = " . $customerid . " ";
        $result =  $mysqli->query($sql);

        if ($result == false ) {
            header('location: http://localhost:8888/18B-Telecom/usercenter.php');
            $_SESSION['error'] = "Fail to change photo";
        } else {
            header('location: http://localhost:8888/18B-Telecom/usercenter.php');
            $_SESSION['success'] = "Successfully to change photo";
        }

    } catch (Exception $e) {
        echo "This is a problem " . $e->getMessage();
    }
}