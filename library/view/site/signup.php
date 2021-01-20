<!DOCTYPE html>
<html lang="en">
<head>
	<title>Sign Up</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<?php 
	$baseUrl =  baseUrl();
?>
<!--===============================================================================================-->
	<link rel="stylesheet" href="<?php echo $baseUrl;?>css/metro-all.css">	
	<link rel="icon" type="image/png" href="<?php echo $baseUrl;?>images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo $baseUrl;?>vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo $baseUrl;?>fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo $baseUrl;?>vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?php echo $baseUrl;?>vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo $baseUrl;?>vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo $baseUrl;?>vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?php echo $baseUrl;?>vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo $baseUrl;?>css/util.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $baseUrl;?>css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form p-l-55 p-r-55 p-t-178" method="post">
					<span class="login100-form-title">
						Sign Up
					</span>

					<div class="wrap-input100 validate-input m-b-16" data-validate="Please Enter User ID">
						<input class="input100" type="text" name="Login[userid]" placeholder="User ID" value="<?php echo $objModel->userId; ?>">
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 validate-input m-b-16" data-validate="Please Enter Your Name">
						<input class="input100" type="text" name="Login[username]" placeholder="Name" value="<?php echo $objModel->userNama; ?>">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Please Enter Password">
						<input class="input100" type="password" name="Login[password]" placeholder="Password" value="<?php echo md5($objModel->userPassword) ; ?>"> 
						<span class="focus-input100"></span>
					</div>

					<!-- <div class="text-right p-t-13 p-b-23">
						<span class="txt1">
							Forgot
						</span>

						<a href="#" class="txt2">
							Username / Password?
						</a>
					</div> -->

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="input" value="Simpan">
							Submit
						</button>
					</div>

					<div class="flex-col-c p-t-170 p-b-40">
						<span class="txt1 p-b-9">
							Don’t have an account?
						</span>

						<a href="#" class="txt3">
							Sign up now
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	
<!--===============================================================================================-->
	<script src="<?php echo $baseUrl;?>vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo $baseUrl;?>vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo $baseUrl;?>vendor/bootstrap/js/popper.js"></script>
	<script src="<?php echo $baseUrl;?>vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo $baseUrl;?>vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo $baseUrl;?>vendor/daterangepicker/moment.min.js"></script>
	<script src="<?php echo $baseUrl;?>vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo $baseUrl;?>vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo $baseUrl;?>js/main.js"></script>
	<script src="<?php echo $baseUrl;?>js/metro.js">
	</script>
</body>
</html>