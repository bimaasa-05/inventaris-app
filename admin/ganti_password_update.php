<?php
session_start();
global $conn;
include "../config/koneksi.php";

//Mengambil data yang dikirim dari modal tambah data pelanggan 
$UserID = $_POST['id_user'];
$NamaLengkap = $_POST['nama_lengkap'];
$Username = $_POST['username'];
$Password = $_POST['password'];
$Role = $_POST['level'];
    
$result = mysqli_query($conn, "UPDATE users set nama_lengkap='$NamaLengkap', username='$Username', password='$Password', level='$Role' WHERE id_user = '$UserID'");

if ($result) {
    echo "
        <script>
            alert('Data berhasil diupdate');
            window.location='ganti_password.php';
        </script>";
} else {
    echo "
        <script>
            alert('Data gagal diupdate');
            window.location='ganti_password.php';
        </script>";
}
