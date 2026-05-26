<?php
include '../layout/header.php';
global $conn;
?>

<div class="content-wrapper">
    <section class="content-header">
        <h1>Laporan Data Masuk <small>Rangkuman Data Masuk</small></h1>
    </section>

    <section class="content">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Daftar Masuk Hari ini</h3>
                <div class="box-tools pull-right">
                    <a href="laporan_masuk_cetak.php" target="_blank" class="btn btn-success btn-sm">
                        <i class="fa fa-print"></i> Printer
                    </a>
                </div>
            </div>

            <div class="box-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th width="5%">NO</th>
                            <th>Tanggal</th>
                            <th>Nama Barang</th>
                            <th>Jumlah</th>
                            <th>Keterangan</th>
                            <th>Nama User</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Query untuk mengambil data barang masuk beserta nama barang dan nama user  
                        $dt_masuk = mysqli_query($conn, "SELECT barang_masuk.*, barang.nama_barang, users.nama_lengkap FROM barang_masuk INNER JOIN barang ON barang_masuk.id_barang = barang.id_barang INNER JOIN users ON barang_masuk.id_user = users.id_user");

                        $no = 1;

                        while ($masuk = mysqli_fetch_array($dt_masuk)) {
                        ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $masuk['tanggal']; ?></td>
                                <td><?php echo $masuk['nama_barang']; ?></td>
                                <td><?php echo $masuk['jumlah']; ?></td>
                                <td><?php echo $masuk['keterangan']; ?></td>
                                <td><?php echo $masuk['nama_lengkap']; ?></td>

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

<?php include '../layout/footer.php'; ?>