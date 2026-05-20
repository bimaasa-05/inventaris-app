<?php
session_start();

include "../config/koneksi.php";
global $conn;
//Mengambil data yang dikirim dari modal tambah data pelanggan 
$BarangID = $_POST['id_barang'];
$KodeBarang = $_POST['kode_barang'];
$NamaBarang = $_POST['nama_barang'];
$KategoriID = $_POST['id_kategori'];
$SuplierID = $_POST['id_supplier'];
$Satuan = $_POST['satuan'];
$Stok = $_POST['stok'];
$HargaBeli = $_POST['harga_beli'];
$HargaJual = $_POST['harga_jual'];

$result = mysqli_query($conn, "UPDATE barang set kode_barang='$KodeBarang', nama_barang='$NamaBarang', id_kategori='$KategoriID', id_supplier='$SuplierID', satuan='$Satuan', stok='$Stok', harga_beli='$HargaBeli', harga_jual='$HargaJual' WHERE id_barang = '$BarangID'");

if ($result) {
    echo "
        <script>
            alert('Data berhasil diupdate');
            window.location='barang.php';
        </script>";
} else {
    echo "
        <script>
            alert('Data gagal diupdate');
            window.location='barang.php';
        </script>";
}
