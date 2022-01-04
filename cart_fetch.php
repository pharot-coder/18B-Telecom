<?php
include("includes/connect.php");

$sql = " SELECT c.*, p.productname from tblcart as c INNER JOIN tblproduct as p on c.productid = p.productid  WHERE c.cart_id = " . $_POST['cart_id'];
$result = $mysqli->query($sql);
$row = $result->fetch_assoc();
echo json_encode($row);