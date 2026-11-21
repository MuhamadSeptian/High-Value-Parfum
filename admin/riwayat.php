<?php include 'header.php'; ?>

<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Riwayat
      <small>Data Riwayat</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
      <li class="active">Dashboard</li>
    </ol>
  </section>

  <section class="content">
    <div class="row">
      <section class="col-lg-10 col-lg-offset-1">
        <div class="box box-info">

          <div class="box-header">
            <h3 class="box-title">Riwayat</h3>
          </div>
          <div class="box-body">
            <div class="table-responsive">
              <table class="table table-bordered table-striped" id="table-datatable">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>NAMA_PRODUK</th>
                    <th>HARGA</th>
                    <th>JUMLAH</th>
                    <th>NAMA_LENGKAP</th>
                    <th>EMAIL</th>
                    <th>ALAMAT</th>
                    <th>TOTAL</th>
                    <th width="10%">OPSI</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  include '../koneksi.php';
                  $no=1;
                  $data = mysqli_query($koneksi,"SELECT * FROM riwayat");
                  while($d = mysqli_fetch_array($data)){
                    ?>
                    <tr>
                      <td><?php echo $d['id_riwayat']; ?></td>
                      <td><?php echo $d['nama_produk']; ?></td>
                      <td><?php echo "Rp. ".number_format($d['harga'])." ,-"; ?></td>
                      <td><?php echo $d['jumlah']; ?></td>
                      <td><?php echo $d['nama_lengkap']; ?></td>
                      <td><?php echo $d['email']; ?></td>
                      <td><?php echo $d['alamat_lengkap']; ?></td>
                      <td><?php echo "Rp. ".number_format($d['total'])." ,-"; ?></td>
                      <td>                        
                      <a class="btn btn-danger btn-sm" style="display: flex; align-items: center; justify-content: center;" href="riwayat_hapus.php?id=<?php echo $d['id_riwayat'] ?>"><i class="fa fa-trash"></i></a>
                        <?php } ?>
                      </td>
                    </tr>
                </tbody>
              </table>
            </div>
          </div>

        </div>
      </section>
    </div>
  </section>

</div>
<?php include 'footer.php'; ?>