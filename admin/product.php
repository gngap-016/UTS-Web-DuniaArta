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
	<title>Product | DuniaArta</title>
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
			<h3>Daftar Produk</h3><br>
			<div class="box">
				<p><a href="../action/product/add-data.php" class="btn">Tambah Data</a></p><br>
				<table border="2" cellspacing="0" class="table" >
					<thead>
						<tr>
							<th width="60px">No</th>
							<th>Kategori</th>
							<th>Nama Produk</th>
							<th>Harga</th>
							<th>Gambar</th>
							<th>Status</th>
							<th width="140px">Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$no = 1;
							$produk = mysqli_query($conn, "SELECT * FROM tb_product LEFT JOIN tb_category USING (category_id) ORDER BY product_id DESC");
							if(mysqli_num_rows($produk) > 0){
							while($row = mysqli_fetch_array($produk)){
						?>
						<tr>
							<td><?php echo $no++ ?></td>
							<td><?php echo $row['category_name'] ?></td>
							<td><?php echo $row['product_name'] ?></td>
							<td>Rp. <?php echo number_format($row['product_price']) ?></td>
							<td><a href="produk/<?php echo $row['product_image'] ?>" target="_blank"> <img src="../public/images/products/<?php echo $row['product_image'] ?>" width="50px"> </a></td>
							<td><?php echo ($row['product_status'] == 0)? 'Tidak Aktif':'Aktif'; ?></td>
							<td>
								<a href="../action/product/edit-data.php?id=<?php echo $row['product_id'] ?>">Edit</a> || <a href="../action/product/delete-data.php?idp=<?php echo $row['product_id'] ?>" onclick="return confirm('Yakin ingin hapus ?')">Hapus</a>
							</td>
						</tr>
						<?php }}else{ ?>
							<tr>
								<td colspan="7">Tidak ada data</td>
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