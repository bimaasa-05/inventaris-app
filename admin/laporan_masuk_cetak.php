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
                    <td>Tanggal Transaksi</td>
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
        </br>
        <p class="pull-right">Oleh:</p>
        <br>
        <p class="text-center"><i>"Laporan Transaksi Dari Tanggal <?php echo date('d-m-Y H:i:s'); ?>"</i></p>
    </div>
    <script type="text/javascript">
        window.print();
    </script>
</body>

</html>