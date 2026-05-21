<?php
session_start();
global $conn;
include "../config/koneksi.php";

//Mengambil PeminjamanID Dari URL

$PeminjamanID = $_GET['id_peminjaman'];

//Query Untuk Menghapus Data

mysqli_query($conn, " DELETE FROM peminjaman WHERE id_peminjam = '$PeminjamanID'");

echo "
    <script>
        alert('Data berhasil dihapus');
        window.location='peminjaman.php';
    </script>";
