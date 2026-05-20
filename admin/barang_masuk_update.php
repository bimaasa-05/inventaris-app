<?php
session_start();
global $conn;
include "../config/koneksi.php";

//Mengambil data yang dikirim dari modal tambah data pelanggan 
$MasukID = $_POST['id_masuk'];
$Tanggal = $_POST['tanggal'];
$BarangID = $_POST['id_barang'];
$Jumlah = $_POST['jumlah'];
$Keterangan = $_POST['keterangan'];
$UserID = $_POST['id_user'];

$result = mysqli_query($conn, "UPDATE barang_masuk set tanggal='$Tanggal', id_barang='$BarangID', jumlah='$Jumlah', keterangan='$Keterangan', id_user='$UserID' WHERE id_masuk = '$MasukID'");

if ($result) {
    echo "
        <script>
            alert('Data berhasil diupdate');
            window.location='barang_masuk.php';
        </script>";
} else {
    echo "
        <script>
            alert('Data gagal diupdate');
            window.location='barang_masuk.php';
        </script>";
}
