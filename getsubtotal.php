<?php
include 'includes/connect.php';
session_start();
if(empty($_SESSION['CID'])){
	header('location: http://localhost:8888/18B-Telecom');
}

if(isset($_SESSION['CID'])){
	$output['subtotal'] = 0;
	$customerid = $_SESSION['CID'];
	$cartid = $_GET['cartid'];
	try {
		$sql = "SELECT c.*,p.price from tblcart as c inner JOIN tblproduct as p on c.productid = p.productid where c.customerid = ".$customerid." and c.cart_id = ".$cartid." ";
		$res = $mysqli->query($sql);
		$row = $res->fetch_assoc();
		$output['subtotal'] = $row['qty'] * $row['price'];
		
	} catch (Exception $e) {
		echo "This a problem".$e->getMessage();	
	}
}
echo json_encode($output);
?>