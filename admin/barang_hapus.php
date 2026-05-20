<?php
session_start();
global $conn;
include "../config/koneksi.php";

//Mengambil PelangganID Dari URL

$BarangID = $_GET['id_barang'];

//Query Untuk Menghapus Data

mysqli_query($conn, " DELETE FROM barang WHERE id_barang = '$BarangID'");

echo "
    <script>
        alert('Data berhasil dihapus');
        window.location='barang.php';
    </script>";
