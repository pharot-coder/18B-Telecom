<?php
include("includes/connect.php");
session_start();

if (empty($_SESSION['CID'])) {
	header('location: http://localhost:8888/18B-Telecom/login.php');
}

if (isset($_POST['changepassword'])) {
	
	$curpassword = $_POST['curpass'];
	$newpassword = $_POST['newpass'];
	$hashpassword = password_hash($newpassword, PASSWORD_DEFAULT);
	$conpassword = $_POST['conpass'];

	try {

		$sql = "select password from tblcustomer where customerid =".$_SESSION['CID'];
		$result = $mysqli->query($sql);
		$row = $result->fetch_assoc();

		if(!password_verify($curpassword, $row['password'])){

			header('location: http://localhost:8888/18B-Telecom/usercenter.php?user_tab=change_password');
			$_SESSION['error'] = 'Current Password is incorrect';

		}elseif(strlen($newpassword) < 8 ){

			header('location: http://localhost:8888/18B-Telecom/usercenter.php?user_tab=change_password');
			$_SESSION['error'] = 'Password must be at least 8 characters';

		}else if(strlen($newpassword != $conpassword)) {

			header('location: http://localhost:8888/18B-Telecom/usercenter.php?user_tab=change_password');
			$_SESSION['error'] = ' Password is not match';

		}else{

			$sqlupdatepassword = " update tblcustomer set password='".$hashpassword."' where customerid =". $_SESSION['CID'];
			$mysqli->query($sqlupdatepassword);
			header('location: http://localhost:8888/18B-Telecom/usercenter.php?user_tab=change_password');
			$_SESSION['success'] = 'Password was change successfully';
		}
		
	} catch (Exception $e) {

		echo 'Error'.$e->getMessage();
		
	}

}