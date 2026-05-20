<?php
include "../config/koneksi.php"; // Menggunakan file koneksi bawaan kamu
global $conn;
if (isset($_POST['id_user'])) {
    $id_user = $_POST['id_user'];
    $query = mysqli_query($conn, "SELECT nama_lengkap FROM users WHERE id_user = '$id_user'");
    $data = mysqli_fetch_array($query);

    if ($data) {
        echo "<span style='color: #28a745;'><i class='glyphicon glyphicon-ok'></i> " . $data['nama_lengkap'] . "</span>";
    } else {
        echo "<span style='color: #dc3545;'><i class='glyphicon glyphicon-remove'></i> ID User tidak ditemukan!</span>";
    }
}
