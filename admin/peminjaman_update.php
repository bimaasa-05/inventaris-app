<?php
session_start();
global $conn;
include "../config/koneksi.php";

//Mengambil data yang dikirim dari modal tambah data pelanggan 
$PeminjamID = $_POST['id_peminjaman'];
$Nama_Peminjam = $_POST['nama_peminjam'];
$NamaBarang = $_POST['nama_barang'];
$TanggalPeminjaman = $_POST['tanggal_peminjaman'];
$TanggalPengembalian = $_POST['tanggal_pengembalian'];
$Jumlah = $_POST['jumlah'];
$Keterangan = $_POST['keterangan'];


$result = mysqli_query($conn, "UPDATE peminjaman SET nama_peminjam='$Nama_Peminjam', nama_barang='$NamaBarang', tanggal_peminjaman='$TanggalPeminjaman', tanggal_pengembalian='$TanggalPengembalian', jumlah='$Jumlah', keterangan='$Keterangan' WHERE id_peminjam='$PeminjamID'");

echo "
        <script>
            alert('Data berhasil diupdate');
            window.location='peminjaman.php';
        </script>";
