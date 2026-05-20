<?php
include '../layout/header.php';
global $conn;

?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Data Suplier
      <small>
        Aplikasi Kasir Sederhana
      </small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Data Suplier</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="box box-primary">
      <div class="box-header">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambah-supplier"><i class="glyphicon glyphicon-plus"></i> Tambah

        </button>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <table class="table table-bordered table-striped table-responsive">
          <thead>
            <tr>
              <th>NO</th>
              <th>Nama Supplier</th>
              <th>Alamat</th>
              <th>No Telepon</th>
              <th>OPSI</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $dt_suplier = mysqli_query($conn, "SELECT * FROM supplier");
            $no = 1;
            while ($supplier = mysqli_fetch_array($dt_suplier)) { ?>
              <tr> <!-- Pindahkan <tr> ke dalam loop -->
                <td><?php echo $no++; ?></td>

                <td><?php echo $supplier['nama_supplier']; ?></td>
                <td><?php echo $supplier['alamat']; ?></td>
                <td><?php echo $supplier['telepon']; ?></td>
                <td>
                  <!-- Hilangkan spasi pada id modal -->
                  <button type="button" class="btn btn-xs btn-warning" title="Edit" data-toggle="modal" data-target="#edit-supplier<?php echo $supplier['id_supplier']; ?>">
                    <i class="glyphicon glyphicon-edit"></i>
                  </button>
                  <div class="modal fade" id="edit-supplier<?php echo $supplier['id_supplier']; ?>">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                          <h4 class="modal-title">Edit Data Supplier</h4>
                        </div>
                        <form action="suplier_update.php" method="POST">
                          <div class="modal-body">
                            <div class="form-group">
                              <input type="hidden" class="form-control" name="id_supplier" value="<?php echo ($supplier['id_supplier']); ?>">
                              <label>Nama Supplier</label>
                              <input type="text" class="form-control" name="nama_supplier" value="<?php echo ($supplier['nama_supplier']); ?>">
                            </div>
                            <div class="form-group">
                              <label>Alamat</label>
                              <input type="text" class="form-control" name="alamat" value="<?php echo ($supplier['alamat']); ?>">
                            </div>
                            <div class="form-group">
                              <label>No Telepon</label>
                              <input type="text" class="form-control" name="no_telepon" value="<?php echo ($supplier['telepon']); ?>">
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

                  <a href="suplier_hapus.php?id_supplier=<?php echo $supplier['id_supplier']; ?>" class="btn btn-xs btn-danger" role="button" title="Hapus" onclick="return confirm('Apakah Anda yakin ingin menghapus supplier ini?')">
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
<div class="modal fade" id="tambah-supplier">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Tambah Data Supplier</h4>
      </div>
      <form action="suplier_proses.php" method="POST">
        <div class="modal-body">
          <div class="form-group">
            <label>Nama Supplier</label>
            <input type="text" class="form-control" name="nama_supplier">
          </div>
          <div class="form-group">
            <label>Alamat</label>
            <input type="text" class="form-control" name="alamat">
          </div>
          <div class="form-group">
            <label>No Telepon</label>
            <input type="text" class="form-control" name="no_telepon">
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary"> Save </button>
          </div>
        </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<?php

include "../layout/footer.php";

?>
</body>

</html>