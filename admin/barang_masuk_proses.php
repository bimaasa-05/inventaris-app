<?php
session_start();
global $conn;
include "../config/koneksi.php";

//Mengambil data yang dikirim dari modal tambah data pelanggan 
$Tanggal = $_POST['tanggal'];
$BarangID = $_POST['id_barang'];
$Jumlah = $_POST['jumlah'];
$Keterangan = $_POST['keterangan'];
$UserID = $_POST['id_user'];

$result = mysqli_query($conn, "INSERT INTO barang_masuk VALUES ('', '$Tanggal', '$BarangID', '$Jumlah', '$Keterangan', '$UserID')");

echo "
        <script>
            alert('Data berhasil disimpan');
            window.location='barang_masuk.php';
        </script>";
