<?php
include '../layout/header.php';
global $conn;

?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Data Peminjaman
            <small>
                Aplikasi Kasir Sederhana
            </small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Data Peminjaman</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="box box-primary">
            <div class="box-header">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambah-peminjaman"><i class="glyphicon glyphicon-plus"></i> Tambah Data

                </button>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table class="table table-bordered table-striped table-responsive">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>Nama Peminjam</th>
                            <th>Nama Barang</th>
                            <th>Tanggal Peminjaman</th>
                            <th>Tanggal Pengembalian</th>
                            <th>Jumlah</th>
                            <th>Keterangan</th>
                            <th>OPSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $dt_peminjaman = mysqli_query($conn, "SELECT * FROM peminjaman");
                        $no = 1;
                        while ($peminjaman = mysqli_fetch_array($dt_peminjaman)) { ?>
                            <tr> <!-- Pindahkan <tr> ke dalam loop -->
                                <td><?php echo $no++; ?></td>

                                <td><?php echo $peminjaman['nama_peminjam']; ?></td>
                                <td><?php echo $peminjaman['nama_barang']; ?></td>
                                <td><?php echo $peminjaman['tanggal_peminjaman']; ?></td>
                                <td><?php echo $peminjaman['tanggal_pengembalian']; ?></td>
                                <td><?php echo $peminjaman['jumlah']; ?></td>
                                <td><?php echo $peminjaman['keterangan']; ?></td>
                                <td>
                                    <!-- Hilangkan spasi pada id modal -->
                                    <button type="button" class="btn btn-xs btn-warning" title="Edit" data-toggle="modal" data-target="#edit-peminjaman<?php echo $peminjaman['id_peminjam']; ?>">
                                        <i class="glyphicon glyphicon-edit"></i>
                                    </button>
                                    <div class="modal fade" id="edit-peminjaman<?php echo $peminjaman['id_peminjam']; ?>">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title">Edit Data Peminjaman</h4>
                                                </div>
                                                <form action="peminjaman_update.php" method="POST">
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <input type="hidden" class="form-control" name="id_peminjaman" value="<?php echo ($peminjaman['id_peminjam']); ?>">
                                                            <label>Nama Peminjam</label>
                                                            <input type="text" class="form-control" name="nama_peminjam" value="<?php echo ($peminjaman['nama_peminjam']); ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="nama_barang">Pilih Barang</label>
                                                            <select name="nama_barang" id="nama_barang" class="form-control">
                                                                <option value=""> >--- Pilih Barang Ysng Tersedia ---< </option>
                                                                        <?php
                                                                        $dt_barang = mysqli_query($conn, "SELECT * FROM barang");
                                                                        while ($barang = mysqli_fetch_array($dt_barang)) { ?>
                                                                <option value="<?php echo $barang['id_barang'] ?>"><?php echo $barang['nama_barang'] ?></option>
                                                            <?php
                                                                        }
                                                            ?>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Tanggal Peminjaman</label>
                                                            <input type="date" class="form-control" name="tanggal_peminjaman" value="<?php echo ($peminjaman['tanggal_peminjaman']); ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Tanggal Pengembalian</label>
                                                            <input type="date" class="form-control" name="tanggal_pengembalian" value="<?php echo ($peminjaman['tanggal_pengembalian']); ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Jumlah</label>
                                                            <input type="text" class="form-control" name="jumlah" value="<?php echo ($peminjaman['jumlah']); ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Keterangan</label>
                                                            <input type="text" class="form-control" name="keterangan" value="<?php echo ($peminjaman['keterangan']); ?>">
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

                                    <a href="peminjaman_hapus.php?id_peminjaman=<?php echo $peminjaman['id_peminjam']; ?>" class="btn btn-xs btn-danger" role="button" title="Hapus" onclick="return confirm('Apakah Anda yakin ingin menghapus peminjaman ini?')">
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
<div class="modal fade" id="tambah-peminjaman">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Tambah Data Peminjaman</h4>
            </div>
            <form action="peminjaman_proses.php" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Peminjam</label>
                        <input type="text" class="form-control" name="nama_peminjam">
                    </div>
                    <div class="form-group">
                        <label for="nama_barang">Pilih Barang</label>
                        <select name="nama_barang" id="nama_barang" class="form-control">
                            <option value="">>--- Barang Yang Tersedia ---< </option>
                                    <?php
                                    $dt_barang = mysqli_query($conn, "SELECT * FROM barang");
                                    while ($barang = mysqli_fetch_array($dt_barang)) { ?>
                            <option value="<?php echo $barang['id_barang'] ?>"><?php echo $barang['nama_barang'] ?></option>
                        <?php
                                    }
                        ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Peminjaman</label>
                        <input type="date" class="form-control" name="tanggal_peminjaman">
                    </div>
                    <div class="form-group">
                        <label>Tanggal Pengembalian</label>
                        <input type="date" class="form-control" name="tanggal_pengembalian">
                    </div>
                    <div class="form-group">
                        <label>Jumlah</label>
                        <input type="number" class="form-control" name="jumlah">
                    </div>
                    <div class="form-group">
                        <label>Keterangan</label>
                        <input type="text" class="form-control" name="keterangan">
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