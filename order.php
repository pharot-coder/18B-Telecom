<?php
include("includes/connect.php");
session_start();
if (empty($_SESSION['CID'])) {
	header('location: http://localhost:8888/18B-Telecom/login.php');
}

$phonenumber = $_POST['phonenumber'];
$address = $_POST['address'];
$date = date('Y-m-d');
$customerid =  $_SESSION['CID'];
$password  = $_POST['password'];
$paymentmethod = $_POST['paymentmethod'];
$target_dir = "assets/img/";
$target_file = $target_dir . basename($_FILES["transaction_photo"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
move_uploaded_file($_FILES["transaction_photo"]["tmp_name"], $target_file);
$transaction_image = basename($_FILES["transaction_photo"]["name"]);



if(isset($_POST['ordersubmit'])){
	try {


		$sqlcheckpassword = "select password from tblcustomer where customerid =".$_SESSION['CID'];
		$resultcheck = $mysqli->query($sqlcheckpassword);
		$rowcheck = $resultcheck->fetch_assoc();
		if(password_verify($password, $rowcheck['password'])){

			if($phonenumber == "" && $address == ""){

				header('location: http://localhost:8888/18B-Telecom/usercenter.php?user_tab=account_setting');
				$_SESSION['error'] = "Please fill phone number and address before checkhout";

			}else{
						// Allow certain file formats
				if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
					&& $imageFileType != "gif" ) {
					$_SESSION['error'] = 'Sorry, only JPG, JPEG, PNG & GIF files are allowed.';
				header('location: http://localhost:8888/18B-Telecom/checkout_page.php');
				$uploadOk = 0;
			}else{
				$sql = "INSERT INTO tblorder (order_date,payment_method,payment_transaction_image,customerid) VALUES ('".$date."', '".$paymentmethod."', '".$transaction_image."', '".$customerid."') ";
				$mysqli->query($sql);
				$Orderid = $mysqli->insert_id;

				try {

					$sql = "SELECT c.*,p.productname,p.price FROM tblcart as c LEFT JOIN tblproduct as p on c.productid = p.productid where c.customerid =".$_SESSION['CID'];
					$result = $mysqli->query($sql);

					while($row = $result->fetch_assoc()){
						$productid = $row['productid'];
						$qty = $row['qty'];
						$sqlinsert = "INSERT INTO tblorder_detail (orderid,productid,qty) VALUES 
						(".$Orderid.",".$productid.",".$qty.")";
						$mysqli->query($sqlinsert);
					}

					$sqldel = "delete from tblcart where customerid =".$_SESSION['CID'];
					$mysqli->query($sqldel);

					$_SESSION['success'] = " Order Successfully, Thank You for choosing my store";
					header('location: http://localhost:8888/18B-Telecom/success_checkout.php');


				} catch (Exception $e) {
					echo "Error".$e->getMessage();
				}

			}

			
		}

	}else{
		header('location: http://localhost:8888/18B-Telecom/checkout_page.php');
		$_SESSION['error'] = "Your Password is incorrect";
	}

} catch (Exception $e) {

	echo "Error".$e->getMessage();

}
}
?>