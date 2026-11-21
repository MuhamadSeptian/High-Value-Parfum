<?php 
include '../koneksi.php';
$id  = $_POST['id'];
$nama  = $_POST['nama'];
$email = $_POST['email'];
$alamat = $_POST['alamat'];
$level = $_POST['level'];

// cek data user
	mysqli_query($koneksi, "update users set names='$nama',alamat='$alamat', email='$email', user_level='$level' where id_pengguna='$id'");
	header("location:user.php");
	?>