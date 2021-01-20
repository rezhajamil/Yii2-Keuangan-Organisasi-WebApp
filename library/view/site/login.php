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
		<div>Username</div>
		<div>
				<input type="text" name="Login[username]" 
				value="">
		</div>
		<div>Password</div>
		<div>
				<input type="password" name="Login[password]" 
				value="">
		</div>
		<div style="margin-top: 5px;"><input class="input button" type="submit" value="Login"/></div>
		</form>
		<div class="container">
		<div class="row">
		
		 Doesn't have account? <a href="<?php echo $baseUrl; ?>Site/create">Sign Up</a>
		 	
		</div>
		 <br>
		 <div style="display:inline-block;margin-left: -10px;margin-top: -40px;">
		<?php	/* Siapkan jalan kembali */ 
		echo $this->createUrl('index','Kembali'); ?></div></div>

		<script src="<?php echo $baseUrl;?>js/jquery-3.2.1.min.js"></script>
    <script src="<?php echo $baseUrl;?>js/jquery-ui.js"></script>
    <script src="<?php echo $baseUrl;?>js/metro.js"></script>
  </body>
 </html>
