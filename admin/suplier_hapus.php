<?php
session_start();
global $conn;
include "../config/koneksi.php";

//Mengambil PelangganID Dari URL

$SuplierID = $_GET['id_supplier'];

//Query Untuk Menghapus Data

$result = mysqli_query($conn, " DELETE FROM supplier WHERE id_supplier = '$SuplierID'");
if ($result) {
    echo "
        <script>
            alert('Data berhasil dihapus');
            window.location='suplier.php';
        </script>";
} else {
    echo "
    <script>
        alert('Data gagal dihapus');
        window.location='suplier.php';
    </script>";
}
