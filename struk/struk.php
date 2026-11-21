<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php include '../koneksi.php'; ?>
  <title>Struk Belanja</title>
  <style>
    body {
      background-image: url(../payment/bgco.jpg);
      background-color: #f2f2f2;
      font-family: Arial, sans-serif;
      padding: 20px;
    }
    .container {
      max-width: 600px;
      margin: 0 auto;
      background-color: #fff;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    .receipt-header {
      font-size: 24px;
      font-weight: bold;
      color: #333;
      margin-bottom: 10px;
    }
    .receipt-info {
      font-size: 14px;
      color: #666;
      margin-bottom: 5px;
    }
    .receipt-table {
      border-collapse: collapse;
      width: 100%;
      margin-top: 20px;
    }
    .receipt-table th,
    .receipt-table td {
      border: 1px solid #ddd;
      padding: 10px;
      text-align: left;
    }
    .receipt-table th {
      background-color: #f7f7f7;
    }
    .total-row {
      background-color: #f7c566;
    }
    .total-row th {
      font-weight: bold;
    }
    button {
      background-color: #4caf50;
      color: white;
      border: none;
      padding: 10px 20px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      border-radius: 5px;
      cursor: pointer;
      margin-top: 20px;
    }
    button:hover {
      background-color: #45a049;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="receipt-header">HIGH VALUE PARFUME</div>
    <div class="receipt-info">Jl. Bangau No.12 - Telp. 089767853423 PALEMBANG</div>
    <hr>
    <div class="receipt-info">Informasi Pembelian</div>
    <div class="receipt-info" id="receipt-date-time"></div>
    <div class="receipt-info">Nama Pembeli : <?= $_SESSION['nama'] ?></div>
    <div class="receipt-info">Alamat : <?= $_SESSION['alamat'] ?></div>
    <table class="receipt-table">
      <thead>
        <tr>
          <th>Info Produk</th>
          <th>Jumlah</th>
          <th>Harga</th>
          <th>Total</th>
        </tr>
      </thead>
      <tbody>
        <?php 
          $produk_query = mysqli_query($koneksi, "SELECT * FROM riwayat WHERE grup = (SELECT MAX(grup) FROM riwayat)");
          if (!$produk_query) {
              die('Kueri gagal: ' . mysqli_error($koneksi));
          }
          while ($produk = mysqli_fetch_assoc($produk_query)) {
        ?>
          <tr>
            <td><?= $produk['nama_produk'] ?></td>
            <td><?= $produk['jumlah'] ?></td>
            <td><?= $produk['harga'] ?></td>
            <td><?= $produk['total'] ?></td>
          </tr>
        <?php }?>
      </tbody>
      <tfoot>
        <tr class="total-row">
          <th colspan="3">Total</th>
          <th>
            <?php
              $query = "SELECT SUM(total) AS total_jumlah FROM riwayat WHERE grup = (SELECT MAX(grup) FROM riwayat)";
              $result = mysqli_query($koneksi, $query);
              if ($result) {
                  $row = mysqli_fetch_assoc($result);
                  $total_jumlah = $row['total_jumlah'];
                  echo $total_jumlah;
              } else {
                  echo "Error: " . mysqli_error($koneksi);
              }
            ?>
          </th>
        </tr>
      </tfoot>
    </table>
    <button onclick="window.print();">Print</button>
  </div>
  <script>
    const dateElement = document.getElementById("receipt-date-time");
    function updateTime() {

      
      const now = new Date();
      const formattedDate = now.toLocaleDateString("id-ID", {
        day: "numeric",
        month: "long",
        year: "numeric",
      });
      const formattedTime = now.toLocaleTimeString("id-ID", {
        hour: "2-digit",
        minute: "2-digit",
      });
      dateElement.textContent = `Tanggal: ${formattedDate} ${formattedTime} WIB`;
    }
    updateTime();
    setInterval(updateTime, 1000);

  
    window.onafterprint = function() {
  window.location.href = "../index.php";
};
  </script>
</body>
</html>
