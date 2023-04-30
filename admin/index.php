<?php
require('connection.php');
require('functions.php');
error_reporting(0);

if (isset($_POST['login'])) {
  $username = get_safe_value($con,$_POST['username']);
  $password = get_safe_value($con,$_POST['password']);
  $sql = "SELECT * FROM tbl_admin WHERE username = '$username' AND password = '$password'";
  $res = mysqli_query($con,$sql);
  $count = mysqli_num_rows($res);
  if ($count>0) {
    $_SESSION['ADMIN_LOGIN'] = 'yes';
    $_SESSION['ADMIN_USERNAME'] = $username;
    header("location:home.php");
    die();
  }else{
    $msg = "Please Enter Correct Details";
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

	<title>Admin Login</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="description" content="" />
	<meta name="keywords" content="">
	<meta name="author" content="Phoenixcoded" />
	<!-- Favicon icon -->
	<link rel="icon" href="assets/images/favicon.png" type="image/x-icon">

	<!-- vendor css -->
	<link rel="stylesheet" href="assets/css/style.css">
	
	


</head>

<!-- [ auth-signin ] start -->
<div class="auth-wrapper">
	<div class="auth-content">
		<div class="card">
			<div class="row align-items-center text-center">
				<div class="col-md-12">
					<div class="card-body">
						<h3>District Collector</h3>
						<h4 class="mb-3 f-w-400">Sign In</h4>
						<form method="post">
							<div class="form-group mb-3">
								<label class="floating-label" for="Email">Username</label>
								<input type="text" class="form-control" id="Email" placeholder="" name="username">
							</div>
							<div class="form-group mb-4">
								<label class="floating-label" for="Password">Password</label>
								<input type="password" class="form-control" id="Password" placeholder="" name="password">
							</div>
							<button class="btn btn-block btn-primary mb-4" name="login">Login</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- [ auth-signin ] end -->

<!-- Required Js -->
<script src="assets/js/vendor-all.min.js"></script>
<script src="assets/js/plugins/bootstrap.min.js"></script>
<script src="assets/js/pcoded.min.js"></script>



</body>

</html>
