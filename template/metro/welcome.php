<?php 
	$baseUrl =  baseUrl();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
  	<title>Transaksi Kas Organisasi</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <!-- Metro 4 -->
    <link rel="stylesheet" href="<?php echo $baseUrl;?>css/metro-all.css">
    <link rel="shortcut icon" href="images/icons/favicon.ico">
  </head>
  <body>
    <div data-role="appbar" data-expand-point="md" class="bg-darkCobalt fg-white">

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
	<div class="container" 
		style="margin-top:60px">
		<div class="">
			<h1>Selamat Datang <?php 
			if(isset($_SESSION['name'])&& $_SESSION['name']!=''){
				echo $_SESSION['name'];
			} 
			?></h1>
			<?php
			 if(isset($_SESSION['name'])&& $_SESSION['name']!=''){
				echo '';
			} 
			else
				echo '<h3>Silahkan Login Untuk Memulai</h3>'?> 
		</div>
	</div>
    <!-- jQuery first, then Metro UI JS -->
    <script src="<?php echo $baseUrl;?>js/jquery-3.2.1.min.js"></script>
    <script src="<?php echo $baseUrl;?>js/metro.js"></script>
	<script>
	</script>
  </body>
</html>