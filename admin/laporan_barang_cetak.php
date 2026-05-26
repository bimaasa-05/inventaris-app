<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Bukti Transaksi || Aplikasi Kasir Sederhana</title>
    <link rel="stylesheet" href="../assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
</head>

<body>
    <?php
    include "../config/koneksi.php";
    global $conn;
    session_start();
    //Melakukan Sebuah Kondisi untuk melakukan pengecekan apakah sudah login atau belum
    if ($_SESSION['level'] === "") {
        header("location: ../index.php");
    }
    ?>
    <div class="container">
        <h2 class="text-center"><strong>Kasir Sederhana</strong></h2>
        <p class="text-center"><strong>Jl. Jedral Soedirman No. 175 Indramayu</strong></p>
        <br>

        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <td>No </td>
                    <td>Kode barang</td>
                    <td>Nama Barang</td>
                    <td>Kategori</td>
                    <td>Satuan</td>
                    <td>Stok</td>
                    <td>Harga Beli</td>
                    <td>Harga Jual</td>
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
                        <td><?php echo $barang['nama_kategori']; ?></td>
                        <td><?php echo $barang['satuan']; ?></td>
                        <td><?php echo $barang['stok']; ?></td>
                        <td><?php echo "Rp. " . number_format($barang['harga_beli']) . ",- ";  ?></td>
                        <td><?php echo "Rp. " . number_format($barang['harga_jual']) . ",- ";  ?></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
        <br>
        <p class="text-center"><i>"Laporan Transaksi Dari Tanggal <?php echo date('d-m-Y H:i:s'); ?>"</i></p>
    </div>
    <script type="text/javascript">
        window.print();
    </script>
</body>

</html>