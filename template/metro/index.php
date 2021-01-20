<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Transaksi Kas Organisasi</title>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

<?php 
	$baseUrl =  baseUrl();
?>
		<!-- Metro 4 -->
	 	<link rel="stylesheet" href="<?php $baseUrl;?>css/jquery-ui.css">
		<link rel="stylesheet" href="<?php $baseUrl;?>css/template.css">
		<link rel="stylesheet" href="<?php $baseUrl;?>css/metro-all.css">
		<link rel="shortcut icon" href="images/icons/favicon.ico">
	</head>
<body>
		<div data-role="appbar" data-expand-point="md" class="bg-darkCobalt fg-white">
			<!-- <a href="#" class="brand no-hover">
				<span style="width: 55px;" class="p-2 border bd-dark border-radius">
					m<sup>4</sup>
				</span>
			</a> -->
	
			<ul class="app-bar-menu">
			<li><a href="<?php echo $baseUrl;?>Site">Home</a></li>
			<li>
				<a href="<?php echo $baseUrl;?>Transaksi" id="transaksi">Daftar Transaksi</a>
			</li>
			<li>
				<a href="#" class="dropdown-toggle">Contacts</a>
				<ul class="d-menu" data-role="dropdown">
					<li><a href="mailto:administrator@gmail.com" >Email</a></li>
					<li class="divider bg-lightGray"></li>
					<li><a href="https://api.whatsapp.com/send?phone=6281269863028" target="_blank">WhatsApp</a></li>
				</ul>
			<li>
				<a href="#" class="dropdown-toggle">Account</a>
				<ul class="d-menu" data-role="dropdown">
				<!-- ---------------------Login----------------- -->
				<?php 
						if(isset($_SESSION['name'])&& $_SESSION['name']!=''){
							echo '<li><a href="'. $baseUrl.'Site/logout">Logout ('.$_SESSION['name'].')</a></li>';
						}
						else{
							echo '<li><a href="'. $baseUrl.'Site/login">Login</a></li>';
						} 
				?>
				<!-- ---------------------Signup----------------- -->
				<?php 
						if(isset($_SESSION['name'])&& $_SESSION['name']!=''){
							echo '';
						}
						else{
							echo '<li class="divider bg-lightGray"></li>';
							echo '<li><a href="'. $baseUrl.'Site/create">Sign Up</a></li>';
						} 
				?>
				</ul>          
				</li> 
		</ul>
		</div>
		<div >
			
		</div>
	<div class="container" style="margin-top:80px;">
		<div class="row">
			<?php echo $content ?>
	</div>
</div>
		<!-- jQuery first, then Metro UI JS -->
		<script src="<?php $baseUrl;?>js/jquery-3.2.1.min.js"></script>
		<script src="<?php $baseUrl;?>js/jquery-ui.js"></script>
		<script src="<?php $baseUrl;?>js/metro.js"></script>
	</body>
</html>