

<div class="change-password-box mb-4">
	<!-- Default form register -->
	<form class="text-center  p-5" action="changepassword_action.php" id="changepasswordform" method="POST">

		<h5 class="text-left mt-2 mb-4" > <i class="fas fa-key"></i> <b>Change Password</b> </h5>

		<div class="form-row">
			<div class="col-sm-8">
				<!-- Password -->
				<input type="password" name="curpass" id="defaultRegisterFormPassword" class="form-control mb-4" placeholder="Current Password" aria-describedby="defaultRegisterFormPasswordHelpBlock" required>

			</div>
		</div>

		<div class="form-row">
			<div class="col-sm-8">
				<!-- Password -->
				<input type="password" name="newpass" id="newpass" class="form-control mb-4" placeholder="New Password" aria-describedby="defaultRegisterFormPasswordHelpBlock" required >
			</div>
		</div>

		<div class="form-row">
			<div class="col-sm-8">
				<!-- Password -->
				<input type="password" name="conpass" id="conpass" class="form-control mb-4" placeholder="Confirm Password" aria-describedby="defaultRegisterFormPasswordHelpBlock" required>

			</div>
		</div>

		<div class="form-row">
			<div class="col-sm-8">
				<button class="btn btn-success my-4 btn-block" name="changepassword" type="submit"> Update Change </button>
			</div>
		</div>
	</form>
	<!-- Default form register -->
</div>
