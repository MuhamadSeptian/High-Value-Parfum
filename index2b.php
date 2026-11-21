<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Wisata2</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="stylesheet" href="wisata2.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;700&display=swap" rel="stylesheet" />
    <link rel="icon" href="/logo atas.png" />
    <?php 
  include '../../koneksi.php';
  session_start();
  ?>
  </head>
  <body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg fixed-top navbar-dark shadow-sm warnanav">
      <div class="container-fluid fw-medium teksnav">
        <img src="/logo.png" alt="" height="50px" />
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto text-center">
            <li class="nav-item">
              <button id="teksnav">
                <a class="nav-link" aria-current="page" href="../../../Home/index.php">Home</a>
              </button>
            </li>
            <li class="nav-item">
              <button id="teksnav">
                <a class="nav-link active" href="../../../Wisata//index.php">Wisata</a>
              </button>
            </li>
            <li class="nav-item">
              <button id="teksnav">
                <a class="nav-link" href="../../../Makanan/index.php">Kuliner</a>
              </button>
            </li>
            <li class="nav-item">
              <button id="teksnav">
                <a class="nav-link" href="../../../Adat/index.php">Kearifan Lokal</a>
              </button>
            </li>
            <?php
            
            if($_SESSION){
              echo "
              <li class='nav-item'>
              <button id='teksnav'>
                <a class='nav-link'>", $_SESSION['nama'] ,"</a>
              </button>
            </li>
              <li class='nav-item'><button id='teksnav'>
                <a class='nav-link' href='../logout.php'>Log Out</a>
              </button>
            </li>";
            }else{
              echo "
              </li>
              <li class='nav-item'><button id='teksnav'>
                <a class='nav-link' href='../index.php'>Log in</a>
              </button>
            </li>
              ";
            }

            ?>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Akhir Navbar -->
    <!-- Akhir Navbar -->
    <!-- Jumbotron -->
    <section id="home" class="jumbotron text-center" style="background: linear-gradient(180deg, #2f374b 3.12%, #262e42 20.8%, #262e42 41.55%, rgba(63, 73, 100, 0) 86.72%)">
      <img src="Lentera2.webp" style="background: linear-gradient(180deg, #3f4964 73.44%, rgba(60, 74, 111, 0) 100%)" width="100%" />
    </section>
    <div class="container">
      <br />
      <hr class="hrshadow" />
      <!-- Akhir Jumbotron -->
      <!-- Wisata Bengkulu -->
      <div class="container text-center">
        <h1>
          <div class="row justify-content-center hiddencenter">
            <div class="col">
              <div class="fw-bold poppinsboldsejarah" style="color: #383b38">
                <font color="#383b38">Beragam Pantai</font> <br />
                "Bengkulu"
              </div>
            </div>
          </div>
        </h1>
      </div>
      <br />
      <!-- Akhir WIsata Bengkulu -->
      <!-- Profil dan Sejarah -->
<?php 
    $id_user = $_SESSION['id'];
    $pantai_query = mysqli_query($koneksi, "SELECT * FROM pantai");
    // Periksa apakah kueri berhasil dieksekusi
    if (!$pantai_query) {
        die('Kueri gagal: ' . mysqli_error($koneksi));
    }
    // Loop melalui hasil kueri
    while ($pantai = mysqli_fetch_assoc($pantai_query)) {
?>
    <div class="row">
        <div class="col-md-6 p-3">
            <?php echo $pantai['tiktok'] ?>
        </div>
        <div class="col-md-6 poppinsmedium" style="color: #383b38">
            <br>
            <h2><b><?= $pantai['title'] ?></b></h2>
            <p class="teksps" align="justify">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $pantai['deskripsi']?>
            </p>  
        </div>
    </div>
<?php 
    }
?>


      <div class="container">
        <br />
        <hr class="hrshadow" />
      </div>
      <br /><br />
    </div>
    <!-- Akhir Profil dan Sejarah -->
    <!-- Footer -->
    <section style="background: #619ed4; padding: 2rem">
      <div class="container">
        <div class="poppinsmedium" align="left" style="color: #fff; font-size: 15px">
          <a href="https://www.instagram.com/pemprov_bengkulu/">
            <img src="/Bengkulu.png" alt="Logo Sponsor" class="img-sponsor" style="float: right; margin-right: 5px" />
          </a>

          <a href="https://www.instagram.com/ukmc.palembang/">
            <img src="/ukmc.png" alt="Logo Sponsor2" class="img-sponsor2" style="float: right; margin-right: 5px" />
          </a>

          <p>Project Pemrograman Web 1</p>
          <p>Dibuat di tahun 2023</p>
        </div>
        <br /><br /><br /><br />
        <div class="poppinsmedium text-center" style="color: #ffffff; font-size: 15px">
          <p>&#9898; Universitas Katolik Musi Charitas | Informatika 2022 &#9898;</p>
        </div>
      </div>
    </section>

    <!-- Akhir Footer -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="/script.js"></script>
  </body>
</html>
