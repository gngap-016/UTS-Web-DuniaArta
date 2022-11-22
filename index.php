<?php 
	include 'databases/connect.php';
	$kontak = mysqli_query($conn, "SELECT admin_telp, admin_email, admin_address FROM tb_admin WHERE admin_id = 1");
	$a = mysqli_fetch_object($kontak);
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DuniaArta</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="public/css/style.css"> -->
  </head>
  <body>
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg bg-primary navbar-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="/">DuniaArta</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link me-5" 
                                href="https://gngap-016.github.io/"
                                target="_blank">Creator</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="auth/login.php">Login</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- End Navbar -->

        <main class="mt-4">
            <h1>Produk DuniaArta</h1>
            <section class="container-fluid">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Semua</button>
                        <?php 
                            $kategori = mysqli_query($conn, "SELECT * FROM tb_category ORDER BY category_id DESC");
                            if(mysqli_num_rows($kategori) > 0){
                                while($k = mysqli_fetch_array($kategori)){
                        ?>
                            <button class="nav-link" id="nav-<?php echo $k['category_id'] ?>-tab" data-bs-toggle="tab" data-bs-target="#nav-<?php echo $k['category_id'] ?>" type="button" role="tab" aria-controls="nav-<?php echo $k['category_id'] ?>" aria-selected="false">
                                <?php echo $k['category_name'] ?>
                            </button>
                        <?php }}?>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">
                        <div class="row">
                            <?php
                                $produk = mysqli_query($conn, "SELECT * FROM tb_product WHERE product_status = 1 ORDER BY product_id DESC LIMIT 8");
                                if(mysqli_num_rows($produk) > 0){
                                    while($p = mysqli_fetch_array($produk)){
                            ?>	
                            <div class="card m-2" style="width: 18rem;">
                                <img src="public/images/products/<?php echo $p['product_image'] ?>" class="card-img-top" alt="<?php echo $p['product_name'] ?>">
                                <div class="card-body">
                                    <h5 class="card-title">Rp. <?php echo number_format($p['product_price']) ?></h5>
                                    <p class="card-text"><?php echo $p['product_name'] ?></p>
                                    <a href="detail-produk.php?id=<?php echo $p['product_id'] ?>" class="btn btn-primary">Detail</a>
                                </div>
                            </div>
                            <?php }}else{ ?>
                                <p>Produk tidak ada</p>
                            <?php } ?>
                        </div>
                    </div>
                    <?php 
                        $kategori = mysqli_query($conn, "SELECT * FROM tb_category ORDER BY category_id DESC");
                        if(mysqli_num_rows($kategori) > 0){
                            while($k = mysqli_fetch_array($kategori)){
                    ?>
                        <div class="tab-pane fade" id="nav-<?php echo $k['category_id'] ?>" role="tabpanel" aria-labelledby="nav-<?php echo $k['category_id'] ?>-tab" tabindex="0">
                            <div class="row">
                                <?php
                                    $produk = mysqli_query($conn, "SELECT * FROM tb_product WHERE product_status = 1 AND category_id = " . $k['category_id'] . " ORDER BY product_id DESC");
                                    if(mysqli_num_rows($produk) > 0){
                                        while($p = mysqli_fetch_array($produk)){
                                ?>
                                <div class="card m-2" style="width: 18rem;">
                                    <img src="public/images/products/<?php echo $p['product_image'] ?>" class="card-img-top" alt="<?php echo $p['product_name'] ?>">
                                    <div class="card-body">
                                        <h5 class="card-title">Rp. <?php echo number_format($p['product_price']) ?></h5>
                                        <p class="card-text"><?php echo $p['product_name'] ?></p>
                                        <a href="detail-produk.php?id=<?php echo $p['product_id'] ?>" class="btn btn-primary">Detail</a>
                                    </div>
                                </div>
                                <?php
                                
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    <?php           
                            }
                        }
                    ?>
                </div>
            </section>
        </main>

        <footer class="mt-5">
            <div class="container text-center">
                <h3>Info Toko</h3>
                <table class="table">
                    <tr>
                        <th>Alamat</th>
                        <td><?php echo $a->admin_address ?></td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td><?php echo $a->admin_email ?></td>
                    </tr>
                    <tr>
                        <th>No HP</th>
                        <td><?php echo $a->admin_telp ?></td>
                    </tr>
                </table>
                <p>Copyright &copy; <?= date('Y') ?> - Gilang Ap</p>
            </div>
        </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
  </body>
</html>