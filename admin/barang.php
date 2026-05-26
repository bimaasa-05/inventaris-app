<?php
include '../layout/header.php';
global $conn;

?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Data Barang
      <small>
        Aplikasi Inventaris Barang Sederhana
      </small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Data Barang</li>
    </ol>
    <section class="content-header">
      <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-edit"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Total Barang</span>
              <span class="info-box-number">
                <?php
                $produk = mysqli_query($conn, "SELECT * FROM barang");
                echo mysqli_num_rows($produk);
                ?>
              </span>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="box box-primary">
        <div class="box-header">
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambah-barang"><i class="glyphicon glyphicon-plus"></i> Tambah Data

          </button>
        </div>

        <!-- /.box-header -->
        <div class="box-body">
          <table class="table table-bordered table-striped table-responsive">
            <thead>
              <tr>
                <th>NO</th>
                <th>Kode Barang</th>
                <th>Nama Barang</th>

                <th>Stok</th>
                <th>Harga Beli</th>
                <th>Harga Jual</th>
                <th>OPSI</th>
              </tr>
            </thead>
            <tbody>

              <?php
              //Tb_join
              //$dt_barang = mysqli_query($conn, "SELECT barang.*, kategori.nama_kategori, supplier.nama_supplier FROM barang INNER JOIN kategori ON barang.id_kategori = kategori.id_kategori LEFT JOIN supplier ON barang.id_supplier = supplier.id_supplier");
              $dt_barang = mysqli_query($conn, "SELECT * FROM barang ");
              $no = 1;
              while ($barang = mysqli_fetch_array($dt_barang)) { ?>
                <tr>
                  <td><?php echo $no++; ?></td>

                  <td><?php echo $barang['kode_barang']; ?></td>
                  <td><?php echo $barang['nama_barang']; ?></td>
                  <td><?php echo $barang['stok']; ?></td>
                  <td><?php echo "Rp. " . number_format($barang['harga_beli']) . ",-"; ?></td>
                  <td><?php echo "Rp. " . number_format($barang['harga_jual']) . ",-"; ?></td>
                  <td>
                    <!-- Hilangkan spasi pada id modal -->
                    <button type="button" class="btn btn-xs btn-warning" title="Edit" data-toggle="modal" data-target="#edit-barang<?php echo $barang['id_barang']; ?>">
                      <i class="glyphicon glyphicon-edit"></i>
                    </button>
                    <div class="modal fade" id="edit-barang<?php echo $barang['id_barang']; ?>">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Edit Data Barang</h4>
                          </div>
                          <form action="barang_update.php" method="POST">
                            <div class="modal-body">
                              <div class="form-group">
                                <input type="hidden" class="form-control" name="id_barang" value="<?php echo ($barang['id_barang']); ?>">
                                <label>Kode Barang</label>
                                <input type="text" class="form-control" name="kode_barang" value="<?php echo ($barang['kode_barang']); ?>">
                              </div>
                              <div class="form-group">
                                <label>Nama Barang</label>
                                <input type="text" class="form-control" name="nama_barang" value="<?php echo ($barang['nama_barang']); ?>">
                              </div>
                              <div class="form-group">
                                <label>Kategori ID</label>
                                <input type="text" class="form-control" name="id_kategori" value="<?php echo ($barang['id_kategori']); ?>">
                              </div>
                              <div class="form-group">
                                <label>Supplier ID</label>
                                <input type="text" class="form-control" name="id_supplier" value="<?php echo ($barang['id_supplier']); ?>">
                              </div>
                              <div class="form-group">
                                <label>Satuan</label>
                                <input type="text" class="form-control" name="satuan" value="<?php echo ($barang['satuan']); ?>">
                              </div>
                              <div class="form-group">
                                <label>Stok</label>
                                <input type="text" class="form-control" name="stok" value="<?php echo ($barang['stok']); ?>">
                              </div>
                              <div class="form-group">
                                <label>Harga Beli</label>
                                <input type="text" class="form-control" name="harga_beli" value="<?php echo ($barang['harga_beli']); ?>">
                              </div>
                              <div class="form-group">
                                <label>Harga Jual</label>
                                <input type="text" class="form-control" name="harga_jual" value="<?php echo ($barang['harga_jual']); ?>">
                              </div>
                              <div class="modal-footer">
                                <button type="submit" class="btn btn-primary"> Update </button>
                              </div>
                            </div>
                          </form>
                        </div>
                        <!-- /.modal-content -->
                      </div>
                      <!-- /.modal-dialog -->
                    </div>
                    <!-- /.modal -->

                    <a href="barang_hapus.php?id_barang=<?php echo $barang['id_barang']; ?>" class="btn btn-xs btn-danger" role="button" title="Hapus" onclick="return confirm('Apakah Anda yakin ingin menghapus barang ini?')">
                      <i class="glyphicon glyphicon-trash"></i>
                    </a>
                  </td> <!-- Tutup td sebelum tutup tr -->
                </tr>
              <?php
              }
              ?>
            </tbody>
          </table>
        </div>
        <!-- /.box-body -->
      </div>
    </section>
</div>
<!-- /.content -->
</div>
<div class="modal fade" id="tambah-barang">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Tambah Data Barang</h4>
      </div>
      <form action="barang_proses.php" method="POST">
        <div class="modal-body">
          <div class="form-group">
            <label>Kode Barang</label>
            <input type="text" class="form-control" name="kode_barang">
          </div>
          <div class="form-group">
            <label>Nama Barang</label>
            <input type="text" class="form-control" name="nama_barang">
          </div>
          <div class="form-group">
            <label>Kategori ID</label>
            <input type="text" class="form-control" name="id_kategori">
          </div>
          <div class="form-group">
            <label>Supplier ID</label>
            <input type="text" class="form-control" name="id_suplier">
          </div>
          <div class="form-group">
            <label>Satuan</label>
            <input type="text" class="form-control" name="satuan">
          </div>
          <div class="form-group">
            <label>Stok</label>
            <input type="text" class="form-control" name="stok">
          </div>
          <div class="form-group">
            <label>Harga Beli</label>
            <input type="text" class="form-control" name="harga_beli">
          </div>
          <div class="form-group">
            <label>Harga Jual</label>
            <input type="text" class="form-control" name="harga_jual">
          </div>

          <div class="modal-footer">
            <button type="submit" class="btn btn-primary"> Save </button>
          </div>
        </div>
      </form>
    </div>
  </div>
  <!-- /.modal -->

  <?php

  include "../layout/footer.php";

  ?>
  </body>

  </html>