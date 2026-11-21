<?php
// Pastikan koneksi dan sesi dimulai sebelum melakukan kueri
include '../koneksi.php';
session_start();

// Dummy data for products (In real application, this should come from a database)
$produk_query = mysqli_query($koneksi, "SELECT * FROM produk ORDER BY id_barang DESC");

// Periksa apakah kueri berhasil dieksekusi
if (!$produk_query) {   
    die('Kueri gagal: ' . mysqli_error($koneksi));
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;0,400;0,700;1,700&display=swap" rel="stylesheet">
    <link rel="icon" href="../img/logo.jpg">
    
    <!-- Feather Icons -->
    <script src="https://unpkg.com/feather-icons"></script>

    <!-- My Style -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="kkk.css">
</head>
<body>
<!-- Navbar start -->
<nav class="navbar">
    <i href="#" class="navbar-logo">highvalue<span>parfume</span>.</i>

    <div class="navbar-navs">
        <span style="cursor: pointer; text-align: center;" onclick="window.location.href='../index.php'">Home</span>
        <span style="cursor: pointer;" onclick="window.location.href='../about/about1.php'">About</span>
        <span style="cursor: pointer;" onclick="window.location.href='product1.php'">Product</span>
        <span style="cursor: pointer;" onclick="window.location.href='../FAQ/FAQ.php'">FAQ</span>
    </div>
    
    <div class="navbar-extra">
        <a style="display: none;" href="#" id="search-button"><i data-feather="search"></i></a>
        <span href="#" id="shopping-cart-button"><i data-feather="shopping-cart"></i></span>
        <a style="display: none;" href="#" id="parfume-menu"><i data-feather="menu"></i></a>
    </div>

    <!-- Search Form start -->
    <div class="search-form">
        <input type="search" id="search-box" placeholder="search here...">
        <label for="search-box"><i data-feather="search"></i></label>
    </div>
    <!-- Search Form end -->

    <!-- Shopping Cart start -->
    <div class="shopping-cart" style="background-color: #eee;">
        <div class="cart-items">
            <?php 
            $keranjang_query = mysqli_query($koneksi, "SELECT keranjang.*, produk.gambar FROM keranjang RIGHT JOIN produk ON keranjang.nama = produk.nama WHERE keranjang.nama IS NOT NULL;");
            if (!$keranjang_query) {
                die('Kueri gagal: ' . mysqli_error($koneksi));
            }
            while ($keranjang = mysqli_fetch_assoc($keranjang_query)) { 
            ?>
            <br>
            <div class="box">
                <div style="display: flex; align-items: center; justify-content: space-between; padding: 10px;">
                    <img src="../admin/gambar/<?php echo $keranjang['gambar']; ?>" style="width: 80px; height: 80px;  border-radius: 50%; margin-right: 15px;">
                    <div class="content" style="flex-grow: 1;">
                        <h3 style="margin: 0;"><?= $keranjang['nama'] ?></h3>
                        <span class="price" style="display: block; margin-bottom: 5px;"><?= "Rp. ".number_format($keranjang['harga_satuan'])." ,-" ?></span>
                        <span class="quantity" style="display: block;">Jumlah: <?= $keranjang['jumlah_barang'] ?></span>
                    </div>
                    <a href="hapus_keranjang.php?id=<?php echo($keranjang['id_keranjang']); ?>" onClick="return confirm('Apakah Anda Yakin Hapus Data?')" class="btn btn-danger mb-3">
                        <i class="fa fa-fw fa-trash"></i>
                        <font color="white">Hapus</font>
                    </a>
                </div>
            </div>
            <?php
            }
            ?>
            <br>
            <button style="width: 100%; background-color: #df6e05;"><a style="color: white; text-decoration:none;" href="../payment/hh.php">pesan sekarang</a></button>
        </div>
    </div>
    <!-- Shopping Cart end -->
</nav>
<!-- Navbar end -->

<!-- order parfume -->
<section class="products" id="products">
    <h2>Order <span>Parfume</span></h2>
    <div class="row">
        <?php while ($produk = mysqli_fetch_assoc($produk_query)) { ?>
        <div class="product-card">
            <div class="product-icons">
                <a href="#" id="btn-beli"><i data-bs-toggle="modal" data-bs-target="#staticBackdrop<?= $produk['id_barang'] ?>" data-feather="shopping-cart"></i></a>
            </div>
            <div class="product-image">
                <img src="../admin/gambar/<?php echo $produk['gambar']; ?>" alt="<?php echo $produk['nama']; ?>" width="100%">
            </div>
            <div class="product-content">
                <h3><?= $produk['nama'] ?></h3>
                <p style="text-align: justify; text-justify: inter-word;"><?= $produk['deskripsi']?></p>
                <div class="product-stars">
                    <i data-feather="star" class="star-full"></i>
                    <i data-feather="star" class="star-full"></i>
                    <i data-feather="star" class="star-full"></i>
                    <i data-feather="star" class="star-full"></i>
                    <i data-feather="star" class="star-full"></i>
                </div>
                <div class="product-price"><?= "Rp ".number_format($produk['harga'])."" ?>K</div>
                <button class="btn btn-warning" type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop<?= $produk['id_barang'] ?>">Masukkan Keranjang</button>
            </div>
        </div>

        <!-- modal -->
        <div class="modal fade" id="staticBackdrop<?= $produk['id_barang'] ?>" tabindex="-1" aria-labelledby="staticBackdropLabel<?= $produk['id_barang'] ?>" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div style="background-color:#0E46A3;" class="modal-header">
                        <h1 style="color:white; text-align: center; margin-left: 200px; display: block;" class="modal-title fs-5" id="staticBackdropLabel"><?= $produk['nama'] ?></h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form style="background-color: white;" method="post" action="proses_keranjang.php">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col" style="display: flex; justify-content: center; align-items: center">
                                    <img src="../admin/gambar/<?php echo $produk['gambar']; ?>" style="width: 300px; height: 300px; border: 3px solid #0E46A3; border-radius: 50%; margin-left:25px;">
                                </div>
                                <div class="col">
                                    <h5 style="text-align: center; color: black; font-size:20px;">Deskripsi Produk</h5>
                                    <br>
                                    <p style="font-size: 15px; text-align: justify; text-justify: inter-word; color: black;"><?= $produk['deskripsi'] ?></p>
                                    <br>
                                    <p style="font-size: 20px; color: black;">Rp<?= number_format($produk['harga']) ?>K</p>
                                    <input type="hidden" name="produk_id" value="<?= $produk['id_barang'] ?>">
                                    <input type="hidden" name="gambar" value="<?= $produk['gambar'] ?>">
                                </div>
                            </div>
                        </div>
                        <div style="background-color:#0E46A3; font-size: 20px;" class="modal-footer">
                            <label style="color: white;" for="Jumlist">Jumlah</label>
                            <input type="hidden" value="<?= $produk['nama'] ?>" name="nama_produk">
                            <input type="hidden" value="<?= $produk['harga'] ?>" name="harga_produk">
                            <input style="border: 1px solid; border-radius:10px; width:150px;" type="number" id="Jumlist" name="jumlah" size="25" required>
                            <button type="submit" class="btn" style="background-color: #E1F7F5; color: black;" data-bs-dismiss="modal">Masukkan Keranjang</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- akhir modal -->

        <?php } ?>
    </div>
</section>

<!-- Footer start -->
<footer>
    <div class="socials">
        <a href="https://www.instagram.com/fathir.7z/"><i data-feather="instagram"></i></a>
        <a href="https://www.instagram.com/fathir.7z/"><i data-feather="twitter"></i></a>
        <a href="https://www.instagram.com/fathir.7z/"><i data-feather="facebook"></i></a>
    </div>
    <div class="navbar-navs">
        <span style="cursor: pointer; margin-right: 25px;" onclick="window.location.href='../index.php'">Home</span>
        <span style="cursor: pointer; margin-right: 25px;" onclick="window.location.href='../about/about1.php'">About</span>
        <span style="cursor: pointer; margin-right: 25px;" onclick="window.location.href='product1.php'">Product</span>
        <span style="cursor: pointer; margin-right: 25px;" onclick="window.location.href='../FAQ/FAQ.php'">FAQ</span>
    </div>
    <br>

    <div class="credit">
        <p>Created by <a style="color: white; text-decoration:none;" href="">HVF WEB TEAM</a>. | &copy;Informatika 2022.</p>
    </div>
</footer>
<!-- Footer end -->

<!-- Feather Icons -->
<script>
    feather.replace();
</script>
<!-- Feather Icons end -->

<!-- KOde P -->
<script>
function hapus() {
    // Mengarahkan browser ke skrip PHP yang diinginkan
    window.location = 'hapus_keranjang.php';
}
function co() {
    // Mengarahkan browser ke skrip PHP yang diinginkan
    window.location = 'proses_payment.php';
}
</script>
<!-- Akhir Kode P -->

<!-- My Javascript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="produk.js"></script>
</body>
</html>
