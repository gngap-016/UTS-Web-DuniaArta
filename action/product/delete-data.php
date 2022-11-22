<?php 
	include '../../databases/connect.php';

	if(isset($_GET['idp'])){
		$produk = mysqli_query($conn, "SELECT product_image FROM tb_product WHERE product_id = '".$_GET['idp']."' ");
		$p = mysqli_fetch_object($produk);

		unlink('../../public/images/products/'.$p->product_image);

		$delete = mysqli_query($conn, "DELETE FROM tb_product WHERE product_id = '".$_GET['idp']."' ");
		echo '<script>window.location="../../admin/product.php"</script>';
	}
?>