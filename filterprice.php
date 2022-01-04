<?php
include("includes/connect.php");

$output =  '';
$minprice = $_GET['minprice'];
$maxprice = $_GET['maxprice'];

try {
	$sql = "SELECT productid,productname,price,images,categoryid from tblproduct where price BETWEEN '".$minprice."' and '".$maxprice."' and status = 1";
	$result = $mysqli->query($sql);

	if($result->num_rows > 0){

		while($rowsfilterprice = $result->fetch_assoc()){

			$output .= '
			<div class="col-lg-3 col-md-6 mb-md-6 mb-4">
			<div class="card align-items-center product-grid">
			<!-- Card image -->
			<div class="view overlay zoom">
			<img src="assets/img/' . $rowsfilterprice['images'] . '" height="300"
			class="card-img-top" alt="' . $row['productname'] . '">
			</div>
			<div class="card-body text-center">
			<h5>
			<strong>
			<a href="product_detail.php?productid=' . $rowsfilterprice['productid'] . '" class="dark-grey-text"> ' . $rowsfilterprice['productname'] . '
			</a>
			</strong>
			</h5>
			<h4 class="font-weight-bold blue-text">
			<b> &#36;  ' . number_format($rowsfilterprice['price'], 2) . ' </b>
			</h4>
			</div>
			</div>
			</div>

			<div class="product-list-view">
			<img src="assets/img/' . $rowsfilterprice['images'] . '" class="product-list-img" alt="">
			<div class="product-list-body">
			<h5>' . $rowsfilterprice['productname'] . '</h5>
			<p>
			<i class="fa fa-star rating-start"></i> <i class="fa fa-star rating-start"></i> <i class="fa fa-star rating-start"></i> <i class="fa fa-star rating-start"></i> <i class="fa fa-star rating-start"></i>
			</p>
			<p><strong> &#36;  ' . number_format($rowsfilterprice['price'], 2) . ' </strong></p>
			<a href="product_detail.php?productid=' . $rowsfilterprice['productid'] . '" class="btn btn-primary btn-sm">Read More....</a>
			</div>
			</div>

			';
		}

	}else{

		$output .= '
		<h5 class="text-center"> No Product Found </h5>
		';
	}

} catch (Exception $e) {
	$output.= $e->getMessage();
}
echo json_encode($output);
?>