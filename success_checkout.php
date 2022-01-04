
<?php
include("includes/connect.php");
session_start();
if (empty($_SESSION['CID'])) {
	header('location: http://localhost:8888/18B-Telecom/login.php');
}

?>
<!DOCTYPE html>
<html>
<head>
	<?php include 'includes/header.php'; ?>
</head>
<body>
	<?php include 'includes/navbar.php'; ?>

	<div class="success-checkout-box mt-5 mb-5">
		<div class="card">
			<div class="card-title text-center">
				<img src="assets/img/logo/Logo-18B-Telecom.png" alt="" width="300" height="70" class="img-responsive">
			</div>
			<div class="card-body">

				<?php
				if(isset($_SESSION['error'])){
					echo '
					<div class="text-danger text-center" >
					'.$_SESSION['error'].'
					</div>
					';
				}
				unset($_SESSION['error']);
				if(isset($_SESSION['success'])){
					echo '
					<i class="fas fa-check fa-4x mb-3 animated rotateIn text-center text-success"></i>
					<div class="text-success text-center mt-4 mb-4 ">
					'.$_SESSION['success'].'
					</div>
					';
				}
				unset($_SESSION['success']);
				?>
				<a href="http://localhost:8888/18B-Telecom/usercenter.php" class="btn btn-primary btn-block" > <i class="fas fa-home" ></i> Go to User Profile </a>
			</div>
		</div>
	</div>

	<div class="container">
		<?php include 'most_view.php'; ?>	

	</div>
	<?php include 'includes/logout_modal.php'; ?>
	<?php include 'includes/footer.php'; ?>
	<?php include 'includes/scripts.php'; ?>

</body>
</html>