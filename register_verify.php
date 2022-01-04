<?php
include("includes/connect.php");
session_start();
if (empty($_SESSION['CID'])) {
    header('location: http://localhost:8888/18B-Telecom/login.php');
}
$output = array();
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$uname = $_POST['uname'];
$email = $_POST['email'];
$dob = $_POST['dob'];
$password = $_POST['password'];
$hashpassword = password_hash($password, PASSWORD_DEFAULT);
$regdate = date('d-m-Y');
if (isset($_POST['register'])) {
    try {
        $sqlcheck = "select * from tblcustomer where email = '" . $email . "' ";
        $resultcheck = $mysqli->query($sqlcheck) or die("Could Not Perform the Query");
        if ($resultcheck->num_rows > 0) {
            $output['error'] = true;
            $output['message'] = "Email already exists";
        } elseif ($password < 8) {
            $output['error'] = true;
            $output['message'] = "Password must be at least 8 characters";
        } else {
            $sqlregister = ' insert into tblcustomer (first_name,last_name,username,email,password,dob,register_date) values (
            '.$fname.', '.$lname.', '.$uname.', '.$email.','.$hashpassword.', '.$dob.', '.$regdate.'
        )';
        $mysqli->query($sqlregister) or die("Could not preform this query");
        $output['message'] = "Register Successfully, Please Login";
    }
} catch (Exception $e) {
    $output['error'] = true;
    $output['message'] = $e->getMessage();
}
}
echo json_encode($output);