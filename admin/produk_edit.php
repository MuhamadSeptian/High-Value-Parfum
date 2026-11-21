<?php 
include 'header.php';
include '../koneksi.php';
?>

<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Pengguna
      <small>Edit Pengguna</small>
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
            <h3 class="box-title">Edit Produk</h3>
            <a href="produk.php" class="btn btn-info btn-sm pull-right"><i class="fa fa-reply"></i> &nbsp; Kembali</a> 
          </div>
          <div class="box-body">
            <form action="produk_update.php" method="post" enctype="multipart/form-data">
              <?php 
              $id = $_GET['id'];              
              $data = mysqli_query($koneksi, "select * from produk where id_barang='$id'");
              while($d = mysqli_fetch_array($data)){
                ?>

                <div class="form-group">
                  <label>Nama</label>
                  <input type="text" class="form-control" name="nama" value="<?php echo $d['nama'] ?>" required="required">
                  <input type="hidden" class="form-control" name="id" value="<?php echo $d['id_barang'] ?>" required="required">
                </div>

                <div class="form-group">
                  <label>Gambar</label>
                  <input type="file" name="gambar">
                  <p>Kosong Jika tidak ingin di ganti</p>
                  <small>File yang di perbolehkan *PDF | *JPG | *jpeg </small>
                </div>

                <div class="form-group">
                  <label>Deskripsi</label>
                  <input type="text" class="form-control" name="deskripsi" value="<?php echo $d['deskripsi'] ?>" >
                </div>

                <div class="form-group">
                  <label>Harga</label>
                  <input type="price" class="form-control" name="harga" value="<?php echo $d['harga'] ?>" required="required">
                </div>

                <div class="form-group">
                  <input type="submit" class="btn btn-sm btn-primary" name="upload" value="Simpan">
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