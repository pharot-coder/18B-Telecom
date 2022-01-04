<?php
include("includes/connect.php");

$output =  '';
$minprice = $_GET['minprice'];
$maxprice = $_GET['maxprice'];
$brandname = $_GET['brandname'];

try {
	$sql = "SELECT p.productid,p.productname,p.price,p.images,p.categoryid, b.brandname 
	from tblproduct as p left JOIN tblbrand as b on p.brandid = b.brandid  
	where p.price BETWEEN '$minprice' and '$maxprice' and b.brandname = '$brandname'  and p.status =1";
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
		<div class="text-left">
		No data found
		</div>
		';

	}

} catch (Exception $e) {
	$output.= $e->getMessage();
}
echo json_encode($output);
?>