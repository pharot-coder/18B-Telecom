<?php
include("includes/connect.php");
session_start();
if (empty($_SESSION['CID'])) {
    header('location: http://localhost:8888/18B-Telecom/login.php');
}

$email = $_POST['email'];
$password = $_POST['password'];

if (isset($_POST['login'])) {
    $sqlcheck = "select * from tblcustomer where email = '" . $email . "' ";
    $result = $mysqli->query($sqlcheck);
    $count = mysqli_num_rows($result);
    if ($count > 0) {
        $row = $result->fetch_assoc();
        if (empty($row['status']) || $row['status'] < 0) {
            $_SESSION['error'] = "Your account is deactive, Please contact admin";
            header('location: http://localhost:8888/18B-Telecom/login.php');
        } else {
            if (password_verify($password, $row['password'])) {
                $_SESSION['CID'] = $row['customerid'];
                $_SESSION['UNAME'] = $row['username'];
                $_SESSION['FNAME'] = $row['first_name'];
                $_SESSION['LNAME'] = $row['last_name'];
                header('location: http://localhost:8888/18B-Telecom');
            } else {
                $_SESSION['error'] = "Your Password is incorrect";
                header('location: http://localhost:8888/18B-Telecom/login.php');
            }
        }
    } else {
        $_SESSION['error'] = "Your Email is incorrect";
        header('location: http://localhost:8888/18B-Telecom/login.php');
    }
}


