<?php 
include '../koneksi.php';
$id = $_POST['id'];
$nama = $_POST['nama'];
$harga = $_POST['harga'];
$jumlah = $_POST['jumlah'];
$nama_lengkap = $_POST['nama_lengkap'];
$email = $_POST['email'];
$alamat_lengkap = $_POST['alamat_lengkap'];
$total = $_POST['total'];

// cek data
	mysqli_query($koneksi, "update riwayat set nama_produk='$nama', harga='$harga', jumlah='$jumlah',nama_lengkap='$nama_lengkap',alamat_lengkap='$alamat_lengkap', email='$email', total='$total' where id_riwayat='$id'");
	header("location:riwayat.php");
	?>