<?php 
include '../koneksi.php';

$nama = $_POST['nama'];
$harga = $_POST['harga'];
$jumlah = $_POST['jumlah'];
$nama_lengkap = $_POST['nama_lengkap'];
$email = $_POST['email'];
$alamat_lengkap	= $_POST['alamat_lengkap'];
$total = $_POST['total'];;
$nilai_tertinggi = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT MAX(grup) AS max_grup FROM riwayat;"))['max_grup'] + 1;
		mysqli_query($koneksi, "INSERT INTO riwayat VALUES (NULL,'$nama','$harga','$jumlah','$nama_lengkap','$alamat_lengkap','$email','$total','$nilai_tertinggi')");
		header("location:riwayat.php");

?>
