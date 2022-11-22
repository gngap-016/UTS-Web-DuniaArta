<?php 
	session_start();
    include '../databases/connect.php';
	if($_SESSION['status_login'] != true){
		echo '<script>window.location="../auth/login.php"</script>';
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Category | DuniaArta</title>
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
			<h3>Daftar Kategori</h3><br>
			<div class="box">
				<p><a href="../action/category/add-data.php" class="btn">Tambah Data</a></p><br>
				<table border="1" cellspacing="0" class="table">
					<thead>
						<tr>
							<th width="60px">No</th>
							<th>Kategori</th>
							<th width="173px">Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$no = 1;
							$kategori = mysqli_query($conn, "SELECT * FROM tb_category ORDER BY category_id DESC");
							if(mysqli_num_rows($kategori) > 0){
							while($row = mysqli_fetch_array($kategori)){
						?>
						<tr>
							<td><?php echo $no++ ?></td>
							<td><?php echo $row['category_name'] ?></td>
							<td>
								<a href="../action/category/edit-data.php?id=<?php echo $row['category_id'] ?>" >Edit</a> || <a href="../action/category/delete-data.php?idk=<?php echo $row['category_id'] ?>" onclick="return confirm('Yakin ingin hapus ?')" >Hapus</a>
							</td>
						</tr>
						<?php }}else{ ?>
							<tr>
								<td colspan="3">Tidak ada data</td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
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