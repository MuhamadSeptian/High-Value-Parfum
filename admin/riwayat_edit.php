<?php 
include 'header.php';
include '../koneksi.php';
?>

<div class="content-wrapper">

  <section class="content-header">
    <h1>
     Riwayat
      <small>Edit Riwayat</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Dashboard</li>
    </ol>
  </section>

  <section class="content">
    <div class="row">
      <section class="col-lg-6 col-lg-offset-3">       
        <div class="box box-info">

          <div class="box-header">
            <h3 class="box-title">Edit Riwayat</h3>
            <a href="riwayat.php" class="btn btn-info btn-sm pull-right"><i class="fa fa-reply"></i> &nbsp; Kembali</a> 
          </div>
          <div class="box-body">
            <form action="riwayat_update.php" method="post" enctype="multipart/form-data">
              <?php 
              $id = $_GET['id'];              
              $data = mysqli_query($koneksi, "select * from riwayat where id_riwayat='$id'");
              while($d = mysqli_fetch_array($data)){
                ?>

                <div class="form-group">
                  <label>Nama</label>
                  <input type="text" class="form-control" name="nama" value="<?php echo $d['nama_produk'] ?>" required="required">
                  <input type="hidden" class="form-control" name="id" value="<?php echo $d['id_riwayat'] ?>" required="required">
                </div>

                <div class="form-group">
                  <label>Harga</label>
                  <input type="text" class="form-control" name="harga" value="<?php echo $d['harga'] ?>" required="required">
                </div>
                <div class="form-group">
                  <label>jumlah</label>
                  <input type="price" class="form-control" name="jumlah" value="<?php echo $d['jumlah'] ?>" required="required">
                </div>
                <div class="form-group">
                  <label>Nama_lengkap</label>
                  <input type="text" class="form-control" name="nama_lengkap" value="<?php echo $d['nama_lengkap'] ?>" required="required">
                </div>
                <div class="form-group">
                  <label>Email</label>
                  <input type="text" class="form-control" name="email" value="<?php echo $d['email'] ?>" required="required">
                </div>
                <div class="form-group">
                  <label>Alamat_lengkap</label>
                  <input type="text" class="form-control" name="alamat_lengkap" value="<?php echo $d['alamat_lengkap'] ?>" required="required">
                </div>
                <div class="form-group">
                  <label>total</label>
                  <input type="price" class="form-control" name="total" value="<?php echo $d['total'] ?>" required="required">
                </div>

                <div class="form-group">
                  <input type="submit" class="btn btn-sm btn-primary" value="Simpan">
                </div>
                <?php
              }

              ?>
              
            </form>
          </div>

        </div>
      </section>
    </div>
  </section>

</div>
<?php include 'footer.php'; ?>