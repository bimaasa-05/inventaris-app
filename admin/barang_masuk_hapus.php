<?php
session_start();
global $conn;
include "../config/koneksi.php";

//Mengambil PelangganID Dari URL

$BarangID = $_GET['id_barang_masuk'];

//Query Untuk Menghapus Data

mysqli_query($conn, " DELETE FROM barang_masuk WHERE id_masuk = '$BarangID'");

echo "
    <script>
        alert('Data berhasil dihapus');
        window.location='barang_masuk.php';
    </script>";
