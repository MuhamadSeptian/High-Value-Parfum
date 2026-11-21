<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
       .register-container {
        max-width: 50%;
        margin: 0 auto;
        background-color: white;
        border-radius: 8px;
        padding: 15px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
       }
        .register-container h2 {
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>
<body style="background-image: url(../home/header-bg.jpg); background-size: cover; background-repeat: no-repeat; width: 100%;"S>
<div class="container">
    <div class="login-box" style="padding:10px; border-radius:20px; background-color: white; width:40%; margin: 0 auto; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
        <?php
        if (isset($_GET['alert'])) {
          if ($_GET['alert'] == "gagal") {
            echo "<div class='alert alert-danger'>LOGIN GAGAL! USERNAME DAN PASSWORD SALAH!</div>";
          } else if ($_GET['alert'] == "logout") {
            echo "<div class='alert alert-success'>ANDA TELAH BERHASIL LOGOUT</div>";
          } else if ($_GET['alert'] == "belum_login") {
            echo "<div class='alert alert-warning'>ANDA HARUS LOGIN UNTUK MENGAKSES DASHBOARD</div>";
          }
           else if ($_GET['alert'] == "gagalinsert") {
            echo "<div class='alert alert-warning'>insert</div>";
          }
          else if ($_GET['alert'] == "gagalcek") {
            echo "<div class='alert alert-warning'>cek</div>";
          }
          else if ($_GET['alert'] == "gagaluser") {
            echo "<div class='alert alert-warning'>user</div>";
          }
        }
        ?>


            <h2 style="color: black;  text-align: center;"><b>REGISTER</h2></b>
            <form style="color: black; text-align: center;" action="daftar.php" method="post">
    <div class="form-group">
        <label for="username">Username</label><br>
        <input style="display: block; margin: 0 auto; padding: 10px; width: 300px;" type="text" class="form-control" id="username" name="username" placeholder="Enter username" required>
    </div>
    <div class="form-group">
        <label for="email">Email address</label><br>
        <input style="display: block; margin: 0 auto; padding: 10px; width: 300px;"  type="email" class="form-control" id="email" name="email" placeholder="Enter email" required>
    </div>
    <div class="form-group">
        <label for="password">Password</label><br>
        <input style="display: block; margin: 0 auto; padding: 10px; width: 300px;"  type="password" class="form-control" id="password" name="password" placeholder="Password" required>
    </div>
    <div class="form-group">
        <label for="confirm-password">Confirm Password</label><br>
        <input style="display: block; margin: 0 auto; padding: 10px; width: 300px;"  type="password" class="form-control" id="confirm-password" name="confirm-password" placeholder="Confirm Password" required>
    </div>
    <div class="form-group">
        <label for="address">Address</label><br>
        <textarea style="display: block; margin: 0 auto; padding: 10px; width: 300px;"  class="form-control" id="address" name="address" rows="3" placeholder="Enter address" required></textarea>
    </div>
    <button style="display: block; margin: 0 auto; padding: 5px; width: 500px;" type="submit" class="btn btn-warning btn-block">Register</button>
</form>

        </div>
    </div>
</div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
