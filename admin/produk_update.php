<?php 
include '../koneksi.php';
$nama  = $_POST['nama'];
$id  = $_POST['id'];
$deskripsi = $_POST['deskripsi'];
$harga = $_POST['harga'];


$rand = rand();
$allowed =  array('png','jpg','jpeg','pdf');
$filename = $_FILES['gambar']['name'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);

	if(!in_array($ext,$allowed) ) {
		header("location:produk.php?alert=gagal");
	}else{
		if(		move_uploaded_file($_FILES['gambar']['tmp_name'], './gambar/'.$rand.'_'.$filename)){
			$file_gambar = $rand.'_'.$filename;
			mysqli_query($koneksi, "UPDATE produk SET nama='$nama', gambar='$file_gambar',deskripsi='$deskripsi',harga='$harga' WHERE id_barang=$id");
			header("location:produk.php?alert=berhasil");
		}
		header("location:produk.php?alert=gagal");
	}
?>