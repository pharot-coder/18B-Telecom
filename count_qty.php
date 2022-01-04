<?php  
include("includes/connect.php");
$output  = array();

try {
	$productid = $_GET['productid'];
	$qty = $_GET['quantity'];
	$sql = "select productid, qty from tblproduct where productid = '".$productid."'";
	$result = $mysqli->query($sql);
	$row = $result->fetch_assoc();
	if($qty > $row['qty'])
	{
		$output['message'] = "Product quantity is out of stock";
		$output['error'] =  true;
		$output['current_qty']  = $row['qty'];
	}
} catch (Exception $e) {
	echo "This is error".$e->getMessage();
}

echo json_encode($output);

?>