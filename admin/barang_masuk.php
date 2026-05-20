<?php
include '../layout/header.php';
global $conn;

?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Data Barang Masuk
      <small>
        Aplikasi Kasir Sederhana
      </small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Data Barang Masuk</li>
    </ol>
  </section>

  <section class="content">
    <div class="box box-primary">
      <div class="box-header">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambah-barang-masuk"><i class="glyphicon glyphicon-plus"></i> Tambah

        </button>
      </div>
      <div class="box-body">
        <table class="table table-bordered table-striped table-responsive">
          <thead>
            <tr>
              <th>NO</th>
              <th>TANGGAL</th>
              <th>ID BARANG</th>
              <th>JUMLAH</th>
              <th>KETERANGAN</th>
              <th>USER ID</th>
              <th>OPSI</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $dt_masuk = mysqli_query($conn, "SELECT barang_masuk.*, barang.nama_barang, users.nama_lengkap 
                                             FROM barang_masuk 
                                             LEFT JOIN barang ON barang_masuk.id_barang = barang.id_barang 
                                             LEFT JOIN users ON barang_masuk.id_user = users.id_user");
            $no = 1;
            while ($masuk = mysqli_fetch_array($dt_masuk)) { ?>
              <tr>
                <td><?php echo $no++; ?></td>

                <td><?php echo $masuk['tanggal']; ?></td>
                <td><?php echo $masuk['nama_barang']; ?></td>
                <td><?php echo $masuk['jumlah']; ?></td>
                <td><?php echo $masuk['keterangan']; ?></td>
                <td><?php echo $masuk['nama_lengkap']; ?></td>
                <td>
                  <button type="button" class="btn btn-xs btn-warning" title="Edit" data-toggle="modal" data-target="#edit-barang-masuk<?php echo $masuk['id_masuk']; ?>">
                    <i class="glyphicon glyphicon-edit"></i>
                  </button>
                  <div class="modal fade" id="edit-barang-masuk<?php echo $masuk['id_masuk']; ?>">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                          <h4 class="modal-title">Edit Data Barang Masuk</h4>
                        </div>
                        <form action="barang_masuk_update.php" method="POST">
                          <div class="modal-body">
                            <div class="form-group">
                              <input type="hidden" class="form-control" name="id_barang_masuk" value="<?php echo ($masuk['id_masuk']); ?>">
                              <label>Tanggal</label>
                              <input type="date" class="form-control" name="tanggal" value="<?php echo ($masuk['tanggal']); ?>">
                            </div>
                            <div class="form-group">
                              <label>ID Barang</label>
                              <input type="text" class="form-control" name="id_barang" id="edit_id_barang<?php echo $masuk['id_masuk']; ?>" value="<?php echo ($masuk['id_barang']); ?>" onkeyup="cekBarangEdit('<?php echo $masuk['id_masuk']; ?>')">
                              <div id="tampil_nama_barang_edit<?php echo $masuk['id_masuk']; ?>" style="margin-top: 5px; font-weight: bold;"></div>
                            </div>
                            <div class="form-group">
                              <label>Jumlah</label>
                              <input type="number" class="form-control" name="jumlah" value="<?php echo ($masuk['jumlah']); ?>">
                            </div>
                            <div class="form-group">
                              <label>Keterangan</label>
                              <select class="form-control" name="keterangan">
                                <option value="Sedang dikemas" <?php if ($masuk['keterangan'] == 'Sedang dikemas') echo 'selected'; ?>>Sedang dikemas</option>
                                <option value="Dalam Perjalanan" <?php if ($masuk['keterangan'] == 'Dalam Perjalanan') echo 'selected'; ?>>Dalam Perjalanan</option>
                                <option value="Siap Antar" <?php if ($masuk['keterangan'] == 'Siap Antar') echo 'selected'; ?>>Siap Antar</option>
                                <option value="Sudah diterima" <?php if ($masuk['keterangan'] == 'Sudah diterima') echo 'selected'; ?>>Sudah diterima</option>
                              </select>
                            </div>
                            <div class="form-group">
                              <label>User ID</label>
                              <input type="text" class="form-control" name="id_user" id="edit_id_user<?php echo $masuk['id_masuk']; ?>" value="<?php echo ($masuk['id_user']); ?>" onkeyup="cekUserEdit('<?php echo $masuk['id_masuk']; ?>')">
                              <div id="tampil_nama_user_edit<?php echo $masuk['id_masuk']; ?>" style="margin-top: 5px; font-weight: bold;"></div>
                            </div>
                            <div class="modal-footer">
                              <button type="submit" class="btn btn-primary"> Update </button>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                  <a href="barang_masuk_hapus.php?id_barang_masuk=<?php echo $masuk['id_masuk']; ?>" class="btn btn-xs btn-danger" role="button" title="Hapus" onclick="return confirm('Apakah Anda yakin ingin menghapus barang masuk ini?')">
                    <i class="glyphicon glyphicon-trash"></i>
                  </a>
                </td>
              </tr>
            <?php
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </section>
</div>
</div>
<div class="modal fade" id="tambah-barang-masuk">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Tambah Data Barang Masuk</h4>
      </div>
      <form action="barang_masuk_proses.php" method="POST">
        <div class="modal-body">
          <div class="form-group">
            <label>Tanggal</label>
            <input type="date" class="form-control" name="tanggal">
          </div>
          <div class="form-group">
            <label>ID Barang</label>
            <input type="text" class="form-control" name="id_barang" id="input_id_barang">
            <div id="tampil_nama_barang" style="margin-top: 5px; font-weight: bold;"></div>
          </div>
          <div class="form-group">
            <label>Jumlah</label>
            <input type="number" class="form-control" name="jumlah">
          </div>
          <div class="form-group">
            <label>Keterangan</label>
            <select class="form-control" name="keterangan">
              <option value="Sedang dikemas">Sedang dikemas</option>
              <option value="Dalam Perjalanan">Dalam Perjalanan</option>
              <option value="Siap Antar">Siap Antar</option>
              <option value="Sudah diterima">Sudah diterima</option>
            </select>
          </div>
          <div class="form-group">
            <label>User ID</label>
            <input type="text" class="form-control" name="id_user" id="input_id_user">
            <div id="tampil_nama_user" style="margin-top: 5px; font-weight: bold;"></div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary"> Save </button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<?php

include "../layout/footer.php";

?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function() {
    // Live Fetch Nama Barang (Tambah)
    $('#input_id_barang').on('keyup change', function() {
      var id_brg = $(this).val();
      if (id_brg != "") {
        $.ajax({
          url: "cek_barang.php",
          type: "POST",
          data: {
            id_barang: id_brg
          },
          success: function(response) {
            $('#tampil_nama_barang').html(response);
          }
        });
      } else {
        $('#tampil_nama_barang').html("");
      }
    });

    // Live Fetch Nama User (Tambah)
    $('#input_id_user').on('keyup change', function() {
      var id_usr = $(this).val();
      if (id_usr != "") {
        $.ajax({
          url: "cek_user.php",
          type: "POST",
          data: {
            id_user: id_usr
          },
          success: function(response) {
            $('#tampil_nama_user').html(response);
          }
        });
      } else {
        $('#tampil_nama_user').html("");
      }
    });
  });

  // Live Fetch Nama Barang (Edit)
  function cekBarangEdit(id_masuk) {
    var id_brg = $('#edit_id_barang' + id_masuk).val();
    if (id_brg != "") {
      $.ajax({
        url: "cek_barang.php",
        type: "POST",
        data: {
          id_barang: id_brg
        },
        success: function(response) {
          $('#tampil_nama_barang_edit' + id_masuk).html(response);
        }
      });
    } else {
      $('#tampil_nama_barang_edit' + id_masuk).html("");
    }
  }

  // Live Fetch Nama User (Edit)
  function cekUserEdit(id_masuk) {
    var id_usr = $('#edit_id_user' + id_masuk).val();
    if (id_usr != "") {
      $.ajax({
        url: "cek_user.php",
        type: "POST",
        data: {
          id_user: id_usr
        },
        success: function(response) {
          $('#tampil_nama_user_edit' + id_masuk).html(response);
        }
      });
    } else {
      $('#tampil_nama_user_edit' + id_masuk).html("");
    }
  }
</script>
</body>

</html>