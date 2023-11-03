<?php 
session_start();
include "../database.php";

$username = $_POST['username'];
$password = md5($_POST['password']);

$data = mysqli_query($db_conn,"SELECT * FROM un_user WHERE username='$username' and password='$password'");

$cek = mysqli_num_rows($data);

if ($cek>0) {
	$_SESSION['username'] = $username;
	$_SESSION['status'] = "login";
	header("location:data.php");
} else {
	header("location:index.php?pesan=gagal");
}

 ?>