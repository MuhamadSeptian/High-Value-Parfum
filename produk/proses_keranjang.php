<?php
require "../koneksi.php";
// Ambil nilai dari form atau parameter yang diterima dari frontend
$produk_id = $_POST['produk_id']; // Ini contoh, pastikan variabel-variabel ini sesuai dengan nama yang digunakan di form Anda
$nama_produk = $_POST['nama_produk']; // Ini contoh, pastikan variabel-variabel ini sesuai dengan nama yang digunakan di form Anda
$harga_produk = $_POST['harga_produk']; // Ini contoh, pastikan variabel-variabel ini sesuai dengan nama yang digunakan di form Anda
$jumlah = $_POST['jumlah']; // Ini contoh, pastikan variabel-variabel ini sesuai dengan nama yang digunakan di form Anda


// Buat perintah SQL INSERT
$sql_insert = "INSERT INTO keranjang (id_keranjang, nama, harga_satuan, jumlah_barang) VALUES (null, '$nama_produk', '$harga_produk', '$jumlah')";

// Lakukan perintah INSERT
if (mysqli_query($koneksi, $sql_insert)) {
    header("location:product1.php");
} else {
    echo "<div class='alert alert-danger'>Error: " . $sql_insert . "<br>" . mysqli_error($koneksi)."</div>";
}

?>
