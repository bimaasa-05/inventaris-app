<?php
include '../layout/header.php';
global $conn;
?>

<div class="content-wrapper">
    <section class="content-header">
        <h1>Laporan Data Barang <small>Rangkuman Sisa Stok</small></h1>
    </section>

    <section class="content">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Daftar Stok Gudang Saat Ini</h3>
                <div class="box-tools pull-right">
                    <a href="laporan_barang_cetak.php" target="_blank" class="btn btn-success btn-sm">
                        <i class="fa fa-print"></i> Printer
                    </a>
                </div>
            </div>

            <div class="box-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th width="5%">NO</th>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Kategori</th>
                            <th>Satuan</th>
                            <th>Stok</th>
                            <th>Harga Beli</th>
                            <th>Harga Jual</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        //Kita pakai join untuk mempermudah user menginputkan
                        $query = "SELECT barang.*, kategori.nama_kategori  FROM barang LEFT JOIN kategori ON barang.id_kategori = kategori.id_kategori";

                        $dt_barang = mysqli_query($conn, $query);
                        $no = 1;
                        while ($barang = mysqli_fetch_array($dt_barang)) {
                        ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $barang['kode_barang']; ?></td>
                                <td><?php echo $barang['nama_barang']; ?></td>
                                <td><?php echo $barang['nama_kategori'] ?? '-'; ?></td>
                                <td><?php echo $barang['satuan']; ?></td>
                                <td><?php echo $barang['stok']; ?></td>
                                <td>Rp <?php echo number_format($barang['harga_beli'], 0, ',', '.'); ?></td>
                                <td>Rp <?php echo number_format($barang['harga_jual'], 0, ',', '.'); ?></td>
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