<?php 
	$hostname = 'localhost';
	$username = 'root';
	$password = '';
	$db_name   = 'db_web';

	$conn = mysqli_connect($hostname, $username, $password, $db_name) or die ('Gagal terhubung ke database');
?>