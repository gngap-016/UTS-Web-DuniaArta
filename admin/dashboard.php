<?php 
	session_start();
	if($_SESSION['status_login'] != true){
		echo '<script>window.location="../auth/login.php"</script>';
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Dashboard | DuniaArta</title>
	<link rel="stylesheet" type="text/css" href="../public/css/style.css">
	<link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
</head>
<body>
	<!-- header -->
	<header>
		<div class="container">
			<h1><a href="../admin/dashboard.php">DuniaArta</a></h1>
			<ul>
				<li><a href="../admin/dashboard.php">Dashboard</a></li>
				<li><a href="../admin/category.php">Data Kategori</a></li>
				<li><a href="../admin/product.php">Data Produk</a></li>
				<li><a href="../admin/setting.php">Setting</a></li>
				<li><a href="../auth/logout.php">Logout</a></li>
			</ul>
		</div>
	</header>

	<!-- content -->
	<div class="section">
		<div class="container">
			<h3>Dashboard</h3><br>
			<div class="btn">
				<h4>Selamat Datang <?php echo $_SESSION['a_global']->admin_name ?></h4>
			</div>
		</div>
	</div>

	<!-- footer -->
	<footer>
		<div class="container">
			<small>&copy; 2022 - Created by Gilang Ap</small>
		</div>
	</footer>
</body>
</html>