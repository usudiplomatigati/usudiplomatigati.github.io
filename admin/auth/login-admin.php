<?php 
include '../../db/connection.php';

if (isset($_POST['login'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];
	$query = mysqli_query($koneksi, "SELECT * FROM tbl_admin WHERE username = '$username' AND password = md5('$password')");
	$check = mysqli_num_rows($query);

	if ($check == 1) { 
		session_start();
		$_SESSION['admin'] = $username;
		header("Location: ../dashboard.php");
        exit;
    }
	else {
		header("Location: ../index.php?message=1");
	}
	
}

?>