<?php 
	include 'databases/connect.php';
	$kontak = mysqli_query($conn, "SELECT admin_telp, admin_email, admin_address FROM tb_admin WHERE admin_id = 1");
	$a = mysqli_fetch_object($kontak);

    $produk = mysqli_query($conn, "SELECT * FROM tb_product WHERE product_id = '".$_GET['id']."' ");
	$p = mysqli_fetch_object($produk);
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detail | DuniaArta</title>
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
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="products.php">Info</a>
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
            <section class="container-fluid">
                <h2>Detail <?php echo $p->product_name ?></h2>
                <div class="row">
                    <div class="col-sm-4">
                        <img src="public/images/products/<?php echo $p->product_image ?>" class="img-fluid" alt="<?php echo $p->product_name ?>">
                    </div>
                    <div class="col-sm-8">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th scope="row">Harga</th>
                                    <th>Rp. <?php echo number_format($p->product_price) ?></th>
                                </tr>
                                <tr>
                                    <th scope="row">Nama</th>
                                    <td><?php echo $p->product_name ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Deskripsi</th>
                                    <td><?php echo $p->product_description ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Beli</th>
                                    <td>
                                        <a href="https://api.whatsapp.com/send?phone=<?php echo $a->admin_telp ?>&text=Hai, saya tertarik dengan produk Anda." target="_blank">
                                            <img src="public/images/site_assets/whatsapp.png" width="20px">
                                            <?php echo $a->admin_telp ?>
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-12 mt-5">
                        <a href="index.php" class="text-center">Back to Home</a>
                    </div>
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