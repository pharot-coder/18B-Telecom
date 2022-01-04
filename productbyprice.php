<?php include('includes/connect.php');
session_start();
?>

<!DOCTYPE html>
<html>

<head>
	<?php include("includes/header.php"); ?>
</head>

<body>
	<?php include("includes/navbar.php"); ?>

	<!-- Sidebar -->
	<div id="wrapper" class="wrapper" >

		<?php include 'includes/sidenav.php'; ?>

		<div id="content-wrapper" class="content-wrapper">
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="#">Home</a></li>
					<li class="breadcrumb-item active">All Products</li>
				</ol>
			</nav>
			<a href="#" id="sidebarshowBtn"  ><i class="fas fa-bars"></i></a>

			<div class="container">
				<div class="d-flex justify-content-end">
					<div class="btn-group">
						<button class="btn btn-sm" id="btnlist" ><i class="fa fa-bars"></i> </button> 
						<button class="btn btn-sm  active" id="btngrid" ><i class="fa fa-th-large"></i> </button>
					</div>
				</div>
				<!-- Section: Products v.3 -->
				<section class="text-center">
					<!-- Section heading -->
					<h3 class="h2-responsive font-weight-bold text-left">All Products</h3>
					<hr>
					<!-- Grid row -->
					<div class="row productrow">
						<?php
						try {
							$limit = 8;
							$page = isset($_GET['page']) ? $_GET['page'] : 1;
							$start = ($page - 1) * $limit;
							$sqlproduct =  "SELECT * from tblproduct WHERE `status`=1 LIMIT $start, $limit ";
							$res = $mysqli->query($sqlproduct);
							while ($row = $res->fetch_assoc()) {
								echo '
								<!-- Grid column -->
								<div class="col-lg-3 col-md-6 mb-md-6 mb-4">
								<!-- Card -->
								<div class="card  hoverable align-items-center product-grid">
								<!-- Card image -->
								<div class="view overlay zoom">
								<img src="assets/img/' . $row['images'] . '" height="300"
								class="card-img-top" alt="' . $row['productname'] . '">
								</div>
								<!-- Card image -->
								<!-- Card content -->
								<div class="card-body text-center">
								<h5>
								<strong>
								<a href="product_detail.php?productid=' . $row['productid'] . '" class="dark-grey-text"> ' . $row['productname'] . '
								</a>
								</strong>
								</h5>
								<p>
								<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
								</p>
								<h4 class="font-weight-bold blue-text">
								<strong> &#36;  ' . number_format($row['price'], 2) . ' </strong>
								</h4>
								</div>
								<!-- Card content -->
								</div>
								</div>
								
								<div class="product-list-view">
								<img src="assets/img/' . $row['images'] . '" class="product-list-img" alt="">
								<div class="product-list-body">
								<h5>' . $row['productname'] . '</h5>
								<p><strong> &#36;  ' . number_format($row['price'], 2) . ' </strong></p>
								<a href="product_detail.php?productid=' . $row['productid'] . '" class="btn btn-primary btn-sm">Read More....</a>
								</div>
								</div>

								';
							}
						} catch (Exception $e) {
							echo "This is problem" . $e->getMessage();
						}

						$sql1 = "SELECT count(productid) AS proid FROM tblproduct";
						$result1 = $mysqli->query($sql1);
						$procount = $result1->fetch_array();
						$totalpage = $procount[0]['proid'];
						$pages = ceil( $totalpage / $limit );
						$Previous = $page - 1;
						$Next = $page + 1;
						?>

					</div>
				</section>
				<!-- Section: Products v.3 -->
				<div class="d-flex justify-content-center">
					<nav aria-label="Page navigation example">
						<ul class="pagination pg-blue">
							<?php

							if($Previous == 0){
								echo '
								<li class="page-item disabled">
								<a class="page-link" tabindex="-1">Previous</a>
								</li>
								';
							}else{
								echo '
								<li class="page-item ">
								<a href="allproducts.php?page='.$Previous.'" class="page-link" tabindex="1">Previous</a>
								</li>
								';
							}
							?>

							<!--  <li class="page-item active"><a class="page-link">1</a></li> -->

							<?php for($i = 1; $i <= $pages; $i++){
								echo '
								<li class="page-item active"><a class="page-link" href="allproducts.php?page='.$i.'" > '.$i.' </a></li>
								';

							} 
							
							?>
							
							<li class="page-item ">
								<a href="allproducts.php?page=<?php echo $Next ?>" class="page-link">Next</a>
							</li>
						</ul>
					</nav>
				</div>
				<!-- Scroll to Top Button-->
				<a class="scroll-to-top" href="#page-top">
					<i class="fas fa-angle-up"></i>
				</a>
			</div>
		</div>
	</div>


	<?php
	include("includes/logout_modal.php");
	include('includes/footer.php');
	include('includes/scripts.php');
	?>
</body>

</html>