<?php

	session_start();
	include_once("function/helper.php");
	include_once("function/koneksi.php");

	$page = isset($_GET['page']) ? $_GET['page'] : false ;
	$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : false;
	$nama = isset($_SESSION['nama']) ? $_SESSION['nama'] : false;
	$level = isset($_SESSION['level']) ? $_SESSION['level'] : false;

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Weshop | Toko Online Terbesar Di Indonesia</title>
		<link href="<?php echo BASE_URL."css/style.css"; ?>" type="text/css" rel="stylesheet" />
	</head>
<body>
	<div id="container">
		<div id="header">
			<a href="<?php echo BASE_URL."index.php"; ?>">
				<img src="<?php echo BASE_URL."images/logo.png"; ?>" />
			</a>
				<div id="menu">
					<div id="user">
						<?php
							if($user_id){
								echo "Hi <b>$nama</b>, 
								<a href='".BASE_URL."index.php?page=myprofile&module=pesanan&action=list'>My Profile</a>	
								<a href='".BASE_URL."logout.php'>Log Out</a>";
							}else{
								echo "<a href=' ".BASE_URL."index.php?page=login'>Login</a>
									 <a href=' " .BASE_URL."index.php?page=register'>Register</a>";
							}
						?>
						
					</div>

						<a href="<?php echo BASE_URL."index.php?page=keranjang";?>" id="button-keranjang">
						<img src="<?php echo BASE_URL."images/cart.png"; ?>" />
						</a>
				</div>
		</div>

			<div id="content">
				
				<?php
					$filename = "$page.php";
					if (file_exists($filename)) {
						include_once ($filename);
					}else{
						include_once("main.php");
					}

				?>
			</div>
			
			<div id="footer">
				<p>&copy; Copyright 2021</p>
			</div>
	</div>
</body>
</html>