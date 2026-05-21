<?php
session_start();
global $conn;
include "../config/koneksi.php";

//Mengambil data yang dikirim dari modal tambah data pelanggan 
$Nama_Peminjam = $_POST['nama_peminjam'];
$Nama_Barang = $_POST['nama_barang'];
$Tanggal_Peminjaman = $_POST['tanggal_peminjaman'];
$Tanggal_Pengembalian = $_POST['tanggal_pengembalian'];
$Jumlah = $_POST['jumlah'];
$Keterangan = $_POST['keterangan'];

$result = mysqli_query($conn, "INSERT INTO peminjaman VALUES ('', '$Nama_Peminjam', '$Nama_Barang', '$Tanggal_Peminjaman', '$Tanggal_Pengembalian', '$Jumlah', '$Keterangan')");

echo "
        <script>
            alert('Data berhasil disimpan');
            window.location='peminjaman.php';
        </script>";
