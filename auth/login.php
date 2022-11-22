<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login | DuniaArta</title>
	<link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="../public/css/style.css">
</head>
<body id="bg-login">
    <div class="card p-4" style="width: 50%;">
        <h2 class="mb-4">Login</h2>
		<form class="" action="" method="POST">
            <input class="form-control mb-3" type="text" name="user" placeholder="username">
            <input class="form-control mb-3" type="password" name="pass" placeholder="********">
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <input class="btn btn-success" type="submit" name="submit" value="Login">
            </div>
		</form>
        <a href="../index.php">Back to Home</a>
		<?php 
			if(isset($_POST['submit'])){
				session_start();
				include '../databases/connect.php';

				$user = mysqli_real_escape_string($conn, $_POST['user']);
				$pass = mysqli_real_escape_string($conn, $_POST['pass']);

				$cek = mysqli_query($conn, "SELECT * FROM tb_admin WHERE username = '".$user."' AND password = '".md5($pass)."'");
				if(mysqli_num_rows($cek) > 0){
					$d = mysqli_fetch_object($cek);
					$_SESSION['status_login'] = true;
					$_SESSION['a_global'] = $d;
					$_SESSION['id'] = $d->admin_id;
					echo '<script>window.location="../admin/dashboard.php"</script>';
				}else{
					echo '<script>alert("Username atau password Anda salah!")</script>';
				}

			}
		?>
    </div>
</body>
</html>