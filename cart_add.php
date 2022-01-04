<?php
include('includes/connect.php');
session_start();

$output = array();
$id = $_POST['productid'];
$qty = $_POST['quantity'];

if (empty($_SESSION['CID'])) {

    $output['error'] = true;
    $output['message'] = "Please Login for add product to cart";

} else {

    try {

        $sql = "SELECT COUNT(*) as countrow FROM tblcart where productid = '" . $id . "' and customerid =  '" . $_SESSION['CID'] . "' ";
        $result = $mysqli->query($sql);
        $row = $result->fetch_array();

        if ($row['countrow'] < 1) {
            try {
                $sql1 = " insert into tblcart ( productid, customerid, qty ) values ( " . $id . ", " . $_SESSION['CID'] . ", " . $qty . " ) ";
                $mysqli->query($sql1);
                $output['message'] = 'Product added to cart';
            } catch (Exception $e) {
                $output['error'] = true;
                $output['message'] = $e->getMessage();
            }
        } else {
            $output['error'] = true;
            $output['message'] = 'Product already in cart';
        }
        
    } catch (Exception $e) {
        echo "Error" . $e->getMessage();
    }

}

echo json_encode($output);