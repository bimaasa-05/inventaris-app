<?php
session_start();

include "../config/koneksi.php";
global $conn;
//Mengambil data yang dikirim dari modal tambah data pelanggan 
$KodeBarang = $_POST['kode_barang'];
$NamaBarang = $_POST['nama_barang'];
$KategoriID = $_POST['id_kategori'];
$SuplierID = $_POST['id_suplier'];
$Satuan = $_POST['satuan'];
$Stok = $_POST['stok'];
$HargaBeli = $_POST['harga_beli'];
$HargaJual = $_POST['harga_jual'];

$result = mysqli_query($conn, "INSERT INTO barang values ('','$KodeBarang', '$NamaBarang', '$KategoriID', '$SuplierID', '$Satuan', '$Stok' , '$HargaBeli' , '$HargaJual', '')");

echo "
        <script>
            alert('Data berhasil disimpan');
            window.location='barang.php';
        </script>";
