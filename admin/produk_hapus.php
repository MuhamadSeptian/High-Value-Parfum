<?php 
include '../koneksi.php';
$id = $_GET['id'];
$data = mysqli_query($koneksi, "select * from produk where id_barang='$id'");
$d = mysqli_fetch_assoc($data);
mysqli_query($koneksi, "delete from produk where id_barang='$id'");
header("location:produk.php");
