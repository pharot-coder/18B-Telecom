<?php
session_start();
include 'includes/connect.php';
if(empty($_SESSION['CID'])){
	header('location: http://localhost:8888/18B-Telecom/login.php');
}

$output = array();
$orderid = $_GET['orderid'];

try {

	$sql = "SELECT od.*,o.*,p.productid as prodid,productname,p.price,p.images from tblorder_detail 
	as od LEFT JOIN tblproduct as p on od.productid =  p.productid LEFT JOIN tblorder as o ON
	od.orderid =  o.orderid where od.orderid = ".$orderid." ";
	$result = $mysqli->query($sql);
	$subtotal = 0;
	$total = 0;
	$cnt = 1;
	while ($row = $result->fetch_assoc()){
		$subtotal = $row['qty'] * $row['price'];
		$total += $subtotal;
		$cnt++;
		$output['listorder'] .='
		<tr>
		<td> '.$cnt.' </td>
		<td> <a href="product_detail.php?productid='.$row['prodid'].'" class="text-primary" > '.$row['productname'].' </a> </td>
		<td> <img src="assets/img/'.$row['images'].'" alt="'.$row['productname'].'" height="50px" width="50px" > </td>
		<td>'.$row['price'].'</td>
		<td>'.$row['qty'].'</td>
		<td>'.number_format($subtotal,2).'</td>
		</tr>
		';
	}

	$output['total'] .= '
	<b>&#36; '.number_format($total, 2).'<b>
	';
	
} catch (Exception $e) {
	echo "Error".$e->getMessage();	
}
echo json_encode($output);
