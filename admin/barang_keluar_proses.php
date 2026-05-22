<?php
session_start();
global $conn;
include "../config/koneksi.php";

//Mengambil data yang dikirim dari modal tambah data pelanggan 
$Tanggal = $_POST['tanggal'];
$BarangID = $_POST['id_barang'];
$Jumlah = $_POST['jumlah'];
$Tujuan = $_POST['tujuan'];
$Keterangan = $_POST['keterangan'];
$UserID = $_POST['id_user'];


$result = mysqli_query($conn, "INSERT INTO barang_keluar VALUES ('', '$Tanggal', '$BarangID', '$Jumlah', '$Tujuan', '$Keterangan', '$UserID')");

echo "
        <script>
            alert('Data berhasil Dibuat');
            window.location='barang_keluar.php';
        </script>";
