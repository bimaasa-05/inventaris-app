<?php
include '../layout/header.php';
global $conn;
?>

<div class="content-wrapper">
    <section class="content-header">
        <h1>Laporan Data Keluar <small>Rangkuman Data Keluar</small></h1>
    </section>

    <section class="content">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Daftar Keluar Hari ini</h3>
                <div class="box-tools pull-right">
                    <a href="laporan_keluar_cetak.php" target="_blank" class="btn btn-success btn-sm">
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
                            <th>Tujuan</th>
                            <th>Keterangan</th>
                            <th>Nama User</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Query untuk mengambil data barang masuk beserta nama barang dan nama user  
                        $dt_keluar = mysqli_query($conn, "SELECT barang_keluar.*, barang.nama_barang, users.nama_lengkap FROM barang_keluar INNER JOIN barang ON barang_keluar.id_barang = barang.id_barang INNER JOIN users ON barang_keluar.id_user = users.id_user");

                        $no = 1;
                        while ($keluar = mysqli_fetch_array($dt_keluar)) {
                        ?>

                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $keluar['tanggal']; ?></td>
                                <td><?php echo $keluar['nama_barang']; ?></td>
                                <td><?php echo $keluar['jumlah']; ?></td>
                                <td><?php echo $keluar['tujuan']; ?></td>
                                <td><?php echo $keluar['keterangan']; ?></td>
                                <td><?php echo $keluar['nama_lengkap']; ?></td>

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