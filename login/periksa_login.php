<?php 
// menghubungkan dengan koneksi
include '../koneksi.php';

// menangkap data yang dikirim dari form
$username = $_POST['username'];
$password = md5($_POST['password']);

$login = mysqli_query($koneksi, "SELECT * FROM users WHERE names='$username' AND passwords='$password'");
$cek = mysqli_num_rows($login);

if($cek > 0){
	session_start();
	$data = mysqli_fetch_assoc($login);
	$_SESSION['id'] = $data['id'];
	$_SESSION['nama'] = $data['names'];
	$_SESSION['email'] = $data['email'];
	$_SESSION['alamat'] = $data['alamat'];
	$_SESSION['username'] = $data['names'];
	$_SESSION['level'] = $data['user_level'];

	if($data['user_level'] == "1"){
		$_SESSION['status'] = "administrator_logedin";
		header("location:../admin/");
	}else if($data['user_level'] == "2"){
		$_SESSION['status'] = "manajemen_logedin";
		header("location:../index.php");
	}else{
		header("location:index.php?alert=gagal");
	}
}else{
	header("location:index.php?alert=gagal");
}
