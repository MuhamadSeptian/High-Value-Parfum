<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <?php 
    include 'koneksi.php';
    session_start();
    ?>
    <title>Home</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;0,400;0,700;1,700&display=swap" rel="stylesheet">
    <link rel="icon" href="./img/logo.jpg" />
    <!-- Feather Icons -->
    <script src="https://unpkg.com/feather-icons"></script>

    <!-- My Style -->
    <link rel="stylesheet" href="home/index1.css"/>
  </head>

  <body>
    <!-- Navbar start -->
    <nav class="navbar">
      <i href="#" class="navbar-logo">highvalue<span>parfume</span>.</i>

      <div>
        <a href="index.php">Home</a>
        <a href="about/about1.php">About</a>
        <a href="produk/product1.php">Product</a>
        <a href="FAQ/FAQ.php">FAQ</a>
        <?php
            
            if($_SESSION){
              echo "
                <a class='nav-link'>", $_SESSION['nama'] ,"</a>
                <a class='nav-link' href='login/logout.php'>Log Out</a>
           ";
            }else{
              echo "
                <a class='nav-link' href='login/index.php'>Log in</a>
              ";
            }

            ?>
      </div>

      <div class="navbar-extra">
      </div>
    </nav>
    <!-- Navbar end -->
<br>
<br>
    <!-- Hero Section start -->
    <section class="hero" id="home">
      <div class="mask-container">
        <main class="content">
          <h1>Karya Seni <span>Aroma</span> yang Menggoda</h1>
          <p>
            Di balik setiap botol parfum High Value Parfume kami, terdapat lebih
            dari sekedar wangi yang memikat. Itu adalah karya seni, penciptaan
            teliti dari aroma yang mengeksplorasi nuansa dan karakter yang unik.
            Setiap tetes parfum adalah hasil dari upaya yang teliti dan komitmen
            kami untuk memberikan pengalaman yang tak terlupakan. Kami, High
            Value Parfume, mengundang Anda untuk memasuki dunia yang memikat
            ini, mengeksplorasi nuansa, dan merasakan keindahan aroma yang
            memukau. Selamat datang di dunia kami, di mana setiap wangi adalah
            sebuah karya seni yang menggoda.
          </p>
          <a href="produk/product1.php" class="cta">Beli Sekarang</a>
        </main>
      </div>
    </section>
    <!-- Hero Section end -->

   <!-- Contact Section start -->
   <section id="contact" class="contact">
        <h2><span>Kontak</span> Kami</h2>
  
        <div class="row">
          <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3984.472430753112!2d104.76089558885498!3d-2.966330699999996!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e3b779de3f5746b%3A0x38f53803e63e5936!2sFakultas%20Sains%20%26%20Teknologi%20UKMC!5e0!3m2!1sid!2sid!4v1696000055505!5m2!1sid!2sid"
            width="600"
            height="600"
            style="border: 0"`
            allowfullscreen=""
            loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"
            allowfullscreen=""
            loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"
            class="map"
          ></iframe>
          <br />
  
          <form action="">
            <div>
              Jika Anda memiliki pertanyaan, saran, atau ingin berbagi pengalaman
              tentang produk kami, kami sangat ingin berkomunikasi dengan Anda.
            </div>
            <br />
            <div>Anda dapat langsung menghubungi tim kami:</div>
            <div class="input-group">
              <i data-feather="user"></i>
              <input type="text" placeholder="nama" />
            </div>
            <div class="input-group">
              <i data-feather="mail"></i>
              <input type="text" placeholder="email" />
            </div>
            <div class="input-group">
              <i data-feather="phone"></i>
              <input type="text" placeholder="no hp" />
            </div>
            <button type="submit" class="btn">kirim pesan</button>
            <div>
              <br />
              Jangan ragu untuk menghubungi kami kapan saja. Kami akan dengan
              senang hati membantu Anda dengan pertanyaan atau permintaan apa pun
              yang Anda miliki. Terima kasih telah memilih High Value Parfume!
            </div>
          </form>
        </div>
      </section>
      <!-- Contact Section end -->


    <!-- Footer start -->
    <footer>
      <div class="socials">
        <a href="https://www.instagram.com/fathir.7z/"
          ><i data-feather="instagram"></i
        ></a>
        <a href="https://www.instagram.com/fathir.7z/"
          ><i data-feather="twitter"></i
        ></a>
        <a href="https://www.instagram.com/fathir.7z/"
          ><i data-feather="facebook"></i
        ></a>
      </div>

      <div class="links">
        <a href="index1.php">Home</a>
        <a href="about1.php">About</a>
        <a href="product1.php">Product</a>
        <a href="FAQ.php">FAQ</a>
      </div>

      <div class="credit">
        <p>
          Created by <a style="color:white;" href="">HVF WEB TEAM</a>. | &copy;Informatika
          2022.
        </p>
      </div>
    </footer>
    <!-- Footer end -->

    <!-- Feather Icons -->
    <script>
      feather.replace();
    </script>

  </body>
</html>
