<?php
session_start();
global $conn;
include "../config/koneksi.php";

//Mengambil data yang dikirim dari modal tambah data pelanggan 
$SuplierID = $_POST['id_supplier'];
$NamaSuplier = $_POST['nama_supplier'];
$Alamat = $_POST['alamat'];
$NoTelp = $_POST['no_telepon'];


mysqli_query($conn, "UPDATE supplier set nama_supplier='$NamaSuplier', alamat='$Alamat', telepon='$NoTelp' WHERE id_supplier = '$SuplierID'");
echo "
        <script>
            alert('Data berhasil diupdate');
            window.location='suplier.php';
        </script>";
