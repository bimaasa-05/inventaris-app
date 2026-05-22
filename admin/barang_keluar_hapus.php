<?php
session_start();
global $conn;
include "../config/koneksi.php";

//Mengambil PelangganID Dari URL

$BarangID = $_GET['id_barang_keluar'];

//Query Untuk Menghapus Data

mysqli_query($conn, " DELETE FROM barang_keluar WHERE id_keluar = '$BarangID'");

echo "
    <script>
        alert('Data berhasil dihapus');
        window.location='barang_keluar.php';
    </script>";
