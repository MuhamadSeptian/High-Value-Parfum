<?php
include "../koneksi.php";
include 'product1.php';
$id = $_GET['id'];
$hasil=mysqli_query($koneksi,"delete from keranjang where id_keranjang='$id'");

if ($hasil) {
?>
<script language="JavaScript">
alert('Pesanan Berhasil Dihapus');
document.location='product1.php'</script>
<?php
}else{
?>
<script language="JavaScript">
alert('Pesanan Gagal Dihapus');
document.location='product1.php'</script><?php }
?>