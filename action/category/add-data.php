<?php 
	session_start();
    include '../../databases/connect.php';
	if($_SESSION['status_login'] != true){
		echo '<script>window.location="../../auth/login.php"</script>';
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>DuniaArta</title>
	<link rel="stylesheet" type="text/css" href="../../public/css/style.css">
	<link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
</head>
<body>
	<!-- header -->
	<header>
		<div class="container">
			<h1><a href="../../admin/dashboard.php">DuniaArta</a></h1>
			<ul>
				<li><a href="../../admin/dashboard.php">Dashboard</a></li>
				<li><a href="../../admin/category.php">Data Kategori</a></li>
				<li><a href="../../admin/product.php">Data Produk</a></li>
				<li><a href="../../admin/setting.php">Setting</a></li>
				<li><a href="../../auth/logout.php">Logout</a></li>
			</ul>
		</div>
	</header>

	<!-- content -->
	<div class="section">
		<div class="container">
			<h3>Tambah Kategori</h3><br>
			<div class="box">
				<form action="" method="POST">
					<input type="text" name="nama" placeholder="Nama Kategori" class="input-control" required>
					<input type="submit" name="submit" value="Submit" class="btn">
				</form>
				<?php 
					if(isset($_POST['submit'])){

						$nama = ucwords($_POST['nama']);

						$insert = mysqli_query($conn, "INSERT INTO tb_category VALUES (
											null,
											'".$nama."') ");
						if($insert){
							echo '<script>alert("Tambah data berhasil")</script>';
							echo '<script>window.location="../../admin/category.php"</script>';
						}else{
							echo 'gagal '.mysqli_error($conn);
						}

					}
				?>
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