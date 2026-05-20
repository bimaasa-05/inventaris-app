<?php
include "../config/koneksi.php"; // Sesuaikan jalur koneksi database kamu
global $conn;
if (isset($_POST['id_barang'])) {
    $id_barang = $_POST['id_barang'];
    $query = mysqli_query($conn, "SELECT nama_barang FROM barang WHERE id_barang = '$id_barang'");
    $data = mysqli_fetch_array($query);

    if ($data) {
        echo "<span class='text-success'><i class='glyphicon glyphicon-ok'></i> " . $data['nama_barang'] . "</span>";
    } else {
        echo "<span class='text-danger'><i class='glyphicon glyphicon-remove'></i> Barang tidak ditemukan!</span>";
    }
}
