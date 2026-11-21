<?php 
include '../koneksi.php';
$id = $_GET['id'];
$data = mysqli_query($koneksi, "select * from riwayat where id_riwayat='$id'");
$d = mysqli_fetch_assoc($data);
mysqli_query($koneksi, "delete from riwayat where id_riwayat='$id'");
header("location:riwayat.php");
