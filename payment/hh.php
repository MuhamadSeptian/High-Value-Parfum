<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Keranjang Belanja</title>
    <link rel="stylesheet" href="hh.css" />
    <?php include '../koneksi.php'; 	  session_start();
?>
  </head>
  <body style="background-image: url(bgco.jpg); background-size: cover; background-repeat: no-repeat;">
    <header style="text-align: center; color: white;">
      <h1>CheckOut</h1>
    </header>
    <br>
    <main>
      <table class="table-cart">
        <thead>
          <tr>
            <th>Produk Dipesan</th>
            <th>Harga Satuan</th>
            <th>Jumlah</th>
            <th>SubTotal</th>
          </tr>
        </thead>
        <tbody>
        <?php 
    $keranjang_query = mysqli_query($koneksi, "SELECT 
          keranjang.*,
          produk.gambar 
          FROM 
          keranjang
          RIGHT JOIN 
          produk
          ON 
          keranjang.nama = produk.nama
          WHERE 
          keranjang.nama IS NOT NULL;");
    $result = mysqli_query($koneksi, "SELECT SUM(harga_satuan) AS total_harga FROM keranjang");
    $row = mysqli_fetch_assoc($result);
    $total = $row['total_harga'];

    // Periksa apakah kueri berhasil dieksekusi
    if (!$keranjang_query) {
        die('Kueri gagal: ' . mysqli_error($koneksi));
    }
    // Loop melalui hasil kueri
    while ($keranjang = mysqli_fetch_assoc($keranjang_query)) {$id_keranjang=$keranjang['id_keranjang'];
    ?>
<form action="proses_payment.php" method="post">
   <tr>
          <td>
          <img src="../admin/gambar/<?php echo $keranjang['gambar']; ?>" style=" height: 70px; border-radius: 10%; margin-left: 15px; object-fit: cover;">
              <p><?= $keranjang['nama'] ?></p>
          </td>
          <td >
              <p ><?= "Rp. ".number_format($keranjang['harga_satuan'])." ,-" ?></p>
          </td>
          <td>
              <p><?= $keranjang['jumlah_barang'] ?></p>
          </td>
          <td>
          <p><?= $hasil = "Rp. " . number_format($keranjang['harga_satuan'] * $keranjang['jumlah_barang']) ?> ,-</p>
          </td>     
    </tr>


          
<?php
    }
?>
        </tbody>
        <tfoot>
          <tr>
            <td colspan="3">Total Pesanan</td>
            <td id="total-harga">Rp <?php 
            $results = mysqli_query($koneksi, "SELECT SUM(jumlah_barang * harga_satuan) AS total FROM keranjang;");
            $rows = mysqli_fetch_assoc($results);
            $totals = $rows['total'];
            echo $totals;
            ?></td>
          </tr>
        </tfoot>
      </table>
      <br>
      <br>
<!-- -------------------------------------------------------------------------------------------------------------- -->

      <section class="ringkasan-pesanan">
            <ul>
                <li>
                    <span>Subtotal untuk Produk</span>
                    <span id="subtotal">Rp<?=$totals?></span>
                </li>
                <li class="total-pembayaran">
                    <span>Total Pembayaran</span>
                    <span>Rp<span id="total"></span><?= $totals?></span>
                </li>
            </ul>
            <section class="tindakan">
            <button type="submit" style="text-decoration: none; color: black;"> Buat Pesanan</button>
        </section><?php
        $nilai_tertinggi = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT MAX(grup) AS max_grup FROM riwayat;"))['max_grup'] + 1;
         ?> <input type="hidden" value="<?= $nilai_tertinggi ?>" name="group" required />
        </form>

    </main>
    <script src="hh.js"></script>

<script>
function hapus() {
    // Mengarahkan browser ke skrip PHP yang diinginkan
    window.location = 'hapus_order.php';
}
function co() {
    // Mengarahkan browser ke skrip PHP yang diinginkan
    window.location = 'proses_payment.php';
}
</script>

  </body>
</html>
