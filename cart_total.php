<?php
include("includes/connect.php");
session_start();
if(isset($_SESSION['CID'])){
	$customerid = $_SESSION['CID'];
	$output['total'] = 0;
	try {
		$sql  = "SELECT c.*,p.productid,p.productname,p.images,p.price from tblcart as c INNER JOIN  tblproduct as p 
		WHERE c.productid = p.productid and c.customerid = ".$customerid." ";
		$res =  $mysqli->query($sql);
		while ($row = $res->fetch_assoc()) {
			$subtotal= $row['qty'] * $row['price'];
			$output['total'] += $subtotal;
		}
	} catch (Exception $e) {
		echo "This is a problem".$e->getMassege();
	}
}
echo json_encode($output);
?>