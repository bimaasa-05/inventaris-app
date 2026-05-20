<?php
include '../config/koneksi.php';
global $conn;
mysqli_query($conn, "SELECT * FROM users");

?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Dashboard
      <small>Version 2.0</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Dashboard</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Info boxes -->
    <div class="row">
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-aqua"><i class="fa fa-edit"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Data barang</span>
            <span class="info-box-number"><small>
                <?php
                $produk = mysqli_query($conn, "SELECT * FROM barang");
                echo mysqli_num_rows($produk);
                ?>
              </small></span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-red"><i class="fa fa-truck"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Data Supplier</span>
            <span class="info-box-number">
              <?php
              $supplier = mysqli_query($conn, "SELECT * FROM supplier");
              echo mysqli_num_rows($supplier);
              ?>
            </span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->

      <!-- fix for small devices only -->
      <div class="clearfix visible-sm-block"></div>

      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-green"><i class="fa fa-plus"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Barang Masuk</span>
            <span class="info-box-number">
              <?php
              $barang_masuk = mysqli_query($conn, "SELECT * FROM barang_masuk");
              echo mysqli_num_rows($barang_masuk);
              ?>
            </span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-yellow"><i class="fa fa-minus-circle"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Barang Keluar</span>
            <span class="info-box-number">
              <?php
              $barang_keluar = mysqli_query($conn, "SELECT * FROM barang_keluar");
              echo mysqli_num_rows($barang_keluar);
              ?>
            </span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- Main row -->
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->