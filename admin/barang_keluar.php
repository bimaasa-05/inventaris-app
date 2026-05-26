<?php
include '../layout/header.php';
global $conn;

?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Data Barang Keluar
            <small>
                Aplikasi Inventaris Barang Sederhana
            </small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Data Barang Keluar</li>
        </ol>
        <section class="content-header">
            <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-green"><i class="fa fa-minus-circle"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Total Barang Keluar</span>
                            <span class="info-box-number">
                                <?php
                                $keluar = mysqli_query($conn, "SELECT * FROM barang_keluar");
                                echo mysqli_num_rows($keluar);
                                ?>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="box box-primary">
                <div class="box-header">
                    <button type="butto, n" class="btn btn-primary" data-toggle="modal" data-target="#tambah-barang-keluar"><i class="glyphicon glyphicon-plus"></i> Tambah Data

                    </button>
                </div>
                <div class="box-body">
                    <table class="table table-bordered table-striped table-responsive">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>TANGGAL</th>
                                <th>NAMA BARANG</th>
                                <th>JUMLAH</th>
                                <th>TUJUAN </th>
                                <th>KETERANGAN</th>
                                <th>NAMA USER</th>
                                <th>OPSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // Query untuk mengambil data barang keluar beserta nama barang dan nama user  
                            $dt_keluar = mysqli_query($conn, "SELECT barang_keluar.*, barang.nama_barang, users.nama_lengkap FROM barang_keluar INNER JOIN barang ON barang_keluar.id_barang = barang.id_barang INNER JOIN users ON barang_keluar.id_user = users.id_user");
                            $no = 1;
                            while ($keluar = mysqli_fetch_array($dt_keluar)) {
                            ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>

                                    <td><?php echo $keluar['tanggal']; ?></td>
                                    <td><?php echo $keluar['nama_barang'] ? $keluar['nama_barang'] : "barang tidak ditemukan"; ?></td>
                                    <td><?php echo $keluar['jumlah']; ?></td>
                                    <td><?php echo $keluar['tujuan']; ?></td>
                                    <td><?php echo $keluar['keterangan']; ?></td>
                                    <td><?php echo $keluar['nama_lengkap'] ? $keluar['nama_lengkap'] : "user tidak ditemukan"; ?></td>
                                    <td>
                                        <button type="button" class="btn btn-xs btn-warning" title="Edit" data-toggle="modal" data-target="#edit-barang-masuk<?php echo $keluar['id_keluar']; ?>">
                                            <i class="glyphicon glyphicon-edit"></i>
                                        </button>
                                        <div class="modal fade" id="edit-barang-masuk<?php echo $keluar['id_keluar']; ?>">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span></button>
                                                        <h4 class="modal-title">Edit Data Barang Keluar</h4>
                                                    </div>
                                                    <form action="barang_keluar_update.php" method="POST">
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <input type="hidden" class="form-control" name="id_barang_keluar" value="<?php echo ($keluar['id_keluar']); ?>">
                                                                <label>Tanggal</label>
                                                                <input type="date" class="form-control" name="tanggal" value="<?php echo ($keluar['tanggal']); ?>">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>ID Barang</label>
                                                                <input type="text" class="form-control" name="id_barang" id="edit_id_barang<?php echo $keluar['id_keluar']; ?>" value="<?php echo ($keluar['id_barang']); ?>" onkeyup="cekBarangEdit('<?php echo $keluar['id_keluar']; ?>')">
                                                                <div id="tampil_nama_barang_edit<?php echo $keluar['id_keluar']; ?>" style="margin-top: 5px; font-weight: bold;"></div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Jumlah</label>
                                                                <input type="number" class="form-control" name="jumlah" value="<?php echo ($keluar['jumlah']); ?>">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Tujuan</label>
                                                                <input type="text" class="form-control" name="tujuan" value="<?php echo ($keluar['tujuan']); ?>">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Keterangan</label>
                                                                <select class="form-control" name="keterangan">
                                                                    <option value="Sedang dikemas" <?php if ($keluar['keterangan'] == 'Sedang dikemas') echo 'selected'; ?>>Sedang dikemas</option>
                                                                    <option value="Dalam Perjalanan" <?php if ($keluar['keterangan'] == 'Dalam Perjalanan') echo 'selected'; ?>>Dalam Perjalanan</option>
                                                                    <option value="Siap Antar" <?php if ($keluar['keterangan'] == 'Siap Antar') echo 'selected'; ?>>Siap Antar</option>
                                                                    <option value="Sudah diterima" <?php if ($keluar['keterangan'] == 'Sudah diterima') echo 'selected'; ?>>Sudah diterima</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>User ID</label>
                                                                <input type="text" class="form-control" name="id_user" value="<?php echo ($keluar['id_user']); ?>">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit" class="btn btn-primary"> Update </button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="barang_keluar_hapus.php?id_barang_keluar=<?php echo $keluar['id_keluar']; ?>" class="btn btn-xs btn-danger" role="button" title="Hapus" onclick="return confirm('Apakah Anda yakin ingin menghapus barang keluar ini?')">
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
<div class="modal fade" id="tambah-barang-keluar">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Tambah Data Barang Keluar</h4>
            </div>
            <form action="barang_keluar_proses.php" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Tanggal</label>
                        <input type="date" class="form-control" name="tanggal">
                    </div>
                    <div class="form-group">
                        <label>ID Barang</label>
                        <input type="text" class="form-control" name="id_barang" ">
                    </div>
                    <div class=" form-group">
                        <label>Jumlah</label>
                        <input type="number" class="form-control" name="jumlah">
                    </div>
                    <div class="form-group">
                        <label>Tujuan</label>
                        <input type="text" class="form-control" name="tujuan">
                    </div>
                    <div class="form-group">
                        <label>Keterangan</label>
                        <select class="form-control" name="keterangan">
                            <option value="Sedang dikemas">Sedang dikemas</option>
                            <option value="Dalam Perjalanan">Dalam Perjalanan</option>
                            <option value="Siap Antar">Sudah Siap Antar</option>
                            <option value="Sudah diterima">Sudah diterima</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>UserID</label>
                        <input type="text" class="form-control" name="id_user">
                    </div>
                    <div class=" modal-footer">
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

</body>

</html>