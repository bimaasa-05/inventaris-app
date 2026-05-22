<?php
session_start();
global $conn;
include "../config/koneksi.php";

//Mengambil data yang dikirim dari modal tambah data pelanggan 
$KeluarID = $_POST['id_barang_keluar'];
$Tanggal = $_POST['tanggal'];
$BarangID = $_POST['id_barang'];
$Jumlah = $_POST['jumlah'];
$Tujuan = $_POST['tujuan'];
$Keterangan = $_POST['keterangan'];
$UserID = $_POST['id_user'];

$result = mysqli_query($conn, "UPDATE barang_keluar set tanggal='$Tanggal', id_barang='$BarangID', jumlah='$Jumlah', tujuan='$Tujuan', keterangan='$Keterangan', id_user='$UserID' WHERE id_keluar = '$KeluarID'");

if ($result) {
    echo "
        <script>
            alert('Data berhasil diupdate');
            window.location='barang_keluar.php';
        </script>";
} else {
    echo "
        <script>
            alert('Data gagal diupdate');
            window.location='barang_keluar.php';
        </script>";
}
