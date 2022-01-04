<?php
include("includes/connect.php");
$output = array('error' => false);
$cartid = $_POST['cartid'];
$qty = $_POST['qty'];
$productid = $_POST['productid'];
try {
 $sql = "select qty from tblproduct where productid = '".$productid."'";
 $res = $mysqli->query($sql);
 $row = $res->fetch_assoc();
 if($qty > $row['qty'])
 {
    $output['message'] = "Product quantity is out of stock";
    $output['error'] =  true;
    $output['current_qty']  = $row['qty'];
}
else
{

    $sql1 = "update tblcart set qty = '$qty' where cart_id = '$cartid' ";
    $mysqli->query($sql1);

}

} catch (Exception $e) {
    $output['error'] = $e->getMessage();
}
echo json_encode($output);