<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>High Value Parvum</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body style="background-image: url(../home/header-bg.jpg); background-size: cover; background-repeat: no-repeat; width: 100%;">
  <div class="container">
    <div class="login-box">
        
    <center>
  <h3 style="color: white;">Welcome to</h3>
  <h3 style="color: white;"><b>High Value Parfume</b></h3>
  <br />
  <?php
    if (isset($_GET['alert'])) {
      if ($_GET['alert'] == "gagal") {
        echo "<div style='color: red;'>LOGIN GAGAL! USERNAME DAN PASSWORD SALAH!</div>";
      } else if ($_GET['alert'] == "logout") {
        echo "<div>ANDA TELAH BERHASIL LOGOUT</div>";
      } else if ($_GET['alert'] == "belum_login") {
        echo "<div>ANDA HARUS LOGIN UNTUK MENGAKSES DASHBOARD</div>";
      }
    }
  ?>
</center>


      <div style="background-color: white; border-radius: 20px; padding: 20px; margin: 20px auto; max-width: 400px;">

    <div class="text-center">
        <span style="color: black; text-align:center;">
            <h1><b>LOGIN</b></h1>
        </span>
        <span style="color: black; text-align:center;">
            <h4><b>HVF Apps</b></h4>
        </span>
        <span style="color: black; text-align:center;">
            <h5>Masukkan User & Password Anda</h5>
        </span>

        <form action="../login/periksa_login.php" method="POST">
            <div class="form-group has-feedback" style="display: flex; justify-content: center; align-items: center;">
            <input type="text" class="form-control" style="border-radius: 10px; padding: 10px; width: 300px; font-size: 16px; border: 1px solid #ccc;" name="username" placeholder="Username" required="required" autocomplete="off">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div><br>
            <div class="form-group has-feedback"  style="display: flex; justify-content: center; align-items: center;">
                <input style="border-radius: 10px; padding: 10px; width: 300px; font-size: 16px; border: 1px solid #ccc;" type="password" class="form-control" name="password" placeholder="Password" name="password" required="required" autocomplete="off">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div><br>
            <div class="row">
              <div class="col-xs-6">
                  <button style="background-color: green; color:white; border-radius: 10px; padding: 10px; width: 150px; font-size: 15px; border: 1px solid #ccc;" type="submit" class="btn btn-light btn-block btn-flat">Sign In</button>
              </div>
              <div class="col-xs-6" style="display: flex; justify-content: flex-end; margin-top:-38px;">
                  <button onClick="register(); return false;" style="background-color: #FFFF00; border-radius: 10px; padding: 10px; width: 150px; font-size: 15px; border: 1px solid #ccc;" type="" class="btn btn-light btn-block btn-flat">Register</button>
              </div>
            </div>

        </form>
    </div>
</div>
</div>
</div>

    <script>function register () {
    // Mengarahkan browser ke skrip PHP yang diinginkan
    window.location = '../register/register.php';}
     </script>

    <script src="assets/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

</body>

</html>