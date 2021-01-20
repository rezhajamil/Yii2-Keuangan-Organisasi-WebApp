<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

<?php 
	$baseUrl =  baseUrl();
?>
    <!-- Metro 4 -->
    <link rel="stylesheet" href="<?php echo $baseUrl;?>css/jquery-ui.css">
    <link rel="stylesheet" href="<?php echo $baseUrl;?>css/template.css">
    <link rel="stylesheet" href="<?php echo $baseUrl;?>css/metro-all.css">
  </head>
  <body>
	  	<form method="post">
		<div>User ID</div>
		<div>
				<input type="text" name="User[userId]" 
				value="<?php echo $objModel->userId; ?>" required>
		</div>
		<div>Full Name</div>
		<div>
				<input type="text" name="User[userNama]" 
				value="<?php echo $objModel->userNama; ?>" required>
		</div>
		<div>Group</div>
		<div>
				<select id="group" name="User[userGroup]">
	  				<option value="<?php echo $objModel->userGroup;?>admin">Admin
	  				</option>
	  				<option value="<?php echo $objModel->userGroup;?>user">User
  				</option>
  				</select>
		</div>
		<div>Password</div>
		<div>
				<input type="password" name="User[userPassword]" 
				value="<?php echo $objModel->userPassword; ?>" required>
		</div>
		<div><input class="input button" type="submit" value="Sign Up"/></div>
		</form>
		<div class="container">
			<div style="display: inline-block;margin-top: 20px;margin-left: -10px;">
		<?php	/* Siapkan jalan kembali */ 
		echo $this->createUrl('index','Kembali'); ?></div></div>

		<script src="<?php echo $baseUrl;?>js/jquery-3.2.1.min.js"></script>
    <script src="<?php echo $baseUrl;?>js/jquery-ui.js"></script>
    <script src="<?php echo $baseUrl;?>js/metro.js"></script>
  </body>
 </html>
