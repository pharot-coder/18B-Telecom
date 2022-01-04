<?php
include("includes/connect.php");
session_start();

if (empty($_SESSION['CID'])) {
	header('location: http://localhost:8888/18B-Telecom/login.php');
}

$sql = "select * from tblcustomer where customerid =".$_SESSION['CID'];
$result = $mysqli->query($sql);
$rowcustomer = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html>
<head>
	<?php include 'includes/header.php'; ?>
	<style type="text/css" media="screen">
	.map-container{
		overflow:hidden;
		padding-bottom:56.25%;
		position:relative;
		height:0;
	}
	.map-container iframe{
		left:0;
		top:0;
		height:100%;
		width:100%;
		position:absolute;
	}
</style>
</head>
<body>
	<?php include 'includes/navbar.php'; ?>
	<div class="container-fluid">
		<div class="text left mt-4">
			<h3>Checkout Page <span><i class='fa fa-shopping-cart' style='font-size:30px'></i></span> </h3>
		</div>
		<hr>
		
		<div class="row mt-2 mb-4">
			<div class="col-sm-8">
				<div class="summary-order-box">
					<div class="card">
						<!-- Card image -->
						<div class="view view-cascade gradient-card-header blue-gradient">
							<!-- Title -->
							<h3 class="card-header-title mb-3 mt-3 text-white text-center "> <i class="fas fa-shopping-cart" ></i>  Summary Order</h3>

						</div>
						<div class="card-body">
							<table id="sumordertable" class="table table-striped table-bordered table-sm" cellspacing="0"
							width="100%">
							<thead>
								<tr>
									<th width="200">Name</th>
									<th>Photo</th>
									<th>Price</th>
									<th>QTY</th>
									<th>Subtotal</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								$subtotal = 0;
								$total = 0;
								$sql = "SELECT c.*,c.cart_id as cartid,p.productid,p.productname,p.images,p.price from tblcart as c INNER JOIN  tblproduct as p on c.productid = p.productid where c.customerid = " . $_SESSION['CID'];
								$result = $mysqli->query($sql);
								while ($row = $result->fetch_assoc()) {
									$subtotal = $row['qty'] * $row['price'];
									$total += $subtotal;
									echo '
									<tr>
									<td>
									<a href="product_detail.php?productid='.$row['productid'].'">
									'.$row['productname'].' </a>
									</td>

									<td> <img src="assets/img/'.$row['images'].'" height="50px"
									width="60px"> </td>

									<td class="price">&#36; '.number_format($row['price'], 2).' </td>

									<td >'.$row['qty'].'</td>

									<td> &#36;'.number_format($subtotal, 2).' </td>
									</tr>
									';
								}

								?>
							</tbody>
							<tfoot>
								<tr>
									<th width="200">Name</th>
									<th>Photo</th>
									<th>Price</th>
									<th>QTY</th>
									<th>Subtotal</th>
								</tr>
							</tfoot>
						</table>
						<h5 class="text-right mr-4"> Grand Total: &#36; <?php echo number_format($total, 2) ?></h5>
					</div>
				</div>
			</div>
		</div>

		<div class="col-sm-4">
			<div class="billing-card">
				<!-- Card -->
				<div class="card card-cascade ">
					<!-- Card image -->
					<div class="view view-cascade gradient-card-header blue-gradient">
						<!-- Title -->
						<h3 class="card-header-title mb-3 mt-3 text-white text-center "> <i class="fas fa-map" ></i> Billing Address</h3>

					</div>
					<!-- Card content -->
					<div class="card-body">
						<form action="order.php"  method="POST" autocomplete="false" enctype="multipart/form-data">
							<div class="form-row">
								<div class="col-sm-6">
									<div class="form-group">
										<!-- First Name -->
										<label for="fname" class="font-weight-bold" >First Name</label>
										<input type="text" id="fname" name="fname" class="form-control mb-2" placeholder="Enter First Name" value="<?php echo $rowcustomer['first_name']; ?>" readonly>
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<!-- Last Name -->
										<label for="lname" class="font-weight-bold" >Last Name</label>
										<input type="text" id="lname" name="lname" class="form-control mb-2" placeholder="Enter Last Name" value="<?php echo $rowcustomer['last_name'] ?>" 
										readonly>
									</div>
								</div>
							</div>

							<div class="form-group">
								<!-- Email -->
								<label for="email" class="font-weight-bold" >Email</label>
								<input type="text" name="email" id="email" class="form-control mb-2" placeholder=" Enter Email" value="<?php echo $rowcustomer['email'] ?>"
								readonly>
							</div>
							<div class="form-group">
								<!-- Phone Number -->
								<label for="phonenumber" class="font-weight-bold" >Phone Number</label>
								<input type="text" id="phonenumber" name="phonenumber" class="form-control mb-2"
								placeholder=" Enter Phone Number" value="<?php echo $rowcustomer['phone_number'] ?>" readonly>
							</div>

							<div class="form-group">
								<label for="billingaddress" class="font-weight-bold" >Billing-Address</label>
								<textarea name="address" rows="3" cols="5" class="form-control mb-2" placeholder="Enter Address" readonly>  <?php echo $rowcustomer['address'] ?></textarea>
							</div>

							<div class="form-group">
								<label for="paymentmethods" class="font-weight-bold" >Payment Methods</label>
									<!-- <select name="paymentmethods" class="form-control">
										<option value="0" selected="">--Select Payment Methods--</option>
										<option value="1"> Cash on Delivery </option>
										<option value="1"> Paypal </option>
									</select> -->
									<div class="form-check">
										<input type="radio" class="form-check-input paymentmethod-input" name="paymentmethod" value="Cash on delivery" required>
										<label class="form-check-label">Cash on delivery <span>
											<i class="fas fa-truck"></i>
										</span> </label>
									</div>

									<div class="form-check">
										<input type="radio" class="form-check-input paymentmethod-input" name="paymentmethod" value="ABA Transaction" required>
										<label class="form-check-label"> ABA Trasaction 000038157 (Kith Sophal)
											<img src="assets/img/logo/aba_pay_logo.png" alt="" class="img-responsive" width="54px" height="35px" >
										</label>
									</div>

									<div class="form-check">
										<input type="radio" class="form-check-input paymentmethod-input" name="paymentmethod" value="Wing or True Money Transaction" required>
										<label class="form-check-label"> Wing or True Money Trasaction 012291027 (Kith Sophal)
											<img src="assets/img/logo/wing_logo.png" alt="" class="img-responsive" width="60px" height="35px" >

											<img src="https://www.truemoney.com.kh/wp-content/uploads/2019/10/logo-app1.png" alt="" width="50px" height="50px" >
										</label>
									</div>


									<div class="form-check">
										<input type="radio" class="form-check-input paymentmethod-input" name="paymentmethod" value="ACLEDA Transaction" required>
										<label class="form-check-label"> ACLEDA Trasaction 012291027 (Kith Sophal)
											<img src="https://image.thmeythmey.com/pictures/2018/02/24/thumb2/logo_acleda_large__1_.jpg" alt="" class="img-responsive" width="50px" height="50px" >
										</label>
									</div>

									<div class="transaction-box mt-2" style="display: none;" >
										<div class="card">
											<div class="card-body">
												<div class="form-group">
													<label for=""> <b> Transaction Photo</b> </label>
													<input type="file" name="transaction_photo" class="form-control transaction_photo mt-2 mb-2" required="" >
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="form-group">
									<label for=""> <b>Password</b> </label>
									<input type="password"  name="password" class="form-control" placeholder="Enter Your Password" id="password" required=""> 
									<?php
									if(isset($_SESSION['error'])){
										echo '
										<div class="alert alert-danger text-center mt-2">
										'.$_SESSION['error'].'
										</div>
										';
									}
									unset($_SESSION['error']);
									?>
								</div>

								<div class="form-group">
									<button type="submit" class="btn btn-primary btn-block my-4" name="ordersubmit"  > <i class="fa fa-shopping-cart"></i>  Proceed Checkout  </button>
								</div>
							</form>
						</div>
					</div>
					<!-- Card -->
				</div>
			</div>



		</div>
		<!-- Scroll to Top Button-->
		<a class="scroll-to-top" href="#page-top">
			<i class="fas fa-angle-up"></i>
		</a>
	</div>
	<?php include 'includes/logout_modal.php'; ?>
	<?php include 'includes/footer.php'; ?>
	<?php include 'includes/scripts.php'; ?>
	<script
	src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAFGTxJ0IQEzY6Yf7eq4XmqJ3jR0bTus6M&callback=initMap&libraries=&v=weekly"
	async
	></script>
	<script type="text/javascript">
		let map;
		function initMap() {
			map = new google.maps.Map(document.getElementById("checkoutmap"), {
				center: { lat: -34.397, lng: 150.644 },
				zoom: 8,
			});
		}
	</script>
	<script type="text/javascript">

		$(function(){

			$('.paymentmethod-input').on('change',function(){
				if(this.value =='ABA Transaction' || this.value=='Wing or True Money Transaction'
					|| this.value=='ACLEDA Transaction'){

					$('.transaction-box').fadeIn();
				$('.transaction_photo').attr('required', true);

			}else{

				$('.transaction-box').fadeOut();
				$('.transaction_photo').attr('required', false);
			}
		});

		});

	</script>
</body>
</html>