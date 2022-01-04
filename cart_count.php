<?php
include("includes/connect.php");
session_start();
$output = array('count' => 0);
if (isset($_SESSION['CID'])) {
    try {
        $sql = "SELECT count(*) as cartcount from tblcart WHERE customerid =" . $_SESSION['CID'];
        $res = $mysqli->query($sql);
        $row = $res->fetch_assoc();
        $output['count']++;
        $output['count'] = $row['cartcount'];
    } catch (Exception $e) {
        echo "This is a problem" . $e->getMessage();
    }
    echo json_encode($output);
}