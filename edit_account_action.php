<?php
include("includes/connect.php");
session_start();
if (empty($_SESSION['CID'])) {
    header('location: http://localhost:8888/18B-Telecom/login.php');
}

if(isset($_POST['change_submit'])){

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $uname = $_POST['uname'];
    $phonenumber = $_POST['phonenumber'];
    $email = $_POST['email'];
    $address = $_POST['address'];

    try {

        $sql = "UPDATE tblcustomer SET first_name = '$fname', last_name='$lname',username='$uname', address='$address', phone_number='$phonenumber', email='$email'  where customerid =".$_SESSION['CID'];
        $result = $mysqli->query($sql) or die ("Could not preform this query");
        if($result){
            $_SESSION['success'] = "Your account was change successfully";
            header('location: http://localhost:8888/18B-Telecom/usercenter.php?user_tab=account_setting');
        }
        else
        {
            $_SESSION['error'] = "Your account was change fail...!";
            header('location: http://localhost:8888/18B-Telecom/usercenter.php?user_tab=account_setting');
        }

    } catch (Exception $e) {
        echo "Error". $e->getMessage();
    }

}

?>