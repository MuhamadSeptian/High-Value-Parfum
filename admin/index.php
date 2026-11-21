<?php include 'header.php'; ?>

<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Dashboard
      <small>Admin panel</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
      <li class="active">Dashboard</li>
    </ol>
  </section>
  <section class="content">
<div class="row">
<div class="col-lg-3 col-xs-6">
  <div class="small-box bg-blue">
    <div class="inner">
      <?php
      $query = "SELECT COUNT(*) AS total FROM users";
      $result = mysqli_query($koneksi, $query);
      $row = mysqli_fetch_assoc($result);
      $total_rows = $row['total'];
      echo "$total_rows"
        ?>
      <p>Total Users (Pengguna)</p>
    </div>
    <div class="icon">
      <i class="ion ion-stats-bars"></i>
    </div>
    <a href="#" class="small-box-footer"><i class="fa fa-users"></i></a>
  </div>
</div>

<div class="col-lg-3 col-xs-6">
  <div class="small-box bg-red">
    <div class="inner">
      <?php
      $query = "SELECT COUNT(*) AS total FROM produk";
      $result = mysqli_query($koneksi, $query);
      $row = mysqli_fetch_assoc($result);
      $total_rows = $row['total'];
      echo "$total_rows"
        ?>
      <p>Total Produk</p>
    </div>
    <div class="icon">
      <i class="ion ion-stats-bars"></i>
    </div>
    <a href="#" class="small-box-footer"><i class="fa fa-th-large"></i></a>
  </div>
</div>
</div>
     <!-- Calendar -->
     <div class="box box-solid bg-green-gradient">
          <div class="box-header">
            <i class="fa fa-calendar"></i>
            <h3 class="box-title">Kalender</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body no-padding">
            <!--The calendar -->
            <div id="calendar" style="width: 100%"></div>
          </div>
          <!-- /.box-body -->
        </div>
</section>
</div>
<?php include 'footer.php'; ?>

