<?php
include '../../koneksi.php';
include 'hh.php';
$id = $id_keranjang;
$hasil=mysqli_query($koneksi,"delete from keranjang where id='$id'");

if ($hasil) {
?>
<script language="JavaScript">
alert('Data Berhasil Dihapus');
document.location='hh.php'</script>
<?php
}else{
?>
<script language="JavaScript">
alert('Data Gagal Dihapus');
document.location='hh.php'</script><?php }
?>