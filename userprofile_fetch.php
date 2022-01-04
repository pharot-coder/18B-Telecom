<?php
include("includes/connect.php");
$customerid = $_POST['customerid'];
try {
	$sql = "select * from tblcustomer where customerid = " . $customerid . " ";
	$result = $mysqli->query($sql);
	$row = $result->fetch_assoc();
} catch (Exception $e) {
	echo "This is a problem" . $e->getMessage();
}
echo json_encode($row);