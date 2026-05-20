<?php
session_start();
global $conn;
include "../config/koneksi.php";

//Mengambil data yang dikirim dari modal tambah data pelanggan 
$NamaSuplier = $_POST['nama_supplier'];
$Alamat = $_POST['alamat'];
$NoTelp = $_POST['no_telepon'];


$result = mysqli_query($conn, "INSERT INTO supplier values ('','$NamaSuplier', '$Alamat', '$NoTelp')");

echo "
        <script>
            alert('Data berhasil disimpan');
            window.location='suplier.php';
        </script>";
