<?php
include('includes/connect.php');
session_start();
if (empty($_SESSION['CID'])) {
	header('location: http://localhost:8888/18B-Telecom/login.php');
}

if (isset($_POST['cart_del'])) {
	try {
		$sql = "delete from tblcart where cart_id =" . $_POST['cart_id'];
		$mysqli->query($sql);
		echo "
		<script> document.location = 'http://localhost:8888/18B-Telecom/cart_view.php';</script>;
		";
	} catch (Exception $e) {
		"There is a problem" . $e->getMessage();
	}
}