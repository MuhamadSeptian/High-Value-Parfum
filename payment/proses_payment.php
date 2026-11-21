<?php
require "../koneksi.php";
session_start();

// Ambil semua data dari tabel keranjang
$keranjang_query = mysqli_query($koneksi, "SELECT * FROM keranjang");
          
if($_SESSION){
    $nama = $_SESSION['nama'] ;
$email = $_SESSION['email'];
$alamat = $_SESSION['alamat'];
$grup = $_POST['group'];
// Loop untuk setiap baris hasil kueri
while ($keranjang = mysqli_fetch_assoc($keranjang_query)) {
    $nama_produk = $keranjang['nama'];
    $harga = $keranjang['harga_satuan'];
    $jumlah = $keranjang['jumlah_barang'];
    $total = $harga * $jumlah;

    // Buat perintah SQL INSERT
    $sql_insert = "INSERT INTO riwayat (nama_produk, harga, jumlah, nama_lengkap, email, alamat_lengkap, total,grup)
                   VALUES ('$nama_produk', $harga, $jumlah, '$nama', '$email', '$alamat', $total,$grup)";

    // Lakukan perintah INSERT
    if (mysqli_query($koneksi, $sql_insert)) {
        echo "<div class='alert alert-success'>Data berhasil dimasukkan ke dalam tabel riwayat.</div>";
    } else {
        echo "<div class='alert alert-danger'>Error: " . $sql_insert . "<br>" . mysqli_error($koneksi) . "</div>";
    }
}

// Buat perintah SQL delete
    $sql_delete = "TRUNCATE TABLE keranjang;";

    // Lakukan perintah INSERT
    if (mysqli_query($koneksi, $sql_delete)) {
        echo "<div class='alert alert-success'>Data berhasil dihapus.</div>";
    } else {
        echo "<div class='alert alert-danger'>Error: " . $sql_delete . "<br>" . mysqli_error($koneksi) . "</div>";
    }


}

// Setelah semua data dimasukkan, redirect ke halaman lain
header("location:../struk/struk.php");
?>
    