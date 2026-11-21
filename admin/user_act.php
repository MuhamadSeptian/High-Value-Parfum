<?php
include '../koneksi.php';

$nama = $_POST['nama'];
$email = $_POST['email']; 
$password = md5($_POST['password']);
$alamat = $_POST['alamat'];
$level = $_POST['level'];

    mysqli_query($koneksi, "INSERT INTO users VALUES (NULL,'$nama','$email','$password','$alamat','$level')");
    header("location:user.php");

?>
