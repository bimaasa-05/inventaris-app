<?php

// Koneksi ke database 
// Ganti dengan informasi koneksi database Anda
$localhost = "localhost";
$username = "root";
$password = "";
$database = "inventaris_barang";

$conn = mysqli_connect($localhost, $username, $password, $database);
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
